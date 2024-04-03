<?php

use App\Http\Controllers\JobDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.article.addArticle');
});
Route::view('details','Admin.jobs.jobdetails');
Route::view('jobs','Admin.jobs.alljobs');
Route::view('add','Admin.jobs.addJob');
Route::view('index','Admin.index');
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'jobs'],function(){
         Route::get('jobs/',[JobDetailController::class,'index'])->name('jobs.index');
         Route::get('jobs/{slug}',[JobDetailController::class,'show'])->name('jobs.show');
         Route::delete('jobs/',[JobDetailController::class,'destroy'])->name('jobs.destroy');

    });
});

