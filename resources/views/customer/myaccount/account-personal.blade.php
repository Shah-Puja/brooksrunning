@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				@php 
					$first_name=(isset(auth()->user()->first_name)) ? auth()->user()->first_name : '';
					$last_name=(isset(auth()->user()->last_name)) ? auth()->user()->last_name : '';
				@endphp
				<h1 class="br-mainheading">Welcome, {{$first_name}} {{$last_name}}</h1>
				<p>Not {{$first_name}}? <a href="logout">Logout</a></p>
			</div>
		</div>
	</div>
</div>
<form action="/account/update_profile" method="post" id="RegistrationForm" class=" five columns form-register" novalidate="novalidate">
@csrf
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9 tab-8">
			<div class="create-account--left">
				<h3 class="br-heading">Personal Details</h3>
				<hr>
				<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="">First Name<sup>*</sup></label>
							<input type="text" name="first_name" class="input-field" value="{{$first_name}}">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="">Last Name<sup>*</sup></label>
							<input type="text" name="last_name" class="input-field" value="{{$last_name}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="">Email Address<sup>*</sup></label>
							<input type="text" name="email" class="input-field" readonly value="{{auth()->user()->email}}">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							  <label>Gender<sup>*</sup></label>
							  <div class="radio-inline">
							  	  <input type="radio" class="input-radio" name="gender" value="male" id="male"
									@if(auth()->user()->gender=="Male")
									checked="checked"
									@endif
									>
							  	  <label for="male">
							      	 <div class="mark"><span></span></div>
							      	 <div class="text">Male</div>
							      </label>
							  </div>
							  <div class="radio-inline">
							  	  <input type="radio" class="input-radio" name="gender" value="female" id="female"
									@if(auth()->user()->gender=="Female")
									checked="checked"
									@endif>
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
							<label for="name">Date of Birth</label>
						</div>	
						@php $dob = auth()->user()->dob;
						$dob = explode("-",$dob);
						$month = isset($dob[0]) ? $dob[0] : "";
						$date = isset($dob[1]) ? $dob[1] : "";
						@endphp			
						<div class="row">
							<div class="mob-6">
								<div class="input-wrapper">
									<select name="birth_date" class="select-field">
		                                <option value="">Select Date</option>
		                                <option value="1" @if($date == "1") selected @endif>1</option>
		                                <option value="2" @if($date == "2") selected @endif>2</option>
		                                <option value="3" @if($date == "3") selected @endif>3</option>
		                                <option value="4" @if($date == "4") selected @endif>4</option>
		                                <option value="5" @if($date == "5") selected @endif>5</option>
		                                <option value="6" @if($date == "6") selected @endif>6</option>
		                                <option value="7" @if($date == "7") selected @endif>7</option>
		                                <option value="8" @if($date == "8") selected @endif>8</option>
		                                <option value="9" @if($date == "9") selected @endif>9</option>
		                                <option value="10" @if($date == "10") selected @endif>10</option>
		                                <option value="11" @if($date == "11") selected @endif>11</option>
		                                <option value="12" @if($date == "12") selected @endif>12</option>
		                                <option value="13" @if($date == "13") selected @endif>13</option>
		                                <option value="14" @if($date == "14") selected @endif>14</option>
		                                <option value="15" @if($date == "15") selected @endif>15</option>
		                                <option value="16"  @if($date == "16") selected @endif>16</option>
		                                <option value="17"  @if($date == "17") selected @endif>17</option>
		                                <option value="18"  @if($date == "18") selected @endif>18</option>
		                                <option value="19" @if($date == "19") selected @endif>19</option>
		                                <option value="20" @if($date == "20") selected @endif>20</option>
		                                <option value="21" @if($date == "21") selected @endif>21</option>
		                                <option value="22" @if($date == "22") selected @endif>22</option>
		                                <option value="23" @if($date == "23") selected @endif>23</option>
		                                <option value="24" @if($date == "24") selected @endif>24</option>
		                                <option value="25" @if($date == "25") selected @endif>25</option>
		                                <option value="26" @if($date == "26") selected @endif>26</option>
		                                <option value="27" @if($date == "27") selected @endif>27</option>
		                                <option value="28" @if($date == "28") selected @endif>28</option>
		                                <option value="29" @if($date == "29") selected @endif>29</option>
		                                <option value="30" @if($date == "30") selected @endif>30</option>
		                                <option value="31" @if($date == "31") selected @endif>31</option>
		                            </select>
								</div>
							</div>
							<div class="mob-6">
								<div class="input-wrapper">
		                            <select name="birth_month" class="select-field">
	                                    <option value="">Select Month</option>
	                                    <option value="1" @if($month=="1") selected @endif>Jan</option>
	                                    <option value="2" @if($month=="2") selected @endif>Feb</option>
	                                    <option value="3" @if($month=="3") selected @endif>Mar</option>
	                                    <option value="4" @if($month=="4") selected @endif>Apr</option>
	                                    <option value="5" @if($month=="5") selected @endif>May</option>
	                                    <option value="6" @if($month=="6") selected @endif>Jun</option>
	                                    <option value="7" @if($month=="7") selected @endif>Jul</option>
	                                    <option value="8" @if($month=="8") selected @endif>Aug</option>
	                                    <option value="9" @if($month=="9") selected @endif>Sep</option>
	                                    <option value="10" @if($month=="10") selected @endif>Oct</option>
	                                    <option value="11" @if($month=="11") selected @endif>Nov</option>
	                                    <option value="12" @if($month=="12") selected @endif>Dec</option>
	                                </select>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label for="name">Age</label>
                            <select name="age_group" class="select-field">
                                <option value="" selected="selected">Select your age group</option>
                                <option value="<18" @if(auth()->user()->age_group == "<18") selected @endif>18 and under</option>
                                <option value="19-30" @if(auth()->user()->age_group == "19-30") selected @endif>19 to 30</option>
                                <option value="31-40" @if(auth()->user()->age_group == "31-40") selected @endif>31 to 40</option>
                                <option value="41-50" @if(auth()->user()->age_group == "41-50") selected @endif>41 to 50</option>
                                <option value="51-60" @if(auth()->user()->age_group == "51-60") selected @endif>51 to 60</option>
                                <option value="60+" @if(auth()->user()->age_group == "60+") selected @endif>60 plus</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="row">
							<div class="mob-6">
								<div class="input-wrapper">
									<label>State<sup>*</sup></label>
		                            <select name="state" class="select-field">
                                        <option value="" selected="selected">Select State</option>
                                        <option value="ACT,Australia" @if(auth()->user()->state=="ACT,Australia") selected @endif>ACT,Australia</option>
                                        <option value="NSW,Australia" @if(auth()->user()->state=="NSW,Australia") selected @endif>NSW,Australia</option>
                                        <option value="NT,Australia" @if(auth()->user()->state=="NT,Australia") selected @endif>NT,Australia</option>
                                        <option value="QLD,Australia" @if(auth()->user()->state=="QLD,Australia") selected @endif>QLD,Australia</option>
                                        <option value="SA,Australia" @if(auth()->user()->state=="SA,Australia") selected @endif>SA,Australia</option>
                                        <option value="TAS,Australia" @if(auth()->user()->state=="TAS,Australia") selected @endif>TAS,Australia</option>
                                        <option value="VIC,Australia" @if(auth()->user()->state=="VIC,Australia") selected @endif>VIC,Australia</option>
                                        <option value="WA,Australia" @if(auth()->user()->state=="WA,Australia") selected @endif>WA,Australia</option>
                                        <option value="New Zealand" @if(auth()->user()->state=="New Zealand") selected @endif>New Zealand</option>
                                        <option value="Other" @if(auth()->user()->state=="Other") selected @endif>Other</option>
                                    </select>
								</div>
							</div>
							<div class="mob-6">
								<div class="input-wrapper">
									<label>Postcode<sup>*</sup></label>
		                            <input name="postcode" type="text" class="input-field" value="{{auth()->user()->postcode}}">
								</div>
							</div>
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label>What Brooks Shoes do you wear?</label>
                            <select name="shoe_wear" class="select-field">
                                <option value="" selected="selected">Select Brooks Shoes you wear</option>
                                <option value="Addiction" @if(auth()->user()->shoe_wear=="Addiction") selected @endif>Addiction</option>
                                <option value="Addiction Walker" @if(auth()->user()->shoe_wear=="Addiction Walker") selected @endif>Addiction Walker</option>
                                <option value="Adrenaline GTS" @if(auth()->user()->shoe_wear=="Adrenaline GTS") selected @endif>Adrenaline GTS</option>
								<option value="Ariel" @if(auth()->user()->shoe_wear=="Ariel") selected @endif>Ariel</option>
								<option value="Beast" @if(auth()->user()->shoe_wear=="Beast") selected @endif>Beast</option>
								<option value="Cascadia" @if(auth()->user()->shoe_wear=="Cascadia") selected @endif>Cascadia</option>
								<option value="Dyad" @if(auth()->user()->shoe_wear=="Dyad") selected @endif>Dyad</option>
								<option value="Ghost" @if(auth()->user()->shoe_wear=="Ghost") selected @endif>Ghost</option>
								<option value="Glycerin" @if(auth()->user()->shoe_wear=="Glycerin") selected @endif>Glycerin</option>
								<option value="Launch" @if(auth()->user()->shoe_wear=="Launch") selected @endif>Launch</option>
								<option value="Levitate" @if(auth()->user()->shoe_wear=="Levitate") selected @endif>Levitate</option>
								<option value="PureCadance" @if(auth()->user()->shoe_wear=="PureCadance") selected @endif>PureCadance</option>
								<option value="PureFlow" @if(auth()->user()->shoe_wear=="PureFlow") selected @endif>PureFlow</option>
								<option value="Ravenna" @if(auth()->user()->shoe_wear=="Ravenna") selected @endif>Ravenna</option>
								<option value="Transcend" @if(auth()->user()->shoe_wear=="Transcend") selected @endif>Transcend</option>
								<option value="Other" @if(auth()->user()->shoe_wear=="Other") selected @endif>Other</option> 
                            </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Old Password</label>
                            <input type="password" name="old_password" class="input-field">
						</div>
					</div>
					<div class="tab-6"></div>
				</div>
				<div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>New Password<sup>*</sup></label>
                            <input type="password" name="password" class="input-field">
						</div>
					</div>
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Confirm New Password<sup>*</sup></label>
                            <input type="password" name="password_confirm" class="input-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="tab-12">
						<div class="input-wrapper">
							  <div class="checklist-inline">
							  	  <input type="checkbox" id="signme" name="newsletter"
									@if(auth()->user()->newsletter=="1")
									checked="checked"
									@endif
									>
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
							<button name="update_personal_details" value="update" class="primary-button">Apply</button>
						</div>
						<p class="privacy">See our <a href="/info/privacy">Privacy Policy</a> and <a href="/info/terms-conditions">Terms and Conditions</a>.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3 tab-4">
			<div class="create-account--banner">
				<img src="/images/accounts/signup-banner.png" alt="">
			</div>
		</div>
	</div>
</section>
</form>

@endsection