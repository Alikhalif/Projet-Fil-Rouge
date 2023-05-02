<div>
    <section class="h-100">
        <div class="container h-100 py-1">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>

                </div>

                @forelse ($cartItem as $item)
                {{-- {{$item}} --}}
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                            <img
                                src="{{asset($item->product->productImage[0]->image)}}"
                                class="img-fluid rounded-3 w-lg-100" alt="" >
                                {{-- style="width: 60px;  --}}

                            </div>
                            <div class="col-md-12 col-lg-3 col-xl-3">
                                <a class="link" href="{{ url('collections/'.$item->product->category->name.'/'.$item->product->name) }}">
                                    <p class="lead fw-normal mb-2">{{$item->product->name}}</p>
                                </a>
                            </div>
                            <div class="col-md-12 col-lg-3 col-xl-2 d-flex mb-3">
                                {{-- <div class="input-group"> --}}
                                    <button class="btn btn2" wire:loading.attr="disabled" wire:click="decrementQuantity({{$item->id}})"><i class="fa fa-minus"></i></button>
                                    <input type="text" wire:model="quantityCount" value="{{$item->quantity}}" readonly class="input-quantity" />
                                    <span class="btn btn2" wire:loading.attr="disabled" wire:click="incrementQuantity({{$item->id}})"><i class="fa fa-plus"></i></span>
                                {{-- </div> --}}
                            </div>
                            <div class="col-md-6 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-2">${{$item->product->selling_price * $item->quantity}}</h5>
                                @php $totalPrice += $item->product->selling_price * $item->quantity @endphp
                            </div>

                            <div class="col-md-3 col-lg-1 col-sm-3">
                                <button type="button" wire:click="removeCartItem({{ $item->id }})" wire:loading.attr="disabled" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center ">No Cart Item</div>
                    <p class="text-center" >Go to shop <a href="{{url('/products')}}">Here</a></p>
                @endforelse


                @if ($cartItem->count() > 0)
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <span>Total:</span>
                            <span>${{$totalPrice}}</span>
                        </div>
                        <div class="card-body">
                            <a href="{{ url('/checkout') }}" class="checkout w-100">Checkout</a>
                        </div>
                    </div>
                @endif


                </div>
            </div>
            </div>
    </section>
</div>
