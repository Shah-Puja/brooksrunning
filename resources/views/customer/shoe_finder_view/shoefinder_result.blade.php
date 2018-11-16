<!---------------------------------------- Resuls ------------------------------------------------------>
@if($result)
<div id="ss-results" >
           <div id="ss-results-header" class="grid-container row">
                <div class="col-5 rs-head">
                    <img src="/images/SS/ssRecommendedStar.png">
                    <h2>Your Results</h2>
                </div>
                <div class="col-4 last">
                    <p>
                        Category
                    </p>
                    <h3>{{ $tag }}</h3>
                </div>
                <div class="col-3 last">
                    <p>
                        Best Experience Match
                    </p>
					@php 
						$experience = Session::get('experience');
						$experience = explode("_",$experience);
						if($experience[0]=='propel'){
							$experience_img = 'speed.png';
						}elseif($experience[0]=='energize'){
							$experience_img = 'energize.svg';
						}else{
							$experience_img = $experience[0].'.png';
						}
					@endphp
                     <img id="experience" src="{{ config('site.image_url.base_shoe_new_exp').$experience_img }}" alt="Energize Badge" width="100" height="100">
                </div>
        </div>

<div id="ss-results-main">
    <div id="results-text">
        <p class="grid-container">
            We Recommend These Shoes:
        </p>
    </div>
</div>
<!-- Updated Section -->
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
					<div class="plp-wrapper-container">
                    @foreach($result['product_details'] as $curr_ele)
                        @foreach($result['colour_options'] as $product)
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
                                        @foreach(collect($colors_option[$curr_ele->style])->unique('color_code') as $color_product)
                                            @if(!empty($color_product))
                                        <div class="item">
                                            <picture>
                                                <source media="(max-width: 667px)" srcset="{{ $color_product->image->image1Medium() }}">
                                                <img src="{{ $color_product->image->image1Thumbnail() }}" data-style="{{$curr_ele->style}}" data-url="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$color_product->color_code }}.html" data-big="{{ $color_product->image->image1Medium() }}" class="plp-thumb" alt="">
                                            </picture>
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
					</div>
			    </div>
	</div>
</section>
<!-- /Updated Section -->

   </div>
  </div>
</div>
@else
<div id="ss-results" >
 <div id="ss-results-main">
    <div id="results-text">
        <p class="grid-container error-msg">
            Sorry, No Result Found! <br />Try Again.
        </p>
    </div>
</div>
</div>
@endif
<!---------->
<script>

</script>
