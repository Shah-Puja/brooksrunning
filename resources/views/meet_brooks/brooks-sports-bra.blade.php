@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
<section class="sports-bra-page-banner">
	<div class="landingpage-banner--wrapper">
    <div class="opacity-cover hidden-mob"></div>
    <picture>
	        <source media="(max-width: 595px)" srcset="images/landingpage/bannerS.jpg">
	        <img src="/images/landingpage/Bra_Tech_L.jpg" alt="Header Images">
	      </picture>
	      <!-- <picture>
	        <source media="(max-width: 595px)"  srcset="images/meet-brooks/technology/brooks_sports_bra/LP_Bratech_FWP_S.jpg">
	        <img src="/images/meet-brooks/technology/brooks_sports_bra/LP_Bratech_FWP_L.jpg"  alt="Header Images">
         </picture> -->
         <!-- <picture>
                 <source media="(max-width: 595px)" srcset="/images/meet-brooks/Sports-Bra-Technology/S19_LP_Bra-Tech_1_FWP_S.jpg">
                 <source media="(min-width: 596px) and (max-width: 974px)" srcset="/images/meet-brooks/Sports-Bra-Technology/S19_LP_Bra-Tech_1_FWP_M_new.jpg">
                 <img class="m-block--hero--promo__img" src="/images/meet-brooks/Sports-Bra-Technology/S19_LP_Bra-Tech_1_FWP_L.jpg">
             </picture> -->
	      <div class="landingpage-banner--info">
	      	<div class="wrapper">
	      		<div class="row">
	      			<div class="col-12">
	      				<div class="banner--info hidden-mob">
	      					<p class="label--underline">Bra Engineering</p>
							   <p>The right bra can transform your run. We believe your bra should be comfortable — the whole run. So we create bras with support for any run and every body type.</p>
							</div>
	      				<div class="landing-info visible-mob">
	      					<div class="banner--info">
	      					<p class="label--underline">Bra Engineering</p>
							   <p>The right bra can transform your run. We believe your bra should be comfortable — the whole run. So we create bras with support for any run and every body type.</p>
							</div>
	      			</div>
	      		</div>
	      	</div>
     	  </div>
    </div>
</section>

<section class="sports-bra-featured--container">
	<div class="wrapper">
		<div class="row">
			<div class="tab-4">
			<div class="hpgray-wrapper">
				<div class="homepage-cate--link">
					<img src="/images/meet-brooks/technology/brooks_sports_bra/LP_BraTech_1.jpg">
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">The support you need for the run you want</h3>
					<p>All our bras are designed for running. We categorize them based on three levels of impact — low, medium, and high. Low impact bras slip on easily and move effortlessly with your body. Medium impact bras mix support, shaping, and adjustability. And high impact bras are engineered to keep your curves firmly in place.</p>
				</div>
			</div>
			</div>
			<div class="tab-4">
			<div class="hpgray-wrapper">
         <div class="homepage-cate--link">
					<img src="/images/meet-brooks/technology/brooks_sports_bra/LP_BraTech_2.jpg">
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">The details make the bra</h3>
					<p>Every seam, every stitch, and every strap has a purpose. We’ve designed intuitive features that provide a personalized fit experience that every woman deserves. And when every detail has been thought of, you can focus on the run.</p>
				</div>
			</div>
			</div>
			<div class="tab-4">
			<div class="hpgray-wrapper">
				<div class="homepage-cate--link">
					<img src="/images/meet-brooks/technology/brooks_sports_bra/LP_BraTech_3.jpg">
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">We’ve done our job when you forget you’re wearing our gear</h3>
					<p>The beauty of the run is getting in the zone. It’s about forgetting anything that bothers you to focus on your breathing, your legs, and breaking your next PR. And, when done right, you don’t think about your bra either. (We do it right.)</p>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>



<!-- Carousel -->
@if(!empty($sports_bras))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="sports-bra-collection--container">
    <div class="collection-intro">
        <h2>Shop our bras</h2>
        <div><a href="/womens-sports-bras" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
    </div>
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel sports-bra-lp-carousal owl-centered">
        @if($sports_bras!='')
            @foreach($sports_bras['products'] as $curr_ele)
                @foreach($sports_bras['colour_options'] as $product)
                    @if($product->style == $curr_ele->style)
                            @php $colors_option[$curr_ele->style][] = $product; @endphp
                    @endif
                    @endforeach
                @php
                    $price_sale = $curr_ele->variants->max('price_sale');
                    $price = $curr_ele->variants->max('price');
                    $max_price =$curr_ele->variants->pluck('price')->max();
                    $max_price_sale = $curr_ele->variants->pluck('price_sale')->max();
                    $min_price = $curr_ele->variants->pluck('price')->min();
                    $min_price_sale = $curr_ele->variants->pluck('price_sale')->min();
                @endphp
                <div class="item">
                    <div class="product_arrive plp-product">
                        <div class="prd_img">
                            <a href = "/{{$curr_ele->seo_name}}/{{$curr_ele->style}}_{{$curr_ele->color_code}}.html">
                            <img src="{{ $curr_ele->image->image1Mediumx() }}">
                            </a>
                        </div>
                        <a href="/{{$curr_ele->seo_name}}/{{$curr_ele->style}}_{{$curr_ele->color_code}}.html" class="main_link">
                            <div class="info">
                                <h3>{{ ($curr_ele->gender=='M') ? "Men's" : "Women's"  }} {{ $curr_ele->stylename }}</h3>
                                <div class="price">
                                    @if($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price==$min_price_sale && $max_price==$max_price_sale)
                                        <span class="black price_text">&dollar;{{ $min_price_sale }}</span>
                                    @elseif($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price!=$min_price_sale && $max_price!=$max_price_sale)
                                        <del><span class="black">&dollar;{{ $max_price }}</span></del>
                                        <span class="red price_text">&dollar;{{ $min_price_sale }}</span>
                                    @elseif($min_price==$min_price_sale && $max_price==$max_price_sale)
                                        <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                    @elseif($min_price==$max_price && $min_price_sale!=$max_price_sale)
                                        <del><span class="black">&dollar;{{ $max_price }}</span></del>
                                        <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                    @elseif($min_price!=$max_price && $min_price_sale==$max_price_sale)
                                        <del><span class="black">&dollar;{{ $min_price }} - &dollar;{{ $max_price }}</span></del>
                                        <span class="red price_text">&dollar;{{ $min_price_sale }}</span>
                                    @else
                                        <del><span class="black">&dollar;{{ $min_price }} - &dollar;{{ $max_price }}</span></del>
                                        <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                    @endif
                                </div>
                                <div class="shoes-type">{{ $curr_ele->h2 }}</div>
                            </div>
                        </a>
                    </div>
                </div>
            <!--  -->
            @endforeach
        @endif
        </div>
        <!-- <span class="icon-style icon-next-arrow next"></span> -->
    </div>
</div>
@endif
<!-- End Carousel -->

<!-- Sports bras section -->
@if(!empty($sports_bras))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
	<div class="wrapper">
		<div class="row">
            <div class="col-3 tab-4">
                <div class="collection-header-intro">
                    <h2>Shop our bras</h2>
                    <div><a href="/womens-sports-bras" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
                </div>
            </div>
            <div class="col-9 tab-8">
				<div class="plp-wrapper-container">
                    @if($sports_bras!='')
                    @foreach($sports_bras['products'] as $curr_ele)
                        @foreach($sports_bras['colour_options'] as $product)
                            @if($product->style == $curr_ele->style)
                                    @php $colors_option[$curr_ele->style][] = $product; @endphp
                            @endif
                         @endforeach
                        @php
                            $price_sale = $curr_ele->variants->max('price_sale');
			                $price = $curr_ele->variants->max('price');
                            $max_price =$curr_ele->variants->pluck('price')->max();
                            $max_price_sale = $curr_ele->variants->pluck('price_sale')->max();
                            $min_price = $curr_ele->variants->pluck('price')->min();
                            $min_price_sale = $curr_ele->variants->pluck('price_sale')->min();
                            
                        @endphp

						<div class="mob-6 col-4 plp-wrapper__sub" data-main-id="{{ $curr_ele->style }}">
							<div class="plp-product">
                                <div class="offer-info">
                                    <!--<span>NEW</span>-->
                                    @if($price_sale < $price)
                                        <span class="sale">SALE</span>
                                    @endif
                                </div>
                                <a href="/{{$curr_ele->seo_name}}/{{$curr_ele->style}}_{{$curr_ele->color_code}}.html" class="main_link">
                                    <div class="plp-main--img--wrapper" style="background-image: url('{{ $curr_ele->image->image1Mediumx() }}')"></div>
                                </a>
								<div class="more-color--container more-clothing hidden-mob">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
                                    @if(!empty($colors_option[$curr_ele->style]) &&  count($colors_option[$curr_ele->style]) > 0 )
                                        @foreach(collect($colors_option[$curr_ele->style])->unique('color_code')->sortBy('seqno') as $color_product)
                                            @if(!empty($color_product))
                                                <div class="item " data-style="{{$curr_ele->style}}">
                                                    <img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$curr_ele->style}}" data-url="/{{$color_product->seo_name}}/{{$curr_ele->style}}_{{$color_product->color_code}}.html" data-big="{{ $color_product->image->image1Mediumx() }}" class="plp-thumb--bg" alt="">
                                                </div>
                                            @endif
                                        @endforeach
				                    @endif
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
                                	<!-- Start mobile swatches -->
                                <div class="color-wrapper--more--container visible-mob hidden-tab hidden-col">
                                        <div class="color-wrapper--more">
                                            @php 
                                                $i = 1; 
                                                $remaining_count = 0;
                                            @endphp
                                            @foreach(collect($colors_option[$curr_ele->style])->unique('color_code')->sortBy('seqno') as $color_product)
                                                @php 
                                                $add_class = '';
                                                $add_css = '';
                                                if(($i > 3 )){
                                                        $add_class = 'remaining';
                                                        $add_css = 'style=display:none;';
                                                        $remaining_count++;
                                                }
                                                @endphp
                                                
                                                <div class="swatches-icon {{ $add_class }}" data-style="{{$curr_ele->style}}"  {{ $add_css }}>
                                                <img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$curr_ele->style}}" data-url="/{{$color_product->seo_name}}/{{$curr_ele->style}}_{{$color_product->color_code}}.html" data-big="{{ $color_product->image->image1Mediumx() }}" class="plp-thumb--bg"  alt="">
                                                </div>
                                            @php $i++  @endphp
                                            @endforeach
                                        </div>
                                        @if($remaining_count>0)
                                        <div class="color-wrapper--more--add"> 
                                            <!-- /* For showing swatches count */ -->
                                            <div  class="remaining_swatches">+{{  $remaining_count }}</div>
                                                <!--  /* swatches count end */ -->
                                        </div>
                                        @endif
                                </div>
                                <!-- End mobile swatches -->
								<a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="main_link">
									<div class="info">
										<h3>{{ ($curr_ele->gender=='M') ? "Men's" : "Women's"  }} {{ $curr_ele->stylename }} </h3>
										<div class="price">
                                            @if($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price==$min_price_sale && $max_price==$max_price_sale)
                                                <span class="black price_text">&dollar;{{ $min_price_sale }}</span>
                                            @elseif($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price!=$min_price_sale && $max_price!=$max_price_sale)
                                                <del><span class="black">&dollar;{{ $max_price }}</span></del>
                                                <span class="red price_text">&dollar;{{ $min_price_sale }}</span>
                                            @elseif($min_price==$min_price_sale && $max_price==$max_price_sale)
                                                <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                            @elseif($min_price==$max_price && $min_price_sale!=$max_price_sale)
                                            <del><span class="black">&dollar;{{ $max_price }}</span></del>
                                            <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                            @elseif($min_price!=$max_price && $min_price_sale==$max_price_sale)
                                            <del><span class="black">&dollar;{{ $min_price }} - &dollar;{{ $max_price }}</span></del>
                                            <span class="red price_text">&dollar;{{ $min_price_sale }}</span>
                                            @else
                                            <del><span class="black">&dollar;{{ $min_price }} - &dollar;{{ $max_price }}</span></del>
                                            <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                            @endif
										</div>
										<div class="shoes-type">{{ $curr_ele->h2 }}</div>
									</div>
								</a>
							</div>
						</div>
						<!--- div -->
                        @endforeach
                    @endif
				</div>
            </div>
		</div>
	</div>
</section>
@endif
<!-- End sports bras section -->

<script>
$(document).ready(function () {
    $(".sports-bra-lp-carousal").owlCarousel({

        dots: true,
        singleItem: true,
        items: 1
        
    });
});
</script>

@endsection