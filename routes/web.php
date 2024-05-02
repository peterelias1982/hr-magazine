<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EventController;


Route::get('/', function () {
    return view('publicPages.events.eventCalender');
});

Route::get('/home', function () {
    return view('publicPages.events.allEvents');
})->name('index');

Route::get('category/{category}/article/{article}', function ($category, $article) {
    $categoryData = \App\Models\ArticleCategory::where('slug', $category)->first();
    $articleData = \App\Models\Article::where('slug', $article)->first();

//    if article.category_id not equal category.id abort
    return view('publicPages.articles.articleSingle', compact('categoryData', 'articleData'));
});

Route::get('category/{category}/article/{article}', function ($category, $article) {
    $categoryData = \App\Models\ArticleCategory::where('slug', $category)->first();
    $articleData = \App\Models\Article::where('slug', $article)->first();

//    if article.category_id not equal category.id abort
    return view('publicPages.articles.articleSingle', compact('categoryData', 'articleData'));
});

Auth::routes();
Route::group(['prefix' => "event", "controller" => EventController::class, "as" => "event."], function () {
    Route::get("allEvents","allEvents")->name('allEvents');
    Route::get("eventCalender","eventCalender")->name('eventCalender');
    Route::get("singleEvent/{slug}","singleEvent")->name('singleEvent');
});


Route::get('test', function () {
   return view('publicPages.jobs.jobsIndex');
});



