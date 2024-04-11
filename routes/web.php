<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\JobDetailController;
use App\Http\Controllers\JobCategoryController;


Route::get('/', function () {
    return view('Admin.event.addEvent');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


