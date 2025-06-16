<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', [EventController::class, 'showHome'])->name('home');
Route::get('explore', [EventController::class, 'showExplore'])->name('explore');
Route::get('event/{event}', [EventController::class, 'show'])->name('event.show');
// Reporte del evento
Route::get('/events/{event}/report', [EventController::class, 'downloadEventReport'])->name('events.downloadReport');

Route::prefix('dashboard')->middleware(['auth','role:admin|user'])->group(function () {
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'showMyEvents'])->name('events.index');
        Route::get('create', [EventController::class, 'create'])->name('event.create');
        Route::post('store', [EventController::class, 'store'])->name('event.store');
        Route::get('edit/{event}', [EventController::class, 'edit'])->name('event.edit');
        Route::patch('{event}', [EventController::class, 'update'])->name('event.update');
        Route::delete('/delete/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    });
});

