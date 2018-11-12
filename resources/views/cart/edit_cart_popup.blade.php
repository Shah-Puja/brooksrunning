@php $cart_items = $cart_items[0]; @endphp
@php //echo "<pre>";print_r($cart_items); @endphp
<div class="popup-container--wrapper">
    <div class="popup-container--info">
        <div class="close-me"><span class="icon-close-icon edit-cart--close"></span></div>
        <div class="clearfix">
            <div class="col-12">
                <h3 class="br-heading">{{ $cart_items->variant->product->stylename }}</h3>
            </div>
        </div> 
        <div class="clearfix">
            <div class="col-7">
                <div class="img-wrapper"> 
                    <img src="{{$cart_items->variant->product->image->image1Large()}}" alt="">
                </div>
            </div>
            <div class="col-5">
                <div class="product-info">
                    <div class="price"> @if($cart_items->price_sale == 0 || $cart_items->price_sale==$cart_items->price)
										&dollar;{{ number_format($cart_items->price, 2) }}
										 @endif
								@if (($cart_items->price_sale > 0) && ($cart_items->price_sale < $cart_items->price))
										<del>&dollar;{{ number_format($cart_items->price, 2) }}</del> 
								&dollar;{{ number_format($cart_items->price_sale, 2) }} 
								@endif</div>
                    <div class="style">Style #{{$cart_items->style}}</div>
                    <div class="category">{{ $cart_items->h2 }}</div>
                    <div class="info" id="info-more">{{$cart_items->prod_desc}}</div>
                    <div class="swatches">
                        <ul>
                            <li class="selected"><img src="images/details/shoes/shoes1-swatches.jpg" alt=""></li>
                            <li><img src="images/details/shoes/shoes2-swatches.jpg" alt=""></li>
                            <li><img src="images/details/shoes/shoes1-swatches.jpg" alt=""></li>
                            <li><img src="images/details/shoes/shoes2-swatches.jpg" alt=""></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-wrapper size">
                                <label for="" class="main">SIZE(US)</label>
                                <div class="custom-select">
                                    <div class = "select-box">
                                        <div class = "label-heading">
                                            <span class="text">-</span> 
                                            <div class="sel-icon">
                                                <span class="icon-down-arrow"></span>
                                            </div>
                                        </div>
                                        <ul class="select-option--wrapper">
                                            <li class="option-value" value="">-</li>
                                            <li class="option-value" value="">Normal</li>
                                            <li class="option-value" value="">Wide 2L</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-wrapper size">
                                <label for="" class="main">WIDTH</label>
                                <div class="custom-select">
                                    <div class = "select-box">
                                        <div class = "label-heading">
                                            <span class="text">-</span> 
                                            <div class="sel-icon">
                                                <span class="icon-down-arrow"></span>
                                            </div>
                                        </div>
                                        <ul class="select-option--wrapper">
                                            <li class="option-value" value="">-</li>
                                            <li class="option-value" value="">Normal</li>
                                            <li class="option-value" value="">Wide 2L</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="quantity-wrapper size">
                                <div class="input-wrapper">
                                    <label class="main" for="">QUANTITY</label>
                                    <div class="quantity-selector" id="quantity-selector">
                                        <input type="button" value="-" id="subs"/>
                                        <input type="text" id="noOfRoom" value="1" name="noOfRoom" />
                                        <input type="button" value="+" id="adds"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button">
                        <a href="#" class="primary-button">Update Cart</a>
                    </div>
                    <div class="view-more-info"><a href="/{{$cart_items->variant->product->seo_name}}/{{$cart_items->variant->product->style}}_{{$cart_items->variant->product->color_code}}.html">View full details</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(".edit-cart--close").click(function () {
        $("#edit-cart--popup").removeClass("show");
    });
</script>