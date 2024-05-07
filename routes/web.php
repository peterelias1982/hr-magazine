<?php

use App\Http\Controllers\PublicArticleController;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EventController;



Route::get('/home', function () {
    return view('publicPages.events.allEvents');
})->name('index');


Auth::routes();

// article routes
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
    Route::get("/workPlaceCultureAndWellBeing", "workPlaceCultureAndWellBeing")->name('workPlaceCultureAndWellBeing');
});

Route::get('category/{category}/article/{article}', [PublicArticleController::class, 'articleSingle'])->name('articleSingle');
Route::get('authors/{author}', [PublicArticleController::class, 'authorSingle'])->name('authorSingle');

// events
Route::group(['prefix' => "events", "controller" => EventController::class, "as" => "event."], function () {
    Route::get("allEvents","allEvents")->name('allEvents');
    Route::get("eventCalender","eventCalender")->name('eventCalender');
    Route::get("singleEvent/{slug}","singleEvent")->name('singleEvent');
});

// jobs
Route::group(['prefix' => "jobs", "controller" => JobController::class, "as" => "jobs."], function () {
    Route::get("postJob","create")->name('create');
    Route::post("postJob","store")->name('store');
    Route::get("jobsPosted","index")->name('jobsPosted');
    Route::get("jobDetails/{slug}","show")->name('jobDetails');
    Route::get("browseJobs","browseJobs")->name('browseJobs');
});


Route::get('test', function () {
   return view('publicPages.jobs.jobOpportunitiesAndCareerResource');
});



