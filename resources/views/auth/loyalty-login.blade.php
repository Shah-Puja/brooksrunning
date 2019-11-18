@extends('customer.layouts.master')


@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Brooks Professional Purchase Program</h1>
			</div>
		</div>
	</div>
</div>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-4 tab-6">
			<div class="create-account--left">
				<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
				@csrf
					<h3 class="br-heading">Log in to your Account</h3>
					<hr>
					<div class="row">
						<div class="tab-12">
							<div class="input-wrapper">
								<label for="">Email Address<sup>*</sup></label>
								<input id="email" type="email" class="input-field{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>								
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
								
									<div class="row">
										<div class="mob-6"><label>Password<sup>*</sup></label></div>
										<div class="mob-6">
										<label><div class="show-pass">
												<input type="checkbox" id="show_password" name="show_password">Show Password
										</label></div>
										</div>
									</div>
								</label>
								<input id="password" type="password" class="input-field{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
							<div class="forgot-password">								
								<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="tab-12">
							<div class="input-wrapper">
								<div class="checklist-inline">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>									
									<label for="remember">
											<div class="mark"><span></span></div>
											<div class="text">Remember me</div>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="tab-12">
							<div class="cart-btn">
								<!--<button class="primary-button">Log in</button>-->
								<button type="submit" class="primary-button">
										{{ __('Login') }}
									</button>
							</div>
							<p class="privacy">See our <a href="/info/privacy">Privacy Policy</a> and <a href="/info/terms-conditions">Terms and Conditions</a>.</p>
							<!-- <p class="privacy" >Don't have an account? <a class="br-heading" href="/register" style="color: #0263f7; font-size:14px; text-decoration:none;">Sign up now <img style="width:14px;" src="/images/home/link-arrow--icon.png" alt=""></a></p> -->
						</div>
					</div>
			</form>
			</div>
		</div>
		<div class="col-5 tab-6">
			<div class="create-account--left">
			<h3 class="br-heading">Don't have an account?</h3>
			<div class="loyalty-btn">
			<a class="primary-button"  href="/register">Apply now</a>
			</div>
			</div>
		</div>
		<div class="col-3 tab-12">
                <div class="create-account--right">
                    <div class="header">
                        <div class="icon-img">
                            <img src="/images/accounts/icon-profile.png" alt="">
                        </div>					
                        <h3>What is the Brooks Professional Purchase Program? </h3>
                    </div>
					<div class="row">
                        <div class="tab-4 col-12">
                            <div class="info">
                                <p>The Brooks <sup>&reg;</sup> Professional Purchase Program enables Sports Medicine practitioners<sup>*</sup> to purchase Brooks products for their personal use at exclusive member pricing. </p>
                            </div>
                        </div>
                        <div class="tab-4 col-12">
                            <div class="info">
                                <p>We believe practitioners are an integral part of the footwear industry and have created this program in recognition of this role and to enable you to experience our products. </p>
                            </div>
                        </div>
                        <div class="tab-4 col-12">
                            <div class="info">
                                <p>* <i>This program is open to currently practicing, registered Podiatrists and Sports Muscoskeletol Physiotherapists. Sports Chiropractors and Sports Osteopaths.</i> </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
	</div>
	<!-- <div class="row">
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
	</div> -->
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