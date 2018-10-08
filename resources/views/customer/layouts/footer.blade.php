<footer class="footer-container">
		<div class="footer-banner__wrapper">
			<div class="wrapper">
				<div class="row">
					<div class="col-12">
						<div class="footer-banner">
							<div class="footer-banner__info">
							    We believe A RUN can flat out change a day, a life, the world.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper footer-wrapper">
			<div class="row footer-navbar">
				<div class="footer-navbar-info">
					<input id="tab-one" type="checkbox" class="tab-checkbox" name="tabs">
		            <div class="tab-header">
		                <label for="tab-one" class="bold">
		                	<h3>Customer Service</h3>
		                	<span>+</span>
		                </label>
		            </div>
	            	<ul class="tab-content">
	                    <li><a href="#">Contact Us</a></li>
	                    <li><a href="#">Shipping Information</a></li>
	                    <li><a href="#">Returns &amp; Exchange</a></li>
	                    <li><a href="#">Terms &amp; Conditions</a></li>
	                    <li><a href="#">Terms of Use</a></li>
	                    <li><a href="#">Shoe Finder</a></li>
	                    <li><a href="#">Find A Store</a></li>
	                </ul>
				</div>
				<div class="footer-navbar-info">
					<input id="tab-two" type="checkbox" class="tab-checkbox" name="tabs">
		            <div class="tab-header">
		            	<label for="tab-two" class="bold">
		                	<h3>Products</h3>
		                	<span>+</span>
		                </label>
		            </div>
		            <ul class="tab-content">
	                    <li><a href="#">Women's Shoes</a></li>
	                    <li><a href="#">Men's Shoes</a></li>
	                    <li><a href="#">Women's Clothing</a></li>
	                    <li><a href="#">Men's Clothing</a></li>
	                </ul>
				</div>
				<div class="footer-navbar-info">
					<input id="tab-three" type="checkbox" class="tab-checkbox" name="tabs">
		            <div class="tab-header">
		            	<label for="tab-three" class="bold">
		                	<h3>Community</h3>
		                	<span>+</span>
		                </label>
		            </div>
		            <ul class="tab-content">
						<li><a href="#">The Run Down Email Sign Up</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Instagram</a></li>
	                </ul>
				</div>
				<div class="footer-navbar-info">
					<input id="tab-four" type="checkbox" class="tab-checkbox" name="tabs">
		            <div class="tab-header">
		            	<label for="tab-four" class="bold">
		                	<h3>Account</h3>
		                	<span>+</span>
		                </label>
		            </div>
		            <ul class="tab-content">
	                    <li><a href="#">Login</a></li>
	                    <li><a href="#">Register</a></li>
	                </ul>
				</div>
			</div>
			<div class="row">
				<div class="col-6 tab-5">
					<div class="footer-social">
						<h3>Run Happy!</h3>
						<a href="#"><span class="icon-social-twitter"></span></a>
						<a href="#"><span class="icon-social-insta"></span></a>
						<a href="#"><span class="icon-social-fb"></span></a>
					</div>
				</div>
				<div class="col-6 tab-7">
					<div class="bottom-signup">
						<h3>Email sign up - The Run Down</h3>
						<p>Stay up to date with special offers, product updates events, competitions and tips to keep you running happy!</p>
						<h1 class="error">{{ $errors->first('email') }}</h1>
                    <form class="clearfix" method="post" name="form_subscribers" action="" onsubmit="return check_subscribers()">			
                        @csrf
                        <input class="input " type="text" name="email" value="{{ old('email') }}" id="email" placeholder="Enter your email address">
                        <button type="submit" class="btn">go</button>
                    </form>
						<div class="payment--icons clearfix">
							<ul>
								<li><img src="/images/payment-master.png" width="50" height="auto" alt=""></li>
								<li><img src="/images/payment-visa.png" width="50" height="auto" alt=""></li>
								<li><img src="/images/payment-paypal.png" width="103" height="auto" alt=""></li>
								<li><img src="/images/payment-afterpay.png" width="115" height="auto" alt=""></li>
								<li><p>Safe &amp; Secure Payments enabled by</p></li>
								<li><img src="/images/payment-braintree.png" width="140" height="auto" alt=""></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row copywrite">
				<div class="tab-12">
					<ul>
						<li><img src="/images/brooks-logo-footer.png" alt=""></li>
						<li>&copy; 2018 Brooks Australia.</li>
					</ul>
				</div>
				<div class="col-6 tab-5">
					<p>Texas Peak Pty. Ltd. 30 Tullamarine Park Rd. Tullamarine Vic. Australia 3043 | 1300-735-099</p>
				</div>
				<div class="col-6 tab-7">
					<ul class="footer-nav">
						<li>
							<a href="#">Privacy Policy</a>
						</li>
						<li>
							<a href="#">Help</a>
						</li>
						<li>
							<a href="#">Site Map</a>
						</li>
						<li>
							<a href="#">About Brooks</a>
						</li>
					</ul>
				</div>
			</div>
	    </div>
	</footer>
	<style>
		.needsfilled{
			border:1px solid #ff0000 !important;
		}
	</style>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/listing.js"></script>
<!-- details page js -->
<script src="/js/pdp-js.js"></script>
<script>
                        $(document).ready(function () {

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

                            $('#pdp-zoom--image').lightSlider({
                                gallery: true,
                                item: 1,
                                slideMargin: 0,
                                thumbItem: 9
                            });
                        });
</script>
@if(request()->is('register'))
<!-- Register page js please write here-->
@endif

<!-- common js -->
<script src="/js/common.js"></script>
<!-- Subscribers js -->
<script>
                        function check_subscribers() {
                            let email = $("form[name='form_subscribers'] input[name='email']").val();

                            $.ajax({
                                url: "/subscribers/new",
                                method: "post", 
                                data: {email: email},
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (response) {
                                    $(".bottom-signup").find("p").text(response.success);
                                    return false;
                                },
                                error: function (error) { 
                                    let obj = JSON.parse(error.responseText); 
                                    $(".error").text(obj.errors.email);
                                },
                                statusCode: {
                                    419: function () {
                                        return false;
                                    }
                                }
                            });
                            return false;
                        }
</script>

<!-- shipping -->
<script>
    $(document).ready(function () {
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
    });

    function shippingform_validate() {
        $("#billing_shipping input,#billing_shipping select").removeClass("error-border");
        $("#billing_shipping input,#billing_shipping select").parent().find('label .error').remove();

        shipping_required = ["email", "s_fname", "s_lname", "s_add1", "s_city", "s_state", "s_postcode", "s_phone", "s_country"];
        billing_required = ["b_fname", "b_lname", "b_add1", "b_city", "b_state", "b_postcode", "b_phone", "b_country"];

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

<<<<<<< HEAD
    $("#billing_shipping .allownumericwithdecimal").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            console.log("edererer");
            event.preventDefault();
        }
    });
    $(".phone-number").on("keypress keyup blur", function (event) {
        var yourInput = $(this).val();
        var no_spl_char = yourInput.replace(/[ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz`!#$%^&*()|\=?;:'",.<>\{\}\[\]\\\/]/gi, '');
        $(this).val(no_spl_char);
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) &&
                (event.which < 48 || event.which > 57) && event.which != 43 &&
                event.which != 32 && event.which != 45) {
            event.preventDefault();
        }
    });

</script>
=======
	</script>
<!-- shipping close -->

<!-- payment -->
	<script>
		function paymentform_validate(){
			required = ["card-number","expiration-month","expiration-year","cvv"];
			// The text to show up within a field when it is incorrect
			emptyerror = "REQUIRED";

			for (i=0;i<required.length;i++) {
                var input = $('#'+required[i]);
                if ((input.val() == "") || (input.val() == emptyerror)) {
                    input.addClass("needsfilled");
                    input.val("");
                    input.attr("placeholder", emptyerror);
                    //errornotice.fadeIn(750);
                } else {
                    input.removeClass("needsfilled");
                }
    		}
			
			if ($(":input").hasClass("needsfilled") ) {
				return false;
			}
		}
	</script>
<!-- payment close -->

>>>>>>> 2a5a1d930ab3dd05ac0c3589a26d8c0aaa3f4fc9

</body>
</html>