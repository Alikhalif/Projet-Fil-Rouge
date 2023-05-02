<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function categories(){
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        if($category){
            $products = $category->Products()->get();
            return view('frontend.collections.products.index', compact('products','category'));
        }else{
            return redirect()->back();
        }
    }

    public function productView(string $category_name, string $product_name)
    {
        $category = Category::where('name', $category_name)->first();
        if($category){

            $products = $category->Products()->where('name', $product_name)->where('status','0')->first();
            if($products){
                return view('frontend.collections.products.view', compact('products','category'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function allproduct(){
        $products = Product::where('status',0)->orderBy('created_at','DESC')->get();
        return view('frontend.collections.products.allproduct', compact('products'));
    }

    public function searchProducts(Request $request){
        if($request->search){
            $searchProduct = Product::where('name','LIKE','%'.$request->search.'%')->get();
            return view('frontend.pages.search', compact('searchProduct'));

        }else{
            return redirect()->back()->with('message','Empty Search');
        }
    }
}
