@extends('customer.layouts.master')
@section('content')
<section class="wrapper cart-breadcrumb--header">
	<div class="row hidden-xs">
		<div class="col-9">
			<div class="cart-header--step">
				<ul>
					<li class="step">Step 3 of 3 </li>
					<li>1. Checkout</li>
					<li>2. Shipping &amp; Billing</li>
					<li class="active">3. Payment</li>
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
					<h3 class="bold-font">Order Summary</h3>
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
			</div>
			<div class="shipping-right--container payment-container">
				<h1 class="br-heading">Select Your Payment Method</h1>
				<div class="tab-container">
					<ul class="tabs payment-tab">
						<li class="tab-link current" data-tab="tab-1">
							<div class="input-wrapper">
								  <div class="radio-inline">
								  	  <input type="radio" name="sizechart" id="tab-opt1" checked="checked">
								      <label for="tab-opt1">
								      	    <div class="mark"><span></span></div>
								      	    <div class="text">
								      	    	<img src="images/icon-visa-master.png" alt="">
								      	    </div>
								       </label>
								  </div>
							</div>	
						</li>
						<li class="tab-link" data-tab="tab-2">
							<div class="input-wrapper">
								  <div class="radio-inline">
								  	  <input type="radio" name="sizechart" id="tab-opt2">
								      <label for="tab-opt2">
								      	    <div class="mark"><span></span></div>
								      	    <div class="text">
								      	    	<img src="images/icon-paypal-blue.png" alt="">
								      	    </div>
								       </label>
								  </div>
							</div>
						</li>
						<li class="tab-link" data-tab="tab-3">
							<div class="input-wrapper">
								  <div class="radio-inline">
								  	  <input type="radio" name="sizechart" id="tab-opt3">
								      <label for="tab-opt3">
								      	    <div class="mark"><span></span></div>
								      	    <div class="text">
								      	    	<img src="images/payment-afterpay--black.png" alt="">
								      	    	<span class="info afterpay-popup--control">info</span>
								      	    </div>
								       </label>
								  </div>
							</div>
						</li>
					</ul>
					<div id="tab-1" class="tab-content current">
						<div class="payment-container--info">
							<div class="secured-info">
								<span>Secure Credit Card Payment 
									<span class="tick"><img src="images/tick.jpg" alt=""></span>
								</span>
							</div>
						<form action="" id="my-sample-form" method="post">
						@csrf
							<input type="hidden" name="payment_method_nonce" value="">
							<div class="shipping-form">
								<p class="email-msg">Enter your Credit Card Details</p>
								<div class="row">
									<div class="col-6">
										<div class="input-wrapper">
											<label for="email1"><sup>*</sup>Name on Card</label>
											<input type="text" class="input-field">
										</div>
									</div>
									<div class="col-6">
										<div class="input-wrapper">
											<label for="card-number"><sup>*</sup>Card Number</label>
											<div id="card-number" class="input-field"></div>
										</div>
									</div>
									<div class="col-6">
										<div class="input-wrapper">
											<label for=""><sup>*</sup>Card Expiry Date</label>
											<div class="row">
												<div class="mob-6 card-after">
													<div id="expiration-month" class="input-field"></div>
												</div>
												<div class="mob-6">
													<div id="expiration-year" class="input-field year"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="input-wrapper security-code">
											<label for="cvv"><sup>*</sup>Security Code ()</label>
											<div id="cvv" class="input-field security"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="cart-btn">
											<button type="submit" id="my-submit" value="Pay" class="primary-button pdp-button">Pay now & place order</button>
										</div>
										<div class="btn-info">
											<sup>*</sup>Please do not press more than once.<br/>Payment may take 1-2 minutes for processing.
										</div>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
					<div id="tab-2" class="tab-content">
						 <div class="payment-afterpay">
							<div class="header">
								<h3>Paypal</h3>
							</div>
							<div class="payment-schedule">
								<img src="images/icon-paypal-checkout.png" class="paypal-btn" alt="">
								<div class="payment-afterpay--info">
									<p>Click on the Paypal button to log into your Paypal account<br/>Then place your order by clicking on the ‘Pay Now & Place Order’ button that appears below.<br/><sup>*</sup>Please ensure that your browser allows pop-ups to pay, with Paypal.</p>
								</div>
							</div>
						</div>
					</div>
					<div id="tab-3" class="tab-content">
						<div class="payment-afterpay">
							<div class="header">
								<h3>Afterpay</h3>
								<img src="images/payment-afterpay--black.png" alt="">
								<p>Receive your item(s) now and pay later with<br/>
								4x fortnightly payments of $80.00</p>
							</div>
							<div class="payment-schedule">
								<h3>Your payment schedule</h3>
								<ul>
									<li>
										<div class="round-icon icon1"></div>
										<p><span>$80.00</span> First payment</p>
									</li>
									<li>
										<div class="round-icon icon2"></div>
										<p><span>$80.00</span> 2 weeks later</p>
									</li>
									<li>
										<div class="round-icon icon3"></div>
										<p><span>$80.00</span> 4 weeks later</p>
									</li>
									<li>
										<div class="round-icon icon4"></div>
										<p><span>$80.00</span> 6 weeks later</p>
									</li>
								</ul>
								<div class="payment-btn">
									<button class="pdp-button">Pay now with <img src="images/payment-afterpay.png" alt=""></button>
								</div>
								<div class="payment-afterpay--info">
									<p>Please ensure your browser allows pop-up windows to pay with Afterpay.<br/>When you click ‘PAY WITH AFTERPAY’ you will be redirected to the Afterpay login window to complete your order. Please not that once you complete your payment details with Afterpay, this order will be finalised and completed for processing</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3 tab-4">
			<div class="cart-right--container">
				<div class="order hidden-mob">
					<h3 class="bold-font">Order Summary</h3>
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
<script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>
	<script src="https://js.braintreegateway.com/web/3.34.1/js/client.min.js"></script>
	<script src="https://js.braintreegateway.com/web/3.34.1/js/paypal-checkout.min.js"></script>
	<script src="https://js.braintreegateway.com/web/3.34.1/js/hosted-fields.min.js"></script>

    <script>
      var form = document.querySelector('#my-sample-form');
      var submit = document.querySelector('button[type="submit"]');
			
      braintree.client.create({
        authorization: '{{ $clientToken }}'
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }

		// Create a PayPal Checkout component.
		braintree.paypalCheckout.create({
			client: clientInstance
		}, function (paypalCheckoutErr, paypalCheckoutInstance) {

		// Stop if there was a problem creating PayPal Checkout.
		// This could happen if there was a network error or if it's incorrectly
		// configured.
		if (paypalCheckoutErr) {
		  console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
		  return;
		}

		// Set up PayPal with the checkout.js library
		paypal.Button.render({
		  env: 'sandbox', // Or 'sandbox'
		  commit: true, // This will add the transaction amount to the PayPal button

			style: {
				size: 'large',
				color: 'gold',
				shape: 'rect',
				label: 'checkout',
				tagline: 'false'
			},

		  payment: function () {
		    return paypalCheckoutInstance.createPayment({
		      flow: 'checkout', // Required
		      amount: {{ $cartGrandTotal }}, // Required
		      currency: 'AUD', // Required
		      enableShippingAddress: false,
		      shippingAddressEditable: false,
		    });
		  },

		  onAuthorize: function (data, actions) {
		    return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
		      document.querySelector('input[name="payment_method_nonce"]').value = payload.nonce;
		      form.submit();
		    });
		  },

		  onCancel: function (data) {
		    console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
		  },

		  onError: function (err) {
		    console.error('checkout.js error', err);
		  }
		}, '#paypal-button').then(function () {
		  // The PayPal button will be rendered in an html element with the id
		  // `paypal-button`. This function will be called when the PayPal button
		  // is set up and ready to be used.
		});

		});

        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
							placeholder: '4111 1111 1111 1111',
            },
            cvv: {
              selector: '#cvv',
              placeholder: '123'
            },
            expirationMonth: {
							selector: '#expiration-month',
							placeholder: 'MM'
						},
						expirationYear: {
							selector: '#expiration-year',
							placeholder: 'YY'
						},
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
          if (hostedFieldsErr) {
            console.error(hostedFieldsErr);
            return;
          }

          submit.removeAttribute('disabled');
				

          form.addEventListener('submit', function (event) {
            event.preventDefault();
            hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
              if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
              }
							$('.cart-btn button').prop( "disabled", true );
				    	$('.loading-img').show();
              document.querySelector('input[name="payment_method_nonce"]').value = payload.nonce;
              form.submit();
            });
          }, false);
        });
      });
    </script>
@endsection