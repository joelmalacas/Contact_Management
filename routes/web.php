<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('Auth.login');});

//Route Admin
Route::prefix('admin')->namespace('')->group(function () {

    //Login (S/ AUTH)
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    });

    //Login (C/ AUTH)
    Route::middleware(['auth:admin'])->group(function () {
        //Route::get('/dashboard', [ContactController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        //CRUD CONTACT
        Route::resource('contact', ContactController::class);
    });
});
