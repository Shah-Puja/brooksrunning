<!---------------------------------------- Resuls ------------------------------------------------------>
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
<div class="wrapper">
    <div class="row">
        <div class="col-6">
            <div class="product-name">
                <h3>
                    <a class="sf-name-link" href="/{{ $result['product_details'][0]['seo_name'].'/'.$result['product_details'][0]['style'].'_'.$result['product_details'][0]['color_code'] }}.html" title="{{ $result['product_details'][0]['stylename'] }}">
					{{ $result['product_details'][0]['stylename'] }} </a>
                </h3>
            </div>
            <h3 class="ssDesc"> {{ $result['shoe_detail'][0]['subtext'] }}</h3>
			@php 
			   $bullets = (isset($result['shoe_detail'][0]['bullet_points'])) ? explode("|",$result['shoe_detail'][0]['bullet_points']) : '';
			@endphp
			@if($bullets!='')
				<ul class="ssBullets">
					@foreach($bullets as $bullet)
						<li> {{ $bullet }} </li>
					@endforeach
				</ul>
			@endif
				
			@php
                $max_price =$result['product_details'][0]['variants']->pluck('price')->max();
                $max_price_sale = $result['product_details'][0]['variants']->pluck('price_sale')->max();
                $min_price = $result['product_details'][0]['variants']->pluck('price')->min();
                $min_price_sale = $result['product_details'][0]['variants']->pluck('price_sale')->min();
			@endphp
            <div class="product-pricing">
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
            <a href="/{{ $result['product_details'][0]['seo_name'].'/'.$result['product_details'][0]['style'].'_'.$result['product_details'][0]['color_code'] }}.html" class="button shop_now">shop now</a>
        </div>
        <div class="col-6 product-tile ">

                <div class="product-image custom-image">
                    <div class="callout-display">
                        <img src="images/category/updated/runsig_icon_stacked_cushion.svg" alt="" width="100" height="100">
                    </div>
                    <img  src="{{ $result['product_details'][0]->image->image1Large() }} " alt="" title="" style="padding-top:5px;">
               
            </div>
        </div>
    </div>
</div>  
<section class="plp-container">
<div class="wrapper">
    <div class="row">
        <div class="col-12 tab-12">
            <div class="row">
                <div class="plp-wrapper-container">
            @foreach($result['product_details']->splice(1) as $curr_ele)

                    @php
                        $max_price =$curr_ele['variants']->pluck('price')->max();
                        $max_price_sale = $curr_ele['variants']->pluck('price_sale')->max();
                        $min_price = $curr_ele['variants']->pluck('price')->min();
                        $min_price_sale = $curr_ele['variants']->pluck('price_sale')->min();
                    @endphp

                    <div class="mob-6 col-4 plp-wrapper__sub">
                        <div class="plp-product">
                            <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="hidden-mob">
                                <div class="img img-shoes">
                                    <div class="recomm-display">
                                    <div class="callout cushion">
                                    </div>
                                </div>
                                    <img id="plp-img" src="{{ $curr_ele->image->image1Medium() }}" alt="">
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
                            <a href="detail-shoes.php">
                                <div class="info">
                                    <div class="product-name">
                            <h3>
                            <a class="sf-name-link" href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" title="">
                            {{  $curr_ele->stylename }}</a>
                            </h3>
                        </div>
                                    <h3 class="ssDesc">springy &amp; balanced</h3>
                                    <ul class="ssBullets">
                                    <li> Fun, addicting spring in every step</li>
                                    <li> Tuned for responsiveness and energy return</li>
                                    <li> Balanced support</li>
                                    </ul>
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
                                    <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="button shop_now recom-btn col-6 mob-12">shop now</a>
                                </div>
                            </a>
                        </div>
                    </div>
            @endforeach
   </div>
</section>
</div>
<!---------->
