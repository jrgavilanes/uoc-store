<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Home and Categories
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{slug}', [HomeController::class, 'showCategory'])->name('categories');

// Products
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products');

// Cart and Checkout
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout-set-guest', [CartController::class, 'setGuest'])->name('checkout-set-guest');
Route::post('/checkout-login', [CartController::class, 'checkoutLogin'])->name('checkout-login');
Route::post('/final-checkout', [CartController::class, 'finalCheckout'])->name('final-checkout');
Route::get('/order-summary', [CartController::class, 'orderSummary'])->name('order-summary');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Orders (Admin)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('dashboard');
    Route::get('/purchase-detail/{id}', [OrderController::class, 'show'])->name('purchase-detail');
});
