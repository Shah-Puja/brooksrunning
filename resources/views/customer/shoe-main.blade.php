@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">
<section class="shoe-main-container">
	{{-- @php
		echo "<pre>";
        print_r($shoe_info);
        echo "</pre>";
	@endphp --}}
<section class="create-account--header plp-header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="#">Shoes</a>
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
				<div class="mob-12 col-6">
					<div class="shoes-wrapper__sub">
						<div class="shoe-product">
								<div class="img img-shoes">
									<img src="/images/shoes_new/{{ $shoe_info->shoe_type }}/mens.jpg" alt="">
								</div>
								<div class="info">
									<div class="shoes-detail-btn">
										<span><a class="secondary-button" href="#">Shop Men's</a></span>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="mob-12 col-6">
					<div class="shoes-wrapper__sub">
						<div class="shoe-product">
								<div class="img img-shoes">
									<img src="/images/shoes_new/{{ $shoe_info->shoe_type }}/womens.jpg" alt="">
								</div>
								<div class="info">
									<div class="shoes-detail-btn">
										<span><a class="secondary-button" href="#">Shop Women's</a></span>
									</div>
								</div>
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
					<img src="/images/shoes_new/{{ $shoe_info->shoe_type }}/feature_1.jpg" alt="ariel feature 1"> 
				</div>
			</div>
			<div class="col-4 tab-4 mob-12">
				<div id="module1">
					{!! $shoe_info->feature_2 !!}
					<img src="/images/shoes_new/{{ $shoe_info->shoe_type }}/feature_2.jpg" alt="ariel feature 1"> 
				</div>
			</div>
			<div class="col-4 tab-4 mob-12">
				<div id="module1">
					{!! $shoe_info->feature_3 !!}
					<img src="/images/shoes_new/{{ $shoe_info->shoe_type }}/feature_3.jpg" alt="ariel feature 1"> 
				</div>
			</div>
		</div>
	</div>
</section>
<section class="shoes-info">
	<div class="wrapper">
		<div class="row">
			<div id="desk" class="col-8 tab-8 mob-12">
				  <a class="utube">
				  	<div class="module-img">
                            <img src="/images/shoes_new/pureflow/maxresdefault.jpg" />
                     </div>
                   </a>
			</div>
			<div class="col-4 tab-4 mob-12">
				<div class="para">
						<h1 class="product-name widvideo">Brooks {{ $shoe_info->shoe_name }}</h1>
	                    <div id="product-content">
	                            {!! $shoe_info->description !!}
								 <div class="features">
								 	<p><strong>Activity:</strong> Running</p>
								 	<p><strong>Category:</strong> {{ ucfirst($shoe_info->category) }} </p>
								 	<div class="shoe-experience">
								 		<p>
								 			<strong>Experience:</strong> <img src="/images/shoes_new/pureflow/connect.png" alt="Connect Badge" width="60" height="60">
								 		</p>
									</div>
								 		
								 </div>
	                    </div>
                  </div> 
			</div>
		</div>
	</div>
</section>
<section class="br-shoefinder-banner br-shoefinder-subBanner">
	<div class="br-shoefinder-banner--wrapper">
			<div class="horizontal-shoe-finder">
					<p class="br-heading hidden-mob">Need help choosing a shoe? <span class="br-info">Try the shoe finder</span></p>
					<p class="br-heading-mob visible-mob"><span class="finder-heading-mob">Need help choosing a shoe?</span> <br/> <span class="br-info-mob">Try the shoe finder</span></p>
					<div class="row">
						<div class="col-4 tab-4 mob-12 " >&nbsp;</div>
						<div class="col-4 tab-4 mob-12 " >
									<div class="horizontal-shoefinder-btn">
										<a class="primary-button" href="#">Shoe Finder</a>
									</div>
						</div>
						<div class="col-4 tab-4 mob-12 " >
							<div class="horizontal-shoefinder-logo">
											<img src="/images/brooks-shoes--logo.png" alt="">
										</div>
						</div>
				</div>
		</div>
</section>


</section>
@endsection