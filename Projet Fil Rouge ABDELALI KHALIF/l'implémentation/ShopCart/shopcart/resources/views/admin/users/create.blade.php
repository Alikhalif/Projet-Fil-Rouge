@extends('layouts.admin')

@section('content')
<div class="row p-3 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Add User
            <a href="{{ url('admin/users') }}" class="btn btn-primary float-end">Back</a>
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

        <form action="{{ url('admin/users') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value=" " selected>----select role----</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary w-50">Save</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
