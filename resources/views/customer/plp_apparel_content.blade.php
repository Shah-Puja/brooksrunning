<div class="plp-wrapper-container grid">
@if($styles!='' && count($styles) >0 )
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

			$filters_array[$style->style]['color'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','C_F_COLOUR');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['impact'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PS_F_IMPACT');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['cup_size'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PS_F_CUP');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['Great_For'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PS_F_GREATFOR');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['Breast_Shape'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PS_F_SHAPE');
							})->flatten()->pluck('value')->unique();

			$filters_array[$style->style]['Support_Preference'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PS_F_SUPPORT');
							})->flatten()->pluck('value')->unique();	

			$filters_array[$style->style]['Feature_Preferences'] = collect($colors_option[$style->style])->transform(function ($product) {
					            return $product->tags->Where('key','PS_F_PREFERENCE');
							})->flatten()->pluck('value')->unique();

		    $filter_arrays = collect($filters_array[$style->style])->flatten()->unique()->all();
			$replace_word = array('.',' ','/'); 
			$filter_class = implode(' ',str_replace($replace_word,'-',$filter_arrays));
		@endphp
	<div class="mob-6 col-4 plp-wrapper__sub element-item {{ $filter_class }}" data-main-id="{{ $style->style }}">
		<div class="plp-product"  data-release-dt ="{{ str_replace('-','',$style->variants->pluck('release_date')->first()) }}">
			<div class="offer-info">
				<!--<span>NEW</span>-->
				@if($price_sale < $price)
					<span class="sale">SALE</span>
				@endif
			</div>
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="main_link">
				<div class="plp-main--img--wrapper" style="background-image: url('{{ $style->image->image1Mediumx() }}')"></div>
			</a>
			<div class="more-color--container more-clothing hidden-mob">
				<span class="icon-style icon-back-arrow prev"></span>
				<div class="owl-carousel-clothing owl-theme">
				@foreach(collect($colors_option[$style->style])->unique('color_code') as $color_product)
					@if(!empty($color_product))
						<!--@php
							$img_url = config('site.image_url.products.thumbnail') .str_replace(".jpg","_t.jpg",$color_product['image']['image1']);
							$img_url_medium = config('site.image_url.products.medium') .str_replace(".jpg","_v.jpg",$color_product['image']['image1']);
						@endphp-->
						<div class="item">
							<img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$style->style}}" data-url="/{{$style->seo_name}}/{{$style->style}}_{{$color_product->color_code}}.html" data-big="{{ $color_product->image->image1Mediumx() }}" class="plp-thumb--bg" alt="">
						</div>
					@endif
				@endforeach
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
				    @foreach(collect($colors_option[$style->style])->unique('color_code') as $color_product)
					    @php 
						   $add_class = '';
						   $add_css = '';
						   if(($i > 3 )){
							    $add_class = 'remaining';
								$add_css = 'style=display:none;';
                                $remaining_count++;
						   }
						@endphp
						
						<div class="swatches-icon {{ $add_class }} "  {{ $add_css }}>
						  <img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$style->style}}" data-url="/{{$style->seo_name}}/{{$style->style}}_{{$color_product->color_code}}.html" data-big="{{ $color_product->image->image1Mediumx() }}" class="plp-thumb--bg"  alt="">
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
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="main_link">
				<div class="info">
					<h3>{{ strip_tags($style->stylename) }}</h3>
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
					<div class="shoes-type">{{ strip_tags($style->h2) }}</div>
				</div>
				<!--<div class="info-sub">
					<div class="row">
						<div class="mob-6">
							<p>Neutral Speed</p>
						</div>
						<div class="mob-6">
							<p class="right">Width Available</p>
						</div>
					</div>
				</div>-->
			</a>
		</div>
	</div>
	@endforeach
@else
    <p>No products found</p>
@endif
</div>