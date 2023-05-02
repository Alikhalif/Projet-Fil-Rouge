<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData){
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
        }else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Error',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData){
            if($cartData->product->quantity > $cartData->quantity){
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            }else{
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Out Of Stock',
                    'type' => 'error',
                    'status' => 200
                ]);
            }

        }else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Error',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function removeCartItem(int $cartId){
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        // dd($cartRemoveData);
        if($cartRemoveData){
            $cartRemoveData->delete();

            $this->emit('cartAddedUpdated');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        }else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Error',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cartItem' => $this->cart
        ]);
    }
}
