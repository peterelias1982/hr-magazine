<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\ArticleTagController;

Route::get('/', function () {
    return view('Admin.article.addArticle   ');
});

Route::group(['prefix'=>"admin"],function(){
    Route::group(['prefix'=>"article"],function(){
        Route::group(['prefix'=>"categories","controller"=>ArticleCategoryController::class,"as"=>"articleCategories."],function(){
            Route::get("/create","create")->name('create');
            Route::get("/","index")->name('index');
            Route::post("/","store")->name('store');
            Route::put("/{slug}","update")->name('update');
            Route::delete("/{slug}","destroy")->name('destroy');
        });

        Route::group(['prefix' => 'tags',"controller"=>ArticleTagController::class,"as"=>"tags."], function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::put('/{slug}', 'update')->name('update');
            Route::delete('/{slug}',  'destroy')->name('destroy');
        });
    });

    Route::group(['prefix'=>"job"],function(){
        Route::group(['prefix' => 'categories',"controller"=>JobCategoryController::class,"as"=>"jobCategories."], function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::put('/{slug}', 'update')->name('update');
            Route::delete('/{slug}',  'destroy')->name('destroy');
        });
    });
});
