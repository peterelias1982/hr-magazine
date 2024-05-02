<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/', function () {
    return view('publicPages.events.eventCalender');
});

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

Route::get('category/{category}/article/{article}', function ($category, $article) {
    $categoryData = \App\Models\ArticleCategory::where('slug', $category)->first();
    $articleData = \App\Models\Article::where('slug', $article)->first();

//    if article.category_id not equal category.id abort
    return view('publicPages.articles.articleSingle', compact('categoryData', 'articleData'));
});

Auth::routes();


Route::get('test', function () {
   return view('publicPages.jobs.applyForAJobNotLogin');
});


