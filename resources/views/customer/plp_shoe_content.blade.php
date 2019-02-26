<div class="plp-wrapper-container grid">
@if($styles!='' && count($styles) >0 )
    @php $colors_option=array(); @endphp
	@foreach($styles as $style)

		@foreach($products as $product)
		   @if($product->style== $style->style)
		   		@php $colors_option[$style->style][] = $product; @endphp
		   @endif
		@endforeach

		@php  
		    $price_sale = $style->variants->max('price_sale');
			$price = $style->variants->max('price');
		    $max_price = collect($colors_option[$style->style])->transform(function ($product) {
								return $product->variants->pluck('price');
							})->flatten()->max();

			$max_price_sale = collect($colors_option[$style->style])->transform(function ($product) {
								return $product->variants->pluck('price_sale');
							})->flatten()->max();

			$min_price = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->variants->pluck('price');
							})->flatten()->min();
							
			$min_price_sale = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->variants->pluck('price_sale');
							})->flatten()->min();

			$filters_array[$style->style]['size'] =  collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->variants->pluck('size');
							})->flatten()->unique()->values();

			$filters_array[$style->style]['experience'] = $style->experience;

			
			$filters_array[$style->style]['color'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','C_F_COLOUR');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['support_level'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PF_F_SLEVEL');
							})->flatten()->pluck('value')->unique();

			
			$filters_array[$style->style]['Arch'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PF_F_ARCH');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['Activity'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PF_F_ACTIVITY');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['Midsole_Drop'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PF_F_DROP');
							})->flatten()->pluck('value')->unique();

		    $filters_array[$style->style]['width'] = collect($colors_option[$style->style])->transform(function ($product) {
														return $product->variants->where('visible','Yes')->pluck('width_name');
												 })->flatten()->unique()->values()->sort();

	     	$filter_arrays = collect($filters_array[$style->style])->flatten()->unique()->all();
			$replace_word = array('.',' ','/'); 
			$filter_class = implode(' ',str_replace($replace_word,'-',$filter_arrays));
		@endphp

	<div class="mob-6 col-4 plp-wrapper__sub element-item {{ $filter_class }}" data-main-id="{{ $style->style }}">
		<div class="plp-product" data-release-dt ="{{ str_replace('-','',$style->variants->pluck('release_date')->first()) }}">
			<div class="offer-info">
				<!--<span>NEW</span>-->
				@if($price_sale < $price)
					<span class="sale">SALE</span>
				@endif
			</div>
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="hidden-mob main_link">
				<div class="img img-shoes">
					<img id="plp-img" src="{{ $style->image->image1Medium() }}" alt="">
				</div>
			</a>
			<div class="more-color--container">
				<span class="icon-style icon-back-arrow prev"></span>
				<div class="owl-carousel owl-theme">
				
				@if($colors_option[$style->style]!='' &&  count($colors_option[$style->style]) > 0 )
					@foreach(collect($colors_option[$style->style])->unique('color_code')->sortBy('seqno') as $color_product)
						@if(!empty($color_product))
						   <!-- @php
								$img_url = config('site.image_url.products.thumbnail') .str_replace(".jpg","_t.jpg",$color_product['image']['image1']);
								$img_url_medium = config('site.image_url.products.medium') .str_replace(".jpg","_v.jpg",$color_product['image']['image1']);
							@endphp -->

							@php 

							$filters_array_color[$style->style][$color_product->color_code]['size'] =  collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
					            return $product->variants->pluck('size');
							})->flatten()->unique()->values();

							$filters_array_color[$style->style][$color_product->color_code]['width']=collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
														return $product->variants->where('visible','Yes')->pluck('width_name');
												 })->flatten()->unique()->values()->sort();

							$filters_array_color[$style->style][$color_product->color_code]['color'] = collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
					            return $product->tags->Where('key','C_F_COLOUR');
							})->flatten()->pluck('value')->unique();

							$filters_array_color[$style->style][$color_product->color_code]['support_level'] = collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
												return $product->tags->Where('key','PF_F_SLEVEL');
											})->flatten()->pluck('value')->unique();

							
							$filters_array_color[$style->style][$color_product->color_code]['Arch'] = collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
												return $product->tags->Where('key','PF_F_ARCH');
											})->flatten()->pluck('value')->unique();

							$filters_array_color[$style->style][$color_product->color_code]['Activity'] = collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
												return $product->tags->Where('key','PF_F_ACTIVITY');
											})->flatten()->pluck('value')->unique();

							$filters_array_color[$style->style][$color_product->color_code]['Midsole_Drop'] = collect($colors_option[$style->style])->where('color_code',$color_product->color_code)->transform(function ($product) {
												return $product->tags->Where('key','PF_F_DROP');
											})->flatten()->pluck('value')->unique();

							$filters_array_color[$style->style][$color_product->color_code]['experience'] = $style->experience;
							
							$filter_arrays_color = collect($filters_array_color[$style->style][$color_product->color_code])->flatten()->unique()->all();
							$replace_word = array('.',' ','/'); 
							$filter_class_color = implode(' ',str_replace($replace_word,'-',$filter_arrays_color));
							@endphp 
							<div class="item {{ $filter_class_color}}" data-style="{{$style->style}}">
								<a href="/{{$color_product->seo_name}}/{{$style->style}}_{{$color_product->color_code}}.html">
								<picture>
								<source media="(max-width: 667px)" srcset="{{ $color_product->image->image1Medium() }}">
								<img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$style->style}}" data-big="{{ $color_product->image->image1Medium() }}" data-url="/{{$color_product->seo_name}}/{{$style->style}}_{{$color_product->color_code}}.html" class="plp-thumb" alt="">
								</picture>
								</a>
								<div class="plp-mob--info visible-mob">
								<a href="/{{$color_product->seo_name}}/{{$style->style}}_{{$color_product->color_code}}.html">
								@php  $width_count = count( $filters_array[$style->style]['width']); @endphp
									<ul>
										<li>{{ count(collect($colors_option[$style->style])->unique('color_code')) }} Colours</li>
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
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="main_link">
				<div class="info">
					<h3>{{ $style->stylename }}</h3>
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
					<div class="shoes-type">{{ $style->h2 }}</div>
				</div>
				<div class="info-sub">
					<div class="row">
						<div class="mob-6">
							<!--<p>Neutral Speed</p>-->
						</div>
						<div class="mob-6">
							<p class="right"> {{ $width_count }} {{ ($width_count > 1 ) ? 'Widths' : 'Width' }} Available</p>
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