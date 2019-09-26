<form id="loyalty_register_form" method="POST" action="{{ route('register') }}" onsubmit="return registervalidation()">
        @csrf
            <div class="create-account--left">                    
                <h3 class="br-heading">Create your Professional Purchase Account </h3>
                <hr>
                <p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label for="first_name">First Name<sup>*</sup> : @if ($errors->has('first_name'))<span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>@endif</label>                            
                            <input id="first_name" type="text" class="input-field form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ !empty(auth()->user()->first_name) ? auth()->user()->first_name : old('first_name') }}" data-label-name="first name" autofocus>                                 
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="last_name">Last Name<sup>*</sup> : @if ($errors->has('last_name'))<span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>@endif</label>                            
                                <input id="last_name" type="text" class="input-field form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ !empty(auth()->user()->last_name) ? auth()->user()->last_name : old('last_name') }}" data-label-name="last name" autofocus>                                     
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
                                <label for="email">Current Practice Name<sup>*</sup> : @if ($errors->has('practice_name')) <span class="error invalid-feedback">{{ $errors->first('practice_name') }} </span> @endif</label>
                                <input type="text" class="input-field form-control{{ $errors->has('practice_name') ? ' is-invalid' : '' }}" name="practice_name" value="{{ !empty(auth()->user()->practice_name) ? auth()->user()->practice_name : old('email') }}" data-label-name="practice name" @if (request()->is('update-profile')) readonly="readonly" @endif>                                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="email">Practice Postcode<sup>*</sup> : @if ($errors->has('postcode')) <span class="error invalid-feedback">{{ $errors->first('postcode') }} </span> @endif</label>
                                <input type="text" class="input-field allownumericwithdecimal form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ !empty(auth()->user()->postcode) ? auth()->user()->postcode : old('postcode') }}" data-label-name="practice postcode" @if (request()->is('update-profile')) readonly="readonly" @endif>                                
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="email">Health Practitioner<sup>*</sup> : @if ($errors->has('health_practitioner')) <span class="error invalid-feedback">{{ $errors->first('health_practitioner') }} </span> @endif</label>
                                <input type="text" class="input-field form-control{{ $errors->has('health_practitioner') ? ' is-invalid' : '' }}" name="health_practitioner" value="{{ !empty(auth()->user()->health_practitioner) ? auth()->user()->health_practitioner : old('email') }}" data-label-name="health practitioner" @if (request()->is('update-profile')) readonly="readonly" @endif>                                
                        </div>
                    </div>
                </div>    
                <div class="row">
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
                    
                    <div class="tab-6">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                    <div class="input-wrapper">
                                <div class="row">
                                    <div class="mob-7"><label>Choose your Account Password</label></div>
                                    <div class="mob-5">
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
                    <div class="tab-6">
                    <div class="input-wrapper">
								
                                <div class="row">
                                    <div class="mob-7"><label>Confirm Password</label></div>
                                    <div class="mob-5">
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
                <input type="hidden" name="loyalty_type" value="ppp"/>
                <!--<div class="row">
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
                </div>-->
                <div class="row">
                    <div class="tab-12">
                        <div class="cart-btn">                                           
                                <button type="submit" class="btn primary-button">Apply Now</button>                                    
                        </div>
                        <p class="privacy">See our <a href="/info/privacy">Privacy Policy</a> and <a href="/info/terms-conditions">Terms and Conditions</a>.</p>
                    </div>
                </div>                
            
            </div>
    </form>

    <script>
            function registervalidation(){
               $("#loyalty_register_form input,#loyalty_register_form select").removeClass("error-border");
               $("#loyalty_register_form input,#loyalty_register_form select").parent().find('label .error').remove();
                required = ["last_name","email","practice_name","postcode","health_practitioner","password","password_confirmation"];
                for (k=0;k<required.length;k++) {
                       let input = $('#loyalty_register_form input[name="'+required[k]+'"],#loyalty_register_form select[name="'+required[k]+'"]');
                       if (input.val() == "") {
                           input.addClass("needsfilled");
                           let label_name = $("#loyalty_register_form input[name="+required[k]+"],#loyalty_register_form select[name="+required[k]+"]").data("label-name");
                           let input_label = $("#loyalty_register_form input[name="+required[k]+"],#loyalty_register_form select[name="+required[k]+"]").parent().find('label');
                           let label_text = input_label.html();
                           let error_span = " <span class='error'>The "+label_name+" field is required.</span>";
                           let error = label_text + error_span ;
                           input_label.html(error);
                           $("#loyalty_register_form input[name="+required[k]+"],#loyalty_register_form select[name="+required[k]+"]").addClass("error-border");
                           
                       }else{
                           input.removeClass("needsfilled");
                       } 
               }
               let password = $("#loyalty_register_form input[name='password']");
               if(password.val()!='' && password.val().length < 6){
                   password.addClass("needsfilled");
                   let input_label = password.parent().find('label');
                   let label_text = input_label.html();
                   let error_span = " <span class='error'>The password must be at least 6 characters.</span>";
                   let error = label_text + error_span ;
                   input_label.html(error);
                   password.addClass("error-border");	
               }
                 
               if(!$('#loyalty_register_form input[name="gender"]:checked').val()){
                   $('#loyalty_register_form input[name="gender"]').addClass("needsfilled");
                   let input_label = $("#loyalty_register_form").find('.gender_label');
                   let label_text = input_label.html();
                   let error_span = " <span class='error'>The gender field is required.</span>";
                   let error = label_text + error_span ;
                   input_label.html(error);
               }else{
                   $('#loyalty_register_form input[name="gender"]').removeClass("needsfilled");
               }  
       
                   let email = $("#loyalty_register_form input[name='email']");
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
       
                   if(password.val()!="" && $("#loyalty_register_form input[name='password_confirmation']").val()!="" && password.val()!=$("#loyalty_register_form input[name='password_confirmation']").val()){
                           password.addClass("needsfilled");
                           let input_label = password.parent().find('label');
                           let label_text = input_label.html();
                           let error_span = " <span class='error'>The password confirmation does not match.</span>";
                           let error = label_text + error_span ;
                           input_label.html(error);
                           password.addClass("error-border");	
                   }
                   
                   if ($("#loyalty_register_form input,#loyalty_register_form select").hasClass("needsfilled") ) {
                       return false;
                   }
            }
            $("#loyalty_register_form .allownumericwithdecimal").on("keypress keyup blur",function (event) {
               $(this).val($(this).val().replace(/[^0-9\.]/g,''));
               if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                   event.preventDefault();
                }
           });
           </script>