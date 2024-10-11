<?php

use App\Models\Category;
use App\Models\Product;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $categories = Category::all();

    return view('home', compact('categories'));
})->name('home');

Route::get('/categories/{slug}', function ($slug) {
    $category = Category::where('slug', $slug)->first();
    if (!$category) {
        abort(404);
    }

    $products = $category->products;
    $categories = Category::all();

    return view('categories', compact('category', 'products', 'categories'));
})->name('categories');

Route::get('/products/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->first();
    if (!$product) {
        abort(404);
    }

    $categories = Category::all();

    return view('products', compact('product', 'categories'));
})->name('products');

Route::get('/cart', function () {
    $categories = Category::all();

    return view('cart', compact('categories'));
})->name('cart');

Route::get('/checkout', function () {
    $categories = Category::all();
    return view('checkout', compact('categories'));
})->name('checkout');

Route::get('/order-summary', function () {
    $categories = Category::all();
    return view('order-summary', compact('categories'));
})->name('order-summary');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->is_admin) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('home')->with('logged', 'You are logged in');
        }
    }

    return redirect()->route('login')->with('error', 'wrong email or password')->withInput();
})->name('login.post');

Route::post('/checkout-login', function (Request $request) {

    try {
        // Realiza la validación
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'status' => 'success',
                'message' => 'You are logged in',
                'user_id' => $user->id
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'wrong email or password'
            ], 401);
        }
    } catch (ValidationException $e) {
        // Captura los errores de validación y los devuelve en JSON
        return response()->json([
            'status' => 'validation_error',
            'errors' => $e->errors()
        ], 422);
    }
})->name('checkout-login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->middleware('auth')->name('logout');
