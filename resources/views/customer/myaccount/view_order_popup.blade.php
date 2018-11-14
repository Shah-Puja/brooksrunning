<div class="popup-container--wrapper">
    <div class="popup-container--info">
        <div class="close-me"><span class="icon-close-icon edit-order--close"></span></div>
        <div class="cart-left--container account-order-popup">
            <div class="heading">
                <h3 class="br-heading">Order Information</h3>
            </div>
            <button class="pdp-button pdp-proceed-mob visible-mob">Proceed to Purchase</button>
            <div class="shopping-heading">
                <div class="row">
                    <div class="col-6 hidden-tab hidden-mob"><p>Product</p></div>
                    <div class="col-3 hidden-tab hidden-mob"><p>Quantity</p></div>
                    <div class="col-3 hidden-tab hidden-mob"><p>Price</p></div>
                </div>
            </div>
            @php echo "<pre>";print_r($order); @endphp
           
            @foreach($order->orderItems as $orderItems)
            <div class="shoppingcart-wrapper">
                <div class="shoppingcart-products">
                    <div class="row">
                        <div class="col-3 tab-6">
                            <div class="shopping-img">
                                <img src="images/apparel/apparel1-details.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-3 tab-6">
                            <div class="product-info">
                                <h3 class="bold-font">{{ $orderItems->variant->product->stylename }}</h3>
                                <p>Item # {{ $orderItems->variant->product->stylename }}</p>
                                <p>Color: 033</p>
                                <p>Size: 7.5</p>
                                <p>Mens Width: D-Normal</p>
                            </div>
                        </div>
                        <div class="col-3 tab-12">
                            <div class="product-info quantity clearfix">
                                <div class="quantity-heading">
                                    <p class="bold-font">Quantity:</p>
                                </div>
                                <div class="input-wrapper">
                                <p class="right"> 1 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 tab-12">
                            <div class="product-info">
                                <div class="row price">
                                    <div class="mob-5"><p class="bold-font blue">Unit Price:</p></div>
                                    <div class="mob-7"><p class="bold-font blue right"><del>&dollar;239.95</del> &dollar;169.95</p></div>
                                </div>
                                <div class="row price">
                                    <div class="mob-5"><p>Item Total:</p></div>
                                    <div class="mob-7"><p class="right">&dollar;169.95</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="cart-right--container footer-order">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <div class="order">
                            <h3 class="br-heading">Order Summary</h3>
                            <div class="order-info">
                                <div class="row">
                                    <div class="mob-7">
                                        <p>Subtotal</p>
                                    </div>
                                    <div class="mob-5">
                                        <p class="right">$ {{$order->total}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mob-7">
                                    @php 
                                        if(isset($order->delivery_type) && $order->delivery_type == 'standard'){
                                            $delivery_type = 'Standard';
                                        }elseif(isset($order->delivery_type) && $order->delivery_type == 'express'){
                                            $delivery_type = 'Express';
                                        }elseif(isset($order->delivery_type) && $order->delivery_type == 'new_zealand'){
                                            $delivery_type = 'New Zealand Standard';
                                        }else{
                                            $delivery_type ='';
                                        }
                                    @endphp
                                        <p>{{ $delivery_type }} Delivery</p>
                                    </div>
                                    <div class="mob-5">
                                        <p class="right">$ {{$order->freight_cost}}</p>
                                    </div>
                                </div>
                                @if(isset($order->gift_amount) && $order->gift_amount!="")
                                    <div class="row total">
                                        <div class="mob-7">
                                            <p class="bold-font blue">Gift Discount</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="bold-font blue right">-$ {{ @number_format($order->gift_amount, 2) }}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="row total">
                                    <div class="mob-7">
                                        <p class="bold-font blue">Order Total:</p>
                                    </div>
                                    <div class="mob-5">
                                        <p class="bold-font blue right">$ {{$order->grand_total}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".edit-order--close").click(function () {
        $("#edit-order--popup").removeClass("show");
    });
</script>