<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/products/{id}', function ($id) {
    return view('products', ['id' => $id]);
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/order-summary', function () {
    return view('order-summary');
})->name('order-summary');


