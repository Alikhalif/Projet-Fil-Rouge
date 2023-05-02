<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('status',0)->orderBy('id','DESC')->skip(0)->take(4)->get();
        $categories = Category::where('status',0)->skip(0)->take(4)->get();
        return view('home',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
