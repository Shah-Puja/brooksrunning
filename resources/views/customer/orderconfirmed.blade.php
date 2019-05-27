
@extends('customer.layouts.master')

@section('gtm-datalayer')
	'transactionId': 'BRN-{{ $order->order_no }}',
	'transactionAffiliation': '{{ config('app.name') }}',
	'transactionTotal': {{ @number_format($order->grand_total, 2) }},
	'transactionShipping': {{ @number_format($order->freight_cost, 2) }},
	@if (! $order->orderItems->isEmpty() )
	'transactionProducts': [
	@foreach($order->orderItems as $item)
		{
			'sku': '{{ $item->variant->product_id }}',
			'name': '{{ $item->variant->product->stylename }}',
            'style': '{{ $item->variant->product->style }}',
			'price': {{ number_format($item->variant->price_sale, 2) }},
			'quantity': {{ $item->qty }}
		@if ($loop->last)
		}
		@else
		},
	    @endif
	@endforeach
	]
	@endif
@endsection

@section('content')
<section class="wrapper cart-breadcrumb--header">
    @php
    // echo "<pre>";
        //     print_r($order);
        // echo "</pre>";
    @endphp
    <div class="row hidden-xs">
        <div class="col-9">
            <div class="cart-header--step">
                <ul>
                    <li class="step">Step 4 of 4 </li>
                    <li >1. Checkout</li>
                    <li>2. Shipping &amp; Billing</li>
                    <li>3. Payment</li>
                    <li class="active">4. Success</li>
                </ul>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</section>
<section class="cart-container success-container wrapper">
    <div class="row">
        <div class="col-12">
            <div class="cart-left--container">
                <div class="heading">
                    <h3 class="br-heading">Your Order has been Received. Thanks for shopping!</h3>
                </div>
                <div class="cart-success--info">
                    <p class="order"><span>Order No:</span> BRN-{{$order->order_no}}</p>
                    <p>You will receive an email shortly confirmating the details of your order and order number.<br/>Your order will now be processed. Once dispatched you will receive an email with details to track your parcel.<br/>If you have any enquiries regarding your order please contact us at <span class="blue">shop@brooksrunning.com.au</span> or by phone on 1300 735 099.<br/>We are available to help Mon-Fri between 9am to 5pm AEST.</p>
                </div>
                <div class="shopping-heading">
                    <div class="row">
                        <div class="col-6 hidden-tab hidden-mob"><p>Product</p></div>
                        <div class="col-3 hidden-tab hidden-mob"><p>Quantity</p></div>
                        <div class="col-3 hidden-tab hidden-mob"><p>Price</p></div>
                    </div>
                </div>
                <div class="shoppingcart-wrapper">
                    <div class="shoppingcart-products">
                    @php //echo "<pre>";print_R($order); echo "<hr>"; @endphp
                        @foreach($order->orderItems as $orderItem)
                        <div class="row">
                            <div class="col-3 tab-6">
                                <div class="shopping-img">
                                    <img src="{{ $orderItem->variant->product->image->image1Medium() }}" alt="">
                                </div>
                            </div>
                            <div class="col-3 tab-6">
                                <div class="product-info">
                                    <h3 class="bold-font">{{ $orderItem->variant->product->stylename }}</h3>
                                    <p>Item # {{ $orderItem->variant->product_id }}</p>
                                    <p>Color: {{ $orderItem->variant->product->color_name }}</p>
                                    <p>Size: {{ $orderItem->variant->size }}</p>
                                    @if($orderItem->variant->width_name!="")
                                    <p> {{ ($orderItem->variant->product->gender == 'M') ? "Mens" : "Womens" }} Width: {{ $orderItem->variant->width_name }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 tab-12">
                                <div class="product-info quantity clearfix">
                                    <div class="quantity-heading">
                                        <p class="bold-font">Quantity:</p>
                                    </div>
                                    <div class="input-wrapper">
                                        {{ $orderItem->qty }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 tab-12">
                                <div class="product-info">
                                    <div class="row price">
                                        <div class="mob-5"><p class="bold-font blue">Unit Price</p></div>
                                        <div class="mob-7">
                                            <p class="bold-font blue right">
                                                @if($orderItem->variant->price_sale < $orderItem->variant->price)
                                                <del>${{ number_format($orderItem->variant->price, 2) }}</del> 
                                                ${{ number_format($orderItem->variant->price_sale, 2) }}
                                                @else 
                                                ${{ number_format($orderItem->variant->price_sale, 2) }}
                                                @endif

                                            </p>
                                        </div>
                                    </div>
                                    @if($orderItem->discount!=0.00)
                                    <div class="row price">
                                        <div class="mob-5"><p class="bold-font blue">Discount</p></div>
                                        <div class="mob-7"><p class="bold-font right" style="color:red;">-&dollar;{{ number_format($orderItem->discount, 2) }}</p></div>
                                    </div>
                                    @endif
                                    <div class="row price">
                                        <div class="mob-5"><p>Item Total</p></div>
                                        @php  
                                        $subtotal = $orderItem->total; 
                                        @endphp
                                        <div class="mob-7"><p class="right">&dollar;{{ number_format($subtotal, 2) }}</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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
                                            <p class="right">${{ number_format($order->total,2) }}</p>
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
                                            <p class="right">${{$order->freight_cost}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mob-7">
                                            <p>GST</p>
                                        </div>
                                        <div class="mob-5">
                                        <p class="right">
                                        @if(isset($order->gift_amount) && $order->gift_amount!="")
                                            ${{ number_format(((($order->total + $order->freight_cost) - $order->gift_amount) / 11),2) }}
                                        @else
                                            ${{ number_format((($order->total + $order->freight_cost) / 11),2) }}
                                        @endif 
                                            </p>
                                        </div>
                                    </div>
                                    @if(isset($order->gift_amount) && $order->gift_amount!="")
                                    <div class="row total">
                                        <div class="mob-7">
                                            <p>Gift Discount</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="right" style="color:red;">-${{ @number_format($order->gift_amount, 2) }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="row total">
                                        <div class="mob-7">
                                            <p class="bold-font blue">Order Total</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="bold-font blue right">${{ number_format($order->grand_total,2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($user_id!="no")
                <div class="success-container--footer">
                    <div class="header">
                        <h3>Save your order details by creating an account!</h3>
                        <p>It’s easy, just choose a password and you’ll have access to all your order information.</p>
                    </div>
                    <div class="form-container">
                        <div class="row">
                            <div class="tab-6">
                                <p id="msg" style="color:green; margin-bottom: 0px;margin-left: 20px;" class="br-heading">Thank you for registration</p>
                                <form name="make_member_form" id="make_member_form" method="post" onsubmit="return check_validate()">
                                    {{ csrf_field() }}
                                    <div class="form-wrapper">
                                        <input type='hidden' name="user_email" id="user_email" value="{{$order_email}}">
                                        <input type='hidden' name="user_id" id="user_id" value="{{$user_id}}">
                                        <div class="input-wrapper">
                                            <label for="email1"><sup>*</sup>Password</label>
                                            <input type="passoword" name="pass" id="pass" class="input-field">
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="email1"><sup>*</sup>Confirm Password</label>
                                            <input type="passoword" name="conf_pass" id="conf_pass" class="input-field">
                                        </div>
                                        <div class="cart-btn">
                                            <button type="submit" name="submit" class="pdp-button">Create account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-6">
                                <div class="form-info">
                                    <p class="main">The benefits of creating an account</p>
                                    <p><span>Faster checkout:</span> Save your billing and shipping information to make it easier to buy your favourite gear.</p>
                                    <p><span>Order history:</span> Look up important information about your current and past orders</p>
                                    <p><span>News and exclusive offers:</span> Sign up to receive email updates on special promotion, now product announcement, gift ideas, and more.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section> 
</div>
<style>
    .needsfilled{
        border:1px solid #ff0000 !important;
    }
</style>
<script>
    $(document).ready(function () {
        $("#msg").css('display','none');
        required = ["pass", "conf_pass"];
        emptyerror = "REQUIRED";
    });
    function check_validate() {
        var user_email = $('#user_email').val();
        var pass = $('#pass').val();
        var conf_pass = $('#conf_pass').val();
        var user_id = $('#user_id').val();
        required = ["pass", "conf_pass"];
        for (i = 0; i < required.length; i++) {
            var input = $('#' + required[i]);
            if ((input.val() == "") || (input.val() == emptyerror)) {
                input.addClass("needsfilled");
                input.val("");
                input.attr("placeholder", emptyerror);
            } else {
                input.removeClass("needsfilled");
            }
        }

        if (pass != conf_pass) {
            $('#conf_pass').addClass("needsfilled");
            $('#conf_pass').val("");
            $('#conf_pass').attr("placeholder", "Confirm Password Matched With Password");
        }

        if ($(":input").hasClass("needsfilled")) {
            return false;
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/make_member",
                type: "POST",
                data: {user_email: user_email, pass: pass, conf_pass: conf_pass},
                success: function (data) {
                    //console.log(data);
                    var pass = $('#pass').val('');
                    var conf_pass = $('#conf_pass').val('');
                    $("#msg").css('display','block');
                    $("#msg").text("Thank you for registration");
                }
            });
            return false;
        }
        return false;
    }
</script>
@endsection
