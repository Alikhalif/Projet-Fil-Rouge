@extends('layouts.app')

@section('title', 'All Products')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>

            <livewire:frontend.product.index :category="$category" :products="$products"/>
        </div>
    </div>
</div>
@endsection
