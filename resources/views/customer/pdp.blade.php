@extends('customer.layouts.master')

@section('gtm-datalayer')
    'pagetype': 'PDP',
    'product_id': '{{ $product->style }}',
    'product_rrp': {{ @number_format($product->price, 2) }},
    'product_price': {{ @number_format($product->price_sale, 2) }}
@endsection

@section('content')

<style>
.width-disable{
    background-color: #f1f1f1;
    color: #dedcda;
} 
@if($product->video!='')
.pdp-container--image .pdp-zoom--container .lSSlideOuter .lSPager.lSGallery li:last-child img{opacity:0.5;}
@endif
</style>

<div id="data-load">
    <div class="pdp-container">
        <div class="wrapper">
            <div class="row">
                <div class="col-7">
                    <div class="breadcrumbs2 visible-mob visible-tab">
                        <ul>
                            <li>
                                <a href="/">Home</a>
                            </li>
                            @if ($product->gender=='M' or $product->gender=='W')
                            <li>
                                   @switch($product->gender)
                                        @case('M')
                                           @php  $gender_type ="mens"; @endphp
                                        <a href="/mens-running-shoes-and-clothing">Men's</a>
                                        @break
                                        @case('W')
                                            @php $gender_type ="womens"; @endphp
                                        <a href="/womens-running-shoes-and-clothing">Women's</a>
                                        @break
                                    @endswitch
                            </li>
                            <li>
                                    @if (strtolower($product->flag_bra) =='yes')
                                        <a href="/womens-sports-bras">Sports Bras</a>
                                    @elseif(strtolower($product->prod_type) =='footwear')
                                         <a href='/{{$gender_type}}-running-shoes'>Running Shoes</a>
                                    @else 
                                         <a href="/{{$gender_type}}-running-clothes">Running Clothing</a>
                                    @endif
                            </li>
                            @endif
                            <li>
                                <a href="javascript:void(0)" class="active">{{ strip_tags($product->stylename) }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pdp-container--image">
                        <div class="zoomwindowfull-icon  hidden-mob" id="zoomWindowFullShowIn" onclick="launchFullscreen(document.getElementById('zoomWindowFullShow'));">
                            <span class="icon-enlarge2"></span>
                        </div>
                        <div class="pdp-zoom--container" id="zoomWindowFullShow">
                            <div class="zoomwindowfull-icon display-none" id="zoomWindowFullShowOut" onclick="exitFullscreen();">
                                <span class="icon-enlarge"></span>
                            </div>
                            <ul id="pdp-zoom--image">
                                <li data-video='' data-thumb="{{ $product->image->image1Thumbnail() }}" data-src="{{ $product->image->image1Large() }}" data-zoomsrc="{{ $product->image->image1Zoom() }}">
                                    <img src="{{ $product->image->image1Large() }}"/>
                                </li>
                                
                                 @for ($i = 2; $i < 10; $i++)
                                    @if ($product->image->{'image' . $i} != null)
                                    <li data-video='' data-thumb="{{ $product->image->{ 'image'.$i.'Thumbnail' }() }}"  data-src="{{ $product->image->{ 'image'.$i.'Large' }() }}" data-zoomsrc="{{ $product->image->{ 'image'.$i.'Zoom' }()  }}">
                                        <img src="{{ $product->image->{ 'image'.$i.'Large' }() }}" />
                                    </li>
                                    @endif
                                @endfor
                                
                                @if($product->video!='')
                       
                                <li data-video='{{$product->video}}' data-thumb="http://i3.ytimg.com/vi/{{$product->video}}/sddefault.jpg" data-src="" data-zoomsrc="">
					                <div class="videowrapper video_wrapper_full js-videoWrapper">
                                        <!-- <iframe width="670" height="447" src="https://www.youtube.com/embed/{{$product->video}}" allowfullscreen="" frameborder="0">
                                        </iframe> -->
                                        <!-- <iframe class="videoIframe js-videoIframe" src="https://www.youtube.com/embed/{{$product->video}}" frameborder="0"  allowfullscreen="" ></iframe> -->
                                       
                                            <button class="videoPoster js-videoPoster" id="js-videoPoster" style="background-image:url('http://i3.ytimg.com/vi/{{$product->video}}/sddefault.jpg');"></button>
                                    </div>
                                    <div class="module-video" style="display:none;">
                                        <iframe class="br-video" id="video" src="https://www.youtube.com/embed/{{$product->video}}?enablejsapi=1&html5=1"  allowfullscreen></iframe>
                                    </div>
                                </li>
                                
                                @endif 
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="pdp-container--info">
                        <div class="breadcrumbs2 hidden-tab hidden-mob">
                            <ul> 
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                @if ($product->gender=='M' or $product->gender=='W')
                                <li>
                                    @switch($product->gender)
                                        @case('M')
                                           @php  $gender_type ="mens"; @endphp
                                        <a href="/mens-running-shoes-and-clothing">Men's</a>
                                        @break
                                        @case('W')
                                            @php $gender_type ="womens"; @endphp
                                        <a href="/womens-running-shoes-and-clothing">Women's</a>
                                        @break
                                    @endswitch
                                </li>
                                <li>
                                    @if (strtolower($product->flag_bra) =='yes')
                                        <a href="/womens-sports-bras">Sports Bras</a>
                                    @elseif(strtolower($product->prod_type) =='footwear')
                                         <a href='/{{$gender_type}}-running-shoes'>Running Shoes</a>
                                    @else 
                                         <a href="/{{$gender_type}}-running-clothes">Running Clothing</a>
                                    @endif
                                </li>
                                @endif
                                <li>
                                    <a href="javascript:void(0)" class="active">{{ strip_tags($product->stylename) }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offer-info">
                            <!--<span>NEW</span>-->
                            @if($product->price_sale < $product->price)
                                <span class="sale">SALE</span>
                            @endif
                        </div>
                        <div class="heading-wrapper clearfix">
                            <div class="heading">
                                <h1 class="br-heading">{{ strip_tags($product->stylename) }}</h1>
                            </div>
                            <div class="price">
                                @if($product->price_sale < $product->price)
                                <del><span class="black">&dollar;{{ $product->price }}</span></del>
                                <span class="red">&dollar;{{ $product->price_sale }}</span>
                                @else
                                <span lass="black">&dollar;{{ $product->price }}</span>
                                @endif
                            </div>
                        </div>
                        @php $show_afterpay_prod_price = ''; @endphp
                        @if($product->price < 1000 || $product->price_sale < 1000)
                            @if($product->price_sale!=0 && $product->price_sale!='' && $product->price_sale<$product->price)
                                @php $show_afterpay_prod_price = number_format(($product->price_sale/4), 2); @endphp
                            @else
                                @php $show_afterpay_prod_price = number_format(($product->price/4), 2); @endphp
                            @endif
                            <div class="afterpay">
                                <span>or 
                                4 payments of ${{ $show_afterpay_prod_price }} with <img src="/images/payment-afterpay--black.png" alt=""> <a href="JavaScript:Void(0);" class="afterpay-popup--control">info</a></span>
                            </div> 
                        @endif 
                        <!--afterpay popup -->
                        <div id="afterpay-popup--wrapper" class="popup-container afterpay--popup">
                            <div class="popup-container--wrapper">
                                <div class="popup-container--info">
                                    <div class="close-me"><span class="icon-close-icon afterpay-popup--close"></span></div>
                                    <div class="header-info">
                                        <img src="/images/afterpay_logo-colour.svg" alt="">
                                        <h3 class="br-heading">Shop now. Wear now. Pay later. Interest-free</h3>
                                    </div>
                                    <div class="afterpay-info clearfix">
                                        <div class="info-wrapper">
                                            <div class="icon" style="background: url(/images/icon-all-in-one-afterpay.png); background-position: -28px 4px;"></div>
                                            <p class="heading">Pay in 4 installments</p>
                                            <p class="text">Pay for your order in equal fortnightly payments</p>
                                        </div>
                                        <div class="info-wrapper">
                                            <div class="icon" style="background: url(/images/icon-all-in-one-afterpay.png); background-position: -31px -74px;"></div>
                                            <p class="heading">Get your items now</p>
                                            <p class="text">Your order will be shipped now, just like a normal order</p>
                                        </div>
                                        <div class="info-wrapper">
                                            <div class="icon" style="background: url(/images/icon-all-in-one-afterpay.png); background-position: -23px -152px;"></div>
                                            <p class="heading">Nothing extra to pay</p>
                                            <p class="text">No interest, no additional fees in you pay on time<sup>*</sup></p>
                                        </div>
                                        <div class="info-wrapper">
                                            <div class="icon" style="background: url(/images/icon-all-in-one-afterpay.png); background-position: -18px -251px;"></div>
                                            <p class="heading">Spend up to $1000</p>
                                            <p class="text">You can use Afterpay for orders up to $1000</p>
                                        </div>
                                    </div>
                                    <div class="footer-info clearfix">
                                        <div class="left-block">
                                            <p class="heading">
                                                Pay in 4 installments
                                            </p>
                                            <ul class="text">
                                                <li>An Australian debit or credit card</li>
                                                <li>To be over 18 years of age</li>
                                                <li> To live in Australia</li>
                                            </ul>
                                            <br/>
                                            <p class="heading">To use this service</p>
                                            <ul class="text">
                                                <li>Add your items to your bag and checkout as normal</li>
                                                <li>In checkout select Afterpay as your payment method</li>
                                                <li>Enter your details with Afterpay and you're done!</li>
                                                <li>Your payment schedule will be emailed to you</li>
                                            </ul>
                                        </div>
                                        <div class="right-block">
                                            <p class="heading">Other things to note</p>
                                            <ul class="text">
                                                <li>Repayments will need to be made fortnightly either over a 6 or 8 week period. Your payment schedule will be shown to you by Afterpay before you confirm your purchase.</li>
                                                <li>If you wish to return your items you can choose an exchange, or the payment plan can be cancelled.</li>
                                                <li>*If you fail to make payment, you will be charged a late payment fee of $10 with a further $7 fee added 7 days later if the payment is still unpaid.</li>
                                            </ul>
                                            <a href="https://www.afterpay.com/en-AU/terms-of-service" class="moreinfo">For full terms and conditions please visit Afterpay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/afterpay popup -->
                        <div class="category"> {!!strip_tags($product->h2)!!} </div>
                        @if( !empty($colour_options) && count($colour_options) > 0 )
                        <!-- Colour swatches -->
                        <div class="swatches">
                            <ul>
                                @foreach($colour_options as $color_data)
                                    @foreach($styles as $product_data)
                                        @if($product_data->color_code== $color_data->color_code)
                                                @php $colors_option[$color_data->color_code][] = $product_data; @endphp
                                        @endif
                                    @endforeach
                                    @php 
                                        $width_counts = collect($colors_option[$color_data->color_code])->transform(function ($product) {
                                                        return $product->variants->where('visible','Yes')->pluck('width_name');
                                                 })->flatten()->unique()->values();
                                    @endphp
                                <li><span>{{ (count($width_counts) > 1) ? 'WIDTHS' : '' }}</span><div @if($color_data->color_code == $product->color_code) class="selected" @endif data-url='/{{ $color_data->seo_name.'/'.$product->style.'_'.$color_data->color_code.'.html' }}'><img src="{{ $color_data->image->image1Thumbnail() }}" alt="{{ $color_data->color_name }}" title="{{ $color_data->color_code }}"></div></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end Colour swatches -->
                        @endif
                        <div class="color">
                            Colour: {{ $product->color_code }}
                        </div>
                        <div class="loaderContainer">
                            <div class="overlayloader">
                            <div class="imgloader"><img src="/images/ajax-loader.gif" alt=""></div>
                            </div>
                        </div>
                        @php $sizes = $width_names = []; @endphp
                        @foreach($variants as $variant) 
                            @php
                            $sizes[] = array('size'=> $variant['size'],'width'=> $variant['width_name'],'visible'=> $variant['visible'],'seqno'=> $variant['seqno']);
                            if($variant['width_name']!=""){
                                $width_names[$variant['width_code']]= $variant['width_name']; 
                            } 
                            @endphp
                        @endforeach
                        <form id="detail" action='' method='post' name='add_to_cart' onsubmit="return detail_validation();">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}"> 
                            @if(!empty($width_names))  
                            <div class="pdp-width pdp-width-title">
                                <div class="row">
                                    <div class="mob-6  width-wrapper">
                                        <div class="main">
                                          {{ ($product->gender == 'M') ? "MENS" : "WOMENS" }} WIDTH  <span></span>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div>
                                @php
                                    $order_array = array("2A-Narrow","B-Narrow", "B-Normal", "D-Normal", "D-Wide" , "2E-Wide", "2E-Extra-Wide", "4E-Extra-Wide");
                                    $sorted_array=array();
                                    foreach ($width_names as $key => $value) {		
                                        $curr_order=array_search($value, $order_array);
                                        $sorted_array[$key."_____".$value]=$curr_order;		
                                    } 
                                    asort($sorted_array);
                                    $width_names_orderby = array_keys($sorted_array);
                                @endphp
                                <div class="pdp-width">
                                    <ul class="pdp-width-show">
                                        @foreach($width_names_orderby as $key => $width_data)
                                            @php
                                                $width = explode("_____",$width_data);
                                                $width_code = (isset($width[0]) && $width[0]!='') ? $width[0] : '';
                                                $width_name = (isset($width[1]) && $width[1]!='') ? $width[1] : '';
                                            @endphp
                                            @if($width_name!='')
                                                <li data-value="{{ $width_code }}"  {{ (count($width_names) == 1) ? 'class=selected' : '' }}>{{ $width_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>   
                                <input type="hidden" name="width_code" value="" />
                            </div>
                            @endif

                            @if(!empty($sizes))
                            <div class="size info-wrapper-field">
                                <div class="row">
                                    <div class="mob-6">
                                        <div class="main">SIZE @if(strtolower($product->prod_type) =='footwear') (US) @endif<span></span></div>
                                    </div>
                                    <div class="mob-6">
                                        <div class="main size-chart">
                                        <a href="JavaScript:Void(0);" id="sizechart-popup--control">Size Chart</a>
                                        @if (strtolower($product->flag_bra) =='yes')
                                        <a href="JavaScript:Void(0);" id="expertadv-popup--control">Expert Advice</a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <ul class="size-show">
                                 @php $sizes = collect($sizes)->sortByDesc('visible')->unique('size'); @endphp
                                    @foreach($sizes->sortBy('seqno') as $size)
                                       @if($size['size']!='')
                                        <li @if($size['visible']=='No') class="disable" @endif  data-width='{{  $size['width'] }}' data-value='{{ $size['size'] }}' >{{ $size['size'] }}</li>
                                       @endif
                                    @endforeach
                                </ul>
                            </div> <!-- end size -->
                            <input type="hidden" name="size" value="" />
                            @endif
                            
                            <!--   <div class="row select-width">
                            @if(!empty($width_names))
                            <div class="col-4">
                                <div class="input-wrapper width-wrapper">
                                    <label for="" class="main"> {{ ($product->gender == 'M') ? "MENS" : "WOMENS" }} WIDTH <span></span></label>
                                    <!already commented <div class="custom-select">
                                        <div class = "select-box">
                                            <div class = "label-heading">
                                                <span class="text">-</span> 
                                                <div class="sel-icon">
                                                    <span class="icon-down-arrow"></span>
                                                </div>
                                            </div>
                                            <ul class="select-option--wrapper">
                                                @if(count($width_names) > 1)
                                                    <li class="option-value-data " data-value="">-</li>
                                                @endif
                                                @foreach($width_names as $width_code => $width_name)
                                                @if($width_name!='')
                                                    <li class="option-value-data {{ (count($width_names) == 1) ? 'selected' : '' }}" data-value="{{ $width_code }}" >{{ $width_name }}</li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> already commented-->
                                    <!-- Select already commented-->
                                    <!-- <div class="input-wrapper">
                                        <select class="pdp-select-field" name="custom_width" id="custom_width" style="margin-bottom: 0px;">
                                                @if(count($width_names) > 1)
                                            <option class="option-value" data-value="" value="">Select Width</option>
                                            @endif
                                            @foreach($width_names as $width_code => $width_name)
                                                @if($width_name!='')
                                                    <option class="option-value" data-value="{{ $width_code }}"  value="{{ $width_code }}" {{ (count($width_names) == 1) ? 'selected' : '' }}>{{ $width_name }}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        </div> -->
                                        <!-- /Select already commented-->
                                <!-- </div>
                            </div>
                            <input type="hidden" name="width_code" value="" />
                            @endif -->

                            <div class="row">
                            <div class="col-6">
                                    <div class="quantity-wrapper info-wrapper-field">
                                        <div class="input-wrapper">
                                            <label class="main" for="">QUANTITY <span></span></label>
                                            <div class="quantity-selector" id="quantity-selector">
                                                <input type="button" value="-" id="subs"/>
                                                <input type="text" id="noOfRoom" value="1" name="qty" />
                                                <input type="button" value="+" id="adds"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             
                            <div class="button">
                                <button type="submit" class="pdp-button">Add to Cart</button>
                            </div>
                        </form>
                    </div>
                    
                    @include('customer.medibank.medibank_pdp')
                    @if(auth()->user() && auth()->user()->loyalty_type== 'PPP')
                        @include('customer.layouts.loyalty-pdp')
                    @endif
                    <div class="pdp-container--offer">
                        <h3>Free Shipping on all orders over $50. Australia Wide</h3>
                        <ul>
                            <li>
                                <a href="/shoefinder">Find a store</a>
                            </li>
                            <li>
                                <a href="/info/shipping-information">Shipping Information</a>
                            </li>
                            <li>
                                <a href="/info/contact-us">Contact us</a>
                            </li>
                        </ul>
                        <p>We deliver to Australia and New Zealand only</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
         var variants = {!! $variants->toJson() !!};
    </script>
</div>
<div class="pdp-info--wrapper">
    <div class="wrapper">
        <div class="row">
            <div class="col-12 pdp-info">
                <div class="content--top">
                    <svg id="icon-checklist" viewBox="0 0 25 32" width="100%" height="100%">
                    <title>checklist</title>
                    <path fill="#fff" style="" d="M9.828 7.56c-1.925 0-3.491-1.561-3.491-3.499s1.566-3.499 3.491-3.499h5.608c1.925 0 3.491 1.561 3.491 3.499s-1.566 3.499-3.491 3.499h-5.608z"></path>
                    <path fill="#fff" style="" d="M23.579 24.951c0 2.343-1.885 4.242-4.211 4.242h-13.474c-2.325 0-4.211-1.899-4.211-4.242v-18.027c0-2.343 1.885-4.242 4.211-4.242h13.474c2.325 0 4.211 1.899 4.211 4.242v18.027z"></path>
                    <path fill="#0363f8" style="" d="M6.054 4.782c-1.045 0-1.895 0.856-1.895 1.909v17.989c0 1.053 0.85 1.909 1.895 1.909h13.578c1.045 0 1.895-0.856 1.895-1.909v-17.989c0-1.052-0.85-1.909-1.895-1.909h-13.578zM19.633 27.862h-13.578c-1.741 0-3.158-1.427-3.158-3.181v-17.989c0-1.754 1.417-3.181 3.158-3.181h13.578c1.741 0 3.158 1.427 3.158 3.181v17.989c0 1.754-1.416 3.181-3.158 3.181v0z"></path>
                    <path fill="#fff" style="" d="M15.436 2.327h-5.608c-0.993 0-1.806 0.819-1.806 1.82v0c0 1.001 0.813 1.819 1.806 1.819h5.608c0.993 0 1.806-0.819 1.806-1.819v0c0-1.001-0.813-1.82-1.806-1.82z"></path>
                    <path fill="#0363f8" style="" d="M9.828 2.963c-0.648 0-1.175 0.531-1.175 1.183s0.527 1.183 1.175 1.183h5.608c0.648 0 1.175-0.531 1.175-1.183s-0.527-1.183-1.175-1.183h-5.608zM15.436 6.602h-5.608c-1.344 0-2.438-1.102-2.438-2.456s1.093-2.456 2.438-2.456h5.608c1.344 0 2.438 1.102 2.438 2.456s-1.094 2.456-2.438 2.456v0z"></path>
                    <path fill="#fff" style="" d="M15.768 19.639c0.107 0.336 0.164 0.694 0.164 1.066 0 1.933-1.555 3.499-3.474 3.499s-3.474-1.567-3.474-3.499c0-1.933 1.555-3.499 3.474-3.499 0.419 0 0.821 0.075 1.193 0.212z"></path>
                    <path fill="#0363f8" style="" d="M12.459 24.84c-2.264 0-4.105-1.855-4.105-4.136s1.842-4.136 4.105-4.136c0.484 0 0.959 0.084 1.41 0.25 0.328 0.121 0.496 0.486 0.376 0.816s-0.483 0.5-0.81 0.379c-0.312-0.115-0.64-0.173-0.976-0.173-1.567 0-2.842 1.284-2.842 2.863s1.275 2.863 2.842 2.863c1.567 0 2.842-1.284 2.842-2.863 0-0.298-0.045-0.592-0.134-0.873-0.106-0.335 0.077-0.693 0.41-0.8 0.331-0.107 0.687 0.078 0.793 0.413 0.129 0.406 0.194 0.83 0.194 1.26 0 2.28-1.842 4.136-4.105 4.136z"></path>
                    <path fill="#0363f8" style="" d="M12.285 22.631c-0.167 0-0.328-0.066-0.447-0.186l-1.265-1.274c-0.247-0.248-0.247-0.651 0-0.9s0.646-0.249 0.893 0l0.724 0.729 1.602-2.386c0.196-0.291 0.588-0.368 0.877-0.171s0.365 0.592 0.169 0.884l-2.031 3.025c-0.106 0.157-0.275 0.259-0.463 0.277-0.020 0.002-0.040 0.003-0.060 0.003z"></path>
                    <path fill="#0363f8" style="" d="M18.947 9.496h-12.632c-0.349 0-0.632-0.285-0.632-0.636s0.283-0.636 0.632-0.636h12.632c0.349 0 0.632 0.285 0.632 0.636s-0.283 0.636-0.632 0.636z"></path>
                    <path fill="#0363f8" style="" d="M18.947 12.218h-12.632c-0.349 0-0.632-0.285-0.632-0.636s0.283-0.636 0.632-0.636h12.632c0.349 0 0.632 0.285 0.632 0.636s-0.283 0.636-0.632 0.636z"></path>
                    <path fill="#0363f8" style="" d="M18.947 14.939h-12.632c-0.349 0-0.632-0.285-0.632-0.636s0.283-0.636 0.632-0.636h12.632c0.349 0 0.632 0.285 0.632 0.636s-0.283 0.636-0.632 0.636z"></path>
                    </svg>
                </div>
                <div class="row info-wrapper cust-grid">
                    @if($product->prod_desc!='')
                    <div class="info--left tab-6">
                        <h3 class="br-heading">Product Description</h3>
                        <p class="br-info">
                        {!! html_entity_decode(strip_tags($product->prod_desc)) !!}</p>
                        

                        @php  $prod_desc_bullet_points = (!empty($product->prod_desc_bullet_points)) ? explode('#', $product->prod_desc_bullet_points) : ''; @endphp

                        @if(!empty($prod_desc_bullet_points))
                        <!--<h3 class="br-heading">What’s New</h3>-->
                        <ul class="br-info">
                            @foreach($prod_desc_bullet_points as $bullet_point)
                            @if ($bullet_point != '')
                            <li>
                                {{ $bullet_point }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endif
                    @php  
                        $specification_info = (!empty($product->specifications)) ? explode('#', $product->specifications) : ''; 
                        $product_features = (!empty($product->product_features)) ? explode('#', $product->product_features) : '';
                        $fabric = (!empty($product->fabric)) ? $product->fabric : '';
                    @endphp
                   
                    @if(!empty($specification_info) || !empty($product_features) || !empty($fabric))
                    <div class="info--right tab-6">
                        @if(!empty($specification_info))
                        <div class="m-label-heading">
                            <h3 class="br-heading">Specs</h3>
                        </div>
                        <table class="table__specs">
                            <tbody>
                                @foreach($specification_info as $curr_specs)
                                    @if (trim($curr_specs) != '')
                                        @php
                                            $spec_arr = explode(':', $curr_specs);
                                            $spec_name = $spec_arr['0'];
                                            $spec_value = $spec_arr['1'];
                                        @endphp
                                    <tr class="specs__row">
                                        <td class="label--bold">
                                            <p>{{ $spec_name }}</p>
                                        </td>
                                        <td class="label--info">
                                            <p>{!! html_entity_decode($spec_value) !!}</p>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                         <br>
                        @endif
            
                        @if(!empty($product_features))
                            <h3 class="br-heading">Product Features</h3>
                            <table class="table__specs">
                                <tbody>
                                    @foreach(array_filter($product_features) as $key=>$product_feature)
                                        @if (!empty(trim($product_feature)))
                                            <tr class="specs__row">
                                                <td class="label--info">
                                                    <p style="text-align:left">{!! html_entity_decode($product_feature) !!} </p>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                        @endif
                        
                        @if(!empty(trim($fabric)))
                            <h3 class="br-heading">Fabric</h3>
                            <p class="br-info">{!! html_entity_decode($fabric) !!}</p>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if (strtolower($product->flag_bra) =='yes')
    @include('customer.pdp_bra_benefits')
@elseif(strtolower($product->prod_type) =='footwear')
    @include('customer.pdp_shoe_benefits')
@else 
    @include('customer.pdp_apparel_benefits')
@endif

@include('customer.medibank.medibank_pdp_disclaimer')
<!--
<section class="pdp-recommended-products">
        <div class="wrapper">
                <div class="row">
                        <div class="col-12">
                                <h3 class="br-heading">Recommended for you</h3>
                        </div>
                </div>
                <div class="row">
                        <div class="plp-wrapper-container">
                                <div class="mob-6 col-3 plp-wrapper__sub">
                                        <div class="plp-product">
                                                <div class="offer-info">
                                                        <span>NEW</span>
                                                        <span class="sale">SALE</span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="img img-shoes">
                                                                <img id="plp-img" src="/images/shoes/shoes1-listing.jpg" alt="">
                                                        </div>
                                                </a>
                                                <div class="more-color--container">
                                                        <span class="icon-style icon-back-arrow prev"></span>
                                                        <div class="owl-carousel owl-theme">
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                        </div>
                                                        <span class="icon-style icon-next-arrow next"></span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="info">
                                                                <h3>Adrenaline GTS 18</h3>
                                                                <div class="price">
                                                                        <span><strike>&dollar;89.95</strike></span>
                                                                        <span class="red">&dollar;89.95</span>
                                                                </div>
                                                                <div class="shoes-type">Women's Running Tops</div>
                                                        </div>
                                                        <div class="info-sub">
                                                                <div class="row">
                                                                        <div class="mob-6">
                                                                                <p>Neutral Speed</p>
                                                                        </div>
                                                                        <div class="mob-6">
                                                                                <p class="right">Width Available</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <div class="mob-6 col-3 plp-wrapper__sub">
                                        <div class="plp-product">
                                                <div class="offer-info">
                                                        <span>NEW</span>
                                                        <span class="sale">SALE</span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="img img-shoes">
                                                                <img id="plp-img" src="/images/shoes/shoes1-listing.jpg" alt="">
                                                        </div>
                                                </a>
                                                <div class="more-color--container">
                                                        <span class="icon-style icon-back-arrow prev"></span>
                                                        <div class="owl-carousel owl-theme">
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                        </div>
                                                        <span class="icon-style icon-next-arrow next"></span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="info">
                                                                <h3>Adrenaline GTS 18</h3>
                                                                <div class="price">
                                                                        <span><strike>&dollar;89.95</strike></span>
                                                                        <span class="red">&dollar;89.95</span>
                                                                </div>
                                                                <div class="shoes-type">Women's Running Tops</div>
                                                        </div>
                                                        <div class="info-sub">
                                                                <div class="row">
                                                                        <div class="mob-6">
                                                                                <p>Neutral Speed</p>
                                                                        </div>
                                                                        <div class="mob-6">
                                                                                <p class="right">Width Available</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <div class="mob-6 col-3 plp-wrapper__sub">
                                        <div class="plp-product">
                                                <div class="offer-info">
                                                        <span>NEW</span>
                                                        <span class="sale">SALE</span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="img img-shoes">
                                                                <img id="plp-img" src="/images/shoes/shoes1-listing.jpg" alt="">
                                                        </div>
                                                </a>
                                                <div class="more-color--container">
                                                        <span class="icon-style icon-back-arrow prev"></span>
                                                        <div class="owl-carousel owl-theme">
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                        </div>
                                                        <span class="icon-style icon-next-arrow next"></span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="info">
                                                                <h3>Adrenaline GTS 18</h3>
                                                                <div class="price">
                                                                        <span><strike>&dollar;89.95</strike></span>
                                                                        <span class="red">&dollar;89.95</span>
                                                                </div>
                                                                <div class="shoes-type">Women's Running Tops</div>
                                                        </div>
                                                        <div class="info-sub">
                                                                <div class="row">
                                                                        <div class="mob-6">
                                                                                <p>Neutral Speed</p>
                                                                        </div>
                                                                        <div class="mob-6">
                                                                                <p class="right">Width Available</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <div class="mob-6 col-3 plp-wrapper__sub">
                                        <div class="plp-product">
                                                <div class="offer-info">
                                                        <span>NEW</span>
                                                        <span class="sale">SALE</span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="img img-shoes">
                                                                <img id="plp-img" src="/images/shoes/shoes1-listing.jpg" alt="">
                                                        </div>
                                                </a>
                                                <div class="more-color--container">
                                                        <span class="icon-style icon-back-arrow prev"></span>
                                                        <div class="owl-carousel owl-theme">
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes2-swatches.jpg" data-big="/images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                          <div class="item">
                                                                 <img src="/images/shoes/shoes1-swatches.jpg" data-big="/images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
                                                          </div>
                                                        </div>
                                                        <span class="icon-style icon-next-arrow next"></span>
                                                </div>
                                                <a href="detail-shoes.php">
                                                        <div class="info">
                                                                <h3>Adrenaline GTS 18</h3>
                                                                <div class="price">
                                                                        <span><strike>&dollar;89.95</strike></span>
                                                                        <span class="red">&dollar;89.95</span>
                                                                </div>
                                                                <div class="shoes-type">Women's Running Tops</div>
                                                        </div>
                                                        <div class="info-sub">
                                                                <div class="row">
                                                                        <div class="mob-6">
                                                                                <p>Neutral Speed</p>
                                                                        </div>
                                                                        <div class="mob-6">
                                                                                <p class="right">Width Available</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                    </div>
                </div>
        </div>
</section>-->
<script>
 $(document).ready(function(){
    
    var custom_width = $(".pdp-width-show li").length;
    if(custom_width==1){
        var width_value = $(".pdp-width-show li:first").data("value");
        $("#detail input[name='width_code']").val(width_value);
     }else{
        var filterwidth = localStorage.getItem("filterwidth");
        if(filterwidth){
            filterwidth = filterwidth.replace(".", "").trim();
            if($(".pdp-width-show li:contains('"+filterwidth+"')").length > 0) {
                $(".pdp-width-show li:contains('"+filterwidth+"')").trigger("click");
            }
        }
     }
     //var width_name = target.text();
     //var width_code = target.data('value');
     //$(".width-wrapper").find(".label-heading .text").text(width_name);
     
 });
 /*$(document).on('click', '.size-show li:not(".disable")', function () {
    if ($(this).data('value') != '') {
        $(".size-show li").removeClass("selected");
        $(this).addClass("selected");
        var size_val = $(this).data('value');
        let data = $.grep( variants, function( n, i ) {
            if(n) return n['size']==size_val && n['visible']=='Yes';
         });
        $(".select-option--wrapper :not([data-value=''])").addClass("disable");
        for(i = 0; i< data.length; i++){
            $(".select-option--wrapper").find("[data-value='"+data[i]['width_code']+"']").removeClass("disable");
        }
        $("#detail input[name='size']").val(size_val);
    }
    return false;
});*/


$(document).on('click', '.size-show li:not(".disable")', function () {
    if ($(this).data('value') != '') {
        $(".size-show li").removeClass("selected");
        $(this).addClass("selected");
        var size_val = $(this).data('value');
        let data = $.grep( variants, function( n, i ) {
            if(n) return n['size']==size_val && n['visible']=='Yes';
         });
        $(".pdp-width-show").find("li:not([data-value=''])").addClass("width-disable");
        for(i = 0; i< data.length; i++){
            $(".pdp-width-show").find("[data-value='"+data[i]['width_code']+"']").removeClass("width-disable");
        }
        $("#detail input[name='size']").val(size_val);
    }
    return false;
});

/*$(document).on('click', '.width-wrapper li:not(".disable")', function (event) {
    let value = $(this).data('value');
    if(value!=''){
        $(".select-option--wrapper li").removeClass("selected");
        $(this).addClass("selected");
        $(this).parent().parent().find(".label-heading .text").html($(this).text());
        $(this).parent().slideUp("fast");
        $(this).parent().parent().find(".label-heading .sel-icon span").removeClass("icon-top-arrow");
        $(this).parent().parent().find(".label-heading .sel-icon span").addClass("icon-down-arrow");
        $("#detail input[name='width_code']").val(value);
        let data = $.grep( variants, function( n, i ) {
            if(n) return n['width_code']==value && n['visible']=='Yes';
            });
        $(".size-show li").addClass("disable");
        for(i = 0; i< data.length; i++){
            $(".size-show").find("[data-value='"+data[i]['size']+"']").removeClass("disable");
        }
    }
    event.stopPropagation();
});*/

$(document).on('click', '.pdp-width-show li', function () {
    let value = $(this).data('value');
    if($(this).hasClass('width-disable')){
        $(".size-show li").removeClass("selected");
        $("#detail input[name='size']").val("");
    }
    if(value!=''){
        $(".pdp-width-show li").removeClass("selected");
        $(this).removeClass("width-disable");
        $(this).addClass("selected");
        $("#detail input[name='width_code']").val(value);
        let data = $.grep( variants, function( n, i ) {
            if(n) return n['width_code']==value && n['visible']=='Yes';
            });
        $(".size-show li").addClass("disable");
        for(i = 0; i< data.length; i++){
            $(".size-show").find("[data-value='"+data[i]['size']+"']").removeClass("disable");
        }
    }
    return false;
});

</script>

<!-- Start utube vdo -->




<script>
    $(document).ready(function(){
        // var newcontent = '<div class="play"></div>';
        // $('#LastChild').html(newcontent);
        $('.lSGallery li:last-child').attr('id', 'LastChild');
    });
</script>
<script>
$(document).ready(function () {
    // $('.js-videoPoster').on('click', function () {
    //     $(this).dblclick();
    //     $(".js-videoWrapper").css({'display':'none'}); 
    //     $(".module-video").css({'display':'block'});        
    //     $(".br-video")[0].src += "1";
    // });
   
});

// https://developers.google.com/youtube/iframe_api_reference

// Inject YouTube API script
var tag = document.createElement('script');
tag.src = "//www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// global variable for the player
var player;

// this function gets called when API is ready to use
function onYouTubePlayerAPIReady() {
  // create the global player from the specific iframe (#video)
  player = new YT.Player('video', {
    events: {
      // call this function when player is ready to use
      'onReady': onPlayerReady,
    }
  });
}

function onPlayerReady(event) {
  
  // bind events
  var playButton = document.getElementById("js-videoPoster");
  playButton.addEventListener("click", function() {
    $(".js-videoWrapper").css({'display':'none'}); 
    $(".module-video").css({'display':'block'});    
    event.target.playVideo();
  });
  
//   var pauseButton = document.getElementById("pause-button");
//   pauseButton.addEventListener("click", function() {
//     player.pauseVideo();
//   });
  
}


</script>

<!-- End utube vdo -->



@endsection
