@extends('customer.layouts.master')
@section('content')


<!-- <section class="homepage-banner--container">
<div class="wrapper">
	<div class="row">
		<div class="mob-12 col-12 pr-0">
				<picture>
							<source media="(max-width: 595px)" srcset="/images/home/sale-banners/sale_mobile_500x500_noctas.png">
							<img src="/images/home/sale-banners/sale_desktop_1270x200_noctas.png" alt="Header Images">
				</picture>
				<div class="homepage-salebanner--info hidden-mob ">
					<div class="wrapper">
						<div class="row">
							<div class="col-8 tab-8">&nbsp;</div>
							<div class="col-4 tab-4">
								<div class="banner--info">
									<a class="secondary-button homepage-sale--btn" href="/womens-running-shoes-sale">Shop Women's</a>
									<a class="secondary-button homepage-sale--btn" href="/mens-running-shoes-sale">Shop Men's</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="homepage-salebanner--info hidden-col hidden-tab visible-mob">
					<div class="wrapper homepage-bannersale--mobportrait">
						<div class="row">
							<div class="mob-6 sl-pr-0">
								<div class="banner--info">
								<a class="secondary-button homepage-sale--btn" href="/womens-running-shoes-sale">Shop Women's</a>
								</div>	
							</div>
							<div class="mob-6 sl-pl-0">
								<div class="banner--info">
								<a class="secondary-button homepage-sale--btn" href="/mens-running-shoes-sale">Shop Men's</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Landscape View -->
				<!-- <div class="homepage-salebanner--info hidden-col hidden-tab visible-mob homepage-bannersale--moblandscape">
					<div class="wrapper">
						<div class="row">
							<div class="mob-8">&nbsp;</div>
							<div class="mob-4">
								<div class="banner--info">
									<a class="secondary-button homepage-sale--btn" href="/womens-running-shoes-sale">Shop Women's</a>
									<a class="secondary-button homepage-sale--btn" href="/mens-running-shoes-sale">Shop Men's</a>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
</section> --> 
<section class="homepage-container">
	  <div class="wrapper">
		   <div class="row">
		     <div class="mob-6 pr-0">
		       <div class="top_prd_sec">
		          <picture>
			        <source media="(max-width: 595px)" srcset="/images/home/hp_shop_w_mobile.jpg">
			        <img src="/images/home/hp_shop_w.jpg" alt="Header Images" width="100%">
			      </picture>
		          <div class="button_fixed">
		       			<a class="primary-button" href="/womens-running-shoes-and-clothing">Shop Women's</a>
		       	  </div>
		       </div>
		     </div>
		     <div class="mob-6 pl-0">
		       <div class="top_prd_sec">
		          <picture>
			        <source media="(max-width: 595px)" srcset="/images/home/hp_shop_men_mobile.jpg">
			        <img src="/images/home/hp_shop_m.jpg" alt="Header Images" width="100%">
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
					<img src="/images/home/hp_sm2.jpg">
			        <h3>New! <br/>Adrenaline GTS 19</h3>
				</div>
				<div class="info-wrapper">
					<p>The GTS 19 has landed. Very softly, thanks to it’s new DNA Loft cushioning and GuideRails support.</p>
					<br/><a href="/brooks-running-shoes-adrenaline-gts-19-womens/120284_151.html">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					<span class="right-link"><a href="/brooks-running-shoes-adrenaline-gts-19-mens/110294_071.html">Shop men's <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a></span>
				
				</div>
			</div>
		</div>
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper">
					<img src="/images/home/hp_sm_xmas_levitate.jpg">
			        <h3>&nbsp;<br/>&nbsp;  </h3>
				</div>
				<div class="info-wrapper">
					<p>This is the season to Run Happy in this limited edition Christmas Levitate 2. The same responsive DNA AMP midsole to energize your run, wrapped in a festive ugly sweater design. </p>
					<a href="/levitate-2-womens-running-shoes/120279_322.html">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					<span class="right-link"><a href="/levitate-2-mens-running-shoes/110290_322.html">Shop men's <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a></span>
				</div>
			</div>
		</div>
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper">
					<img src="/images/home/hp_sm3.jpg">
			        <h3>&nbsp; <br/>Support Running</h3>
				</div>
				<div class="info-wrapper">
					<p>Our support shoes are designed to offer ultimate shock protection, stability and comfort.</p>
					<br/><a href="/womens-support-running-shoes">Shop women's <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					<span class="right-link"><a href="/mens-support-running-shoes">Shop men's <img id="br-home" src="/images/home/link-arrow--icon.png" alt="" ></a></span>
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
		     		<h3 class="br-heading">Sign up to the Run Down</h3>
		            <p>Keep up to date with all the latest news, special offers, events, competitions and tips to keep you running happy!</p>
	            </div>
	        </div>
			<form name="subscriber_news1" method='post' action='/meet_brooks/enewsletter'>
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
			<div class="tab-4">
				<div class="homepage-cate--link shoe-finder">
					<h3 class="br-heading">Need help choosing a shoe?</h3>
					<p class="br-info">Try the shoe finder</p>
					<img src="/images/brooks-shoes--logo.png" alt="">
				    <div class="btn">
				        <a href="/shoefinder" class="secondary-button">Shoe Finder</a>
				    </div>
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">Shoe Finder</h3>
					<p>Our Shoe Finder is like Tinder for your feet. Uses your biomechanics, preferences and running science to find the ideal shoe for you. </p>
					<a href="/shoefinder">Shoe finder <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
					
				</div>
			</div>
			<div class="tab-4">
				<div class="homepage-cate--link">
					<img src="/images/home/hp_sm6.jpg">
				</div>
				<div class="info-wrapper">
					<h3 class="br-heading">Events</h3>
					<p>Browse our calendar of running events around Australia and New Zealand, <br/> find an event near you.</p>
					<a href="/events">Running Events<img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	@if(!empty($product)  && count($product) > 0 )
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
				    <p>To do that, we create running shoes and clothing that will keep you running longer, further, faster and happier. We are proud of our hard-earned reputation for engineering footwear that provides the perfect ride for every stride, and the ideal fit for every foot type. Brooks creates men's and women's running shoes for feet big and small, wide and narrow, in need of support, or looking for a little cushion. Not sure what shoes are best for your run? Just check out our great Shoe finder tool for advice.</p>
				</div>
			</div>
			<div class="col-6">
				<div class="info">
					<p>Whilst running shoes are our forte, our sports clothing range also benefits from the same commitment to performance and focus on the run. Combined with the latest in fabric technologies and style trends, the result is a collection of shorts, tops, jackets, vests, socks and accessories that will maximise your comfort and performance. Whether it's a lunch time jog, or a marathon, we believe that the run has the power to transform a day, a year, a life! It's a path to strength, confidence, health and happiness. </p>
				    <p class="blue big">So what are you waiting for?</p>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection