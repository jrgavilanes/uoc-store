<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('cart', compact('categories'));
    }

    public function checkout()
    {
        $categories = Category::all();
        return view('checkout', compact('categories'));
    }

    public function setGuest(Request $request)
    {
        $data = $request->validate(['user' => 'required|array']);
        session()->put('user', [
            'type' => 'guest',
            'id' => null,
            'name' => '',
            'email' => '',
            'address' => '',
            'guest_address' => $data['user']['guest_address'] ?? '',
            'guest_email' => $data['user']['guest_email'] ?? ''
        ]);
        return response()->json(["status" => "ok"]);
    }

    public function checkoutLogin(Request $request)
    {
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
            return response()->json([
                'status' => 'validation_error',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function finalCheckout(Request $request)
    {
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

    }

    public function orderSummary()
    {
        $categories = Category::all();
        return view('order-summary', compact('categories'));
    }
}
