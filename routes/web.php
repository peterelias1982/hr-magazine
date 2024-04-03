<?php

use App\Http\Controllers\ArticleCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('Admin.article.addArticle');
});

Route::group(['prefix'=>"admin"],function(){
    Route::group(['prefix'=>"articles"],function(){
        Route::group(['prefix'=>"categories","controller"=>ArticleCategoryController::class,"as"=>"categories."],function(){
            Route::get("/create","create")->name('create');
            Route::get("/","index")->name('index');
            Route::post("/","store")->name('store');
            Route::put("/{slug}","update")->name('update');
            Route::delete("/{slug}","destroy")->name('destroy');
        });
    });


        Route::group(['prefix' => 'jobCategories',"controller"=>JobCategoryController::class,"as"=>"jobsCategories."], function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::patch('/{slug}', 'update')->name('update');
            Route::delete('/{slug}',  'destroy')->name('destroy');
        });



        Route::group(['prefix' => 'tags',"controller"=>TagController::class,"as"=>"tags."], function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::patch('/{slug}', 'update')->name('update');
            Route::delete('/{slug}',  'destroy')->name('destroy');
        });

});
