<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;


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
    });

    Route::group(["controller" => ArticleController::class, "as" => "articles."], function () {
        Route::get('/articles', 'index')->name('index');
        Route::get('articles/create', 'create')->name('create');
        Route::post('articles/', 'store')->name('store');
        Route::get('articles/{slug}', 'show')->name('show');
        Route::put('articles/{slug}', 'update')->name('update');
        Route::delete('articles/{slug}', 'destroy')->name('destroy');
        
    });


    Route::group(['prefix' => "users"], function () {
        Route::group(['prefix' => "admins", "controller" => AdminController::class, "as" => "admins."], function () {
            Route::get("/create", "create")->name('create');
            Route::get("/", "index")->name('index');
            Route::post("/", "store")->name('store');
            Route::get("/{slug}", "show")->name('show');
            Route::put("/{slug}", "update")->name('update');
            Route::delete("/{slug}", "destroy")->name('destroy');
        });
    });
});

