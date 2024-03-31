<?php

use App\Http\Controllers\ArticleCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.index');
});

Route::group(['prefix'=>"Admin"],function(){
    Route::group(['prefix'=>"articles"],function(){
        Route::group(['prefix'=>"categories","controller"=>ArticleCategoryController::class,"as"=>"categories."],function(){
            Route::get("/create","create")->name('create');
            Route::get("/","index")->name('index');
            Route::post("/","store")->name('store');
            Route::put("/{slug}/{id}","update")->name('update');
            Route::delete("/{slug}","destroy")->name('destroy');
        });
    });
});