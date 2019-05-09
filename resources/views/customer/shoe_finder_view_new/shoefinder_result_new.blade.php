<style>
.bf-progress.bf-progress--open{
    width: 98vw;
}
.shoefinder-container .wrapper {
  padding-left: 0px;
  padding-right: 0px;
}
.shoefinder-container .row{
    margin-right: 0px;
    margin-left: 0px;
}
.shoefinder-container .row .col-12{
    padding-right: 0px;
    padding-left: 0px;
}
.result-header{
    margin-left:-750px;
}
.bf-progress .bf-progress__item .bf-progress__item__value{
    padding-top: 10px;
}
.bf-progress.bf-progress--can-hover .bf-progress__item .bf-progress__item__value{
    top: 35px;
}
.result-login{font-size:24px; color: #000; text-align:center;}

@media only screen 
and (min-width : 768px) 
and (max-width : 1024px)  { 
    .result-header{
    margin-left:-500px ;
    }
    .bf-progress.bf-progress--can-hover .bf-progress__item .bf-progress__item__value{
        left: 70% !important;
        top: 20px !important;
    }
    
}

@media only screen 
and (min-width : 768px) 
and (max-width : 1024px) 
and (orientation : landscape) { 
    .result-header{
        margin-left:-300px ;
    }
    .bf-progress.bf-progress--can-hover .bf-progress__item .bf-progress__item__value{
        left: 70%;
        top: 20px;
    }
}

@media (min-width: 481px) and (max-width: 768px) {
    .result-header{
        margin-left:-300px ;
    }
    .bf-progress.bf-progress--can-hover .bf-progress__item .bf-progress__item__value{
        left: 70% !important;
        top: 20px !important;
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
        @if(!auth()->user())
		<div class="bf-results-nav__item capitalize"><a href="/login" tabindex="0">Save Results</a></div>
		@endif
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
			<h1 class="bf-results-screen__transition-group-2 capitalize">{{ ucwords(str_replace('_',' ',$tag)) }}
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
					@if($tag=='neutral')
                        <h4>Why am I Neutral?</h4>
                        <p>Your body is aligned during your stride, meaning you don't need much additional support. </p>
                        <h5>Biomechanics</h5>
                        <ul>
                            @if (request('balance')=='0')
                                <li>Your ankles are stable</li>
                            @endif

                            @if (request('feet')=='0')
                                <li>Your weight distributes evenly across your feet </li>
                            @endif

                            @if(request('flexibility')=='1')
                                <li>You have good flexibility</li>
                            @endif

                            @if(request('knee')=='0')
                                <li>Your knees and hips are aligned</li>
                            @endif
                        </ul>

                        <h5>Training</h5>
                        <ul>
                            <li>You have a steady training regiment</li>
                        </ul>
                        
                        @if (request('injury') =="none") 
                            <h5>Injuries</h5>
                            <ul>
                                <li>You don’t have a recent injury</li>
                            </ul>
                        @endif
                        </ul>
                	
                    @else
                        <h4>Why am I {{ ucwords(str_replace('_',' ',$tag)) }}?</h4>
                        <p>You may require a little extra help in keeping your knees and hips aligned during your run. </p>
                        <h5>Biomechanics</h5>
                        <ul>
                            @if (request('balance')!='0')
                                <li>Your ankles could use some support</li>
                            @endif

                            @if (request('feet')!='0')
                                <li>Your weight does not distribute evenly across your feet</li>
                            @endif

                            @if(request('flexibility')=='0')
                                <li>You have decreased flexibility</li>
                            @endif

                            @if(request('knee')!='0')
                                <li>Your knees and hips are not aligned </li>
                            @endif
                        </ul>

                        <h5>Training</h5>
                        <ul>
                            <li>You plan to significantly increase your mileage</li>
                        </ul>
                        @if (request('injury') !="none") 
                        <h5>Injuries</h5>
                        <ul>
                            <li>You've had a recent injury </li>
                        </ul>
                        @endif
                	
                    @endif

                    @if(!empty($experience))
                        @switch($experience)
                            @case('propel_me')				
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
                            @break
                            @case('connect_me')
                                <h4>Why am I Connect?</h4>
                                <p>Shoes in this category act as a minimal barrier between you and the ground, giving you a more connected run.</p>
                            
                                <h5>Impact</h5>
                                <ul>
                                    <li>You're looking for a shoe that brings you closer to the ground without losing its form. </li>
                                </ul>

                                <h5>Feel</h5>
                                <ul>
                                    <li>These shoes will minimize the distance between you and the pavement, track, or trail so you can feel the ground.  </li>
                                </ul>
                            @break
                            @case('cushion_me')
                                <h4>Why am I Cushion?</h4>
                                <p>You're looking for a shoe that's soft and minimizes impact without losing responsiveness. </p>
                            
                                <h5>Impact</h5>
                                <ul>
                                    <li>You're looking for a shoe that's soft and minimizes impact without losing responsiveness.</li>
                                </ul>

                                <h5>Float</h5>
                                <ul>
                                    <li>These shoes will provide more substance, floating you higher off the ground.  </li>
                                </ul>
                            @break
                            @case('energize_me')
                                <h4>Why am I Energize?</h4>
                                <p>Shoes in this category work to give more energy back to you, pushing you further and faster.</p>
                            
                                <h5>Impact</h5>
                                <ul>
                                    <li>You're looking for a shoe that's responsive and ready for the long haul.  </li>
                                </ul>

                                <h5>Float</h5>
                                <ul>
                                    <li>These shoes will provide more substance, floating you higher off the ground.  </li>
                                </ul>
                            @break
                        @endswitch
                    @endif
				

				
				
					</aside>
				</script>
			<!-- END: Behind the Science Template -->
			
		</hgroup>

	</header>
    <div class="bf-section bf-section--results bf-bg-white">

    
        <div class="bf-results-screen__transition-group-5"> 
        @if(!auth()->user())
           <div class="login-section top-login-section">
                <p class="result-login">Sign up for a Brooks Running account to access your shoe finder results, receive news and exclusive offers:</p>
                <div class="button_fixed">
                    <a class="bf-button bf-button--full-width savemyresults" href="javascript:void(0);">Save my results</a>
                </div>
                    <!-- Login Form -->
                        <section class="create-account wrapper shoefinder-create-account" >
                            <form name="registerform1" method="POST" action="{{ route('register') }}" onsubmit="return registervalidation('registerform1')">
                            @csrf   
                            <div class="row">
                                    <div class="col-9">
                                        <div class="create-account--left" style="margin: 0 auto;">
                                        <div class="row">
                                            <div class="tab-6">
                                                <div class="input-wrapper">
                                                    <label for="" style="text-align:left;"><sup>*</sup>Email Address :@if ($errors->has('email')) <span class="error invalid-feedback">{{ $errors->first('email') }} </span> @endif</label>
                                                    <input type="text" id='email' name="email" class="input-field">
                                                </div>
                                            </div>
                                            <div class="tab-6">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="tab-6">
                                                <div class="input-wrapper">
                                                    <label for="password" style="text-align:left;"><sup>*</sup>Password :  @if ($errors->has('password')) <span class="error error invalid-feedback"> <strong>{{ $errors->first('password') }}</strong> </span> @endif</label>
                                                    <input type="password" id='password' name="password" class="input-field">
                                                </div>
                                            </div>
                                            <div class="tab-6">
                                                <div class="input-wrapper">
                                                    <label for="password" style="text-align:left;"><sup>*</sup>Confirm Password</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-field">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="tab-12">
                                                <div class="input-wrapper">
                                                    <div class="checklist-inline" style="text-align:left;">
                                                            <input type="checkbox" id="signme" name="newsletter_subscription" value="1">
                                                        <label for="signme">
                                                                <div class="mark"><span></span></div>
                                                                <div class="text">Please sign me up to receive Brooks email newsletter The Run Down.</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="button_bottom">
                                                    <!--<button type="submit" class="bf-button bf-button--full-width" href="/">Create an account</button>-->
                                                    <div class="cart-btn comp-submit" >
                                                        <div class="alignleft inline-loader">
                                                            <button class="primary-button" id="comp_submit_btn">Create an account</button>
                                                        </div>
                                                        <div class="alignright inline-loader">
                                                            <div id = "comp_loader"  style="display:none">
                                                                <img src = "/images/loader.gif" alt="comp-loader" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--<br>
                                                <p class="privacy" style="text-align:left; color:#000;">Have an account? <a href="/login" style="color:#000; font-size:14px; text-decoration:none;">Log in now <img style="width:14px;" src="/images/home/link-arrow--icon.png" alt=""></a></p>-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="tab-12">
                                            <p class="privacy" style="text-align:left; color:#000;">Have an account? <a href="/login" style="color:#000; font-size:14px; text-decoration:none;">Log in now <img style="width:14px;" src="/images/home/link-arrow--icon.png" alt=""></a></p>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    <!-- End Login Form -->
            </div>
            @endif
            <hr style="width:90%; background-color:#ecebeb;"/>

        @switch($experience)
            @case('propel_me')	
                @php  $user_experience = 'Speed'; @endphp 
            @break
            @case('connect_me')
                @php  $user_experience ='Connect'; @endphp 
            @break
            @case('cushion_me')
                @php  $user_experience ='Cushion'; @endphp 
            @break
            @case('energize_me')
                @php  $user_experience ='Energize'; @endphp 
            @break
        @endswitch
        
        @if(!empty($result['product_details']))
        @php
        $filtered_experience = collect($result['product_details'])->filter(function ($value, $key) use ($user_experience) {
            return ($value->experience == $user_experience) ? $value : '';
        });
       
        $notmatch_filtered_experience = collect($result['product_details'])->filter(function ($value, $key) use ($user_experience) {
            return ($value->experience != $user_experience) ? $value : '';
        });
        @endphp  
            <!--matched experience products -->
            @if(!empty($filtered_experience)  && count($filtered_experience) >0) 
                @foreach($filtered_experience as $curr_ele)
                    @foreach($result['colour_options'] as $product)
                        @if($product->style == $curr_ele->style)
                            @php $colors_option[$curr_ele->style][] = $product; @endphp
                        @endif
                    @endforeach 
                    @foreach($result['shoe_detail'] as $shoe)
                        @php $gender_key = ($gender=='mens') ? "men": "women"; @endphp
                        @if (\strpos($shoe->$gender_key, $curr_ele->style) !== false)
                            @php $shoefinder_detail[$curr_ele->style][] = $shoe; @endphp
                        @endif
                    @endforeach                                                                                                             
                <section class="bf-grid bf-grid--full-width bf-grid--large-pad bf-product" data-finder-result>
                    <div class="bf-grid__col-1 bf-grid__col-2-3-desktop bf-product__col">
                        <div class="bf-carousel" data-bf-carousel>
                                <div class="bf-bug">
                                    <img src="/images/shoefinder-new/banner.svg" class="bf-bug__image" />
                                    <div class="bf-bug__text">
                                    @if(isset($shoefinder_detail[$curr_ele->style][0]->subtext) && $shoefinder_detail[$curr_ele->style][0]->subtext!='')
                                            {{ ucwords($shoefinder_detail[$curr_ele->style][0]->subtext) }}
                                    @endif
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
                                @if(isset($shoefinder_detail[$curr_ele->style][0]->description) && $shoefinder_detail[$curr_ele->style][0]->description!='')
                                <div class="bf-feature" tab-index="0">
                                    <p class="bf-feature__description">
                                    {{ strip_tags($shoefinder_detail[$curr_ele->style][0]->description) }}
                                    </p>
                                </div>
                                @endif
                                
                                <div class="bf-feature">
                                @php  
                                    $benefit_1 = (!empty($curr_ele->benefit_1)) ? explode('#', $curr_ele->benefit_1) : ''; 
                                    $benefit_2 = (!empty($curr_ele->benefit_2)) ? explode('#', $curr_ele->benefit_2) : ''; 
                                    $benefit_3 = (!empty($curr_ele->benefit_3)) ? explode('#', $curr_ele->benefit_3) : ''; 
                                @endphp
                                        @if($benefit_1!='')
                                        <h2 class="bf-feature__label" tab-index="0">{{ $curr_ele->stylename }} features</h2>
                                            <div class="bf-collapsable" data-bf-collapsable tab-index="1">
                                                <div class="bf-collapsable__label">{{ (isset($benefit_1[1]) &&  $benefit_1[1]!='') ? $benefit_1[1] : "" }}</div>
                                                <div class="bf-collapsable__content">
                                                {{ (isset($benefit_1[2]) &&  $benefit_1[2]!='') ? $benefit_1[2] : "" }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($benefit_2!='')
                                            <div class="bf-collapsable" data-bf-collapsable tab-index="2">
                                                <div class="bf-collapsable__label">{{ (isset($benefit_2[1]) &&  $benefit_2[1]!='') ? $benefit_2[1] : "" }}</div>
                                                <div class="bf-collapsable__content">
                                                {{ (isset($benefit_2[2]) &&  $benefit_2[2]!='') ? $benefit_2[2] : "" }}
                                                </div>
                                            </div>
                                        @endif

                                        @if($benefit_3!='')
                                            <div class="bf-collapsable" data-bf-collapsable tab-index="3">
                                                <div class="bf-collapsable__label">{{ (isset($benefit_3[1]) &&  $benefit_3[1]!='') ? $benefit_3[1] : "" }}</div>
                                                <div class="bf-collapsable__content">
                                                {{ (isset($benefit_3[2]) &&  $benefit_3[2]!='') ? $benefit_3[2] : "" }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                                        
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

            @if(!empty($notmatch_filtered_experience)  && count($notmatch_filtered_experience) >0) 
                <!--notmatched experience products -->
                <h1 class="br-heading result-header hidden-mob">You might also be interested in:</h1> 
                <h1 class="br-heading visible-mob hidden-col hidden-tab">You might also be interested in:</h1> 
                @foreach($notmatch_filtered_experience as $curr_ele)
                    @foreach($result['colour_options'] as $product)
                        @if($product->style == $curr_ele->style)
                            @php $colors_option[$curr_ele->style][] = $product; @endphp
                        @endif
                    @endforeach 
                    @foreach($result['shoe_detail'] as $shoe)
                        @php $gender_key = ($gender=='mens') ? "men": "women"; @endphp
                        @if (\strpos($shoe->$gender_key, $curr_ele->style) !== false)
                            @php $shoefinder_detail[$curr_ele->style][] = $shoe; @endphp
                        @endif
                    @endforeach                                                                                                      
                <section class="bf-grid bf-grid--full-width bf-grid--large-pad bf-product" data-finder-result>
                    <div class="bf-grid__col-1 bf-grid__col-2-3-desktop bf-product__col">
                        <div class="bf-carousel" data-bf-carousel>
                                <div class="bf-bug">
                                    <img src="/images/shoefinder-new/banner.svg" class="bf-bug__image" />
                                    <div class="bf-bug__text">
                                    @if(isset($shoefinder_detail[$curr_ele->style][0]->subtext) && $shoefinder_detail[$curr_ele->style][0]->subtext!='')
                                            {{ ucwords($shoefinder_detail[$curr_ele->style][0]->subtext) }}
                                    @endif
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
                                @if(isset($shoefinder_detail[$curr_ele->style][0]->description) && $shoefinder_detail[$curr_ele->style][0]->description!='')
                                <div class="bf-feature" tab-index="0">
                                    <p class="bf-feature__description">
                                    {{ strip_tags($shoefinder_detail[$curr_ele->style][0]->description) }}
                                    </p>
                                </div>
                                @endif
                                
                                <div class="bf-feature">
                                @php  
                                    $benefit_1 = (!empty($curr_ele->benefit_1)) ? explode('#', $curr_ele->benefit_1) : ''; 
                                    $benefit_2 = (!empty($curr_ele->benefit_2)) ? explode('#', $curr_ele->benefit_2) : ''; 
                                    $benefit_3 = (!empty($curr_ele->benefit_3)) ? explode('#', $curr_ele->benefit_3) : ''; 
                                @endphp
                                        @if($benefit_1!='')
                                        <h2 class="bf-feature__label" tab-index="0">{{ $curr_ele->stylename }} features</h2>
                                            <div class="bf-collapsable" data-bf-collapsable tab-index="1">
                                                <div class="bf-collapsable__label">{{ (isset($benefit_1[1]) &&  $benefit_1[1]!='') ? $benefit_1[1] : "" }}</div>
                                                <div class="bf-collapsable__content">
                                                {{ (isset($benefit_1[2]) &&  $benefit_1[2]!='') ? $benefit_1[2] : "" }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($benefit_2!='')
                                            <div class="bf-collapsable" data-bf-collapsable tab-index="2">
                                                <div class="bf-collapsable__label">{{ (isset($benefit_2[1]) &&  $benefit_2[1]!='') ? $benefit_2[1] : "" }}</div>
                                                <div class="bf-collapsable__content">
                                                {{ (isset($benefit_2[2]) &&  $benefit_2[2]!='') ? $benefit_2[2] : "" }}
                                                </div>
                                            </div>
                                        @endif

                                        @if($benefit_3!='')
                                            <div class="bf-collapsable" data-bf-collapsable tab-index="3">
                                                <div class="bf-collapsable__label">{{ (isset($benefit_3[1]) &&  $benefit_3[1]!='') ? $benefit_3[1] : "" }}</div>
                                                <div class="bf-collapsable__content">
                                                {{ (isset($benefit_3[2]) &&  $benefit_3[2]!='') ? $benefit_3[2] : "" }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                                        
                                    <div class="bf-product-details__button-wrap" data-gtm-product data-gtm-product-impressions data-gtm-click-event="productClick"  data-gtm-product-id="110279" data-gtm-product-name="{{ $curr_ele->stylename }}" data-gtm-currency-code="USD" data-gtm-product-brand="Mazama 2" data-gtm-product-category="shoes-men-trail" data-gtm-product-variant="null" data-gtm-product-price="90.96" data-gtm-page-list="shoe-finder-results" data-gtm-topResults-crossSell="top results" data-gtm-shoe-pronation="neutral" data-gtm-oos-boolean="false" data-gtm-product-gender="male"  data-gtm-is-recommendation="true">
                                        <a href="/{{ $curr_ele->seo_name.'/'.$curr_ele->style.'_'.$curr_ele->color_code }}.html" class="bf-button bf-button--full-width" tab-index="0">Shop the {{ $curr_ele->stylename }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endforeach
            @endif


            
        @else
        <h1 class="br-mainheading"> Sorry, No Result Found!</h1>
        @endif
            <!-- END: Result 1 -->

        <hr style="width:90%; background-color:#ecebeb;"/>
        @if(!auth()->user())
        <div class="login-section bottom-login-section">
            <p class="result-login">Sign up for a Brooks Running account to access your shoe finder results, receive news and exclusive offers:</p>
            <div class="button_fixed">
		       	<a class="bf-button bf-button--full-width savemyresults" href="javascript:void(0);">Save my results</a>
            </div>
                   <!-- Login Form -->
                   <section class="create-account wrapper shoefinder-create-account" >
                       
                   <form name="registerform2" method="POST" action="{{ route('register') }}" onsubmit="return registervalidation('registerform2')">
                        @csrf   
                        <div class="row">
                                <div class="col-9">
                                    <div class="create-account--left" style="margin: 0 auto;">
                                    <div class="row">
                                        <div class="tab-6">
                                            <div class="input-wrapper">
                                                <label for="" style="text-align:left;"><sup>*</sup>Email Address :@if ($errors->has('email')) <span class="error invalid-feedback">{{ $errors->first('email') }} </span> @endif</label>
                                                <input type="text" id='email' name="email" class="input-field">
                                            </div>
                                        </div>
                                        <div class="tab-6">
                                            &nbsp;
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="tab-6">
                                            <div class="input-wrapper">
                                                <label for="password" style="text-align:left;"><sup>*</sup>Password :  @if ($errors->has('password')) <span class="error error invalid-feedback"> <strong>{{ $errors->first('password') }}</strong> </span> @endif</label>
                                                <input type="password" id='password' name="password" class="input-field">
                                            </div>
                                        </div>
                                        <div class="tab-6">
                                            <div class="input-wrapper">
                                                <label for="password" style="text-align:left;"><sup>*</sup>Confirm Password</label>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="input-field">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="tab-12">
                                            <div class="input-wrapper">
                                                <div class="checklist-inline" style="text-align:left;">
                                                        <input type="checkbox" id="signme" name="newsletter_subscription" value="1">
                                                    <label for="signme">
                                                            <div class="mark"><span></span></div>
                                                            <div class="text">Please sign me up to receive Brooks email newsletter The Run Down.</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="button_bottom">
                                                <!--<button type="submit" class="bf-button bf-button--full-width" href="/">Create an account</button>-->
                                                <div class="cart-btn comp-submit" >
                                                    <div class="alignleft inline-loader">
                                                        <button class="primary-button" id="comp_submit_btn">Create an account</button>
                                                    </div>
                                                    <div class="alignright inline-loader">
                                                        <div id = "comp_loader"  style="display:none">
                                                            <img src = "/images/loader.gif" alt="comp-loader" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<br>
                                            <p class="privacy" style="text-align:left; color:#000;">Have an account? <a href="/login" style="color:#000; font-size:14px; text-decoration:none;">Log in now <img style="width:14px;" src="/images/home/link-arrow--icon.png" alt=""></a></p>-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-12">
                                        <p class="privacy" style="text-align:left; color:#000;">Have an account? <a href="/login" style="color:#000; font-size:14px; text-decoration:none;">Log in now <img style="width:14px;" src="/images/home/link-arrow--icon.png" alt=""></a></p>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                      </section>
                   <!-- End Login Form -->
         </div>
            
        </div>
        @endif
    </div>
</div>	
</div>	

