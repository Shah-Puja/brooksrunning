@extends('customer.layouts.master')

@section('content')
@php $checked = 'checked = "checked"'; @endphp
<section class="wrapper cart-breadcrumb--header">
    <div class="row hidden-xs">
        <div class="col-9">
            <div class="cart-header--step">
                <ul>
                    <li class="step">Step 1 of 3 </li>
                    <li class="active">1. Checkout</li>
                    <li>2. Shipping &amp; Billing</li>
                    <li>3. Payment</li>
                </ul>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</section>
<section class="cart-container wrapper">
    <div class="row">
        <div class="col-9 tab-8">
            <div class="cart-left--container">
                <div class="heading">
                    <h3 class="br-heading">Shopping Cart</h3>
                    <span class="offer">Free shipping on orders over $50 Australia wide.</span>
                </div>
                <button class="pdp-button pdp-proceed-mob proceed-to-purchase visible-mob"><a href="/shipping">Proceed to Purchase</a></button>
                <div class="shopping-heading">
                    <div class="row">
                        <div class="col-6 hidden-tab hidden-mob"><p>Product</p></div>
                        <div class="col-2 hidden-tab hidden-mob"><p>Quantity</p></div>
                        <div class="col-4 hidden-tab hidden-mob"><p>Price</p></div>
                    </div>
                </div>
                <div class="shoppingcart-wrapper ajax_cart">
                    @include('cart.ajaxcartproductinfo')
                </div>
                <div class="shopping-del-wrapper">
                    <div class="shopping-delevery--option">
                        <div class="tab-vertical">
                            <input id="tab-one" type="checkbox" class="tab-checkbox" name="tabs">
                            <div class="tab-header">
                                <label for="tab-one" class="bold-font">
                                    <h3 class="br-heading bold-font">Delivery Options</h3>
                                    <span class="icon-top-arrow"></span>
                                </label>
                            </div>
                            <div class="tab-content delivery-option">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="br-heading heading-main">Select a Delivery Option</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="standard" name="d-options" {{(isset($cart->delivery_type) && $cart->delivery_type == 'standard') ? $checked : ''}} value="standard">
                                                <label for="standard">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">
                                                        <h3 class="bold-font">Standard Delivery</h3>
                                                        <p class="area">Australia</p>
                                                        <p class="rate">$10 of <span>FREE for orders over $50</span></p>
                                                        <p class="day">2-10 business Days<sup>*</sup></p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="express" name="d-options" {{(isset($cart->delivery_type) && $cart->delivery_type == 'express') ? $checked : ''}} value="express">
                                                <label for="express">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">
                                                        <h3 class="bold-font">Express Delivery</h3>
                                                        <p class="area">(Australia Only)</p>
                                                        <p class="rate">$15 flat rate</span></p>
                                                        <p class="day">1-2 business days to Australian metro areas<sup>*</sup></p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="new_zealand" name="d-options"  {{(isset($cart->delivery_type) && $cart->delivery_type == 'new_zealand') ? $checked : ''}}  value="new_zealand">
                                                <label for="new_zealand">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">
                                                        <h3 class="bold-font">Standard Delivery</h3>
                                                        <p class="area">New Zealand</p>
                                                        <p class="rate">$25 flat rate</span></p>
                                                        <p class="day">2-10 business days<sup>*</sup></p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shopping-delevery--option">
                        <div class="tab-vertical">
                            <input id="tab-two" type="checkbox" class="tab-checkbox" name="tabs">
                            <div class="tab-header">
                                <label for="tab-two" class="bold-font">
                                    <h3 class="br-heading bold-font">Gift Voucher or Promotion code</h3>
                                    <span class="icon-top-arrow"></span>
                                </label>
                            </div>
                            <div class="tab-content delivery-option">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="br-heading heading-main">Do you have a Gift Voucher or Promotion Code?</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="voucher" name="gift" checked="checked">
                                                <label for="voucher">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">
                                                        <h3 class="bold-font">Gift Voucher</h3>
                                                        <input type="text" class="gift-input" placeholder="Voucher Number">
                                                        <input type="text" class="gift-input" placeholder="Voucher Pin">
                                                        <button class="pdp-button">Apply</button>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="promotion" name="gift">
                                                <label for="promotion">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">
                                                        <h3 class="bold-font">Promotion Code</h3>
                                                        <input type="text" class="gift-input" placeholder="Discount Code">
                                                        <button class="pdp-button">Apply</button>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-right--container footer-order">
                    <div class="row">
                        <div class="col-7"></div>
                        <div class="col-5">
                            <div class="order order_summary">
                                @include('cart.order_summary') 
                            </div>
                           
                            @if ( @$cart->items_count > 0 )
                            <button class="proceed-to-purchase pdp-button"><a href="/shipping">Proceed to Purchase</a></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 tab-4">
            <div class="cart-right--container">
                @if ( @$cart->items_count > 0 )
                <button class="proceed-to-purchase pdp-button hidden-mob"><a href="/shipping">Proceed to Purchase</a></button>
                @endif
                <div class="order hidden-mob order_summary">
                    @include('cart.order_summary')
                </div> 
                @include('cart.right_side')
            </div>
        </div>
    </div>
</section>




<script type="text/javascript">
    $(document).ready(function () {
        var checked_delivery_option = $("input:radio[name='d-options']:checked").val();

        $("input:radio[name='d-options']").click(function () {
            var overlay = $('<div id="overlay"> </div>');
            overlay.appendTo(document.body);
            var delivery_option_value = $("input:radio[name='d-options']:checked").val();
            var url = "cart/update_delivery_option";

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: "POST",
                data: {delivery_option_value: delivery_option_value},
                //data: {delivery_option_value: delivery_option_value, user_id: user_id},
                success: function (result) {
                    $(".order").load("cart/get_cart_order_total");
                    /*if (((checked_delivery_option == "standard") || (checked_delivery_option == "express")) && (delivery_option_value === "new_zealand")) {
                     location.reload();
                     } else if (((delivery_option_value == "standard") || (delivery_option_value == "express")) && (checked_delivery_option === "new_zealand")) {
                     location.reload();
                     } else {
                     //alert("pending");
                     $(".order").load("cart/get_cart_order_total");
                     }*/

                    $("#overlay").remove();
                },
                error: function () {
                    return false;
                }
            });
        });
    });
</script>
@endsection