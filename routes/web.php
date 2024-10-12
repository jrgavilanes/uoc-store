<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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


Route::post('/checkout-set-guest', function (Request $request) {
    $data = $request->validate([
        'user' => 'required|array',
    ]);

    // Elimino datos de usuario registrado por si viniese en la peticion
    $data['user']['type'] = "guest";
    $data['user']['id'] = null;
    $data['user']['name'] = "";
    $data['user']['email'] = "";
    $data['user']['address'] = "";

    session()->put('user', $data['user']);

    return response()->json(["status" => "ok"]);

})->name('checkout-set-guest');

Route::post('/checkout-login', function (Request $request) {

    try {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'name' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session()->forget('user');
                $data['user']['type'] = "registered";
                $data['user']['id'] = $user->id;
                $data['user']['name'] = $data['name'];
                $data['user']['email'] = $data['email'];
                $data['user']['address'] = $data['address'];
                $data['user']['guest_address'] = "";
                $data['user']['guest_email'] = "";
            session()->put('user', $data['user']);

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



Route::post('/final-checkout', function (Request $request) {

    $data = $request->validate([
        'cart' => 'required|array',
    ]);

    if (!session()->has('user')) {
        return response()->json([
            'status' => 'error',
            'message' => 'You must be logged in to place an order'
        ], 401);
    }

    $order = null;
    if (session()->get('user')['type'] === 'guest') {
        $order = Order::create([
            'user_id' => null,
            'email' => session()->get('user')['guest_email'],
            'address' => session()->get('user')['guest_address'],
        ]);
    } else {
        $order = Order::create([
            'user_id' => session()->get('user')['id'],
            'email' => session()->get('user')['email'],
            'address' => session()->get('user')['address'],
        ]);
    }

    foreach ($data['cart'] as $item) {
        $order->orderLines()->create([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => Product::find($item['product_id'])->price ?? null,
        ]);
    }

    return response()->json([
        'status' => 'ok',
        'order_id' => $order->id,
    ], 201);
})->name('final-checkout');



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
