@extends('customer.layouts.master')

@section('content')
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
                <button class="pdp-button pdp-proceed-mob visible-mob">Proceed to Purchase</button>
                <div class="shopping-heading">
                    <div class="row">
                        <div class="col-6 hidden-tab hidden-mob"><p>Product</p></div>
                        <div class="col-2 hidden-tab hidden-mob"><p>Quantity</p></div>
                        <div class="col-4 hidden-tab hidden-mob"><p>Price</p></div>
                    </div>
                </div>
                <div class="shoppingcart-wrapper">
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
                                                <input type="radio" id="standard" name="d-options" checked="checked">
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
                                                <input type="radio" id="express" name="d-options">
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
                                                <input type="radio" id="standard-new" name="d-options">
                                                <label for="standard-new">
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
                            <div class="order">
                                <h3 class="br-heading">Order Summary</h3>
                                <div class="order-info">
                                    <div class="row">
                                        <div class="mob-7">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="right">$ 399.90</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mob-7">
                                            <p>Standard Delivery</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="right">$ 0.0</p>
                                        </div>
                                    </div>
                                    <div class="row total">
                                        <div class="mob-7">
                                            <p class="bold-font blue">Order Total:</p>
                                        </div>
                                        <div class="mob-5">
                                            <p class="bold-font blue right">$ 399.90</p>
                                        </div>
                                    </div>	
                                    <div class="afterpay">
                                        <span>or 4 payments of $30.00 with <img src="images/payment-afterpay--black.png" alt=""> <a href="JavaScript:Void(0);" class="afterpay-popup--control">info</a></span>
                                    </div>
                                </div>
                            </div>
                            @if ( @$cart->items_count > 0 )
                            <button class="pdp-button">Proceed to Purchase</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 tab-4">
            <div class="cart-right--container">
                @if ( @$cart->items_count > 0 )
                <button class="pdp-button hidden-mob">Proceed to Purchase</button>
                @endif
                <div class="order hidden-mob">
                    @include('cart.order_summary')
                </div> 
                @include('cart.right_side')
            </div>
        </div>
    </div>
</section>

@endsection