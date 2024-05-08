<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\PublicEmployer;
use App\Http\Middleware\CheckEmployerMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    Route::get("postJob","create")->name('create')->middleware(CheckEmployerMiddleware::class);
    Route::post("postJob","store")->name('store')->middleware(CheckEmployerMiddleware::class);
    Route::get("jobsPosted","index")->name('jobsPosted')->middleware(CheckEmployerMiddleware::class);
    Route::get("jobDetails/{slug}","show")->name('jobDetails');
    Route::get("browseJobs","browseJobs")->name('browseJobs');
});

// employers routes
Route::group(['prefix' => "employers", "controller" => PublicEmployer::class, "as" => "employers."], function () {
    Route::get("employerProfile/{slug}", "show")->name('show');
    Route::get("editEmployerProfile/{slug}", "edit")->name('edit')->middleware(CheckEmployerMiddleware::class);
    Route::put("update/{slug}", "update")->name('update')->middleware(CheckEmployerMiddleware::class);
    Route::get("deleteAccount/{slug}","destroy")->name('destroy')->middleware(CheckEmployerMiddleware::class);;
});

// requires authentication
Route::group(['middleware' => 'auth'], function () {
    // comments
    Route::post('comments/', [CommentsController::class, 'store'])->name('comments.store');
    Route::put('comments/{id}', [CommentsController::class, 'update'])->name('comments.update');
    Route::delete('comments/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

    Route::get('profile', function () {
       if(\App\Models\Employer::where('user_id', Auth::user()->id)->first()) {
           return redirect()->route('employers.show', Auth::user()->slug);
       }
    })->name('profile');
});

Route::get('/home', [HomeController::class, 'index'])->name('index');

// contact us
Route::get('/contactUs', [HomeController::class, 'contactUs'])->name('contactUs');
Route::post('/storeContact', [HomeController::class, 'storeContact'])->name('storeContact');
Route::get('/afterContactUs', function () {
    return view('publicPages.afterContactUs');
})->name('afterContactUs');



Route::get('/about', function () {
    return view('publicPages.about');
})->name('about');


Route::get('jobOpportunities', function () {
    return view('publicPages.jobs.jobOpportunitiesAndCareerResource');
})->name('jobOpportunities');

Route::fallback(function () {
    return redirect()->route('index');
});

