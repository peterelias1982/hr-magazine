<?php

<<<<<<< HEAD
use App\Http\Controllers\JobDetailController;
=======
use App\Http\Controllers\ArticleCategoryController;
>>>>>>> 92be2b5d00f49e93041e970f7b8ec9e52fe9e212
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('Admin.index');
});
<<<<<<< HEAD
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

=======

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
});
>>>>>>> 92be2b5d00f49e93041e970f7b8ec9e52fe9e212
