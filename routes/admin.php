<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ArticleTagController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobDetailController;
use App\Http\Controllers\Admin\JobSeekerController;
use Illuminate\Support\Facades\Route;

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
        Route::get("/", "index")->name('index');
        Route::get("/create", "create")->name('create');
        Route::post("/", "store")->name('store');
        Route::get("/{slug}", "show")->name('show');
        Route::put("/{slug}", "update")->name('update');
        Route::delete("/{slug}", "destroy")->name('destroy');
    });

    //job seekers
    Route::group(['prefix' => "job_seekers", "controller" => JobSeekerController::class, "as" => "jobSeekers."], function () {
        Route::get("/", "index")->name('index');
        Route::get("/{slug}", "show")->name('show');
        Route::patch("/{slug}", "update")->name('update');
        Route::delete("/{slug}", "destroy")->name('destroy');
    });

    //employers
    Route::group(['prefix' => "employers", "controller" => EmployerController::class, "as" => "employers."], function () {
        Route::get("/", "index")->name('index');
        Route::get("/{slug}", "show")->name('show');
        Route::delete("/{slug}", "destroy")->name('destroy');
        Route::patch("/{slug}","update")->name('update');
    });

    //authors
    Route::group(['prefix' => 'authors', "controller" => AuthorController::class, "as" => "authors."], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{slug}','show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
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
    Route::get('/search', 'search')->name('search');
    Route::get('/{slug}','show')->name('show');
    Route::delete('/{slug}', 'destroy')->name('destroy');

});

