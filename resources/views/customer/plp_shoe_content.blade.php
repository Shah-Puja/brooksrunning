<div class="plp-wrapper-container grid">
@if($styles!='' && count($styles) >0 )
    @php $colors_option=array(); @endphp
	@foreach($styles as $style)
		@php 
			$price_sale = $style->variants->max('price_sale');
			$price = $style->variants->max('price');
			$filters_array[$style->style]['size'] = $style->variants->pluck('size')->all();
			//$filters_array[$style->style]['width'] = $style->variants->pluck('width_name')->all();
			$filters_array[$style->style]['experience'] = $style->experience;
			$filters_array[$style->style]['color'] = $style->tags->Where('key','C_F_COLOUR')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['support_level'] = $style->tags->Where('key','PF_F_SLEVEL')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['Arch'] = $style->tags->Where('key','PF_F_ARCH')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['Activity'] = $style->tags->Where('key','PF_F_ACTIVITY')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['Midsole_Drop'] = $style->tags->Where('key','PF_F_DROP')->flatten()->pluck('value')->unique()->all();
		@endphp

		@foreach($products as $product)
		   @if($product->style== $style->style)
		   		@php $colors_option[$style->style][] = $product; @endphp
		   @endif
		@endforeach

		@php

		    $filters_array[$style->style]['width'] = collect($colors_option[$style->style])->transform(function ($product) {
														return $product->variants->where('visible','Yes')->pluck('width_name');
												 })->flatten()->unique()->values()->sort();

	     	$filter_arrays = collect($filters_array[$style->style])->flatten()->unique()->all();
			$replace_word = array('.',' ','/'); 
			$filter_class = implode(' ',str_replace($replace_word,'-',$filter_arrays));
		@endphp

	<div class="mob-6 col-4 plp-wrapper__sub element-item {{ $filter_class }}">
		<div class="plp-product">
			<div class="offer-info">
				<!--<span>NEW</span>-->
				@if($price_sale < $price)
					<span class="sale">SALE</span>
				@endif
			</div>
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="hidden-mob">
				<div class="img img-shoes">
					<img id="plp-img" src="{{ $style->image->image1Medium() }}" alt="">
				</div>
			</a>
			<div class="more-color--container">
				<span class="icon-style icon-back-arrow prev"></span>
				<div class="owl-carousel owl-theme">
				
				@if($colors_option[$style->style]!='' &&  count($colors_option[$style->style]) > 0 )
					@foreach(collect($colors_option[$style->style])->unique('color_code') as $color_product)
						@if(!empty($color_product))
						    @php
								$img_url = config('site.image_url.products.thumbnail') .str_replace(".jpg","_t.jpg",$color_product['image']['image1']);
								$img_url_medium = config('site.image_url.products.medium') .str_replace(".jpg","_v.jpg",$color_product['image']['image1']);
							@endphp
							
							<div class="item">
								<picture>
								<source media="(max-width: 667px)" srcset="{{ $img_url_medium }}">
								<img src="{{ $img_url }}" data-big="{{ $img_url_medium }}" class="plp-thumb" alt="">
								</picture>
								<div class="plp-mob--info visible-mob">
								<a href="/{{$style->seo_name}}/{{$style->style}}_{{$color_product->color_code}}.html">
									<ul>
										<li>{{ count($colors_option[$style->style]) }} Colours</li>
										<li class="no-pad">Widths Available</li>
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
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
				<div class="info">
					<h3>{{ $style->stylename }}</h3>
					<div class="price">
						@if($price_sale < $price)
							<del><span class="black">&dollar;{{ $price }}</span></del>
							<span class="red price_text">&dollar;{{ $price_sale }}</span>
						@else
							<span class="black price_text">&dollar;{{ $price }}</span>
						@endif
					</div>
					<div class="shoes-type">{{ $style->h2 }}</div>
				</div>
				<div class="info-sub">
					<div class="row">
						<div class="mob-6">
							<!--<p>Neutral Speed</p>-->
						</div>
						<div class="mob-6">
						    @php 
							
							@endphp
							<p class="right"> {{ count( $filters_array[$style->style]['width']) }} Width Available</p>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	@endforeach
	
@else
    <p>No products found</p>
@endif
</div>