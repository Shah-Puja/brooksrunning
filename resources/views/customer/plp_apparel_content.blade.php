<script>
$(document).ready(function(){
	$(".remaining_swatches_show").hide();
    $(".remaining_swatches").click(function(){
        $(".remaining_swatches_show").toggle();
    });
});
</script>
<div class="plp-wrapper-container grid">
@if($styles!='' && count($styles) >0 )
	@foreach($styles as $style)
		@php 
			$price_sale = $style->variants->max('price_sale');
			$price = $style->variants->max('price');
			$filters_array[$style->style]['size'] = $style->variants->pluck('size')->all();
			$filters_array[$style->style]['color'] = $style->tags->Where('key','C_F_COLOUR')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['impact'] = $style->tags->Where('key','PS_F_IMPACT')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['cup_size'] = $style->tags->Where('key','PS_F_CUP')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['Great_For'] = $style->tags->Where('key','PS_F_GREATFOR')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['Breast_Shape'] = $style->tags->Where('key','PS_F_SHAPE')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['Feature_Preferences'] = $style->tags->Where('key','PS_F_PREFERENCE')->flatten()->pluck('value')->unique()->all();
		@endphp
     
		@foreach($products as $product)
		   @if($product->style== $style->style)
		   		@php $colors_option[$style->style][] = $product; @endphp
		   @endif
		@endforeach

		@php
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
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
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
							<img src="{{ $color_product->image->image1Thumbnail() }}" data-big="{{ $color_product->image->image1Medium() }}" class="plp-thumb--bg" alt="">
						</div>
					@endif
				@endforeach
				</div>
				
				<span class="icon-style icon-next-arrow next"></span>
			</div>
		<!-- Start mobile swatches -->
		<div class="color-wrapper--more--container visible-mob hidden-tab hidden-col">
				<div class="color-wrapper--more">
					<div class="swatches-icon">
						<img src="/images/testing/tshirt/211091_414_mf_WR.jpg" class="plp-thumb--bg"  alt="">
					</div>
					<div class="remaining_swatches_show" style="display: none;" >
						<div class="swatches-icon">
							<img src="/images/testing/tshirt/211091_414_d2_WR.jpg" class="plp-thumb--bg" alt="">
						</div>
						<div class="swatches-icon">
							<img src="/images/testing/tshirt/211091_414_d1_WR.jpg" class="plp-thumb--bg"  alt="">
						</div>
						<div class="swatches-icon">
							<img src="/images/testing/tshirt/211091_414_mf_WR.jpg" class="plp-thumb--bg"  alt="">
						</div>
					</div>
				</div>
				<div class="color-wrapper--more--add"> 
					<!-- /* For showing swatches count */ -->
					<div  class="remaining_swatches">+3</div>
						<!--  /* swatches count end */ -->
				</div>
		</div>
		<!-- End mobile swatches -->
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
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