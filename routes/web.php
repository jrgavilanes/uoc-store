<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


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
        $user = Auth::user();
        session()->forget('user');
            $data['user'] = [];
            $data['user']['type'] = "registered";
            $data['user']['id'] = $user->id;
            $data['user']['name'] = $user->name;
            $data['user']['email'] = $user->email;
            $data['user']['address'] = $user->address;
            $data['user']['guest_address'] = "";
            $data['user']['guest_email'] = "";
        session()->put('user', $data['user']);

        if (Auth::user()->is_admin) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('home');
        }
    }

    return redirect()->route('login')->with('error', 'wrong email or password')->withInput();

})->name('login.post');



Route::get('/dashboard', function () {

    $user = Auth::user();

    if (!$user->is_admin) {
        return redirect()->route('home');
    }

    $orders = Order::select('id', 'user_id', 'created_at')
        ->orderBy('id', 'desc')
        ->paginate(10);

    return view('dashboard', compact('orders'));

})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    session()->forget('user');
    return redirect()->route('home');
})->middleware('auth')->name('logout');






Route::get('/purchase-detail/{id}', function ($id) {
    $user = Auth::user();

    if (! $user->is_admin) {
        return redirect()->route('home');
    }

    $purchase = Order::find($id);

    $orderTotal = OrderLine::where('order_id', $id)
                ->selectRaw('SUM(price * quantity) as total')
                ->value('total');

    $orderTaxes = $orderTotal / 1.21 * 0.21;
    $orderTaxes = round($orderTaxes, 2);

    return view('purchase-detail', compact('purchase', 'orderTotal', 'orderTaxes'));
})->middleware('auth')->name('purchase-detail');
