@extends('customer.layouts.master')
@section('content')
<section class="header-img--banner">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<!-- for different banner ipad and mobile
					<picture>
					    <source media="(max-width: 595px)" srcset="images/home/82018_Wave8_HP_FW_1b_SM.jpg">
					    <img src="/images/home/82018_Wave8_HP_FW_1b_BIG.jpg" alt="Header Images">
				    </picture>
			    -->
				<img src="/images/competition-single/sandypoint_comp_levitate2_1430x350.jpg" width="100%" alt="competetion">
			</div>
		</div>
	</div>
</section>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9">
			<div class="create-account--left">
				<div class="row">
					<div class="col-10">
						<p>For your chance to win a pair of Ghost 11, sign up to the Brooks e-newsletter, The RunDown to receive updates on the latest Brooks styles, training tips and so much more! 
						<br/>To enter fill in your details below:</p>
					</div>
				</div>
				<hr>
				<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
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
							  <label><sup>*</sup>Gender</label>
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
								<div class="custom-select gray-bg">
							       <div class = "select-box">
									    <div class = "label-heading">
									    	<span class="text">Select Date</span> 
									    	<div class="sel-icon">
									    		<span class="icon-down-arrow"></span>
									    	</div>
									    </div>
									    <ul class="select-option--wrapper">
									    	<option class="option-value" value="">Select Date</option>
			                                <option class="option-value" value="1">1</option>
			                                <option class="option-value" value="2">2</option>
			                                <option class="option-value" value="3">3</option>
			                                <option class="option-value" value="4">4</option>
			                                <option class="option-value" value="5">5</option>
			                                <option class="option-value" value="6">6</option>
			                                <option class="option-value" value="7">7</option>
			                                <option class="option-value" value="8">8</option>
			                                <option class="option-value" value="9">9</option>
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
									    </ul>
									</div>
							    </div>
							</div>
							<div class="mob-6">
								<div class="custom-select gray-bg">
							       <div class = "select-box">
									    <div class = "label-heading">
									    	<span class="text">Select Month</span> 
									    	<div class="sel-icon">
									    		<span class="icon-down-arrow"></span>
									    	</div>
									    </div>
									    <ul class="select-option--wrapper">
									    	<option class="option-value" value="">Select Month</option>
		                                    <option class="option-value" value="1">Jan</option>
		                                    <option class="option-value" value="2">Feb</option>
		                                    <option class="option-value" value="3">Mar</option>
		                                    <option class="option-value" value="4">Apr</option>
		                                    <option class="option-value" value="5">May</option>
		                                    <option class="option-value" value="6">Jun</option>
		                                    <option class="option-value" value="7">Jul</option>
		                                    <option class="option-value" value="8">Aug</option>
		                                    <option class="option-value" value="9">Sep</option>
		                                    <option class="option-value" value="10">Oct</option>
		                                    <option class="option-value" value="11">Nov</option>
		                                    <option class="option-value" value="12">Dec</option>
									    </ul>
									</div>
							    </div>
							</div>
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="name">Age</label>
							<div class="custom-select gray-bg">
						       <div class = "select-box">
								    <div class = "label-heading">
								    	<span class="text">Select your age group</span> 
								    	<div class="sel-icon">
								    		<span class="icon-down-arrow"></span>
								    	</div>
								    </div>
								    <ul class="select-option--wrapper">
								    	<option class="option-value" value="">Select your age group</option>
	                                    <option class="option-value" value="<18">18 and under</option>
		                                <option class="option-value" value="19-30">19 to 30</option>
		                                <option class="option-value" value="31-40">31 to 40</option>
		                                <option class="option-value" value="41-50">41 to 50</option>
		                                <option class="option-value" value="51-60">51 to 60</option>
		                                <option class="option-value" value="60+">60 plus</option>
								    </ul>
								</div>
						    </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="row">
							<div class="mob-6">
								<div class="input-wrapper">
									<label><sup>*</sup>State</label>
									<div class="custom-select gray-bg">
								       <div class = "select-box">
										    <div class = "label-heading">
										    	<span class="text">Select State</span> 
										    	<div class="sel-icon">
										    		<span class="icon-down-arrow"></span>
										    	</div>
										    </div>
										    <ul class="select-option--wrapper">
										    	<option class="option-value" value="">Select State</option>
		                                        <option class="option-value" value="ACT,Australia">ACT,Australia</option>
		                                        <option class="option-value" value="NSW,Australia">NSW,Australia</option>
		                                        <option class="option-value" value="NT,Australia">ACT,Australia</option>
		                                        <option class="option-value" value="QLD,Australia">QLD,Australia</option>
		                                        <option class="option-value" value="SA,Australia">SA,Australia</option>
		                                        <option class="option-value" value="TAS,Australia">TAS,Australia</option>
		                                        <option class="option-value" value="VIC,Australia">VIC,Australia</option>
		                                        <option class="option-value" value="WA,Australia">WA,Australia</option>
		                                        <option class="option-value" value="New Zealand">New Zealand</option>
		                                        <option class="option-value" value="Other">Other</option>
										    </ul>
										</div>
								    </div>
								</div>
							</div>
							<div class="mob-6">
								<div class="input-wrapper">
									<label>Postcode<sup>*</sup></label>
		                            <input type="text" class="input-field">
								</div>
							</div>
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label>What Brooks Shoes do you wear?</label>
							<div class="custom-select gray-bg">
						       <div class = "select-box">
								    <div class = "label-heading">
								    	<span class="text">Select Brooks Shoes you wear</span> 
								    	<div class="sel-icon">
								    		<span class="icon-down-arrow"></span>
								    	</div>
								    </div>
								    <ul class="select-option--wrapper">
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
								    </ul>
								</div>
						    </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Contest code (if applicable)<sup>*</sup></label>
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
							<button class="primary-button">Enter</button>
						</div>
						<div class="comp_bottom">
                        <p>Competition Closes: 14th December 2018</p>
						<p class="notice">Brooks Sports will not use your email address or information for any purpose other than notifying the winner of the competition and distributing our email newsletter. You must be an Australian resident to be eligible for any prize drawing.</p>
                        <p class="privacy">Click here to view the <a class="privacy-terms--popup" href="#">Terms &amp; Conditions of Entry</a></p>
                                                    
                    	</div>
						<p class="privacy">Brooks Sports will not use your email address or information for any purpose other than distributing our email newsletter. You must be an Australian or New Zealand resident to be eligible for any prize drawing. View our <a href="#">Privacy Policy</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="privacy-terms--wrapper popup-container afterpay--popup">
    <div class="popup-container--wrapper">
        <div class="popup-container--info">
			<div class="close-me"><span class="icon-close-icon afterpay-popup--close"></span></div>        
            <!-- <div class="privacy-content">@include('/terms_conditions.{{$comp_name}}_terms')</div> -->
		</div>
	</div>
    </div>
</section>

@endsection