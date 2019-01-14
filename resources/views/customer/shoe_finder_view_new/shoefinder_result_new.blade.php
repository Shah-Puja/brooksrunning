<style>
.slick-slider .slick-track, .slick-slider .slick-list {
    transform: translate3d(0, 0, 0);
}
.slick-list {
    position: relative;
    overflow: hidden;
    display: block;
    margin: 0;
    padding: 0;
}
.slick-slider{
    position:relative;
    display:block;
    box-sizing: border-box;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -ms-touch-action: pan-y;
    touch-action: pan-y;
    -webkit-tap-highlight-color:transparent;
}
.slick-initialized .slick-slide {
    display: block;
}
.slick-slide {
    float: left;
    height: 100%;
    min-height: 1px;
    width: 500px;
    display: none;
}
.bf-section--results{
	margin-left:-87px;
	margin-right:-87px;
}
@media (min-width: 596px){
.bf-section {
    padding: 10px 0;
}
.bf-feature {
    padding-top: 15px !important;
}

}

@media (max-width: 768px){
.bf-section.bf-section--results{
	margin: 0 auto;
}

}
.bf-product-details__header h1{
    margin-top:0.5px;
    margin-bottom:10px;
}
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px){
	.bf-section.bf-section--results{
		margin-left: -23px;
    	margin-right: -23px;
	}
}
@media only screen and (min-device-width: 1024px) and (max-device-width: 768px){
	.bf-section.bf-section--results{
		margin-left: -40px;
    	margin-right: -40px;
	}
}
</style>
<article class="bf-results-screen__transition-group-fade">
	<div class=" shoefinder-Topresult-container bf-line-background bf-line-background--alt bf-hide-small-screen bf-results-screen__transition-group-fade">
		<div data-bf-svg data-url="/images/shoefinder-new/background_lines.svg"></div>
	</div>
	<nav class="bf-results-nav bf-results-screen__transition-nav" data-bf-results-nav>
		
				<div class="bf-results-nav__item capitalize"><a data-bf-show-progress-link tabindex="0" data-bf-button data-prevent-default href="" tabindex="0">Edit Answers</a></div>
			
		<div class="bf-results-nav__item capitalize"><a href="/store-locator" target="_blank" tabindex="0">Find A Store</a></div>
		
			<div class="bf-results-nav__item capitalize"><a href="/login" tabindex="0">Save Results</a></div>
		
	</nav> 
	<header class="bf-results-header shoefinder-Topresult-container" data-bf-results-header-pad>
		<!-- START: Sticky Nav -->
		<nav class="bf-results-sticky-nav" data-bf-results-sticky-nav aria-hidden="true">
			<div class="bf-results-sticky-nav__wrap" data-sticky-el>
				<div class="bf-results-sticky-nav__results-wrap">
					<div class="bf-results-sticky-nav__title">Your Results</div>
					<div class="bf-results-sticky-nav__items" data-items></div>
				</div>
				<div class="bf-results-sticky-nav__top" data-top-link>
					<div class="bf-back-to-top">
						<i class="bf-back-to-top__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.7 11.8"><path d="M1.1,11.8c-0.9,0-1.1-0.6-0.6-1.3l7.1-9.9c0.5-0.7,1.3-0.7,1.8,0l7.1,9.9c0.5,0.7,0.2,1.3-0.6,1.3L1.1,11.8L1.1,11.8z"/></svg></i>
						<div class="bf-back-to-top__text">Back to top</div>
					</div>
				</div>
			</div>
			
		</nav>
		<!-- END: Sticky Nav -->
		<hgroup>
			<p class="bf-results-screen__transition-group" data-focus-first tabindex="0">The results are in. We suggest:</p>
			<h1 class="bf-results-screen__transition-group-2 capitalize">{{ ucwords($tag) }}
				<div class="bf-results-header__image">
                @if(!empty($experience))
                    @switch($experience)
                        @case('propel_me')				
                            <div data-bf-load-template data-template="SpeedLogo"></div>
                            <script type="text/template" id="SpeedLogo">
                                <div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/speed_horizontal.svg" data-bf-stepped-animation></div>
                            </script>
                        @break
                        @case('connect_me')
                            <div data-bf-load-template data-template="ConnectedLogo"></div>
                            <script type="text/template" id="ConnectedLogo">
                                <div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/connect_horizontal.svg" data-bf-stepped-animation></div>
                            </script>
                        @break
                        @case('cushion_me')
                            <div data-bf-load-template data-template="CushionLogo"></div>
                            <script type="text/template" id="CushionLogo">
                                <div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/cushion_horizontal.svg" data-bf-stepped-animation></div>
                            </script>
                        @break
                        @case('energize_me')
                            <div data-bf-load-template data-template="EnergizeLogo"></div>
                            <script type="text/template" id="EnergizeLogo">
                                <div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/energize_horizontal.svg" data-bf-stepped-animation></div>
                            </script>
                        @break
                    @endswitch
                @endif
				</div>				
				{{ ($gender=='mens') ? "Men's": "Women's" }} {{ ucwords($surface) }} Shoes
				</h1>
			<div class="bf-results-screen__transition-group-3">
				<div data-bf-behind-the-science-link data-template-id="ResultsInfo" data-gtm-screen-title="Results" data-gtm-click-event="shoe-finder-behind-the-science"  ></div>
			</div>
			<!-- START: Behind the Science Template -->
			
				<script type="text/template" id="ResultsInfo">
					<aside>
					<h3>Behind the Science</h3>
					<div class=\"bf-behind-science\" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
					<h4>Why am I Neutral?</h4>
					<p>Your body is aligned during your stride, meaning you don't need much additional support. </p>
					<h5>Biomechanics</h5>
					<ul>
						<li>Your ankles are stable</li>
						<li>Your weight does not distribute evenly across your feet</li>
						<li>You have decreased flexibility</li>
						<li>Your knees and hips are aligned</li>
					</ul>

					<h5>Training</h5>
					<ul>
						<li>You have a steady training regiment</li>
					</ul>
					<h5>Injuries</h5>
					<ul>
						<li>You've had a recent injury</li>
					</ul>
					<h4>Why am I Speed?</h4>
					<p>Shoes in this category are built for speed &mdash; lightweight and fast is the way to your next PR.</p>

					<h5>Impact</h5>
					<ul>
					<li>You're looking for a shoe that's low to the ground and fast. </li>
					</ul>

					<h5>Feel</h5>
					<ul>
					<li>These shoes will minimize the distance between you and the pavement, track, or trail so you can feel the ground. </li>
					</ul>
				
					</aside>
				</script>
			<!-- END: Behind the Science Template -->
			
		</hgroup>

	</header>
    <div class="bf-section bf-section--results bf-bg-white">
        <div class="bf-results-screen__transition-group-5">    
        @if(!empty($result['product_details']))
            @foreach($result['product_details'] as $curr_ele)
                @foreach($result['colour_options'] as $product)
                    @if($product->style == $curr_ele->style)
                        @php $colors_option[$curr_ele->style][] = $product; @endphp
                    @endif
                @endforeach                                                                     
            <section class="bf-grid bf-grid--full-width bf-grid--large-pad bf-product" data-finder-result>
                <div class="bf-grid__col-1 bf-grid__col-2-3-desktop bf-product__col">
                    <div class="bf-carousel" data-bf-carousel>
                            <div class="bf-bug">
                                <img src="/images/shoefinder-new/banner.svg" class="bf-bug__image" />
                                <div class="bf-bug__text">
                                    Speed
                                </div> 
                            </div>
                            <div class="bf-carousel__wrap">
                                <div class="bf-carousel__images" data-items>				
                                    @if($colors_option[$curr_ele->style]!='' &&  count($colors_option[$curr_ele->style]) > 0 )
                                        @foreach(collect($colors_option[$curr_ele->style])->unique('color_code')->sortBy('seqno') as $color_product)
                                            @if(!empty($color_product))
                                                <img src="{{ $color_product->image->image1Large() }}" alt="{{ $curr_ele->stylename }}" />
                                            @endif
                                        @endforeach
                                    @endif
                                </div>				
                            </div>
                        <div class="bf-carousel__thumbnails" data-thumbnails></div>
            
                    </div>
                </div>
                <div class="bf-grid__col-1 bf-grid__col-1-3-desktop bf-product__col">
                    <div class="bf-product-details">
                        <div class="bf-product-details__header">
                            <h1>{{ $curr_ele->stylename }}</h1>
                        </div>
                        @if(!empty($curr_ele->experience))
                            @switch($curr_ele->experience)
                                @case('Cushion')
                                  @php $experience_img_url = '/images/shoefinder-new/cushion_horizontal.svg'; @endphp
                                @break
                                @case('Speed')
                                  @php $experience_img_url = '/images/shoefinder-new/speed_horizontal.svg'; @endphp
                                @break
                                @case('Energize')
                                  @php $experience_img_url = '/images/shoefinder-new/energize_horizontal.svg'; @endphp
                                @break
                                @case('Connect')
                                  @php $experience_img_url = '/images/shoefinder-new/connect_horizontal.svg'; @endphp
                                @break
                            @endswitch
                        @endif
                            <div class="bf-small-experience-icon">
                                <img src="{{ $experience_img_url }}" alt="{{ $curr_ele->experience }}" width="100%" height="auto" tab-index="0"/>
                            </div>
                        <div class="bf-features">
                            
                            <div class="bf-feature" tab-index="0">
                                <p class="bf-feature__description">
                                    The Mazama 2 will help you be one with nature &hellip; as it whizzes by. The sticky rubber outsoles make for quick footwork.
                                </p>
                            </div>
                            
                            <div class="bf-feature">
                                
                                <h2 class="bf-feature__label" tab-index="0">Mazama 2 features</h2>
                                    
                                        <div class="bf-collapsable" data-bf-collapsable tab-index="1">
                                            <div class="bf-collapsable__label">Powerful Efficiency</div>
                                            <div class="bf-collapsable__content">
                                                What&#39;s the key to a great push-off? Proper alignment. And that&#39;s what the Propulsion Plate delivers, generating power and efficiency by design.
                                            </div>
                                        </div>
                                    
                                        <div class="bf-collapsable" data-bf-collapsable tab-index="2">
                                            <div class="bf-collapsable__label">Sticky Traction</div>
                                            <div class="bf-collapsable__content">
                                                The sticky rubber outsole and directional lugs make for quick footwork.
                                            </div>
                                        </div>
                                    
                                        <div class="bf-collapsable" data-bf-collapsable tab-index="3">
                                            <div class="bf-collapsable__label">Fast Drainage</div>
                                            <div class="bf-collapsable__content">
                                                A lightweight mesh upper drains water quickly and provides plenty of breathability&mdash;just what you need when you&#39;re moving fast over muddy trails.
                                            </div>
                                        </div>
                                    
                                                    
                                <div class="bf-product-details__button-wrap" data-gtm-product data-gtm-product-impressions data-gtm-click-event="productClick"  data-gtm-product-id="110279" data-gtm-product-name="{{ $curr_ele->stylename }}" data-gtm-currency-code="USD" data-gtm-product-brand="Mazama 2" data-gtm-product-category="shoes-men-trail" data-gtm-product-variant="null" data-gtm-product-price="90.96" data-gtm-page-list="shoe-finder-results" data-gtm-topResults-crossSell="top results" data-gtm-shoe-pronation="neutral" data-gtm-oos-boolean="false" data-gtm-product-gender="male"  data-gtm-is-recommendation="true">
                                    <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="bf-button bf-button--full-width" tab-index="0">Shop the {{ $curr_ele->stylename }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        @else
        <h1 class="br-mainheading"> Sorry, No Result Found!</h1>
        @endif
		    <!-- END: Result 1 -->
        </div>
    </div>
</div>	
</div>	

