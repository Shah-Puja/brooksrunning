@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
<section class="running-shoe-page-banner">
    <div class="landingpage-banner--wrapper">
        
        <picture>
        <source media="(max-width: 595px)" srcset="/images/landingpage/running-shoes/Hero_Mobile.jpg">
        <img src="/images/landingpage/running-shoes/Hero.jpg" alt="Header Images">
        </picture>
        
          <div class="landingpage-banner--info">
            <div class="wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="banner--info hidden-mob">
                            <p class="label--underline">Shoe Technology</p>
                               <p>Think of us as a tech company with a shoe fetish.</p> 
                        </div>
                        <div class="landing-info visible-mob">
                            <div class="banner--info">
                            <p class="label--underline">Shoe Technology</p>
                               <p>Think of us as a tech company with a shoe fetish.</p>
                            </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</section>
<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Step into cushion with DNA LOFT</h1>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>
<section class="shoe-main-container running-shoe-video">
    <section class="shoes-info">
        <div class="wrapper">
            <div class="row">
                <div id="desk" class="col-12 tab-12 mob-12"> 
                        <!-- <div class="wrapper"> -->
                            <a  style="cursor:default;" style="cursor:default;" class="trigger utube meet-brooks-uTube-section" id="trigger">
                                <div class="module-img br-img">
                                <picture>
                                    <source media="(max-width: 595px)" srcset="/images/meet-brooks/running-shoes/LOFT_Video_Cover_Mobile.jpg">
                                        <img alt="benefits" src="/images/meet-brooks/running-shoes/LOFT_Video_Cover.jpg" data-loaded="true" >
                                        
                                    </picture>
                                </div>
                                <div class="playvideo"></div>
                                <div class="m-block--video-player--overlay__meta site__wrapper--padding">
                                    <span class="medium white">Not too hard, not too soft</span>
                                    <span class="type white">1:20</span>
                                </div>
                            </a>
                            <div class="module-video module-vdo" style="display:none;">
                                <!-- <iframe class="br-video br-vdo"  src="https://www.youtube.com/embed/YGDYyUzJeT4?enablejsapi=1&html5=1"  allowfullscreen></iframe> -->
                                <iframe class="br-video br-vdo"  src="https://www.youtube.com/embed/YGDYyUzJeT4?autoplay="  allowfullscreen></iframe>
                            </div>
                        </div>
                <!-- </div>  -->
            </div>
        </div>
    </section>
</section>
<div class="create-account--header plp-header running-shoes-intro running-shoes-section">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
          <img src="/images/meet-brooks/running-shoes/DNA-LOFT.png" class="tech-logo"/>
                                
          <p>DNA LOFT provides our softest cushioning yet. It instantly adapts to the runners’ individual stride, weight, and speed with a unique blend of ethylene-vinyl acetate (EVA), rubber, and air.
                                    <br/> <br/>
            The rubber adds longevity to the EVA midsole, ensuring softness. While the air decreases the shoe’s weight.
                                     <br/> <br/>
            DNA LOFT is engineered to be lightweight and ultra-soft, without sacrificing durability or responsiveness, making it our most luxurious shoe technology yet.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Run soft with DNA LOFT</h1>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<!-- Carousel -->
@if(!empty($men_running_shoes))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
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
            <div class="col-12 tab-12">
            
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

                        <div class="mob-6 col-3 plp-wrapper__sub" data-main-id="{{ $curr_ele->style }}">
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

<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Energize your run with DNA AMP</h1>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>
<section class="shoe-main-container running-shoe-video">
    <section class="shoes-info">
        <div class="wrapper">
            <div class="row">
                <div id="desk" class="col-12 tab-12 mob-12"> 
                        <div class="wrapper">
                            <a href="JavaScript:Void(0);" style="cursor:default;" class="trigger2 utube meet-brooks-uTube-section2" id="trigger2">
                                <div class="module-img br-img">
                                    <picture>
                                        <source media="(max-width: 595px)" srcset="/images/meet-brooks/running-shoes/AMP_Video_Cover_Mobile.jpg">
                                        <img alt="benefits" src="/images/meet-brooks/running-shoes/AMP_Video_Cover.jpg" data-loaded="true" class="isLoading loaded" id="isLoading_8c32dbfd-2487-432c-9b8d-dc6724e9cf42">
                                    </picture>
                                </div>
                           
                                <div class="playvideo"></div>
                                <div class="m-block--video-player--overlay__meta site__wrapper--padding">
                                    <span class="medium white">Let the energy do the work for you</span>
                                    <span class="type white">1:26</span>
                                </div>
                            </a> 
                            <div class="module-video module-vdo2" style="display:none;"> 
                                <!-- <iframe class="br-video br-vdo2"  src="https://www.youtube.com/embed/m69vNVRTdek?enablejsapi=1&html5=1"  allowfullscreen></iframe> -->
                                <iframe class="br-video br-vdo2"  src="https://www.youtube.com/embed/m69vNVRTdek?autoplay="  allowfullscreen></iframe>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </section>
</section>

<div class="create-account--header plp-header running-shoes-intro running-shoes-technology">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
          <img src="/images/meet-brooks/running-shoes/DNA-LOFT.png" class="tech-logo"/>
                                
          <p>DNA AMP is a polyurethane (PU) based cushioning system designed for energy return. It does this with a foam that naturally expands as force is applied.
                                    <br/> <br/>
           To deliver an amplified experience, we encase the foam in a thermoplastic polyurethane skin that resists horizontal expansion. The result is a springy ride with best-in-class energy return.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Get energized with DNA AMP</h1>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<!-- Carousel -->
@if(!empty($men_running_shoes2))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
        @if($men_running_shoes2!='')
            @foreach($men_running_shoes2['products'] as $curr_ele)
                @foreach($men_running_shoes2['colour_options'] as $product)
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
@if(!empty($men_running_shoes2))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
    <div class="wrapper">
        <div class="row">
            <div class="col-12 tab-12">
            
                <div class="plp-wrapper-container running-shoe-container-energized">
                    @if($men_running_shoes2!='')
                    @foreach($men_running_shoes2['products'] as $curr_ele)
                        @foreach($men_running_shoes2['colour_options'] as $product)
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

                        <div class="mob-6 col-3 plp-wrapper__sub" data-main-id="{{ $curr_ele->style }}">
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

<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Guide your stride with GuideRails</h1>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<section class="shoe-main-container running-shoe-video">
    <section class="shoes-info">
        <div class="wrapper">
            <div class="row">
                <div id="desk" class="col-12 tab-12 mob-12"> 
                        <div class="wrapper">
                            <a href="JavaScript:Void(0);" style="cursor:default;" class="trigger3 utube meet-brooks-uTube-section3" id="trigger3">
                                <div class="module-img br-img">
                                <picture>
                                    <source media="(max-width: 595px)" srcset="/images/meet-brooks/running-shoes/GuideRails_Video_Cover_Mobile.jpg">
                                    <img alt="benefits" src="/images/meet-brooks/running-shoes/GuideRails_Video_Cover.jpg" data-loaded="true" class="isLoading loaded" id="isLoading_e75d49d3-8792-49d2-8278-f8aa42ebe3be">
                                </picture>
                                </div>
                           
                                <div class="playvideo"></div>
                                <div class="m-block--video-player--overlay__meta site__wrapper--padding">
                                    <span class="medium white">It's kinda like bowling bumpers</span>
                                    <span class="type white">1:23</span>
                                </div>
                            </a>
                            <div class="module-video module-vdo3" style="display:none;">
                                <!-- <iframe class="br-video br-vdo3"  src="https://www.youtube.com/embed/CJHaMglcov0?enablejsapi=1&html5=1"  allowfullscreen></iframe> -->
                                    <iframe class="br-video br-vdo3"  src="https://www.youtube.com/embed/CJHaMglcov0?autoplay="  allowfullscreen></iframe>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </section>
</section>

<div class="create-account--header plp-header running-shoes-intro running-shoes-technology">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
          <img src="/images/meet-brooks/running-shoes/Guiderails.png" class="tech-logo"/>
                                
          <p>GuideRails™ technology delivers on-demand support, allowing your hips, knees, and joints to move the way you naturally do.
                <br>
                <br>
            Think of GuideRails as bumpers in bowling. When your stride falls out of place, they kick in to guide your stride back in line. They’re there when you need them and out of your way when you don't.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>
<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Shop shoes with GuideRails</h1>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<!-- Carousel -->
@if(!empty($men_shoes3))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
        @if($men_shoes3!='')
            @foreach($men_shoes3['products'] as $curr_ele)
                @foreach($men_shoes3['colour_options'] as $product)
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
@if(!empty($men_shoes3))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
    <div class="wrapper">
        <div class="row">
            <div class="col-12 tab-12">
            
                <div class="plp-wrapper-container">
                    @if($men_shoes3!='')
                    @foreach($men_shoes3['products'] as $curr_ele)
                        @foreach($men_shoes3['colour_options'] as $product)
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

                        <div class="mob-6 col-3 plp-wrapper__sub" data-main-id="{{ $curr_ele->style }}">
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

<!-- Midsole Tech\  -->
<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Midsole Tech</h1>
            <p>If a shoe were a sandwich, the midsole would be the meat. It’s the part between the outsole and the upper, and it defines the experience.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<section class="running-shoe-featured--container hidden-mob visible-tab visible-col">
    <div class="wrapper">
        <div class="row">
            <div class="tab-3">
            <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/Midsole/1_BioMoGo-DNA_L.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">BioMoGo DNA</h3>
                    <p>BioMoGo DNA adapts to your specific weight, pace, gait, and running surface. That makes for a springier step that’s customized for your stride.</p>
                </div>
            </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/Midsole/2_Segmented-Crash-Pad_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Segmented Crash Pad</h3>
                        <p>The segmented crash pad is a system of fully-integrated shock absorbers. They work to maximize efficiency, provide cushion, and create smooth heel-to-toe transitions.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/Midsole/3_Extended-PDR_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Extended Progressive Diagonal Rollbar</h3>
                        <p>This rollbar is a high-density post at the medial arch. It’s engineered to provide support and create a smoother transition from the midstance to propulsion phase.</p>
                    </div>
            </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/Midsole/4_Pivot-Posting-System_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Pivot Posting System:</h3>
                        <p>The pivot posting system is a trail-specific technology that provides stabilizing suspension on both sides of the heel and forefoot.</p>
                    </div>
            </div>
            </div>
        </div>
    </div>
</section>

<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/Midsole/1_BioMoGo-DNA_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">BioMoGo DNA</h3>
                            <p>BioMoGo DNA adapts to your specific weight, pace, gait, and running surface. That makes for a springier step that’s customized for your stride.</p>
                        </div>
                     </div>
                </div>

                <div class="item">
                    <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/Midsole/2_Segmented-Crash-Pad_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Segmented Crash Pad</h3>
                            <p>The segmented crash pad is a system of fully-integrated shock absorbers. They work to maximize efficiency, provide cushion, and create smooth heel-to-toe transitions.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/Midsole/3_Extended-PDR_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Extended Progressive Diagonal Rollbar</h3>
                            <p>This rollbar is a high-density post at the medial arch. It’s engineered to provide support and create a smoother transition from the midstance to propulsion phase.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/Midsole/4_Pivot-Posting-System_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Pivot Posting System:</h3>
                            <p>The pivot posting system is a trail-specific technology that provides stabilizing suspension on both sides of the heel and forefoot.</p>
                        </div>
                     </div>
                </div>

                <!-- <div class="item"></div> -->
              
            <!--  -->
        
        </div>
        <!-- <span class="icon-style icon-next-arrow next"></span> -->
    </div>
</div>


<!-- /Midsole Tech -->

<!-- outsole Tech\  -->
<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Outsole Tech</h1>
            <p>The outsole is the bottommost part of the shoe that comes in direct contact with the ground.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<section class="running-shoe-featured--container hidden-mob visible-tab visible-col">
    <div class="wrapper">
        <div class="row">
            <div class="tab-4">
            <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/Outsole/5_Dual-Stability-Arch-Pad_L.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">Dual Stability Arch Pod</h3>
                    <p>The dual stability arch pod found in the Dyad enhances inherent stability without the use of a post. This means stability without the stiffness.</p>
                </div>
            </div>
            </div>
            <div class="tab-4">
            <div class="hpgray-wrapper">
         <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/Outsole/6_Ballistic-Rock-Shield_L.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">Ballistic Rock Shield</h3>
                    <p>The ballistic rock shield is a thermoplastic EVA sheath between the outsole and the midsole. It protects the forefoot by spreading out point loads from sharp objects.</p>
                </div>
            </div>
            </div>
            <div class="tab-4">
            <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/Outsole/7_TrailTackRubber_L.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">TrailTack Rubber</h3>
                    <p>TrailTack rubber found in the Cascadia and Caldera is a sticky compound that provides outstanding uphill and downhill traction, even on wet surfaces.</p>
                </div>
            </div>
            </div>
        
        </div>
    </div>
</section>

<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
                <div class="item">
                    <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/Outsole/5_Dual-Stability-Arch-Pad_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Dual Stability Arch Pod</h3>
                        <p>The dual stability arch pod found in the Dyad enhances inherent stability without the use of a post. This means stability without the stiffness.</p>
                    </div>
                </div>
                </div>

                <div class="item">
                    <div class="hpgray-wrapper">
                            <div class="homepage-cate--link">
                                <img src="/images/meet-brooks/running-shoes/Outsole/6_Ballistic-Rock-Shield_L.jpg">
                            </div>
                            <div class="info-wrapper">
                                <h3 class="br-heading">Ballistic Rock Shield</h3>
                                <p>The ballistic rock shield is a thermoplastic EVA sheath between the outsole and the midsole. It protects the forefoot by spreading out point loads from sharp objects.</p>
                            </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/Outsole/7_TrailTackRubber_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">TrailTack Rubber</h3>
                            <p>TrailTack rubber found in the Cascadia and Caldera is a sticky compound that provides outstanding uphill and downhill traction, even on wet surfaces.</p>
                        </div>
                    </div>
                </div>
                

                <!-- <div class="item"></div> -->
              
            <!--  -->
        
        </div>
        <!-- <span class="icon-style icon-next-arrow next"></span> -->
    </div>
</div>
<!-- /Outsole Tech -->


<!-- Upper Tech\  -->
<div class="create-account--header plp-header running-shoes-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Upper Tech</h1>
            <p>The upper refers to the part of the shoe that covers the toes, top of foot, sides of foot, and back of the heel. So, basically everything that isn’t the midsole or outsole.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<section class="running-shoe-featured--container hidden-mob visible-tab visible-col">
    <div class="wrapper">
        <div class="row">
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/8_3D-Fit-Print_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">3D Fit Print</h3>
                        <p>Using an advanced screen-printing process, the 3D Fit Print adds strategic structure and stretch for a seamless fit.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/9_Ariaprene-Mesh_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Ariaprene™ Mesh</h3>
                        <p>This upper mesh is a foam-core technology designed to dry quickly and feel like a second skin.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/10_3D-Rubber-Print_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">3D Rubber Print</h3>
                        <p>An advanced screen-printing process applies 3D Rubber Print to increase protection and durability in trail shoes.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/11_Engineered-Mesh_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Engineered Mesh</h3>
                        <p>We use a custom-designed and strategically woven mesh to provide optimal structure and breathability.</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/12_Fit-Knit_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Fit Knit</h3>
                        <p>Our premium knit upper construction is specifically designed for optimal fit and performance. Its construction is designed to deliver a more sock-like fit.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/13_Gore-Tex_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">GORE-TEX™</h3>
                        <p>For waterproof yet breathable protection, we use GORE-TEX™ to ensure feet stay dry and comfortable.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/14_Ortholite-Sockliner_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Ortholite™ Sockliner</h3>
                        <p>This sockliner acts as a contoured insert designed to fill any negative space underfoot.</p>
                    </div>
                </div>
            </div>
            <div class="tab-3">
                <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                        <img src="/images/meet-brooks/running-shoes/upersole/15_Ultimate-Sockliner_L.jpg">
                    </div>
                    <div class="info-wrapper">
                        <h3 class="br-heading">Ultimate Sockliner</h3>
                        <p>This sockliner is a PU insert with an OrthoLite® memory foam middle layer that provides cushioning, breathability, and conformability.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/8_3D-Fit-Print_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">3D Fit Print</h3>
                            <p>Using an advanced screen-printing process, the 3D Fit Print adds strategic structure and stretch for a seamless fit.</p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/9_Ariaprene-Mesh_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Ariaprene™ Mesh</h3>
                            <p>This upper mesh is a foam-core technology designed to dry quickly and feel like a second skin.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/10_3D-Rubber-Print_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">3D Rubber Print</h3>
                            <p>An advanced screen-printing process applies 3D Rubber Print to increase protection and durability in trail shoes.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/11_Engineered-Mesh_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Engineered Mesh</h3>
                            <p>We use a custom-designed and strategically woven mesh to provide optimal structure and breathability.</p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/12_Fit-Knit_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Fit Knit</h3>
                            <p>Our premium knit upper construction is specifically designed for optimal fit and performance. Its construction is designed to deliver a more sock-like fit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/13_Gore-Tex_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">GORE-TEX™</h3>
                            <p>For waterproof yet breathable protection, we use GORE-TEX™ to ensure feet stay dry and comfortable.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/14_Ortholite-Sockliner_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Ortholite™ Sockliner</h3>
                            <p>This sockliner acts as a contoured insert designed to fill any negative space underfoot.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/upersole/15_Ultimate-Sockliner_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Ultimate Sockliner</h3>
                            <p>This sockliner is a PU insert with an OrthoLite® memory foam middle layer that provides cushioning, breathability, and conformability.</p>
                        </div>
                    </div>
                </div>
        </div>
                <!--  -->
        <!-- <span class="icon-style icon-next-arrow next"></span> -->
    </div>
</div>
<!-- /Upper Tech -->

<!-- Shoefinder start -->

<section class="meet-brooks-shoefinder-banner">
    <div class="landingpage-banner--wrapper">
    <!-- <div class="opacity-cover hidden-mob"></div> -->
        <picture>
            <source media="(max-width: 595px)" srcset="/images/meet-brooks/running-shoes/April-HP/1a_FWP_S.jpg">
            <source media="(min-width: 596px) and (max-width: 974px)" srcset="/images/meet-brooks/running-shoes/April-HP/1a_FWP_M.jpg">
            <img class="m-block--hero--promo__img" src="/images/meet-brooks/running-shoes/April-HP/1a_FWP_L.jpg">
        </picture>
         
          <div class="meet-brooks--info">
            <div class="wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="banner--info hidden-mob">
                            <h1 class="br-mainheading">Find the best shoe for you</h1>
                            <p class="label--underline">Get started on the right foot by putting it in the right shoe.  </p>
                              <a class="primary-button" href="/shoefinder">Start now</a>
                        </div>
                        <div class="landing-info visible-mob">
                          <div class="banner--info">
                            <p class="label--underline">Find the best shoe for you</p>
                               <p>Get started on the right foot by putting it in the right shoe. </p>
                               <a class="primary-button" href="/shoefinder">Start now</a>
                            </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</section>

<!-- Shoefinder end -->

<div class="create-account--header plp-header running-shoes-intro keep-exploring-sec">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
           
           
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<!-- Keep Exploring\  -->
<!-- <div class="create-account--header plp-header running-shoes-intro keep-exploring-sec">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div class="about-header">
            <h1 class="br-mainheading">Keep exploring</h1>
           
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>

<section class="running-shoe-featured--container hidden-mob visible-tab visible-col">
    <div class="wrapper">
        <div class="row">
            <div class="tab-3">
            <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/keep-exploring/KeepExploring_BuiltForYourRun.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">Built for Your Run</h3>
                </div>
            </div>
            </div>
            <div class="tab-3">
            <div class="hpgray-wrapper">
         <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/keep-exploring/KeepExploring_ResearchAndTestingApproach.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">Research & Testing Approach</h3>
                </div>
            </div>
            </div>
            <div class="tab-3">
            <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/keep-exploring/KeepExploring_ClothingTechnology.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">Gear Technology</h3>
                </div>
            </div>
            </div>
            <div class="tab-3">
            <div class="hpgray-wrapper">
                <div class="homepage-cate--link">
                    <img src="/images/meet-brooks/running-shoes/keep-exploring/S19_LP_Bra-Tech_7_PFC-1_L.jpg">
                </div>
                <div class="info-wrapper">
                    <h3 class="br-heading">Bra Engineering</h3>
                 </div>
            </div>
            </div>
        </div>
    </div>
</section>

<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="runningshoes-lp--container">
        <div class="owl-carousel running-shoe-lp-carousal owl-centered">
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/keep-exploring/KeepExploring_BuiltForYourRun.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Built for Your Run</h3>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="hpgray-wrapper">
                    <div class="homepage-cate--link">
                                <img src="/images/meet-brooks/running-shoes/keep-exploring/KeepExploring_ResearchAndTestingApproach.jpg">
                            </div>
                            <div class="info-wrapper">
                                <h3 class="br-heading">Research & Testing Approach</h3>
                            </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/keep-exploring/KeepExploring_ClothingTechnology.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Gear Technology</h3>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hpgray-wrapper">
                        <div class="homepage-cate--link">
                            <img src="/images/meet-brooks/running-shoes/keep-exploring/S19_LP_Bra-Tech_7_PFC-1_L.jpg">
                        </div>
                        <div class="info-wrapper">
                            <h3 class="br-heading">Bra Engineering</h3>
                       </div>
                    </div>
                </div>

             
              
           
        
        </div>
    </div>
</div> -->
<!-- /Keep Exploring -->

<script>
$(document).ready(function () {
    $(".running-shoe-lp-carousal").owlCarousel({

        dots: true,
        singleItem: true,
        items: 1
        
    });

    $('.trigger').on('click', function () {
        $(".meet-brooks-uTube-section").css({'display':'none'}); 
        $(".module-vdo").css({'display':'block'});        
        $(".br-vdo")[0].src += "1";
    });
    $('.trigger2').on('click', function () {
        $(".meet-brooks-uTube-section2").css({'display':'none'}); 
        $(".module-vdo2").css({'display':'block'});        
        $(".br-vdo2")[0].src += "1";
    }); 
    $('.trigger3').on('click', function () {
        $(".meet-brooks-uTube-section3").css({'display':'none'}); 
        $(".module-vdo3").css({'display':'block'});        
        $(".br-vdo3")[0].src += "1";
    });


});

// https://developers.google.com/youtube/iframe_api_reference

// Inject YouTube API script
// var tag = document.createElement('script');
// tag.src = "//www.youtube.com/player_api";
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// global variable for the player
// var player;

// this function gets called when API is ready to use
// function onYouTubePlayerAPIReady() {
  // create the global player from the specific iframe (#video)
//   player = new YT.Player('video', {
//     events: {
      // call this function when player is ready to use
//       'onReady': onPlayerReady,
//     }
//   });
// }

// function onPlayerReady(event) {
  
//   // bind events
//   var playButton = document.getElementById("trigger");
//   playButton.addEventListener("click", function() {
//     $(".meet-brooks-uTube-section").css({'display':'none'}); 
//     $(".module-vdo").css({'display':'block'});    
//     event.target.playVideo();
//   });
  
// }

</script>

@endsection