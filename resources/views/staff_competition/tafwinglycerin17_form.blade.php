<form name="staff_competition" id='staff_competition' method="post"  onsubmit="return insert_staff_competition()">
	<div class="row">
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Name</label>
				<input type="text" name="name"  class="input-field">
			</div>
		</div>
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Email Address</label>
				<input type="text" name="email" class="input-field">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Store Name</label>
				<input type="text" name="store_name" class="input-field">
			</div>
		</div>
		<div class="tab-6">
			<div class="input-wrapper">
				<label class='gender-label'><sup>*</sup>Gender</label>
				<div class="radio-inline">
					<input type="radio" class="input-radio" name="gender" value="male" id="male">
					<label for="male">
						<div class="mark"><span></span></div>
						<div class="text">Male</div>
					</label>
				</div>
				<div class="radio-inline">
					<input type="radio" class="input-radio" name="gender" value="female" id="female">
					<label for="female">
						<div class="mark"><span></span></div>
						<div class="text">Female</div>
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="tab-6">
			<div class="row">
				<div class="mob-6">
					<div class="input-wrapper">
						<label>Postcode<sup>*</sup></label>
						<input type="text" name="postcode" class="input-field">
					</div>
				</div>
				<div class="mob-6">
					<div class="input-wrapper">
						<label>Shoe Size<sup>*</sup></label>
						<input type="text" name="shoe_size" class="input-field">
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="comp_name" value="{{ $competition->comp_name }} " />
	<input type="hidden" name="comp_slug" value="{{ $competition->slug }}" />
	<div class="row" style="margin-top:20px;">
		<div class="tab-6">
			<div class="input-wrapper">
				<div class="g-recaptcha captcha" data-sitekey="{{ config('services.google.recaptcha_key') }}"></div>
				<label class="recaptcha-label"></label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="tab-12">
			<div class="cart-btn">
				<button class="primary-button">Enter</button>
			</div>
		</div>
	</div>
</form>
