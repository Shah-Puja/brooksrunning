@if(Session::get('medibank_gateway')=='Yes')
<link rel="stylesheet" href="/css/medibank-styles.css">
<section class="homepage-medibank--container">
<div class="wrapper  padding_left-0 padding_right-0">
	<div class="row">
		<div class="mob-12 col-12">
			<div class="homepage-medibank--info">
				<div class="wrapper">
					<div class="row">
						<div class="col-6 tab-6">
						   <a href="/"> 
			                    <div class="logo">
			                        <img src="/images/medibank/Medibank_LiveBetter_horizontal-reversed_large.png" alt="Brooks Running Aus">
			                    </div>
			                </a>
						</div>
						<div class="col-6 tab-6">
						    @if(Session::get('medibank_gateway')=='Yes' && Session::get('medibank_user')=='Yes')
							<div class="medibank--subinfo--login--success medibank-log-in medibank--div">
								<section class="wrapper">
									<div class="row">
										<div class="col-4">&nbsp;
										</div>
										<div class="col-8">
											<div class="medibank--login--success">
												<div class="login_success">
												<p class="success-text" >Welcome, <span class="user-name">Lydia</span>!</p>
												<p class="login-text" style="display:none;">Log In</p>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							@elseif(Session::get('medibank_gateway')=='Yes' && Session::get('medibank_user_failed')=='Yes')

							<div class="medibank--subinfo--login--failed medibank--div" >
								<div class="row">
									<div class="col-5">&nbsp;
									</div>
									<div class="col-7">
										<div class="medibank--login--failed">
											<label>Log In</label>
											<div class="login_failed">
											<p class="failed-text">Sorry your member number could not be validated. Please try again. </p>
											<div class="ctg-btn clearfix">
												<span><a class="secondary-button" href="{{URL::previous()}}">Cancel</a></span>
												<span><a class="primary-button" href="{{URL::previous()}}">Try Again</a></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							@else 
							@php $medibank_home_login_class = $medibank_other_class = '';
									   if($view_name=='customer-index'): 
									   		$medibank_other_class= 'hidden';
									   else:
									   		$medibank_home_login_class = 'hidden';
									   endif;
									@endphp 
							<div class="medibank--subinfo--login medibank--div {{$medibank_home_login_class}}"">
								<div class="row">
									<div class="col-2">&nbsp;
										</div>
									<div class="col-4">
										<div class="medibank--content">
											<label>Please log in with your
													Medibank ID and the
													email address registered
													with Medibank to claim
													your earn points
											</label>
										</div>
									</div>
									
									<div class="col-6">
										<div class="medibank--login">
											<label>Log In</label>
											<div class="form--option">
												<div class="input-wrapper">
											      <label for="email">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">
															<form name="medibank-login" method="POST" action="/medibank_check_user">
																<input type="email" class="medibank-input" name="email" placeholder="Email Address" required>
																<input type="text" class="medibank-input" name="medibank_id" placeholder="Medibank ID" required>
																{!! csrf_field() !!}
																<button name="button"  class="pdp-button medibank-login-button">Verify</button>
															</form>
											      	    </div>
											       </label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="medibank--subinfo--login--success medibank-log-in medibank--div {{$medibank_other_class}}">
								<section class="wrapper">
									<div class="row">
										<div class="col-4">&nbsp;
										</div>
										<div class="col-8">
											<div class="medibank--login--success">
												<div class="login_success">
												<p class="login-text">Log In</p>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							@endif
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section> 


<script>
$(document).ready(function(){
  $(".medibank-log-in .login-text").click(function(){
    $(".medibank--subinfo--login").css("display", "block");
    $(".medibank--subinfo--login--success").css("display", "none");
  });
});

</script>

@endif