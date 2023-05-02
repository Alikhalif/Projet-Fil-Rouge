@extends('layouts.admin')

@section('content')

<div class="row p-3 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Users
            <a href="{{ url('admin/users/create') }}" class="btn btn-primary float-end">Add Users</a>
        </h4>
    </div>
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role_as == 1)
                                    <label class="btn btn-success">Admin</label>
                                @else
                                    <label class="btn btn-primary">User</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data ?')" class="btn btn-sm btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection

