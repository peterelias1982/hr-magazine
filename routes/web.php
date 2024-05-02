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

//articles
Route::group(['prefix' => "articles", "controller" => PublicArticleController::class, "as" => "articles."], function () {
    //articles
    Route::get("/industryInsights1", "industryInsights1")->name('industryInsights1');
    Route::get("/industryInsights2", "industryInsights2")->name('industryInsights2');
    Route::get("/industryInsights3", "industryInsights3")->name('industryInsights3');
    Route::get("/ladiesInHR", "ladiesInHR")->name('ladiesInHR');
    Route::get("/legalCompliance", "legalCompliance")->name('legalCompliance');
    Route::get("/professionalDevelopment1", "professionalDevelopment1")->name('professionalDevelopment1');
    Route::get("/professionalDevelopment2", "professionalDevelopment2")->name('professionalDevelopment2');
    Route::get("/professionalDevelopment3", "professionalDevelopment3")->name('professionalDevelopment3');
});

Route::get('category/{category}/article/{article}', function ($category, $article) {
    $categoryData = \App\Models\ArticleCategory::where('slug', $category)->first();
    $articleData = \App\Models\Article::where('slug', $article)->first();

//    if article.category_id not equal category.id abort
    return view('publicPages.articles.articleSingle', compact('categoryData'));
})->name('articleSingle');

Auth::routes();
