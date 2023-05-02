<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $order = Order::count();

        $today = Carbon::now()->format('d-m-Y');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $orderDay = Order::whereDate('created_at', $today)->count();
        $orderMonth = Order::whereMonth('created_at', $month)->count();
        $orderYear = Order::whereYear('created_at', $year)->count();
        $totalAmount = Order::sum('totale');

        $product = Product::count();
        $category = Category::count();
        $user = User::where('role_as', 0)->count();

        return view('admin.dashboard',compact('order','orderDay','orderMonth','orderYear','product','category','user','totalAmount'));
    }
}
