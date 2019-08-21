@extends('customer.layouts.master')

@section('content')
@php $checked = 'checked = "checked"'; @endphp
<section class="wrapper cart-breadcrumb--header">
    <div class="row hidden-xs">
        <div class="col-9">
            <div class="cart-header--step">
                <ul>
                    <li class="step">Step 1 of 3 </li>
                    <li class="active">1. Checkout</li>
                    <li>2. Shipping &amp; Billing</li>
                    <li>3. Payment</li>
                </ul>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</section>
<section class="cart-container wrapper">
    <div class="row">
        <div class="col-9 tab-8">
            <div class="cart-left--container">
                <div class="heading">
                    <h3 class="br-heading">Shopping Cart</h3>
                     <span class="offer">Free shipping on orders over $50 Australia wide.</span>
                </div>
                @if(!empty($cart))
                <button class="pdp-button pdp-proceed-mob proceed-to-purchase visible-mob" onclick="window.location.href = '/shipping'">Proceed to purchase</button> 
                @endif
                <div class="shopping-heading">
                    <div class="row">
                        <div class="col-6 hidden-tab hidden-mob"><p>Product</p></div>
                        <div class="col-2 hidden-tab hidden-mob"><p>Quantity</p></div>
                        <div class="col-4 hidden-tab hidden-mob"><p>Price</p></div>
                    </div>
                </div>
                <div class="shoppingcart-wrapper ajax_cart">
                    @include('cart.ajaxcartproductinfo')
                </div>
                <div class="shopping-del-wrapper">
                    <div class="shopping-delevery--option">
                        <div class="tab-vertical">
                            <input id="tab-one" type="checkbox" class="tab-checkbox" name="tabs">
                            <div class="tab-header">
                                <label for="tab-one" class="bold-font">
                                    <h3 class="br-heading bold-font">Delivery Options</h3>
                                    <span class="icon-top-arrow"></span>
                                </label>
                            </div>
                            <div class="tab-content delivery-option">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="br-heading heading-main">Select a Delivery Option</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="standard" name="d-options" {{(isset($cart->delivery_type) && $cart->delivery_type == 'standard') ? $checked : ''}} value="standard">
                                                <label for="standard">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text cart-mark">
                                                        <h3 class="bold-font">Standard Delivery</h3>
                                                        <p class="area">Australia</p>
                                                        <p class="rate">$10 or <span>FREE for orders over $50</span></p>
                                                        <p class="day">2-10 business Days<sup>*</sup></p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="express" name="d-options" {{(isset($cart->delivery_type) && $cart->delivery_type == 'express') ? $checked : ''}} value="express">
                                                <label for="express">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text cart-mark">
                                                        <h3 class="bold-font">Express Delivery</h3>
                                                        <p class="area">(Australia Only)</p>
                                                        <p class="rate">$15 flat rate</span></p>
                                                        <p class="day">1-3 business days to Australian metro areas<sup>*</sup></p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-wrapper">
                                            <div class="radio-inline">
                                                <input type="radio" id="new_zealand" name="d-options"  {{(isset($cart->delivery_type) && $cart->delivery_type == 'new_zealand') ? $checked : ''}}  value="new_zealand">
                                                <label for="new_zealand">
                                                    <div class="mark"><span></span></div>
                                                    <div class="text cart-mark">
                                                        <h3 class="bold-font">Standard Delivery</h3>
                                                        <p class="area">New Zealand</p>
                                                        <p class="rate">$25 flat rate</span></p>
                                                        <p class="day">2-10 business days<sup>*</sup></p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shopping-delevery--option">
                        <div class="tab-vertical"> 
                            @if(isset($cart->gift_id) && $cart->gift_id!="") 
                            <input id="tab-two" type="checkbox" class="tab-checkbox" name="tabs" checked>
                            @elseif(isset($cart->promo_string) && $cart->promo_string != "")
                            <input id="tab-two" type="checkbox" class="tab-checkbox" name="tabs" checked>
                            @else
                            <input id="tab-two" type="checkbox" class="tab-checkbox" name="tabs">
                            @endif
                            <div class="tab-header">
                                <label for="tab-two" class="bold-font">
                                    <h3 class="br-heading bold-font">Gift Voucher or Promotion code</h3>
                                    <span class="icon-top-arrow"></span>
                                </label>
                            </div>
                            <div class="tab-content delivery-option">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="br-heading heading-main">Do you have a Gift Voucher or Promotion Code?</h3>
                                    </div>
                                </div>
                               
                                <div class="coupon-msg" style="font-size: 13px;margin-bottom: 15px;">Gift Vouchers can not be redeemed in conjunction with any promotional offers</div>
                                
                                @if(isset($cart->gift_id) && $cart->gift_id!="") 
                                    <div class="coupon-msg" style="float: right;margin-right: 31px;"> Promotional offers can not be used with gift vouchers </div>
                                @endif 
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-wrapper {{(isset($cart->promo_string) && $cart->promo_string != '')?'disabled':''}} ">
                                            
                                                <div class="radio-inline">
                                                    <input type="radio" id="gift_voucher" name="promotion" {{(isset($cart->gift_id) && $cart->gift_id!='0.00' && $cart->gift_id > '0.00')? 'checked':''}}>
                                                    <label for="gift_voucher">
                                                        <div class="mark"><span></span></div>
                                                        <div class="text cart-mark">
                                                            <form name="check_valid_gift_voucher" id="ajaxgift"> 
                                                            <h3 class="bold-font">Gift Voucher</h3> 
                                                            @php $display = "";
                                                            $display_link = "";
                                                            if(isset($cart->gift_id) && $cart->gift_id!="0.00" && $cart->gift_id > "0.00") {
                                                            $display = "display:block";
                                                            $display_link = "display:none";
                                                            } 
                                                            else{
                                                            $display = "display:none";
                                                            $display_link = "display:block";
                                                            } 
                                                            @endphp


                                                            <a style="{{ $display }}" id="voucher_number_link" href="javascript:void(0);" class="remove_gift">{{ isset($cart->gift_id) ? $cart->gift_id : ""}}</a>
                                                            <input type="hidden" name="gift_voucher_number" id="gift_voucher_number" value="{{ isset($cart->gift_id) ? $cart->gift_id : ""}}">



                                                            <div class="show_gift_vouchers" style="{{ $display_link }}">
                                                                <input type="text" id="voucher_number" name="voucher_number" class="gift-input" placeholder="Voucher Number">
                                                                <input type="text" id="voucher_pin" name="voucher_pin" class="gift-input" placeholder="Voucher Pin">
                                                                <p class="show_voucher_error" style="color:red;"></p>
                                                                <button id="gift_voucher_validate" class="pdp-button">Apply</button>
                                                            </div>
                                                             </form>
                                                        </div>
                                                    </label>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                            <div class="input-wrapper {{(isset($cart->gift_id) && $cart->gift_id!='0.00' && $cart->gift_id > '0.00')? 'disabled':''}}">
                                                <div class="radio-inline">
                                                    <input type="radio" id="promotion" name="promotion" {{(isset($cart->promo_string) && $cart->promo_string != '')? 'checked':''}}>
                                                    <label for="promotion">
                                                        <div class="mark"><span></span></div>
                                                        <div class="text cart-mark">
                                                            <h3 class="bold-font">Promotion Code</h3>
                                                            @if (isset($cart->promo_string) && $cart->promo_string != "") 
                                                        <form action='cart/removecoupon' method="post" name="dwfrm_cart" id="ajaxremovecoupon"> 
                                                            @csrf
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2" style="text-align:left;">
                                                                        <a href="#" class="remove_coupon">
                                                                            <?php
                                                                            if (isset($cart->promo_string) && $cart->promo_string != "") {
                                                                                echo $cart->promo_string;
                                                                            }
                                                                            ?>
                                                                        </a>
                                                                        @if(isset($cart->subcode_text) && $cart->subcode_text!="")
                                                                                   <p style="color:red;"> {{ $cart->subcode_text }} </p>
                                                                               @endif
                                                                        @if(isset($cart->promo_display_text) && $cart->promo_display_text!="")
                                                                                   <p> {{ $cart->promo_display_text }} </p>
                                                                               @endif
                                                                    </td>
                                                                <input type="hidden" name="coupon_code" id="coupon_code" value="{{ (!empty($cart->promo_code)) ? $cart->promo_code : '' }}">
                                                                </tr>
                                                                </tr>
                                                            </table>
                                                            </form>   
                                                             @endif

                                                              @if (empty($cart) || $cart->promo_string =="") 
                                                        <form action="cart/couponvalidate" method="post" name="dwfrm_cart" id="ajaxcoupon">
                                                            @csrf
                                                            <input type="text" id="promo_code" name="promo_code" class="gift-input" placeholder="Discount Code">
                                                            <p class="confirm-coupon" style="color:red;"></p>
                                                            <button id="promo_code_validate" class="pdp-button">Apply</button>
                                                            </form>   
                                                            @endif  
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-right--container footer-order">
                    <div class="row">
                        <div class="col-7"></div>
                        <div class="col-5">
                            <div class="order order_summary">
                                @include('cart.order_summary') 
                            </div>
@if(!empty($cart))
<button class="proceed-to-purchase pdp-button" onclick="window.location.href = '/shipping'">Proceed to purchase</button>
@else
<button class="proceed-to-purchase pdp-button" onclick="window.location.href = '/cart'">Proceed to purchase</button>
@endif
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 tab-4">
            <div class="cart-right--container">
            @if(!empty($cart))
                <button class="proceed-to-purchase pdp-button hidden-mob" onclick="window.location.href = '/shipping'">Proceed to purchase</button> 
            @else
                <button class="proceed-to-purchase pdp-button hidden-mob" onclick="window.location.href = '/cart'">Proceed to purchase</button> 
            @endif
                <div class="order hidden-mob order_summary">
                    @include('cart.order_summary')
                </div> 
                @include('cart.right_side')
            </div>
        </div>
    </div>

    <!---start of static popup-->
    <div id="edit-cart--popup" class="popup-container edit-cart--popup"> </div>
    <!---end of static popup-->
</section>




<script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ajaxgift input').focus(function(){
            $('#ajaxcoupon input').removeClass("needsfilled");
            $(".confirm-coupon").hide();
            $('#ajaxcoupon input[type=text]').val('');
            $(this).closest(".input-wrapper").find('input[name=promotion]').trigger('click');
            return false;
        });

        $('#ajaxcoupon input').focus(function(){
            $('#ajaxgift input').removeClass("needsfilled");
            $(".show_voucher_error").hide();
            $('#ajaxgift input[type=text]').val('');
            $(this).closest(".input-wrapper").find('input[name=promotion]').trigger('click');
            return false;
        });

        gift_required = ['voucher_number','voucher_pin'];
        $('#gift_voucher_validate').click(function () {
            $('#ajaxgift input,#ajaxcoupon input').removeClass("needsfilled");
            $(".show_voucher_error,.confirm-coupon").hide().text('');
            
            $(this).closest(".input-wrapper").find('input[name=promotion]').trigger('click');
            var show_error="";
            for (k = 0; k < gift_required.length; k++) {
                var input = $('#ajaxgift input[name="' + gift_required[k] + '"]');
                if (input.val() == "") {
                    var field_name = gift_required[k];
                    field_name = field_name.replace("_", " ");
                    show_error+=  field_name+' and ';
                    input.addClass("needsfilled");
                } else {
                    input.removeClass("needsfilled");
                }
            }
            if ($("#ajaxgift input").hasClass("needsfilled")) {
                show_error = show_error.substring(0, show_error.length - 5);
                $(".show_voucher_error").text("Please enter "+show_error).show();
                return false;
            }
            var voucher_number = $("#voucher_number").val();
            var voucher_pin = $("#voucher_pin").val();
                $.ajax({
                    url: "cart/check_valid_gift_voucher",
                    type: "POST",
                    data: {voucher_number: voucher_number, voucher_pin: voucher_pin},
                    success: function (result) {
                        if (result == "success") {
                            window.location.href = "/cart";
                            $('.show_voucher_error').html();
                            $('.show_gift_vouchers').hide();
                            $("#voucher_number_link").text(voucher_number);
                            $('#voucher_number_link').css('display', 'block');
                            $(".order_summary").load("cart/get_cart_order_total");
                        } else {
                            $('.show_voucher_error').html(result);
                            $('.show_voucher_error').show();
                        }
                    },
                    error: function () {
                        return false;
                    },
                    statusCode: {
                        419: function () {
                            window.location.href = "/cart";
                        }
                    }
                });
                return false;
            
        });

        $('.remove_coupon').click(function (e) {
            $("#ajaxremovecoupon").submit();
            $('.coupon-msg').css('display','none');
            e.preventDefault();
        });

        $('.remove_gift').click(function () {
            var gift_voucher_number = $('#gift_voucher_number').val();
            var url = "cart/remove_gift_voucher";
            $.ajax({
                url: url,
                method: "POST",
                data: {gift_voucher_number: gift_voucher_number},
                success: function (result) {
                    if (result == "success") {
                        window.location.href = "/cart"
                        //remove validation promo msg 
                        $('.coupon-msg').css('display','none');
                        var form = document.getElementById("ajaxcoupon");
                        var elements = form.elements;
                        for (var i = 0, len = elements.length; i < len; ++i) {
                            elements[i].readOnly = false;
                        }

                        //$('.show_gift_vouchers').show(); 
                        $(".show_gift_vouchers").fadeIn(200)
                        $('.remove_gift').hide();
                        $(".order_summary").load("cart/get_cart_order_total");
                    }
                },
                error: function () {
                    return false;
                },
                statusCode: {
                    419: function () {
                        window.location.href = "/cart";
                    }
                }
            });
        });

        $("#ajaxcoupon").submit(function (e){
            $('#ajaxgift input,#ajaxcoupon input').removeClass("needsfilled");
            $(".show_voucher_error,.confirm-coupon").text('').hide();
            $(this).closest(".input-wrapper").find('input[name=promotion]').trigger('click');
            var input = $("#promo_code");
            if (input.val() == "") {
                input.addClass("needsfilled");
                $(".confirm-coupon").text('Please enter discount code').show();
                return false;
            } else {
                input.removeClass("needsfilled");
            }
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax(
                    {
                        url: formURL,
                        type: "POST",
                        data: postData,
                        cache: false,
                        dataType: 'json',
                        statusCode: {
                            404: function () {
                                alert("page not found");
                            }
                        },
                        success: function (data, textStatus, jqXHR)
                        {
                            console.log(data);
                            if ($('#promo_code').val() == "") {
                                $('.confirm-coupon').html(data.msg).show();
                            }
                            if (textStatus == 'success') {
                                if (data.result == 'success') {
                                    window.location.assign(data.url);
                                }
                                if (data.result == 'fail') {
                                    $('.confirm-coupon').html(data.msg).show();
                                }
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            //if fails
                            console.log(errorThrown);
                            console.log(textStatus);
                            console.log(jqXHR);
                        }
                    });
           
            e.preventDefault(); //STOP default action
        });



        var checked_delivery_option = $("input:radio[name='d-options']:checked").val();

        $("input:radio[name='d-options']").click(function () {
            var overlay = $('<div id="overlay"> </div>');
            overlay.appendTo(document.body);
            var delivery_option_value = $("input:radio[name='d-options']:checked").val();
            var url = "cart/update_delivery_option";

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: "POST",
                data: {delivery_option_value: delivery_option_value},
                success: function (result) {
                    $(".order").load("cart/get_cart_order_total");
                    $("#overlay").remove();
                },
                error: function () {
                    return false;
                }
            });
        });
    });
@if(isset($cart->promo_string) && $cart->promo_string != "")
        var form = document.getElementById("ajaxgift");
        var elements = form.elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].readOnly = true;
        }
@endif

@if(isset($cart->gift_id) && $cart->gift_id!="0.00" && $cart->gift_id > "0.00")
var form = document.getElementById("ajaxcoupon");
        var elements = form.elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].readOnly = true;
        }
@endif
</script>
@endsection



<style>
    .remove_coupon,.remove_gift{
        background: url(../images/compareremove.png) no-repeat;
        padding-left: 22px;
        font-weight: normal;
    }
    .coupon-msg{color: #ff0000;}
</style>