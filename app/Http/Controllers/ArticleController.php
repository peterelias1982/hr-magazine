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







class ArticleController extends Controller
{
    use Common;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $articleCategories = ArticleCategory::all(["articleCategoryName"]);
        // $authors = User::select('id', 'name')->get();
        // $users = User::all();
        // $author = Author::all();  // Or retrieve the author object as needed
        // $userName = $author->user->name;  // Access user name through the relationship
        // $user = User::where('id', $author->user_id)->first();
        // $user = User::select('name');
        // if ($user->isEmpty()) {
        //     $user = []; // Set to an empty array to avoid errors in the view
        //   }
        // $userName = $user !== null ? $user->name : 'User Not Found';  // Provide a default value or handle the case where the user is not found
        // $articles=Article::get();
        // $articleCategories = ArticleCategory::get();
        // return view('admin.article.allArticle',compact('articles', 'articleCategories'));


        // $articles = Article::with(['articleComment', 'sourceArticle', 'youtubeLink', 'articleCategory' ,'author','tags'])
        // ->get();
        // return view('admin.article.allArticle',compact('articles', 'articleCategories', 'authors', 'tags','sourceArticles', 'youtubeLinks'));

        // $query=Article::Query();
        // $request=Request();
        // if($search=$request->article){
        //     $query->where("article","LIKE","%$search%");
        // }
        // $articles=$query->get();
        // // $articleCategories=$query->get();
        // return view("Admin.article.allArticle",compact('articles'));
        //   $articles = Article::with('otherRelationships')->get();


        $articles=Article::get();
        $articleCategories = ArticleCategory::all(["articleCategoryName"]);
         
        return view("Admin.article.allArticle",compact('articles','articleCategories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $authors = Auth::user()->id ? User::select('id', 'name')->get() : Author::all();
        // if ($authors !== null) {
        //     $authors = collect([$authors->only('id', 'name')]);  // Create a collection with relevant data
        //   } else {
        //     $authors = Author::all();
        //   }
        // $authors = Auth::user()->id ? User::select('id', 'name')->get() : Author::all();
        // if ($authors !== null) {
        //     $authors = collect([$authors->only('id', 'name')]);  // Create a collection with relevant data
        //   } else {
        //     $authors = Author::all();
        //   }
//           $authors = Author::all();

// if ($authors !== null && count($authors) > 0) {
//   // Access author properties (e.g., $authors[0]->id) if there are results
//   $authors = User::select('id', 'name')->get();
//   // No authors found (user not authenticated or no users)
//   $authors = [];  // Set to an empty array
// }
        
       
        
        // $authors = User::select('id', 'name')->get();

        // $authors = Author::all();
        // if ($authors !== null){
        //     $authors_name = $authors->user->name;
        // }


        $authors = Author::all();
        
        $articleCategories = ArticleCategory::all(["articleCategoryName"]);
        $articleTags = Tag::select('id', 'tagName')->get();

        return view("Admin.article.addArticle", compact('articleCategories','articleTags','authors'));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        dd($request);
        $data = $request;
       //use method from traits called uploadFile
       $fileName = $this->uploadFile($request->image, 'assets/images');
       $data['image'] = $fileName;
       $data['approved'] = isset($request->approved);
       $article =Article::create($data);

       // Handle morph relation if applicable
    //    if ($request->has('articleable_type') && $request->has('articleable_id')) {
    //     $articleable = $data['articleable_type']::find($data['articleable_id']);
    //     if ($articleable) {
    //         $article->articleable()->associate($articleable);
    //         $article->save();
    //     }
    // }
       return redirect('admin/allArticle');
    
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articles = Article::findOrFail($id);
        $articleCategories = ArticleCategory::get();
        $authors = Author::get();
        $articleTags = ArticleTag::get();
        $sourceArticles = SourceArticle::get();
        $youtubeLinks = YoutubeLink::get();
        return view('admin.article.articleDetails', compact('articles', 'articleCategories', 'authors', 'articleTags','sourceArticles', 'youtubeLinks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::where('id', $id)->delete();    // softdelete
        return redirect('admin/allArticle');
    }
}
