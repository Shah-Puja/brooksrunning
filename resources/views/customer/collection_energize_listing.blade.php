<!---------------------------------------- Results ------------------------------------------------------>
@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css">
<div class="create-account--header plp-header category__hero">
 
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
                                        <!--<li>
                                            <a href="/womens-running-shoes-and-clothing">Women's</a>
                                        </li>-->
                                        <li>
                                            <a href="JavaScript:Void(0);" class="active">Explore the Energize Experience</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <h1 class="large">Explore the Energize Experience</h1>
                        <p class="type" style="margin: 1rem 0;">Create a run that feels easier. Responsive and springy, these shoes add a lift to every stride. Choose from neutral or support shoes for a run customized to you.<br/>
                        </p>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>
            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                <img src="/images/Limited-Edition/energize-categoryimage.jpg">
            </div>
        </div>
</div>

<!-- Carousel -->
@if(!empty($support_shoes))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="mp-lp--container">
    <div class="collection-intro">
        <h2>Support Energize Shoes</h2>
        <div class="cat-desc">From your hips down to your ankles, your body has a natural alignment it wants to follow as you run. GuideRails support keeps you in stride so your body stays in alignment.</div>
    </div>
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel md-lp-carousal owl-centered">
        @if($support_shoes!='')
            @foreach($support_shoes['products'] as $curr_ele)
                @foreach($support_shoes['colour_options'] as $product)
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

<!-- support_shoes section -->
@if(!empty($support_shoes))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
	<div class="wrapper">
		<div class="row">
            <div class="col-3 tab-4 ">
                <div class="collection-header-intro">
                    <h2>Support Energize Shoes</h2>
                    <div class="cat-desc">From your hips down to your ankles, your body has a natural alignment it wants to follow as you run. GuideRails support keeps you in stride so your body stays in alignment.</div>
                </div>
            </div>
            <div class="col-9 tab-8">
				<div class="plp-wrapper-container">
                    @if($support_shoes!='')
                    @foreach($support_shoes['products'] as $curr_ele)
                        @foreach($support_shoes['colour_options'] as $product)
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
<!-- End support_shoes section -->


<!-- Carousel -->
@if(!empty($neutral_shoes))
<div class="wrapper visible-mob hidden-tab hidden-col">
    <div class="mp-lp--container">
    <div class="collection-intro">
        <h2>Neutral Energize Shoes</h2>
        <div class="cat-desc">Neutral shoes are designed to let your body run without any disruption. You get all the benefits of an advanced running shoe without the specific technology that guides and corrects your body's alignment.</div>
    </div>
        <!-- <span class="icon-style icon-back-arrow prev"></span> -->
        <div class="owl-carousel md-lp-carousal owl-centered">
        @if($neutral_shoes!='')
            @foreach($neutral_shoes['products'] as $curr_ele)
                @foreach($neutral_shoes['colour_options'] as $product)
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

<!-- neutral_shoes section -->
@if(!empty($neutral_shoes))
<section class="plp-container collection-listing-conatiner hidden-mob visible-tab visible-col">
	<div class="wrapper">
		<div class="row">
            <div class="col-3 tab-4 ">
                <div class="collection-header-intro">
                    <h2>Neutral Energize Shoes</h2>
                    <div class="cat-desc">Neutral shoes are designed to let your body run without any disruption. You get all the benefits of an advanced running shoe without the specific technology that guides and corrects your body's alignment.</div>
                </div>
            </div>
            <div class="col-9 tab-8">
				<div class="plp-wrapper-container">
                    @if($neutral_shoes!='')
                    @foreach($neutral_shoes['products'] as $curr_ele)
                        @foreach($neutral_shoes['colour_options'] as $product)
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
<!-- End neutral_shoes section -->

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
      

