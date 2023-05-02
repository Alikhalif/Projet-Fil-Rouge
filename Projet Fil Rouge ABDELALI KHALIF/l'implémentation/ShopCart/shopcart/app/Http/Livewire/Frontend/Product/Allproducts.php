<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Allproducts extends Component
{
    public $products;
    public function render()
    {
        return view('livewire.frontend.product.allproducts',[
            'products' => $this->products
        ]);
    }
}
