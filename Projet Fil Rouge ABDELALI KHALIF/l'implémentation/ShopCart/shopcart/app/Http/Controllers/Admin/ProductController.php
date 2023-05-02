<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductFormRequest $request){

        // dd($request);
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'quantity' => $validatedData['Quantity'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'status' => $request->status == true ? '1':'0',
        ]);
        // dd($product->id);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            foreach($request->file('image') as $imageFile){
                // dd($imageFile);
                $extention = $imageFile->getClientOriginalName();
                $filename = time().'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $imagePathName = $uploadPath.$filename;

                $product->productImage()->create([
                    'product_id' => $product->id,
                    'image' => $imagePathName,
                ]);
            }
        }

        return redirect('/admin/products')->with('message','Product Added Successfully');
    }

    public function edit(int $product_id){
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(ProductFormRequest $request, int $product_id){
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                        ->Products()->where('id', $product_id)->first();
        if($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'quantity' => $validatedData['Quantity'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                // 'image' => $validatedData['image'],
                'status' => $request->status == true ? '1':'0',
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';

                foreach($request->file('image') as $imageFile){
                    // dd($imageFile);
                    $extention = $imageFile->getClientOriginalName();
                    $filename = time().'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $imagePathName = $uploadPath.$filename;

                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => $imagePathName,
                    ]);
                }
            }

            return redirect('/admin/products')->with('message','Product Updated Successfully');

        }
        else{
            return redirect('admin/products')->with('message','No Such Product Id Found');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted Successfully');

    }

    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->productImage){
            foreach($product->productImage as $img){
                if(File::exists($img->image)){
                    File::delete($img->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }
}
