<form id="register_form" method="POST" action="{{ route('register') }}" onsubmit="return registervalidation()">
        @csrf
            <div class="create-account--left">                    
                <h3 class="br-heading">Create Account</h3>
                <hr>
                <p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label for="first_name">First Name<sup>*</sup> : @if ($errors->has('first_name'))<span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>@endif</label>                            
                            <input id="first_name" type="text" class="input-field form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ !empty(auth()->user()->first_name) ? auth()->user()->first_name : old('first_name') }}" data-label-name="first_name" autofocus>                                 
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="last_name">Last Name<sup>*</sup> : @if ($errors->has('last_name'))<span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>@endif</label>                            
                                <input id="last_name" type="text" class="input-field form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ !empty(auth()->user()->last_name) ? auth()->user()->last_name : old('last_name') }}" data-label-name="last_name" autofocus>                                     
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="email">E-Mail Address<sup>*</sup> : @if ($errors->has('email')) <span class="error invalid-feedback">{{ $errors->first('email') }} </span> @endif</label>
                                <input type="text" class="input-field form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ !empty(auth()->user()->email) ? auth()->user()->email : old('email') }}" data-label-name="email" @if (request()->is('update-profile')) readonly="readonly" @endif>                                
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label class="gender_label">Gender<sup>*</sup> : @if ($errors->has('gender')) <span class="error invalid-feedback">{{ $errors->first('gender') }} </span> @endif</label>
                            <div class="radio-inline">
                                @php $gender = !empty(auth()->user()->gender) ? auth()->user()->gender : old('gender'); @endphp
                                <input type="radio" class="input-radio" name="gender" value="Male" id="male" {{ $gender == 'Male' ? "checked" : "" }}>
                                <label for="male">
                                    <div class="mark"><span></span></div>
                                    <div class="text">Male</div>
                                </label>                                
                            </div>
                            <div class="radio-inline">
                                    <input type="radio" class="input-radio" name="gender" value="Female" id="female" {{ $gender == 'Female' ? "checked" : "" }}>
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
                        <div class="row">
                            <div class="mob-6">
                                <div class="input-wrapper">
                                        <select class="select-field" name="birthday_date" >
                                                <option value="">Select Date</option>
                                                <option value="01" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '01' ? "selected" : "" }} >1</option>
                                                <option value="02" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '02' ? "selected" : "" }}>2</option>
                                                <option value="03" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '03' ? "selected" : "" }}>3</option>
                                                <option value="04" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '04' ? "selected" : "" }}>4</option>
                                                <option value="05" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '05' ? "selected" : "" }}>5</option>
                                                <option value="06" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '06' ? "selected" : "" }}>6</option>
                                                <option value="07" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '07' ? "selected" : "" }}>7</option>
                                                <option value="08" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '08' ? "selected" : "" }}>8</option>
                                                <option value="09" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '09' ? "selected" : "" }}>9</option>
                                                <option value="10" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '10' ? "selected" : "" }}>10</option>
                                                <option value="11" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '11' ? "selected" : "" }}>11</option>
                                                <option value="12" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '12' ? "selected" : "" }}>12</option>
                                                <option value="13" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '13' ? "selected" : "" }}>13</option>
                                                <option value="14" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '14' ? "selected" : "" }}>14</option>
                                                <option value="15" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '15' ? "selected" : "" }}>15</option>
                                                <option value="16" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '16' ? "selected" : "" }}>16</option>
                                                <option value="17" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '17' ? "selected" : "" }}>17</option>
                                                <option value="18" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '18' ? "selected" : "" }}>18</option>
                                                <option value="19" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '19' ? "selected" : "" }}>19</option>
                                                <option value="20" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '20' ? "selected" : "" }}>20</option>
                                                <option value="21" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '21' ? "selected" : "" }}>21</option>
                                                <option value="22" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '22' ? "selected" : "" }}>22</option>
                                                <option value="23" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '23' ? "selected" : "" }}>23</option>
                                                <option value="24" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '24' ? "selected" : "" }}>24</option>
                                                <option value="25" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '25' ? "selected" : "" }}>25</option>
                                                <option value="26" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '26' ? "selected" : "" }}>26</option>
                                                <option value="27" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '27' ? "selected" : "" }}>27</option>
                                                <option value="28" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '28' ? "selected" : "" }}>28</option>
                                                <option value="29" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '29' ? "selected" : "" }}>29</option>
                                                <option value="30" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '30' ? "selected" : "" }}>30</option>
                                                <option value="31" {{ !empty(auth()->user()->birthday_date) && auth()->user()->birthday_date == '31' ? "selected" : "" }}>31</option>
                                        </select>
                                </div>
                            </div>
                            <div class="mob-6">
                                <div class="input-wrapper">
                                        <select class="select-field" name="birthday_month">
                                                <option value="">Select Month</option>
                                                <option value="01" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '01' ? "selected" : "" }}>Jan</option>
                                                <option value="02" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '02' ? "selected" : "" }}>Feb</option>
                                                <option value="03" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '03' ? "selected" : "" }}>Mar</option>
                                                <option value="04" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '04' ? "selected" : "" }}>Apr</option>
                                                <option value="05" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '05' ? "selected" : "" }}>May</option>
                                                <option value="06" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '06' ? "selected" : "" }}>Jun</option>
                                                <option value="07" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '07' ? "selected" : "" }}>Jul</option>
                                                <option value="08" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '08' ? "selected" : "" }}>Aug</option>
                                                <option value="09" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '09' ? "selected" : "" }}>Sep</option>
                                                <option value="10" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '10' ? "selected" : "" }}>Oct</option>
                                                <option value="11" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '11' ? "selected" : "" }}>Nov</option>
                                                <option value="12" {{ !empty(auth()->user()->birthday_month) && auth()->user()->birthday_month == '12' ? "selected" : "" }}>Dec</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label for="name">Age</label>
                            <select class="select-field" name="age_group">
                                <option value="" selected="selected">Select your age group</option>
                                <option value="18 and under" {{ !empty(auth()->user()->age_group) && auth()->user()->age_group == '18 and under' ? "selected" : "" }}>18 and under</option>
                                <option value="19 to 30" {{ !empty(auth()->user()->age_group) && auth()->user()->age_group == '19 to 30' ? "selected" : "" }}>19 to 30</option>
                                <option value="31 to 40" {{ !empty(auth()->user()->age_group) && auth()->user()->age_group == '31 to 40' ? "selected" : "" }}>31 to 40</option>
                                <option value="41 to 50" {{ !empty(auth()->user()->age_group) && auth()->user()->age_group == '41 to 50' ? "selected" : "" }}>41 to 50</option>
                                <option value="51 to 60" {{ !empty(auth()->user()->age_group) && auth()->user()->age_group == '51 to 60' ? "selected" : "" }}>51 to 60</option>
                                <option value="60 plus" {{ !empty(auth()->user()->age_group) && auth()->user()->age_group == '60 plus' ? "selected" : "" }}>60 plus</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                        <div class="row">
                            <div class="mob-6">
                                <div class="input-wrapper">
                                    @php $state = !empty(auth()->user()->state) ? auth()->user()->state : old('state'); @endphp
                                    <label>State<sup>*</sup> :</label>
                                    <select class="select-field" name="state" data-label-name="state">
                                        <option value="" selected="selected">Select State</option>
                                        <option value="ACT" {{ $state =='ACT' ? "selected='selected'": "" }}>ACT</option>
                                        <option value="NSW" {{ $state =='NSW' ? "selected='selected'": "" }}>NSW</option>
                                        <option value="NT" {{ $state =='NT' ? "selected='selected'": "" }}>ACT</option>
                                        <option value="QLD" {{ $state =='QLD' ? "selected='selected'": "" }}>QLD</option>
                                        <option value="SA" {{ $state =='SA' ? "selected='selected'": "" }}>SA</option>
                                        <option value="TAS" {{ $state =='TAS' ? "selected='selected'": "" }}>TAS</option>
                                        <option value="VIC" {{ $state =='VIC' ? "selected='selected'": "" }}>VIC</option>
                                        <option value="WA" {{ $state =='WA' ? "selected='selected'": "" }}>WA</option>
                                        <option value="Other" {{ $state =='Other' ? "selected='selected'": "" }}>Other</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="mob-6">
                                <div class="input-wrapper">
                                    <label>Postcode<sup>*</sup> : </label>
                                    <input type="tel"  class="input-field allownumericwithdecimal" name="postcode"  min='0' inputmode='numeric' pattern='[0-9]*' data-label-name="postcode" value="{{ !empty(auth()->user()->postcode) ? auth()->user()->postcode : old('postcode') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label>What Brooks Shoes do you wear?</label>
                            <select class="select-field">
                                <option value="" selected="selected">Select Brooks Shoes you wear</option>
                                <option value="ACT,Australia">Brooks 1</option>
                                <option value="ACT,Australia">Brooks 2</option>
                                <option value="NSW,Australia">Brooks 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label for="password">{{ __('Password') }}<sup>*</sup> : @if ($errors->has('password')) <span class="error error invalid-feedback"> <strong>{{ $errors->first('password') }}</strong> </span> @endif</label>
                            <input id="password" type="password" class="input-field form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" data-label-name="password" >
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label>Confirm Password<sup>*</sup> :</label>
                            <input id="password-confirm" type="password" class="input-field form-control" name="password_confirmation"  data-label-name="confirm password" >                        </div>
                    </div>
                </div>

                @if (request()->is('register') ) 
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <div class="g-recaptcha captcha" data-sitekey="{{ config('services.google.recaptcha_key') }}"></div>
                            <label class="recaptcha-label">@if ($errors->has('g-recaptcha-response')) <span class="error error invalid-feedback"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif</label>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="tab-12">
                        <div class="input-wrapper">
                            <div class="checklist-inline">
                                    <input type="checkbox" id="signme" name="newsletter_subscription" value="1" {{ !empty(auth()->user()->newsletter_subscription) && auth()->user()->newsletter_subscription == '1' ? "checked" : "" }}>
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
                                <button type="submit" class="btn primary-button">{{ request()->is('register') ? 'Create Account' : 'update' }}</button>                                    
                        </div>
                        <p class="privacy">See our <a href="/info/terms-conditions">Terms and Conditions</a>.</p>
                    </div>
                </div>                
            
            </div>
    </form>

    <script>
            function registervalidation(){
               $("#register_form input,#register_form select").removeClass("error-border");
               $("#register_form input,#register_form select").parent().find('label .error').remove();
                required = ["first_name","last_name","email","state","postcode","password","password_confirmation"];
                for (k=0;k<required.length;k++) {
                       let input = $('#register_form input[name="'+required[k]+'"],#register_form select[name="'+required[k]+'"]');
                       if (input.val() == "") {
                           input.addClass("needsfilled");
                           let label_name = $("#register_form input[name="+required[k]+"],#register_form select[name="+required[k]+"]").data("label-name");
                           let input_label = $("#register_form input[name="+required[k]+"],#register_form select[name="+required[k]+"]").parent().find('label');
                           let label_text = input_label.html();
                           let error_span = " <span class='error'>The "+label_name+" field is required.</span>";
                           let error = label_text + error_span ;
                           input_label.html(error);
                           $("#register_form input[name="+required[k]+"],#register_form select[name="+required[k]+"]").addClass("error-border");
                           
                       }else{
                           input.removeClass("needsfilled");
                       } 
               }
               let password = $("#register_form input[name='password']");
               if(password.val()!='' && password.val().length < 6){
                   password.addClass("needsfilled");
                   let input_label = password.parent().find('label');
                   let label_text = input_label.html();
                   let error_span = " <span class='error'>The password must be at least 6 characters.</span>";
                   let error = label_text + error_span ;
                   input_label.html(error);
                   password.addClass("error-border");	
               }
                 
               if(!$('#register_form input[name="gender"]:checked').val()){
                   $('#register_form input[name="gender"]').addClass("needsfilled");
                   let input_label = $("#register_form").find('.gender_label');
                   let label_text = input_label.html();
                   let error_span = " <span class='error'>The gender field is required.</span>";
                   let error = label_text + error_span ;
                   input_label.html(error);
               }else{
                   $('#register_form input[name="gender"]').removeClass("needsfilled");
               }  
       
                   let email = $("#register_form input[name='email']");
                   if(email.val()!=''){
                       if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
                           email.addClass("needsfilled");
                           let input_label = email.parent().find('label');
                           let label_text = input_label.html();
                           let error_span = " <span class='error'>The email must be a valid email address.</span>";
                           let error = label_text + error_span ;
                           input_label.html(error);
                           email.addClass("error-border");	
                       }
                   }
       
                   if(password.val()!="" && $("#register_form input[name='password_confirmation']").val()!="" && password.val()!=$("#register_form input[name='password_confirmation']").val()){
                           password.addClass("needsfilled");
                           let input_label = password.parent().find('label');
                           let label_text = input_label.html();
                           let error_span = " <span class='error'>The password confirmation does not match.</span>";
                           let error = label_text + error_span ;
                           input_label.html(error);
                           password.addClass("error-border");	
                   }
                   /*@if (request()->is('register') ) 
                   let response = grecaptcha.getResponse();
                   if(response==''){;
                       let label_text =  $(".recaptcha-label").html("");
                       let error_span = " <span class='error'>The recaptcha field is required.</span>";
                       let error = error_span ;
                       $(".recaptcha-label").html(error);
                       return false;
                   }
                   @endif*/
                   if ($("#register_form input,#register_form select").hasClass("needsfilled") ) {
                       return false;
                   }
       
                   @if (request()->is('update-profile') ) 
                       $.ajax({
                           url: "/update-profile", 
                           method: "patch", 
                           data: $( "#register_form" ).serialize(),
                           success: function(response) {
                               $(".sn-info .alert-msg").html(response.success);
                               if(response.success!==''){
                                   $(".sn-info .alert-msg").show();
                                   $('body,html').animate({scrollTop:0},800);
                               }
                           },
                           error: function(error){
                               let obj = JSON.parse(error.responseText);
                               $.each(obj.errors, function(index, el) {
                                   let input_name = index;
                                   let message = el;
                                   let input = $('#register_form input[name="'+input_name+'"],#register_form select[name="'+input_name+'"]');
                                   input.addClass("needsfilled");
                                   let input_label = input.parent().find('label');
                                   let label_text = input_label.html();
                                   let error_span = " <span class='error'>"+message+"</span>";
                                   let error = label_text + error_span ;
                                   input_label.html(error);
                                   input.addClass("error-border");
                               });
                           }
                       });
                       return false;
                   @endif
            }
            $("#register_form .allownumericwithdecimal").on("keypress keyup blur",function (event) {
               $(this).val($(this).val().replace(/[^0-9\.]/g,''));
               if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                   event.preventDefault();
                }
           });
           </script>