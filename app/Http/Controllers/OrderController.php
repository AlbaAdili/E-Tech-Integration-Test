<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $orders = Order::with('orderItems')->get();
        } else {
            $orders = Order::where('user_id', auth()->user()->id)->with('orderItems')->get();
        }

        return view('orders', compact('orders'));
    }
}
