@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-body text-white mb-4">
            <p>Orders</p>
            <h1>{{ $order }}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body text-white mb-4">
            <p>Total Amount</p>
            <h1>${{ $totalAmount }}</h1>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="card card-body text-white mb-4">
            <p>Products</p>
            <h1>{{ $product }}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body text-white mb-4">
            <p class="x">Category</p>
            <h1>{{ $category }}</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card card-body text-white mb-4">
            <p>Users</p>
            <h1>{{ $user }}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body text-white mb-4">
            <p>Orders in Day</p>
            <h1>${{ $orderDay }}</h1>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="card card-body text-white mb-4">
            <p>Orders in month</p>
            <h1>{{ $orderMonth }}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body text-white mb-4">
            <p>Orders in Year</p>
            <h1>{{ $orderYear }}</h1>
        </div>
    </div>
</div>
@endsection
