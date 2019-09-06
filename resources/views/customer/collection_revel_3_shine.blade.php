@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
<style>
@media screen and (orientation: landscape){
    .plp-wrapper-container .plp-wrapper__sub .plp-product .more-color--container .owl-carousel .owl-item {
        width: 215px !important;
    }
}
/* CSS  only for revel 3 */


    .plp-wrapper-container .plp-wrapper__sub{
        margin: 15px 0 16px;
    }
/* End revel 3 css */
/* CSS only for this page */
.plp-wrapper-container .plp-wrapper__sub .plp-product .more-color--container .owl-carousel{
    max-width: 325px !important;     width: 100% !important; 
}

@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) 
and (orientation : landscape) {
    .plp-wrapper-container .plp-wrapper__sub .plp-product .more-color--container .owl-carousel {
          width: 90% !important;
    }
    .plp-wrapper-container .plp-wrapper__sub .plp-product .more-color--container .owl-carousel .owl-item {
        width: 54px !important;
    }
}

/* 
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/

@media (min-width: 1281px) {
  
    .plp-wrapper-container .plp-wrapper__sub .plp-product .more-color--container .owl-carousel .owl-item {
        width: 54px !important;
    }
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  
    .plp-wrapper-container .plp-wrapper__sub .plp-product .more-color--container .owl-carousel .owl-item {
        width: 54px !important;
    }
  
}

   </style>

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
                                            <a href="JavaScript:Void(0);" class="active">Revel 3 Shine Collection</a>
                                         </li>
                                    </ul>
                                </div>
                            </div>
                            <h1 class="large">Add shine to your grind. </h1>
                        <p class="type">Introducing the Shine Collection: brilliant new colors for the Revel 3. Versatile performance and BioMoGo DNA cushioning with sunrise-to-sunset style.
                        </p>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>
            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                <img src="/images/Limited-Edition/revel3-shinecollection-categoryimage.jpg">
            </div>
        </div>
</div>

<div class="create-account--header plp-header collection-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
      	<div class="about-header">
            <h1 class="br-mainheading">Your time to shine with the new Revel 3</h1>
            <p>Beat your mile and style limits in one comfortable go. Introducing our Shine Collection: shimmering new colors for the Revel 3. Comfortable fit, check. BioMoGo DNA cushion, check. Shine for your grind, check.</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
					<div class="plp-wrapper-container">
                    
                    @if($products!=''  && count($products) >0 )
                    @foreach($products as $curr_ele)
                        @foreach($colour_options as $product)
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

						<div class="mob-6 col-4 tab-4 plp-wrapper__sub" data-main-id="{{ $curr_ele->style }}">
							<div class="plp-product">
								<a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="hidden-mob  main_link">
									<div class="collection-img img-collection-shoes">
										<img id="plp-img" class="collection-plp-img" src="{{ $curr_ele->image->image1Medium() }}" alt="">
									</div>
								</a>
								<div class="more-color--container hidden-col hidden-tab">
									<!-- <span class="icon-style icon-back-arrow prev"></span> -->
									<div class="owl-carousel owl-theme" >
                                    @if(!empty($colors_option[$curr_ele->style]) &&  count($colors_option[$curr_ele->style]) > 0 )
                                        @php 
                                            $sorted = collect($colors_option[$curr_ele->style])->unique('color_code')->sortBy(function ($item, $key) use ($curr_ele) {
                                                return ($curr_ele->color_code == $item->color_code) ? 0  : 1 ;
                                        });
                                        @endphp
                                        @foreach( $sorted as $color_product)
                                            @if(!empty($color_product))
                                        <div class="item">
                                            <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$color_product->color_code }}.html" class="hidden-mob-landscape">
                                            <picture>
                                                <source media="(max-width: 667px)" srcset="{{ $color_product->image->image1Medium() }}">
                                                <img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$curr_ele->style}}" data-url="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$color_product->color_code }}.html"  data-big="{{ $color_product->image->image1Medium() }}" class="plp-thumb" alt="">
                                            </picture>
                                            </a>
                                            <div class="plp-mob--info hidden-mob hidden-col hidden-tab">
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
									<!-- <span class="icon-style icon-next-arrow next"></span> -->
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
								</a>
							</div>
						</div>
						<!--- div -->
                        @endforeach
@else
<p class="error-msg-listing">Sorry, No Result Found! <br />Try Again.</p>

@endif
					</div>
			    </div>
	</div>
</section>

<section class="wrapper pr-collection-page pr-0 pl-0">
	<div class="prod-desc--wrapper">
		<div class="wrapper">
			<div class="row">
				<div class="tab-6 padding_0">
					<div class="collection-cate--link">
							<picture>
                                <source media="(max-width: 667px)" srcset="/images/Limited-Edition/shine_img_1.jpg">
                                <img src="/images/Limited-Edition/shine_img_1_2x.jpg"  alt="">
                            </picture>
					 </div>
				</div>
				<div class="tab-6 padding_0">
					<div class="collection-cate--link">
							 <picture>
                                <source media="(max-width: 667px)" srcset="/images/Limited-Edition/shine_img_2.jpg">
                                <img src="/images/Limited-Edition/shine_img_2_2x.jpg"  alt="">
                            </picture>
						   
					 </div>
				</div>
			</div>
</section>

<section class="wrapper pr-collection-page collectionpg-bottom--banner pr-0 pl-0">
	<div class="prod-desc--wrapper">
		<div class="wrapper">
			<div class="row">
				<div class="tab-12 col-12 padding_0">
                    <picture>
                        <source media="(max-width: 595px)" srcset="/images/Limited-Edition/shine_img_3.jpg">
                        <img src="/images/Limited-Edition/shine_img_3_2x.jpg" alt="shoes">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /Updated Section -->
    
@endsection       
      

