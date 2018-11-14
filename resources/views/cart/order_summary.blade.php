<h3 class="bold-font">Order Summary</h3>
@php //echo "<pre>";print_r($cart);die;@endphp
                    <div class="order-info">
                        <div class="row">
                            <div class="mob-7">
                                <p>Subtotal</p>
                            </div>
                            <div class="mob-5">
                                <p class="right">$ {{ @number_format($cart->total, 2) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mob-7">
                            @php 
                            if(isset($cart->delivery_type) && $cart->delivery_type == 'standard'){
                                $delivery_type = 'Standard';
                            }elseif(isset($cart->delivery_type) && $cart->delivery_type == 'express'){
                                $delivery_type = 'Express';
                            }elseif(isset($cart->delivery_type) && $cart->delivery_type == 'new_zealand'){
                                $delivery_type = 'New Zealand Standard';
                            }else{
                                $delivery_type ='';
                            }
                            @endphp
                                <p>{{ $delivery_type }} Delivery</p>
                            </div>
                            <div class="mob-5">
                                <p class="right">$ {{ @number_format($cart->freight_cost, 2) }}</p>
                            </div>
                        </div>
                            @if(isset($cart->gift_discount) && $cart->gift_discount!=0)
                        <div class="row total">
                            <div class="mob-7">
                                <p>Gift Discount</p>
                            </div>
                            <div class="mob-5">
                                <p class="right">-$ {{ @number_format($cart->gift_discount, 2) }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="row total">
                            <div class="mob-7">
                                <p class="bold-font blue">Order Total:</p>
                            </div>
                            @php 
                            if(isset($cart->gift_discount) && $cart->gift_discount!=0){
                                $subtotal = @number_format(($cart->grand_total - $cart->gift_discount), 2);
                            }else{
                                $subtotal = @number_format($cart->grand_total, 2);
                            }
                            @endphp
                            <div class="mob-5">
                                <p class="bold-font blue right">$ {{ $subtotal }}</p>
                            </div>
                        </div>	
                        @if(isset($cart->grand_total) && $cart->grand_total <1000)
                        <div class="afterpay">
                            <span>or 
                            4 payments of ${{ @number_format(($subtotal/4), 2) }} with <img src="/images/payment-afterpay--black.png" alt=""> <a href="JavaScript:Void(0);" class="afterpay-popup--control">info</a></span>
                        </div>
                        @endif 
                    </div>

<!--afterpay popup -->
                <div id="afterpay-popup--wrapper" class="popup-container afterpay--popup">
                    <div class="popup-container--wrapper">
                        <div class="popup-container--info">
                            <div class="close-me"><span class="icon-close-icon afterpay-popup--close"></span></div>
                            <div class="header-info">
                                <img src="/images/afterpay_logo-colour.svg" alt="">
                                <h3 class="br-heading">Shop now. Wear now. Pay later. Interest-free</h3>
                            </div>
                            <div class="afterpay-info clearfix">
                                <div class="info-wrapper">
                                    <div class="icon" style="background: url(images/icon-all-in-one-afterpay.png); background-position: -28px 4px;"></div>
                                    <p class="heading">Pay in 4 installments</p>
                                    <p class="text">Pay for your order in equal fortnightly payments</p>
                                </div>
                                <div class="info-wrapper">
                                    <div class="icon" style="background: url(images/icon-all-in-one-afterpay.png); background-position: -31px -74px;"></div>
                                    <p class="heading">Get your items now</p>
                                    <p class="text">Your order will be shipped now, just like a normal order</p>
                                </div>
                                <div class="info-wrapper">
                                    <div class="icon" style="background: url(images/icon-all-in-one-afterpay.png); background-position: -23px -152px;"></div>
                                    <p class="heading">Nothing extra to pay</p>
                                    <p class="text">No interest, no additional fees in you pay on time<sup>*</sup></p>
                                </div>
                                <div class="info-wrapper">
                                    <div class="icon" style="background: url(images/icon-all-in-one-afterpay.png); background-position: -18px -251px;"></div>
                                    <p class="heading">Spend up to $1000</p>
                                    <p class="text">You can use Afterpay for orders up to $1000</p>
                                </div>
                            </div>
                            <div class="footer-info clearfix">
                                <div class="left-block">
                                    <p class="heading">
                                        Pay in 4 installments
                                    </p>
                                    <ul class="text">
                                        <li>An Australian debit or credit card</li>
                                        <li>To be over 18 years of age</li>
                                        <li> To live in Australia</li>
                                    </ul>
                                    <br/>
                                    <p class="heading">To use this service</p>
                                    <ul class="text">
                                        <li>Add your items to your bag and checkout as normal</li>
                                        <li>In checkout select Afterpay as your payment method</li>
                                        <li>Enter your details with Afterpay and you're done!</li>
                                        <li>Your payment schedule will be emailed to you</li>
                                    </ul>
                                </div>
                                <div class="right-block">
                                    <p class="heading">Other things to note</p>
                                    <ul class="text">
                                        <li>Repayments will need to be made fortnightly either over a 6 or 8 week period. Your payment schedule will be shown to you by Afterpay before you confirm your purchase.</li>
                                        <li>If you wish to return your items you can choose an exchange, or the payment plan can be cancelled.</li>
                                        <li>*If you fail to make payment, you will be charged a late payment fee of $10 with a further $7 fee added 7 days later if the payment is still unpaid.</li>
                                    </ul>
                                    <a href="#" class="moreinfo">For full terms and conditions please visit Afterpay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/afterpay popup -->