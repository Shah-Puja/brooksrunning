@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
<style>.pdp-display-none{ display:none!important;}</style>
<section class="shoe-main-container">
<section class="create-account--header plp-header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="/">Home</a>
						</li>
						<li>
							<a href="/shoefinder">Shoes</a>
						</li>
						<li>
						<a href="JavaScript:Void(0);" class="active">Brooks {{ $shoe_info->shoe_name }}</a>
						</li>
					</ul>
				</div>
				<h1 class="br-mainheading">Brooks {{ $shoe_info->shoe_name }}</h1>
			</div>
		</div>
	</div>
</section>
<section class="shoes-container">
	<div class="wrapper">
		<div class="row">
			<div class="shoes-wrapper-container">
				<div class="mob-12 {{ ($shop_women_url=='' && $shop_men_url !='') ? 'col-12' : 'col-6' }}">
					<div class="shoes-wrapper__sub {{ ($shop_men_url==''  && $shop_women_url !='') ? 'pdp-display-none' : 'display-block' }}">
						<div class="shoe-product">
								<div class="img img-shoes">
								 @if(isset($shop_men_url) && $shop_men_url!='')
									<a href="/{{$shop_men_url}}"><img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/mens.jpg" alt=""></a>
								 @else
									<img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/mens.jpg" alt="">
								 @endif
								</div>
								@if(isset($shop_men_url) && $shop_men_url!='') 
								<div class="info">
									<div class="shoes-detail-btn">
										<span><a class="secondary-button" href="/{{$shop_men_url}}">Shop Men's</a></span>
									</div>
								</div>
								@endif
							</div>
					</div>
				</div>

				<div class="mob-12 {{ ($shop_men_url==''  && $shop_women_url !='') ? 'col-12' : 'col-6' }}">
					<div class="shoes-wrapper__sub {{ ($shop_women_url==''  && $shop_men_url !='') ? 'pdp-display-none' : 'display-block' }}">
						<div class="shoe-product">
								<div class="img img-shoes">
									@if(isset($shop_women_url) && $shop_women_url!='')
									<a href="/{{$shop_women_url}}"><img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/womens.jpg" alt=""></a>
									@else
									<img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/womens.jpg" alt="">
									@endif
								</div>
								@if(isset($shop_women_url) && $shop_women_url!='')
								<div class="info">
									<div class="shoes-detail-btn">
										<span><a class="secondary-button" href="/{{$shop_women_url}}">Shop Women's</a></span>
									</div>
								</div>
								@endif
							</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
</section>
<section class="shoes-benefits">
	<div class="wrapper">
		<div class="row">
			<div class="col-4 tab-4 mob-12">
				<div id="module1">
					{!! $shoe_info->feature_1 !!}
					<img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/feature_1.jpg" alt="ariel feature 1"> 
				</div>
			</div>
			<div class="col-4 tab-4 mob-12">
				<div id="module1">
					{!! $shoe_info->feature_2 !!}
					<img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/feature_2.jpg" alt="ariel feature 1"> 
				</div>
			</div>
			<div class="col-4 tab-4 mob-12">
				<div id="module1">
					{!! $shoe_info->feature_3 !!}
					<img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/feature_3.jpg" alt="ariel feature 1"> 
				</div>
			</div>
		</div>
	</div>
</section>
<section class="shoes-info">
	<div class="wrapper">
		<div class="row">
			@if(isset($shoe_info->video_link) && $shoe_info->video_link!='')
				<div id="desk" class="col-12 tab-12 mob-12"> 
					<div class="wrapper">
						<a href="JavaScript:Void(0);" class="utube uTube-popup--control">
								<div class="module-img">
								@php
								$url_segment=Request::segment(2);

								@endphp
								@if($url_segment=='levitate')
										<img src="{{ config('site.image_url.base_shoe_img_thumb')}}levitate2_video_img.jpg" />
								
								@elseif($url_segment=='addiction')
										<img src="{{ config('site.image_url.base_shoe_img_thumb')}}Addiction_13.PNG" />
								
								@elseif($url_segment=='glycerin')
										<img src="{{ config('site.image_url.base_shoe_img_thumb')}}Glycerin_17.JPG" />
								
								@else
										<img src="http://i3.ytimg.com/vi/{{ $shoe_info->video_link }}/maxresdefault.jpg" />
								@endif
								</div>
							<div class="play"></div>
						</a>
					</div>
				</div>
			@endif

			@if(isset($shoe_info->video_link) && $shoe_info->video_link!='')
				<div class="col-12 tab-12 mob-12">
			@else
				<div class="col-12 tab-12 mob-12">
			@endif
				<div class="para">
						<h1 class="product-name widvideo">Brooks {{ $shoe_info->shoe_name }}</h1>
	                    <div id="product-content">
	                            {!! $shoe_info->description !!}
								 <div class="features">
								 	<p><strong>Activity:</strong> {{ ucfirst($shoe_info->activity) }}</p>
								 	<p><strong>Category:</strong> {{ ucfirst($shoe_info->disp_category) }}</p>
								 	<p class="shoe-experience">
											<strong>Experience:</strong>
											@if(isset($shoe_info->experience))
												@if($shoe_info->experience == 'Cushion Me')
													<img src="{{ config('site.image_url.base_shoe_new_exp')}}cushion.png" alt="Cushion Badge" width="60" height="60" />
												@elseif ($shoe_info->experience == 'Energize Me')
													<img src="{{ config('site.image_url.base_shoe_new_exp')}}energize.svg" alt="Energize Badge" width="60" height="60" />
												@elseif ($shoe_info->experience == 'Connect Me')
													<img src="{{ config('site.image_url.base_shoe_new_exp')}}connect.png" alt="Connect Badge" width="60" height="60" />
												@elseif ($shoe_info->experience == 'Propel Me')
													<img src="{{ config('site.image_url.base_shoe_new_exp')}}speed.png" alt="Speed Badge" width="60" height="60" />
												@endif
											@endif
									</p>
								 		
								 </div>
	                    </div>
                  </div> 
			</div>
		</div>
	</div>
</section>
<section class="br-shoefinder-banner br-shoefinder-subBanner" >
	<div class="br-shoefinder-banner--wrapper">
			<div class="horizontal-shoe-finder">
					<!-- <p class="br-heading hidden-mob">Need help choosing a shoe? <span class="br-info">Try the shoe finder</span></p> -->
					<p class="br-heading hidden-mob">Need help choosing a shoe?</p>
					<!-- <p class="br-heading-mob visible-mob"><span class="finder-heading-mob">Need help choosing a shoe?</span> <br/> <span class="br-info-mob">Try the shoe finder</span></p> -->
					<p class="br-heading-mob visible-mob"><span class="finder-heading-mob">Need help choosing a shoe?</span> </p>
					<div class="row">
						<div class="col-4 tab-4 mob-12 " >&nbsp;</div>
						<div class="col-4 tab-4 mob-12 " >
							<div class="horizontal-shoefinder-logo">
								<img src="/images/shoes/shoe-lp-shoefinder-magnifylogo.png" alt="">
								<img src="/images/shoes/shoe-lp-shoefinder-logo-hzl.png" alt="">
							</div>
							<div class="horizontal-shoefinder-btn">
								<a class="primary-button" href="/shoefinder">Try the shoe finder</a>
							</div>
						</div>
						<div class="col-4 tab-4 mob-12 " >
							
						</div>
				</div>
		</div>
</section>

<!--uTube popup -->
@if(isset($shoe_info->video_link) && $shoe_info->video_link!='')
<div id="uTube-popup--wrapper" class="popup-container uTube--popup">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me"><span class="icon-close-icon uTube-popup--close"></span></div>
			<div class="uTube-info">
				<iframe class="shoe--vdo-show-iframe" src="https://www.youtube.com/embed/{{ $shoe_info->video_link }}/" frameborder="0" allowfullscreen ></iframe>
			</div>
		</div>
	</div>
</div>
@endif
<!--/uTube popup -->

</section>

@endsection
