@extends('customer.layouts.master')
@section('content')

<section class="create-account wrapper">
	<div class="row">
		<div class="col-9 tab-8">
			<div class="create-account--left">
				<hr>
				<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="">First Name<sup>*</sup> :</label>
							<input type="text" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="">Last Name<sup>*</sup> :</label>
							<input type="text" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="">Email<sup>*</sup> :</label>
							<input type="text" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							  <label>Gender<sup>*</sup> :</label>
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
							<label for="name">Date of Birth :</label>
						</div>					
						<div class="row">
							<div class="mob-6">
								<div class="input-wrapper">
									<select class="select-field">
		                                <option value="">Select Date</option>
		                                <option value="1">1</option>
		                                <option value="2">2</option>
		                                <option value="3">3</option>
		                                <option value="4">4</option>
		                                <option value="5">5</option>
		                                <option value="6">6</option>
		                                <option value="7">7</option>
		                                <option value="8">8</option>
		                                <option value="9">9</option>
		                                <option value="10">10</option>
		                                <option value="11">11</option>
		                                <option value="12">12</option>
		                                <option value="13">13</option>
		                                <option value="14">14</option>
		                                <option value="15">15</option>
		                                <option value="16">16</option>
		                                <option value="17">17</option>
		                                <option value="18">18</option>
		                                <option value="19">19</option>
		                                <option value="20">20</option>
		                                <option value="21">21</option>
		                                <option value="22">22</option>
		                                <option value="23">23</option>
		                                <option value="24">24</option>
		                                <option value="25">25</option>
		                                <option value="26">26</option>
		                                <option value="27">27</option>
		                                <option value="28">28</option>
		                                <option value="29">29</option>
		                                <option value="30">30</option>
		                                <option value="31">31</option>
		                            </select>
								</div>
							</div>
							<div class="mob-6">
								<div class="input-wrapper">
		                            <select class="select-field">
	                                    <option value="">Select Month</option>
	                                    <option value="1">Jan</option>
	                                    <option value="2">Feb</option>
	                                    <option value="3">Mar</option>
	                                    <option value="4">Apr</option>
	                                    <option value="5">May</option>
	                                    <option value="6">Jun</option>
	                                    <option value="7">Jul</option>
	                                    <option value="8">Aug</option>
	                                    <option value="9">Sep</option>
	                                    <option value="10">Oct</option>
	                                    <option value="11">Nov</option>
	                                    <option value="12">Dec</option>
	                                </select>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="name">Age :</label>
                            <select class="select-field">
                                <option value="" selected="selected">Select your age group</option>
                                <option value="<18">18 and under</option>
                                <option value="19-30">19 to 30</option>
                                <option value="31-40">31 to 40</option>
                                <option value="41-50">41 to 50</option>
                                <option value="51-60">51 to 60</option>
                                <option value="60+">60 plus</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="row">
							<div class="mob-6">
								<div class="input-wrapper">
									<label>State<sup>*</sup> :</label>
		                            <select class="select-field">
                                        <option value="" selected="selected">Select State</option>
                                        <option value="ACT,Australia">ACT,Australia</option>
                                        <option value="NSW,Australia">NSW,Australia</option>
                                        <option value="NT,Australia">ACT,Australia</option>
                                        <option value="QLD,Australia">QLD,Australia</option>
                                        <option value="SA,Australia">SA,Australia</option>
                                        <option value="TAS,Australia">TAS,Australia</option>
                                        <option value="VIC,Australia">VIC,Australia</option>
                                        <option value="WA,Australia">WA,Australia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Other">Other</option>
                                    </select>
								</div>
							</div>
							<div class="mob-6">
								<div class="input-wrapper">
									<label>Postcode<sup>*</sup> :</label>
		                            <input type="text" class="input-field">
								</div>
							</div>
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Position :</label>
                            <select class="select-field">
                                <option value="" selected="selected">Select Position</option>
                                <option value="ACT,Australia">Figure Skater</option>
                                <option value="ACT,Australia">Forward</option>
                                <option value="NSW,Australia">Defence</option>
                                <option value="NT,Australia">Goalie</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Stick Side :</label>
                            <select class="select-field">
                                <option value="" selected="selected">Select Stick Side</option>
                                <option value="ACT,Australia">Right</option>
                                <option value="NSW,Australia">Left</option>
                            </select>
						</div>
					</div>
					<div class="tab-6"></div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>
								<div class="row">
									<div class="mob-6">Password<sup>*</sup> :</div>
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
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Confirm Password<sup>*</sup> :</label>
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
						<div class="input-wrapper">
							  <div class="checklist-inline">
							  	  <input type="checkbox" id="signme">
							      <label for="signme">
							      	    <div class="mark"><span></span></div>
							      	    <div class="text">Please sign me up to receive Brooks email newsletter The Run Down.</div>
							       </label>
							  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="cart-btn">
							<button class="primary-button">Create Account</button>
						</div>
						<p class="privacy">See our <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions</a>.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3 tab-4">
		</div>
	</div>
</section>

@endsection