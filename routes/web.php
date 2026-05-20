<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class.'@index')->name('home');

/* Authentication */
Route::middleware('guest')->group(function () {
    Route::get('/signin', AuthController::class.'@signin',)->name('signin');
    Route::post('/signin', AuthController::class.'@signinSubmit',)->name('signin-submit');
    Route::get('/login', AuthController::class.'@login',)->name('login');
    Route::post('/login', AuthController::class.'@loginSubmit',)->name('login-submit');
});
Route::delete('/logout', AuthController::class.'@logout',)->middleware('auth')->name('logout');
