<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('publicPages.articles.single.wellnessProgramsSingle');
});

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

Auth::routes();




