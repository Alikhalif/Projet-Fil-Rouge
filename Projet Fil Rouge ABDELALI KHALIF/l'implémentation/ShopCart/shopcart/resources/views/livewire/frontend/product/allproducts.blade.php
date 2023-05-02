<div>
    <div>
        <div class="row">
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
                            <a href="{{ url('/collections/'.$item->category->name.'/'.$item->name) }}">
                                {{ $item->name }}
                            </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{ $item->selling_price }}</span>
                                <span class="original-price">${{ $item->original_price  }}</span>
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
