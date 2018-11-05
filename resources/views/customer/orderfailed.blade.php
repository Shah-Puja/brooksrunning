
@extends('customer.layouts.master')
@section('content')
<section class="wrapper cart-breadcrumb--header">
        <div class="row hidden-xs">
            <div class="col-9">
                <div class="cart-header--step">
                    <ul>
                        <li class="step">Step 4 of 4 </li>
                        <li >1. Checkout</li>
                        <li>2. Shipping &amp; Billing</li>
                        <li>3. Payment</li>
                        <li class="active">4. Failed</li>
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
                        <h3 class="br-heading">Payment for your order has failed!</h3>
                    </div>
                    <div class="cart-success--info">
                    <p>The transaction failed and the payment has not been validated.<br/>Please try again later.
                    <br/>You can now start the payment again by refreshing the order page, You may attempt the payment once again, though it recommended you use another payment method.

                    <br/>If you have any enquiries regarding your order please contact us at <span class="blue">shop@brooksrunning.com.au</span> or by phone on 1300 735 099.<br/>We’re available to help Mon-Fri between 9am-5AEST.</p>
                    </div>
                      <p class="order"><span>Order No:</span> BRN-98989</p>
                      <p class="order"><span>Your transaction no:</span> paypal#2225999</p>
                      <p>N.B.: The information is at your disposal for a possible request to the customer support and it does not confirm the validation of the payment in any case.</p>
                    <div class="cart-btn" style="padding-bottom: 25px;">
                                            <button class="pdp-button">Back to Order</button>
                    </div>
                    </div>
                  
                  
               
                    <div class="success-container--footer">
                        <div class="header">
                            <h3>Save your order details by creating an account!</h3>
                            <p>It’s easy, just choose a password and you’ll have access to all your order information.</p>
                        </div>
                        <div class="form-container">
                            <div class="row">
                                <div class="tab-6">
                                    <div class="form-wrapper">
                                        <div class="input-wrapper">
                                            <label for="email1"><sup>*</sup>Password</label>
                                            <input type="text" name="email1" class="input-field">
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="email1"><sup>*</sup>Confirm Password</label>
                                            <input type="text" name="email1" class="input-field">
                                        </div>
                                        <div class="cart-btn">
                                            <button class="pdp-button">Create account</button>
                                        </div>
                                    </div>
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
                </div>
            </div>
        </div>
    </section>
    <div id="1edit-cart--popup" class="popup-container edit-cart--popup">
        <div class="popup-container--wrapper">
            <div class="popup-container--info">
                <div class="close-me"><span class="icon-close-icon edit-cart--close"></span></div>
                <div class="clearfix">
                    <div class="col-12">
                        <h3 class="br-heading">Glycerin 16</h3>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="col-6">
                        <div class="img-wrapper">
                            <img src="images/shoes/shoes1-details.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="product-info">
                            <div class="price">$120</div>
                            <div class="style">Style #123456</div>
                            <div class="category">Buy Women's Levitate Running Shoes from Brooks</div>
                            <div class="info" id="info-more">A bold leap forward to deliver infinite energy, the new Levitate 2 gives you the most energy return with the DNA AMP midsole technology which gives you back more of the effort you put in. Also featuring a new highly adaptable fit knit upper to provide you with the ultimate in comfort to keep you running. A bold leap forward to deliver infinite energy, the new Levitate 2 gives you the most energy return with the DNA AMP midsole technology which gives you back more of the effort you put in. Also featuring a new highly adaptable fit knit upper to provide you with the ultimate in comfort to keep you running. A bold leap forward to deliver infinite energy, the new Levitate 2 gives you the most energy return with the DNA AMP midsole technology which gives you back more of the effort you put in. Also featuring a new highly adaptable fit knit upper to provide you with the ultimate in comfort to keep you running. </div>
                            <div class="swatches">
                                <ul>
                                    <li class="selected"><img src="images/details/shoes/shoes1-swatches.jpg" alt=""></li>
                                    <li><img src="images/details/shoes/shoes2-swatches.jpg" alt=""></li>
                                    <li><img src="images/details/shoes/shoes1-swatches.jpg" alt=""></li>
                                    <li><img src="images/details/shoes/shoes2-swatches.jpg" alt=""></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="input-wrapper size">
                                        <label for="" class="main">SIZE(US)</label>
                                        <div class="custom-select">
                                            <div class = "select-box">
                                                <div class = "label-heading">
                                                    <span class="text">-</span> 
                                                    <div class="sel-icon">
                                                        <span class="icon-down-arrow"></span>
                                                    </div>
                                                </div>
                                                <ul class="select-option--wrapper">
                                                    <li class="option-value" value="">-</li>
                                                    <li class="option-value" value="">Normal</li>
                                                    <li class="option-value" value="">Wide 2L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-wrapper size">
                                        <label for="" class="main">WIDTH</label>
                                        <div class="custom-select">
                                            <div class = "select-box">
                                                <div class = "label-heading">
                                                    <span class="text">-</span> 
                                                    <div class="sel-icon">
                                                        <span class="icon-down-arrow"></span>
                                                    </div>
                                                </div>
                                                <ul class="select-option--wrapper">
                                                    <li class="option-value" value="">-</li>
                                                    <li class="option-value" value="">Normal</li>
                                                    <li class="option-value" value="">Wide 2L</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="quantity-wrapper size">
                                        <div class="input-wrapper">
                                            <label class="main" for="">QUANTITY</label>
                                            <div class="quantity-selector" id="quantity-selector">
                                                <input type="button" value="-" id="subs"/>
                                                <input type="text" id="noOfRoom" value="1" name="noOfRoom" />
                                                <input type="button" value="+" id="adds"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <a href="#" class="pdp-button">Update Cart</a>
                            </div>
                            <div class="view-more-info"><a href="#">View full details</a></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection