<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at','DESC')->get();
        return view('frontend.order.index',[
            'orders' => $orders
        ]);
    }
}
