<?php include("header.php") ?>
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Account Log in</h1>
			</div>
		</div>
	</div>
</div>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-5 tab-6">
			<div class="create-account--left">
				<h3 class="br-heading">Log in to your Account</h3>
				<hr>
				<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							<label for="">Email Address<sup>*</sup></label>
							<input type="text" class="input-field">
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
										    <input type="checkbox" name="vehicle" value="Bike">Show Password
									    </div>
								    </div>
								</div>
							</label>
                            <input type="password" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="forgot-password">
							  <a href="account-password.php">Forgot Password?</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							  <div class="checklist-inline">
							  	  <input type="checkbox" id="signme">
							      <label for="signme">
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
							<button class="primary-button">Log in</button>
						</div>
						<p class="privacy">See our <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions</a>.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-7 tab-6 hidden-mob">
			<div class="create-account--banner">
				<img src="images/accounts/login-banner.png" alt="">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="create-account--right bottom-info">
				<div class="header">
					<div class="icon-img">
						<img src="images/accounts/icon-profile.png" alt="">
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

<?php include("footer.php") ?>