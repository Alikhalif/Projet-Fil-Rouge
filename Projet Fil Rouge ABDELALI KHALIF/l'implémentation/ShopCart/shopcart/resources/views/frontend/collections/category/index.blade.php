@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

<div class="mb-5 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>

            @forelse ($categories as $item)

                <div class="col-6 col-md-3">
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


@endsection


