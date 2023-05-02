@extends('layouts.app')

@section('title')
{{ $products->name }}
@endsection


@section('content')

    <div>
        @livewire('frontend.product.view', ['category' => $category,'products' => $products])
        {{-- <livewire:frontend.product.view :category="$category" :products="$products" /> --}}
    </div>
@endsection
