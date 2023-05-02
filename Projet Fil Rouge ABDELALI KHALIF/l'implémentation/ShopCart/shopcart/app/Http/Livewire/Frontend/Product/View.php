<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class View extends Component
{
    public $category, $products;
    public  $quantityCount = 1;


    public function incrementQuantity(){
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }
    public function decrementQuantity(){
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart( $productId){
        // dd($this->category);
        if(Auth::check())
        {
            if($this->products->where('id', $productId)->where('status','0')->exists())
            {
                if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Product Already Added',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }else{
                    if($this->products->quantity > 0)
                    {
                        if($this->products->quantity > $this->quantityCount)
                        {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('cartAddedUpdated');
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Product Added to Cart',
                                'type' => 'success',
                                'status' => 200
                            ]);

                        }else{
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Only'.$this->products->quantity.'Quantity',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }

                    }else{
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'Out of Stock',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }


            }
        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Pleas Login To Add To Cart',
                'type' => 'warning',
                'status' => 404
            ]);
            return Redirect::guest('login');
        }
    }

    public function mount($category,$products){
        $this->category = $category;
        $this->products = $products;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'products' => $this->products,
        ]);
    }
}
