@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- {{$categories}}
///
{{$products}} --}}

<div class="">
    <div class="d-flex flex-column-reverse flex-lg-row m-auto w-100">
        <div class="mx-auto p-3 w-50-lg">
            <h1 class="p-3 display-3">Shopping And <br> Deppartment <br> Store.</h1>
            <p class="p-3 lead">shopping is a bit of relaxing hobby for me, which is sometimes <br> troubling for the bank balance</p>
            <a class="m-3 btn btn-primary" href="{{ url('/products') }}">Learn More</a>
        </div>

        <div class="mx-auto w-50-lg">
            <div class="">
                <img src="/uploads/app/homeimg2.png" class="home-img" alt="">
            </div>
        </div>
    </div>


    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                    <h4 class="mb-4">Our Categories</h4>
                    <a href="{{ url('/collections') }}" class="link mb-4">All Categories</a>
                </div>

                @forelse ($categories as $item)

                    <div class="col-12 col-md-3">
                        <div class="category-card">
                            <a href="{{ url('/collections/'.$item->name) }}">
                                <div class="category-card-img">
                                    <img src="{{$item->image}}" class="w-100" alt="{{$item->name}}">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No categories</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 d-flex justify-content-between">
                    <h4 class="mb-4">Our Products</h4>
                    <a href="{{ url('/products') }}" class="link mb-4">All Products</a>
                </div>

                @forelse ($products as $item)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($item->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif

                                <a href="{{ url('/collections/'.$item->category->name.'/'.$item->name) }}">
                                    @if ($item->productImage->count() > 0)
                                    <img src="{{asset($item->productImage[0]->image)}}" alt="{{$item->name}}">
                                    @endif
                                </a>
                            </div>
                            <div class="product-card-body">
                                <h5 class="product-name">
                                <a class="category-name" href="{{ url('/collections/'.$item->category->name.'/'.$item->name) }}">
                                    {{ $item->name }}
                                </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{ $item->selling_price }}</span>
                                    <span class="original-price">${{ $item->original_price }}</span>
                                </div>
                                {{-- <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>

                                </div> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <div>
                            <h4>No Products for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>





@endsection
