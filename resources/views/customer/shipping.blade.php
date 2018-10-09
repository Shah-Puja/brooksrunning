@extends('customer.layouts.master')
@section('content')
<section class="wrapper cart-breadcrumb--header">
	<div class="row hidden-xs">
		<div class="col-9">
			<div class="cart-header--step">
				<ul>
					<li class="step">Step 2 of 3 </li>
					<li>1. Checkout</li>
					<li class="active">2. Shipping &amp; Billing</li>
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
			<div class="cart-right--container visible-mob">
				<div class="order">
                    <div class="order order_summary">
                        @include('cart.order_summary') 
                    </div>
				</div>
			</div>
			<div class="shipping-right--container">
				<!--Password popup -->
				<div class="popup-container password-popup" style="display: none;">
					<div class="popup-container--wrapper">
						<div class="popup-container--info">
							<div class="close-me"><span class="icon-close-icon close-popup"></span></div>
							<h3 class="br-heading">Request to Reset Your Password</h3>
							<p class="br-info">Provide you account email to receive an email to reset your password</p>
							<div class="row">
								<div class="col-8">
									<div class="input-wrapper">
										<label for=""><sup>*</sup>Email Address</label>
										<input type="text" class="input-field">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-8">
									<div class="cart-btn">
										<button class="primary-button pdp-button">Send</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/Password popup -->
				<!--Password popup Success -->
				<div class="popup-container password-popup" style="display: none;">
					<div class="popup-container--wrapper">
						<div class="popup-container--info">
							<div class="close-me"><span class="icon-close-icon close-popup"></span></div>
							<h3 class="br-heading">Request to Reset Your Password Received</h3>
							<p class="br-info">Thanks for submitting your email address. We have sent you an email with the information needed to reset your password. The email might take a couple of minutes to reach your account. Please check your junk mail to ensure you receive it.</p>
							<div class="cart-btn">
								<a href="#" class="primary-button pdp-button">Go to Homepage</a>
							</div>
						</div>
					</div>
				</div>
				<!--/Password popup Success-->
				<h1 class="br-heading">Shipping Address</h1>
				<p class="br-info">Your order requires a signature on delivery therefore we recommend a business address.<br/>If the address is unattended a card will be left to pick up the parcel at your nearest post office.</p>
				<!-- Shipping first step -->
				<div class="shipping-form" id="shipping-form" style="display: block;">
                <form name="email_check" id="email_check" method="post" onsubmit="return email_check_validate()">
                    @csrf
					<p class="email-msg">Please enter your email address</p>
					<div class="row">
						<div class="col-6">
							<div class="input-wrapper">
                                <?php
                                    $error_email="";
                                    if ($errors->has('email') ):
                                        $error_email="<span class='error'>".$errors->first('email')."</span>";
                                    endif;
                                ?>
								<label for="email1"><sup>*</sup>Email Address</label>
								<input type="text" name="email" id="email" class="input-field check_email_field" data-label-name="email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="cart-btn">
								<button class="primary-button pdp-button" type="submit">Submit</button>
							</div>
						</div>
                    </div>
                </form>
			    </div>
			    <!--/Shipping first step -->
			    <!-- Shipping Final step -->
			    <div class="shipping-main-form" style="display: none;">
                    <form name="billing_shipping" id="billing_shipping" method="post" action="/shipping" onsubmit="return shippingform_validate()">
                        @csrf
                        <div class="shipping-form">
                            <p class="email-msg">Please enter your email address</p>					
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_email="";
                                            if ($errors->has('email') ):
                                                $error_email="<span class='error'>".$errors->first('email')."</span>";
                                            endif;
                                        ?>
                                        <label for="email"><sup>*</sup>Email Address {!! $error_email !!}</label>
                                        <input type="text" name="email" class="input-field main_email_field" data-label-name="email">
                                    </div>
                                </div>
                            </div>

                            <!-- Password Wrapper -->
                            <div class="password-wrapper" style="display: none;">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="email-msg">Looks like you have an account. Enter your password for faster checkout.</p>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <label for="password"><sup>*</sup>Password</label>
                                            <input type="text" id="password_field" name="password" class="input-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="cart-btn">
                                            <button class="primary-button pdp-button login_user">Login</button>
                                            <a href='javascript:void(0)' class="continue-step" onclick="gest_user()">Continue without login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Password Wrapper -->
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_fname="";
                                            if ($errors->has('s_fname') ):
                                                $error_s_fname="<span class='error'>".$errors->first('s_fname')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>First Name: {!! $error_s_fname !!}</label>
                                        <input type="text" name="s_fname" class="input-field" data-label-name="first name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_lname="";
                                            if ($errors->has('s_lname') ):
                                                $error_s_lname="<span class='error'>".$errors->first('s_lname')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>Last Name: {!! $error_s_lname !!}</label>
                                        <input type="text" name="s_lname" class="input-field" data-label-name="last name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_add1="";
                                            if ($errors->has('s_add1') ):
                                                $error_s_add1="<span class='error'>".$errors->first('s_add1')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>Address 1: {!! $error_s_add1 !!}</label>
                                        <input type="text" name="s_add1" class="input-field" data-label-name="address 1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <label for="">Address 2:</label>
                                        <input type="text" name="s_add2" class="input-field" data-label-name="address 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_city="";
                                            if ($errors->has('s_city') ):
                                                $error_s_city="<span class='error'>".$errors->first('s_city')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>Suburb: {!! $error_s_city !!}</label>
                                        <input type="text" name="s_city" class="input-field" data-label-name="suburb">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_state="";
                                            $state = old('s_state');
                                            if ($errors->has('s_state') ):
                                                $error_s_state="<span class='error'>".$errors->first('s_state')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>State: {!! $error_s_state !!}</label>
                                        <select class="select-field" name="s_state" data-label-name="state">
                                            <option value="" selected="selected">Select State</option>
                                            <option value="ACT" {{ $state =='ACT' ? "selected='selected'": "" }}>ACT</option>
                                            <option value="NSW" {{ $state =='NSW' ? "selected='selected'": "" }}>NSW</option>
                                            <option value="NT" {{ $state =='NT' ? "selected='selected'": "" }}>ACT</option>
                                            <option value="QLD" {{ $state =='QLD' ? "selected='selected'": "" }}>QLD</option>
                                            <option value="SA" {{ $state =='SA' ? "selected='selected'": "" }}>SA</option>
                                            <option value="TAS" {{ $state =='TAS' ? "selected='selected'": "" }}>TAS</option>
                                            <option value="VIC" {{ $state =='VIC' ? "selected='selected'": "" }}>VIC</option>
                                            <option value="WA" {{ $state =='WA' ? "selected='selected'": "" }}>WA</option>
                                            <option value="New Zealand" {{ $state =='New Zealand' ? "selected='selected'": "" }}>New Zealand</option>
                                            <option value="Other" {{ $state =='Other' ? "selected='selected'": "" }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_postcode="";
                                            if ($errors->has('s_postcode') ):
                                                $error_s_postcode="<span class='error'>".$errors->first('s_postcode')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>Postal Code: {!! $error_s_postcode !!}</label>
                                        <input type="text" class="input-field" name="s_postcode" min='0' inputmode='numeric' pattern='[0-9]*' class="input-field allownumericwithdecimal" data-label-name="postal code">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_s_phone="";
                                            if ($errors->has('s_phone') ):
                                                $error_s_phone="<span class='error'>".$errors->first('s_phone')."</span>";
                                            endif;
                                        ?>
                                        <label for=""><sup>*</sup>Phone: {!! $error_s_phone !!}</label>
                                        <input type="text" name="s_phone" class="input-field" data-label-name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-wrapper">
                                        <div class="checklist-inline">
                                            <input type="checkbox" id="signme" name="signme" value='1'  @if ( old('signme') == 1) checked @endif>
                                            <label for="signme">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">Uncheck this box if you do not wish to receive communication from Brooks on new products, exclusive offers and info to make you Run Happy.</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-wrapper">
                                        <label for="comment">Delivery Comments :</label>
                                        <textarea name="order_info" class="input-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="billing-form">
                            <h1 class="br-heading">Billing Address</h1>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-wrapper address-change">
                                        <div class="radio-inline">
                                            <input type="radio" class="input-radio" name="flag_same_shipping" value="Yes" id="same-address" checked="checked">
                                            <label for="same-address">
                                                <div class="mark"><span></span></div>
                                                <div class="text">Same as Shipping address</div>
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <input type="radio" id="different-address" class="input-radio" name="flag_same_shipping" value="No">
                                            <label for="different-address" onchange="valueChanged()">
                                                <div class="mark"><span></span></div>
                                                <div class="text">Different Billing Address</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-address">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_fname="";
                                                if ($errors->has('b_fname') ):
                                                    $error_b_fname="<span class='error'>".$errors->first('b_fname')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>First Name: {!! $error_b_fname !!}</label>
                                            <input type="text" name="b_fname" class="input-field" data-label-name="first name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_lname="";
                                                if ($errors->has('b_lname') ):
                                                    $error_b_lname="<span class='error'>".$errors->first('b_lname')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>Last Name: {!! $error_b_lname !!}</label>
                                            <input type="text" name="b_lname" class="input-field" data-label-name="last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_add1="";
                                                if ($errors->has('b_add1') ):
                                                    $error_b_add1="<span class='error'>".$errors->first('b_add1')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>Address 1: {!! $error_b_add1 !!}</label>
                                            <input type="text" name="b_add1" class="input-field" data-label-name="address 1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <label for=""><sup>*</sup>Address 2</label>
                                            <input type="text" name="b_add2" class="input-field" data-label-name="address 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_city="";
                                                if ($errors->has('b_city') ):
                                                    $error_b_city="<span class='error'>".$errors->first('b_city')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>Suburb: {!! $error_b_city !!}</label>
                                            <input type="text" name="b_city" class="input-field" data-label-name="suburb">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_state="";
                                                $state = old('b_state');
                                                if ($errors->has('b_state') ):
                                                    $error_b_state="<span class='error'>".$errors->first('b_state')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>State: {!! $error_b_state !!}</label>
                                            <select class="select-field" name="b_state" data-label-name="state">
                                                <option value="" selected="selected">Select State</option>
                                                <option value="" selected="selected">Select State</option>
                                                <option value="ACT" {{ $state =='ACT' ? "selected='selected'": "" }}>ACT</option>
                                                <option value="NSW" {{ $state =='NSW' ? "selected='selected'": "" }}>NSW</option>
                                                <option value="NT" {{ $state =='NT' ? "selected='selected'": "" }}>ACT</option>
                                                <option value="QLD" {{ $state =='QLD' ? "selected='selected'": "" }}>QLD</option>
                                                <option value="SA" {{ $state =='SA' ? "selected='selected'": "" }}>SA</option>
                                                <option value="TAS" {{ $state =='TAS' ? "selected='selected'": "" }}>TAS</option>
                                                <option value="VIC" {{ $state =='VIC' ? "selected='selected'": "" }}>VIC</option>
                                                <option value="WA" {{ $state =='WA' ? "selected='selected'": "" }}>WA</option>
                                                <option value="New Zealand" {{ $state =='New Zealand' ? "selected='selected'": "" }}>New Zealand</option>
                                                <option value="Other" {{ $state =='Other' ? "selected='selected'": "" }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_postcode="";
                                                if ($errors->has('b_postcode') ):
                                                    $error_b_postcode="<span class='error'>".$errors->first('b_postcode')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>Postal Code: {!! $error_b_postcode !!}</label>
                                            <input type="text" name="b_postcode" min='0' inputmode='numeric' pattern='[0-9]*' class="input-field allownumericwithdecimal" data-label-name="postal code">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <?php
                                                $error_b_phone="";
                                                if ($errors->has('b_phone') ):
                                                    $error_b_phone="<span class='error'>".$errors->first('b_phone')."</span>";
                                                endif;
                                            ?>
                                            <label for=""><sup>*</sup>Phone: {!! $error_b_phone !!}</label>
                                            <input type="text" name="b_phone" class="input-field phone-number" data-label-name="phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-wrapper">
                                        <?php
                                            $error_terms="";
                                            if ($errors->has('terms') ):
                                                $error_terms="<span class='error'>".$errors->first('terms')."</span>";
                                            endif;
                                        ?>
                                        <div class="checklist-inline">
                                            <input type="checkbox" name="terms" id="already-read" value='1' id="already-read">
                                            <label for="already-read">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text">
                                                        I have read and agree to the <a href="#">Privacy Policy</a> and <a href="#" class="shipping--popup">Terms and Conditions</a>.
                                                    </div>
                                                    {!! $error_terms !!}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="cart-btn">
                                        <button type="submit" name="shipping_to_payment" class="primary-button pdp-button">Continue to payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
			    </div>
			    <!-- /Shipping Final step -->
			</div>
		</div>
		<div class="col-3 tab-4">
			<div class="cart-right--container">
				<div class="order hidden-mob">
                        <div class="order order_summary">
                                @include('cart.order_summary') 
                        </div>
				</div>
				<!--afterpay popup -->
				<div id="afterpay-popup--wrapper" class="popup-container afterpay--popup">
					<div class="popup-container--wrapper">
						<div class="popup-container--info">
							<div class="close-me"><span class="icon-close-icon afterpay-popup--close"></span></div>
							<div class="header-info">
								<img src="images/afterpay_logo-colour.svg" alt="">
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
				<div class="address">
					<h3 class="bold-font">Have a Question?</h3>
					<div class="info-why">
					    <p>Call us</p>
					    <p>Australia: 1300 735 099</p>
					    <p>New Zealand: 08 0061 3502</p>
					    <p>Mon-Fri: 9am-5pm AEST</p>
					    <p>30 Tullamarine Park Rd.</p>
					    <p>Tullamarine, Vic 3043 </p> 
					    <p>Australia.</p>
					</div>
				</div>
				<div class="payment">
				    <h3 class="bold-font center">We accept these payments</h3>
				    <img src="images/payment-option.jpg" alt="">
				    <p class="braintree-txt">Safe and Secure Payments</p>
				    <p class="braintree-txt">enabled by</p>
				    <img src="images/payment-braintree-black.jpg" alt="">
			    </div>
			</div>
		</div>
	</div>
</section>
@endsection