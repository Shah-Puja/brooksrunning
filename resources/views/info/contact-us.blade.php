@extends('customer.layouts.master')

@section('head')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

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
				<div class="contact-container">
					<h3 class="br-heading">Quick help</h3>
					<ul class="quick-help--link">
						<li>
							<a href="/info/returns-exchange">Returns Centre</a>
						</li>
					</ul>
				</div>
				
				<form name="contact-us" id='contact-us' method="post" action="" onsubmit="return contactus()">
				<h3 class="br-heading">Submit a question to our support team</h3>
					@csrf
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>First Name</label>
							<input type="text" name="fname"  id="fname" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>Last Name</label>
							<input type="text" name="lname"  id="lname" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>Email Address</label>
							<input type="text" name="email" id="email" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for=""><sup>*</sup>Phone Number</label>
							<input type="text" name="phone" id="phone" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="name"><sup>*</sup>Subject</label>
                            <input type="text" name="subject" id="subject" class="input-field">
						</div>
					</div>
					<div class="tab-6">
                        <div class="input-wrapper">
							<label for="name"><sup>*</sup>Category</label>
							<select class="select-field" name="category" id="category" style="margin-bottom: 0px;">
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
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Order Number - If you have placed an order, please refer to your Order Number in the email you received.</label>
                            <input type="text" name="order_no" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<div class="g-recaptcha captcha" data-sitekey="{{ config('services.google.recaptcha_key') }}"></div>
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
			</form>
		</div>
		<div class="col-3 contact-details--right">
			<div class="info-wrapper">
				<div class="icon">
					<img src="images/brooks_aus_icons_email.svg" alt="">
				</div>
				<div class="info">
					<h3 class="br-heading">Email us</h3>
					<p><a href="/info/contact-us"><u>Fill in our email support form</u></a> and we'll get back to you shortly.</p>
					</div>
			</div>
			<div class="info-wrapper">
				<div class="icon">
					<img src="/images/brooks_aus_icons_phone.svg" alt="">
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
<script>
	 	function contactus(){
			$("#contact-us input,#contact-us textarea,#contact-us select").removeClass("error");
			$("#contact-us input,#contact-us textarea,#contact-us select").parent().find('label span').remove();
			var form_data =  $('#contact-us').serialize();
		 	$.ajax({
	            url: "/info/contact-us", 
	            method: "post", 
	            data: form_data,
	            success: function(response) {
					$('#contact-us').remove();
					$(".contact-container").after("<h2 class='success'>"+response.success+"</h2>")
	            	return false;
	            },
	            error: function(error){
					let obj = JSON.parse(error.responseText);
					console.log(obj);
					$.each( obj.errors, function( key, value ) {
						let input_label = $("#contact-us input[id="+key+"],#contact-us textarea[id="+key+"],#contact-us select[id="+key+"]").parent().find('label');
						let label_text = input_label.html();
						let error_span = " <span class='error'>"+ value +"</span>";
						let error = label_text + error_span ;
						input_label.html(error);
						$("#contact-us input[name="+key+"],#contact-us select[name="+key+"]").addClass("error");
					});
	            }
	        });
	 		return false;
	 	}
	 </script>
@endsection