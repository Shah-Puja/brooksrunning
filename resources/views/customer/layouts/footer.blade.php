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
	                    <li><a href="/info/contact-us">Contact Us</a></li>
	                    <li><a href="/info/shipping-information">Shipping Information</a></li>
	                    <li><a href="/info/returns-exchange">Returns &amp; Exchange</a></li>
	                    <li><a href="/info/terms-conditions">Terms &amp; Conditions</a></li>
	                    <li><a href="/info/terms-of-use">Terms of Use</a></li>
	                    <li><a href="/shoefinder">Shoe Finder</a></li>
	                    <li><a href="/store-locator">Find A Store</a></li>
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
	                    <li><a href="/womens-running-shoes">Women's Shoes</a></li>
	                    <li><a href="/mens-running-shoes">Men's Shoes</a></li>
	                    <li><a href="/womens-running-clothes">Women's Clothing</a></li>
	                    <li><a href="/mens-running-clothes">Men's Clothing</a></li>
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
						<li><a href="/meet_brooks/newsletter">The Run Down Email Sign Up</a></li>
						<li><a href="http://talk.brooksrunning.com/au/">Blog</a></li>
						<li><a href="https://www.facebook.com/BrooksrunningAU/">Facebook</a></li>
						<li><a href="https://twitter.com/brooksrunningau">Twitter</a></li>
						<li><a href="https://www.instagram.com/brooksrunningau/">Instagram</a></li>
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
	                    <li><a href="/login">Login</a></li>
	                    <li><a href="/register">Register</a></li>
	                </ul>
				</div>
			</div>
			<div class="row">
				<div class="col-6 tab-5">
					<div class="footer-social">
						<h3>Run Happy!</h3>
						<a href="https://twitter.com/brooksrunningau"><span class="icon-social-twitter"></span></a>
						<a href="https://www.instagram.com/brooksrunningau/"><span class="icon-social-insta"></span></a>
						<a href="https://www.facebook.com/BrooksrunningAU/"><span class="icon-social-fb"></span></a>
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
							<a href="/info/privacy">Privacy Policy</a>
						</li>
						<li>
							<a href="/info/contact-us">Help</a>
						</li>
						<li>
							<a href="/info/sitemap">Site Map</a>
						</li>
						<li>
							<a href="/info/about-us">About Brooks</a>
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

</body>
</html>