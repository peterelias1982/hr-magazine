<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

//Auth::routes(['verify'=>true]);
//we will add ->middleware('verified') after prefix('events') later on for user verification

Route::prefix('events')->group(function () {

//all addresses in this route file are by default preceded by admin/

    //events
    Route::get('create',[EventController::class,'create'])->name('events.create');
    Route::post('/',[EventController::class,'store'])->name('events.store');
    Route::get('/',[EventController::class,'index'])->name('events.index');
    Route::get('/{slug}',[EventController::class,'show'])->name('events.show');
    Route::get('editEvent/{slug}',[EventController::class,'edit'])->name('events.edit');
    Route::put('updateEvent/{slug}',[EventController::class,'update'])->name('events.update');
    Route::get('deleteEvent/{slug}',[EventController::class,'destroy'])->name('events.destroy');

});
