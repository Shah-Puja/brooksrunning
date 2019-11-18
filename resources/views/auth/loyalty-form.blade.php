<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
@if(request()->is('program/ppp')) 
<form action="{{ route('register') }}" method="post" id="loyalty_register_form" class=" five columns form-register" onsubmit="return registervalidation()">
@else
<form id="loyalty_register_form" method="POST" action="/account/update_profile" onsubmit="return registervalidation()">
@endif
        @csrf
            <div class="create-account--left loyalty-header-title">
            @if(request()->is('program/ppp'))              
                <h3 class="br-heading">Create your Professional Purchase Account </h3>
                <hr>
                <p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
            @else
                <h3 class="br-heading">View Or Update Your Details </h3>
                <hr>
            @endif
               
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label for="first_name">First Name<sup>*</sup>  @if ($errors->has('first_name'))<span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>@endif</label>                            
                            <input id="first_name" type="text" class="input-field form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ !empty(auth()->user()->first_name) ? auth()->user()->first_name : old('first_name') }}" data-label-name="first name" autofocus>                                 
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="last_name">Last Name<sup>*</sup>  @if ($errors->has('last_name'))<span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>@endif</label>                            
                                <input id="last_name" type="text" class="input-field form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ !empty(auth()->user()->last_name) ? auth()->user()->last_name : old('last_name') }}" data-label-name="last name" autofocus>                                     
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="email">Email Address<sup>*</sup>  @if ($errors->has('email')) <span class="error invalid-feedback">{{ $errors->first('email') }} </span> @endif</label>
                                <input type="text" class="input-field form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ !empty(auth()->user()->email) ? auth()->user()->email : old('email') }}" data-label-name="email" @if (request()->is('update-profile')) readonly="readonly" @endif>                                
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="email">Current Practice Name<sup>*</sup>  @if ($errors->has('org_name')) <span class="error invalid-feedback">{{ $errors->first('org_name') }} </span> @endif</label>
                                <input type="text" class="input-field form-control{{ $errors->has('org_name') ? ' is-invalid' : '' }}" name="org_name" value="{{ !empty(auth()->user()->org_name) ? auth()->user()->org_name : old('org_name') }}" data-label-name="practice name" >                                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                            <label for="email">Practice Postcode<sup>*</sup>  @if ($errors->has('postcode')) <span class="error invalid-feedback">{{ $errors->first('postcode') }} </span> @endif</label>
                                <!-- <input type="text" class="input-field allownumericwithdecimal form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ !empty(auth()->user()->postcode) ? auth()->user()->postcode : old('postcode') }}" data-label-name="practice postcode" @if (request()->is('update-profile')) readonly="readonly" @endif>    
                            <input type="text" maxlength="4" name="b_postcode" min='0' inputmode='numeric' pattern='[0-9]*' class="input-field allownumericwithdecimal" data-label-name="postal code">                             -->
                            <input type="text" maxlength="4" min='0' inputmode='numeric' pattern='[0-9]*' class="input-field allownumericwithdecimal form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ !empty(auth()->user()->postcode) ? auth()->user()->postcode : old('postcode') }}" data-label-name="practice postcode" @if (request()->is('update-profile')) readonly="readonly" @endif>
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="loyalty-practitioner--wrapper">
                        <!-- <div class="input-wrapper">
                        <label for="name">Practitioner Type</label>
                                <select class="select-field" name="custom_Age" id="custom_Age" style="margin-bottom: 0px;">
                                    <option class="option-value" value="Podiatrist">Podiatrist</option>
                                    <option class="option-value" value="Physiotherapist">Physiotherapist</option>
                                    <option class="option-value" value="Chiropractor">Chiropractor</option>
                                    <option class="option-value" value="Osteopath">Osteopath</option>
                                    <option class="option-value" value="Other">Other</option>
                                </select>
                        </div> -->
                           
                        <div class="input-wrapper">
                            <label for="name">Practitioner Type</label>
                                <ul class="loyalty-practitioner">
                                    <li>
                                       @php
                                        $order_type = !empty(auth()->user()->org_type) ? auth()->user()->org_type : old('org_type')
                                       @endphp
                                        <a href="javascript:void(0)" class="practitioner">{!! !empty($order_type) ? $order_type : '&nbsp;'!!} <span class="icon-down-arrow"></span></a>
                                        <ul class="loyalty-practitioner__submenu" id='loyalty-practitioner-Dropdown'>
                                            
                                                <li class="option-value" data-value="Podiatrist">
                                                    Podiatrist
                                                </li>
                                                <li class="option-value" data-value="Physiotherapist">
                                                   Physiotherapist
                                                </li>
                                                <li class="option-value" data-value="Chiropractor">
                                                Chiropractor
                                                </li>
                                                <li class="option-value" data-value="Osteopath">
                                                Osteopath
                                                </li>
                                                <li class="option-value" data-value="Other">
                                                Other
                                                </li>
                                        </ul>
                                    </li>
                                </ul>
                                <input type="hidden" name="org_type" id="org_type" value="{{ !empty(auth()->user()->org_type) ? auth()->user()->org_type : old('org_type') }}"/>
                        </div>
                        </div>
		            </div>
                </div>    
                <div class="row">
                    <div class="tab-6">
                        <div class="input-wrapper">
                                <label for="email">Health Practitioner Number<sup>*</sup>  @if ($errors->has('org_id')) <span class="error invalid-feedback">{{ $errors->first('org_id') }} </span> @endif</label>
                                <input type="text" class="input-field form-control{{ $errors->has('org_id') ? ' is-invalid' : '' }}" name="org_id" value="{{ !empty(auth()->user()->org_id) ? auth()->user()->org_id : old('org_id') }}" data-label-name="health practitioner">                                
                        </div>
                    </div>
                    <div class="tab-6">
                        <div class="input-wrapper padding_bottom">
                            <label class="gender_label">Gender<sup>*</sup>  @if ($errors->has('gender')) <span class="error invalid-feedback">{{ $errors->first('gender') }} </span> @endif</label>
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
                @if(request()->is('loyalty-account-personal'))  
                <div class="row">
					<div class="tab-6">
						<div class="input-wrapper">
							<label>Current Account Password</label>
                            <input type="password" name="current_password" class="input-field" id="current_password" data-label-name="current password">
                            @if ($errors->has('current_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif	
						</div>
					</div>
					<div class="tab-6"></div>
				</div>
                @endif
                <div class="row">
                    <div class="tab-6">
                    <div class="input-wrapper">
                                <div class="row">
                                    <div class="mob-7"><label>Choose a Password</label></div>
                                    <div class="mob-5 loyalty-pass-section">
                                        <div class="show-pass">
                                            <span><input type="checkbox" class="show_password1" name="show_password" >Show Password</span>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <input id="password" type="password" class="pass-show1 input-field{{ $errors->has('password') ? ' is-invalid' : '' }}" data-label-name="password" name="password">

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
                                    <div class="mob-5 loyalty-pass-section">
                                    <div class="show-pass">
                                        <span><input type="checkbox" class="show_password2" name="show_password">Show Password</span>
                                    </div>
                                    </div>
                                </div>
                            </label>
                            <input id="password_confirmation" type="password" class="pass-show2 input-field{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" data-label-name="confirmation password" name="password_confirmation">

                            @if ($errors->has('password')) 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif								
                        </div>
                </div>
                <input type="hidden" name="loyalty_type" value="PPP"/>
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
                        <div class="loyalty-form-btn">                                           
                                <button type="submit" class="btn primary-button">{{ request()->is('program/ppp') ? 'Create Account' : 'Save Changes' }}</button>                                    
                        </div>
                        <p class="loyalty-privacy">See our <a href="/info/privacy">Privacy Policy</a> and <a href="/info/terms-conditions">Terms and Conditions</a>.</p>
                    </div>
                </div>                
            
            </div>
        </div>
    </form>

<style>
    .create-account--left .input-wrapper .show-pass input{
        vertical-align: middle;
    }
    .create-account--left .input-wrapper .show-pass span{
        display: inline;
        font-size: 13px;
    }
</style>

    <script>
            function registervalidation(){
               $("#loyalty_register_form input,select").removeClass("needsfilled");
               $("#loyalty_register_form input,#loyalty_register_form select").removeClass("error-border");
               $("#loyalty_register_form input,#loyalty_register_form select").parent().find('label .error').remove();
               
               @if(request()->is('loyalty-account-personal'))  
                    required = ["first_name","last_name","email","practice_name","postcode","health_practitioner"];
               @else
                    required = ["first_name","last_name","email","practice_name","postcode","health_practitioner","password","password_confirmation"];
               @endif

               let password = $("#loyalty_register_form input[name='password']");
               let password_confirmation = $("#loyalty_register_form input[name='password_confirmation']");
               let current_password = $("#loyalty_register_form input[name='current_password']");

               @if(request()->is('loyalty-account-personal'))  
                    if(password.val()!='' || password_confirmation.val()!='' || current_password.val()!=''){
                        required = ["first_name","last_name","email","practice_name","postcode","health_practitioner","password","password_confirmation","current_password"];
                    }
               @endif
               console.log(required);
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

               
                if(password.val()!='' && password.val().length < 6){
                    password.addClass("needsfilled");
                    let input_label = password.parent().find('label');
                    let label_text = input_label.html();
                    let error_span = " <span class='error'>The password must be at least 6 characters.</span>";
                    let error = label_text + error_span ;
                    input_label.html(error);
                    password.addClass("error-border");	
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

           $('.show_password1').on('click', function() {
                var input = $(".pass-show1");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            $('.show_password2').on('click', function() {
                var input = $(".pass-show2");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
           


        $(document).on('click', '.loyalty-practitioner li .option-value', function () {
            $('.selectedLi').removeClass('selectedLi');
            $(this).addClass('selectedLi');
            var selText = $(this).text().trim();
            $("#org_type").val(selText);
            $(this).parents('.loyalty-practitioner--wrapper').find('.loyalty-practitioner li a').html(selText +
                    ' <span class="icon-down-arrow"></span>');
        //    $('.loyalty-practitioner__submenu').toggle();
        });



        // Check this click event  only for testing- 
        // $("body").on("click", "#loyalty-practitioner-Dropdown li", function() {
        //     var selectedValue = $(this).attr('data-value')
        //     alert(selectedValue)
        // });
        </script>

        