<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();


Route::view('/', 'home')->name('home');
Route::view('/explore', 'explore')->name('explore');

Route::view('/dashboard', 'dashboard.home')->name('dashboard')->middleware('auth');
Route::view('/dashboard/events', 'dashboard.events')->name('dashboard.events')->middleware('auth');
Route::view('/dashboard/event/edit', 'dashboard.event-edit')->name('dashboard.event-edit')->middleware('auth');
Route::view('/dashboard/tickets', 'dashboard.tickets')->name('dashboard.tickets')->middleware('auth');



//Middleware para distinción de roles

Route::prefix('dashboard')->middleware(['auth','role:admin|user'])->group(function () {


    //Usuarios y admins



    //Admins
    Route::prefix('admin')->middleware('role:admin')->group(function(){
        //Rutas CRUD usuarios (/dashboard/admin/users)
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


    });
});

