$(document).ready(function(){

    $("#different-address").change(function () {
        if ($("this.checked")) {
            $(".billing-address").show(100);
        }
    });
    $("#same-address").change(function () {
        if ($("this.checked")) {
            $(".billing-address").hide(100);
        }
    });

    $('input[name=s_fname]').on("keypress keyup blur", function () {
        var $firstname = $('input[name=s_fname]').val();
        if ($firstname.toLowerCase() == 'sygtest') {
            $('input[name=s_lname]').val('sygtest');
            $('input[name=s_add1]').val('Test address1');
            $('input[name=s_add1]').val('Test address2');
            $('input[name=s_city]').val('Testcity');
            $('select[name=s_state]').val('ACT');
            $('input[name=s_postcode]').val('4000');
            $('input[name=s_phone]').val('1111111111');
            $('input[name=email]').val('sygtest@gmail.com');
        }
    });
    $('input[name=b_fname]').on("keypress keyup blur", function () {
        var $billing_firstname = $('input[name=s_fname]').val();
        if ($billing_firstname.toLowerCase() == 'sygtest') {
            $('input[name=b_lname]').val('sygtest');
            $('input[name=b_add1]').val('Test address1');
            $('input[name=b_add1]').val('Test address2');
            $('input[name=b_city]').val('Testcity');
            $('select[name=b_state]').val('ACT');
            $('input[name=b_postcode]').val('4000');
            $('input[name=b_phone]').val('1111111111');
        }
    });

    $('.login_user').on('click',function(){
        if ($('#password_field').val() == "") {
            $('#password_field').addClass("needsfilled");
            $('#password_field').val("");
            $('#password_field').attr("placeholder", "REQUIRED");	
        } else {
            $('#password_field').removeClass("needsfilled");
        }
        
        if ($("#password_field").hasClass("needsfilled") ) {
                return false;
        }
        else{
            var password = $('#password_field').val();
            var email = $("#billing_shipping input[name=email]").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/shipping-verify-password",
                type:"POST",
                data: {password:password,email:email},
                success: function(data){
                    // console.log(data);
                    if(data['pass_status']=='true'){
                        if(data['pass_data'] == "order_address"){
                            $.each( data, function( key, value ) {
                                console.log( key + ": " + value );
                                $("input[name='"+key+"']").val(value);
                                $('.password-wrapper').css('display','none');
                            });
                        }else{												
                            $("input[name='s_fname']").val(data['first_name']);
                            $("input[name='s_lname']").val(data['last_name']);
                            $("input[name='s_state']").val(data['state']);
                            $("input[name='s_postcode']").val(data['postcode']);
                            $('.password-wrapper').css('display','none');
                    }
                    }else{	
                        $('#password_field').addClass("needsfilled");
                        $('#password_field').val("");
                        $('#password_field').attr("placeholder", "Wrong Password");
                        						
                    }
                }
            });
        }
        return false;
    });

    $("#reset-pass-open").on('click',function(){
        $('.popup-wrong-password').css('display','block');	
        var email_shipping = $("#billing_shipping input[name=email]").val();
        $("#email").val(email_shipping);
        return false;
    });

    $(".reset_password").on('click',function(){
        var email = $("#reset_email").val();

        if ($('#email').val() == "") {
            $('#email').addClass("needsfilled");
            $('#email').val("");
            $('#email').attr("placeholder", "REQUIRED");	
        } else {
            $('#email').removeClass("needsfilled");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/shipping-check-email",
                type:"POST",
                data: {email:email},
                success: function(data){
                    console.log(data);
                    if(data == "true"){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'post',
                            url: "/password/email",
                            data : { email : email },
                            success:function(data){
                                $("#shippingbilling_popup").hide();
                                $(".popup-success").show();
                            },
                            error: function(jq,status,message) {
                                alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
                            }
                        })
                    }else{
                        $('#email').addClass("needsfilled");
                        $('#email').val("");
                        $('#email').attr("placeholder", "Wrong Email Id");
                    }
                }
            });
        }
        return false;
    });

    $(".main_email_field").on('blur',function(){
        var email = $(this).val();
        if(email == ''){
            $('.password-wrapper').css('display','none');
        }else{
            //console.log(email);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/shipping-check-email",
                type:"POST",
                data: {email:email},
                success: function(data){
                    console.log(data);
                    if(data == "true"){
                        $('.password-wrapper').css('display','block');
                    }else{
                        $('.password-wrapper').css('display','none');
                    }
                }
            });
         }
         return false;
    });

    $('.pass-emailpopup-send').on('click',function(){
        var email = $('#popup_email').val();
        if ($('#popup_email').val() == "") {
            $('#popup_email').addClass("needsfilled");
            $('#popup_email').val("");
            $('#popup_email').attr("placeholder", "REQUIRED");	
        } else {
            //console.log($('#popup_email').val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/shipping-check-email",
                type:"POST",
                data: {email:email},
                success: function(data){
                    //console.log(data);
                    if(data == "true"){
                        console.log("true pouup");
                        // $.ajax({
                        // 	headers: {
                        // 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        // 	},
                        // 	url:"/password/reset",
                        // 	type:"POST",
                        // 	data: {email:email},
                        // 	success: function(data){
                        // 		console.log(data);
                        // 		// if(data == "true"){
                        // 		// 	$('.password-wrapper').css('display','block');
                        // 		// }else{
                        // 		// 	$('.password-wrapper').css('display','none');
                        // 		// }
                        // 	}
                        // });
                        window.location.href = "http://brooksrunning.test/password/reset";
                    }else{
                        $('#popup_email').addClass("needsfilled");
                        $('#popup_email').val("");
                        $('#popup_email').attr("placeholder","The email address is invalid");
                    }
                }
            });
        }
        return false;
    });

});

function email_check_validate(){
    email_required = ['email']; 
    var email = $('.check_email_field').val();
    let input = $('#email_check input[name="'+email_required+'"]');
    if (input.val() == "") {
        input.addClass("needsfilled");
        let label_name = $("#email_check input[name="+email_required+"]").data("label-name");
        let input_label = $("#email_check input[name="+email_required+"]").parent().find('label');
        let label_text = input_label.html();
        let error_span = " <span class='error'>The "+label_name+" field is required.</span>";
        let error = label_text + error_span ;
        input_label.html(error);$("#billing_shipping input[name="+email_required+"]").addClass("error-border");
        
    }else{
        input.removeClass("needsfilled");
    } 

    if ($("#email_check input").hasClass("needsfilled") ) {
            return false;
    }
    else{
        $.ajax({
            url:"/shipping-check-email",
            type:"POST",
            data: $('#email_check').serialize(),
            success: function(data){
                //console.log(data);
                if(data == "true"){
                    $('#shipping-form').css('display','none');
                    $('.shipping-main-form').css('display','block');
                    $('.password-wrapper').css('display','block');
                    $('.main_email_field').val(email);
                }else{
                    $('#shipping-form').css('display','none');
                    $('.shipping-main-form').css('display','block');
                    $('.main_email_field').val(email);
                }
            }
        });
    }
    return false;
}

function gest_user(){
    $('.password-wrapper').css('display','none');
    $('#password_field').val('');
}


function shippingform_validate(){
    $("#billing_shipping input,#billing_shipping select").removeClass("error-border");
    $("#billing_shipping input,#billing_shipping select").parent().find('label .error').remove();

    shipping_required = ["email","s_fname","s_lname","s_add1","s_city","s_state","s_postcode","s_phone","s_country"];
    billing_required = ["b_fname","b_lname","b_add1","b_city","b_state","b_postcode","b_phone","b_country"];
        
    for (k=0;k<shipping_required.length;k++) {
        let input = $('#billing_shipping input[name="'+shipping_required[k]+'"],#billing_shipping select[name="'+shipping_required[k]+'"]');
        if (input.val() == "") {
            input.addClass("needsfilled");
            let label_name = $("#billing_shipping input[name="+shipping_required[k]+"],#billing_shipping select[name="+shipping_required[k]+"]").data("label-name");
            let input_label = $("#billing_shipping input[name="+shipping_required[k]+"],#billing_shipping select[name="+shipping_required[k]+"]").parent().find('label');
            let label_text = input_label.html();
            let error_span = " <span class='error'>The "+label_name+" field is required.</span>";
            let error = label_text + error_span ;
            input_label.html(error);$("#billing_shipping input[name="+shipping_required[k]+"],#billing_shipping select[name="+shipping_required[k]+"]").addClass("error-border");
            
        }else{
            input.removeClass("needsfilled");
        } 
    
    }
        
        
    let email = $("#billing_shipping input[name='email']");
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
    var s_phone = $('#billing_shipping input[name="b_phone"]').val();
    if(!s_phone.match(/^(?=.*[0-9])[- +()0-9]+$/) && s_phone!=''){
        $('#billing_shipping input[name="s_phone"]').addClass("needsfilled");
        let input_label = $('#billing_shipping input[name="s_phone"]').parent().find('label');
        let label_text = input_label.html();
        let error_span = " <span class='error'>The phone format is invalid.</span>";
        let error = label_text + error_span ;
        input_label.html(error);
        $('#billing_shipping input[name="s_phone"]').addClass("error-border");	
    }
        
    if($('input[type="radio"][name="flag_same_shipping"]:checked').val()=='No'){
        for (j=0;j<billing_required.length;j++) {
            let input = $('input[name="'+billing_required[j]+'"],select[name="'+billing_required[j]+'"]');
            if (input.val() == "") {
                input.addClass("needsfilled");
                let label_name = $("#billing_shipping input[name="+billing_required[j]+"],#billing_shipping select[name="+billing_required[j]+"]").data("label-name");
                let input_label = $("#billing_shipping input[name="+billing_required[j]+"],#billing_shipping select[name="+billing_required[j]+"]").parent().find('label');
                let label_text = input_label.html();
                let error_span = " <span class='error'>The "+label_name+" field is required.</span>";
                let error = label_text + error_span ;
                input_label.html(error);
                $("#billing_shipping input[name="+billing_required[j]+"],#billing_shipping select[name="+billing_required[j]+"]").addClass("error-border");
            }else{
                input.removeClass("needsfilled");
            } 
        }
    for (k = 0; k < shipping_required.length; k++) {
        let input = $('#billing_shipping input[name="' + shipping_required[k] + '"],#billing_shipping select[name="' + shipping_required[k] + '"]');
        if (input.val() == "") {
            input.addClass("needsfilled");
            let label_name = $("#billing_shipping input[name=" + shipping_required[k] + "],#billing_shipping select[name=" + shipping_required[k] + "]").data("label-name");
            let input_label = $("#billing_shipping input[name=" + shipping_required[k] + "],#billing_shipping select[name=" + shipping_required[k] + "]").parent().find('label');
            let label_text = input_label.html();
            let error_span = " <span class='error'>The " + label_name + " field is required.</span>";
            let error = label_text + error_span;
            input_label.html(error);
            $("#billing_shipping input[name=" + shipping_required[k] + "],#billing_shipping select[name=" + shipping_required[k] + "]").addClass("error-border");


        } else {
            input.removeClass("needsfilled");
        }
    }


    let email = $("#billing_shipping input[name='email']");
    if (email.val() != '') {
        if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
            email.addClass("needsfilled");
            let input_label = email.parent().find('label');
            let label_text = input_label.html();
            let error_span = " <span class='error'>The email must be a valid email address.</span>";
            let error = label_text + error_span;
            input_label.html(error);
            email.addClass("error-border");
        }
    }
    var s_phone = $('#billing_shipping input[name="b_phone"]').val();
    if (!s_phone.match(/^(?=.*[0-9])[- +()0-9]+$/) && s_phone != '') {
        $('#billing_shipping input[name="s_phone"]').addClass("needsfilled");
        let input_label = $('#billing_shipping input[name="s_phone"]').parent().find('label');
        let label_text = input_label.html();
        let error_span = " <span class='error'>The phone format is invalid.</span>";
        let error = label_text + error_span;
        input_label.html(error);
        $('#billing_shipping input[name="s_phone"]').addClass("error-border");
    }

    if ($('input[type="radio"][name="flag_same_shipping"]:checked').val() == 'No') {
        for (j = 0; j < billing_required.length; j++) {
            let input = $('input[name="' + billing_required[j] + '"],select[name="' + billing_required[j] + '"]');
            if (input.val() == "") {
                input.addClass("needsfilled");
                let label_name = $("#billing_shipping input[name=" + billing_required[j] + "],#billing_shipping select[name=" + billing_required[j] + "]").data("label-name");
                let input_label = $("#billing_shipping input[name=" + billing_required[j] + "],#billing_shipping select[name=" + billing_required[j] + "]").parent().find('label');
                let label_text = input_label.html();
                let error_span = " <span class='error'>The " + label_name + " field is required.</span>";
                let error = label_text + error_span;
                input_label.html(error);
                $("#billing_shipping input[name=" + billing_required[j] + "],#billing_shipping select[name=" + billing_required[j] + "]").addClass("error-border");
            } else {
                input.removeClass("needsfilled");
            }
        }

        var b_phone = $('#billing_shipping input[name="s_phone"]').val();
        if (!b_phone.match(/^(?=.*[0-9])[- +()0-9]+$/) && b_phone != '') {
            $('#billing_shipping input[name="b_phone"]').addClass("needsfilled");
            let input_label = $('#billing_shipping input[name="b_phone"]').parent().find('label');
            let label_text = input_label.html();
            let error_span = " <span class='error'>The phone format is invalid.</span>";
            let error = label_text + error_span;
            input_label.html(error);
            $('#billing_shipping input[name="b_phone"]').addClass("error-border");
        }
    }

    let terms = $('#billing_shipping input[type="checkbox"][name="terms"]');
    if (!terms.is(':checked')) {
        let input_label = terms.parent().find('label');
        let label_text = input_label.html();
        let error_span = " <span class='error'>The terms must be accepted.</span>";
        let error = label_text + error_span;
        input_label.html(error);
        terms.addClass("needsfilled");
    } else {
        terms.removeClass("needsfilled");
    }

    if ($("#billing_shipping input,#billing_shipping select").hasClass("needsfilled")) {
        return false;
    }
}

    if ($("#billing_shipping input,#billing_shipping select").hasClass("needsfilled")) {
        return false;
    }
}
