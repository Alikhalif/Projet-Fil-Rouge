<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        // dd('ok');
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        // dd('ok');
        // $validatedData = $request->validate();
        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
            'image' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->discription = $request->input('description');

        $pah = 'uploads/category/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $pah.$filename;
        }

        $category->status = $request->status == true ? '1':'0';

        $category->save();

        return redirect('admin/category')->with('message','Category Add Successfully');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category){
        $category = Category::find($category);

        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
            'image' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->discription = $request->input('description');

        if($request->hasFile('image')){
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->status = $request->status == true ? '1':'0';

        $category->update();

        return redirect('admin/category')->with('message','Category Updated Successfully');
    }
}
