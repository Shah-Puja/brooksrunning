<link rel="stylesheet" href="/css/medibank-styles.css">
   <h1 class="br-heading">Verification</h1>
                
    <div class="shipping-form" id="shipping-form" >
        <p class="email-msg medibank-label">Please enter your email address</p>
        <div class="row medibank-form">
            <div class="col-6">
                <div class="input-wrapper">
                    <label for="email1"><sup>*</sup>Email Address</label>
                <input type="text" name="email" id="email" class="input-field" data-label-name="email">
                </div>
                <div class="input-wrapper medibank-ID">
                    <label for="medibank"><sup>*</sup>Medibank ID</label>
                        <input type="text" name="medibank" id="medibank" class="input-field" data-label-name="medibank">
                </div>
            </div>
        </div>
        <h2 class="br-heading medibank-success-msg" style="display:none;">Your member number has been validated.</h2>
        <div class="row">
            <div class="col-6">
                <div class="medibankverification-error" style="display:none;">
                    <div class="medibankError-content">
                        <p class="medibankError-msg">Sorry your member number could not be validated. Please try again.</p>
                        <div class="medibank-btn clearfix">
                            <span><a class="secondary-button" href="#">Cancel</a></span>
                            <span><a class="primary-button" href="#">Try Again</a></span>
                        </div>
                        <a href="#" class="medibank-proceed">Proceed without verification</a>
                    </div>
                </div>
                <div class="cart-btn" style="display:none;">
                    <button class="primary-button pdp-button" type="submit">Continue</button>
                </div>
                 <div class="cart-btn medibank-success--proceed" >
                    <button class="primary-button pdp-button" type="submit">Verify</button>
                </div>

            </div>
        </div>
    </div>

<script>
$(document).ready(function(){
  $(".medibank-proceed").click(function(){
    $(".cart-btn").css("display", "block");
    $(".medibank-ID").css("display", "none");
    $(".medibankverification-error").css("display", "none");
  });
  $(".medibank-success--proceed").click(function(){
    $(".medibank-success-msg").css("display", "block");
    $(".cart-btn").css("display", "block");
    $(".medibank-label").css("display", "none");
    $(".medibank-form").css("display", "none");
    $(".medibank-success--proceed").css("display", "none");
  });
});
</script>