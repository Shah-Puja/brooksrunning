@extends('customer.layouts.master')
@section('content')

@if(!empty($banner))
	{!! $banner->html_section !!}
@endif

<section class="homepage-container">
	  <div class="wrapper">
		   <div class="row">
		     <div class="mob-6 pr-0">
		       <div class="top_prd_sec">
		          <picture>
			        <source media="(max-width: 595px)" srcset="/images/home/20190703/hp_shop_w_mobile.jpg">
			        <img src="/images/home/20190703/hp_shop_w.jpg" alt="Header Images" width="100%">
			      </picture>
		          <div class="button_fixed">
		       			<a class="primary-button" href="/womens-running-shoes-and-clothing">Shop Women's</a>
		       	  </div>
		       </div>
		     </div>
		     <div class="mob-6 pl-0">
		       <div class="top_prd_sec">
		          <picture>
			        <source media="(max-width: 595px)" srcset="/images/home/20190703/hp_shop_m_mobile.jpg">
			        <img src="/images/home/20190703/hp_shop_m.jpg" alt="Header Images" width="100%">
			      </picture>
		          <div class="button_fixed">
				  <a class="primary-button" href="/mens-running-shoes-and-clothing">Shop Men's</a>
		          </div>
		       </div>
		     </div>
		   </div>
	  </div>
</section>
<section class="wrapper">
	<div class="row">
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper"> 
					<img src="/images/home/20190910/hp_sm_revel_shine.jpg">
			        <h3>&nbsp;<br/>Revel 3 Shine</h3>
				</div>
				<div class="info-wrapper">
					<p>Versatile performance and BioMoGo DNA cushioning with sunrise-to-sunset style.</p>
					<a href="/collections/revel-3-shine-collection">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					<!-- <span class="right-link"><a href="/brooks-running-shoes-revel-3-mens/110314_088.html">Shop men's <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a></span>				 -->
				</div>
			</div>
		</div>
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper">
					<img src="/images/home/20190715/hp_sm_gts19-m.jpg">
			        <h3>&nbsp; <br/>Adrenaline GTS 19 </h3>
				</div>
				<div class="info-wrapper">
					<p>Our latest Go-To-Shoe now has our GuideRails holistic support system plus soft yet responsive cushioning.</p>
					<!-- <br/>&nbsp;  </p> -->
					<a href="/brooks-running-shoes-adrenaline-gts-19-mens/110294_069.html">Shop men's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					<span class="right-link"><a href="/brooks-running-shoes-adrenaline-gts-19-womens/120284_028.html">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a></span>
				</div>
			</div>
		</div>
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper">
					<img src="/images/home/20190910/hp_sm_ghost12_splash.jpg">
			        <h3>&nbsp; <br/> Make a splash! </h3>
				</div>
				<div class="info-wrapper">
					<p>Forget about paint by numbers. The Ghost 12 splash collection is all about colouring outside the lines.</p>
					<!-- <br/>&nbsp;  </p> -->
					<a href="/collections/ghost-saturation">Shop the collection <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a>
					<!-- <span class="right-link"><a href="/brooks-running-shoes-ghost-12-womens/120305_413.html">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a></span> -->
				</div>
			</div>
		</div>
	</div>
</section>
<section class="homepage-signup">
	<div class="wrapper">
		<div class="row">
	  		<div class="col-4 tab-12">
	    		<div class="homepage-signup--wrapper info">
		     		<h3 class="br-heading">Sign up to the run down</h3>
		            <p>Keep up to date with all the latest news, special offers, events, competitions and tips to keep you running happy!</p>
	            </div>
	        </div>
			<!--<form name="subscriber_news1" method='post' action='/meet_brooks/enewsletter'>-->
			<form name="subscriber_news1" method='post' action='/meet_brooks/newsletter_signup'>
				@csrf
				<div class="col-3 tab-6">
					<div class="homepage-signup--wrapper">
						<div class="input-wrapper">
						<input type="text" name="name" placeholder="Name" class="input-field">
						</div>
					</div>
				</div>
				<div class="col-3 tab-6">
					<div class="homepage-signup--wrapper">
						<div class="input-wrapper">
							<input type="text" name="email" placeholder="Email" class="input-field">
						</div>
					</div>
				</div>
				<div class="col-2 tab-4">
					<div class="homepage-signup--wrapper">
						<div class="btn">
							<button type="submit" class="secondary-button">Continue</button>
						</div>
					</div>
				</div>
			</form>
	    </div>
	</div>
</section>
<section class="homepage-gray--container">
	<div class="wrapper">
		<div class="row">
			<div class="tab-4">
			<div class="hpgray-wrapper">
				<div class="homepage-cate--link">
					<img src="/images/home/hp_sm4.jpg">
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">Gear Up</h3>
					<p>It’s not just the shoes. Clothing cleverly engineered for comfort and mobility, helping you run better, faster, and happier.</p>
					<a href="/womens-running-clothes">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					<span class="right-link"><a href="/mens-running-clothes">Shop men's <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a></span>
				</div>
			</div>
			</div>
			<div class="tab-4">
			<div class="hpgray-wrapper">
				<div class="homepage-cate--link shoe-finder">
					<h3 class="br-heading">Need help choosing a shoe?</h3>
					<p class="br-info">Try the shoe finder</p>
					<!-- <img src="/images/brooks-shoes--logo.png" alt=""> -->
				    <div class="btn">
				        <a href="/shoefinder" class="primary-button">Shoe Finder</a>
				    </div>
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">Shoe Finder</h3>
					<p>Our Shoe Finder is like Tinder for your feet. Uses your biomechanics, preferences and running science to find the ideal shoe for you. </p>
					<a href="/shoefinder">Shoe finder <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					
				</div>
			</div>
			</div>
			<div class="tab-4">
			<div class="hpgray-wrapper">
				<div class="homepage-cate--link">
					<img src="/images/home/hp_sm6.jpg">
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">Events</h3>
					<p>Browse our calendar of running events around Australia and New Zealand, <br/> find an event near you.</p>
					<a href="/events">Running events<img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
				</div>
			</div>
			</div>
		</div>
	</div>

	@if(isset($product) && count(array_filter($product)) != 0)
	<div class="wrapper homepage-new--arrival">
		<div class="row">
			<div class="col-12">
				<div class="main-heading">
				    <h3 class="br-heading">Featured</h3>
			    </div>
			</div>
		</div>
		<div class="new-arrival--container">
	   		<span class="icon-style icon-back-arrow prev"></span>
	     	<div class="owl-carousel">
				@foreach($product as $prod_key => $Featured_prod)
					@if(!empty($Featured_prod))
					<div class="item">
						<div class="product_arrive">
							<div class="prd_img">
							<a href = "/{{(isset($Featured_prod->seo_name)) ? $Featured_prod->seo_name : ''}}/{{$Featured_prod->style}}_{{$Featured_prod->color_code}}.html">
							<img src="{{$Featured_prod->image->image1Medium()}}">
								</a>
							</div>
							<div class="prd_caption">
								<h3>{{$Featured_prod->stylename}}</h3>
								<h4 class="price">${{$Featured_prod->variants[$prod_key]->price}}</h4>
							</div>
						</div>
					</div>
				    @endif
				@endforeach
	       </div>
	       <span class="icon-style icon-next-arrow next"></span>
	    </div>
	</div>
	@endif
</section>
<section class="homepage-footer">
	<div class="wrapper">
		<div class="row">
			<div class="col-6">
				<div class="info">
					<p class="blue big">At Brooks Running, we have a simple purpose - to inspire people to run and enhance their running experience.</p>
					<p>To do that, we create the best running shoes and clothing that will keep you running longer, further, faster and happier. We are proud of our hard-earned reputation for engineering footwear that provides the perfect ride for every stride, and the ideal fit for every foot type. Brooks creates men's and women's running shoes for feet big and small, wide and narrow, in need of support, or looking for a little cushion. Not sure what shoes are best for your run? Just check out our interactive <a href="/shoefinder">Shoe Finder</a> tool for advice.</p>
				</div>
			</div>
			<div class="col-6">
				<div class="info">
					<p>Whilst running shoes are our forte, our sports clothing range also benefits from the same commitment to performance and focus on the run. Combined with the latest in fabric technologies and style trends, the result is a collection of shorts, tops, jackets, vests, socks and accessories that will maximise your comfort and performance. Whether it's a lunch time jog, or a marathon, we believe that the run has the power to transform a day, a year, a life! It's a path to strength, confidence, health and happiness.</p>
					<p class="blue big">So what are you waiting for?</p>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection