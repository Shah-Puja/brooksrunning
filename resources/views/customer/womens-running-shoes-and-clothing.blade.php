@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">
<section class="landingpage-banner">
	<div class="landingpage-banner--wrapper">
	<div class="opacity-cover hideen-mob"></div>
	      <picture>
	        <source media="(max-width: 595px)" srcset="images/landingpage/Womens/women_shoesbanner_mob.jpg">
	        <img src="/images/landingpage/Womens/women_shoesbanner.jpg" alt="Header Images">
	      </picture>
	      <div class="landingpage-banner--info">
	      	<div class="wrapper">
	      		<div class="row">
	      			<div class="col-12">
	      				<div class="banner--info hidden-mob">
	      					<p class="label--underline">WOMEN'S</p>
							<h1 class="br-mainheading">Running Shoes</h1>
							<a class="secondary-button" href="/womens-running-shoes">Shop Women's Shoes</a>
	      				</div>
	      				<div class="landing-info visible-mob">
	      					<div class="banner--info">
	      					<p class="label--underline">WOMEN'S</p>
							<h1 class="br-mainheading">Running Shoes</h1>
							<a class="primary-button" href="/womens-running-shoes">Shop Women's Shoes</a>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
     	  </div>
    </div>
</section>
<section class="new-arrival">
	<div class="wrapper lp-new--arrival">
		<div class="new-arrival--container">
			<div class="main-heading">
				 <h3 class="br-heading">NEW ARRIVALS</h3>
			</div>
	   		<span class="icon-style icon-back-arrow prev hidden-col"></span>
	     	<div class="owl-carousel">
			@foreach($shoes_product as $prod_key => $shoes_arrival)
	       		<div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
							<a href = "/{{$shoes_arrival->seo_name}}/{{$shoes_arrival->style}}_{{$shoes_arrival->color_code}}.html">
								<img src="{{$shoes_arrival->image->image1Medium()}}">
							</a>
		                </div>
		                <div class="prd_caption">
			              	 <h3><a class="name-link" href = "/{{$shoes_arrival->seo_name}}/{{$shoes_arrival->style}}_{{$shoes_arrival->color_code}}.html" title="{{$shoes_arrival->stylename}}">{{$shoes_arrival->stylename}}</a></h3>
			                 <h4 class="price"><span class="black">${{$shoes_arrival->variants[$prod_key]->price}}</span></h4>
		                </div>
		            </div>
				</div>
			@endforeach	
	       </div>
	       <span class="icon-style icon-next-arrow next hidden-col"></span>
	    </div>
	</div>
</section>

<section class="wrapper pr-landing-page">
	<div class="prod-desc--wrapper">
		<div class="wrapper">
			<div class="row">
				<div class="tab-6">
					<div class="lp-cate--link">
						 <div class="opacity-cover"></div>
						<img src="/images/landingpage/Womens/women_ghost11.jpg">
					    <div class="title">
					       <h2 class="happy left">New Colours<br>Ghost 11</h2>
					    </div>
					 </div>
					 <div class="lp-info-block">
							<p>Feel more connected than ever to the trail and let your feet lead the way, with lightweight cushioning and rugged protection against rocky terrain. </p>
							<a class="primary-button" href="/ghost-11-womens-running-shoes/120277_017.html">Shop Ghost 11</a>
					</div> 
				</div>
				<div class="tab-6">
					<div class="lp-cate--link">
						 	<div class="opacity-cover"></div>
							<img src="/images/landingpage/Womens/women_gts19.jpg">
						    <div class="title">
						        <h2 class="happy left">New<br>Adrenaline GTS 19</h2>
						    </div>
					</div>
					<div class="lp-info-block">
							<p>The Adrenaline GTS 19 features an innovative GuideRails support system, soft cushioning, and smooth heel-to-toe transitions. </p>
							<a class="primary-button" href="/brooks-running-shoes-adrenaline-gts-19-womens/120284_450.html">Shop Adrenaline GTS 19</a>
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
						<div class="col-4 tab-4 mob-12" >&nbsp;</div>
						<div class="col-4 tab-4 mob-12" >
									<div class="horizontal-shoefinder-btn">
										<a class="primary-button" href="/shoefinder">Shoe Finder</a>
									</div>
						</div>
						<div class="col-4 tab-4 mob-12" >
							<div class="horizontal-shoefinder-logo">
								<img src="/images/brooks-shoes--logo.png" alt="">
							</div>
						</div>
				</div>
		</div>
</section>
<section class="landingpage-banner">
	<div class="landingpage-banner--wrapper">
		<div class="opacity-cover hidden-mob"></div>
	      <picture>
	        <source media="(max-width: 595px)" srcset="/images/landingpage/Womens/women_clothingbanner_mob.jpg">
	        <img src="/images/landingpage/Womens/women_clothingbanner.jpg" alt="clothing">
	      </picture>
	      <div class="landingpage-banner--info">
	      	<div class="wrapper">
	      		<div class="row">
	      			<div class="col-12">
	      				<div class="banner--info hidden-mob">
	      					<p class="label--underline">WOMEN'S</p>
							<h1 class="br-mainheading">Running Clothes</h1>
							<a class="secondary-button" href="/womens-running-clothes">Shop Women's Clothing</a>
	      				</div>
	      				<div class="landing-info visible-mob">
	      					<div class="banner--info">
	      					<p class="label--underline">WOMEN'S</p>
							<h1 class="br-mainheading">Running Clothes</h1>
							<a class="primary-button" href="/womens-running-clothes">Shop Women's Clothing</a>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
     	  </div>
    </div>
</section>
<section class="new-arrival">
	<div class="wrapper lp-new--arrival">
		<div class="row">
			<div class="col-12">
				<div class="main-heading">
				    <h3 class="br-heading">NEW CLOTHING ARRIVALS</h3>
			    </div>
			</div>
		</div>
		<div class="new-arrival--container">
	   		<span class="icon-style icon-back-arrow prev hidden-col"></span>
	     	<div class="owl-carousel">
			@foreach($cloths_product as $prod_key => $cloths_arrival)
	       		<div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
							<a href = "/{{$cloths_arrival->seo_name}}/{{$cloths_arrival->style}}_{{$cloths_arrival->color_code}}.html">
								<img src="{{$cloths_arrival->image->image1Medium()}}">
							</a>
		                </div>
		                <div class="prd_caption">
			              	<h3><a class="name-link" href="/{{$cloths_arrival->seo_name}}/{{$cloths_arrival->style}}_{{$cloths_arrival->color_code}}.html" title="{{$cloths_arrival->stylename}}">{{$cloths_arrival->stylename}}</a></h3>
							<h4 class="price"><span class="black">${{$cloths_arrival->variants[$prod_key]->price}}</span></h4>
		                </div>
		            </div>
		        </div>
		    @endforeach    
	       </div>
	       <span class="icon-style icon-next-arrow next hidden-col"></span>
	    </div>
	</div>
</section>

<section class="wrapper pr-landing-page">
	<div class="prod-desc--wrapper">
		<div class="wrapper">
			<div class="row">
				<div class="tab-6">
					<div class="lp-cate--link">
						 	<div class="opacity-cover"></div>
							<img src="/images/landingpage/Womens/women_sportsbras.jpg">
						    <div class="title">
						       <h1 class="happy left">Women's <br/> Sports Bra's</h2>
						    </div>
					 </div>
					 <div class="lp-info-block">
							<p>A great sports bra is at the center of every woman's run. Every Brooks sports bra is engineered to support the unique needs of women everywhere. Experience the difference a Brooks Sports bra can make.</p>
							<a class="primary-button" href="/womens-sports-bras">Shop Sports Bras</a>
					</div> 
				</div>
				<div class="tab-6">
					<div class="lp-cate--link">
						 	<div class="opacity-cover"></div>
							<img src="/images/landingpage/Womens/women_tops.jpg">
						    <div class="title">
						        <h1 class="happy left">Women's<br>Tops</h2>
						    </div>
					 </div>
					 <div class="lp-info-block">
							<p>Whether you’re training for a marathon or enjoying a run around the neighbourhood, Brooks’ running tops will ensure practical functionality and a stylish look. </p>
							<a class="primary-button" href="/womens-running-tops">Shop tops</a>
					</div>
				</div>
			</div>
</section>

<section class="landingpage-info" >
	<div class="wrapper lp-info-wrapper">
		<div class="lp-info">

			<div class="lp-info-detail">
				<input id="tab-one" type="checkbox" class="tab-checkbox" name="tabs">
					<h1 class="lp-info-title">Women's Running Gear</h1>
			<p>Brooks has a wide collection of women's running gear, with footwear for both running and walking and a superior quality range of men's running clothes that have been designed and manufactured to strike the perfect balance between comfort and style.</p>
             <p class="lp-info-content"> From running shorts and singlets through to moisture-wicking running pants and jackets, we have your men's running apparel needs covered. You'll also find a great selection of high-visibility clothing that's designed to keep you safe and seen at night or in areas of low light.</p>
 	            <div class="lp-info-header">
	                <label for="tab-one" class="bold">
	                	<h3><span>+</span></h3>
	                </label>
	            </div>
			</div>
			<div class="lp-info-detail">
				<input id="tab-two" type="checkbox" class="tab-checkbox" name="tabs">
				<h1 class="lp-info-title">Women's Running Shoes</h1>
			<p>To complement your women's running gear, explore the comprehensive range of men's running shoes from Brooks. Whether you're looking for road running shoes for your evening jog, long distance running shoes for competitive endurance events, or even walking sneakers with added cushioning for enhanced comfort, </p>
             <p class="lp-info-content"> we’re sure to have the right pair to accommodate your needs. You'll even find lightweight running shoes that will make you feel like you’re running barefoot. Browse our range or use the Brooks shoe finder to determine which shoe is right for you!</p>
	            <div class="lp-info-header">
	            	<label for="tab-two" class="bold">
	                	<h3><span>+</span></h3>
	                </label>
	            </div>
	            
			</div>
			<div class="lp-info-detail">
				<input id="tab-three" type="checkbox" class="tab-checkbox" name="tabs">
				<h1 class="lp-info-title">Women’s Running Socks</h1>
			<p>More than just mere women's running accessories, your choice of socks not only determines your comfort level during your run but can also enhance your performance. Brooks compression socks help to increase blood flow throughout the body, reduce the production </p>
             <p class="lp-info-content">and build up of lactic acid, and promote faster recovery. You'll also find moisture-wicking socks that keep your feet free of sweat and unwanted moisture.</p>
	           <div class="lp-info-header">
	            	<label for="tab-three" class="bold">
	                	<h3><span>+</span></h3>
	                </label>
	            </div>
			</div>
		</div>
    </div>
</section>



@endsection