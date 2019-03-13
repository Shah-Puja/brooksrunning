<!-- Password Wrapper -->
<div class="password-wrapper">
    <div class="row">
        <div class="col-12">
            <p class="email-msg">Looks like you have an account. Enter your password for faster checkout.</p>	
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="input-wrapper">
                <label for="password"><sup>*</sup>Password</label>
                <input type="password" id="password_field" name="password" class="input-field">
            </div>
            <div class="reset-text">Forgot your password? Reset it <a href="javascript:void(0)" id="reset-pass-open">here</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="cart-btn cart-btn--password">
                <!--<a href='javascript:void(0)' class="primary-button pdp-button login_user">Login</a>-->
                <button class="primary-button pdp-button login_user" type="submit">Login</button>
                {{-- <button class="secondary-button2" onclick="gest_user()">Checkout as guest</button> --}}
                <a href='javascript:void(0)' class="secondary-button2 gest_user">Checkout as guest</a>
                {{-- <a href='javascript:void(0)' class="continue-step" onclick="gest_user()">Continue without login</a> --}}
            </div>
        </div>
    </div>
</div>