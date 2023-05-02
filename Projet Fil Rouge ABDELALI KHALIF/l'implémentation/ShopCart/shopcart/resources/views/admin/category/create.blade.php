@extends('layouts.admin')

@section('content')
<div class="row p-3 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Add Category
            <a href="{{ url('admin/category') }}" class="btn btn-primary float-end">Back</a>
        </h4>
    </div>
    <div class="w-50 mx-auto mt-3">
        <form action="{{ url('admin/category/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label>description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror

                </div>
                <div class="col-md-12 mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror

                </div>
                <div class="col-md-12 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary w-50">Save</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
