<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function dashboard()
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('home');
        }

        $orders = Order::select('id', 'user_id', 'created_at')->orderBy('id', 'desc')->paginate(10);

        return view('dashboard', compact('orders'));
    }

    public function show($id)
    {
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
    }
}
