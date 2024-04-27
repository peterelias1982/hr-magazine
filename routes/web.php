<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('publicPages.articles.legalComplianceSingle');
});

Route::get('/home', function () {
    return view('publicPages.home');
});

Auth::routes();




