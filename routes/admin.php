<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JobSeekerController;

//Auth::routes(['verify'=>true]);
//we will add ->middleware('verified') after prefix('events') later on for user verification
//all addresses in this route file are by default preceded by admin/

Route::group(['prefix' => "events", "controller" => EventController::class, "as" => "events."], function () {

    //events
    Route::get("/create", "create")->name('create');
    Route::post("/", "store")->name('store');
    Route::get("/", "index")->name('index');
    Route::get("/{slug}", "show")->name('show');
    Route::put("updateEvent/{slug}", "update")->name('update');
    Route::get("deleteEvent/{slug}", "destroy")->name('destroy');
});

Route::group(['prefix' => "users"], function () {

    //admins
    Route::group(['prefix' => "admins", "controller" => AdminController::class, "as" => "admins."], function () {
        Route::get("/create", "create")->name('create');
        Route::get("/", "index")->name('index');
        Route::post("/", "store")->name('store');
    });

    //job seekers
    Route::group(['prefix' => "job_seekers", "controller" => JobSeekerController::class, "as" => "jobSeekers."], function () {
        Route::get("/", "index")->name('index');
        Route::get("/{slug}", "show")->name('show');
        Route::put("updateJobSeeker/{slug}", "update")->name('update');
        Route::get("deleteJobSeeker/{slug}", "destroy")->name('destroy');
    });
});
