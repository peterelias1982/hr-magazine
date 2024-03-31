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
use App\Traits\Common;
use Illuminate\Http\Response;


class ArticleController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $article=Article::get();
        // return view('admin.article.articleDetails',compact('article'));

        $articles = Article::with(['articleComments', 'sourceArticles', 'youtubeLinks', 'articleCategories' ,'authors','tags'])
        ->get();
        return view('admin.article.articleDetails', compact('articles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articleCategories = ArticleCategory::all(["articleCategoryName"]);
        $authors = User::select('id', 'name')->get();
        $tags = Tag::all(['tagName']);

        return view("Admin.article.addArticle", compact('articleCategories', 'authors', 'tags'));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
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
    public function destroy(Article $article)
    {
        //
    }
}
