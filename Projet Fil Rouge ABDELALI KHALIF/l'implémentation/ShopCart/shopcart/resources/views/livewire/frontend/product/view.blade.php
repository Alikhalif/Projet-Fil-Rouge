<div>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3 ">
                    <div class="slide bg-white border text-center">
                        @if ($products->productImage)
                            <img src="{{ asset($products->productImage[0]->image) }}" class="w-100" style="max-height:500px; max-width:400px;" alt="Img">
                        @else
                            No Image Added
                        @endif
                    </div>
                    <div class="option d-flex justify-content-center flex-wrap ">
                        @foreach ($products->productImage as $item)
                            <img src="{{ asset($item->image) }}" width="67px" style="max-height:400px; max-width:350px;" alt="Img">
                        @endforeach

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view ">
                        <h4 class="product-name d-flex justify-content-between flex-wrap">
                            {{ $products->name }}

                            @if ($products->quantity > 0)
                                <label class="label-stock bg-success">In Stock</label>
                            @else
                                <label class="label-stock bg-danger">Out Of Stock</label>
                            @endif
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$products->category->name}} / {{$products->name}}
                        </p>
                        <div>
                            <span class="selling-price">${{$products->selling_price}}</span>
                            <span class="original-price">${{$products->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <button class="btn btn2" wire:click="decrementQuantity"><i class="fa fa-minus"></i></button>
                                <input type="text" wire:model="quantityCount" value="{{ $quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn2"wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-1">Description</h5>
                            <p>
                                {{$products->description}}
                            </p>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$products->id}})" class="">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
