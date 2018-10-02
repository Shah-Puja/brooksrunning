@extends('customer.layouts.master')
@section('content')
<section class="homepage-container">
	  <div class="wrapper">
		   <div class="row">
		     <div class="mob-6 pr-0">
		       <div class="top_prd_sec">
		          <picture>
			        <source media="(max-width: 595px)" srcset="images/home/home-banner--left-mob.jpg">
			        <img src="/images/home/home-banner--left.jpg" alt="Header Images" width="100%">
			      </picture>
		          <div class="button_fixed">
		       			<button class="primary-button">Shop Women's</button>
		       	  </div>
		       </div>
		     </div>
		     <div class="mob-6 pl-0">
		       <div class="top_prd_sec">
		          <picture>
			        <source media="(max-width: 595px)" srcset="images/home/home-banner--right-mob.jpg">
			        <img src="/images/home/home-banner--right.jpg" alt="Header Images" width="100%">
			      </picture>
		          <div class="button_fixed">
		       		   <button class="primary-button">Shop Men's</button>
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
					<img src="/images/home/sh1.png">
			        <h3>Overlay text <br/>can go here</h3>
				</div>
				<div class="info-wrapper">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
					<a href="#">Link text here <img src="/images/home/link-arrow--icon.png" alt=""></a>
				</div>
			</div>
		</div>
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper">
					<img src="/images/home/sh1.png">
			        <h3>Overlay text <br/>can go here</h3>
				</div>
				<div class="info-wrapper">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
					<a href="#">Link text here <img src="/images/home/link-arrow--icon.png" alt=""></a>
				</div>
			</div>
		</div>
		<div class="tab-4">
			<div class="overgray-wrapper">
				<div class="img-wrapper">
					<img src="/images/home/sh1.png">
			        <h3>Overlay text <br/>can go here</h3>
				</div>
				<div class="info-wrapper">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
					<a href="#">Link text here <img src="/images/home/link-arrow--icon.png" alt=""></a>
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
	    				<button class="secondary-button">Continue</button>
	    			</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<section class="homepage-gray--container">
	<div class="wrapper">
		<div class="row">
			<div class="tab-4">
				<div class="homepage-cate--link">
					<img src="/images/home/sh3.png">
				    <div class="btn">
				        <button class="secondary-button">Clothing</button>
				    </div>
				</div>
			</div>
			<div class="tab-4">
				<div class="homepage-cate--link shoe-finder">
					<h3 class="br-heading">Need help choosing a shoe?</h3>
					<p class="br-info">Try the shoe finder</p>
					<img src="/images/brooks-shoes--logo.png" alt="">
				    <div class="btn">
				        <button class="secondary-button">Shoe Finder</button>
				    </div>
				</div>
			</div>
			<div class="tab-4">
				<div class="homepage-cate--link">
					<img src="/images/home/sh4.png">
				    <div class="btn">
				        <button class="secondary-button">Event Name</button>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper homepage-new--arrival">
		<div class="row">
			<div class="col-12">
				<div class="main-heading">
				    <h3 class="br-heading">Sale</h3>
			    </div>
			</div>
		</div>
		<div class="new-arrival--container">
	   		<span class="icon-style icon-back-arrow prev"></span>
	     	<div class="owl-carousel">
	       		<div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
		        <div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
		        <div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
		        <div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
		        <div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
		        <div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
		        <div class="item">
		         	<div class="product_arrive">
		           		<div class="prd_img">
		              		<img src="/images/shoes/shoes1-listing.jpg">
		                </div>
		                <div class="prd_caption">
			              	 <h3>Adrenaline GTS 18</h3>
			                 <h4 class="price"><span class="black">$120</span> <span class="red">$99</span></h4>
		                </div>
		            </div>
		        </div>
	       </div> 
	       <span class="icon-style icon-next-arrow next"></span>
	    </div>
	</div>
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