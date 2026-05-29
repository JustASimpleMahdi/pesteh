<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/order/{order}/verified/', [OrderController::class, 'verifiedOrder'])->name('order.verified');
Route::get('/payment/verify', [OrderController::class, 'verifyPayment'])->name('payment.verify');

Route::middleware(['auth'])->group(function () {
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
});

/* Cart */
Route::middleware(['auth'])->group(function () {
    Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
});

/* Product */
Route::get('/product/{code}', [ProductController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function () {
    Route::post('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
    Route::get('/profile/address', [ProfileController::class, 'address'])->name('profile.address');
    Route::put('/profile/info', [ProfileController::class, 'update'])->name('profile.info.update');
    Route::get('/profile/info', [ProfileController::class, 'info'])->name('profile.info');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

/* Home Page */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* Authentication */
Route::middleware('guest')->group(function () {
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/signin', [AuthController::class, 'signinSubmit'])->name('signin-submit');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login-submit');
});
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
