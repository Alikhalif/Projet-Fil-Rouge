@extends('layouts.admin')

@section('content')
<div class="row p-3 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Edit Category
            <a href="{{ url('admin/category') }}"  class="btn btn-primary float-end">Back</a>
        </h4>
    </div>
    <div class="w-50 mx-auto mt-3">
        <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label>description</label>
                    <textarea type="text" name="description" class="form-control">{{$category->discription}}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror

                </div>
                <div class="col-md-12 mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <img src="{{ asset($category->image) }}" width="60px" height="60px" alt="" srcset="">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status" value="{{ $category->status == '1' ? 'checked':'' }}">
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary w-50">Edit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
