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
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="hidden-mob">
				<div class="img img-shoes">
					<img id="plp-img" src="{{ $style->image->image1Original() }}" alt="">
				</div>
			</a>
			<div class="more-color--container">
				<span class="icon-style icon-back-arrow prev"></span>
				<div class="owl-carousel owl-theme">
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
						<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
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
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
						<img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Width available</li>
							</ul>
						</a>
						</div>
					</div>
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
						<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Width available</li>
							</ul>
						</a>
						</div>
					</div>
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
						<img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Width available</li>
							</ul>
						</a>
						</div>
					</div>
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
						<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Width available</li>
							</ul>
						</a>
						</div>
					</div>
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
						<img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Width available</li>
							</ul>
						</a>
						</div>
					</div>
					<div class="item">
						<picture>
						<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
						<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
						</picture>
						<div class="plp-mob--info visible-mob">
						<a href="detail-apparel.php">
							<ul>
								<li>3 Colours</li>
								<li class="no-pad">Width available</li>
							</ul>
						</a>
						</div>
					</div>
				</div>
				<span class="icon-style icon-next-arrow next"></span>
			</div>
			<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
				<div class="info">
					<h3>{{ $style->stylename }}</h3>
					<div class="price">
						@if($price_sale < $price)
							<del><span class="black">&dollar;{{ $price }}</span></del>
							<span class="red">&dollar;{{ $price_sale }}</span>
						@else
							<span class="black">&dollar;{{ $price }}</span>
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
@endif
</div>