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
            @php //echo "<pre>";print_r($order); @endphp
           
            @foreach($order->orderItems as $orderItems)
            <div class="shoppingcart-wrapper">
                <div class="shoppingcart-products">
                    <div class="row">
                        <div class="col-3 tab-6">
                            <div class="shopping-img">
                                <img src="{{ $orderItems->variant->product->image->image1Medium() }}" alt="">
                            </div>
                        </div>
                        <div class="col-3 tab-6">
                            <div class="product-info">
                                <h3 class="bold-font">{{ $orderItems->variant->product->stylename }}</h3>
                                <p>Item # {{ $orderItems->variant->product_id }}</p>
                                <p>Color: {{ $orderItems->variant->product->color_name }}</p>
                                <p>Size: {{ $orderItems->variant->size }}</p>
                                @if($orderItems->variant->width_name!="")
									<p> {{ ($orderItems->variant->product->gender == 'M') ? "Mens" : "Womens" }} Width: {{ $orderItems->variant->width_name }}</p>
								@endif
                            </div>
                        </div>
                        <div class="col-3 tab-12">
                            <div class="product-info quantity clearfix">
                                <div class="quantity-heading">
                                    <p class="bold-font">Quantity:</p>
                                </div>
                                <div class="input-wrapper">
                                <p class="right"> {{ $orderItems->qty }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 tab-12">
                            <div class="product-info">
                                <div class="row price">
                                    <div class="mob-5"><p class="bold-font blue">Unit Price:</p></div>
                                    <div class="mob-7"><p class="bold-font blue right">
                                    @if($orderItems->price_sale == 0 || $orderItems->price_sale==$orderItems->variant->price)
                                        &dollar;{{ number_format($orderItems->variant->price, 2) }}
                                    @endif
                                    
                                    @if (($orderItems->price_sale > 0) && ($orderItems->price_sale < $orderItems->variant->price))
                                        <del>&dollar;{{ number_format($orderItems->variant->price, 2) }}</del> 
                                        &dollar;{{ number_format($orderItems->price_sale, 2) }} 
                                    @endif
                                    </p></div>
                                </div>

                                @if (!empty($orderItems->discount) && $orderItems->discount != 0) 
									<div class="row price">
                                        <div class="mob-5"><p>Discount:</p></div>
                                        <div class="mob-7"><p class="right" style="color:red;">-&dollar;{{ number_format($orderItems->discount, 2) }}</div>
									</div>
                                @endif

                                <div class="row price">
                                    <div class="mob-5"><p>Item Total:</p></div>
                                    <div class="mob-7">
                                        @php 
                                        $price_sale = (isset($orderItems->price_sale) && ($orderItems->price_sale != $orderItems->variant->price) && $orderItems->price_sale != 0) ? $orderItems->price_sale : $orderItems->variant->price;
											$total = 0;  
											if($orderItems->discount_detail!=0.00 && ($orderItems->discount_price!=0.00) && $orderItems->discount_price!= $price_sale && $orderItems->discount_price < $price_sale * $orderItems->qty){
												$total = $orderItems->discount_price;
											} else {
												$total = $orderItems->qty * $price_sale;
											}
									    @endphp
                                        <p class="right"> &dollar;{{ number_format($total, 2) }} </p>
                                    </div>
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
                                    <div class="row">
                                        <div class="mob-7">
                                            <p>Gift Discount</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="right">-$ {{ @number_format($order->gift_amount, 2) }}</p>
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