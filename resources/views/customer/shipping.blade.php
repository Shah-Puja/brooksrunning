@extends('customer.layouts.master')
@section('content')
@if(env('KLEBER_STATUS')=='ON')
<link href="https://kleber.datatoolscloud.net.au/jquery19/themes/base/jquery.ui.all.css" rel="stylesheet">
    <script src="https://kleber.datatoolscloud.net.au/jquery19/jquery-1.9.1.js"></script>
    <script src="https://kleber.datatoolscloud.net.au/jquery19/ui/jquery.ui.core.js"></script>
    <script src="https://kleber.datatoolscloud.net.au/jquery19/ui/jquery.ui.widget.js"></script>
    <script src="https://kleber.datatoolscloud.net.au/jquery19/ui/jquery.ui.position.js"></script>
    <script src="https://kleber.datatoolscloud.net.au/jquery19/ui/jquery.ui.autocomplete.js"></script>
    <script src="https://kleber.datatoolscloud.net.au/jquery19/ui/jquery.ui.menu.js"></script>
<style type="text/css">
	 .br-mark-text{
    display: -moz-inline-box !important;
  }	
  .ui-autocomplete-loading {
        background: white url('https://kleber.datatoolscloud.net.au/dt_processing_images/dt20x20.gif') right center no-repeat;
    }
    .ui-widget-content{
        width: 420px;
    height: auto;
    max-height: 250px;
    overflow-Y: auto;
    margin-top: 21px;
    font-family: 'ProximaNova-Regular';
    font-size: 15px;
    line-height: 1.3;
    }
    .ui-widget-content::-webkit-scrollbar {
            width: 7px;
        }
        .ui-widget-content::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
        }
        .ui-widget-content::-webkit-scrollbar-thumb {
            background: #0263f7;
        }
        .ui-widget-content::-webkit-scrollbar-thumb:hover {
            background:  #002855; 
        }
    @media only screen and (max-width: 600px) {
        .ui-widget-content{
        width: auto !important;
        }
}

</style>
@endif
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
				<div class="popup-container password-popup popup-wrong-password" style="display: none;">
					<div class="popup-container--wrapper">
						<div class="popup-container--info">
							<div class="close-me"><span class="icon-close-icon close-popup"></span></div>
							<h3 class="br-heading">Request to Reset Your Password</h3>
                            <p class="br-info">Provide you account email to receive an email to reset your password</p>

                            <div id="shippingbilling_popup">@include('customer.ajax_shippingbilling_popup')</div>


						</div>
					</div>
				</div>
				<!--/Password popup -->
				<!--Password popup Success -->
				<div class="popup-container password-popup popup-success" style="display: none;">
					<div class="popup-container--wrapper">
						<div class="popup-container--info">
							<div class="close-me"><span class="icon-close-icon close-popup"></span></div>
							<h3 class="br-heading">Request to Reset Your Password Received</h3>
							<p class="br-info">Thanks for submitting your email address. We have sent you an email with the information needed to reset your password. The email might take a couple of minutes to reach your account. Please check your junk mail to ensure you receive it.</p>
							<div class="cart-btn">
								<a href="/" class="primary-button pdp-button">Go to Homepage</a>
							</div>
						</div>
					</div>
				</div>
				<!--/Password popup Success-->
				<h1 class="br-heading">Shipping Address</h1>
				<p class="br-info">Your order requires a signature on delivery therefore we recommend a business address.<br/>If the address is unattended a card will be left to pick up the parcel at your nearest post office.</p>
                <!-- Shipping first step -->
				<div class="shipping-form" id="shipping-form" @if(auth()->user()) style="display: none;" @else style="display: block;" @endif>
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
                <input type="hidden" id ="guest" name="guest">
                <!-- Shipping Final step -->
			    <div class="shipping-main-form" @if(auth()->user()) style="display: block;" @else style="display: none;" @endif>
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
                                        <input type="text" id ="reset_email" value="{{(isset(auth()->user()->email) && auth()->user()->email!='')?auth()->user()->email:''}}" name="email" class="input-field main_email_field" data-label-name="email">
                                    </div>
                                </div>
                            </div>
                            @if(!auth()->user())
                            <!-- Password Wrapper -->
                            <div class="password-wrapper">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="email-msg">Looks like you have an account. Enter your password for faster checkout.</p>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <div class="input-wrapper">
                                            <label for="password"><sup>*</sup>Password</label>
                                            <input type="password" id="password_field" name="password" class="input-field">
                                        </div>
                                        <div class="reset-text">Forgot your password? Reset it <a href="javascript:void(0)" id="reset-pass-open">here</a></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <div class="cart-btn cart-btn--password">
                                            <!--<a href='javascript:void(0)' class="primary-button pdp-button login_user">Login</a>-->
                                            <button class="primary-button pdp-button login_user" type="submit">Login</button>
                                            {{-- <button class="secondary-button2" onclick="gest_user()">Checkout as guest</button> --}}
                                            <a href='javascript:void(0)' class="secondary-button2 gest_user">Checkout as guest</a>
                                            {{-- <a href='javascript:void(0)' class="continue-step" onclick="gest_user()">Continue without login</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                                        @php
                                            if(isset($orderAddress->s_fname)){
                                                $fname = $orderAddress->s_fname;
                                            }else{
                                                $fname = (isset(auth()->user()->first_name) && auth()->user()->first_name!='') ? auth()->user()->first_name:'';
                                            }
                                        @endphp
                                        <input type="text" name="s_fname" value="{{ $fname }}" class="input-field" data-label-name="first name">
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
                                        @php
                                            if(isset($orderAddress->s_lname)){
                                                $lname = $orderAddress->s_lname;
                                            }else{
                                                $lname = (isset(auth()->user()->last_name) && auth()->user()->last_name!='')?auth()->user()->last_name:'';
                                            }
                                        @endphp
                                        <input type="text" name="s_lname" value="{{ $lname }}" class="input-field" data-label-name="last name">
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
                                        @php
                                            $s_add1 = '';
                                            if(isset($orderAddress->s_add1)){
                                                $s_add1 = $orderAddress->s_add1;
                                            }
                                        @endphp
                                        <input type="text" name="s_add1" value="{{ $s_add1 }}" class="input-field AddressLine" data-label-name="address 1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-wrapper">
                                        <label for="">Address 2:</label>
                                        @php
                                            $s_add2 = '';
                                            if(isset($orderAddress->s_add2)){
                                                $s_add2 = $orderAddress->s_add2;
                                            }
                                        @endphp
                                        <input type="text" name="s_add2" value="{{ $s_add2 }}" class="input-field" data-label-name="address 2">
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
                                        @php
                                            $s_city = '';
                                            if(isset($orderAddress->s_city)){
                                                $s_city = $orderAddress->s_city;
                                            }
                                        @endphp
                                        <input type="text" name="s_city" value="{{ $s_city }}" class="input-field" data-label-name="suburb">
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
                                        <label for=""><sup>*</sup>State / Country: {!! $error_s_state !!}</label>
                                        @php
                                            if(isset($orderAddress->s_state)){
                                                $s_state = $orderAddress->s_state;
                                            }else{
                                                $s_state = (isset(auth()->user()->state) && auth()->user()->state!='')? auth()->user()->state:"";
                                            }
                                        @endphp
                                        <select class="select-field" name="s_state" data-label-name="state">
                                            <option value="" selected="selected">Select State</option>
                                            <option value="ACT" {{ (isset($s_state) &&  $s_state =='ACT' )?"selected='selected":"" }} >ACT</option>
                                            <option value="NSW" {{ (isset($s_state) &&  $s_state =='NSW' )?"selected='selected":"" }}>NSW</option>
                                            <option value="NT"  {{ (isset($s_state) &&  $s_state =='NT' )?"selected='selected":"" }}>NT</option>
                                            <option value="QLD" {{ (isset($s_state) &&  $s_state =='QLD' )?"selected='selected":"" }}>QLD</option>
                                            <option value="SA"  {{ (isset($s_state) &&  $s_state =='SA' )?"selected='selected":"" }}>SA</option>
                                            <option value="TAS" {{ (isset($s_state) &&  $s_state =='TAS' )?"selected='selected":"" }}>TAS</option>
                                            <option value="VIC" {{ (isset($s_state) &&  $s_state =='VIC' )?"selected='selected":"" }}>VIC</option>
                                            <option value="WA"  {{ (isset($s_state) &&  $s_state =='WA' )?"selected='selected":"" }}>WA</option>
                                            <option value="New Zealand" {{ (isset($s_state) &&  $s_state =='New Zealand' )?"selected='selected":"" }}>New Zealand</option>
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
                                        @php
                                            if(isset($orderAddress->s_postcode)){
                                                $s_postcode = $orderAddress->s_postcode;
                                            }else{
                                                $s_postcode = (isset(auth()->user()->postcode) && auth()->user()->postcode!='')?auth()->user()->postcode:'';
                                            }
                                        @endphp
                                        <input type="text" class="input-field" value="{{ $s_postcode }}" name="s_postcode" min='0' inputmode='numeric' pattern='[0-9]*' class="input-field allownumericwithdecimal" data-label-name="postal code">
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
                                        @php
                                            if(isset($orderAddress->s_phone)){
                                                $s_phone = $orderAddress->s_phone;
                                            }else{
                                                $s_phone = (isset(auth()->user()->phone) && auth()->user()->phone!='')?auth()->user()->phone:'';
                                            }
                                        @endphp
                                        <input type="number" pattern="\d*" name="s_phone" value="{{ $s_phone }}" class="input-field" data-label-name="phone">
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
                                                    <div class="text">Check this box if you wish to receive communication from Brooks on new products, exclusive offers and info to help you Run Happy.</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-wrapper">
                                        @php
                                            $order_info = '';
                                            if(isset($orderAddress->order_info)){
                                                $order_info = $orderAddress->order_info;
                                            }
                                        @endphp
                                        <label for="comment">Delivery Comments :</label>
                                        <textarea name="order_info" class="input-textarea">{{ $order_info }}</textarea>
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
                                            <label for="different-address">
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
                                            <input type="text" name="b_add1" class="input-field AddressLine" data-label-name="address 1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-wrapper">
                                            <label for="">Address 2</label>
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
                                            <label for=""><sup>*</sup>State / Country: {!! $error_b_state !!}</label>
                                            <select class="select-field" name="b_state" data-label-name="state">
                                                <option value="" selected="selected">Select State</option>
                                                <option value="ACT" {{ $state =='ACT' ? "selected='selected'": "" }}>ACT</option>
                                                <option value="NSW" {{ $state =='NSW' ? "selected='selected'": "" }}>NSW</option>
                                                <option value="NT" {{ $state =='NT' ? "selected='selected'": "" }}>NT</option>
                                                <option value="QLD" {{ $state =='QLD' ? "selected='selected'": "" }}>QLD</option>
                                                <option value="SA" {{ $state =='SA' ? "selected='selected'": "" }}>SA</option>
                                                <option value="TAS" {{ $state =='TAS' ? "selected='selected'": "" }}>TAS</option>
                                                <option value="VIC" {{ $state =='VIC' ? "selected='selected'": "" }}>VIC</option>
                                                <option value="WA" {{ $state =='WA' ? "selected='selected'": "" }}>WA</option>
                                                <option value="New Zealand" {{ $state =='New Zealand' ? "selected='selected'": "" }}>New Zealand</option>
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
                                            <input type="text" maxlength="4" name="b_postcode" min='0' inputmode='numeric' pattern='[0-9]*' class="input-field allownumericwithdecimal" data-label-name="postal code">
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
                                            <input type="number" pattern="\d*" name="b_phone" class="input-field phone-number" data-label-name="phone">
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
                                                        I have read and agree to the <a href="/info/privacy">Privacy Policy</a> and <a href="/info/terms-conditions" class="shipping--popup">Terms and Conditions</a>.
                                                    </div><br>
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
                        <!-- <div class="order order_summary">-->
                                @include('cart.order_summary') 
                       <!--  </div>-->
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
									<a href="https://www.afterpay.com/en-AU/terms-of-service" class="moreinfo">For full terms and conditions please visit Afterpay</a>
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
				    <img src="/images/payment-option.jpg" alt="">
				    <p class="braintree-txt">Safe and Secure Payments</p>
				    <p class="braintree-txt">enabled by</p>
				    <img src="/images/payment-braintree-black.jpg" alt="">
			    </div>
			</div>
		</div>
    </div>
</section>
@if(env('KLEBER_STATUS')=='ON')
<script>
        $(function() {
            $(".AddressLine").autocomplete({
                source: function( request, response ) {
                    var RequestKey = "{{env('KLEBER_REQUESTKEY')}}";
                    //if(request.term.length > 3){
                        $.ajax({
                            url: "{{env('KLEBER_URL')}}/KleberWebService/DtKleberService.svc/ProcessQueryStringRequest",
                            dataType: "jsonp",
                            type: "GET",
                            contentType: "application/json; charset=utf-8",
                            data: {Method:"DataTools.Capture.Address.Predictive.AuNzPaf.SearchAddress", AddressLine:request.term,  ResultLimit:" ", DisplayOnlyCountryCode:"", RequestId:" ", RequestKey:RequestKey, DepartmentCode:" ", OutputFormat:"json" },
                            success: function( data ) {
                                response( $.map( data.DtResponse.Result, function( item ) {
                                    var Output = (item.AddressLine + ", " + item.Locality + ", " + item.State + ", " + item.Postcode + ", " + item.Country + ", " + item.CountryCode);
                                    return {
                                        label: Output ,
                                        array: item
                                    }
                                }));
                            }
                        });
                    //}
                },
                select: function( event, ui ) {
                    var country_code = ui.item.array.CountryCode;
                    if(country_code=='AU'){
                        var method = 'DataTools.Capture.Address.Predictive.AuPaf.RetrieveAddress';
                    }else{
                        var method = 'DataTools.Capture.Address.Predictive.NzPaf.RetrieveAddress';
                    }
                    var RecordId = ui.item.array.RecordId;
                    var RequestKey = "{{env('KLEBER_REQUESTKEY')}}";
                    var attr_name = $(this).attr('name');

                    $.ajax({
                        url: "https://kleber.datatoolscloud.net.au/KleberWebService/DtKleberService.svc/ProcessQueryStringRequest",
                        dataType: "jsonp",
                        type: "GET",
                        contentType: "application/json; charset=utf-8",
                        data: {

                            Method: method,
                            RecordId: "" + RecordId,
                            RequestId: "",
                            RequestKey: "" + RequestKey,
                            DepartmentCode: "" ,
                            OutputFormat: "json"
                        },
                        success: function (data) {
                            $.map(data.DtResponse.Result, function (item) {
                                var billing_type = attr_name;
                                if(billing_type=='s_add1'){
                                    $("input[name='s_city']").val("");
                                    $("input[name='s_postcode']").val("");
                                    $("select[name='s_state']").val("");
                                    $("input[name='s_postcode']").val(item.Postcode);
                                   
                                    if(country_code!='AU'){ // Newzealand
                                        if(item.Suburb!=''){
                                            $("input[name='s_city']").val(item.Suburb);
                                        }else{
                                            $("input[name='s_city']").val(item.TownCityMailtown);
                                        }
                                        $("select[name='s_state']").val("New Zealand");
                                    }else{ // Australia
                                        $("input[name='s_city']").val(item.Locality);
                                        $("select[name='s_state']").val(item.State);
                                    }
                                    setTimeout(function(){
                                        $("input[name='s_add1']").val("");
                                        $("input[name='s_add2']").val("");
                                        $("input[name='s_add1']").val(item.AddressLine);
                                        $("input[name='s_add2']").val(item.BuildingName);
                                    }, 200);
                                }else{
                                    $("input[name='b_city']").val("");
                                    $("input[name='b_postcode']").val("");
                                    $("select[name='b_state']").val("");
                                    $("input[name='b_postcode']").val(item.Postcode);
                                   
                                    if(country_code!='AU'){ // Newzealand
                                        if(item.Suburb!=''){
                                            $("input[name='b_city']").val(item.Suburb);
                                        }else{
                                            $("input[name='b_city']").val(item.TownCityMailtown);
                                        }
                                        $("select[name='b_state']").val("New Zealand");
                                    }else{ // Australia
                                        $("input[name='b_city']").val(item.Locality);
                                        $("select[name='b_state']").val(item.State);
                                    }
                                    setTimeout(function(){
                                        $("input[name='b_add1']").val("");
                                        $("input[name='b_add2']").val("");
                                        $("input[name='b_add1']").val(item.AddressLine);
                                        $("input[name='b_add2']").val(item.BuildingName);
                                    }, 200);
                                }
                                /*$('#DPID').val(item.DPID);
                                $('#UnitType').val(item.UnitType);
                                $('#UnitNumber').val(item.UnitNumber);
                                $('#LevelType').val(item.LevelType);
                                $('#LevelNumber').val(item.LevelNumber);
                                $('#LotNumber').val(item.LotNumber);
                                $('#StreetNumber1').val(item.StreetNumber1);
                                $('#StreetNumberSuffix1').val(item.StreetNumberSuffix1);
                                $('#StreetNumber2').val(item.StreetNumber2);
                                $('#StreetNumberSuffix2').val(item.StreetNumberSuffix2);
                                $('#PostBoxNumber').val(item.PostBoxNumber);
                                $('#PostBoxNumberPrefix').val(item.PostBoxNumberPrefix);
                                $('#PostBoxNumberSuffix').val(item.PostBoxNumberSuffix);
                                $('#StreetName').val(item.StreetName);
                                $('#StreetType').val(item.StreetType);
                                $('#StreetSuffix').val(item.StreetSuffix);
                                $('#PostBoxType').val(item.PostBoxType);
                                $('#BuildingName').val(item.BuildingName);
                                $('#AddressLine').val(item.AddressLine);
                                $('#Locality').val(item.Locality);
                                $('#State').val(item.State);
                                $('#Postcode').val(item.Postcode);*/
                            });
                        }
                    });
                
                },
            });
            
        });
	</script>
@endif
<script src="/js/shippingbilling.js"></script>

@endsection
