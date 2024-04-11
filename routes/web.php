<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\JobDetailController;
use App\Http\Controllers\JobCategoryController;


Route::get('/', function () {
    return view('Admin.article.addArticle');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => "admin"], function () {
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
});

