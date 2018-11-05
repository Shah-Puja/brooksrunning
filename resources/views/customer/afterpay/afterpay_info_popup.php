<style>

    /* AfterPay CSS Start */
    .Payment-AfterPay{float:left;}
    .payment-info-popup--container{width: 320px;}
    .afterpay-border--none{border: 0 !important;}
    .afterpay-tab--footer{padding: 0px 0px 0px 12px; width: 100%; max-width: 320px;}
    .afterpay-tab--footer p{margin-bottom: 0px; font-size: 11.3px; line-height: 1.5; margin-left: 5px;}
    .payment-afterpay--wrapper--btn{width: 100% !important;max-width: 280px;margin: 0 15px 0px; padding: 4px 0 !important;float: none !important; background: #000000 !important; color: #ffffff !important;}
    .payment-afterpay--wrapper--btn img{display: inline-block;vertical-align: middle;width: 140px;}
    .payment-afterpay--wrapper--btn span{display: inline-flex;margin-right: 13px;text-transform: none;font-size: 14px;margin-top: 6px;}
    @media screen and (max-width: 767px){
       .afterpay-tab--footer{padding: 0px; }
    }
    @media screen and (max-width: 950px){
        .payment-afterpay--wrapper--btn{max-width: 100%;    margin: 0 0 20px;}
    }
    .afterpay-tab--box{display: block;padding-bottom: 10px !important; border-bottom: 0 !important;}
    .afterpay-tab--box .tabLink{display: inline-block; margin: 0; padding-right: 20px; position: relative;padding-left: 24px; cursor: pointer;}
     .afterpay img{width: 90px; display: inline-block; vertical-align: middle; margin-bottom: 20px; vertical-align: middle;}
    .afterpay-input-icon{width: 20px; height: 20px; border: 1px solid #a6a6a6; border-radius: 100%; background: #dedede; position: absolute; top: 1px; left: 0;}
    .afterpay-input-icon .afterpay-input--show{width: 100%; height: 100%;position: relative;display: block;}
    .afterpay-input-icon .afterpay-input--show .show-icon{display: block;width: 7px; height: 7px; background-color: #dddddd; border-radius: 100%; position: absolute; top: 50%;left: 50%;transform: translate(-50%,-50%);}
    .afterpay-input-icon .afterpay-input--show .redbg{background-color: #000000;}
    @media screen and (max-width: 550px){
        .afterpay-tab--box .afterpay img{width: 93px;}
    }
    .afterpay-tab--box .afterpay span{text-decoration: underline; margin-left: 20px; vertical-align: top;}
    .payment-afterpay--wrapper{ padding: 10px 15px; width: 100%; max-width: 330px;}
    .payment-afterpay--wrapper h2{margin: 15px 0 10px;}
    .payment-afterpay--wrapper ul li{position: relative; display: block; margin: 5px 0;}
    .payment-afterpay--wrapper ul li .icon-texts{display: inline-block; vertical-align: top; line-height: 1.9; margin-left: 6px; font-family: BureauGrotesque1,Arial,Helvetica,sans-serif;}
    .payment-paypal--container p {display: inline-block; vertical-align: top; line-height: 1.9; margin-left: 6px; font-weight: normal !important;}
    .payment-afterpay--wrapper ul li .icon-wrapper{width: 20px; height: 20px; border-radius: 50%; border: 1px solid #0c085d; overflow: hidden; display: inline-block; position: relative;}
    .payment-afterpay--wrapper ul li .icon-wrapper .one{display: inline-block;background-color: #9ccfe2;height: 100%;position: absolute; width: 100%;top: 0;right: 0;}
    .payment-afterpay--wrapper ul li .icon-wrapper .two{display: inline-block;background-color: #9ccfe2;height: 10px;position: absolute; width: 10px;top: 0;right: 0;}
    .payment-afterpay--wrapper ul li .icon-wrapper .three{display: inline-block;background-color: #9ccfe2;height: 20px;position: absolute; width: 9px;top: 0;right: 0;}
    .payment-afterpay--wrapper ul li .icon-wrapper .four{display: inline-block;background-color: #9ccfe2;height: 9px;position: absolute; width: 10px;bottom: 0;left: 0;}
    .pdp-info-popup--cover{margin-bottom: 10px; font-size: 16px; line-height: 16px !important; font-family: "TradeGothicLTPro",Arial,sans-serif; color: #000000;}
    .payment-info-popup--cover{margin-bottom: 5px; font-size: 16px; line-height: 16px !important; font-family: "TradeGothicLTPro",Arial,sans-serif; color: #000000;}
    @media screen and (max-width: 767px){
        .pdp-info-popup--cover{margin-top: 10px;}
        .payment-info-popup--cover{margin-top: 1px;}
        .pdp-info-popup--cover--order{margin-top: 0;}
        .payment-select--wrapper{ height: 70px;}
    }
    .pdp-info-popup--cover img, .payment-info-popup--cover img{display: inline-block; vertical-align: middle; width: 90px;}
    .jp-payments img {display: block; margin-top: -5px !important; margin-left: auto!important; margin-right: auto!important; width: 50%!important;}
    .pdp-info-popup--cover a,  .payment-info-popup--cover a{text-decoration: underline; color: #000000;}
    #afterpay--popup--container{position: fixed; display: none; overflow: scroll; top: 0; left: 0; z-index: 5000; width: 100%; height: 100%; background: rgba(0,0,0,0.3); color: #000000; }
    #afterpay--popup--container p , #afterpay--popup--container ul li{ font-family: trade-gotich-medium, Helvetica, Arial, sans-serif;}
    #afterpay--popup--container h2, #afterpay--popup--container h3{ font-family: "FranklinGothicLT-ExtraCond",Arial,sans-serif; margin-bottom: 10px; text-transform: uppercase;     font-size: 20px;}
    #afterpay--popup--container .pdp-popup--cover{width: 90%; max-width: 1130px; background: #fff; position: absolute; overflow: auto; top: 0%; left: 50%; transform: translate(-50%, 0);}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info{ padding: 40px 15px 15px; position: relative;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info hr{height: 1px; border: 0; background: #ccc; }
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .header-info{ text-align: center;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .header-info .popup--header-info{ color: #fff; background: #4e98af; padding: 1px;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .header-info img{width: 190px; margin: 0 auto;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .header-info .popup--header-info h2{    margin: 20px 0 20px;
    font-size: 25px; line-height: 35px; text-transform: uppercase;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .contents-info{padding: 10px 15px 20px; height: 140px; text-align: center;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .contents-info .icon{width: 36px !important; display: block; margin: 10px auto; height: }
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .contents-info .empty-black-bag{display: inline-block; margin: 9px 0; height: 20px; height: 1.25rem; width: 20px; width: 1.25rem; content: ""; text-indent: -99999px;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .footer-wrapper{padding: 30px 15px 20px;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .footer-wrapper ul{list-style-type: square; list-style-position: outside;padding-left: 15px; line-height: 1.5; padding-bottom: 25px;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .footer-wrapper h3{margin-bottom: 10px;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .footer-wrapper ul li{ margin-bottom: 6px;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .footer-wrapper a{text-decoration: underline;}
    #afterpay--popup--container .pdp-popup--cover .afterpay-info .afterpay-close{position: absolute; top: 5px; right: 5px; height: 41px; width: 41px;  cursor: pointer; font-size:28px; color: #a8a8a8; }
    .afterpay-btn--new{width: 100% !important; max-width: 360px; background: #d0021b !important; border: 2px solid #d0021b !important;}
    .afterpay-btn--new:hover{background: #ffffff !important; color:#d0021b !important; }
    @media only screen and (max-device-width: 767px){
        #afterpay--popup--container .col-sm-6{width: 100%;}
        .afterpay-btn--new{width: 100% !important; max-width: 850px;}
        .afterpay-tab--box{padding-bottom: 15px !important;}
    }
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait){
        #afterpay--popup--container .col-sm-6{width: 50%;}
        .afterpay-btn--new{width: 100% !important; max-width: 850px;}
        .checkout-focus .steps-bar .help-number .shipping-help{margin: 30px 5px 8px 10px !important;}
        .checkout-focus .steps-bar .help-number{float: left !important; width: 100% !important;}
        .checkout-focus .steps-bar .help-number .shipping-help{padding-right:2%;margin:0 0 15px !important;float:left;padding-left:24px}
        .pdp-info-popup--cover,  .payment-info-popup--cover a{padding: 0px 4px;}
    }
    .fa-times-thin:before {
    content: '\00d7';
}

 .info-popup--cart{background: #fff; padding:10px !important;}
 .pdp-info-popup--cover #cart--popup--cover{margin-bottom: 10px; font-size: 14px !important; line-height: 20px !important; font-family: BureauGrotesque1,Arial,Helvetica,sans-serif; color: #000000; word-spacing: 3px;}
  .payment-info-popup--cover #cart--popup--cover{margin-bottom: 0px; margin-top: 5px; margin-left: 5px; font-size: 14px !important; line-height: 20px !important; font-family: BureauGrotesque1,Arial,Helvetica,sans-serif; color: #000000; word-spacing: 3px;}
/* After Pay CSS Close */
</style>

<div id="afterpay--popup--container" style="display:none;">
    <div class="pdp-popup--cover">
        <div class="afterpay-info">
            <div class="row">
                <div class="col-md-12 header-info">
                    <img src="/images/after-pay--logo.png">
                    <div class="popup--header-info">
                    <h2>Shop now.  Pay later. Interest-free</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 contents-info">
                    <img src="/images/afterpay-icon1.png" class="icon">
                    <h3>Pay in 4 instalments</h3>
                    <p>Pay for your order in equal fortnightly payments</p>
                </div>
                <div class="col-md-3 col-sm-6 contents-info">
                    <img src="/images/afterpay-icon2.png" class="icon">
                    <h3>Get your items now</h3>
                    <p>Your order will be shipped now, just like a normal order</p>
                </div>
                <div class="col-md-3 col-sm-6 contents-info">
                    <img src="/images/afterpay-icon3.png" class="icon">
                    <h3>Nothing extra to pay</h3>
                    <p>No interest, no additional fees if you pay on time<sup>*</sup></p>
                </div>
                <div class="col-md-3 col-sm-6 contents-info">
                       <img src="/images/afterpay-icon4.png" class="icon">
                    <h3>Spend up to $1000</h3>
                    <p>You can use Afterpay for orders up to $1000</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-6 footer-wrapper">
                    <h3>All you need is</h3>
                    <ul>
                        <li>An Australian debit or credit card</li>
                        <li>To be over 18 years of age</li>
                        <li>To live in Australia</li>
                    </ul>
                    <h3>To use this service</h3>
                    <ul>
                        <li>Add your items to your bag and checkout as normal</li>
                        <li>In checkout select Afterpay as your payment method</li>
                        <li>Enter your details with Afterpay and you're done!</li>
                        <li>Your payment schedule will be emailed to you</li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 footer-wrapper">
                    <h3>Other things to note</h3>
                    <ul>
                        <li>
                            Afterpay is available on online orders between $100 and $1000.
                        </li>
                        <li>
                            The funds for the first payment will need to be available at the time of checkout. If you are a new Afterpay customer, the first
                            payment will be made at the time of purchase, with payments over the next 6 weeks. Once you have been an Afterpay
                            customer for at least 6 weeks for all orders under $500. your first payment is made in 14 days, with final payment in 8 weeks.
                        </li>
                        <li>
                            If you wish to return your items you can choose an exchange, or the payment plan can be cancelled.
                        </li>
                        <li>
                            <sup>*</sup>If you fail to make payment. you will be charged a late payment fee of $10 with a further $7 fee added 7 days later if the payment is still unpaid.
                        </li>
                    </ul>
                    <p>
                        <a href="https://www.afterpay.com/en-AU/terms-of-service" target="_blank" rel="noopener" class="ga-track-link-click" data-ga-category="AFTERPAY" data-ga-action="Click external T and C" data-ga-label="Modal">
                            For full terms and conditions please visit Afterpay
                        </a>
                    </p>
                </div>
            </div>
            <p class="afterpay-close" id="afterpay-close--popup"><i class="fa fa-times-thin fa-2x"></i></p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.afterpay-info--popup').click(function(){
            //console.log("hi");
            $('#afterpay--popup--container').show();
        });
        
        $('#afterpay-close--popup').click(function(){
            $('#afterpay--popup--container').hide();
        });
    });

</script>   