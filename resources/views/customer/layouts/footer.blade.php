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
                            <li><img src="images/payment-master.png" width="50" height="auto" alt=""></li>
                            <li><img src="images/payment-visa.png" width="50" height="auto" alt=""></li>
                            <li><img src="images/payment-paypal.png" width="103" height="auto" alt=""></li>
                            <li><img src="images/payment-afterpay.png" width="115" height="auto" alt=""></li>
                            <li><p>Safe &amp; Secure Payments enabled by</p></li>
                            <li><img src="images/payment-braintree.png" width="140" height="auto" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copywrite">
            <div class="tab-12">
                <ul>
                    <li><img src="images/brooks-logo-footer.png" alt=""></li>
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

@if(request()->is('list/*'))
<!-- listing page js -->
<script src="/js/owl.carousel.min.js"></script>
@endif

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
                                success: function (response) {
                                    $(".bottom-signup").find("p").text(response.success);
                                    return false;
                                },
                                error: function (error) {
                                    let obj = JSON.parse(error.responseText);
                                    $(".bottom-signup").find("p").text(obj.errors.email);
                                }
                            });
                            return false;
                        }
</script>
</body>
</html>