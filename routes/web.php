<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;



Route::get('/', function () {
    return view('publicPages.events.singleEvent');
});

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

Auth::routes();
Route::group(['prefix' => "event", "controller" => EventController::class, "as" => "event."], function () {
    Route::get("allEvents","allEvents")->name('allEvents');
    Route::get("eventCalender","eventCalender")->name('eventCalender');
    Route::get("singleEvent","singleEvent")->name('singleEvent');
});




