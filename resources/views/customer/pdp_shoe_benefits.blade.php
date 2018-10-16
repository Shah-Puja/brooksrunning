<section class="pdp-container--benefits">
@php  $benefit_1 = (!empty($product->benefit_1)) ? explode('#', $product->benefit_1) : ''; @endphp
@if($benefit_1)
	<div class="wrapper module-header">
		<div class="col-12">
			<div class="module-heading">
			  <h3 class="br-mainheading">Benefits</h3>
			</div>
			<div class="module-img">
				<picture>
					@php $benefit_desktop_url =  ($product->benefit_desktop!='') ? benefit_img_check($product->benefit_desktop) : '';
					     $benefit_mobile_url =  ($product->benefit_mobile!='') ? benefit_img_check($product->benefit_mobile) : '';
					@endphp
					@if($benefit_desktop_url!='')
						<source media="(max-width: 595px)" srcset="{{ $benefit_mobile_url }}">
					@endif

					@if($benefit_desktop_url!='')
						<img src="{{ $benefit_desktop_url }}" alt="Header Images">
				    @endif
				</picture>
			</div>
		</div>
	</div>
	<div class="full-wrapper module-info">
		<div class="row">
			<div class="col-6">
				<div class="info-wrapper clearfix">
					<div class="info right">
					 	<h3 class="br-heading">{{ ($benefit_1!='') ? $benefit_1[1] : "" }}</h3>
						<p class="br-info">{{ ($benefit_1!='') ? $benefit_1[2] : "" }}</p>
					</div>
			    </div>
			</div>
			<div class="col-6">
				<div class="img">
					@php $benefit_1_img_url = ($benefit_1[3]!='') ? benefit_img_check($benefit_1[3])  : "" ; @endphp
                    @if($benefit_1_img_url!='')
						<picture>
							<source media="(max-width: 595px)" srcset="{{ $benefit_1_img_url }}">
							<img src="{{ $benefit_1_img_url }}" alt="Header Images">
						</picture>
				    @endif
				</div>
			</div>
		</div>
	</div>
	<div class="full-wrapper module-info">
	    <div class="row">
	    	<div class="col-6 visible-mob visible-tab">
				<div class="info-wrapper clearfix">
					<div class="info">
						@php  $benefit_2 = (!empty($product->benefit_2)) ? explode('#', $product->benefit_2) : ''; @endphp
						<h3 class="br-heading">{{ ($benefit_2!='') ? $benefit_2[1] : "" }}</h3>
						<p class="br-info">{{ ($benefit_2!='') ? $benefit_2[2] : "" }}</p>
					</div>
			    </div>
			</div>
		    <div class="col-6">
				<div class="img left">
					@php $benefit_2_img_url = ($benefit_2[3]!='') ? benefit_img_check($benefit_2[3])  : "" ; @endphp
                    @if($benefit_2_img_url!='')
						<picture>
							<source media="(max-width: 595px)" srcset="{{ $benefit_2_img_url }}">
							<img src="{{ $benefit_2_img_url }}" alt="Header Images">
						</picture>
				    @endif
				</div>
			</div>
			<div class="col-6 hidden-mob hidden-tab">
				<div class="info-wrapper clearfix">
					<div class="info">
						<h3 class="br-heading">{{ ($benefit_2!='') ? $benefit_2[1] : "" }}</h3>
						<p class="br-info">{{ ($benefit_2!='') ? $benefit_2[2] : "" }}</p>
					</div>
			    </div>
			</div>
		</div>
	</div>
	<div class="full-wrapper module-info">
	    <div class="row">
			<div class="col-6">
				<div class="info-wrapper clearfix">
					<div class="info right">
						@php  $benefit_3 = (!empty($product->benefit_3)) ? explode('#', $product->benefit_3) : ''; @endphp
						<h3 class="br-heading">{{ ($benefit_3!='') ? $benefit_3[1] : "" }}</h3>
						<p class="br-info">{{ ($benefit_3!='') ? $benefit_3[2] : "" }}</p>
					</div>
			    </div>
			</div>
			<div class="col-6">
				<div class="img">
					@php $benefit_3_img_url = ($benefit_3[3]!='') ? benefit_img_check($benefit_3[3])  : "" ; @endphp
                    @if($benefit_3_img_url!='')
						<picture>
							<source media="(max-width: 595px)" srcset="{{ $benefit_3_img_url }}">
							<img src="{{ $benefit_3_img_url }}" alt="Header Images">
						</picture>
				    @endif
				</div>
			</div>
		</div>
	</div>
	@endif
	@php  $add_benefit_1 = (!empty($product->add_benefit_1)) ? explode('#', $product->add_benefit_1) : ''; @endphp
	@php  $add_benefit_2 = (!empty($product->add_benefit_2)) ? explode('#', $product->add_benefit_2) : ''; @endphp
	@php  $add_benefit_3 = (!empty($product->add_benefit_3)) ? explode('#', $product->add_benefit_3) : ''; @endphp
	@if($add_benefit_1)
	<div class="full-wrapper module-additional">
		<div class="row">
			<div class="col-12">
				<div class="heading">
					<h3>ADDITIONAL BENEFITS</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<div class="info">
					<h4>{{ ($add_benefit_1!='') ? $add_benefit_1[1] : "" }}</h4>
					<p>{{ ($add_benefit_1!='') ? $add_benefit_1[2] : "" }}</p>
				</div>
			</div>
			<div class="col-4">
				<div class="info">
					
					<h4>{{ ($add_benefit_2!='') ? $add_benefit_2[1] : "" }}</h4>
					<p>{{ ($add_benefit_2!='') ? $add_benefit_2[2] : "" }}</p>
				</div>
			</div>
			<div class="col-4">
				<div class="info">
					<h4>{{ ($add_benefit_3!='') ? $add_benefit_3[1] : "" }}</h4>
					<p>{{ ($add_benefit_3!='') ? $add_benefit_3[2] : "" }}</p>
				</div>
			</div>
		</div>
	</div>
	@endif
</section>


<!-- Size chart popup -->
<div id="sizechart-popup--wrapper" class="popup-container size-chart--popup" style="display:none;">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me" id="sizechart-popup--close"><span class="icon-close-icon"></span></div>
			<div class="tab-container">
				<ul class="tabs size-chart--tab">
					<li class="tab-link current" data-tab="tab-1">
						<div class="input-wrapper">
							<div class="radio-inline">
								<input type="radio" name="sizechart" id="tab-opt1" checked="checked">
								<label for="tab-opt1">
										<div class="mark"><span></span></div>
										<div class="text">General Sizing Tips</div>
								</label>
							</div>
						</div>	
					</li>
					<li class="tab-link" data-tab="tab-2">
						<div class="input-wrapper">
							<div class="radio-inline">
								<input type="radio" name="sizechart" id="tab-opt2">
								<label for="tab-opt2">
										<div class="mark"><span></span></div>
										<div class="text">Switching to Brooks?</div>
								</label>
							</div>
						</div>
					</li>
					<li class="tab-link" data-tab="tab-3">
						<div class="input-wrapper">
							<div class="radio-inline">
								<input type="radio" name="sizechart" id="tab-opt3">
								<label for="tab-opt3">
										<div class="mark"><span></span></div>
										<div class="text">International Size Chart</div>
								</label>
							</div>
						</div>
					</li>
				</ul>
				<div id="tab-1"  class="tab-content current">
					<div class="size-chart-wrapper">
						<h3 class="br-heading">General Sizing Tips:</h3>
						<h4>Size up</h4>
						<p>We recommend ordering Brooks running shoes 1/2 size to one size larger than normal dress shoes</p>
						<h4>Select width</h4>
						<p>For women's footwear, B is the standard width. 2A is narrow, D is wide, and 2E is extra wide. For men's footwear, D is standard, B is narrow, 2E is wide, and 4E is extra wide.</p>
						<h4>Unisex sizing</h4>
						<p>Ladies, when orderding "unisex" shoes, order 1.5 sizes smaller than your usual women's size.</p>
						<h4>Get fit</h4>
						<p>Whenever possible, visit your local running and walking footwear store for a proper fitting.</p>
						<h4>Can't make it to a store?</h4>
						<p>Our online tools can help you out. Shoefitr compares the fit of your current shoe with other models and finds your perfect fit. If you're switching to Brooks, check out our Shoe Finder, where you can either tell us what brand of shoe you wear and we'll show you something better – or you can answer five simple questions and we'll introduce you to your sole mate. And, our International Size Chart can help make the size translations for the UK, Europe, and Japan.</p>
					</div>
				</div>
				<div id="tab-2" class="tab-content" >
					<div class="size-chart-wrapper">
						<div class="clearfix">
							<div class="col-4 tab-5">
								<div class="plp-store-finder">
									<h3 class="br-heading">Need help<br/>choosing a shoe?</h3>
									<p class="br-info">Try the shoe finder</p>
									<a class="primary-button" href="#">Shoe Finder</a>
									<img src="/images/brooks-shoes--logo.png" alt="">
								</div>
							</div>
							<div class="col-8 tab-7">
								<h3 class="br-heading">General Sizing Tips:</h3>
								<h4>Find your solemate</h4>
								<p>Running shoes are not created equal - we're the first to agree with that! But if you've been running in shoes from another brand, and want to try Brooks, it's helpful to know where to start. Check out our Shoe Advisor, where you can either tell us what brand of shoe you wear and we'll show you something better – or you can answer five simple questions and we'll introduce you to your sole mate.</p>
							</div>
						</div>
					</div>
				</div>
				<div id="tab-3" class="tab-content">
					<div class="size-chart-wrapper">
						<h3 class="br-heading">International Size Chart</h3>
						<p>Sizing on BrooksRunning.com is displayed in US sizes only. For international sizes, please see conversion chart, below.</p>
						<img src="/images/Brooks_2018_size_chart-footwear.png" class="chart-img">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Size chart popup -->