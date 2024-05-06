<?php


use App\Http\Controllers\CommentsController;
use App\Http\Controllers\JobSeekerPuplicController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::group(['prefix' => 'job', "controller" => JobSeekerPuplicController::class, "as" => "jobSeeker."], function () {

    Route::get('{job}/jobseeker/{jobseeker}', 'index')->name('index');
    // Route::get('{slug}', 'edit')->name('edit');
});

Route::group(['prefix' => 'profile', "controller" => UserProfileController::class, "as" => "profile."], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/edit/{slug}', 'edit')->name('edit');
    Route::put('/update/{slug}', 'update')->name('update');

    Route::get('download/{file}', 'download')->name('download');
    Route::post('upload/', 'upload')->name('upload');
});

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

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

// requires authentication
Route::group(['middleware' => 'auth'], function () {
    Route::post('comments/', [CommentsController::class, 'store'])->name('comments.store');
    Route::put('comments/{id}', [CommentsController::class, 'update'])->name('comments.update');
    Route::delete('comments/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');
});


