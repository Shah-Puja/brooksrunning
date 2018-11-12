@extends('customer.layouts.master')
@section('content')

<div class="contact-us--banner">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<img src="/images/competition/contact-banner.png" alt="">
				<div class="heading">
					<h1 class="br-mainheading">Contact Us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9">
			<div class="create-account--left contact-us--container">
				<h3 class="br-heading">Quick help</h3>
				<ul class="quick-help--link">
					<li>
						<a href="/info/returns-exchange">Returns Centre</a>
					</li>
				</ul>
				<h3 class="br-heading">Submit a question to our support team</h3>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>First Name</label>
							<input type="text" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>Last Name</label>
							<input type="text" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>Email Address</label>
							<input type="text" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>Phone Number</label>
							<input type="text" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="name"><sup>*</sup>Subject</label>
                            <input type="text" class="input-field">
						</div>
					</div>
					<div class="tab-6">
                        <div class="input-wrapper">
							<label for="name"><sup>*</sup>Category</label>
                            <div class="custom-select gray-bg">
						       <!-- <div class = "select-box">
								    <div class = "label-heading">
								    	<span class="text">Select Category</span> 
								    	<div class="sel-icon">
								    		<span class="icon-down-arrow"></span>
								    	</div>
								    </div> -->
								    <!-- <ul class="select-option--wrapper">
								    	<option class="option-value" value="">Select Category</option>
                                        <option class="option-value" value="order info">Order Info</option>
		                                <option class="option-value" value="return info">Return Info</option>
		                                <option class="option-value" value="selecting correct product">Selecting a correct product</option>
										<option class="option-value" value="product questions">Product questions / feedback</option>
										<option class="option-value" value="sponsorship">Sponsorship</option>
										<option class="option-value" value="technical support">Technical support</option>
										<option class="option-value" value="media enquiries">Media enquiries</option>
										<option class="option-value" value="other">Other</option>
								    </ul> -->
									<select class="select-field" style="margin-bottom: 0px;">
										<option value="-">Select Category</option>
										<option value="order info">Order Info</option>
										<option value="return info">Return Info</option>
										<option value="selecting correct product">Selecting a correct product</option>
										<option  value="product questions">Product questions / feedback</option>
										<option value="sponsorship">Sponsorship</option>
										<option value="technical support">Technical support</option>
										<option value="media enquiries">Media enquiries</option>
										<option value="other">Other</option>
									</select>
								</div>
						    </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Order Number - If you have placed an order, please refer to your Order Number in the email you received.</label>
                            <input type="password" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<div class="captcha">Captcha Code <br/>Show Here</div>
                            <input type="password" class="input-field" placeholder="Enter Above Text">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="cart-btn">
							<button class="primary-button">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3 contact-details--right">
			<div class="info-wrapper">
				<div class="icon">
					<img src="images/brooks_aus_icons_email.svg" alt="">
				</div>
				<div class="info">
					<h3 class="br-heading">Email us</h3>
					<p><a href="http://brooks.syginteractive.com/contact-us"><u>Fill in our email support form</u></a> and we'll get back to you shortly.</p>
					</div>
			</div>
			<div class="info-wrapper">
				<div class="icon">
					<img src="images/brooks_aus_icons_phone.svg" alt="">
				</div>
				<div class="info">
					<h3 class="br-heading">Call us</h3>
					<p>Australia: 1300 735 099 <br/>New Zealand: 08 0061 3502 <br/>We're available to help you 
						<br/>Mon - Fri 9am - 5pm AEST</p>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
$( '#btn-validate' ).click(function(){
  var $captcha = $( '#recaptcha' ),
      response = grecaptcha.getResponse();
  
  if (response.length === 0) {
    $( '.msg-error').text( "reCAPTCHA is mandatory" );
    if( !$captcha.hasClass( "error" ) ){
      $captcha.addClass( "error" );
    }
  } else {
    $( '.msg-error' ).text('');
    $captcha.removeClass( "error" );
    alert( 'reCAPTCHA marked' );
  }
})
</script>
@endsection