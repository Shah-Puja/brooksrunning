<!---------------------------------------- Resuls ------------------------------------------------------>
@extends('customer.layouts.master')
@section('content')

<div class="create-account--header plp-header">
  <div class="wrapper">
    <div class="row">
      <div class="col-8">
      	<div class="about-header">
      	<div class="breadcrumbs">
					<ul>
						<li>
							<a href="/">Home</a>
						</li>
                        <li>
						 @switch($gender)
                            @case('men')
								<a href="/mens-running-shoes-and-clothing">Men's</a>
								@break
                            @case('women')
                                <a href="/womens-running-shoes-and-clothing">Women's</a>
                                @break
                         @endswitch
						</li>
						<li>
							<a href="JavaScript:Void(0);" class="active">Best Selling Shoes</a>
						</li>
					</ul>
				</div>
                <h1 class="br-mainheading">Best Selling Shoes</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
					<div class="plp-wrapper-container">
                    @if($products)
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
                            $width_array[$curr_ele->style]['width'] = collect($colors_option[$curr_ele->style])->transform(function ($product) {
														return $product->variants->where('visible','Yes')->pluck('width_name');
												 })->flatten()->unique()->values()->sort();
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
                                    @if($colors_option[$curr_ele->style]!='' &&  count($colors_option[$curr_ele->style]) > 0 )
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
                                                        <li>{{ count($colors_option[$curr_ele->style]) }} Colours</li>
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
										<h3>{{ $curr_ele->stylename }} </h3>
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
@else
<p>Sorry, No Result Found! <br />Try Again.</p>

@endif
					</div>
			    </div>
	</div>
</section>

<!-- /Updated Section -->
    
@endsection       
      

