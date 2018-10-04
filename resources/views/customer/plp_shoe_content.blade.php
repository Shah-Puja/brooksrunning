<div class="plp-wrapper-container grid">
@if($styles!='' && count($styles) >0 )
    @php $colors_option=[]; @endphp
	@foreach($styles as $style)
		@php 
			$price_sale = $style->variants->max('price_sale');
			$price = $style->variants->max('price');
			$filters_array[$style->style]['size'] = $style->variants->pluck('size')->all();
			$filters_array[$style->style]['width'] = $style->variants->pluck('width_name')->all();
			$filters_array[$style->style]['color'] = $style->tags->Where('key','C_F_COLOUR')->flatten()->pluck('value')->unique()->all();
			$filters_array[$style->style]['support_level'] = $style->tags->Where('key','PF_F_SLEVEL')->flatten()->pluck('value')->unique()->all();
            $filter_arrays = collect($filters_array)->flatten()->unique()->all();
			$replace_word = array('.',' '); 
			$filter_class = implode(' ',str_replace($replace_word,'-',$filter_arrays));
		@endphp

		@foreach($products as $product)
		   @if($product->style== $style->style)
		   		@php $colors_option[$style->style][] = $product; @endphp
		   @endif
		@endforeach
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
					<img id="plp-img" src="{{ $style->image->image1Original() }}" alt="">
				</div>
			</a>
			<div class="more-color--container">
				<span class="icon-style icon-back-arrow prev"></span>
				<div class="owl-carousel owl-theme">
					@foreach($colors_option[$style->style] as $color_product)
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
						<img src="/images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Widths Available</li>
							</ul>
						</a>
						</div>
					</div>
					@endforeach
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
							<p>Neutral Speed</p>
						</div>
						<div class="mob-6">
							<p class="right">Width Available</p>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	@endforeach
	<div class="plp-load-more" style="display:none">
		<a href="#">Load More (15 Remaining)</a>
	</div>
@else
    <p>No products found</p>
@endif
</div>