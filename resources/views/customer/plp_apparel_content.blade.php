<div class="plp-wrapper-container">
@if($styles!='' && count($styles) >0 )
	@foreach($styles as $style)
		@php 
			$price_sale = $style->variants->max('price_sale');
			$price = $style->variants->max('price');
		@endphp
	<div class="mob-6 col-4 plp-wrapper__sub">
		<div class="plp-product">
			<div class="offer-info">
				<!--<span>NEW</span>-->
				@if($price_sale < $price)
					<span class="sale">SALE</span>
				@endif
			</div>
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
				<div class="plp-main--img--wrapper" style="background-image: url('{{ $style->image->image1Original() }}')"></div>
			</a>
			<div class="more-color--container more-clothing">
				<span class="icon-style icon-back-arrow prev"></span>
				<div class="owl-carousel-clothing owl-theme">
					<div class="item">
						<img src="/images/testing/tshirt/211091_414_mf_WR.jpg" data-big="images/testing/tshirt/211091_414_mf_WR.jpg" class="plp-thumb--bg" alt="">
					</div>
					<div class="item">
						<img src="/images/testing/tshirt/211091_414_mb_WR.jpg" data-big="images/testing/tshirt/211091_414_mb_WR.jpg" class="plp-thumb--bg" alt="">
					</div>
					<div class="item">
						<img src="/images/testing/tshirt/211091_414_ma_WR.jpg" data-big="images/testing/tshirt/211091_414_ma_WR.jpg" class="plp-thumb--bg" alt="">
					</div>
					<div class="item">
						<img src="/images/testing/tshirt/211091_414_d2_WR.jpg" data-big="images/testing/tshirt/211091_414_d2_WR.jpg" class="plp-thumb--bg" alt="">
					</div>
					<div class="item">
						<img src="/images/testing/tshirt/211091_414_d1_WR.jpg" data-big="images/testing/tshirt/211091_414_d1_WR.jpg" class="plp-thumb--bg" alt="">
					</div>
				</div>
				<span class="icon-style icon-next-arrow next"></span>
			</div>
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
				<div class="info">
					<h3>{{ strip_tags($style->stylename) }}</h3>
					<div class="price">
						@if($price_sale < $price)
							<del><span class="black">&dollar;{{ $price }}</span></del>
							<span class="red">&dollar;{{ $price_sale }}</span>
						@else
							<span class="black">&dollar;{{ $price }}</span>
						@endif
					</div>
					<div class="shoes-type">{{ strip_tags($style->h2) }}</div>
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
	<div class="plp-load-more">
		<a href="#">Load More (5 Remaining)</a>
	</div>
@endif
</div>