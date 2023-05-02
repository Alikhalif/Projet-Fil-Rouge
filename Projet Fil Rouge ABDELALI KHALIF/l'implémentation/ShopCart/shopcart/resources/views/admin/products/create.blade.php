@extends('layouts.admin')

@section('content')
<div class="row p-3 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Add Product
            <a href="{{ url('admin/products') }}" class="btn btn-primary float-end">Back</a>
        </h4>
    </div>
    <div class="mx-auto mt-3">

        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $err)
                    <div>{{$err}}</div>
                @endforeach

            </div>
        @endif

        <form action="{{ url('admin/products/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Quantity</label>
                    <input type="number" name="Quantity" class="form-control">
                    @error('Quantity') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Original Price</label>
                    <input type="number" name="original_price" class="form-control">
                    @error('original_price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Selling Price</label>
                    <input type="number" name="selling_price" class="form-control">
                    @error('selling_price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror

                </div>
                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value=" " selected>--------</option>
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{ $cat->name }}</option>
                        @endforeach

                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror

                </div>
                <div class="col-md-12 mb-3">
                    <label for="file-upload">Image</label>
                    <input type="file" name="image[]" class="form-control" multiple>
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror

                </div>
                <div class=" col-md-6 ">
                    <label>Status</label>
                    <input type="checkbox" name="status" class="m-2" style="width: 20px; height:20px;">
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary w-50">Save</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
