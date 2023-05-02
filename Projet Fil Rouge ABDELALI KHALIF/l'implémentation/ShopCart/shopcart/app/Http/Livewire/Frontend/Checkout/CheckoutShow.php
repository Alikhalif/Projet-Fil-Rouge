<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Http\Controllers\Frontend\CheckoutController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Livewire\Component;
use Stripe;
use Illuminate\Http\Request;

class CheckoutShow extends Component
{
    public $carts, $total, $payment_mode = 'Paid by Paypal';

    public function total(){
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach($this->carts as $item){
            $this->total += $item->product->selling_price * $item->quantity;
        }
        return $this->total;
    }


    public function addOrder($total){
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'totale' => $total,
        ]);

        $mycarts = Cart::where('user_id',auth()->user()->id)->get();

        foreach($mycarts as $item){
            $order_items = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->selling_price
            ]);
        }

        return $order;
    }

    public function checkoutpai(){
        $data = [
            'total' => $this->total,
            'carts' => $this->carts,
        ];

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Send me mony !',
                        ],
                        'unit_amount' => $this->total,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success',$data),
            'cancel_url' => route('index'),
        ]);



        return redirect()->away($session->url);
    }

    public function paidOrder(){


        // $this->payment_mode = 'Paid by Paypal';
        // $this->checkoutpai();
        // $myOrder = $this->addOrder();
        // if($myOrder){
        //     Cart::where('user_id', auth()->user()->id)->delete();

        //     $this->emit('cartAddedUpdated');
        //     session()->flash('message','Order Placed Successfully');
        //     $this->dispatchBrowserEvent('message',[
        //         'text'=>'Order Placed Successfully',
        //         'type' => 'success',
        //         'status' => '200'
        //     ]);
        // }
        // else{
        //     $this->dispatchBrowserEvent('message',[
        //         'text' => 'Error!',
        //         'type' => 'error',
        //         'status' => 500
        //     ]);
        // }
    }

    public function success(Request $request){
        // $this->checkoutpai();

        $total = $request->query('total');

        $myOrder = $this->addOrder($total);
        if($myOrder){
            Cart::where('user_id', auth()->user()->id)->delete();

            $this->emit('cartAddedUpdated');
            session()->flash('message','Order Placed Successfully');
            $this->dispatchBrowserEvent('message',[
                'text'=>'Order Placed Successfully',
                'type' => 'success',
                'status' => '200'
            ]);
        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Error!',
                'type' => 'error',
                'status' => 500
            ]);
        }
        return view('frontend.checkout.success');
    }

    public function index(){
        return view('livewire.frontend.checkout.checkout-show');
    }



    public function render()
    {
        $total = $this->total();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalAmount' => $total
        ]);
    }
}
