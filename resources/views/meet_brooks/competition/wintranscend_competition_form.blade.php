<form name="competition" id='competition' method="post"  onsubmit="return insert_competition()">
	<div class="row">
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>First Name</label>
				<input type="text" name="fname"  class="input-field">
			</div>
		</div>
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Last Name</label>
				<input type="text" name="lname" class="input-field">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Email Address</label>
				<input type="text" name="email" class="input-field">
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
	<div class="row">
		<div class="tab-6">	
			<div class="input-wrapper">
				<label for="name">Birthday</label>
			</div>					
			<div class="row">
				<div class="mob-6">
				<div class="input-wrapper">
							<select class="select-field" name="custom_Birth_Date" id="custom_Birth_Date" style="margin-bottom: 0px;">
								<option class="option-value" value="">Select Date</option>
								<option class="option-value" value="01">1</option>
								<option class="option-value" value="02">2</option>
								<option class="option-value" value="03">3</option>
								<option class="option-value" value="04">4</option>
								<option class="option-value" value="05">5</option>
								<option class="option-value" value="06">6</option>
								<option class="option-value" value="07">7</option>
								<option class="option-value" value="08">8</option>
								<option class="option-value" value="09">9</option>
								<option class="option-value" value="10">10</option>
								<option class="option-value" value="11">11</option>
								<option class="option-value" value="12">12</option>
								<option class="option-value" value="13">13</option>
								<option class="option-value" value="14">14</option>
								<option class="option-value" value="15">15</option>
								<option class="option-value" value="16">16</option>
								<option class="option-value" value="17">17</option>
								<option class="option-value" value="18">18</option>
								<option class="option-value" value="19">19</option>
								<option class="option-value" value="20">20</option>
								<option class="option-value" value="21">21</option>
								<option class="option-value" value="22">22</option>
								<option class="option-value" value="23">23</option>
								<option class="option-value" value="24">24</option>
								<option class="option-value" value="25">25</option>
								<option class="option-value" value="26">26</option>
								<option class="option-value" value="27">27</option>
								<option class="option-value" value="28">28</option>
								<option class="option-value" value="29">29</option>
								<option class="option-value" value="30">30</option>
								<option class="option-value" value="31">31</option>
							</select>
							</div>
				</div>
				<div class="mob-6">
				<div class="input-wrapper">
							<select class="select-field" name="custom_Birth_Month" id="custom_Birth_Month" style="margin-bottom: 0px;">
								<option class="option-value" value="">Select Month</option>
								<option class="option-value" value="01">Jan</option>
								<option class="option-value" value="02">Feb</option>
								<option class="option-value" value="03">Mar</option>
								<option class="option-value" value="04">Apr</option>
								<option class="option-value" value="05">May</option>
								<option class="option-value" value="06">Jun</option>
								<option class="option-value" value="07">Jul</option>
								<option class="option-value" value="08">Aug</option>
								<option class="option-value" value="09">Sep</option>
								<option class="option-value" value="10">Oct</option>
								<option class="option-value" value="11">Nov</option>
								<option class="option-value" value="12">Dec</option>
							</select>
				</div>
			</div>
			</div>
		</div>
		<div class="tab-6">
			<div class="input-wrapper">
				<label for="name">Age</label>

						<select class="select-field" name="custom_Age" id="custom_Age" style="margin-bottom: 0px;">
							<option class="option-value" value="">Select your age group</option>
							<option class="option-value" value="<18">18 and under</option>
							<option class="option-value" value="19-30">19 to 30</option>
							<option class="option-value" value="31-40">31 to 40</option>
							<option class="option-value" value="41-50">41 to 50</option>
							<option class="option-value" value="51-60">51 to 60</option>
							<option class="option-value" value="60+">60 plus</option>
						</select>
				
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="tab-6">
			<div class="row">
				<div class="mob-6">
					<div class="input-wrapper">
						<label><sup>*</sup>Country</label>
							<select class="select-field" name="country" id="custom_Country" style="margin-bottom: 0px;">
								<option value="AU">Australia</option>
								<option value="NZ">New Zealand</option>
							</select>
					</div>
				</div>
				<div class="mob-6">
					<div class="input-wrapper">
						<label>Postcode<sup>*</sup></label>
						<input type="text" name="postcode" class="input-field">
					</div>
				</div>
			</div>
		</div>
		<div class="tab-6">
			<div class="input-wrapper">
				<label>What Brooks Shoes do you wear?</label>
				
						<select class="select-field" name="custom_Shoes_you_wear" id="custom_Shoes_you_wear" style="margin-bottom: 0px;">
							<option class="option-value" value="">Select Brooks Shoes you wear</option>
							<option class="option-value" value="Addiction">Addiction</option>
							<option class="option-value" value="Addiction Walker">Addiction Walker</option>
							<option class="option-value" value="Adrenaline GTS">Adrenaline GTS</option>
							<option class="option-value" value="Ariel">Ariel</option>
							<option class="option-value" value="Beast">Beast</option>
							<option class="option-value" value="Cascadia">Cascadia</option>
							<option class="option-value" value="Dyad">Dyad</option>
							<option class="option-value" value="Ghost">Ghost</option>
							<option class="option-value" value="Glycerin">Glycerin</option>
							<option class="option-value" value="Launch">Launch</option>
							<option class="option-value" value="Levitate">Levitate</option>
							<option class="option-value" value="PureCadance">PureCadance</option>
							<option class="option-value" value="PureFlow">PureFlow</option>
							<option class="option-value" value="Ravenna">Ravenna</option>
							<option class="option-value" value="Transcend">Transcend</option>
							<option class="option-value" value="Other">Other</option>
						</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Store Name</label>
				<input type="text" name="store_name"  class="input-field">
			</div>
		</div>
		<div class="tab-6">
			<div class="input-wrapper">
				<label for=""><sup>*</sup>Shoe Size</label>
				<input type="text" name="shoe_size"  class="input-field">
			</div>
		</div>
	</div>
	<!--<div class="row">
		<div class="tab-6">
			<div class="input-wrapper">
				<label>Contest code (if applicable)<sup>*</sup></label>
				<input type="text" class="input-field">
			</div>
		</div>
	</div>-->
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
