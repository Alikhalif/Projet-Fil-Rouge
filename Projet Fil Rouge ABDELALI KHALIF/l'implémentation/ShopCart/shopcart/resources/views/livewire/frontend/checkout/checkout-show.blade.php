<div>
    <div class="py-3 py-md-4 ">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">${{$totalAmount}}</span>
                        </h4>
                        <hr>
                        <small>When you click on the button (Proceed to payment), you will be taken to the payment page.</small>
                        <br/>
                        <small>.</small>

                        <div class="mt-3">
                            <button wire:click="checkoutpai" class="btn btn-primary btn-block btn-lg">
                                Proceed to payment
                            </button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
