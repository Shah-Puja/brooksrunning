<!---------------------------------------- Results ------------------------------------------------------>
@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
<div class="create-account--header plp-header category__hero" style="margin-bottom:0px;">
 
        <div class="row">
            <div class="m-block--hero m-block--hero--basic--collection mob-12 col-6 tab-6">
                <div class="m-block--hero--collection__content">
                    <div class="m-block--hero__content__copy">
                    <div class="about-header">
                        <div class="breadcrumbs">
                                    <ul>
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        <li>
                                            <a href="/mens-running-shoes-and-clothing">Father's</a>
                                        </li>
                                        <li>
                                            <a href="JavaScript:Void(0);" class="active">Gifts for men</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <h1 class="title">Gifts for Men</h1>
                        <p class="type">Treat the runner in your life with the latest in Brooks performance running gear<br/>
                        </p>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>
            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                <img src="/images/Limited-Edition/fathersday-categoryimage.jpg">
            </div>
        </div>
</div>

<div class="create-account--header plp-header promo-banners">
    <div class="wrapper promo-banner-info">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="about-header">
                    <p class="free-pair">Receive a <span>FREE pair of socks</span> with any shoe purchase*.</p>
                    <p class="promo-code">Use promo code <span>SOCKS4DAD</span> at checkout*.</p>
                    <p class="offer">'Offer valid on any full price shoe purchase until 31 August 2019.</p>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>


<!-- Carousel -->
@if(!empty($men_accessories))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="mp-lp--container">
    <div class="collection-intro">
        <h2>Running accessories</h2>
        <div><a href="/mens-running-accessories" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
    </div>
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel md-lp-carousal owl-centered">
        @if($men_accessories!='')
            @foreach($men_accessories['products'] as $curr_ele)
                @foreach($men_accessories['colour_options'] as $product)
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
                            
                            @switch($curr_ele->gender)
                                    @case('M')
                                        @php $gender = "Men's "; @endphp
                                    @break
                                    @case('W')
                                        @php $gender = "Women's "; @endphp
                                    @break
                                    @default
                                        @php $gender = ""; @endphp
                                 @endswitch
                                <h3>{{($gender!='')? $gender:''}} {{ $curr_ele->stylename }}</h3>
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
                            <!--<div class="info-sub">
                                <div class="row">
                                    <div class="mob-6">
                        
                                    </div>
                                    <div class="mob-6">
                                        <p class="right">1 Width Available</p>
                                    </div>
                                </div>
                            </div>-->
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

<!-- Accessories section -->
@if(!empty($men_accessories))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
	<div class="wrapper">
		<div class="row">
            <div class="col-3 tab-4">
                <div class="collection-header-intro">
                    <h2>Running accessories</h2>
                    <div><a href="/mens-running-accessories" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
                </div>
            </div>
            <div class="col-9 tab-8">
				<div class="plp-wrapper-container">
                    @if($men_accessories!='')
                    @foreach($men_accessories['products'] as $curr_ele)
                        @foreach($men_accessories['colour_options'] as $product)
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
                                    @switch($curr_ele->gender)
                                        @case('M')
                                            @php $gender = "Men's "; @endphp
                                        @break
                                        @case('W')
                                            @php $gender = "Women's "; @endphp
                                        @break
                                        @default
                                            @php $gender = ""; @endphp
                                    @endswitch
                                    <h3>{{($gender!='')? $gender:''}} {{ $curr_ele->stylename }} </h3>
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
<!-- End accessories section -->

<!-- Carousel -->
@if(!empty($men_running_clothing))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="mp-lp--container">
    <div class="collection-intro">
        <h2>Men's Running Clothing</h2>
        <div><a href="/mens-running-clothes" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
    </div>
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel md-lp-carousal owl-centered">
        @if($men_running_clothing!='')
            @foreach($men_running_clothing['products'] as $curr_ele)
                @foreach($men_running_clothing['colour_options'] as $product)
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
                            <!--<div class="info-sub">
                                <div class="row">
                                    <div class="mob-6">
                        
                                    </div>
                                    <div class="mob-6">
                                        <p class="right">1 Width Available</p>
                                    </div>
                                </div>
                            </div>-->
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


<!-- Men running clothing section -->
@if(!empty($men_running_clothing))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
	<div class="wrapper">
		<div class="row">
            <div class="col-3 tab-4">
                <div class="collection-header-intro">
                    <h2>Men's Running Clothing</h2>
                    <div><a href="/mens-running-clothes" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
                </div>
            </div>
            <div class="col-9 tab-8">
				<div class="plp-wrapper-container">
                    @if($men_running_clothing!='')
                    @foreach($men_running_clothing['products'] as $curr_ele)
                        @foreach($men_running_clothing['colour_options'] as $product)
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
<!-- End men running clothing section -->

<div class="plp-header collection-promobanner-info">
    <div class="wrapper">
        <div class="row">
            <div class="col-3 tab-0"></div>
            <div class="col-9 tab-12">
                <div class="about-header sub-promo-banner">
                    <p class="free-pair">Receive a <span>FREE pair of socks</span> with any shoe purchase*.</p>
                    <p class="promo-code">Use promo code <span>SOCKS4DAD</span> at checkout*.</p>
                    <p class="offer">'Offer valid on any full price shoe purchase until 31 August 2019.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Carousel -->
@if(!empty($men_running_shoes))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="mp-lp--container">
    <div class="collection-intro">
        <h2>Men's Running Shoes</h2>
        <div><a href="/mens-running-shoes" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
    </div>
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel md-lp-carousal owl-centered">
        @if($men_running_shoes!='')
            @foreach($men_running_shoes['products'] as $curr_ele)
                @foreach($men_running_shoes['colour_options'] as $product)
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
                    if(!empty($colors_option[$curr_ele->style])){
                        $width_array[$curr_ele->style]['width'] = collect($colors_option[$curr_ele->style])->transform(function ($product) {
                                                    return $product->variants->where('visible','Yes')->pluck('width_name');
                                                    })->flatten()->unique()->values()->sort();
                    }
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
                            <div class="info-sub">
                                <div class="row">
                                    <div class="mob-6">
                                    @php  $width_count = count( $width_array[$curr_ele->style]['width']); @endphp
                                    </div>
                                    <div class="mob-6">
                                        <p class="right">{{ $width_count }} {{ ($width_count > 1 ) ? 'Widths' : 'Width' }} Available</p>
                                    </div>
                                </div>
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

<!-- Men running shoes section -->
@if(!empty($men_running_shoes))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
	<div class="wrapper">
		<div class="row">
            <div class="col-3 tab-4 ">
                <div class="collection-header-intro">
                    <h2>Men's Running Shoes</h2>
                    <div><a href="/mens-running-shoes" class="shop-all">Shop All <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></div>
                </div>
            </div>
            <div class="col-9 tab-8">
				<div class="plp-wrapper-container">
                    @if($men_running_shoes!='')
                    @foreach($men_running_shoes['products'] as $curr_ele)
                        @foreach($men_running_shoes['colour_options'] as $product)
                            @if($product->style == $curr_ele->style)
                                    @php $colors_option[$curr_ele->style][] = $product; @endphp
                            @endif
                         @endforeach
                        @php
                            $width_array =[];
                            $max_price =$curr_ele->variants->pluck('price')->max();
                            $max_price_sale = $curr_ele->variants->pluck('price_sale')->max();
                            $min_price = $curr_ele->variants->pluck('price')->min();
                            $min_price_sale = $curr_ele->variants->pluck('price_sale')->min();
                            if(!empty($colors_option[$curr_ele->style])){
                                $width_array[$curr_ele->style]['width'] = collect($colors_option[$curr_ele->style])->transform(function ($product) {
                                                            return $product->variants->where('visible','Yes')->pluck('width_name');
                                                    })->flatten()->unique()->values()->sort();
                            }
                        @endphp

						<div class="mob-6 col-4 plp-wrapper__sub" data-main-id="{{ $curr_ele->style }}">
							<div class="plp-product">
								<a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="hidden-mob main_link">
									<div class="img img-shoes">
										<img id="plp-img" src="{{ $curr_ele->image->image1Medium() }}" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
                                    @if(!empty($colors_option[$curr_ele->style]) &&  count($colors_option[$curr_ele->style]) > 0 )
                                        @foreach(collect($colors_option[$curr_ele->style])->unique('color_code')->sortBy('seqno') as $color_product)
                                            @if(!empty($color_product))
                                        <div class="item">
                                            <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$color_product->color_code }}.html">
                                            <picture>
                                                <source media="(max-width: 667px)" srcset="{{ $color_product->image->image1Medium() }}">
                                                <img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$curr_ele->style}}" data-url="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$color_product->color_code }}.html"  data-big="{{ $color_product->image->image1Medium() }}" class="plp-thumb" alt="">
                                            </picture>
                                            </a>
                                            <div class="plp-mob--info visible-mob">
                                                <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$color_product->color_code }}.html">
                                                @php  $width_count = count( $width_array[$curr_ele->style]['width']); @endphp
                                                    <ul>
                                                        <li>{{ count(collect($colors_option[$curr_ele->style])->unique('color_code')) }} Colours</li>
                                                        <li class="no-pad">{{ $width_count }} {{ ($width_count > 1 ) ? 'Widths' : 'Width' }}  Available</li>
                                                    </ul>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
				                    @endif
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
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
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
								
											</div>
											<div class="mob-6">
												<p class="right">{{ $width_count }} {{ ($width_count > 1 ) ? 'Widths' : 'Width' }} Available</p>
											</div>
										</div>
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
<!-- End men running shoes section -->



<script>
$(document).ready(function () {
    $(".md-lp-carousal").owlCarousel({

        dots: true,
        singleItem: true,
        items: 1
        
    });
});
</script>



@endsection       
      

