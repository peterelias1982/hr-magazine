<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\User;
use App\Models\Tag;
use App\Models\ArticleComment;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\ArticleTag;
use App\Traits\Common;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Dflydev\DotAccessData\Data;
use Pagination;

class ArticleController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $articles = Article::get();
    //     $articleCategories = ArticleCategory::get();

    //     return view("Admin.article.allArticle", compact(['articles', 'articleCategories']));

    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::get();
        $articleCategories = ArticleCategory::select(
            ['id', 'articleCategoryName', 'hasAuthor', 'hasSource', 'hasYoutubeLink'])->get();
        $articleTags = Tag::select('id', 'tagName')->get();

        return view("Admin.article.addArticle", compact(['articleCategories', 'articleTags', 'authors']));;
        // $articleTags = Tag::select('id', 'tagName')->get();

        // return view("Admin.article.addArticle", compact(['articleCategories', 'articleTags', 'authors']));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        [$articleData, $tagsAttachments, $articleables] =
        $this->prepareData($request->all());

        $article = Article::create($articleData);

        $article->tags()->attach($tagsAttachments);

        foreach ($articleables as $articleable) {
            $articleable['article_id'] = $article->id;
            $articleable->save();
        }

        return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.😊    
     * 
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->first();
        $articleCategories = ArticleCategory::get();
        $authors = Author::get();
        $articleTags = Tag::get();

        $sourceArticle = SourceArticle::where('article_id', $article->id)->first();
        $youtubeLink = YoutubeLink::where('article_id', $article->id)->first();

        return view('admin.article.articleDetails', compact('article', 'articleCategories', 'authors', 'articleTags', 'sourceArticle', 'youtubeLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $slug)
    {
        [$articleData, $tagsAttachments, $articleables] =
            $this->prepareData($request->all());

        $article_id = Article::where('slug', $slug)->update($articleData);
        $article = Article::where('id', $article_id)->first();

        $article->tags()->sync($tagsAttachments);

        foreach ($articleables as $articleable) {
            $articleable['article_id'] = $article_id;
            $articleable->save();
        }

        return redirect()->route('articles.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::where('id', $id)->delete();    // softdelete
        return redirect()->route('articles.index');
    }

    private function prepareData(array $data)
    {
        $articleData = [
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'user_id' => $data['user_id'] ?? null,
            'author_id' => $data['author_id'] ?? null,
        ];

        if($data["image"]?? false) {
            $fileName = $this->uploadFile($data["image"], 'assets/images/');
            $articleData['image'] = $fileName;
        }

        $tagsAttachments = $data['tags_id'] ?? [];

        $category = ArticleCategory::where('id', $data['category_id'])->first();

        $articleables = [];

        foreach ($data['articleable'] ?? [] as $key => $articleable) {
            if ($key === 'source' && $category->hasSourec) {
                $articleables[] = new SourceArticle([
                    'sourceName' => $articleable['name'],
                    'sourceLink' => $articleable['link'],
                    'category_id' => $data['category_id'],

                ]);
            } elseif ($key === 'youtubeLink' && $category->hasYoutubeLink) {
                $articleables[] = new YoutubeLink([
                    'youtubeLink' => $articleable,
                    'category_id' => $data['category_id'],
                ]);
            }
        }

        return [$articleData, $tagsAttachments, $articleables];

    }

    public function index(Request $request)
{
    // $articleCategories = ArticleCategory::get();
    //  $articleCategories = ArticleCategory::with('article')->get();

    
    $articles = Article::query(); // Start with a base query
    $articleCategories = ArticleCategory::all();

    $selectedCategoryId = $request->input('category_id');

    // Apply filters based on user input
    $title = $request->get('title'); // Assuming title search
    $tagName = $request->get('tagName');  // Assuming tagName search
    $categoryId = $request->get('category_id');
    $approved = $request->has('status') && $request->get('status') === 'approved';
    $declined = $request->has('status') && $request->get('status') === 'declined';

    // Title Search (if provided)
    if (!empty($title)) {
        $articles->where('title', 'like', "%{$title}%");
    }

    // tagName Search (if provided)
    if (!empty($tagName)) {
        // Assuming you have a many-to-many relationship between articles and tagNames
        $articles = $articles->whereHas('tags', function ($query) use ($tagName) {
            $query->where('name', 'like', "%{$tagName}%");
        });
    }

    // Category Filter (if selected)
    // if ($categoryId !== null) {
    //     $articles->where('category_id', $categoryId);
    // }

    // if ($categoryId !== null) {
    //     $articles = $articles->whereHas('articleCategory', function ($query) use ($categoryId) {
    //         $query->where('id', $categoryId); // Assuming category is a related model with an id
    //     });
    if ($categoryId !== null) {
        $articles = $articles->join('article_categories', 'articles.category_id', '=', 'article_categories.id')
                              ->where('article_categories.id', $categoryId);
    }

    
    


    // Approved Filter (if checkbox selected)
    if ($approved) {
        $articles->where('approved', 1); // Assuming approved is stored as a boolean (1/0)
    }

    // Declined Filter (if checkbox selected)
    if ($declined) {
        $articles->where('approved', 0); // Assuming declined is stored as a boolean (0)
    }

    // Additional Filtering (Optional)
    // You can add more filters here based on the "date" (author) input or other criteria

    $articles = $articles->paginate(10); // Paginate results (optional)


//     // return view("Admin.article.allArticle", compact('articles'));
        return view("Admin.article.allArticle", compact(['articles', 'articleCategories']));
}

}

// public function index(Request $request)
// {
//     $searchTerm = $request->get('searchTerm');

//     $articles = Article::select('articles.title', 'categories.articleCategoryName', 'authors.name AS author_name')
//         ->join('article_categories', 'articles.category_id', '=', 'article_categories.id')
//         ->join('authors', 'articles.author_id', '=', 'authors.id')
//         ->where(function ($query) use ($searchTerm) {
//             $query->where('articles.title', 'like', "%{$searchTerm}%")
//                 ->orWhere('articles.content', 'like', "%{$searchTerm}%")
//                 ->orWhere('categories.articleCategoryName', 'like', "%{$searchTerm}%")
//                 ->orWhere('authors.name', 'like', "%{$searchTerm}%");
//         })
//         ->paginate(10);

//     return view('Admin.article.allArticle', compact('articles'));
// }
// }

// public function index(Request $request)
// {
//     $articleCategories = ArticleCategory::get();
//     $searchTerm = $request->get('title');
//     $tagName = $request->get('tagName');
//     $authorName = $request->get('author');
//     $categoryId = $request->get('categoryId');
//     $approved = $request->has('status') && $request->get('status') === 'approved';

//     $articles = Article::with('articleCategory')
//         ->select('articles.id') // Select specific columns
//         // ->leftJoin('authors', 'articles.author_id', '=', 'authors.id') // Left join with authors table
//         ->leftJoin('users AS authors', 'articles.author_id', '=', 'authors.id') // Join with users table aliased as authors
//         ->leftJoin('article_tags', 'articles.id', '=', 'article_tags.article_id') // Left join with article_tags table
//         ->leftJoin('tags', 'article_tags.tag_id', '=', 'tags.id') // Left join with tags table

//         ->where(function ($query) use ($searchTerm, $tagName, $authorName) {
//             $query->where('articles.title', 'like', "%{$searchTerm}%") // Search title
//                   ->orWhere('articles.content', 'like', "%{$searchTerm}%") // Search content
//                   ->orWhere('authors.name', 'like', "%{$authorName}%") // Search author name
//                   ->orWhere('tags.tagName', 'like', "%{$tagName}%"); // Search tag name
//         });

//     // Filter by category (if selected)
//     if ($categoryId !== null) {
//         $articles->where('articles.category_id', $categoryId);
//     }

//     // Filter by approved status (if checkbox selected)
//     if ($approved) {
//         $articles->where('articles.approved', 1);
//     }

//     $articles = $articles->groupBy('articles.id')->paginate(10); // Group by article ID for distinct results

//     return view('Admin.article.allArticle', compact('articles','articleCategories'));
// }
// public function index(Request $request)
// {
//     $articleCategories=ArticleCategory::get();
//     // Eager loading with related models
//     $articles = Article::query()->with([
//         'category' => function ($query) { // Eager load category with articleCategoryName
//             $query->select('id', 'articleCategoryName'); // Select specific columns
//         },
//         'author' => function ($query) { // Eager load author with name from user table (assuming one-to-one)
//             $query->select('name'); // Select specific column
//         },
//         'tags' => function ($query) { // Eager load tags with tagName (many-to-many)
//             // No additional query needed
//         },
//     ]);

//     // Apply filters based on user input
//     $title = $request->get('title');
//     $tagName = $request->get('tagName');
//     $author = $request->get('author'); // Assuming author search by name
//     $categoryId = $request->get('articleCategory_id');
//     $approved = $request->has('status') && $request->get('status') === 'approved';
//     $declined = $request->has('status') && $request->get('status') === 'declined';

//     // Title Search
//     if (!empty($title)) {
//         $articles->where('title', 'like', "%{$title}%");
//     }

//     // tagName Search
//     if (!empty($tagName)) {
//         $articles->whereHas('tags', function ($query) use ($tagName) {
//             $query->where('name', 'like', "%{$tagName}%");
//         });
//     }

//     // Author Search (assuming search by name)
//     if (!empty($author)) {
//         $articles->whereHas('author', function ($query) use ($author) {
//             $query->where('name', 'like', "%{$author}%");
//         });
//     }

//     // Category Filter
//     if ($categoryId !== null) {
//         $articles->where('category_id', $categoryId);
//     }

//     // Approved/Declined Filter
//     $articles->where('approved', $approved ? 1 : ($declined ? 0 : null));

//     $articles = $articles->paginate(10);

//     // Pass articles, categories, and other data to the view
//     return view("Admin.article.allArticle", compact(['articles', 'articleCategories']));
// }

// }
