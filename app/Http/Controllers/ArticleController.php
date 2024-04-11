<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\Tag;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Traits\Common;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;


class ArticleController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = Request();
        $articles_ids = $this->searchWith(requestData: [
            'title' => $request->title,
            'tagName' => $request->tagName,
            'author' => $request->author,
            'categoryId' => $request->categoryId,
            'status' => $request->status,
        ]);

        $articles = Article::whereIn('id', $articles_ids)->get();
        $articleCategories = ArticleCategory::all();


        $messages = $this->getMessages();

        return view("Admin.article.allArticle", compact(['articles', 'articleCategories', 'messages']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::get();
        $articleCategories = ArticleCategory::select(
            ['id', 'articleCategoryName', 'hasAuthor', 'hasSource', 'hasYoutubeLink'])->get();
        $articleTags = Tag::select('id', 'tagName')->get();

        return view("Admin.article.addArticle", compact(['articleCategories', 'articleTags', 'authors']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        try {
            [$articleData, $tagsAttachments, $articleables] =
                $this->prepareData($request->all());

            $articleData['approved'] = 1;

            $article = Article::create($articleData);

            $article->tags()->attach($tagsAttachments);

            foreach ($articleables as $articleable) {
                $articleable['article_id'] = $article->id;
                $articleable->save();
            }

            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['success' => ['Article deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['error' => ['Error creating article: ' . $exception->getMessage()]]]);
        }

    }

    /**
     * Display the specified resource.😊
     *
     */
    public function show(string $slug)
    {
        try {
            $article = Article::where('slug', $slug)->first();

            if (!$article) {
                throw new ResourceNotFoundException('Article is not found');
            }

            $articleCategories = ArticleCategory::get();
            $authors = Author::get();
            $articleTags = Tag::get();

            $sourceArticle = SourceArticle::where('article_id', $article->id)->first();
            $youtubeLink = YoutubeLink::where('article_id', $article->id)->first();

            return view('admin.article.articleDetails', compact('article', 'articleCategories', 'authors', 'articleTags', 'sourceArticle', 'youtubeLink'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['error' => ['Error not found article: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $slug)
    {
        try {
            [$articleData, $tagsAttachments, $articleables] =
                $this->prepareData($request->all());

            $article = Article::where('slug', $slug)->first();
            $article->update($articleData);

            $article->tags()->sync($tagsAttachments);

            SourceArticle::where('article_id', $article->id)->delete();
            YoutubeLink::where('article_id', $article->id)->delete();

            foreach ($articleables as $articleable) {
                $articleable['article_id'] = $article->id;
                $articleable->save();
            }

            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['success' => ['Article updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['error' => ['Error updating article: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            Article::where('slug', $slug)->delete();

            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['success' => ['Article deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.articles.index')
                ->with(['messages' => ['error' => ['Error deleting article: ' . $exception->getMessage()]]]);
        }
    }

    private function prepareData(array $data)
    {
        $articleData = [
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'user_id' => $data['user_id'] ?? null,
            'author_id' => $data['author_id'] ?? null,
            'approved' => isset($data['approved']),
        ];

        if ($data["image"] ?? false) {
            $fileName = $this->uploadFile($data["image"], 'assets/images/');
            $articleData['image'] = $fileName;
        }

        $tagsAttachments = $data['tags_id'] ?? [];

        $category = ArticleCategory::where('id', $data['category_id'])->first();

        $articleables = [];

        foreach ($data['articleable'] ?? [] as $key => $articleable) {
            if ($key === 'source' && $category->hasSource) {
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

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }

    private function searchWith(array $requestData)
    {
        $query = DB::table('articles');

        if ($requestData['author']) {
            $query
                ->join('authors', 'authors.id', '=', 'articles.author_id')
                ->join('users', 'users.id', '=', 'authors.user_id')
                ->where('users.firstname', 'LIKE', "%{$requestData['author']}%")
                ->select('articles.id');
        }

        if ($requestData['tagName']) {
            $query
                ->join('article_tags', 'articles.id', '=', 'article_tags.article_id')
                ->join('tags', 'tags.id', '=', 'article_tags.tag_id')
                ->where('tags.tagName', 'LIKE', "%{$requestData['tagName']}%")
                ->select('articles.id');
        }

        if ($requestData['title']) {
            $query
                ->where('articles.title', 'LIKE', "%{$requestData['title']}%")
                ->select('articles.id');
        }

        if ($requestData['categoryId']) {
            $query
                ->where('articles.category_id', '=', $requestData['categoryId'])
                ->select('articles.id');
        }

        if ($requestData['status']) {
            $query
                ->where('articles.approved', '=', $requestData['status'] === 'approved')
                ->select('articles.id');
        }

        return $query->get()->pluck('id');
    }

}

