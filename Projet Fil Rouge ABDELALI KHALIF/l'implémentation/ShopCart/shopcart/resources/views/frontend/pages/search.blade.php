@extends('layouts.app')

@section('content')
{{-- {{$searchProduct}} --}}
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Search Result</h3>
                <div class="underline mb-4"></div>
            </div>
            @forelse ($searchProduct as $item)
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
                            <a href="{{ url('/collections/'.$item->category->name.'/'.$item->name) }}">
                                {{ $item->name }}
                            </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $item->original_price }}</span>
                                <span class="original-price">{{ $item->selling_price }}</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 mb-5 p-5">
                    <div class="display-5 text-center">
                        Not Found
                    </div>
                </div>
            @endforelse

            
        </div>
    </div>
</div>
@endsection


