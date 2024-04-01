<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.article.addArticle');
});

Route::prefix('admin')->group(function(){

    // article routes

    Route::get('/articles',[ArticleController::class,'index'])->name('articles.index');

    Route::get('articles/create',[ArticleController::class,'create'])->name('articles.create');

    Route::post('articles/',[ArticleController::class,'store'])->name('articles.store');

    Route::get('articles/{slug}',[ArticleController::class,'show'])->name('articles.show');

    Route::put('articles/{slug}',[ArticleController::class,'update'])->name('articles.update');

    Route::delete('articles/{slug}',[ArticleController::class,'destroy'])->name('articles.destroy');
    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
