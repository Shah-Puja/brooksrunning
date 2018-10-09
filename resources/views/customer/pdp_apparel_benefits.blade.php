@php  $benefit_1 = (!empty($product->benefit_1)) ? explode('#', $product->benefit_1) : ''; @endphp
@php  $benefit_2 = (!empty($product->benefit_2)) ? explode('#', $product->benefit_2) : ''; @endphp
@php  $benefit_3 = (!empty($product->benefit_3)) ? explode('#', $product->benefit_3) : ''; @endphp
@if($benefit_1)
<section class="pdp-container--benefits">
	<div class="wrapper module-header">
		<div class="col-12">
			<div class="module-heading">
			  <h3 class="br-mainheading">Benefits</h3>
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
				    <picture>
						<source media="(max-width: 595px)" srcset="/images/details/apparel1.png">
						<img src="/images/details/apparel1.png" alt="Header Images">
					</picture>
				</div>
			</div>
		</div>
	</div>
	<div class="full-wrapper module-info">
		<div class="row">
			<div class="col-6 visible-mob visible-tab">
				<div class="info-wrapper clearfix">
					<div class="info">
						<h3 class="br-heading">{{ ($benefit_2!='') ? $benefit_2[1] : "" }}</h3>
						<p class="br-info">{{ ($benefit_2!='') ? $benefit_2[2] : "" }}</p>
					</div>
			    </div>
			</div>
			<div class="col-6">
				<div class="img">
					<picture>
						<source media="(max-width: 595px)" srcset="/images/details/apparel2.png">
						<img src="/images/details/apparel2.png" alt="Header Images">
					</picture>
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
						<h3 class="br-heading">{{ ($benefit_3!='') ? $benefit_3[1] : "" }}</h3>
						<p class="br-info">{{ ($benefit_3!='') ? $benefit_3[2] : "" }}</p>
					</div>
			    </div>
			</div>
			<div class="col-6">
				<div class="img">
					<picture>
						<source media="(max-width: 595px)" srcset="/images/details/apparel3.png">
						<img src="/images/details/apparel3.png" alt="Header Images">
					</picture>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

<!-- Size chart popup  -->
<div id="sizechart-popup--wrapper" class="popup-container size-chart--popup">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me" id="sizechart-popup--close"><span class="icon-close-icon"></span></div>
			<!-- clothing size chart -->
			<div class="size-chart--bras">
				<h3 class="br-heading">Men's Clothing</h3>
				<div class="info">
					<h4>Size &amp; Fit Guide</h4>
					<p>Sizing on BrooksRunning.com is displayed in US sizes only.</p>
				</div>
				<img src="/images/size-chart--clothings.png" alt="">
			</div>
			<!-- /clothing size chart -->
		</div>
	</div>
</div>
<!-- /Size chart popup -->