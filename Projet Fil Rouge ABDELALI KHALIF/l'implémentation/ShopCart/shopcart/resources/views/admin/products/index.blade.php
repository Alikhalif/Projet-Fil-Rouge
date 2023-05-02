@extends('layouts.admin')

@section('content')
<div class="row p-3 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Products
            <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end">Add Product</a>
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
                        <th scope="col">Ctegory</th>
                        <th scope="col">quantity</th>
                        <th scope="col">original_price</th>
                        <th scope="col">selling_price</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $pro)
                        <tr>
                            <th scope="row">{{ $pro->id }}</th>
                            <td>{{ $pro->name }}</td>
                            <td>
                                @if ($pro->category)
                                    {{ $pro->category->name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $pro->quantity }}</td>
                            <td>{{ $pro->original_price }}</td>
                            <td>{{ $pro->selling_price }}</td>
                            {{-- <td>{{ $pro-> }}</td> --}}
                            <td>{{ $pro->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/products/'.$pro->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/products/'.$pro->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data ?')" class="btn btn-sm btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div>{{ $categories->links() }}</div> --}}
        </div>
    </div>
</div>

@endsection
