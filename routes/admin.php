<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JobSeekerController;

Route::group(['prefix' => "events", "controller" => EventController::class, "as" => "events."], function () {
    //events
    Route::get("/create", "create")->name('create');
    Route::post("/", "store")->name('store');
    Route::get("/", "index")->name('index');
    Route::get("/{slug}", "show")->name('show');
    Route::put("/{slug}", "update")->name('update');
    Route::delete("/{slug}", "destroy")->name('destroy');
});

Route::group(['prefix' => "users"], function () {
    //admins
    Route::group(['prefix' => "admins", "controller" => AdminController::class, "as" => "admins."], function () {
        Route::get("/create", "create")->name('create');
        Route::get("/", "index")->name('index');
        Route::post("/", "store")->name('store');
    });

    //job seekers
    Route::group(['prefix' => "job_seekers", "controller" => JobSeekerController::class, "as" => "jobSeekers."], function () {
        Route::get("/", "index")->name('index');
        Route::get("/{slug}", "show")->name('show');
        Route::patch("/{slug}", "update")->name('update');
        Route::delete("/{slug}", "destroy")->name('destroy');
    });

    Route::group(['prefix' => "employers", "controller" => EmployerController::class, "as" => "employers."], function () {
        Route::get("/", "index")->name('index');
    });
});

Route::group(['prefix' => "article"], function () {
    Route::group(['prefix' => "categories", "controller" => ArticleCategoryController::class, "as" => "articleCategories."], function () {
        Route::get("/create", "create")->name('create');
        Route::get("/", "index")->name('index');
        Route::post("/", "store")->name('store');
        Route::put("/{slug}", "update")->name('update');
        Route::delete("/{slug}", "destroy")->name('destroy');

    });
    Route::group(['prefix' => 'tags', "controller" => ArticleTagController::class, "as" => "tags."], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
    });
});

Route::group(["prefix" => 'articles', "controller" => ArticleController::class, "as" => "articles."], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{slug}', 'show')->name('show');
    Route::put('/{slug}', 'update')->name('update');
    Route::delete('/{slug}', 'destroy')->name('destroy');

});

Route::group(['prefix' => "job"], function () {
    Route::group(['prefix' => 'categories', "controller" => JobCategoryController::class, "as" => "jobCategories."], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
    });
});

Route::group(['prefix'=>'jobs', 'controller' => JobDetailController::class, 'as' => 'jobs.'],function(){
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}','show')->name('show');
    Route::delete('/{slug}', 'destroy')->name('destroy');

});
