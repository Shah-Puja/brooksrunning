@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Forgot Password ?</h1>
			</div>
		</div>
	</div>
</div>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-5 tab-6">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form aria-label="{{ __('Reset Password') }}">
            @csrf
			<div class="create-account--left">
				<h3 class="br-heading">Get your Password Here</h3>
				<hr>
				<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							<label for="">Enter Email Address<sup>*</sup></label><span id="msg" style="color:green;"></span>
                            <input type="text" name="email" id="email" class="input-field form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback error" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="cart-btn">
							<button type="button" class="primary-button pdp-button reset_password">{{ __('Send') }}</button>
						</div>
						<p class="privacy">See our <a href="/info/privacy">Privacy Policy</a> and <a href="/info/terms-conditions">Terms and Conditions</a>.</p>
					</div>
				</div>
            </div>
        </form>
		</div>
		<div class="col-7 tab-6 hidden-mob">
			<div class="create-account--banner">
				<img src="/images/accounts/login-banner.png" alt="">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="create-account--right bottom-info">
				<div class="header">
					<div class="icon-img">
						<img src="/images/accounts/icon-profile.png" alt="">
					</div>
					<h3>Why Create An Account?</h3>
				</div>
				<div class="row">
					<div class="tab-4">
						<div class="info">
							<h4>Faster Checkout</h4>
						    <p>Save your billing and shipping information to make it easier to buy your favourite gear.</p>
						</div>
					</div>
					<div class="tab-4">
						<div class="info">
							<h4>Order History</h4>
						    <p>Look up important information about your current and past orders.</p>
						</div>
					</div>
					<div class="tab-4">
						<div class="info">
							<h4>News and Exclusive Offers</h4>
						    <p>Sign up to receive email updates on special promotions, new product announcements, gift ideas, and more.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
    <script>
        $(document).ready(function(){
            $(".reset_password").on('click',function(){
                var email = $("#email").val();
                
                if ($('#email').val() == "") {
                    $('#email').addClass("needsfilled");
                    $('#email').val("");
                    $('#email').attr("placeholder", "REQUIRED");	
                } else {
                    $('#email').removeClass("needsfilled");
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // url:"/shipping-check-email",
                        url:"/reset_pass",
                        type:"POST",
                        data: {email:email},
                        success: function(data){
                            console.log(data);
                            if(data == "true"){
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: 'post',
                                    url: "/password/email",
                                    data : { email : email },
                                    success:function(data){
                                        console.log(data);
                                        $("#msg").text("kindly check your mail for reset password");
                                        $('#email').val("");
                                    },
                                    error: function(jq,status,message) {
                                        alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
                                    }
                                })
                            }else{
                                $('#email').addClass("needsfilled");
                                $('#email').val("");
                                $('#email').attr("placeholder", "Wrong Email Id");
                            }
                        }
                    });
                }
                return false;
            });
        });
    </script>

</section>

@endsection