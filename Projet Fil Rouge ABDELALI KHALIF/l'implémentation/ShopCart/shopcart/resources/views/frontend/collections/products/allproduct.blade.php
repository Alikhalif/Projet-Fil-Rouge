@extends('layouts.app')

@section('title', 'All Products')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>

            <livewire:frontend.product.allproducts :products="$products"/>
        </div>
    </div>
</div>
@endsection
