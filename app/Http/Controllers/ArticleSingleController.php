<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;
use Illuminate\Http\Request;
use Cohensive\Embed\Facades\Embed;
use Illuminate\Support\Facades\DB;

class ArticleSingleController extends Controller
{
    public function index(string $category, string $article){
        $categoryData = ArticleCategory::where('slug', $category)->first();
        $articleData = DB::table('articles')
            ->join('authors', 'authors.id', '=', 'articles.author_id')
           ->where("slug", $article)
            ->first();
        $user=DB::table('authors')
        ->join('users', 'users.id', '=', 'authors.user_id')
        ->where('authors.user_id', $articleData->user_id)
        ->first();
       $youtube=DB::table('youtube_links')
       ->join('articles', 'articles.id', '=', 'youtube_links.article_id')
      ->where("slug", $article)
       ->first();
      
       $source=DB::table('source_articles')
       ->join('articles', 'articles.id', '=', 'source_articles.article_id')
      ->where("slug", $article)
       ->first();
      
       
        return view('publicPages.articles.articleSingle', compact('categoryData', 'articleData','user','youtube','source'));
    }
    
}
