<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobDetailController;

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.article.addArticle');
});


Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'jobs'],function(){
         Route::get('jobs/',[JobDetailController::class,'index'])->name('jobs.index');
         Route::get('jobs/{slug}',[JobDetailController::class,'show'])->name('jobs.show');
         Route::delete('jobs/',[JobDetailController::class,'destroy'])->name('jobs.destroy');

    });
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
    
        Route::group(['prefix'=>"users"],function(){
            Route::group(['prefix'=>"admins","controller"=>AdminController::class,"as"=>"admins."],function(){
                Route::get("/create","create")->name('admin.create');
                Route::get("/","index")->name('admin.index');
                Route::post("/","store")->name('store');
                Route::put("/{slug}","update")->name('update');
                Route::delete("/{slug}","destroy")->name('destroy');
            });
        });
        Route::group(['prefix'=>"users"],function(){
            Route::group(['prefix'=>"authors","controller"=>AuthorController::class,"as"=>"authors."],function(){
                Route::get("/create","create")->name('create');
                Route::get('/test','test');
                Route::get("/","index")->name('index');
                Route::post("/","store")->name('store');
                Route::put("/{slug}","update")->name('author.update');
                Route::delete("/{slug}","destroy")->name('author.destroy');
            });
        });
      
});

