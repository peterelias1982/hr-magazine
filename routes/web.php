<?php

use App\Http\Controllers\PublicArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('publicPages.events.eventCalender');
});

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

<<<<<<< HEAD
//articles
Route::group(['prefix' => "articles", "controller" => PublicArticleController::class, "as" => "articles."], function () {
    //articles
    Route::get("/industryInsights1", "industryInsights1")->name('industryInsights1');
    Route::get("/industryInsights2", "industryInsights2")->name('industryInsights2');
    Route::get("/industryInsights3", "industryInsights3")->name('industryInsights3');
    Route::get("/ladiesInHR", "ladiesInHR")->name('ladiesInHR');
    Route::get("/legalCompliance", "legalCompliance")->name('legalCompliance');
});

=======
>>>>>>> 9ad2dbfb012466bd1e3ab9a9c8319d4ad567ef89
Route::get('category/{category}/article/{article}', function ($category, $article) {
    $categoryData = \App\Models\ArticleCategory::where('slug', $category)->first();
    $articleData = \App\Models\Article::where('slug', $article)->first();

//    if article.category_id not equal category.id abort
<<<<<<< HEAD
    return view('publicPages.articles.articleSingle', compact('categoryData'));
})->name('articleSingle');
=======
    return view('publicPages.articles.articleSingle', compact('categoryData', 'articleData'));
});
>>>>>>> 9ad2dbfb012466bd1e3ab9a9c8319d4ad567ef89

Auth::routes();
