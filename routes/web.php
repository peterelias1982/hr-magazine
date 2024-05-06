<?php


use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\PublicEmployer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('publicPages.404');
});

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

// employers routes
Route::group(['prefix' => "employers", "controller" => PublicEmployer::class, "as" => "employers."], function () {

    Route::get('/employerProfile', function () {
        return view('publicPages.users.employers.employerProfile');
    })->name('employerProfile');
    Route::get('/editEmployerProfile', function () {
        return view('publicPages.users.employers.editEmployerProfile');
    })->name('editEmployerProfile');
    Route::get("/employerProfile/{slug}", "show")->name('show');
    Route::get("/editEmployerProfile/{slug}", "edit")->name('edit');
    Route::put("/update/{slug}", "update")->name('update');
    Route::get("/deleteAccount/{slug}","destroy")->name('destroy');
});

Route::get('category/{category}/article/{article}', [PublicArticleController::class, 'single'])->name('articleSingle');

Route::get('/', function () {
    return view('publicPages.events.eventCalender');
});

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

Route::get('/404', function () {
    return view('publicPages.404');
})->name('404');
