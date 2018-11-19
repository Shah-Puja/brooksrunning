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

		<form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
        	@csrf
			<input type="hidden" name="token" value="{{ $token }}">
			<div class="create-account--left">
				<h3 class="br-heading">Get your Password Here</h3>
				<hr>
				<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							<label for="">Enter Email Address<sup>*</sup></label>
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-field" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						</div>
					</div>
				</div>
					<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							<label>
								<div class="row">
									<div class="mob-6">Password<sup>*</sup></div>
									<div class="mob-6">
										<div class="show-pass">
										    <input type="checkbox" id="show_password" name="show_password">Show Password
									    </div>
								    </div>
								</div>
							</label>
							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-field" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						</div>
					</div>
				</div>
					<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							<label>
								<div class="row">
									<div class="mob-6">Confirm Password<sup>*</sup></div>
								</div>
							</label>
                            <input id="password-confirm" type="password" class="form-control input-field" name="password_confirmation" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="cart-btn">
							<button class="primary-button" type="submit">Send Password</button>
						</div>
						<p class="privacy">See our <a href="/info/privacy">Privacy Policy</a> and <a href="#">Terms and Conditions</a>.</p>
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
</section>
<script>
    $(document).ready(function(){
        $('#show_password').change(function() {
            if($(this).is(":checked")) {
                $('#password').prop('type', 'text');
            }else{
                $('#password').prop('type', 'password');
            }
        });
    });
</script>
@endsection