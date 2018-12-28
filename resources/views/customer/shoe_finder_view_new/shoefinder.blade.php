@extends('customer.layouts.master')
@section('content')
<link href="/css/shoefinder-new/idangerous.swiper.css" rel="stylesheet">
<link href="/css/shoefinder-new/ss.min.css" rel="stylesheet">

<div class="wrapper" style="padding-bottom:30%;">
  	<div class="row">
   		<div class="col-12">
			<article class="bf pt_shoefinder" data-bf-document="" data-bf-app="">		
				<div class="bf-page" data-bf-page="">
					<div class="bf-content-wrap">
						<!-- START: Page Header -->
						<header class="bf-header" data-bf-header="">
							<a href="/shofinder-new" class="bf-header__logo bf-logo bf-logo--visible bf-logo--large" data-bf-logo="" data-bf-change-screen-link="" data-id="Start" tabindex="0" title="Go to start screen">
								<img src="/images/shoefinder-new/shoefinder_logo.svg" alt="Brooks Shoe Finder" role="logo">
							</a>
							<div class="bf-header__progress-wrap">
								<div class="bf-header__progress" data-bf-open-progress-link="">
									<!-- START: Progress Nav -->
									<nav class="bf-progress bf-progress--can-hover" data-bf-progress="">
										<div class="bf-progress__close" data-bf-close-progress-link=""><i class="bf-close-icon"></i></div>
										<div class="bf-progress__indicator-wrap" aria-hidden="true">
											<div class="bf-progress__indicator" data-active-indicator="" style="opacity: 1; transform: translateX(0px); top: 0%;">1</div>
										</div>
										<div class="bf-progress__items-wrap" data-items="">
								
											<div class="bf-progress__item active" aria-label="1. Terrain" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Terrain" data-gtm-step-number="1" role="heading" tabindex="0">
												<div class="bf-progress__item__check"><i></i></div>
									
												<div class="bf-progress__item__title">Terrain</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="surface" data-value="road" aria-hidden="true" style="display: none;">Road</div>
													<div data-bf-show-on-form-value="" data-name="surface" data-value="trail" aria-hidden="true" style="display: none;">Trail</div>
												</div>
											</div> 
									
											<div class="bf-progress__item incomplete" aria-label="2. Mileage" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Mileage" data-gtm-step-number="2" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Mileage</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="run_distance" data-value="0" aria-hidden="true" style="display: none;">0-10 miles</div>
													<div data-bf-show-on-form-value="" data-name="run_distance" data-value="1" aria-hidden="true" style="display: none;">11-30 miles</div>
													<div data-bf-show-on-form-value="" data-name="run_distance" data-value="2" aria-hidden="true" style="display: none;">31+ miles</div>
												</div>
											</div>
									
											<div class="bf-progress__item incomplete" aria-label="3. Training" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Training" data-gtm-step-number="3" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Training</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="training" data-value="0" aria-hidden="true" style="display: none;">Health</div>
													<div data-bf-show-on-form-value="" data-name="training" data-value="1" aria-hidden="true" style="display: none;">5k</div>
													<div data-bf-show-on-form-value="" data-name="training" data-value="2" aria-hidden="true" style="display: none;">10k</div>
													<div data-bf-show-on-form-value="" data-name="training" data-value="3" aria-hidden="true" style="display: none;">Half Marathon</div>
													<div data-bf-show-on-form-value="" data-name="training" data-value="4" aria-hidden="true" style="display: none;">Marathon or more</div>
												</div>
											</div>
									
											<div class="bf-progress__item incomplete" aria-label="4. Recent Injuries" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Recent Injuries" data-gtm-step-number="4" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Recent Injuries</div>
												<div class="bf-progress__item__value">
													<div data-bf-injury-value="" data-input-name="injury" data-value-label-map="{&quot;knees&quot;:&quot;Knees&quot;,&quot;leg&quot;:&quot;Lower Leg&quot;,&quot;foot&quot;:&quot;Foot or Arch&quot;,&quot;none&quot;:&quot;None of these&quot;}"></div>
												</div>
											</div>
									
											<div class="bf-progress__item incomplete" aria-label="5. Foot Angle" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Foot Angle" data-gtm-step-number="5" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Foot Angle</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="feet" data-value="0" aria-hidden="true" style="display: none;">Parallel</div>
													<div data-bf-show-on-form-value="" data-name="feet" data-value="1" aria-hidden="true" style="display: none;">Inward</div>
													<div data-bf-show-on-form-value="" data-name="feet" data-value="2" aria-hidden="true" style="display: none;">Outward</div>
												</div>
											</div>
											
											<div class="bf-progress__item incomplete" aria-label="6. Balance" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Balance" data-gtm-step-number="6" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Balance</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="balance" data-value="0" aria-hidden="true" style="display: none;">Stable</div>
													<div data-bf-show-on-form-value="" data-name="balance" data-value="1" aria-hidden="true" style="display: none;">Unstable</div>
												</div>
											</div>
									
											<div class="bf-progress__item incomplete" aria-label="7. Knee Bend" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Knee Bend" data-gtm-step-number="7" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Knee Bend</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="knee" data-value="0" aria-hidden="true" style="display: none;">The pressure increases</div>
													<div data-bf-show-on-form-value="" data-name="knee" data-value="1" aria-hidden="true" style="display: none;">The pressure decreases</div>
													<div data-bf-show-on-form-value="" data-name="knee" data-value="2" aria-hidden="true" style="display: none;">The pressure doesn't change</div>
												</div>
											</div>
									
											<div class="bf-progress__item incomplete" aria-label="8. Flexibility" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Flexibility" data-gtm-step-number="8" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Flexibility</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="flexibility" data-value="0" aria-hidden="true" style="display: none;">Not that flexible</div>
													<div data-bf-show-on-form-value="" data-name="flexibility" data-value="1" aria-hidden="true" style="display: none;">Very Flexible</div>
												</div>
											</div>
									
											<div class="bf-progress__item incomplete" aria-label="9. Shoe Feel" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Shoe Feel" data-gtm-step-number="9" role="" tabindex="">
												<div class="bf-progress__item__check"><i></i></div>
												<div class="bf-progress__item__title">Shoe Feel</div>
												<div class="bf-progress__item__value">
													<div data-bf-show-on-form-value="" data-name="feel" data-value="0" aria-hidden="true" style="display: none;">Feel</div>
													<div data-bf-show-on-form-value="" data-name="feel" data-value="1" aria-hidden="true" style="display: none;">Float</div>
												</div>
											</div>
									
									<div class="bf-progress__item incomplete" arial-label="10. Shoe Impact" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Shoe Impact" data-gtm-step-number="10" role="" tabindex="">
										<div class="bf-progress__item__check"><i></i></div>
										<div class="bf-progress__item__title">Shoe Impact</div>
										<div class="bf-progress__item__value">
											<div data-bf-show-on-form-value="" data-name="impact" data-value="0" aria-hidden="true" style="display: none;">Fast</div>
											<div data-bf-show-on-form-value="" data-name="impact" data-value="1" aria-hidden="true" style="display: none;">Connected</div>
											<div data-bf-show-on-form-value="" data-name="impact" data-value="2" aria-hidden="true" style="display: none;">Soft</div>
											<div data-bf-show-on-form-value="" data-name="impact" data-value="3" aria-hidden="true" style="display: none;">Springy</div>
										</div>
									</div>
									
									<div class="bf-progress__item incomplete" arial-label="11. Shoe Preference" data-gtm-click-event="shoe-finder-nav" data-gtm-screen-title="Shoe Preference" data-gtm-step-number="11" role="" tabindex="">
										<div class="bf-progress__item__title">Shoe Preference</div>
										<div class="bf-progress__item__value">
											<div data-bf-show-on-form-value="" data-name="gender" data-value="womens" aria-hidden="true" style="display: none;">Women's</div>
											<div data-bf-show-on-form-value="" data-name="gender" data-value="mens" aria-hidden="true" style="display: none;">Men's</div>
										</div>
										<div class="bf-progress__item__number" aria-hidden="true">11</div>
										<div class="bf-progress__item__check"><i></i></div>
									</div>
								</div>
							</nav>
							<!-- END: Progress Nav -->
						</div>
					</div>
					<div class="bf-header__aria-progress" role="progressbar" aria-valuemin="0" aria-valuemax="11" aria-valuenow="0" data-bf-aria-progress=""></div>
					<div class="bf-checkpoint-header" data-bf-checkpoint-header="">
						<div class="bf-checkpoint-header__label">Checkpoint</div>
						<div class="bf-checkpoint-header__bar"><div class="bf-checkpoint-header__bar__fill" data-bar=""></div></div>
					</div>
				</header>
				<!-- END: Page Header -->
				<div class="bf-content">
					<form class="bf-form" name="bf-form" novalidate="novalidate">
						
						<!-- START: Intro Screen -->
						<section class="bf-screen bf-start-screen bf-screen--render bf-screen--active" data-bf-screen="" data-id="Start">
							<div class="bf-screen__content">
								<div class="bf-line-background bf-start-screen__transition-group">
									<div data-bf-svg="" data-url="/images/shoefinder-new/background_lines.svg" class="bf-media--loaded"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 997.5 795">
									<g>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M237.8,479.9   c-23.7-26.6-27.8-74.8,5.4-104.2c33.2-29.4,60.2-40.1,60.2-40.1s13.6-4.3,17.9-21.7c4.3-17.4,21.2-65.1,66.7-75.4   s63.3-21.7,185.7,3.3s171.2,79.8,178.3,109c7.1,29.3,26.5,105.2-55.4,131.3s-78.1,0-173.6,43.4s-74.5,36.5-135.4,38.3   S261.5,506.6,237.8,479.9z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M425.5,325.8   c0,0,51.9-2.7,125.3,15.7S655.4,371,665,378.2c9.7,7.2,19.3,21.3-19.8,24.9c-39.1,3.6-127.2,11.7-156.1,26.1   c-28.9,14.4-62.1,44.6-81.5,44.4c-19.5-0.2-76.5-3.9-71.6-29.1c4.9-25.3,56.4-32.7,76-38.5c19.5-5.8,90.6-11.2,109.6-16.6   s43.7-17.4-18.8-43.9C502.7,345.4,463.3,328.2,425.5,325.8z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M436.9,367.6   c0,0-46.1-8.7-52.1-32c-6-23.3,11.4-42.7,57-39.5c45.6,3.2,114.5,2.6,162.2,19.4c47.7,16.8,98.7,32.6,97.1,72.2   s-55.9,44.9-55.9,44.9s-91.7,8.3-116.1,23c-24.4,14.6-103.1,52.6-124.2,54.8c-21.2,2.2-50.2-2.2-78-22.8   c-27.8-20.6-46.6-52-24.5-73.6C310.5,405.9,388.1,371.4,436.9,367.6z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M353.4,348.1   c0,0-97.1,32-96.6,78.7c0.5,46.7,22.8,73,92.2,108.2c69.3,35.2,147.7-48.5,238.8-66.9c91.1-18.4,145.4-5.4,143.8-79.2   s-77.6-87.4-98.7-95s-128-43.9-195.3-35.2S334.9,298.7,353.4,348.1z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M253.1,536.3   c-19.8-17.2-72.3-58.5-60.9-130.4c5.4-34.3,58.1-70.3,72.7-79c14.6-8.7,17.2-10.2,23.6-30.8c13.4-43.5,52.8-73,52.8-73   c13.1-10.7,58.5-19.7,79.4-22.1s73.5,1.1,73.5,1.1c84.4,3.8,198.8,29.3,251.4,76c52.6,46.7,54.3,130.2,46.1,165   c-8.1,34.8-40.7,49.9-90.6,67.7c-49.9,17.9-123.7,26.1-159,37.1c-35.3,11-43.7,17.2-96.2,43.7S272.9,553.5,253.1,536.3z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M209,539   c-49.9-33.8-50.4-119.3-50.4-119.3c9.4-83.9,88-117.2,97.9-128.7c9.9-11.5,42.2-111.6,151-117.5c108.8-5.8,197.7,14.1,197.7,14.1   s108.7,22.7,159.2,69.6c50.5,46.8,67.5,71.7,64.2,143.1S789.5,533,689.7,552.8s-60.8-1.7-156.2,38.1c0,0-106.3,58.4-182.4,23.9   S258.9,572.8,209,539z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M189.8,557.7   c-57.8-48.9-69.2-162.4-37.7-216.1s51.8-57.8,62.5-68.7c10.7-10.8,52.7-71.2,99.3-106.6s126.1-22.7,242-13.3s208.5,67.9,208.5,67.9   c66,35.6,91.9,100,94.6,163c2.7,62.9-26,106.9-50.5,142.7c-24.4,35.8-88.4,52.1-130,58.2c-41.6,6.1-85.1,19.1-85.1,19.1   c-17.2,0.7-81.6,58-196.6,44.5S247.6,606.6,189.8,557.7z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M132.7,541.9   c-62.7-93.3-47.7-126.7-35.9-164s81.1-117.1,81.1-117.1s81.7-142.2,251.3-151.2c204.3-10.8,389.2,101.5,411.2,136.4   c0,0,40.8,49.5,46.8,116.7c6,67.1,18.3,171.9-119.7,228.2c-15.9,6.5-141.2,45.4-157.8,48.1s-87.3,51-151.3,47.9   c-64-3.1-180.8-19.7-233.6-57.3S132.7,541.9,132.7,541.9z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M116.6,574.1   c-40.3-61.7-59.4-131.6-50.2-192.9s57.3-102,71.2-124.8c13.9-22.8,43.9-77.9,120.8-128.9S439.3,74.9,545.8,83   s256.4,37.3,349.3,205.6c27.2,49.4,24.9,127.1,24.9,127.1c-9.4,118.8-68.5,156.3-68.5,156.3c-133.8,77.9-205,101.2-242.1,111.9   c-37.1,10.7-120.8,69.4-249.3,31.8C231.6,678,156.8,635.8,116.6,574.1z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M82.7,287.4   c-2.2,3.7-34.8,35.2-45.6,93.8s12.7,150.4,66.1,220.5c0,0,77.8,84.3,209.9,131.8c132,47.4,187.5,22.8,245.7,11.2   s209-87.7,312.6-167.8c164.6-127.4,48.3-295,45.8-300.3c-5.7-12.1-62.4-158.4-260.6-207.3s-377.8-30-450,45.2   S82.7,287.4,82.7,287.4z"></path>
										<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M59.6,240.5   c0,0-36.6,57.2-46.9,108.7s-17.9,79.8-8.1,127.5s69.9,136.8,78,149S227.1,754.5,375.7,784s217.1-18.4,287.3-32.7   s217.5-150.8,249.4-174.6c164.2-122,47.5-295.2,44.6-300.3c-20-35.4-84.5-148.2-140.6-182.3S547.3-11.4,414.7,3.5   s-254.9,90.7-302,160.6S59.6,240.5,59.6,240.5z"></path>
									</g>
									</svg></div>
								</div>
								<div class="bf-screen__title bf-start-screen__transition-group">
									<!-- tabindex is added on headers so screenreaders will correctly focus when transitioning to new screen -->
									<h1 class="bf-main-headline" data-focus-first="" tabindex="0">Your perfect shoe is out there</h1>
								</div>
								<div class="bf-screen__main bf-start-screen__transition-group">
									<img src="/images/shoefinder-new/shoe_animation.gif" srcset="/images/shoefinder-new/shoe_animation.gif 1300w" sizes="(min-width: 769px) 800px, 100vw" class="bf-image bf-load-image loaded" data-bf-image="" alt="Your perfect shoe">
								</div>
								<div class="bf-start-screen__transition-group">
									<p class="bf-centered-paragraph">In 5 minutes or less, Brooks Shoe Finder will identify the right running shoe for your workout. Whether you're training for a marathon or running just for fun, we'll match you with the perfect level of support for your training goals.</p>
									<div class="bf-button-wrap" data-bf-hide-on-form-progress="" aria-hidden="false">
										<button type="button" class="bf-button" data-bf-next-screen-link="" data-gtm-screen-title="Start" data-gtm-click-event="shoe-finder-start">Let's Go</button>
									</div>
									<div class="bf-button-wrap bf-button-wrap--list" data-bf-show-on-form-progress="" aria-hidden="true" style="display: none;">
										<div class="bf-button-wrap__item" data-bf-show-on-form-complete="" aria-hidden="true" style="display: none;">
											<button type="button" class="bf-button" data-bf-screen-load-button="" data-bf-change-screen-link="" data-id="Results" data-bf-event="viewResults" data-gtm-click-event="view-results">See Your Results<i class="bf-button__loader"></i></button>
										</div>
										<div class="bf-button-wrap__item" data-bf-hide-on-form-complete="" aria-hidden="false">
											<button type="button" class="bf-button" data-bf-screen-load-button="" data-bf-next-screen-link="" data-bf-event="continueQuiz" data-gtm-click-event="continue-quiz">Continue<i class="bf-button__loader"></i></button>
										</div>
										<div class="bf-button-wrap__item">
											<button type="button" class="bf-button bf-button--secondary" data-gtm-click-event="shoe-finder-start" data-bf-restart-link="" data-bf-event="restartQuiz">Start Over</button>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- END: Intro Screen -->
						
						<!-- START: QUESTION START 1 --> 
						<section class="bf-screen bf-screen--stretch bf-terrain-screen" data-bf-screen="" data-id="Terrain" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-screen__title bf-terrain-screen__transition-group">
									<h2 data-focus-first="" tabindex="0">Where do you want to run?</h2>
								</div>
								<div class="bf-screen__main"></div>
									<div class="bf-button-wrap bf-button-wrap--pair bf-terrain-screen__transition-group-2">					
										<div class="bf-button-wrap__item">
											<!--  option road -->
											<!--  valueOverride road -->
											<!--  answered? No -->
											<!--  answer is:  false -->
											<input type="radio" name="surface" value="road" id="surface_0" tabindex="-1" required="" aria-hidden="true">

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="surface_0" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-event="questionAnswered" data-event-label="Terrain" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="1" data-gtm-screen-title="Terrain" data-gtm-user-response="SurfaceRoad" data-gtm-question="Where do you want to run?" data-gtm-question-category="Demographics">Road / Gym</button>
										</div>				
										<div class="bf-button-wrap__item">
											<!--  option trail -->
											<!--  valueOverride trail -->
											<!--  answered? No -->
											<!--  answer is:  false -->
											<input type="radio" name="surface" value="trail" id="surface_1" tabindex="-1" required="" aria-hidden="true">

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="surface_1" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-event="questionAnswered" data-event-label="Terrain" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="1" data-gtm-screen-title="Terrain" data-gtm-user-response="SurfaceTrail" data-gtm-question="Where do you want to run?" data-gtm-question-category="Demographics">Trail</button>
										</div>	
									</div>	
								</div>							
							</section>
						<!-- END: QUESTION 1 -->
						
						<!-- START: QUESTION START 2 -->
						<section class="bf-screen bf-screen--stretch bf-distance-screen" data-bf-screen="" data-id="Mileage" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-screen__title bf-distance-screen__transition-group">
									<h2 data-focus-first="" tabindex="0">In the past six months, about how much did you run each week?</h2>
								</div>
								<div class="bf-screen__main"></div>
								<div class="bf-button-wrap bf-button-wrap--list bf-distance-screen__transition-group-2">
									<div class="bf-button-wrap__item">
										<!--  option 10 -->
										<!--  valueOverride 0 -->
										<!--  answered? No -->
										<!--  answer is:  false -->
										<input type="radio" name="run_distance" value="0" id="run_distance_0" tabindex="-1" required="" aria-hidden="true">
			
										<button type="button" class="bf-button" data-bf-input-button="" data-input-id="run_distance_0" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-event="questionAnswered" data-event-label="Distance" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="2" data-gtm-screen-title="Mileage" data-gtm-user-response="0-10 miles" data-gtm-question="In the past six months, about how much did you run each week?" data-gtm-question-category="Demographics">0-10 miles</button>
									</div>									
									
									<div class="bf-button-wrap__item">
										<!--  option 5 -->
										<!--  valueOverride 1 -->
										<!--  answered? No -->
										<!--  answer is:  false -->
										<input type="radio" name="run_distance" value="1" id="run_distance_1" tabindex="-1" required="" aria-hidden="true">
										
										<button type="button" class="bf-button" data-bf-input-button="" data-input-id="run_distance_1" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-event="questionAnswered" data-event-label="Distance" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="2" data-gtm-screen-title="Mileage" data-gtm-user-response="11-30 miles" data-gtm-question="In the past six months, about how much did you run each week?" data-gtm-question-category="Demographics">11-30 miles</button>
									</div>									
									
									<div class="bf-button-wrap__item">
										<!--  option 0 -->
										<!--  valueOverride 2 -->
										<!--  answered? No -->
										<!--  answer is:  false -->
										<input type="radio" name="run_distance" value="2" id="run_distance_2" tabindex="-1" required="" aria-hidden="true">
		
										<button type="button" class="bf-button" data-bf-input-button="" data-input-id="run_distance_2" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-event="questionAnswered" data-event-label="Distance" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="2" data-gtm-screen-title="Mileage" data-gtm-user-response="31+ miles" data-gtm-question="In the past six months, about how much did you run each week?" data-gtm-question-category="Demographics">31+ miles</button>
									</div>									
								</div>
							</div>
						</section>
						<!-- END: QUESTION 2 -->
												
						<!-- START: Training Screen -->
						
						<section class="bf-screen bf-training-screen" data-bf-screen="" data-id="Training" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-training-screen__transition-group">
									<div class="bf-screen__title">
										<h2 data-focus-first="" tabindex="0">What are you training for?</h2>
									</div>
									<div data-bf-behind-the-science-link="" data-template-id="TrainingInfo" data-screen-title="Training" data-gtm-screen-title="Training" data-gtm-click-event="shoe-finder-behind-the-science"><div role="button" class="bf-info-link" data-bf-info-overlay-link="" data-template-id="TrainingInfo" data-bf-button="" data-bf-event="behindScience" data-event-label="" tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"></path>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div></div>
								</div>
								<div class="bf-screen__main">
									<div class="bf-grid bf-grid--pad-vert bf-grid--extra-large">
										
											
												<div class="bf-grid__col-1-2 bf-grid__col-1-3-tablet-up bf-training-screen__transition-group-2">
													


	  <!--  option [object Object] -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="training" value="0" id="training_0" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="training_0Label" class="bf-media-button bf-media-button--aspect bf-media-button--aspect-square" data-bf-input-button="" data-input-id="training_0" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Training" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="3" data-gtm-screen-title="Training" data-gtm-question-category="Demographics" data-gtm-user-response="Health" data-gtm-question="What are you training for?" tabindex="0">
											
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg bf-media--loaded" data-bf-svg="" data-url="/images/shoefinder-new/heart.svg" data-bf-stepped-animation="" data-active-screens="Training"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="image">
<title>Health</title>
<g id="Fills1">
	<g>
		<path style="fill:#ABC0DE;" d="M101.8,68.5c0.5-0.6,0.7-1.8,1.1-2.4c2-3.2,4-4.5,5.9-7.8c2.9-5.1,5.6-7.6,10.4-10.7    c1.2-0.8,2.7-1.1,4.1-1.5c1.6-0.5,3.1-0.9,4.7-1.3c9-2,16.8-0.3,22.8,7.2c0.8,1,1.5,1.2,2,2.4c1.5,3.6,2.8,7.3,4.2,11    c0.2,0.6,0.4,1.3,0.4,1.9c0,6.2-0.3,12.4-3.9,17.9c-0.5,0.8-1,1.8-1.1,2.7c-0.2,3.6-2.2,6.4-3.8,9.5c-8.8,17-20.2,32.4-32.3,47.2    c-3.6,4.4-7.7,8.4-10.9,13.2c-1.3,1.8-0.1,3-5.1,3c-4.8-5.3-9.8-10.6-14.7-16c-0.1-0.1-0.2-0.2-0.3-0.4c-4.9-6.5-9.9-13-14.8-19.5    c-1.4-1.8-2.8-3.6-4.2-5.4c-1.8-2.3-3.7-4.6-5.5-6.9c-0.8-1-1.5-2.2-2.5-3c-5.3-4.8-8.4-11.1-11.8-17.2c-0.9-1.6-1.7-3.2-2.3-4.8    c-0.6-1.5-1.2-3-1.5-4.6c-0.6-3.7-0.9-7.4-1.4-11.2c-0.8-6,0.3-12.2,3.2-17.2c0.6-1.1,2-1.6,2.9-2.5c3.8-3.7,8.5-5.4,13.5-6.5    c1.7-0.4,4.2-1.4,5.8-1c4.9,1.2,10.2,1.1,14.5,3.8c2,1.3,6.5,4.3,8.2,6c2.2,2.2,4.4,5.1,6.6,7.3C98,63.8,99.4,66.2,101.8,68.5z"></path>
		<path style="fill:#FFFFFF;" d="M134.9,57.3c4.8,4,6.6,10.6,4.1,16.4c-0.8,1.9,2,3.6,2.9,1.7c3.1-7.1,1.4-13.2-4.6-18.2    C135.6,55.8,133.2,55.9,134.9,57.3L134.9,57.3z"></path>
	</g>
</g>
<g id="Fills2">
	<g>
		<path style="fill:#ABC0DE;" d="M102.4,66.1c0.5-0.6,1-1.2,1.4-1.8c2-3.2,4-4.5,5.8-7.8c2.8-5.1,5.5-7.6,10.2-10.7    c1.2-0.8,2.6-1.1,4-1.5c1.5-0.5,3.1-0.9,4.6-1.3c8.9-2,18.2,2,24.1,9.5c0.8,1,1.5,1.2,2,2.4c1.5,3.6,1.2,5,2.5,8.6    c0.2,0.6,0.4,1.3,0.4,1.9c0,6.2-0.3,12.4-3.9,17.9c-0.5,0.8-1,1.8-1.1,2.7c-0.2,3.6-2.2,6.4-3.7,9.5c-8.7,17-20,32.4-31.9,47.2    c-3.6,4.4-7.6,8.4-10.8,13.2c0.6,1.5,0.9,0.2-5,1.8c-4.8-5.3-9.7-9.4-14.6-14.8c-0.1-0.1-0.2-0.2-0.3-0.4    c-4.9-6.5-11.5-13-16.4-19.5c-1.4-1.8-2.8-3.6-4.2-5.4c-1.8-2.3-3.6-4.6-5.5-6.9c-0.8-1-1.5-2.2-2.4-3c-5.2-4.8-6.5-11.1-9.8-17.2    c-0.8-1.6-1.6-3.2-2.3-4.8c-0.6-1.5-1.2-3-1.5-4.6c-0.6-3.7-0.9-7.4-1.4-11.2c-0.8-6,0.3-14,3.1-19.1c0.6-1.1,2-1.6,2.9-2.5    c3.7-3.7,8.4-3.6,13.3-4.7c1.7-0.4,3.6-0.6,5.3-0.2c4.8,1.2,9.7,2.4,14,5.1c2,1.3,7.5,2.6,9.2,4.3c2.1,2.2,4.1,4.6,6.2,6.8    C99,62,100,63.7,102.4,66.1z"></path>
		<path style="fill:#FFFFFF;" d="M135.4,55.5c4.7,4,6.5,10.6,4,16.4c-0.8,1.9,2,3.6,2.8,1.7c3-7.1,1.4-13.2-4.6-18.2    C136.1,54,133.8,54.1,135.4,55.5L135.4,55.5z"></path>
	</g>
</g>
<g id="Fills3">
	<g>
		<path style="fill:#ABC0DE;" d="M102,66.8c0.5-0.6,1.7-2.6,2.1-3.3c1.9-3.2,4-4.5,5.8-7.8c2.8-5.1,5.5-7.6,10.2-10.7    c1.2-0.8,2.6-1.1,4-1.5c1.5-0.5,3.1-0.9,4.6-1.3c8.8-2,16.5-0.3,22.4,7.2c0.8,1,1.5,1.2,2,2.4c1.5,3.6,2.8,7.3,4.1,11    c0.2,0.6,0.4,1.3,0.4,1.9c0,6.2-0.3,12.4-3.8,17.9c-0.5,0.8-1,1.8-1.1,2.7c-0.2,3.6-2.2,6.4-3.7,9.5c-8.7,17-19.9,32.4-31.7,47.2    c-3.5,4.4-7.5,8.4-10.7,13.2c-1.2,1.8,0.1,2.4-3.6,3.6c-4.8-5.3-11-11.2-15.8-16.6c-0.1-0.1-0.2-0.2-0.3-0.4    c-4.8-6.5-9.7-13-14.6-19.5c-1.4-1.8-2.8-3.6-4.2-5.4c-1.8-2.3-3.6-4.6-5.4-6.9c-0.8-1-1.5-2.2-2.4-3c-5.2-4.8-8.3-11.1-11.5-17.2    c-0.8-1.6-0.9-0.3-1.5-1.9c-0.6-1.5-4-5.4-4.2-7c-0.6-3.7,0-9.9-0.4-13.6c-0.8-6,1.4-10.3,4.2-15.4c0.6-1.1,2-1.6,2.9-2.5    c3.7-3.7,8.3-5.4,13.2-6.5c1.7-0.4,3.6-0.6,5.2-0.2c4.8,1.2,9.7,2.4,14,5.1c2,1.3,7.5,2.6,9.2,4.3c2.1,2.2,4.1,4.6,6.2,6.8    C99.3,61.2,99.7,64.4,102,66.8z"></path>
		<path style="fill:#FFFFFF;" d="M135.3,55.5c4.7,4,6.5,10.6,4,16.4c-0.8,1.9,2,3.6,2.8,1.7c3-7.1,1.4-13.2-4.5-18.2    C136,54,133.7,54.1,135.3,55.5L135.3,55.5z"></path>
	</g>
</g>
<g id="Lines">
	<path style="fill:#162B54;" d="M117.9,58.2c0.5,0.4,0.9,0.5,0.7,1.2c-0.1,0.5-0.3,0.8-0.9,0.8c-1.7-0.1-3.3-0.1-5-0.2   c-0.3,0-0.6-0.3-0.9-0.5c0.2-0.3,0.4-0.5,0.6-0.8c0.1-0.1,0.4-0.3,0.5-0.3C114.6,58.3,116.2,58.2,117.9,58.2z"></path>
	<path style="fill:#162B54;" d="M122.8,55.2c0,0-0.2,0.3-0.4,0.3c-1.8,0-3.7,0.1-5.5,0c-0.3,0-0.5-0.2-0.3-0.6   c0.3-0.6,0.7-1.1,1.4-1.1c0.9-0.1,1.8-0.2,2.7-0.3c0.8-0.2,1.4,0,2,0.5C123.1,54.4,123.2,54.6,122.8,55.2z"></path>
	<path style="fill:#162B54;" d="M123.4,50.8c-0.3-0.2-0.5-0.2-0.7-0.3c0.2-0.2,0.3-0.4,0.5-0.5c1.1-1.2,2.5-0.8,3.9-0.5   c0.2,0,0.4,0.2,0.5,0.4c0.2,0.3,0.3,0.7,0.3,1c0,0.5-0.4,0.6-0.9,0.6C125.8,51.2,124.5,51,123.4,50.8z"></path>
	<path style="fill:#162B54;" d="M113.6,63.3c0,0.7-0.6,0.9-1.3,0.9c-1.2,0-2.3-0.1-3.5-0.1c-0.5,0-0.5-0.3-0.2-0.6   c0.8-1.1,3.4-1.7,4.6-1.1C113.6,62.5,114,62.7,113.6,63.3z"></path>
	<path style="fill:#162B54;" d="M156.2,86.7c-0.4,3.1-1.6,5.9-2.8,8.7c-0.6,1.3-1.1,2.7-1.7,4c-0.4,0.8-0.7,1.6-1.2,2.3   c-1.5,2.2-3.1,4.4-4.7,6.5c-1.6,2-3.3,3.9-4.9,5.8c-0.5,0.6-0.8,1.3-1.4,1.8c-1.9,1.8-3.3,3.8-4.7,6c-0.2,0.3-0.4,0.5-0.6,0.8   c-2.3,2.8-4.5,5.7-7,8.4c-1.7,1.9-2.8,4.2-4.4,6.2c-1.3,1.7-2.5,3.5-3.8,5.2c-1.9,2.4-4,4.8-6,7.2c-0.2,0.3-0.4,0.5-0.6,0.8   c-1.3,1.9-2.7,3.9-4,5.8c-0.7,1-1.2,2.1-1.9,3.1c-0.4,0.6-1,1.2-1.5,1.8c-0.6,0.7-1.2,1.4-1.7,2.1c-0.4,0.5-0.7,0.6-1.4,0.5   c-1.7-0.3-2.8-1.3-3.8-2.5c-0.4-0.5-1.1-0.7-1.5-1.2c-1.7-2.1-3.3-4.3-4.9-6.5c-0.5-0.7-4.7-4.5-5.3-5.9c-0.3-0.7-1-1.3-1.5-2   c-0.3-0.4-1.9-2.1-2.3-2.5c-1.6-2-3.2-4.1-4.7-6.2c-1.2-1.6-2.1-3.4-3.3-5.1c-1.1-1.6-2.3-3.2-3.4-4.8c-1-1.4-1.9-2.9-3-4.2   c-0.9-1.1-2-2-2.9-3c-0.8-0.9-1.6-1.9-2.4-2.9c-1-1.2-2-2.5-3-3.7c-1.3-1.6-2.8-3.1-4-4.7c-1.2-1.6-2.3-3.3-3.4-5   c-0.7-1-4.5-7.4-5.2-8.3C45.4,92.7,44.3,90,44,87c-0.2-1.2-0.7-2.4-1-3.6c-0.5-2-1-4-1.2-6.1c-0.1-1.9,0.2-3.9,0.4-5.9   c0.1-1.4,0.5-2.7,0.6-4.1c0.2-3.3,1.3-6.4,2.9-9.3c1.1-2,2.3-4,4-5.6c0.5-0.4,0.8-1.1,1.2-1.6c1-1.5,2.4-2.6,4-3.5   c1.1-0.6,2-1.7,3.4-1.7c2.2-2,5.2-2,7.9-2.8c1.4-0.4,2.9-0.9,4.3-0.8c3.4,0.3,6.8,0.8,9.8,2.7c0.6,0.4,1.3,0.5,2,0.8   c1.3,0.6,2.6,1.1,3.8,1.7c2.3,1.2,4.6,2.5,6.8,3.7c1.7,1,8.7,8.4,9.3,8.8c0.6,0.4,0.9,0.2,1.3-0.4c1.3-2.2,2.5-4.4,4-6.5   c1.2-1.6,2.6-2.9,4-4.3c1-1,2.2-1.9,3.4-2.7c2.3-1.7,4.8-2.9,7.7-3.1c0.7,0,1.3-0.4,2-0.4c2.1-0.1,4.1,0,6.2-0.1   c2.4-0.2,4.5,0.6,6.7,1.3c0.3,0.1,0.6,0.1,0.8,0.3c1.7,1.5,4.1,2.1,5.5,4.1c0.6,0.8,1.5,1.5,2.4,2c2.5,1.5,4.1,3.9,6.1,5.9   c0.1,0.1,0.2,0.3,0.4,0.4c1.7,2.6,2.4,3.2,2.9,5.3c0.7,2.7,1.6,5.4,2.4,8.2c0.3,1,0.4,2.1,0.3,3.1c-0.3,3-0.7,6-1.1,9   C157,82,156.4,85.1,156.2,86.7z M153.5,84.5c0.9-2.9,2-5.9,1.6-9c-0.4-3-0.6-6.1-1-9.2c-0.2-1.9-1.6-3.7-2-5.5   c-0.2-0.9-1.7-1.9-2.3-2.6c-1.6-1.9-3.4-3.7-5.1-5.5c-0.6-0.6-1.2-1.1-1.8-1.6c-2.5-2-4.7-4.4-8-5.2c-0.3-0.1-0.5-0.2-0.8-0.4   c-0.5-0.3-1-0.5-1.6-0.3c-0.4,0.1-0.7,0-1.1,0c-0.6,0-1.3-0.2-1.9,0c-1.6,0.6-4.7,0.4-6.3,0.5c-2.4,0.1-5.6,1.7-5.7,1.8   c-1.3,1.1-2.6,2.3-3.9,3.3c-1,0.8-2,2.7-3,3.5c-1.9,1.5-7.2,8.9-7.4,9.7c0,0.2-0.5,0.5-0.7,0.5c-0.2,0-0.4-0.3-0.5-0.6   c-0.2-0.3-2.9-4-3.2-4.3c-1.2-1.2-2.4-2.4-3.6-3.7c-0.3-0.3-0.5-0.6-0.8-0.8c-1.5-1-3-2-4.5-3.1c-2.4-1.7-5-3-7.8-3.8   c-0.5-0.1-7.1-3.8-7.7-3.8c-1,0-2,0-3,0c-1,0-2-0.2-3,0C66.7,45,65,45.5,63.3,46c-1.5,0.5-3,1.1-4.4,1.7c-0.2,0.1-0.5,0.4-0.6,0.6   c-0.6,1.1-1.8,1.6-2.8,2.1c-0.8,0.4-1.6,0.9-2.1,1.6c-1.5,1.8-3,3.7-4.3,5.7c-0.7,1.1-1.4,2.3-1.7,3.6c-0.5,2-0.7,4.1-1,6.1   c0,0.3-0.1,0.6-0.1,0.9c0.1,3,0.1,5.9,0.2,8.9c0.1,1.8,0.3,3.6,0.5,5.4c0.2,1.5,0.6,2.9,1,4.3c0.4,1.3,0.6,2.7,1.4,3.7   c1.4,1.8,6.2,11.3,8.4,13.6c1.6,1.7,2.9,3.7,4.4,5.5c0.9,1.2,2,2.2,2.9,3.4c1.2,1.6,2.3,3.2,3.5,4.8c1.2,1.6,2.5,3.2,3.7,4.8   c0.3,0.4,0.5,0.9,0.9,1.3c1.9,1.9,3.7,3.9,4.5,6.6c0.1,0.3,0.3,0.6,0.5,0.9c2.1,3.9,5.3,7,7.9,10.4c1.7,2.2,3.3,4.6,4.8,7   c0.8,1.2,1.4,2.6,2.3,3.8c1.9,2.5,3.9,5,5.8,7.6c0.5,0.6,1.4,0.9,2.1,1.4c0.4-0.5,0.8-1.1,1.1-1.6c0.2-0.2,0.2-0.5,0.3-0.8   c0.7-1.7,3-3.6,4.3-5c0.1-0.2,0.1-0.5,0.2-0.7c0.2-0.4,0.5-0.8,0.7-1.2c0.8-1,1.6-2,2.3-3.1c2.1-2.9,4.2-5.9,6.3-8.8   c1.4-1.8,2.9-3.5,4.3-5.3c1.6-2.1,3-4.4,4.6-6.5c2.3-2.9,4.8-5.8,7.1-8.7c1.9-2.3,3.7-4.8,5.6-7.1c3.5-4.4,7-8.9,10.4-13.4   c2.1-2.8,3.3-6,4.6-9.2C153.6,88.5,152.9,86.5,153.5,84.5z"></path>
	<path style="fill:#162B54;" d="M71.3,112.1c-2-0.5-3.6-1.5-5.3-2.3c-0.1,0-0.2-0.1-0.2-0.2c-0.1-0.1-0.2-0.2-0.3-0.3   c0.2,0,0.3,0,0.5,0.1c0.7,0.2,1.3,0.4,2,0.6c0.6,0.2,1.1,0.2,1.4-0.1c0.1-0.1,0.4-0.1,0.7,0c0.9,0.3,1.8,0.5,2.7,0.8   c0.6,0.2,1.2,0.4,1.8,0.6c0.5,0.2,1,0.4,1.4,0.6c0.5,0.3,0.9,0.6,0.6,0.9c-0.3,0.3-0.6,0.5-1.4,0.2   C73.9,112.8,72.6,112.5,71.3,112.1z"></path>
	<path style="fill:#162B54;" d="M53.6,76c-0.8-0.3-1.5-0.6-2.3-0.9c-1-0.4-1.7-1-2.2-1.9C49,73,49,72.9,48.9,72.7   c0.2,0,0.4-0.1,0.5-0.1c1,0.2,2.1,0.5,3.1,0.8c0.3,0.1,0.7,0.2,0.9,0.4c1.1,0.9,2.2,1.7,3.5,2.2c0.2,0.1,0.3,0.4,0.4,0.7   c-0.2,0.1-0.5,0.2-0.7,0.2C55.7,76.6,54.6,76.3,53.6,76C53.6,76,53.6,76,53.6,76z"></path>
	<path style="fill:#162B54;" d="M55.7,89.5c-1.1-0.5-2.4-1.1-3.7-1.7c-0.2-0.1-0.4-0.2-0.6-0.4c-0.2-0.2-0.3-0.5-0.4-0.7   c0.3-0.1,0.7-0.3,0.9-0.2c1.5,0.6,3.1,0.5,4.5,1.4c0.6,0.4,1.4,0.6,2.1,1c0.3,0.2,0.8,0.6,0.8,0.8c-0.1,0.6-0.7,0.5-1.2,0.4   C57.2,89.9,56.6,89.7,55.7,89.5z"></path>
	<path style="fill:#162B54;" d="M53.7,68.9c-1.5-1-3-1.9-4.4-2.9c-0.2-0.1-0.3-0.4-0.4-0.7c0.3-0.1,0.6-0.2,0.9-0.1   c1.6,0.7,3.1,1.4,4.7,2.1c0.6,0.3,1.2,0.5,1.9,0.6c0.4,0.1,0.8,0.2,0.8,0.6c0,0.6-0.4,0.8-0.9,0.7c-0.8-0.1-1.6-0.3-2.4-0.5   C53.7,68.8,53.7,68.9,53.7,68.9z"></path>
	<path style="fill:#162B54;" d="M64.4,104c-1.7-0.5-3.5-1.1-4.8-2.4c-0.3-0.3-0.5-0.5-0.7-0.9c-0.1-0.1-0.1-0.3-0.1-0.5   c0.2,0.1,0.4,0.1,0.5,0.2c0.7,0.9,1.7,1.2,2.7,1.4c1.9,0.5,3.8,1,5.7,1.5c0.4,0.1,0.4,0.3,0.2,0.6c-0.5,0.5-1.1,0.8-1.8,0.6   C65.5,104.3,65,104.2,64.4,104z"></path>
	<path style="fill:#162B54;" d="M54.2,83.5c-1.6-0.4-2.7-1.4-3.8-2.5c-0.1-0.2-0.1-0.5-0.2-0.7c0.3,0,0.5,0,0.8,0.1   c1.5,0.8,3,1.7,4.7,2c0.3,0.1,0.6,0.1,0.8,0.3c0.3,0.3,0.4,0.7,0.6,1.1c-0.3,0.1-0.6,0.2-0.9,0.2C55.5,83.8,54.9,83.6,54.2,83.5z"></path>
	<path style="fill:#162B54;" d="M71.7,116c0.4,0.1,0.6,0.1,0.7,0.2c2.8,1.7,6,2.1,9.1,2.9c0.2,0.1,0.4,0.2,0.7,0.3   c-0.2,0.2-0.4,0.3-0.6,0.5c-0.4,0.6-0.8,0.5-1.4,0.4c-2.9-0.6-5.4-2.3-8-3.6C72.1,116.5,72,116.4,71.7,116z"></path>
	<path style="fill:#162B54;" d="M95.8,145.3c0.9,0.5,1.7,0.9,2.5,1.4c0.2,0.1,0.4,0.6,0.3,0.8c-0.1,0.2-0.5,0.3-0.8,0.4   c-0.2,0-0.5-0.1-0.7-0.2c-1.5-0.7-3-1.4-4.5-2.1c-0.1-0.1-0.2-0.3-0.3-0.4c0.1,0,0.3,0,0.4,0C93.8,145.2,94.8,145.2,95.8,145.3z"></path>
	<path style="fill:#162B54;" d="M57.9,55.3c-0.4-0.2-1-0.5-1.5-0.8c-0.1-0.1-0.2-0.4-0.1-0.6c0-0.1,0.3-0.2,0.5-0.2   c1.3,0.2,2.6,0.4,3.9,0.8c0.3,0.1,0.7,0.6,0.7,0.9c0,0.5-0.6,0.6-1,0.5C59.6,55.7,58.8,55.5,57.9,55.3z"></path>
	<path style="fill:#162B54;" d="M54.8,59.1c0.9,0.4,1.7,0.8,2.6,1.2c0.1,0.1,0.2,0.3,0.3,0.5c-0.2,0.1-0.3,0.2-0.5,0.2   c-0.3,0.1-0.7,0.2-1,0.1c-1.2-0.5-2.5-1-3.7-1.6c-0.2-0.1-0.2-0.5-0.3-0.8c0.3,0,0.6-0.1,0.8,0c0.6,0.2,1.2,0.4,1.7,0.7   C54.8,59.2,54.8,59.2,54.8,59.1z"></path>
	<path style="fill:#162B54;" d="M82,125.9c-1.4-0.7-3-1.6-4.6-2.5c-0.2-0.1-0.2-0.4-0.3-0.5c0.2,0,0.5-0.1,0.7,0   c1.2,0.6,2.3,1.2,3.5,1.7c0.7,0.3,1.5,0.3,2.2,0.5c0.3,0.1,0.5,0.3,0.7,0.5c-0.3,0.2-0.5,0.6-0.8,0.7C83,126.2,82.6,126,82,125.9z"></path>
	<path style="fill:#162B54;" d="M91.1,141.9c-1.2-0.5-2.3-1-3.3-1.4c-0.1-0.1-0.3-0.1-0.4-0.2c-0.1-0.2-0.2-0.4-0.2-0.6   c0.2,0,0.5-0.2,0.6-0.1c0.6,0.3,1.2,0.6,1.8,0.9c0.9,0.5,1.9,0.7,2.9,0.6c0.3,0,0.8,0.2,0.8,0.3c0,0.5-0.2,1-0.8,0.9   C91.9,142.1,91.4,142,91.1,141.9z"></path>
	<path style="fill:#162B54;" d="M63.9,52c-0.5-0.2-1-0.3-1.5-0.5c-0.2-0.1-0.3-0.3-0.4-0.5c0.2-0.1,0.3-0.3,0.5-0.3   c1.1,0.1,2.2,0.3,3.3,0.4c0.5,0.1,0.9,0.4,0.7,1c-0.2,0.7-0.7,0.5-1.2,0.4C64.8,52.4,64.4,52.2,63.9,52C63.9,52,63.9,52,63.9,52z"></path>
	<path style="fill:#162B54;" d="M80.2,127.8c1.6,0.7,3.2,1.5,4.8,2.1c0.8,0.3,1.7,0.4,2.5,0.6c0.2,0.1,0.4,0.2,0.7,0.3   c-0.3,0.2-0.5,0.5-0.8,0.7c-0.2,0.1-0.5-0.1-0.7-0.2c-1.5-0.7-2.9-1.4-4.4-2.1c-0.8-0.4-1.5-0.8-2.2-1.2   C80.1,128,80.2,127.9,80.2,127.8z"></path>
</g>
</svg></div>
															
															<script type="text/template" id="TrainingHeart_template">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg" data-bf-svg data-url="/images/shoefinder-new/heart.svg" data-bf-stepped-animation  data-active-screens="Training"></div>
														</script>
														</div>
														<div class="bf-media-button__text" id="training_0Label">Health</div>
													</div>
												</div>
											</div>
							
										
											
												<div class="bf-grid__col-1-2 bf-grid__col-1-3-tablet-up bf-training-screen__transition-group-3">
													


	  <!--  option [object Object] -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="training" value="1" id="training_1" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="training_1Label" class="bf-media-button bf-media-button--aspect bf-media-button--aspect-square" data-bf-input-button="" data-input-id="training_1" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Training" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="3" data-gtm-screen-title="Training" data-gtm-question-category="Demographics" data-gtm-user-response="5k" data-gtm-question="What are you training for?" tabindex="1">
											
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg bf-media--loaded" data-bf-svg="" data-url="/images/shoefinder-new/5k.svg" data-bf-stepped-animation="" data-active-screens="Training"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="image">
<title>5K</title>
<g id="Fills1">
	<path style="fill:#ABC0DE;" d="M86.4,62c-0.6,0.5-1.5,0.4-2.3,0.4c-3.2,0.1-6.3,0.2-9.5,0.3c-1.8,0-3.7-0.1-5.5-0.2   c-0.9,0-1.7-1-2.6-1.1c-2-0.1,0.4,0.5-1.6,0.3c-1.9-0.2-3.9,0-5.8,0c-3.3,0-6.3,1.8-11.5,1.7c-1.4,0-0.6,0-2,0   c-0.3,0-0.5,0.1-0.8,0.2c0.4,2.3,0.3,4.5,0.3,6.8c0.1,4.3,1.1,7.8,1.2,12.1c0,1.4,1.2,0.6,1.3,2.2c2.3-1,0.2-0.4,2.5-0.8   c2.1-0.3,4.3-0.6,6.4-0.7c2.7-0.2,5.3-0.3,8-0.4c1.3-0.1,2.5,0,3.8,0.1c0.7,0,1.3,0,2,0.1c2.4,0.1,5.7,0.8,8.1,1.3   c1.5,0.3,3.1,0.6,4.6,0.9c2.2,0.5,4.3,1.3,6.2,2.4c0.4,0.2,0.9,0.5,1,0.9c0.2,0.6,0.6,0.9,1.1,1.3c0.6,0.5,1.1,1,1.6,1.6   c2.3,2.8,3.4,6.8,4.7,10.2c1.6,4.1,2.9,8.2,3.8,12.5c0.5,2.2,0.6,4.5,0.6,6.8c-0.1,2.1-0.1,4.2-0.3,6.3c-0.3,2.7-0.6,5.4-1.4,8.1   c-0.1,0.4-0.2,0.8-0.3,1.2c-0.2,1.3-0.7,2.4-1.3,3.5c-2.1,3.4-4.8,6.3-7.9,8.7c-1.7,1.3-3.3,2.7-5.1,4c-1.4,1-3,1.9-4.5,2.7   c-2,1-4,1.8-6,2.8c-0.5,0.2-1,0.4-1.4,0.7c-1,0.6-1.1-0.3-2.2,0c-1.1,0.3-2.2,0.7-3.4,0.9c-2,0.2-3.9,0.3-5.9,0.5   c-2.6,0.2-5.2-0.3-7.6-0.9c-3.7-0.9-5.8-1.5-9.4-3.2c-3.6-1.7-4.4-0.6-7.7-2.8c-0.9-2.5-1.1-0.8-6.8-4c-1.4-1.4-3.4-2.5-4.6-4.1   c-0.8-1-1.3-2.3-1.9-3.4c-0.3-0.5-0.1-1,0.2-1.4c1.6-2.4,2.4-5.9,4.7-7.8c0.5-0.4,1-1,1.4-1.4c0.9-0.9,1.5-0.7,2,0.4   c0.2,0.5,2.3-1.8,2.7-1.5c3.3,2.5,3.4,3.4,4.7,5c1.7,1,3.3,2,4.9,3.1c1.6,1.2,4.4,1,6.3,1.7c3.3,1.2,9,4.1,12.5,4.1   c4.4,0,5.5,0.4,9.5-1.4c2.1-0.9,4.1-2,5.7-3.6c1.1-1.1,2-2.4,2.9-3.7c0.8-1.1,1.5-2.3,2.2-3.4c0.1-0.1,0.2-0.2,0.2-0.3   c0.5-1.8,1.6-3.4,1.7-5.4c0.1-1.8,0.2-3.7,0-5.5c-0.2-2-0.3-3.9-0.6-5.9c-1.5-9.9,2.3-5.5-4.6-11.1c-2.3-1.8-5-3-8-3.5   c-1.8-0.3-3.6-0.6-5.5-0.9c-3-0.4-7.1,0.3-10.1,0.5c-3.5,0.2-6.9,0.6-10.3,1.4c-2.3,0.6-4.6,1.8-6.9,2.4c-1.7,0.5-3.5,1-5.2,1.4   c-2,0.4-2.8-0.1-4.6-1c-0.2-0.1-0.3-0.2-0.4-0.4c-0.6-1.4-1.3-1.7-1.3-3.3c0-3.5-0.1-8.4-0.1-11.9c0-3.9,0-7.8,0-11.7   c0-2.8,0.2-5.6,0.2-8.3c0-2.7-0.2-5.5-0.2-8.2c0.1-3.8,0.2-7.6,0.4-11.4c0-0.6,0.2-0.9,0.8-1.1c0.9-0.3,0.6-0.5,1.5-0.8   c1.7-0.5,3.5-0.3,5.2-0.3c1.4,0,2.7,0,4.1,0c3.6-0.1,7.2-0.2,10.8-0.4c2.2-0.1,4.5-0.2,6.7-0.1c4.6,0,9.2-0.1,13.8,0   c3.4,0.1,6.9,0.1,10.3,0.1c2.5,0,5,0.1,7.6,0.1c0.9,0,4.8-0.8,5.2,0.1c0,0.1-1,1.3-0.9,1.4c-0.7-0.6,0.6,7.1,0.3,4.1   c0.4,3.7-0.6,7.3-0.5,11c0,0.5-4.4-0.6-4.6-0.1c-0.1,0.4-0.4,0.6-0.9,0.4C87.7,62.6,87.1,62.4,86.4,62z"></path>
	<path style="fill:#ABC0DE;" d="M175.2,69.1c-0.1-0.3-0.4-0.4-0.6-0.7c-2.3-2.1-5.1-3.5-7.6-5.2c-0.7-0.5-2.1-0.3-2.7,0.3   c-0.7,0.9-3.2,3.2-3.9,4.2c-2.1,3.2-4.2,6.5-6.3,9.7c-0.8,1.2-1.6,2.4-2.3,3.7c-0.6,1-1.1,2.1-1.7,3.1c-0.5,1-1.2,1.9-1.7,2.8   c-1.8,2.8-3.5,5.6-5.3,8.3c-1,1.6-2.3,3-3.4,4.5c-0.5,0.6-0.8,0.1-0.8,1.1c-1-0.8-2-0.8-3-0.7c-0.7,0.1-1.4,0.1-2.1,0.1   c-1.7,0-2.5,0-4.3,0c0-0.1-0.1-0.2-0.1-0.3c-0.1-2.9-0.1-4.8-0.2-7.7c-0.1-3.4-0.1-6.8-0.2-10.2c0-0.7,0.1-1.4,0.1-2.1   c-0.2-3.7-0.9-7.4-1.2-11.2c-0.3-3-0.5-5.9-1-8.9c0-0.2,0-0.5,0.1-0.7c0.4-1.1,0.5-1.1-0.5-1.7c-0.8-0.5-1.7-1-2.7-0.9   c-2.9,0.2-5.8,0.3-8.8,0.5c-0.6,0-0.2,0.4-0.8,0.8c-0.1,0.1,0,0.7,0.1,1.1c0,0,0,0.1,0,0.1c-0.4,2.1-0.1,4.3,0.1,6.4   c0.3,2.4-0.1,4.8-0.1,7.2c0.1,3-0.1,6-0.1,8.9c0,1.4,0.1,2.7,0,4.1c-0.1,2.9-0.3,5.8-0.5,8.7c-0.1,1.8,0,3.6-0.1,5.4   c0,1.3-0.1,2.6-0.2,3.9c-0.1,5-0.2,10-0.4,15c-0.1,2.5-0.3,4.9-0.3,7.4c-0.1,4.2-0.2,8.3-0.3,12.5c-0.1,5.1,0.1,10.2,0.3,15.3   c0,0.5,0.1,1,0.2,1.4c0.2,0.9,1.8,1.5,2.7,1.6c0.7,0.1,1.4,0,2.1,0c1.4,0,2.9-0.1,4.3-0.1c0.9,0,1.8,0.3,2.7,0.2   c1.6-0.1,2.1,0.9,2.7-1.2c0-0.1,0.1-0.2,0.2-0.2c0.7-0.5,0.7-1.3,0.6-2c0-0.7-0.1-1.5-0.1-2.2c0-2.5,1-5,1-7.5c0-4.5,0-8.9,0-13.4   c0-1.5,0-3-0.1-4.5c0-1-0.1-2-0.1-3c0-1.4-0.1-2.9-0.1-4.3c0-1.3,0-2.7,0.1-4.1c0.3,0-0.5-0.1-0.3-0.1c2.2,0.3,4.4,0.1,6.6,0   c0.7,0,1.3-0.1,2-0.1c0.7,0,1.4,0,1.7,0.9c0.3,1,1.7,0.9,2.1,1.8c1.7,3.8,3.5,7.6,4.8,11.5c0.8,2.4,1.8,4.8,2.6,7.2   c0.6,1.6,1.1,3.3,1.7,4.8c1.6,3.9,3.2,7.7,4.8,11.5c0.2,0.4,1.6,0.8,1.6,1.2c0.1,1.1,0.4,1.4,1.6,1.8c0,0-0.9,0.9-0.9,0.9   c0.1,0.8,0.8,1.6,1.4,2.2c0.9,0.1,0.4-0.3,1.1-0.8c2.9-2,6.2-3.5,9.4-5c1-0.5,1.2-0.8,0.8-1.8c0.1,0.3-0.1-0.3-0.3-0.7   c-1-2.1-1-5.2-2-7.3c-0.8-1.6-1.5-3.3-2.2-4.9c-1.1-2.3-2.2-4.7-3.3-7c-0.8-1.7-1.5-3.3-2.3-5c-0.6-1.3-1.1-2.6-1.7-3.8   c-0.3-0.6-0.5-1.3-0.8-2c-1.2-2.8-2.3-5.6-3.5-8.4c-0.5-1.2-0.8-2.6-1.8-3.6c-0.8-0.8-1.7-0.7-1.2-1.6c0.1-0.3,0.3-0.5,0.5-0.8   c1.2-1.8,2.4-3.6,3.6-5.3c1.9-2.6,3.8-5.2,5.7-7.9c2.2-3.1,4.3-6.3,6.4-9.5c1.8-2.8,3.5-5.7,5.2-8.6c0.1-0.1,0.2-0.3,0.2-0.5   c0.1-0.6,2.2-2.4,2.7-2.7C175.7,70.3,175.7,69.9,175.2,69.1z"></path>
</g>
<g id="Fills2">
	<path style="fill:#ABC0DE;" d="M91,61.2c-0.6,0.5-1.5,0.4-2.3,0.4c-3.2,0.1-6.3,0.2-9.5,0.3c-1.8,0-3.7-0.1-5.5-0.2   c-0.9,0-1.7,0-2.6,0c-2-0.1-4-0.2-5.9-0.3c-1.9-0.2-3.8-0.2-5.7-0.2c-3.9,0-7.7,0-11.6-0.1c-1.4,0-2.8,0-4.2,0   c-0.3,0-0.5,0.1-0.8,0.2c0.4,2.3,0.3,4.5,0.3,6.8c0.1,4,0,8.1,0.1,12.1c0,1.4,0.2,1.7,0.3,3.2c2.4-1.1,4.5-0.3,6.9-0.6   c2.1-0.3,4.3-0.6,6.4-0.7c2.7-0.2,5.3-0.3,8-0.4c1.3-0.1,2.5,0,3.8,0.1c0.7,0,1.3,0,2,0.1c2.4,0.1,4.7,0.7,7.1,1.1   c1.5,0.3,3.1,0.6,4.6,0.9c2.2,0.5,4.2,1.4,6.1,2.4c0.4,0.2,0.9,0.5,1,0.9c0.2,0.6,0.6,0.9,1.1,1.3c0.6,0.5,1.1,1,1.6,1.6   c2.3,2.8,4.5,5.8,5.8,9.2c1.6,4.1,2.9,8.2,3.8,12.5c0.5,2.2,0.6,4.5,0.6,6.8c-0.1,2.1-0.1,4.2-0.3,6.3c-0.3,2.7-0.6,5.4-1.4,8.1   c-0.1,0.4-0.2,0.8-0.3,1.2c-0.2,1.3-0.7,2.4-1.3,3.5c-2.1,3.4-4.8,6.3-7.9,8.7c-1.7,1.3-3.3,2.7-5.1,4c-1.4,1-3,1.9-4.5,2.7   c-2,1-4,1.8-6,2.8c-0.5,0.2-1,0.4-1.4,0.7c-1,0.6-2.2,0.7-3.3,1c-1.1,0.3-2.2,0.7-3.4,0.9c-2,0.2-3.9,0.3-5.9,0.5   c-2.6,0.2-5.2-0.3-7.6-0.9c-3.7-0.9-7.5-1.9-11-3.6c-3.6-1.7-7-3.7-10.3-5.9c-1-0.7-2.2,0.6-3-0.3c-1.4-1.4-2.8-2.8-4.1-4.3   c-0.8-1-1.3-2.3-1.9-3.4c-0.3-0.5-0.1-1,0.2-1.4c1.6-2.4,3.4-7,5.7-8.9c0.5-0.4,1-1,1.4-1.4c0.9-0.9,1.5-0.7,2,0.4   c0.2,0.5,0.4,0.9,0.8,1.2c2.1,1.6,4.3,3.2,6.7,4.6c1.7,1,3.3,2,4.9,3.1c1.6,1.2,3.4,2,5.2,2.7c3.3,1.2,6.8,1.8,10.3,1.8   c4.4,0,8.7-0.6,12.8-2.4c2.1-0.9,4.1-2,5.7-3.6c1.1-1.1,2-2.4,2.9-3.7c0.8-1.1,1.5-2.3,2.2-3.4c0.1-0.1,0.2-0.2,0.2-0.3   c0.5-1.8-0.4-3.1-0.3-5c0.1-1.8,0.2-3.7,0-5.5c-0.2-2,0.8-3.9,0.5-5.9c-0.6-4.1-1.6-7.9-4.8-10.5c-2.3-1.8-5-3-8-3.5   c-1.8-0.3-3.6-0.6-5.5-0.9c-3-0.4-6-0.7-9-0.5c-3.5,0.2-6.9,0.6-10.3,1.4c-2.3,0.6-4.6,2.8-6.9,3.5c-1.7,0.5-3.5,1-5.2,1.4   c-2,0.4-3.9-0.1-5.7-1c-0.2-0.1-0.3-0.2-0.4-0.4c-0.6-1.4-1.3-2.7-1.3-4.3c0-3.5-0.1-8.4-0.1-11.9c0-3.9,0-7.8,0-11.7   c0-2.8,0.2-5.6,0.2-8.3c0-2.7-0.2-5.5-0.2-8.2c0.1-3.8,0.2-7.6,0.4-11.4c0-0.6,0.2-0.8,0.8-1c0.9-0.3,1.7-0.5,2.6-0.8   c1.7-0.5,3.5-0.3,5.2-0.3c1.4,0,2.7,0,4.1,0c3.6-0.1,7.2-0.2,10.8-0.4c2.2-0.1,4.5,0.8,6.7,0.8c4.6,0,9.2-0.1,13.8,0   c3.4,0.1,6.9,0.1,10.3,0.1c2.5,0,4,1.5,6.5,1.5c0.9,0,2.1-1.1,2.4-0.2c0,0.1,0.1,0.3,0.2,0.3c1.3,1.1,1.2,2.6,1.4,4.1   c0.4,3.7,1,6.3,1.2,9.9c0,0.5-0.1,1.1-0.2,1.6c-0.1,0.4-0.4,0.6-0.9,0.4C92.3,61.8,91.7,61.6,91,61.2z"></path>
	<path style="fill:#ABC0DE;" d="M175.9,68c-0.1-0.3-0.4-0.4-0.6-0.7c-2.3-2.1-5.1-3.5-7.6-5.2c-0.7-0.5-2.1-0.3-2.7,0.3   c-0.7,0.9-1.5,1.9-2.1,2.8c-2.1,3.2-4.2,6.5-6.3,9.7c-0.8,1.2-1.6,2.4-2.3,3.7c-0.6,1-1.1,2.1-1.7,3.1c-0.5,1-1.2,1.9-1.7,2.8   c-1.8,2.8-3.5,5.6-5.3,8.3c-1,1.6-2.3,3-3.4,4.5c-0.5,0.6-0.8,1.1-0.8,2.1c-1-0.8-2-0.8-3-0.7c-0.7,0.1-1.4,0.1-2.1,0.1   c-1.7,0-3.5,0-5.3,0c0-0.1-0.1-0.2-0.1-0.3c-0.1-2.9-0.1-5.8-0.2-8.7c-0.1-3.4-0.1-6.8-0.2-10.2c0-0.7,0.1-1.4,0.1-2.1   c-0.2-3.7,0.1-7.4-0.2-11.2c-0.3-3-0.5-5.9-1-8.9c0-0.2,0-0.5,0.1-0.7c0.4-1.1,0.5-0.1-0.5-0.7c-0.8-0.5-1.7-1-2.7-0.9   c-2.9,0.2-5.8,0.3-8.8,0.5c-0.6,0-1.2-0.6-1.8-0.2c-0.1,0.1,0,0.7,0.1,1.1c0,0,0,0.1,0,0.1c-0.4,2.1-0.1,4.3,0.1,6.4   c0.3,2.4-0.1,4.8-0.1,7.2c0.1,3-0.1,6-0.1,8.9c0,1.4,0.1,2.7,0,4.1c-0.1,2.9-0.3,5.8-0.5,8.7c-0.1,1.8,0,3.6-0.1,5.4   c0,1.3-0.1,2.6-0.2,3.9c-0.1,5-0.2,10-0.4,15c-0.1,2.5-0.3,4.9-0.3,7.4c-0.1,4.2-0.2,8.3-0.3,12.5c-0.1,5.1,0.1,10.2,0.3,15.3   c0,0.5,0,2.1,0.1,2.6c0.2,0.9,1.6,2.3,2.4,2.4c0.7,0.1,1.5-1.1,2.1-1.1c1.4,0,2.9-0.1,4.3-0.1c0.9,0,1.8,0.3,2.7,0.2   c1.6-0.1,3.4,0.1,3.9-2c0-0.1,0.1-0.2,0.2-0.2c0.7-0.5,0.7-1.3,0.6-2c0-0.7-0.1-1.5-0.1-2.2c0-2.5,0-5,0-7.5c0-4.5,0-8.9,0-13.4   c0-1.5,0-3-0.1-4.5c0-1-0.1-2-0.1-3c0-1.4-0.1-2.9-0.1-4.3c0-1.3,0-1.7,0.1-3.1c0.3,0,0.5-0.1,0.7-0.1c2.2,0.3,4.4,0.1,6.6,0   c0.7,0,1.3-0.1,2-0.1c0.7,0,1.4-1,1.7-0.1c0.3,1,0.7,1.9,1.1,2.8c1.7,3.8,3.5,7.6,4.8,11.5c0.8,2.4,1.8,4.8,2.6,7.2   c0.6,1.6,1.1,3.3,1.7,4.8c1.6,3.9,3.2,7.7,4.8,11.5c0.2,0.4,0.3,0.8,0.4,1.2c0.1,1.1-0.3,1.6,0.9,1.9c0,0,0.3,2.2,0.4,2.1   c0.1,0.8,1.2-0.8,1.8-0.2c0.9,0.1,1.7-0.3,2.4-0.8c2.9-2,6.2-3.5,9.4-5c1-0.5,1.2-0.8,0.8-1.8c-0.1-0.2-0.2-0.5-0.3-0.7   c-1-2.1-2-4.2-3-6.3c-0.8-1.6-1.5-3.3-2.2-4.9c-1.1-2.3-2.2-4.7-3.3-7c-0.8-1.7-1.5-3.3-2.3-5c-0.6-1.3-1.1-2.6-1.7-3.8   c-0.3-0.6-0.5-1.3-0.8-2c-1.2-2.8-2.3-5.6-3.5-8.4c-0.5-1.2-0.8-2.6-1.8-3.6c-0.8-0.8-0.7-1.7-0.2-2.6c0.1-0.3,0.3-0.5,0.5-0.8   c1.2-1.8,2.4-3.6,3.6-5.3c1.9-2.6,3.8-5.2,5.7-7.9c2.2-3.1,4.3-6.3,6.4-9.5c1.8-2.8,3.5-5.7,5.2-8.6c0.1-0.1,0.2-0.3,0.2-0.5   c0.1-0.6,0.5-1,1-1.3C176.3,69.3,176.3,68.9,175.9,68z"></path>
</g>
<g id="Fills3">
	<path style="fill:#ABC0DE;" d="M92.3,61.2c-0.6,0.5-1.5,0.4-2.3,0.4c-3.2,0.1-6.3,0.2-9.5,0.3c-1.8,0-3.7-0.1-5.5-0.2   c-0.9,0-1.7,0-2.6,0c-2-0.1-4-0.2-5.9-0.3c-1.9-0.2-3.8-0.2-5.7-0.2c-3.9,0-7.7,0-11.6-0.1c-1.4,0-2.8,0-4.2,0   c-0.3,0-0.5,0.1-0.8,0.2c0.4,2.3,0.3,4.5,0.3,6.8c0.1,4,0,8.1,0.1,12.1c0,1.4,0.2,1.7,0.3,3.2c2.3-1,4.5-0.3,6.9-0.6   c2.1-0.3,4.3-0.6,6.4-0.7c2.7-0.2,5.3-0.3,8-0.4c1.3-0.1,2.5,0,3.8,0.1c0.7,0,1.3,0,2,0.1c2.4,0.1,4.7,0.7,7.1,1.1   c1.5,0.3,3.1,0.6,4.6,0.9c2.2,0.5,4.2,1.4,6.1,2.4c0.4,0.2,0.9,0.5,1,0.9c0.2,0.6,0.6,0.9,1.1,1.3c0.6,0.5,1.1,1,1.6,1.6   c2.3,2.8,4.5,5.8,5.8,9.2c1.6,4.1,2.9,8.2,3.8,12.5c0.5,2.2,0.6,4.5,0.6,6.8c-0.1,2.1-0.1,4.2-0.3,6.3c-0.3,2.7-0.6,5.4-1.4,8.1   c-0.1,0.4-0.2,0.8-0.3,1.2c-0.2,1.3-0.7,2.4-1.3,3.5c-2.1,3.4-4.8,6.3-7.9,8.7c-1.7,1.3-3.3,2.7-5.1,4c-1.4,1-3,1.9-4.5,2.7   c-2,1-4,1.8-6,2.8c-0.5,0.2-1,0.4-1.4,0.7c-1,0.6-2.2,0.7-3.3,1c-1.1,0.3-2.2,0.7-3.4,0.9c-2,0.2-3.9,0.3-5.9,0.5   c-2.6,0.2-5.2-0.3-7.6-0.9c-3.7-0.9-7.5-1.9-11-3.6c-3.6-1.7-7.3-1.6-10.6-3.8c-1-0.7-1.9-1.5-2.8-2.4c-1.4-1.4-2.8-2.8-4.1-4.3   c-0.8-1-1.3-2.3-1.9-3.4c-0.3-0.5-0.1-1,0.2-1.4c3.5-5.1,6.5-9.4,5.7-8.9c0.5-0.4,1-1,1.4-1.4c0.9-0.9,1.5-0.7,2,0.4   c0.2,0.5,0.4,0.9,0.8,1.2c2.1,1.6,4.3,3.2,6.7,4.6c1.7,1,3.3,2,4.9,3.1c1.6,1.2,3.4,2,5.2,2.7c3.3,1.2,6.8,1.8,10.3,1.8   c4.4,0,8.7-0.6,12.8-2.4c2.1-0.9,4.1-2,5.7-3.6c1.1-1.1,2-2.4,2.9-3.7c0.8-1.1,0.4-2.3,1.1-3.4c0.1-0.1,0.2-0.2,0.2-0.3   c0.5-1.8,0.5-3.4,0.6-5.4c0.1-1.8,0.2-3.7,0-5.5c-0.2-2-0.3-3.9-0.6-5.9c-0.6-4.1-0.3-7.5-3.5-10.1c-2.3-1.8-5-3-8-3.5   c-1.8-0.3-3.6-0.6-5.5-0.9c-3-0.4-6-0.7-9-0.5c-3.5,0.2-6.9,0.6-10.3,1.4c-2.3,0.6-4.6,2.8-6.9,3.5c-1.7,0.5-3.5,1-5.2,1.4   c-2,0.4-3.9-0.1-5.7-1c-0.2-0.1-0.3-0.2-0.4-0.4c-0.6-1.4-1.3-2.7-1.3-4.3c0-3.5-0.1-8.4-0.1-11.9c0-3.9,0-7.8,0-11.7   c0-2.8,0.2-5.6,0.2-8.3c0-2.7-0.2-5.5-0.2-8.2c0.1-3.8,0.2-7.6,0.4-11.4c0-0.6,0.2-0.8,0.8-1c0.9-0.3,1.7-0.5,2.6-0.8   c1.7-0.5,3.5-0.3,5.2-0.3c1.4,0,2.7,0,4.1,0c3.6-0.1,7.2-0.2,10.8-0.4c2.2-0.1,4.5-0.2,6.7-0.1c4.6,0,9.2,0.8,13.8,0.9   c3.4,0.1,6.9,0.1,10.3,0.1c2.5,0,4,0.1,6.5,0.1c0.9,0,1.6,0.3,1.9,1.1c0,0.1,0.1,0.3,0.2,0.3c1.3,1.1,0.7,2.6,0.8,4.1   c0.4,3.7,1,6.3,1.2,9.9c0,0.5-0.1,1.1-0.2,1.6c-0.1,0.4-0.4,0.6-0.9,0.4C92.5,61.8,93,61.6,92.3,61.2z"></path>
	<path style="fill:#ABC0DE;" d="M175.2,69.6c-0.1-0.3-0.4-0.4-0.6-0.7c-2.3-2.1-5.1-3.5-7.6-5.2c-0.7-0.5-2.1-0.3-2.7,0.3   c-0.7,0.9-1.5,1.9-2.1,2.8c-2.1,3.2-4.2,6.5-6.3,9.7c-0.8,1.2-1.6,2.4-2.3,3.7c-0.6,1-1.1,2.1-1.7,3.1c-0.5,1-1.2,1.9-1.7,2.8   c-1.8,2.8-3.5,5.6-5.3,8.3c-1,1.6-2.3,3-3.4,4.5c-0.5,0.6-0.8,0.1-0.8,1.1c-1-0.8-2,0.2-3,0.3c-0.7,0.1-1.4,0.1-2.1,0.1   c-1.7,0-3.5,0-5.3,0c0-0.1-0.1-0.2-0.1-0.3c-0.1-2.9-0.1-5.8-0.2-8.7c-0.1-3.4-0.1-6.8-0.2-10.2c0-0.7,0.1-1.4,0.1-2.1   c-0.2-3.7,0.1-7.4-0.2-11.2c-0.3-3-0.5-5.9-1-8.9c0-0.2,0-0.5,0.1-0.7c0.4-1.1,0.5-1.1-0.5-1.7c-0.8-0.5-1.7-1-2.7-0.9   c-2.9,0.2-5.8,0.3-8.8,0.5c-0.6,0-1.2,0.4-1.8,0.8c-0.1,0.1,0,0.7,0.1,1.1c0,0,0,0.1,0,0.1c-0.4,2.1-0.1,4.3,0.1,6.4   c0.3,2.4-0.1,4.8-0.1,7.2c0.1,3-0.1,6-0.1,8.9c0,1.4,0.1,2.7,0,4.1c-0.1,2.9-0.3,5.8-0.5,8.7c-0.1,1.8,0,3.6-0.1,5.4   c0,1.3-0.1,2.6-0.2,3.9c-0.1,5-0.2,10-0.4,15c-0.1,2.5-0.3,4.9-0.3,7.4c-0.1,4.2-0.2,8.3-0.3,12.5c-0.1,5.1,0.1,10.2,0.3,15.3   c0,0.5,0.1,1,0.2,1.4c0.2,0.9,1.6,2.3,2.4,2.4c0.7,0.1,1.4,0,2.1,0c1.4,0,2.9-0.1,4.3-0.1c0.9,0,1.8,0.3,2.7,0.2   c1.6-0.1,3.4,0.1,3.9-2c0-0.1,0.1-0.2,0.2-0.2c0.7-0.5,0.7-1.3,0.6-2c0-0.7-0.1-1.5-0.1-2.2c0-2.5,0-5,0-7.5c0-4.5,0-8.9,0-13.4   c0-1.5,0-3-0.1-4.5c0-1-0.1-2-0.1-3c0-1.4-0.1-2.9-0.1-4.3c0-1.3,0-2.7,0.1-4.1c0.3,0,0.5-0.1,0.7-0.1c2.2,0.3,4.4,0.1,6.6,0   c0.7,0,1.3-0.1,2-0.1c0.7,0,1.4,0,1.7,0.9c0.3,1,0.7,1.9,1.1,2.8c1.7,3.8,3.5,7.6,4.8,11.5c0.8,2.4,1.8,4.8,2.6,7.2   c0.6,1.6,1.1,3.3,1.7,4.8c1.6,3.9,3.2,7.7,4.8,11.5c0.2,0.4,0.3,0.8,0.4,1.2c0,0.2,3.8,2.4,1.6,1.8c0,0,0.1-0.1,0.1-0.1   c0.1,0.8,0.8,1.6,1.4,2.2c0.9,0.1,1.7-0.3,2.4-0.8c2.9-2,6.2-3.5,9.4-5c1-0.5,1.2-0.8,0.8-1.8c-0.1-0.2-0.2-0.5-0.3-0.7   c-1-2.1-2-4.2-3-6.3c-0.8-1.6-1.5-3.3-2.2-4.9c-1.1-2.3-2.2-4.7-3.3-7c-0.8-1.7-1.5-3.3-2.3-5c-0.6-1.3-1.1-2.6-1.7-3.8   c-0.3-0.6-0.5-1.3-0.8-2c-1.2-2.8-2.3-5.6-3.5-8.4c-0.5-1.2-0.8-2.6-1.8-3.6c-0.8-0.8-0.7-1.7-0.2-2.6c0.1-0.3,0.3-0.5,0.5-0.8   c1.2-1.8,2.4-3.6,3.6-5.3c1.9-2.6,3.8-5.2,5.7-7.9c2.2-3.1,4.3-6.3,6.4-9.5c1.8-2.8,3.5-5.7,5.2-8.6c0.1-0.1,0.2-0.3,0.2-0.5   c0.1-0.6,0.5-1,1-1.3C175.6,70.9,175.6,70.5,175.2,69.6z"></path>
</g>
<g id="Lines">
	<path style="fill:#162B54;" d="M91.8,61.2c-0.6,0.5-1.5,0.4-2.4,0.4c-3.2,0.1-6.4,0.2-9.7,0.3c-1.9,0-3.8-0.1-5.6-0.2   c-0.9,0-1.7,0-2.6,0c-2-0.1-4-0.2-6.1-0.4c-1.9-0.2-3.8-0.3-5.8-0.2c-4,0-7.9,0-11.9-0.1c-1.4,0-2.8,0-4.3,0   c-0.3,0-0.5,0.1-0.8,0.2c0.4,2.4,0.3,4.7,0.3,7c0.1,4.2,0,8.3,0.1,12.5c0,1.5,0.2,2.9,0.3,4.5c2.3-1,4.6-1.5,7-1.9   c2.2-0.3,4.4-0.6,6.6-0.8c2.7-0.2,5.4-0.3,8.1-0.5c1.3-0.1,2.6,0,3.9,0.1c0.7,0,1.4,0,2.1,0.1c2.5,0.1,4.8,0.7,7.2,1.1   c1.6,0.3,3.2,0.6,4.7,1c2.2,0.5,4.3,1.4,6.3,2.5c0.4,0.2,0.9,0.5,1,0.9c0.2,0.6,0.6,1,1.1,1.4c0.6,0.5,1.1,1.1,1.6,1.7   c2.4,2.9,4.6,5.9,5.9,9.4c1.6,4.2,3,8.4,3.9,12.8c0.5,2.3,0.6,4.7,0.6,7c-0.1,2.2-0.1,4.3-0.3,6.5c-0.3,2.8-0.6,5.6-1.4,8.3   c-0.1,0.4-0.2,0.8-0.3,1.2c-0.2,1.3-0.7,2.5-1.4,3.6c-2.1,3.5-4.9,6.4-8.1,9c-1.7,1.4-3.4,2.8-5.2,4.1c-1.5,1-3,1.9-4.6,2.7   c-2,1-4.1,1.9-6.1,2.8c-0.5,0.2-1,0.5-1.5,0.8c-1,0.7-2.2,0.8-3.4,1.1c-1.1,0.3-2.3,0.7-3.5,0.9c-2,0.3-4,0.3-6,0.5   c-2.7,0.2-5.3-0.3-7.8-0.9c-3.8-1-7.6-2-11.3-3.7c-3.7-1.7-7.1-3.8-10.5-6.1c-1-0.7-2-1.5-2.8-2.4c-1.4-1.4-2.9-2.9-4.1-4.4   c-0.8-1-1.3-2.3-2-3.5c-0.3-0.5-0.1-1,0.2-1.4c1.7-2.5,3.2-5,5.6-7c0.5-0.4,1-1,1.5-1.5c0.9-0.9,1.6-0.8,2,0.4   c0.2,0.5,0.4,0.9,0.9,1.2c2.2,1.7,4.4,3.3,6.8,4.7c1.7,1,3.4,2.1,5,3.2c1.7,1.2,3.4,2.1,5.4,2.8c3.4,1.2,6.9,1.9,10.5,1.9   c4.5,0,8.9-0.6,13.1-2.5c2.1-0.9,4.2-2,5.8-3.7c1.1-1.1,2-2.5,3-3.8c0.8-1.1,1.5-2.3,2.2-3.5c0.1-0.1,0.2-0.2,0.2-0.3   c0.5-1.9,1.6-3.5,1.7-5.6c0.1-1.9,0.2-3.8,0-5.7c-0.2-2-0.3-4-0.6-6c-0.6-4.2-2.6-7.7-5.8-10.4c-2.3-1.9-5.2-3-8.2-3.6   c-1.9-0.3-3.7-0.6-5.6-0.9c-3.1-0.5-6.1-0.7-9.2-0.5c-3.5,0.2-7.1,0.6-10.5,1.4c-2.4,0.6-4.7,1.3-7,2c-1.8,0.5-3.5,1-5.3,1.4   c-2.1,0.4-4-0.1-5.8-1c-0.2-0.1-0.3-0.2-0.4-0.4c-0.6-1.4-1.3-2.8-1.3-4.5c0-3.6-0.1-7.1-0.1-10.7c0-4,0-8,0-12   c0-2.9,0.2-5.7,0.2-8.6c0-2.8-0.2-5.6-0.2-8.4c0.1-3.9,0.3-7.8,0.4-11.7c0-0.6,0.2-1,0.8-1.1c0.9-0.3,1.7-0.5,2.6-0.8   c1.8-0.6,3.6-0.4,5.4-0.4c1.4,0,2.8,0,4.1,0c3.7-0.1,7.4-0.2,11.1-0.4c2.3-0.1,4.6-0.2,6.9-0.2c4.7,0,9.4-0.1,14.1,0   c3.5,0.1,7,0.1,10.5,0.1c2.6,0,5.2,0.1,7.7,0.1c0.9,0,1.6,0.3,2,1.2c0.1,0.1,0.1,0.3,0.2,0.4c1.3,1.1,1.2,2.7,1.4,4.2   c0.4,3.8,0.5,7.5,0.6,11.3c0,0.5-0.1,1.1-0.2,1.6c-0.1,0.4-0.5,0.6-0.9,0.4C93.2,61.8,92.6,61.5,91.8,61.2z M25.1,139.3   c0.7,0.6,1.5,1.2,2.2,1.8c1.6,1.4,3.1,3,4.8,4.3c1.8,1.4,3.6,2.7,5.5,3.9c1.4,0.9,2.9,1.6,4.3,2.4c2.5,1.5,5.2,2.6,8,3.4   c2.6,0.8,5.3,1.4,8,1.9c2.7,0.5,5.5,0.7,8.3,0.6c1.9-0.1,3.8-0.4,5.7-1.1c3.6-1.4,7-3.4,10.4-5.2c1.2-0.6,2.3-1.5,3.4-2.3   c1.9-1.5,3.7-3,5.6-4.5c2.2-1.9,4.2-3.9,5.8-6.3c0.5-0.8,0.9-1.6,0.9-2.6c0-0.8,0-1.6,0.2-2.3c0.6-2.6,0.8-5.3,1.3-7.9   c0.6-4.2,0.4-8.4,0-12.5c-0.1-0.6-0.2-1.2-0.3-1.8c-0.6-2.2-1.3-4.4-1.9-6.6c-1-3.3-2.4-6.5-4.3-9.4c-0.6-1-1.4-1.9-2.2-2.9   c-0.3-0.3-0.6-0.6-0.9-0.8c-2-1.4-4.3-2.4-6.6-3.2c-2.6-1-5.3-1.5-8.1-1.9c-2.5-0.4-4.9-0.9-7.4-0.9c-4.6,0-9.1,0.2-13.7,0.4   c-2.7,0.1-5.4,0.4-8.1,1.2c-1,0.3-2,0.5-3,0.6c-1.3,0.2-1.9-0.3-2.3-1.5c-0.1-0.4-0.1-0.8-0.2-1.2c-0.1-2.8-0.2-5.6-0.2-8.4   c0-4.9,0.1-9.8,0.2-14.7c0-0.6,0.2-1.2,0.5-1.7c0.8-1.2,1.9-1.8,3.5-1.9c4.4-0.1,8.7-0.3,13.1-0.4c0.8,0,1.7-0.1,2.5-0.1   c1.7,0,3.5-0.1,5.2,0c2.8,0.1,5.5,0.2,8.3,0.3c1.8,0.1,3.7,0.1,5.5,0.1c2,0,4,0,6.1,0c1.9,0,3.8-0.1,5.7-0.1c1.1,0,1.2,0,1.2-1.1   c0-0.2,0-0.4,0-0.6c0-2.4,0-4.9,0-7.3c0-0.9,0-1.8,0-2.7c-2.1,0-4,0.1-5.9,0.1c-5.3-0.1-10.5-0.2-15.8-0.3c-2,0-4,0.1-6.1,0.1   c-4.3-0.1-8.6-0.2-12.8-0.3c-3,0-6,0.1-9,0.1c-4.1,0.1-8.3,0.1-12.4-0.5c-0.3-0.1-0.7,0-0.9,0c0.1,2.8,0.1,5.4,0.2,8   c0,1.5,0,3,0,4.5c0.1,1.7,0.3,3.3,0.4,5c0.1,1.9,0,3.8,0,5.7c0,3.2,0,6.5,0,9.7c0,1.8,0,3.6,0,5.4c0,3.9,0.1,7.7,0.1,11.6   c0,1.5,0.1,2.9,0.2,4.4c0,0.4,0.2,0.6,0.5,0.7c0.9,0.4,1.8,0.4,2.7,0.1c1.6-0.5,3.2-1.1,4.8-1.6c2.1-0.7,4.1-1.3,6.2-1.9   c2.9-0.7,5.7-1.5,8.6-1.9c2.6-0.4,5.2-0.5,7.8-0.6c2.1-0.1,4.2-0.1,6.2,0.2c3.4,0.5,6.8,1.2,10.2,1.9c1.4,0.3,2.7,0.9,3.7,2   c0.9,0.9,1.9,1.9,2.8,2.8c0.3,0.3,0.6,0.5,0.9,0.8c1,1.3,2,2.5,2.9,3.9c1.1,1.7,2,3.5,2.4,5.5c0.3,1.4,0.6,2.9,0.9,4.3   c0.4,2.6,0.6,5.2,0.4,7.9c-0.1,1.5-0.1,3.1-0.8,4.6c-0.8,1.8-1.5,3.6-2.3,5.3c-0.2,0.5-0.7,1-1.1,1.4c-0.7,0.8-1.4,1.5-2,2.3   c-1.2,1.6-2.6,3-4.2,4.1c-3.6,2.5-7.5,4.2-11.7,5.2c-4.1,0.9-8.2,0.7-12.4,0.3c-4.1-0.4-8-1.8-11.6-3.9c-0.4-0.2-0.7-0.4-1-0.7   c-1.6-1.3-3.2-2.5-4.7-3.9c-1.9-1.8-4.2-3.2-6-5.1c-0.2-0.2-0.4-0.3-0.5-0.4c-0.3-0.3-0.7-0.3-1,0.1c-0.8,1-1.9,1.6-2.8,2.4   C27.5,136.8,26.4,138,25.1,139.3z"></path>
	<path style="fill:#162B54;" d="M130.5,100.4c1.9,0,3.7,0,5.5,0c0.7,0,1.5,0,2.2-0.1c1.1-0.1,2.1-0.1,3.2,0.7c0-1,0.4-1.6,0.9-2.2   c1.2-1.6,2.5-3.1,3.6-4.7c1.9-2.9,3.7-5.8,5.6-8.8c0.6-1,1.3-1.9,1.8-2.9c0.6-1.1,1.1-2.2,1.7-3.3c0.8-1.3,1.6-2.6,2.5-3.8   c2.2-3.4,4.4-6.8,6.6-10.2c0.7-1,1.4-2,2.2-3c0.5-0.7,2-0.9,2.8-0.3c2.6,1.9,5.6,3.3,8,5.5c0.2,0.2,0.5,0.4,0.7,0.7   c0.5,0.9,0.5,1.3-0.3,1.8c-0.5,0.3-0.9,0.8-1,1.4c0,0.2-0.1,0.3-0.2,0.5c-1.8,3-3.6,6-5.4,9c-2.2,3.4-4.4,6.7-6.7,10   c-1.9,2.8-4,5.5-6,8.3c-1.3,1.8-2.5,3.7-3.8,5.6c-0.2,0.3-0.3,0.6-0.5,0.8c-0.5,1-0.6,1.9,0.2,2.8c1,1.1,1.3,2.5,1.9,3.8   c1.3,2.9,2.5,5.8,3.7,8.8c0.3,0.7,0.5,1.4,0.8,2.1c0.6,1.4,1.2,2.7,1.8,4c0.8,1.8,1.6,3.5,2.4,5.3c1.1,2.5,2.3,4.9,3.5,7.4   c0.8,1.7,1.5,3.4,2.4,5.1c1,2.2,2.1,4.4,3.2,6.6c0.1,0.2,0.2,0.5,0.3,0.8c0.4,1.1,0.2,1.4-0.9,1.9c-3.4,1.6-6.7,3.2-9.8,5.3   c-0.8,0.5-1.6,0.9-2.5,0.8c-0.8-0.8-0.8-1.6-0.4-2.5c0.2-0.5,0.6-0.8,1.1-1c2.6-1.4,5.3-2.8,7.9-4.2c0.6-0.3,0.6-0.6,0.3-1.1   c-1.4-2.9-2.8-5.9-4.2-8.9c-2-4.3-4.1-8.5-6-12.8c-2.1-4.8-4-9.6-6-14.4c-0.7-1.8-1.4-3.6-2.1-5.4c-0.2-0.5-0.4-1.1-0.7-1.5   c-0.5-0.6-0.4-1.2-0.2-1.8c0.1-0.3,0.3-0.5,0.3-0.8c0.3-2.6,1.8-4.7,3.3-6.8c4.4-6.2,9-12.3,13.3-18.6c2.4-3.4,4.4-7,6.6-10.5   c0.5-0.8,0.5-1-0.3-1.5c-1.8-1.2-3.5-2.3-5.3-3.5c-0.1-0.1-0.3-0.1-0.5-0.1c-0.3,0.6-0.6,1.1-0.9,1.7c-0.9,1.6-1.8,3.2-2.8,4.8   c-0.7,1.2-1.6,2.4-2.3,3.6c-0.9,1.8-2.2,3.4-3.3,5.1c-1,1.7-2,3.4-3.1,5.1c-2.2,3.6-4.4,7.1-6.7,10.6c-0.9,1.4-2,2.7-3,4   c-0.4,0.5-0.9,1.1-1.3,1.6c-0.5,0.7-1,1.3-2,1.2c-0.1,0-0.3,0-0.4,0.1c-1.6,1-3.3,0.9-5.1,0.9c-1.7,0-3.5,0-5.3,0   c-0.9,0-1.8,0-2.6-0.6c-0.2-0.2-0.6-0.2-0.9-0.3c-0.7-0.2-1.3-0.5-1.5-1.4c-0.1-0.5-0.2-1-0.2-1.5c-0.1-6.5-0.3-12.9-0.3-19.4   c0-2.9,0.2-5.8,0.2-8.7c0-3.6,0.3-7.2-0.1-10.8c-0.1-1.1,0-2.2,0-3.3c0-0.6-0.3-0.8-0.8-0.8c-0.4,0-0.7,0-1.1,0   c-2,0.1-4,0.1-5.9,0.1c-0.9,0-1.9-0.2-2.8-0.3c0,0.1,0,0.2,0,0.3c0.8,0.6,0.9,1.5,1.2,2.4c1,3.7,0.6,7.5,0.5,11.3   c-0.1,3.4-0.2,6.8,0.1,10.2c0.3,3.6,0.2,7.2-0.3,10.8c-0.2,1.1-0.1,2.3-0.1,3.4c0,1.5,0,3,0,4.4c-0.1,3.1-0.1,6.2-0.2,9.3   c-0.2,4.3-0.4,8.7-0.5,13c-0.1,2.7-0.1,5.3-0.2,8c-0.3,7.3-0.3,14.7-0.1,22c0,1.5,0.2,2.9,0.3,4.4c0.1,0.9,0.1,0.9,1,0.8   c1.8-0.1,3.7-0.1,5.5-0.1c0.4,0,0.7,0.1,1.1,0.1c0.7,0,1.4,0.1,2.1,0c0.6-0.1,0.9-0.4,0.8-1.1c-0.1-1.1-0.2-2.1-0.2-3.2   c0-0.2,0-0.4,0-0.6c0-4-0.1-7.9-0.1-11.9c0-2.4,0-4.9,0.1-7.3c0-1.8,0.1-3.7,0.1-5.5c0-0.4,0-0.8,0-1.2c-0.2-3.6,0.1-7.3,0.2-10.9   c0-0.8,0-1.7,0.1-2.5c0-0.4,0.2-0.8,0.5-1.1c0.3-0.4,0.6,0,1,0.1c0.3,0.1,0.8,0,1-0.1c0.5-0.3,0.9-0.3,1.4-0.2c1.5,0,2.9,0.1,4.4,0   c1.1,0,2.2-0.2,3.3-0.2c0.5,0,1,0.4,1.5,0.4c0.5,0,1-0.3,1.5-0.2c0.8,0.1,1.4,0.5,1.9,1.2c1.1,1.7,1.9,3.6,2.7,5.4   c1.5,3.4,3.1,6.7,4.5,10.1c0.8,1.9,1.5,3.9,2.2,5.8c1,2.6,1.9,5.3,2.9,7.9c1.4,3.8,2.9,7.5,4.3,11.2c0.3,0.8,0.7,1.6,0.9,2.4   c0.1,0.3,0,0.7-0.2,1c-0.4,0.5-0.9,0.9-1.5,1.5c-1.3-0.3-1.5-0.7-1.7-1.9c-0.1-0.4-0.2-0.9-0.4-1.3c-1.7-4-3.4-8.1-5.1-12.1   c-0.7-1.7-1.2-3.4-1.8-5.1c-0.9-2.5-1.9-5-2.8-7.5c-1.4-4.2-3.2-8.1-5-12.1c-0.4-1-0.8-1.9-1.2-2.9c-0.3-0.9-1-1-1.8-0.9   c-0.7,0-1.4,0.1-2.1,0.1c-2.3,0.2-4.6,0.4-6.9,0c-0.2,0-0.4,0-0.8,0.1c0,1.5-0.1,2.9-0.1,4.3c0,1.5,0.1,3,0.1,4.6   c0,1.1,0.1,2.1,0.1,3.2c0,1.6,0.1,3.1,0.1,4.7c0,4.7,0,9.4,0,14.1c0,2.6,0,5.3,0,7.9c0,0.8,0.1,1.6,0.1,2.3c0,0.8,0.1,1.6-0.6,2.1   c-0.1,0.1-0.1,0.1-0.2,0.2c-0.6,2.2-2.5,2-4.1,2.1c-1,0-1.9-0.2-2.9-0.2c-1.5,0-3,0.1-4.5,0.1c-0.7,0-1.5,0.1-2.2,0   c-0.9-0.1-2.3-1.5-2.6-2.5c-0.1-0.5-0.2-1-0.2-1.5c-0.2-5.3-0.4-10.7-0.3-16c0.1-4.4,0.2-8.7,0.3-13.1c0.1-2.6,0.3-5.2,0.4-7.7   c0.2-5.3,0.3-10.5,0.4-15.8c0-1.4,0.1-2.8,0.2-4.1c0-1.9,0-3.8,0.1-5.7c0.1-3,0.4-6.1,0.5-9.1c0.1-1.4,0-2.9,0-4.3   c0-3.1,0.1-6.3,0.1-9.4c-0.1-2.5,0.4-5,0.1-7.6c-0.3-2.2-0.6-4.5-0.1-6.7c0,0,0-0.1,0-0.1c0-0.4-0.2-1-0.1-1.1   c0.5-0.4,1.2-0.8,1.8-0.8c3.1-0.2,6.1-0.3,9.2-0.5c1.1-0.1,2,0.5,2.8,1c1,0.6,1,0.6,0.6,1.8c-0.1,0.2-0.1,0.5-0.1,0.8   c0.5,3.1,0.7,6.2,1,9.3c0.3,3.9,0.1,7.8,0.2,11.7c0,0.7-0.1,1.5-0.1,2.2c0.1,3.6,0.1,7.2,0.2,10.8c0.1,3,0.1,6.1,0.2,9.1   C130.4,100.2,130.5,100.3,130.5,100.4z"></path>
</g>
</svg></div>
															
															<script type="text/template" id="Training5K_template">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg" data-bf-svg data-url="/images/shoefinder-new/5k.svg" data-bf-stepped-animation  data-active-screens="Training"></div>
														</script>
														</div>
														<div class="bf-media-button__text" id="training_1Label">5k</div>
													</div>
												</div>
											</div>
							
										
											
												<div class="bf-grid__col-1-2 bf-grid__col-1-3-tablet-up bf-training-screen__transition-group-4">
													


	  <!--  option [object Object] -->
	  <!--  valueOverride 2 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="training" value="2" id="training_2" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="training_2Label" class="bf-media-button bf-media-button--aspect bf-media-button--aspect-square" data-bf-input-button="" data-input-id="training_2" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Training" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="3" data-gtm-screen-title="Training" data-gtm-question-category="Demographics" data-gtm-user-response="10k" data-gtm-question="What are you training for?" tabindex="2">
											
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg bf-media--loaded" data-bf-svg="" data-url="/images/shoefinder-new/10k.svg" data-bf-stepped-animation="" data-active-screens="Training"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img">
<title>10K</title>
<g id="Fills1">
	<path style="fill:#ABC0DE;" d="M188,71.5c-0.2-0.3-0.5-0.6-0.8-0.8c-2.2-2.1-4.9-3.4-7.3-5.1c-0.8-0.6-2.2-0.2-2.7,0.6   c-0.9,1.3-1.9,2.6-2.8,4c-2.8,4.4-5.8,8.7-8.3,13.3c-1.8,3.3-3.8,6.5-5.8,9.7c-1.7,2.6-3.6,5.1-5.5,7.7c-0.3,0.5-0.6,0.9-0.5,1.4   c-0.9-0.1-1.7-0.5-2.5-0.4c-2.4,0.2-4.8,0.1-7.2,0.2c-0.5,0-0.7-0.2-0.7-0.7c0-2.8-0.1-5.6-0.1-8.5c0-3.9-0.1-7.9-0.2-11.8   c-0.1-3.8,0.1-7.6-0.2-11.4c-0.2-2.6-0.4-9.6-0.8-12.2c-0.1-0.8-0.2-1.5,0.3-2.2c0,0,0-0.2,0-0.3c-1.1-0.7-2.2-1.6-3.6-1.5   c-2.6,0.3-5.2,0.2-7.8,0.4c-0.9,0.1-1.7,0.4-2.5,0.8c0.1,0.4,0.2,0.8,0.2,1.2c-0.2,2.6,0.1,9.4,0.2,12c0.1,1.8,0,3.5-0.1,5.3   c-0.1,3-0.1,5.9-0.2,8.9c-0.1,2.9-0.1,5.8-0.2,8.7c-0.1,1.9-0.2,3.8-0.3,5.7c-0.1,1.8-0.1,3.6-0.1,5.3c0,0.6-0.1,1.2-0.1,1.8   c-0.1,4.6-0.2,9.3-0.3,13.9c-0.1,3-0.3,6-0.4,9c-0.1,4.4-0.3,8.7-0.4,13.1c0,3.3,0.1,6.7,0.2,10c0,1.7,0.1,3.5,0.3,5.2   c0.1,1.3,1.4,2.8,2.6,2.9c0.6,0,1.3-1,1.9-1c2-0.1,4.1-0.3,6.1,0c0.9,0.2,1.9,0,2.8-0.1c0.7-0.1,1.2,0.6,1.5-0.1   c0.1-0.3,0.2-0.7,0.5-0.9c0.7-0.6,0.6-1.3,0.6-2c0-0.5-0.1-1-0.1-1.6c0-2.6,0.1-5.1,0.1-7.7c0-4.6,0-9.3,0-13.9   c0-1.1,0-2.2-0.1-3.4c0-1.1-0.1-2.2-0.1-3.3c0-2.6,0-5.2,0-7.8c0-0.4,0.1-0.7,0.1-1.2c1.1,0.1,2.2,0.2,3.2,0.1   c1.9-0.1,3.8-0.2,5.7-0.3c0.8,0,1.4,0.2,1.7,1c0.3,0.9,0.6,1.8,1,2.7c1.7,3.8,3.4,7.5,4.6,11.4c0.8,2.6,1.8,5,2.7,7.6   c0.5,1.5,0.9,3,1.5,4.4c1.5,3.8,3.1,7.6,4.7,11.4c0.2,0.4,0.3,0.9,0.3,1.4c0.1,0.6,0.3,1,0.8,1.3c0.4,0.2,0.7,0.4,1,0.4   c0,0.2,0,0.4,0.1,0.7c0.1,0.2,0.9,1.1,1,1.3c0.9,0,1.6-0.3,2.3-0.8c2.9-2,6-3.5,9.1-5c1.1-0.5,1.2-0.7,0.8-1.9   c-0.1-0.2-0.2-0.5-0.3-0.7c-0.9-1.9-1.8-3.8-2.7-5.7c-0.9-1.8-1.7-3.7-2.5-5.6c-0.7-1.5-1.5-2.9-2.1-4.5c-1.8-4.2-3.9-8.2-5.4-12.5   c-0.1-0.2-0.2-0.4-0.3-0.6c-1.1-2.7-2.2-5.4-3.3-8c-0.5-1.3-0.8-2.7-1.8-3.7c-0.8-0.8-0.6-1.6-0.2-2.5c0.1-0.3,0.3-0.6,0.5-0.9   c1.2-1.8,2.3-3.5,3.5-5.3c1.8-2.6,3.7-5.1,5.5-7.7c2.1-3.1,4.1-6.2,6.1-9.3c1.8-2.8,3.4-5.7,5.1-8.6c0.1-0.1,0.2-0.3,0.2-0.5   c0.1-0.6,0.5-1.1,1-1.4C188.4,72.5,188.4,72.2,188,71.5z"></path>
	<path style="fill:#ABC0DE;" d="M14.8,64.3c-1,0.8-1.7,1.3-2.4,1.9c-0.8,0.7-1.6,1.2-2.6,1.3c-0.6,0.1-1.1,0-1.5-0.7   c-1.5-2.9-3.1-5.7-4.7-8.6c-0.2-0.5-0.2-0.8,0.2-1.1c2.4-2.3,5-4.3,7.4-6.5c0.8-0.7,1.6-1.4,2.4-2c0.3-0.3,0.8-0.7,1.1-0.6   c1.3,0.1,2.4-0.6,3.7-0.7c1.2-0.1,2.3-0.2,3.5,0c1,0.2,2.1,0.2,3.1-0.1c0.9-0.3,1.7-0.1,2.3,0.7c0.1,0.1,0.2,0.2,0.2,0.3   c-0.2,0.8,0.5,1.3,0.8,2c0.3,0.7,0.6,1.5,0.6,2.2c0,1.6-0.1,3.2-0.1,4.8c0,0.2,0,0.3,0,0.5c-0.1,3.2-0.2,6.3-0.2,9.5   c-0.1,2.7-0.1,5.5-0.1,8.2c0,0.8-0.1,1.6-0.2,2.5c-0.1,1.4-0.1,2.8-0.1,4.2c0,1.2,0,2.4,0,3.6c0,1.3,0,2.5,0,3.8c0,2-0.1,4-0.1,6   c-0.1,5.6-0.1,11.1-0.1,16.7c0,2.1,0.1,4.2,0.2,6.2c0,1.7,0.1,3.5,0.1,5.2c0,2.3-0.1,4.6-0.1,6.9c0,2.6,0.3,5.2,0.2,7.8   c-0.1,3.1-0.3,6.1-0.5,9.2c-0.1,2.3-0.2,4.7-0.4,7c-0.1,1.1-0.5,0.7-1.5,1c-0.7,0.1-1.4,0.3-2,0.2c-1.9-0.3-3.9-0.3-5.8-0.2   c-1.2,0.1-2-0.5-2.9-1c-0.3-0.1-0.6,0.6-0.2,0.1c0.4-0.4,0.2-1-0.2-1.4c-0.5-0.5-0.6-1.1-0.6-1.8c0-2.4,0-4.8,0.1-7.2   c0-2.2,0-4.3,0-6.5c0-3.6,0.1-7.1,0-10.7c0-1.6-0.2-3.1-0.2-4.7c-0.1-3.5-0.1-6.9-0.2-10.4c0-1.2-0.1-2.4-0.1-3.6   c0-0.8,0.2-1.6,0.2-2.3c0-1.9,0-3.8,0.1-5.7c0.1-3.7,0.3-7.4,0.4-11.1c0.1-2.4,0.1-4.9,0.1-7.3c0.1-4.1,0.1-8.3,0.2-12.4   C14.7,67.7,14.8,66.2,14.8,64.3z"></path>
	<path style="fill:#ABC0DE;" d="M117.6,107.5c0-1-0.2-1.9-0.1-2.9c0.2-3,0-5.9-0.2-8.9c-0.1-1-0.3-2-0.4-3.1   c-0.2-1.9-0.4-3.8-0.7-5.7c-0.7-4.3-2-8.5-3.5-12.5c-1.5-4-3.2-8-5.4-11.7c-1.9-3.2-4.6-5.9-7.2-8.5c-0.1-0.1-0.3-0.2-0.4-0.3   c-1.3-0.8-2.6-1.6-3.8-2.5c-0.3-0.2-0.7-0.4-1-0.5c-1.4-0.5-2.8-0.9-4.2-1.4c-3.7-1.1-7.6-1.4-11.5-1.4c-0.8,0-1.7,0.1-2.5,0.3   c-1.9,0.4-3.9,0.9-5.8,1.6c-4.1,1.3-7.6,3.6-11,6.2c0,0-0.1,0.1-0.1,0.1c-1.1,1.1-2.3,2.3-3.4,3.4c-1,1.1-2,2.2-3.1,3.2   c-2.6,2.4-4.7,5.2-6.5,8.2c-3,4.9-5.2,10.2-6.4,15.9c-0.9,3.9-1.5,7.8-1.4,11.9c0.1,4.1,0.3,8.1,0.4,12.2c0,1.1,0.2,2.2,0.4,3.2   c0.4,3.1,0.6,6.1,1.1,9.2c0.8,4.4,1.7,8.7,3.2,12.9c0.7,1.8,1.3,3.6,2.4,5.2c1.2,1.8,2.6,3.5,3.9,5.2c0.9,1.2,1.8,2.4,3,3.3   c2.2,1.8,4.5,3.5,6.9,5.1c3.3,2.2,7,2.5,10.9,3.5c2.5,0.6,5.1,0.7,7.6,0.4c0.4-0.1,0.9-0.1,1.3-0.1c2.9-0.1,5.7,0.5,8.4-0.7   c0.6-0.2,1.1-0.5,1.7-0.7c1.7-0.7,3.4-1.3,5.1-2c1.7-0.8,3.3-1.7,4.8-2.8c2.9-2.3,5.5-4.9,7.6-8c1.6-2.3,3.2-4.7,4.2-7.3   c0.4-1,0.6-2.1,1.1-3.1c2-4.9,3.5-9.9,4-15.2c0.4-3.8,0.6-7.7,0.8-11.6C117.7,107.5,117.6,107.5,117.6,107.5z M104.5,113.3   c-0.3,1.3-0.1,2.8-0.2,4.2c0,0.6-0.1,1.1-0.1,1.7c-0.3,2.5-1,4.9-1.7,7.3c-0.8,2.5-1.6,4.8-2.5,7.2c-0.4,1.1-1.1,2.1-1.7,3.1   c-0.9,1.6-2.3,2.8-3.5,4.2c-0.5,0.5-1.1,0.8-1.7,1.2c-1.1,0.8-2.3,1.5-3.5,2.3c-0.2,0.1-0.4,0.3-0.7,0.4c-2.9,0.9-5.7,1.1-8.9,0.9   c-0.6,0-1.3,0-2,0c-0.3,0-0.7,0-1,0c-2.5,0.2-4.8-0.6-7-1.5c-1.1-0.5-2.3,0.2-3.4-0.4c-1.2-0.7-2.4-1.4-3.5-2.3   c-3.7-3.1-6.2-7.1-8.3-11.4c-1.1-2.3-1.4-4.7-1.7-7.2c-0.2-1.7-0.3-3.4-0.6-5c-0.2-1.5-0.5-2.9-0.6-4.4c-0.1-1.3-0.1-2.6-0.2-3.9   c-0.3-4.2,0.4-8.4,1.1-12.5c0.5-3.3,1-6.5,1.8-9.7c0.4-1.7,1.1-3.3,1.9-4.8c1-2,2.1-3.9,3.2-5.8c0.7-1.3,1.5-2.5,2.4-3.7   c2-3,4.7-5.3,7.8-7.1c3.7-2.2,7.7-4.4,12-4.5c0.7,0,1.3,0,2-0.1c2.4-0.1,4.4,0.5,6.2,2.2c1.3,1.2,2.7,2.4,3.9,3.9   c0.6,0.8,1.4,2.3,2,3.2c1.1,1.5,2,3.1,2.8,4.8c1.6,3.4,2.9,6.9,3.8,10.6c0.7,3,1.3,6.1,1.6,9.2c0.2,1.7,0.2,3.4,0.3,5.1   c0.1,1.7,0.1,3.4,0.2,5.1c0,0.5,0,0.9,0,1.4c0,0.7-0.1,1.4,0,2.1C104.7,110.4,104.8,111.8,104.5,113.3z"></path>
</g>
<g id="Fills2">
	<path style="fill:#ABC0DE;" d="M190.2,69.3c-0.2-0.3-0.5-0.6-0.8-0.8c-2.2-2.1-4.9-3.4-7.3-5.1c-0.8-0.6-2.2-0.2-2.7,0.6   c-0.9,1.3-1.9,2.6-2.8,4c-2.8,4.4-5.8,8.7-8.3,13.3c-1.8,3.3-3.8,6.5-5.8,9.7c-1.7,2.6-3.6,5.1-5.5,7.7c-0.3,0.5-0.6,0.9-0.5,1.4   c-0.9-0.1-1.7-0.5-2.5-0.4c-2.4,0.2-4.8,0.1-7.2,0.2c-0.5,0-0.7-0.2-0.7-0.7c0-2.8-0.1-5.6-0.1-8.5c0-3.9-1.1-7.9-1.2-11.8   c-0.1-3.8,0.1-7.6-0.2-11.4c-0.2-2.6,0.6-9.6,0.2-12.2c-0.1-0.8-0.2-1.5,0.3-2.2c0,0,0-0.2,0-0.3c-1.1-0.7-2.2-1.6-3.6-1.5   c-2.6,0.3-5.2,0.2-7.8,0.4c-0.9,0.1-1.7,0.4-2.5,0.8c0.1,0.4,0.2,0.8,0.2,1.2c-0.2,2.6-0.9,9.4-0.8,12c0.1,1.8,0,3.5-0.1,5.3   c-0.1,3-0.1,5.9-0.2,8.9c-0.1,2.9-0.1,5.8-0.2,8.7c-0.1,1.9-0.2,3.8-0.3,5.7c-0.1,1.8-0.1,3.6-0.1,5.3c0,0.6-0.1,1.2-0.1,1.8   c-0.1,4.6-0.2,9.3-0.3,13.9c-0.1,3,0.7,6,0.6,9c-0.1,4.4-0.3,8.7-0.4,13.1c0,3.3,0.1,6.7,0.2,10c0,1.7,0.1,3.5,0.3,5.2   c0.1,1.3,1.4,2.8,2.6,2.9c0.6,0,1.3,0,1.9,0c2-0.1,4.1-0.3,6.1,0c0.9,0.2,1.9,0,2.8-0.1c0.7-0.1,1.2-0.4,1.5-1.1   c0.1-0.3,0.2-0.7,0.5-0.9c0.7-0.6,0.6-1.3,0.6-2c0-0.5-0.1-1-0.1-1.6c0-2.6,0.1-5.1,0.1-7.7c0-4.6,0-9.3,0-13.9   c0-1.1,0-2.2-0.1-3.4c0-1.1-0.1-2.2-0.1-3.3c0-2.6,0-5.2,0-7.8c0-0.4,0.1-0.7,0.1-1.2c1.1,0.1,2.2,0.2,3.2,0.1   c1.9-0.1,3.8-0.2,5.7-0.3c0.8,0,1.4,0.2,1.7,1c0.3,0.9,0.6,1.8,1,2.7c1.7,3.8,3.4,7.5,4.6,11.4c0.8,2.6,1.8,5,2.7,7.6   c0.5,1.5,0.9,3,1.5,4.4c1.5,3.8,3.1,7.6,4.7,11.4c0.2,0.4,0.3,0.9,0.3,1.4c0.1,0.6,0.3,1,0.8,1.3c0.4,0.2,0.7,0.4,1,0.4   c0,0.2,0,0.4,0.1,0.7c0.1,0.2,0.9,1.1,1,1.3c0.9,0,1.6-0.3,2.3-0.8c2.9-2,6-3.5,9.1-5c1.1-0.5,1.2-0.7,0.8-1.9   c-0.1-0.2-0.2-0.5-0.3-0.7c-0.9-1.9-1.8-3.8-2.7-5.7c-0.9-1.8-1.7-3.7-2.5-5.6c-0.7-1.5-1.5-2.9-2.1-4.5c-1.8-4.2-3.9-8.2-5.4-12.5   c-0.1-0.2-0.2-0.4-0.3-0.6c-1.1-2.7-2.2-5.4-3.3-8c-0.5-1.3-0.8-2.7-1.8-3.7c-0.8-0.8-0.6-1.6-0.2-2.5c0.1-0.3,0.3-0.6,0.5-0.9   c1.2-1.8,2.3-3.5,3.5-5.3c1.8-2.6,3.7-5.1,5.5-7.7c2.1-3.1,4.1-6.2,6.1-9.3c1.8-2.8,3.4-5.7,5.1-8.6c0.1-0.1,0.2-0.3,0.2-0.5   c0.1-0.6,0.5-1.1,1-1.4C190.6,70.3,190.7,70,190.2,69.3z"></path>
	<path style="fill:#ABC0DE;" d="M17.1,62c-1,0.8-1.7,1.3-2.4,1.9c-0.8,0.7-1.6,1.2-2.6,1.3c-0.6,0.1-1.1,0-1.5-0.7   C9,61.7,7.4,58.8,5.9,56c-0.2-0.5-0.2-0.8,0.2-1.1c2.4-2.3,5-4.3,7.4-6.5c0.8-0.7,1.6-1.4,2.4-2c0.3-0.3,0.8-0.7,1.1-0.6   c1.3,0.1,2.4-0.6,3.7-0.7c1.2-0.1,2.3-0.2,3.5,0c1,0.2,2.1,0.2,3.1-0.1c0.9-0.3,1.7-0.1,2.3,0.7c-2-2.6-0.3,2.9,0.2,0.3   c-0.2,0.8-0.5,1.3-0.2,2c0.3,0.7,0.6,1.5,0.6,2.2c0,1.6-0.1,3.2-0.1,4.8c0,0.2,0,0.3,0,0.5c-0.1,3.2-0.2,6.3-0.2,9.5   c-0.1,2.7-0.1,5.5-0.1,8.2c0,0.8-0.1,1.6-0.2,2.5c-0.1,1.4-0.1,2.8-0.1,4.2c0,1.2,0,2.4,0,3.6c0,1.3,0,2.5,0,3.8c0,2-0.1,4-0.1,6   c-0.1,5.6-0.1,11.1-0.1,16.7c0,2.1,0.1,4.2,0.2,6.2c0,1.7,0.1,3.5,0.1,5.2c0,2.3-0.1,4.6-0.1,6.9c0,2.6,0.3,5.2,0.2,7.8   c-0.1,3.1-0.3,6.1-0.5,9.2c-0.1,2.3,0.8,4.7,0.6,7c-0.1,1.1-0.5,1.7-1.5,2c-0.7,0.1-1.4,0.3-2,0.2c-1.9-0.3-3.9-0.3-5.8-0.2   c-1.2,0.1-2-0.5-2.9-1c-0.3-0.1-0.6-0.4-0.2-0.9c0.4-0.4,0.2-1-0.2-1.4c-0.5-0.5-0.6-1.1-0.6-1.8c0-2.4,0-4.8,0.1-7.2   c0-2.2,0-4.3,0-6.5c0-3.6,0.1-7.1,0-10.7c0-1.6-0.2-3.1-0.2-4.7c-0.1-3.5-0.1-6.9-0.2-10.4c0-1.2-0.1-2.4-0.1-3.6   c0-0.8,0.2-1.6,0.2-2.3c0-1.9,0-3.8,0.1-5.7c0.1-3.7,0.3-7.4,0.4-11.1c0.1-2.4,0.1-4.9,0.1-7.3c0.1-4.1,0.1-8.3,0.2-12.4   C16.9,65.5,17,63.9,17.1,62z"></path>
	<path style="fill:#ABC0DE;" d="M118.8,105.5c-0.1-1-0.2-2-0.1-2.9c0.2-3,0-6-0.2-9c-0.1-1-0.3-2.1-0.4-3.1   c-0.2-1.9,0.6-3.9,0.3-5.8c-0.7-4.4-2-8.6-3.6-12.8c-1.6-4.1-3.3-8.1-5.5-11.9c-2-3.3-4.7-6-7.4-8.7c-0.1-0.1-0.3-0.2-0.4-0.3   c-1.3-0.8-2.6-1.7-3.9-2.5c-0.3-0.2-0.7-0.4-1.1-0.6c-1.4-0.5-2.8-1-4.3-1.4c-3.8-1.1-7.7-1.5-11.7-1.4c-0.8,0-1.7,0.1-2.5,0.3   c-2,0.4-3.9,1-5.9,1.6c-4.2,1.4-7.8,3.7-11.2,6.4c0,0-0.1,0.1-0.1,0.1c-1.2,1.2-2.3,2.3-3.5,3.5c-1.1,1.1-2,2.2-3.1,3.2   c-2.6,2.5-4.8,5.3-6.7,8.4c-3.1,5-5.3,10.4-6.6,16.2c-0.9,4-2.6,8-2.5,12.1c0.1,4.2,0.3,8.3,0.5,12.5c0,1.1,0.2,2.2,0.4,3.3   c0.4,3.1,0.6,6.3,1.2,9.3c0.8,4.4,2.7,8.9,4.3,13.1c0.7,1.8,1.3,3.7,2.4,5.3c1.2,1.8,2.6,3.6,4,5.3c0.9,1.2,1.9,2.4,3,3.3   c2.3,1.8,4.6,3.6,7.1,5.2c3.4,2.2,7.2,3.6,11.1,4.6c2.6,0.6,5.2,0.7,7.8,0.4c0.4-0.1,0.9-0.1,1.3-0.1c2.9-0.1,5.8-0.5,8.6-1.7   c0.6-0.3,1.1-0.5,1.7-0.7c1.7-0.7,3.5-1.3,5.2-2.1c1.7-0.8,3.4-1.7,4.9-2.9c3-2.4,5.6-5,7.7-8.2c1.6-2.4,3.3-4.7,4.3-7.5   c0.4-1,0.7-2.1,1.1-3.1c2.1-5,2.5-10.1,3.1-15.5c0.4-3.9,0.6-7.9,0.8-11.8C118.9,105.5,118.8,105.5,118.8,105.5z M106.4,111.4   c-0.3,1.3-0.1,2.8-0.2,4.2c0,0.6-0.1,1.1-0.1,1.7c-0.3,2.6-1,5-1.8,7.5c-0.8,2.5-1.7,4.9-2.6,7.4c-0.4,1.1-1.1,2.1-1.7,3.1   c-0.9,1.7-2.3,2.9-3.6,4.2c-0.5,0.5-1.1,0.9-1.7,1.3c-1.2,0.8-2.3,1.6-3.5,2.4c-0.2,0.1-0.4,0.3-0.7,0.4c-2.9,0.9-5.8,2.1-9,2   c-0.7,0-1.3,0-2,0c-0.4,0-0.7,0-1.1,0c-2.5,0.2-4.9-0.6-7.2-1.5c-1.1-0.5-2.3-0.8-3.4-1.4c-1.2-0.7-2.5-1.4-3.5-2.3   c-3.8-3.1-6.3-7.2-8.4-11.6c-1.1-2.3-1.7-1.1-2-3.6c-0.2-1.7-0.9-7.1-1.1-8.8c-0.2-1.5-0.5-3-0.6-4.5c-0.1-1.3-0.1-2.7-0.2-4   c-0.3-4.3,1.2-8.6,1.9-12.8c0.5-3.3,1.1-6.6,1.8-9.9c0.4-1.7,1.1-3.4,1.9-4.9c1-2,2.2-4,3.3-5.9c0.8-1.3,1.6-2.6,2.4-3.8   c2.1-3.1,4.8-5.4,8-7.3c3.8-2.2,7.9-3.4,12.2-3.5c0.7,0,1.3-0.1,2-0.1c2.4-0.1,4.5,0.6,6.3,2.2c1.4,1.3,2.8,2.5,3.9,3.9   c0.6,0.8,1.5,1.4,2.1,2.2c1.2,1.5,2,3.2,2.8,4.9c1.6,3.5,3,7.1,3.9,10.8c0.8,3.1,1.3,6.2,1.7,9.4c0.2,1.7,0.2,3.4,0.3,5.2   c0.1,1.7,0.1,3.4,0.2,5.2c0,0.5,0,1,0,1.4c0,0.7-0.1,1.4,0,2.1C106.6,108.4,106.8,109.8,106.4,111.4z"></path>
</g>
<g id="Fills3">
	<path style="fill:#ABC0DE;" d="M188,69.3c-0.2-0.3-0.5-0.6-0.8-0.8c-2.2-2.1-4.9-3.4-7.3-5.1c-0.8-0.6-2.2-0.2-2.7,0.6   c-0.9,1.3-1.9,2.6-2.8,4c-2.8,4.4-5.8,8.7-8.3,13.3c-1.8,3.3-3.8,6.5-5.8,9.7c-1.7,2.6-3.6,5.1-5.5,7.7c-0.3,0.5-0.6,0.9-0.5,1.4   c-0.9-0.1-1.7-0.5-2.5-0.4c-2.4,0.2-4.8,0.1-7.2,0.2c-0.5,0-0.7-0.2-0.7-0.7c0-2.8-0.1-5.6-0.1-8.5c0-3.9-0.1-7.9-0.2-11.8   c-0.1-3.8,0.1-7.6-0.2-11.4c-0.2-2.6-0.4-9.6-0.8-12.2c-0.1-0.8-0.2-1.5,0.3-2.2c0,0,0-0.2,0-0.3c-1.1-0.7-2.2-1.6-3.6-1.5   c-2.6,0.3-5.2,0.2-7.8,0.4c-0.9,0.1-1.7,0.4-2.5,0.8c0.1,0.4,0.2,0.8,0.2,1.2c-0.2,2.6,0.1,9.4,0.2,12c0.1,1.8,0,3.5-0.1,5.3   c-0.1,3-0.1,5.9-0.2,8.9c-0.1,2.9-0.1,5.8-0.2,8.7c-0.1,1.9,0.5,4-0.3,5.7c-2.7,6.4-1.9,6.8-0.1,5.3c0.5-0.4-0.1,1.2-0.1,1.8   c-0.1,4.6-0.2,9.3-0.3,13.9c-0.1,3-0.3,6-0.4,9c-0.1,4.4-0.3,8.7-0.4,13.1c0,3.3,0.1,6.7,0.2,10c0,1.7,0.1,3.5,0.3,5.2   c0.1,1.3,1.4,2.8,2.6,2.9c0.6,0,1.3,0,1.9,0c2-0.1,4.1-0.3,6.1,0c0.9,0.2,1.9,0,2.8-0.1c0.7-0.1,1.2-0.4,1.5-1.1   c0.1-0.3,0.2-0.7,0.5-0.9c0.7-0.6,0.6-1.3,0.6-2c0-0.5-0.1-1-0.1-1.6c0-2.6,0.1-5.1,0.1-7.7c0-4.6,0-9.3,0-13.9   c0-1.1,0-2.2-0.1-3.4c0-1.1-0.1-2.2-0.1-3.3c0-2.6,0-5.2,0-7.8c0-0.4,0.1-0.7,0.1-1.2c1.1,0.1,2.2,0.2,3.2,0.1   c1.9-0.1,3.8-0.2,5.7-0.3c0.8,0,1.4,0.2,1.7,1c0.3,0.9,0.6,1.8,1,2.7c1.7,3.8,3.4,7.5,4.6,11.4c0.8,2.6,1.8,5,2.7,7.6   c0.5,1.5,0.9,3,1.5,4.4c1.5,3.8,3.1,7.6,4.7,11.4c0.2,0.4,0.3,0.9,0.3,1.4c0.1,0.6,0.3,1,0.8,1.3c0.4,0.2,0.7,0.4,1,0.4   c0,0.2,0,0.4,0.1,0.7c0.1,0.2,0.9,1.1,1,1.3c0.9,0,1.6-0.3,2.3-0.8c2.9-2,6-3.5,9.1-5c1.1-0.5,1.2-0.7,0.8-1.9   c-0.1-0.2-0.2-0.5-0.3-0.7c-0.9-1.9-1.8-3.8-2.7-5.7c-0.9-1.8-1.7-3.7-2.5-5.6c-0.7-1.5-1.5-2.9-2.1-4.5c-1.8-4.2-3.9-8.2-5.4-12.5   c-0.1-0.2-0.2-0.4-0.3-0.6c-1.1-2.7-2.2-5.4-3.3-8c-0.5-1.3-0.8-2.7-1.8-3.7c-0.8-0.8-0.6-1.6-0.2-2.5c0.1-0.3,0.3-0.6,0.5-0.9   c1.2-1.8,2.3-3.5,3.5-5.3c1.8-2.6,3.7-5.1,5.5-7.7c2.1-3.1,4.1-6.2,6.1-9.3c1.8-2.8,3.4-5.7,5.1-8.6c0.1-0.1,0.2-0.3,0.2-0.5   c0.1-0.6,0.5-1.1,1-1.4C188.4,70.3,188.4,70,188,69.3z"></path>
	<path style="fill:#ABC0DE;" d="M14.8,62c-1,0.8-1.7,1.3-2.4,1.9c-0.8,0.7-1.6,1.2-2.6,1.3c-0.6,0.1-1.1,0-1.5-0.7   c-1.5-2.9-3.1-5.7-4.7-8.6c-0.2-0.5-0.2-0.8,0.2-1.1c2.4-2.3,5-4.3,7.4-6.5c0.8-0.7,1.6-1.4,2.4-2c0.3-0.3,0.8-0.7,1.1-0.6   c1.3,0.1,2.4-0.6,3.7-0.7c1.2-0.1,2.3-0.2,3.5,0c1,0.2,2.1,0.2,3.1-0.1c0.9-0.3,1.7-0.1,2.3,0.7c0.1,0.1,0.2,0.2,0.2,0.3   c-0.2,0.8,0.5,1.3,0.8,2c0.3,0.7,0.6,1.5,0.6,2.2c0,1.6-0.1,3.2-0.1,4.8c0,0.2,0,0.3,0,0.5c-0.1,3.2-0.2,6.3-0.2,9.5   c-0.1,2.7-0.1,5.5-0.1,8.2c0,0.8-0.1,1.6-0.2,2.5c-0.1,1.4-0.1,2.8-0.1,4.2c0,1.2,0,2.4,0,3.6c0,1.3,0,2.5,0,3.8c0,2-0.1,4-0.1,6   c-0.1,5.6-0.1,11.1-0.1,16.7c0,2.1,0.1,4.2,0.2,6.2c0,1.7,0.1,3.5,0.1,5.2c0,2.3-0.1,4.6-0.1,6.9c0,2.6,0.3,5.2,0.2,7.8   c-0.1,3.1-0.3,6.1-0.5,9.2c-0.1,2.3-0.2,4.7-0.4,7c-0.1,1.1-0.5,1.7-1.5,2c-0.7,0.1-1.4,0.3-2,0.2c-1.9-0.3-3.9-0.3-5.8-0.2   c-1.2,0.1-2-0.5-2.9-1c-0.3-0.1-0.6-0.4-0.2-0.9c0.4-0.4,0.2-1-0.2-1.4c-0.5-0.5-0.6-1.1-0.6-1.8c0-2.4,0-4.8,0.1-7.2   c0-2.2,0-4.3,0-6.5c0-3.6,0.1-7.1,0-10.7c0-1.6-0.2-3.1-0.2-4.7c-0.1-3.5-0.1-6.9-0.2-10.4c0-1.2-0.1-2.4-0.1-3.6   c0-0.8,0.2-1.6,0.2-2.3c0-1.9,0-3.8,0.1-5.7c0.1-3.7,0.3-7.4,0.4-11.1c0.1-2.4,0.1-4.9,0.1-7.3c0.1-4.1,0.1-8.3,0.2-12.4   C14.7,65.5,14.8,63.9,14.8,62z"></path>
	<path style="fill:#ABC0DE;" d="M117.6,105.3c0-1-0.2-1.9-0.1-2.9c0.2-3,0-5.9-0.2-8.9c-0.1-1-0.3-2-0.4-3.1   c-0.2-1.9-0.4-3.8-0.7-5.7c-0.7-4.3-2-8.5-3.5-12.5c-1.5-4-3.2-8-5.4-11.7c-1.9-3.2-4.6-5.9-7.2-8.5c-0.1-0.1-0.3-0.2-0.4-0.3   c-1.3-0.8-2.6-1.6-3.8-2.5c-0.3-0.2-0.7-0.4-1-0.5c-1.4-0.5-2.8-0.9-4.2-1.4c-3.7-1.1-7.6-1.4-11.5-1.4c-0.8,0-1.7,0.1-2.5,0.3   c-1.9,0.4-3.9,0.9-5.8,1.6c-4.1,1.3-7.6,3.6-11,6.2c0,0-0.1,0.1-0.1,0.1c-1.1,1.1-2.3,2.3-3.4,3.4c-1,1.1-2,2.2-3.1,3.2   c-2.6,2.4-4.7,5.2-6.5,8.2c-3,4.9-5.2,10.2-6.4,15.9c-0.9,3.9-1.5,7.8-1.4,11.9c0.1,4.1,0.3,8.1,0.4,12.2c0,1.1,0.2,2.2,0.4,3.2   c0.4,3.1,0.6,6.1,1.1,9.2c0.8,4.4,1.7,8.7,3.2,12.9c0.7,1.8,1.3,3.6,2.4,5.2c1.2,1.8,2.6,3.5,3.9,5.2c0.9,1.2,1.8,2.4,3,3.3   c2.2,1.8,4.5,3.5,6.9,5.1c3.3,2.2,7,3.5,10.9,4.5c2.5,0.6,5.1,0.7,7.6,0.4c0.4-0.1,0.9-0.1,1.3-0.1c2.9-0.1,5.7-0.5,8.4-1.7   c0.6-0.2,1.1-0.5,1.7-0.7c1.7-0.7,3.4-1.3,5.1-2c1.7-0.8,3.3-1.7,4.8-2.8c2.9-2.3,5.5-4.9,7.6-8c1.6-2.3,3.2-4.7,4.2-7.3   c0.4-1,0.6-2.1,1.1-3.1c2-4.9,3.5-9.9,4-15.2c0.4-3.8,0.6-7.7,0.8-11.6C117.7,105.3,117.6,105.3,117.6,105.3z M104.5,111   c-0.3,1.3-0.1,2.8-0.2,4.2c0,0.6-0.1,1.1-0.1,1.7c-0.3,2.5-1,4.9-1.7,7.3c-0.8,2.5-1.6,4.8-2.5,7.2c-0.4,1.1-1.1,2.1-1.7,3.1   c-0.9,1.6-2.3,2.8-3.5,4.2c-0.5,0.5-1.1,0.8-1.7,1.2c-1.1,0.8-2.3,1.5-3.5,2.3c-0.2,0.1-0.4,0.3-0.7,0.4c-2.9,0.9-5.7,2.1-8.9,1.9   c-0.6,0-1.3,0-2,0c-0.3,0-0.7,0-1,0c-2.5,0.2-4.8-0.6-7-1.5c-1.1-0.5-2.3-0.8-3.4-1.4c-1.2-0.7-2.4-1.4-3.5-2.3   c-3.7-3.1-6.2-7.1-8.3-11.4c-1.6-3.3-1.4-4.6-1.7-7.2c-0.2-1.7-0.3-3.4-0.6-5c-0.2-1.5-0.5-2.9-0.6-4.4c-0.1-1.3-0.1-2.6-0.2-3.9   c-0.3-4.2,0.4-8.4,1.1-12.5c0.5-3.3,1-6.5,1.8-9.7c0.4-1.7,1.1-3.3,1.9-4.8c1-2,2.1-3.9,3.2-5.8c0.7-1.3,1.5-2.5,2.4-3.7   c2-3,4.7-5.3,7.8-7.1c3.7-2.2,7.7-3.4,12-3.5c0.7,0,1.3,0,2-0.1c2.4-0.1,4.4,0.5,6.2,2.2c1.3,1.2,2.7,2.4,3.9,3.9   c0.6,0.8,1.4,1.3,2,2.2c1.1,1.5,2,3.1,2.8,4.8c1.6,3.4,2.9,6.9,3.8,10.6c0.7,3,1.3,6.1,1.6,9.2c0.2,1.7,0.2,3.4,0.3,5.1   c0.1,1.7,0.1,3.4,0.2,5.1c0,0.5,0,0.9,0,1.4c0,0.7-0.1,1.4,0,2.1C104.7,108.1,104.8,109.6,104.5,111z"></path>
</g>
<g id="Lines">
	<path style="fill:#162B54;" d="M154.6,102c-0.2-0.6,0.2-1,0.5-1.4c2-2.6,4-5.2,5.8-7.9c2.1-3.3,4.3-6.6,6.1-10   c2.6-4.8,5.7-9.2,8.7-13.7c0.9-1.4,1.9-2.8,2.9-4.2c0.6-0.8,2-1.2,2.9-0.6c2.5,1.8,5.3,3.1,7.6,5.3c0.3,0.3,0.6,0.5,0.8,0.9   c0.5,0.7,0.4,1-0.3,1.6c-0.5,0.4-0.9,0.8-1,1.5c0,0.2-0.2,0.3-0.2,0.5c-1.8,2.9-3.5,5.9-5.4,8.8c-2.1,3.2-4.2,6.4-6.4,9.6   c-1.9,2.7-3.8,5.3-5.7,7.9c-1.3,1.8-2.5,3.6-3.7,5.4c-0.2,0.3-0.4,0.6-0.5,0.9c-0.4,0.9-0.6,1.7,0.2,2.6c1,1,1.4,2.5,1.9,3.8   c1.2,2.8,2.3,5.5,3.5,8.3c0.1,0.2,0.2,0.4,0.3,0.6c1.6,4.4,3.8,8.6,5.7,12.9c0.7,1.6,1.5,3.1,2.2,4.6c0.9,1.9,1.7,3.8,2.6,5.7   c0.9,2,1.9,3.9,2.9,5.9c0.1,0.2,0.2,0.5,0.3,0.7c0.4,1.2,0.3,1.4-0.9,1.9c-3.3,1.6-6.5,3.1-9.5,5.1c-0.7,0.5-1.5,0.8-2.4,0.8   c-0.1-0.2-1-1.1-1.1-1.3c-0.6-1.1,0.5-1.5,1.6-2.1c2.5-1.3,5-2.6,7.5-4c0.2-0.1,0.3-0.2,0.5-0.2c0.5-0.2,0.5-0.5,0.3-1   c-0.6-1.3-1.2-2.5-1.8-3.8c-1.2-2.5-2.3-5-3.5-7.6c-0.4-0.9-0.8-1.7-1.2-2.5c-1.5-3.2-2.9-6.3-4.3-9.5c-1.3-2.9-2.6-5.9-3.8-8.9   c-0.8-2-1.5-4-2.3-6c-0.5-1.2-0.9-2.4-1.5-3.6c-0.3-0.6-0.3-1.1-0.2-1.6c0.1-0.3,0.3-0.5,0.3-0.7c0.3-2.4,1.6-4.3,2.9-6.3   c1.6-2.3,3.3-4.6,5-6.9c1.8-2.4,3.6-4.8,5.3-7.3c1.8-2.6,3.6-5.2,5.3-7.9c1.4-2.2,2.7-4.5,4.1-6.8c0.3-0.5,0.2-0.8-0.2-1.1   c-0.4-0.3-0.7-0.5-1.1-0.8c-1.5-1-3-2-4.6-3c-0.4,0.6-0.7,1.2-1,1.8c-0.8,1.4-1.6,2.9-2.5,4.3c-0.8,1.3-1.6,2.5-2.4,3.7   c-1.9,3.4-4.2,6.5-6.2,9.8c-2.1,3.5-4.3,7-6.6,10.5c-0.8,1.3-1.9,2.5-2.8,3.8c-0.4,0.6-0.9,1.1-1.3,1.7c-0.5,0.6-1,1.3-1.9,1.1   c-0.1,0-0.3,0-0.4,0.1c-1.3,0.9-2.8,0.9-4.3,0.9c-2,0-4,0-6,0c-0.8,0-1.5-0.1-2.2-0.6c-0.3-0.2-0.7-0.2-1-0.3   c-0.8-0.2-1.3-0.7-1.4-1.5c-0.1-1.5-0.3-3-0.3-4.6c-0.1-2.6,0-5.3-0.1-7.9c0-1.1-0.1-2.2-0.1-3.4c0-4.8,0.1-9.7,0.1-14.5   c0-2.5,0-5,0-7.5c0-1.4,0-7.3-0.1-8.6c0-0.9-0.1-1-1-1c-0.8,0-1.5,0.2-2.3,0.2c-1.7,0-3.5,0-5.2,0c-0.6,0-1.3-0.2-1.9-0.3   c0,0.1-0.1,0.2,0,0.2c1.4,1.3,1.3,7.6,1.6,9.2c0.5,3.4,0.2,6.8,0,10.2c-0.2,3.2,0.1,6.4,0.2,9.7c0.1,2.6-0.1,5.2-0.2,7.8   c-0.1,1.8-0.4,3.5-0.3,5.3c0.1,1.7-0.1,3.5-0.1,5.2c0,2.6,0,5.1-0.1,7.7c-0.2,4.6-0.4,9.1-0.6,13.7c0,0.3-0.1,0.6-0.1,0.9   c-0.1,7.1-0.2,14.2-0.3,21.4c0,3.1,0.2,6.2,0.3,9.3c0,0.1,0,0.2,0,0.3c0.1,1.3,0.1,1.2,1.3,1.2c1.6-0.1,3.2-0.1,4.8-0.1   c0.5,0,1,0.1,1.5,0.1c0.6,0,1.3,0,1.9,0c0.6-0.1,0.8-0.4,0.8-1c-0.3-4-0.4-8-0.4-12.1c0-1.5,0.2-2.9,0.2-4.4c0-1.7,0-3.5,0-5.2   c0-1.6,0-3.2,0-4.8c0-3.5,0-7,0.1-10.5c0-1,0.1-2.1,0.2-3.1c0-0.5,0-1.1,0-1.6c0-0.3,0.1-0.6,0.2-0.9c0.2-0.4,0.5-0.7,1-0.3   c0.4,0.3,0.9,0.3,1.2,0c0.4-0.3,0.9-0.3,1.4-0.3c1.4,0.1,2.9,0.1,4.3,0c1,0,2-0.2,3.1-0.2c0.5,0,1.1,0.4,1.6,0.4   c0.5,0,1-0.3,1.6-0.2c0.8,0.1,1.4,0.5,1.8,1.2c0.8,1.6,1.7,3.2,2.4,4.8c1.6,3.4,3.1,6.7,4.6,10.2c0.9,2.1,1.5,4.2,2.3,6.3   c0.9,2.4,1.7,4.8,2.6,7.2c1.4,3.6,2.7,7.2,4.1,10.8c0.3,0.7,0.6,1.5,0.9,2.2c0.2,0.6,0.1,1-0.5,1.4c-0.3,0.1-0.5,0.4-0.6,0.7   c-0.4,0.7-0.6,0.7-1.3,0.3c-0.5-0.3-0.8-0.7-0.8-1.3c-0.1-0.5-0.1-1-0.3-1.4c-1.6-3.9-3.3-7.8-4.9-11.8c-0.6-1.5-1-3.1-1.6-4.6   c-0.9-2.6-2-5.2-2.9-7.8c-1.3-4.1-3.1-7.9-4.9-11.8c-0.4-0.9-0.8-1.8-1.1-2.7c-0.3-0.9-0.9-1.1-1.8-1.1c-2,0.1-4,0.3-6,0.3   c-1.1,0-2.1-0.1-3.3-0.1c0,0.4-0.1,0.8-0.1,1.2c0,2.7,0,5.4,0,8c0,1.1,0.1,2.2,0.1,3.4c0,1.2,0.1,2.3,0.1,3.5c0,4.8,0,9.6,0,14.3   c0,2.6,0,5.3-0.1,7.9c0,0.5,0.1,1.1,0.1,1.6c0,0.8,0.1,1.5-0.6,2.1c-0.3,0.2-0.4,0.6-0.5,0.9c-0.3,0.7-0.8,1-1.5,1.1   c-1,0.1-1.9,0.3-2.9,0.1c-2.1-0.4-4.3-0.1-6.4-0.1c-0.7,0-1.3,0-2,0c-1.2-0.1-2.6-1.6-2.7-3c-0.1-1.8-0.2-3.6-0.3-5.4   c-0.1-3.4-0.2-6.9-0.2-10.3c0-4.5,0.2-9,0.4-13.5c0.1-3.1,0.3-6.2,0.4-9.3c0.1-4.8,0.2-9.6,0.3-14.4c0-0.6,0.1-1.2,0.1-1.9   c0-1.8,0.1-3.7,0.1-5.5c0.1-2,0.2-3.9,0.3-5.9c0.1-3,0.1-6,0.2-9c0.1-3,0.1-6.1,0.2-9.1c0-1.8,0.2-3.6,0.1-5.5   c-0.1-2.6-0.5-9.7-0.2-12.4c0-0.4-0.1-0.8-0.2-1.2c0.8-0.4,1.6-0.7,2.6-0.8c2.7-0.3,5.4-0.2,8.2-0.4c1.6-0.2,2.7,0.8,3.8,1.5   c0,0.2,0.1,0.3,0,0.3c-0.5,0.7-0.5,1.4-0.3,2.3c0.5,2.7,0.6,9.9,0.8,12.6c0.4,3.9,0.1,7.9,0.2,11.8c0.1,4.1,0.1,8.1,0.2,12.2   c0,2.9,0.1,5.8,0.1,8.7c0,0.5,0.2,0.7,0.7,0.7c2.5-0.1,5,0,7.5-0.2C152.8,101.5,153.6,101.8,154.6,102z"></path>
	<path style="fill:#162B54;" d="M118.8,105.2c-0.3,4-0.4,8-0.8,11.9c-0.5,5.4-2,10.6-4.1,15.7c-0.4,1-0.7,2.1-1.1,3.2   c-1,2.7-2.7,5.1-4.4,7.5c-2.2,3.2-4.8,5.9-7.8,8.3c-1.5,1.2-3.2,2.1-5,2.9c-1.7,0.8-3.5,1.4-5.2,2.1c-0.6,0.2-1.2,0.5-1.7,0.7   c-2.8,1.2-5.7,1.6-8.6,1.7c-0.4,0-0.9,0.1-1.3,0.1c-2.6,0.4-5.3,0.3-7.9-0.4c-4-1-7.8-2.4-11.3-4.6c-2.5-1.6-4.9-3.4-7.2-5.2   c-1.2-0.9-2.1-2.2-3.1-3.4c-1.4-1.7-2.8-3.5-4-5.4c-1.1-1.6-1.8-3.5-2.5-5.4c-1.6-4.3-2.5-8.8-3.3-13.3c-0.5-3.1-0.8-6.3-1.2-9.5   c-0.1-1.1-0.3-2.2-0.4-3.3c-0.2-4.2-0.3-8.4-0.5-12.6c-0.1-4.1,0.6-8.2,1.5-12.2c1.3-5.8,3.5-11.3,6.6-16.3   c1.9-3.1,4.1-5.9,6.7-8.5c1.1-1.1,2.1-2.2,3.2-3.3c1.2-1.2,2.3-2.3,3.5-3.5c0,0,0.1-0.1,0.1-0.1c3.5-2.7,7.1-5.1,11.4-6.4   c2-0.6,3.9-1.2,5.9-1.6c0.8-0.2,1.7-0.3,2.5-0.3c4-0.1,8,0.3,11.8,1.4c1.5,0.4,2.9,0.9,4.3,1.4c0.4,0.1,0.7,0.3,1.1,0.6   c1.3,0.8,2.6,1.7,4,2.5c0.2,0.1,0.3,0.2,0.4,0.3c2.7,2.7,5.5,5.4,7.5,8.8c2.3,3.8,4,7.9,5.6,12.1c1.6,4.2,2.9,8.5,3.6,12.9   c0.3,1.9,0.4,3.9,0.7,5.9c0.1,1.1,0.4,2.1,0.4,3.2c0.2,3,0.4,6.1,0.2,9.1c-0.1,1,0.1,2,0.1,3C118.7,105.2,118.7,105.2,118.8,105.2z    M114.9,106C114.8,106,114.8,106,114.9,106c-0.1-1.2,0-2.4-0.1-3.6c-0.1-2.7-0.2-5.4-0.3-8.2c-0.1-3.3-0.4-6.6-1.2-9.8   c-0.9-3.9-1.5-7.9-3-11.7c-0.7-1.7-1.3-3.5-2.1-5.2c-1.1-2.5-2.4-5-3.8-7.4c-1.3-2.5-3.2-4.5-5.1-6.5c-1.3-1.3-3-2.1-4.5-3.1   c-1.1-0.7-2.2-1.3-3.5-1.8c-3.7-1.3-7.6-1.8-11.5-2c-1.3-0.1-2.5,0.1-3.7,0.5c-0.3,0.1-0.5,0.2-0.8,0.2c-2.7,0.2-5,1.7-7.3,2.8   c-1.4,0.7-2.7,1.6-3.9,2.5c-1.5,1-3,2-4.3,3.2c-3.9,3.5-7.4,7.5-10.5,11.9c-1.3,1.9-2.4,4-3.4,6.1c-0.9,1.9-1.6,3.9-2.3,5.9   c-0.5,1.3-0.8,2.6-1.1,4c-0.3,1.2-0.3,2.5-0.7,3.7c-0.8,2.4-1.1,4.8-1.2,7.3c-0.2,3.2-0.1,6.4,0.1,9.7c0.1,3.1,0.4,6.2,0.7,9.2   c0.3,3,0.6,6,1.1,8.9c0.3,2,0.8,3.9,1.3,5.9c0.6,2.5,1,5.2,2.3,7.5c0.9,1.7,1.9,3.2,3.2,4.7c0.9,1,1.8,1.9,2.6,2.9   c1.7,2.1,3.6,4,5.7,5.7c3.5,2.6,7.2,4.7,11.4,6.3c3,1.1,6.1,1.4,9.2,1.6c0.6,0,1.3-0.1,1.9-0.2c3.1-0.5,6-1.4,8.9-2.6   c3.6-1.5,7.1-3.2,10.3-5.4c0.3-0.2,0.6-0.4,0.9-0.6c1.1-1,2.2-2,3.2-3.1c1-1.1,1.9-2.4,2.8-3.6c0.5-0.6,0.9-1.3,1.3-2   c0.2-0.3,0.5-0.6,0.7-1c1.1-2,2.3-4,2.9-6.3c0.6-2.6,1.6-5.1,2.2-7.7c0.6-2.4,1-4.9,1.3-7.4c0.3-2.4,0.4-4.8,0.5-7.2   C114.9,108.7,114.9,107.3,114.9,106z"></path>
	<path style="fill:#162B54;" d="M15.5,63.5c-1,0.8-1.8,1.4-2.5,2c-0.8,0.7-1.6,1.2-2.7,1.4c-0.7,0.1-1.1,0-1.5-0.8   c-1.6-3-3.2-5.9-4.8-8.8c-0.3-0.5-0.2-0.8,0.2-1.2c2.4-2.4,5.1-4.4,7.6-6.8c0.8-0.7,1.6-1.4,2.4-2.1c0.3-0.3,0.8-0.7,1.1-0.6   c1.4,0.2,2.5-0.6,3.8-0.8c1.2-0.1,2.4-0.2,3.6,0c1.1,0.2,2.1,0.2,3.2-0.1c0.9-0.3,1.8-0.1,2.4,0.7c0.1,0.1,0.2,0.2,0.2,0.3   c-0.2,0.9,0.6,1.4,0.8,2c0.3,0.7,0.6,1.5,0.6,2.3c0,1.6-0.1,3.3-0.2,5c0,0.2,0,0.4,0,0.5c-0.1,3.3-0.2,6.5-0.3,9.8   c-0.1,2.8-0.1,5.6-0.1,8.5c0,0.8-0.1,1.7-0.2,2.5c-0.1,1.4-0.1,2.9-0.1,4.3c0,1.3,0,2.5,0,3.8c0,1.3,0,2.6,0,3.9   c0,2.1-0.1,4.1-0.1,6.2c-0.1,5.7-0.1,11.5-0.1,17.2c0,2.1,0.1,4.3,0.2,6.4c0,1.8,0.1,3.6,0.1,5.3c0,2.4-0.1,4.7-0.1,7.1   c0,2.7,0.3,5.4,0.2,8c-0.1,3.2-0.3,6.3-0.5,9.5c-0.1,2.4-0.2,4.8-0.4,7.2c-0.1,1.1-0.5,1.8-1.5,2c-0.7,0.1-1.4,0.3-2.1,0.2   c-2-0.3-4-0.3-6-0.2c-1.2,0.1-2-0.5-3-1c-0.3-0.1-0.6-0.5-0.2-1c0.4-0.4,0.2-1.1-0.2-1.5c-0.5-0.5-0.6-1.2-0.6-1.9   c0-2.5,0.1-4.9,0.1-7.4c0-2.2,0-4.5,0-6.7c0-3.7,0.1-7.3,0-11c0-1.6-0.2-3.2-0.2-4.8c-0.1-3.6-0.1-7.2-0.2-10.7   c0-1.3-0.1-2.5-0.1-3.8c0-0.8,0.2-1.6,0.2-2.4c0-2,0-3.9,0.1-5.9c0.1-3.8,0.3-7.6,0.4-11.4c0.1-2.5,0.1-5,0.1-7.5   c0.1-4.3,0.1-8.5,0.2-12.8C15.4,67,15.5,65.4,15.5,63.5z M25.2,155.7c0-0.5,0.1-0.8,0.1-1.1c0.1-4.2,0.2-8.3,0.3-12.5   c0.1-2.4,0.2-4.7,0.2-7.1c0-2.8-0.1-5.6-0.1-8.3c0-3.7-0.1-7.3-0.1-11c0-4.4-0.1-8.8,0-13.2c0-2.3,0.2-4.7,0.2-7   c0-1.4-0.2-2.8-0.1-4.2c0.1-3.4,0.3-6.8,0.4-10.2c0.1-3,0.2-5.9,0.3-8.9c0-1.9,0-3.8,0.1-5.6c0.1-3.5,0.3-7,0.5-10.5   c0.1-2.3,0.2-4.6,0.3-6.8c0-0.3-0.1-0.6-0.1-0.8c-0.9,0-1.7,0-2.5,0c-1.3,0-2.6-0.1-3.9-0.1c-1,0-2.1,0.1-3.1,0   c-0.7-0.1-1.1,0-1.4,0.6c-0.2,0.3-0.5,0.5-0.8,0.7c-2,1.7-4,3.3-6,5c-0.9,0.8-1.9,1.5-2.9,2.2c1.4,2.4,2.9,4.7,4.3,7.1   c0.3-0.2,0.6-0.4,0.8-0.6c1-0.7,1.9-1.5,2.9-2.2c1-0.7,1.6-0.6,2.3,0.3c0.3,0.4,0.5,1,1.2,1c0.1,0,0.2,0.3,0.3,0.4   c0.1,0.9,0.2,1.8,0.2,2.7c0,3,0.1,6.1,0.1,9.1c0,1.3,0.1,2.7,0.1,4c0,2.5-0.1,4.9-0.1,7.4c-0.1,3-0.2,5.9-0.3,8.9   c-0.1,3.6-0.1,7.2-0.2,10.7c0,2.5-0.1,5-0.1,7.5c0,3,0.2,6.1,0.2,9.1c0,3.3,0.4,6.5,0.2,9.8c-0.2,2.6,0,5.3,0,7.9   c0,3-0.1,6.1-0.1,9.1c0,1.7-0.1,3.5,0,5.2c0,1.1,0.1,1.1,1.2,1.1c1.1,0,2.2,0,3.4,0.1C23.6,155.6,24.4,155.6,25.2,155.7z"></path>
	<path style="fill:#162B54;" d="M108.3,100.7c0,3.4,0,6.8,0,10.2c0,1.4-0.3,2.8-0.4,4.3c-0.1,3.5-0.9,6.9-2,10.3c-0.7,2-1.4,4-2.4,6   c-0.7,1.4-1.4,2.9-2.1,4.4c-1,2.1-2.5,3.7-4.2,5.2c-0.7,0.6-1.2,1.3-2,1.8c-1.2,0.8-2.5,1.6-3.9,2.2c-2.7,1.2-5.5,2.2-8.4,2.8   c-1.6,0.3-3.3,0.3-4.9,0.2c-4.2-0.2-8.3-1.2-12.1-3.1c-2-1-4.1-1.9-5.8-3.3c-2.4-1.9-4.5-4-5.9-6.9c-0.9-1.9-1.9-3.7-2.7-5.7   c-1.2-3.2-2.2-6.5-2.4-10c-0.1-2.2-0.5-4.4-0.7-6.7c-0.1-1.3-0.2-2.7-0.2-4c-0.1-2.5-0.2-5.1-0.1-7.6c0.2-2.7,0.6-5.4,1-8.1   c0.6-3.3,1.3-6.6,1.9-9.9c0.5-2.3,1.5-4.3,2.6-6.3c2-3.7,4.3-7.4,7.2-10.5c1.4-1.5,2.9-2.9,4.6-4.1c1.9-1.4,3.9-2.5,6-3.6   c2.4-1.2,4.9-2,7.6-2.2c3.3-0.2,6.5,0,9.7,1c1.7,0.5,3.2,1.3,4.3,2.6c1.6,1.8,3.3,3.5,4.9,5.4c1.4,1.7,2.4,3.7,3.4,5.8   c0.5,1,1,2,1.4,3c1.8,3.8,3.2,7.7,4,11.8c0.6,2.8,1,5.7,1.3,8.6C108.3,96.4,108.3,98.6,108.3,100.7   C108.3,100.7,108.3,100.7,108.3,100.7z M77.9,145.7c0.7,0,1.3,0,2,0c3.2,0.2,6.2-1,9.1-2c0.2-0.1,0.5-0.3,0.7-0.4   c1.2-0.8,2.4-1.6,3.6-2.4c0.6-0.4,1.2-0.8,1.7-1.3c1.3-1.4,2.7-2.6,3.6-4.3c0.6-1,1.3-2,1.7-3.2c0.9-2.5,1.9-4.9,2.6-7.5   c0.8-2.5,1.5-5,1.8-7.6c0.1-0.6,0.1-1.2,0.1-1.7c0.1-1.4-0.1-2.9,0.2-4.3c0.4-1.5,0.2-3,0.2-4.5c0-0.7,0-1.4,0-2.1c0-0.5,0-1,0-1.5   c-0.1-1.7-0.1-3.5-0.2-5.2c-0.1-1.7-0.1-3.5-0.3-5.2c-0.3-3.2-0.9-6.4-1.7-9.5c-0.9-3.8-2.3-7.4-4-10.9c-0.8-1.7-1.7-3.4-2.9-5   c-0.6-0.8-1.5-1.4-2.1-2.2c-1.2-1.5-2.6-2.7-4-4c-1.8-1.7-4-2.4-6.4-2.3c-0.7,0-1.3,0.1-2,0.1c-4.4,0.1-8.6,1.3-12.4,3.6   c-3.2,1.9-6,4.3-8.1,7.4c-0.9,1.3-1.7,2.5-2.4,3.8c-1.2,2-2.3,3.9-3.3,6c-0.8,1.6-1.5,3.3-1.9,5c-0.8,3.3-1.3,6.7-1.8,10   c-0.7,4.3-1.4,8.6-1.1,12.9c0.1,1.3,0,2.7,0.2,4c0.2,1.5,0.5,3,0.7,4.5c0.2,1.7,0.4,3.5,0.6,5.2c0.3,2.5,0.7,5,1.8,7.4   c2.1,4.5,4.7,8.6,8.5,11.7c1.1,0.9,2.3,1.7,3.6,2.3c1.1,0.6,2.3,1,3.5,1.4c2.3,1,4.7,1.7,7.3,1.6C77.2,145.7,77.5,145.7,77.9,145.7   z"></path>
</g>
</svg></div>
															
															<script type="text/template" id="Training10K_template">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg" data-bf-svg data-url="/images/shoefinder-new/10k.svg" data-bf-stepped-animation  data-active-screens="Training"></div>
														</script>
														</div>
														<div class="bf-media-button__text" id="training_2Label">10k</div>
													</div>
												</div>
											</div>
							
										
											
												<div class="bf-grid__col-1-2 bf-grid__col-1-3-tablet-up bf-training-screen__transition-group-5">
													


	  <!--  option [object Object] -->
	  <!--  valueOverride 3 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="training" value="3" id="training_3" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="training_3Label" class="bf-media-button bf-media-button--aspect bf-media-button--aspect-square" data-bf-input-button="" data-input-id="training_3" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Training" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="3" data-gtm-screen-title="Training" data-gtm-question-category="Demographics" data-gtm-user-response="Half Marathon" data-gtm-question="What are you training for?" tabindex="3">
											
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg bf-media--loaded" data-bf-svg="" data-url="/images/shoefinder-new/13_1.svg" data-bf-stepped-animation="" data-active-screens="Training"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img">
<title>Half Marathon</title>
<g id="Fills1">
	<path style="fill:#ABC0DE;" d="M113.2,68.7c-0.3-0.1-0.5-0.2-0.6-0.2c-2,0-4-1-6.1-1.1c-1.2,0-2.4-0.1-3.6-0.2   c-1.1-0.1-2.2-0.1-3.3-0.1C96.4,67,93.2,67,90,67.2c-2,0.1-4,0-6.1,0c-1.7,0-3.3,0.1-5,0.1c-1.6,0-3.2,0-4.9,0.1   c-1,0.1-1.5-0.7-2.3-1.1c-0.6-0.3-0.6,0.1-0.7-0.4C71.1,65.3,71,64.6,71,64c-0.1-1.8-0.1-3.6-0.1-5.5c0-1.3,0-2.5-0.1-3.8   c0-0.2,0-0.3,0-0.5c0.1-1.3,0.7-2.4,1.9-1.8c0.1,0,0.1,0.1,0.3,0.1c0.4-0.7,1-0.1,1.9,0c1.9,0,3.7-0.1,5.6-0.2   c0.7,0,1.5-0.1,2.2-0.1c3.4-0.1,6.8-0.2,10.2-0.3c3.4-0.1,6.9,0,10.3-0.1c2.5,0,5.1-0.2,7.6-0.3c2.7-0.1,5.5-0.1,8.2-0.2   c2.6,0,5.3,0,7.9-0.1c1.5,0,3-0.1,4.5-0.2c1,0,1.9,0,2.9,0.1c1.3,0.1,2.1,0.8,2.1,2.1c0.1,2.3,0.1,4.5,0.1,6.8c0,1.6,0,3.2-0.1,4.9   c0,0.9-0.1,1.9-0.1,2.8c0,0.6-0.3,1-0.7,1.4c-1.5,1.5-3.2,2.7-5,3.8c-0.6,0.4-1.2,0.7-1.7,1.1c-1.6,1.5-3.5,2.6-5.3,3.8   c-3.4,2.2-6.7,4.6-10.1,6.8c-2.1,1.4-4.2,2.7-6.3,4.1c-0.4,0.2-0.7,0.5-1.2,0.9c0.5,0.1,0.8,0.2,1.1,0.1c2-0.3,4,0,6,0.1   c0.9,0.1,1.8,0.4,2.7,0.6c4.3,1.1,8.1,3.3,11.8,5.8c0.2,0.2,0.5,0.3,0.7,0.5c1.5,0.9,2.5,2.2,3.4,3.7c0.3,0.4,0.6,0.9,0.9,1.3   c1.4,1.6,2.5,3.4,3.3,5.3c0.7,1.7,1.4,3.4,2.1,5.2c0.4,1,0.5,2,0.7,3.1c0.8,3.5,0.9,7.1,0.7,10.6c-0.1,1.3-0.2,2.6-0.3,3.9   c-0.1,0.6-0.3,1.3-0.5,1.9c-0.4,1.3-0.9,2.6-1.4,3.9c-0.4,1-0.8,1.9-1.4,2.8c-1.1,1.7-2.2,3.4-3.4,5c-1.8,2.4-4,4.5-6.3,6.4   c-1.5,1.2-3.2,2.3-4.8,3.3c-2,1.3-4,2.5-6.2,3.4c-3,1.2-5,1.4-8.3,1.6c-2.4,0.1-4.7,0.4-7.1,0.3c-1.7,0-3.5-0.1-5.1-0.7   c-1.2-0.4-2.5-0.4-3.7-0.8c-2.1-0.6-4.3-1.2-6.4-2c-1.5-0.6-3.9-0.6-5.3-1.4c-1-0.6-2-1.4-3-2c-0.3-0.2-0.7-0.3-0.9-0.6   c-1.6-1.9-3.7-3.1-5.2-5.1c-0.8-1-1.8-1.8-2.5-2.9c-0.8-1.1-1.7-2.2-2.4-3.3c-0.4-0.5-0.6-1.1-0.8-1.7c-0.6-1.3-1.6-2.4-1.7-4   c0-0.2-0.2-0.3-0.3-0.5c-0.8-1.2-0.5-2.1,0.7-2.8c0.3-0.2,0.7-0.3,0.9-0.6c1-1,2.3-1.6,3.5-2.2c0.3-0.2,0.6-0.4,0.9-0.6   c0.6-0.3,1.1-0.7,1.7-0.9c0.3-0.1,0.7-0.2,1.1-0.1c1.3,0.5,2.5,1,3,2.4c1.2,2.9,2.9,5.4,4.8,7.9c0.6,0.7,1.2,1.4,1.9,2   c0.8,0.8,1.6,1.5,2.4,2.2c1.5,1.4,3.3,2.3,5.2,3.1c0.7,0.3,1.3,0.6,2,0.9c0.4,0.2,0.8,0.3,1.1,0.4c0.2,0,0.3,0,0.5,0.1   c2.5,0.9,5,0.6,7.6,0.8c1.5,0.1,2.9-0.1,4.4-0.1c2.1,0,4-0.5,5.9-1.4c3.1-1.5,6-3.3,8.3-5.8c2.1-2.2,4-4.5,5.5-7.1   c1-1.7,1.5-3.3,1.6-5.2c0-1,0.2-1.9,0.3-2.9c0.4-3.9-0.2-7.7-1.8-11.3c-0.6-1.4-1.6-2.7-2.5-4c-0.2-0.3-0.6-0.6-0.9-0.8   c-1.2-0.8-2.5-1.6-3.8-2.4c-3.1-2.1-6.5-4.6-10.2-5.2c-1.6-0.3-3.3-0.6-4.9-0.8c-2.6-0.4-5.2-0.4-7.7,0.1c-1.5,0.3-2.9,1-4.4,1.3   c-1.3,0.3-2.5,1.1-3.9,1.3c-1.2,0.1-2.2,0.9-3-0.1c-1.1-1.2-2.1-2.3-3-3.6c-0.6-0.8-1.2-1.6-1.8-2.4c-0.5-0.8-0.6-1.7,0.4-2.1   c0.7-0.3,1.2-1,1.8-1.4c1.5-1.1,2.9-2.3,4.5-3.2c3.3-2,6.5-4.3,9.6-6.6c1.5-1.1,3.1-2.2,4.6-3.3c0.9-0.6,1.7-1.3,2.6-2   c2.4-1.7,4.9-3.4,7.4-5.1C109.9,71.1,111.5,69.9,113.2,68.7z"></path>
	<path style="fill:#ABC0DE;" d="M43.7,68.4c-0.5-0.1-0.7,0.3-1,0.5c-0.6,0.5-1.2,1.1-1.9,1.6c-0.3,0.2-0.5,0.4-0.8,0.5   c-1.4,0.6-1.9,0.4-2.6-0.9c-1-1.9-2-3.9-3-5.9c-0.4-0.8-0.8-1.5-1.2-2.3c-0.2-0.4-0.1-0.7,0.2-1c2.2-2.3,4.7-4.3,7-6.5   c0.7-0.7,1.5-1.4,2.3-2.1c0.3-0.3,0.7-0.6,1-0.6c1.4,0.2,2.6-0.8,4-0.7c1.4,0.1,2.8,0.2,4.2,0.3c1,0.1,2,0.1,2.9,0.2   c0.9,0.1,0.9,0.1,1,1c0,0.2,0.1,0.5,0.2,0.6c0.8,0.9,1,2,1,3.2c0,3.2-0.1,6.4-0.2,9.5c-0.1,3.9-0.2,7.8-0.3,11.7   c0,1.5-0.2,3.1-0.2,4.6c0,1.5,0,2.9,0,4.4c0,0.8-0.1,1.6-0.1,2.4c0,1.2,0,2.4-0.1,3.7c0,1.4-0.1,2.9-0.1,4.3   c0,5.4,0.1,10.9-0.1,16.3c-0.1,3.8,0.2,7.6,0.2,11.4c0,2.7-0.1,5.5-0.1,8.2c0,1.3,0.2,2.5,0.2,3.8c-0.1,4.2-0.2,8.4-0.3,12.6   c-0.1,2.6-0.3,5.2-0.5,7.8c0,0.6,0.1,1.4-0.5,1.7c-0.7,0.5-1.6,0.9-2.5,0.8c-0.5-0.1-1-0.2-1.6-0.2c-1.5-0.1-2.9-0.2-4.4-0.1   c-1.1,0.1-1.8-0.6-2.7-1c-0.2-0.1-0.4-0.4-0.2-0.7c0.5-0.5,0.2-1.1-0.1-1.5c-0.4-0.5-0.5-1.1-0.5-1.7c0-2.4,0-4.8,0.1-7.2   c0-1.5,0-3,0-4.5c0-1.8,0.1-3.6,0-5.4c-0.2-4.1,0.1-8.2-0.2-12.2c-0.2-3.3-0.1-6.5-0.2-9.8c0-0.6-0.1-1.1-0.1-1.7   c0-0.6-0.1-1.2,0-1.8c0.1-2.1,0.2-4.2,0.2-6.2c0.1-4.3,0.3-8.7,0.4-13c0.1-3,0.1-6,0.1-9.1c0.1-3.4,0.1-6.8,0.2-10.2   C43.6,71.5,43.7,70,43.7,68.4z"></path>
	<path style="fill:#ABC0DE;" d="M171.3,67.8c-0.9,0.7-1.6,1.3-2.2,1.9c-0.7,0.7-1.5,1.2-2.6,1.3c-0.6,0-1,0-1.3-0.6   c-1.1-2.2-2.2-4.3-3.3-6.4c-0.4-0.7-0.7-1.5-1.1-2.2c-0.3-0.5-0.2-0.8,0.2-1.2c2.9-2.9,6-5.6,9-8.4c0.3-0.3,0.6-0.6,1-0.7   c0.5-0.1,1.2,0.1,1.6-0.2c0.5-0.4,1.1-0.3,1.6-0.5c0.5-0.2,1.1-0.2,1.7-0.2c0.3,0,0.6,0,0.9,0c1.7,0.1,3.5,0.3,5.2,0.4   c0.9,0.1,1,0.2,1.2,1.1c0.1,0.3,0.2,0.6,0.3,0.9c0.6,0.7,0.9,1.6,0.9,2.5c0,1.6,0,3.2,0,4.8c0,1.1,0,2.3,0,3.4   c-0.1,2.6-0.2,5.1-0.3,7.7c0,2,0,4-0.1,6c0,1.3-0.2,2.6-0.2,3.9c-0.1,1.4-0.1,2.9-0.1,4.3c0,1,0,2,0,3c0,1.1,0,2.2-0.1,3.3   c0,1.8-0.1,3.6-0.1,5.4c0,5.3,0,10.5,0,15.8c0,2.5,0,5,0,7.5c0,2.2,0.1,4.3,0.1,6.5c0,2.4,0.1,4.7,0.1,7.1c0,2.4,0.1,4.9,0.1,7.3   c0,2.2-0.2,4.3-0.3,6.5c-0.1,1.4-0.3,2.8-0.2,4.1c0.1,1.8-0.2,3.6-0.3,5.3c0,0.8-0.3,1.3-1.1,1.5c-0.7,0.3-1.4,0.5-2.1,0.3   c-1.9-0.4-3.7-0.3-5.6-0.2c-1.1,0.1-1.8-0.6-2.7-1c-0.3-0.2-0.4-0.5-0.1-0.8c0.3-0.4,0.2-0.9,0-1.2c-0.9-0.9-0.7-2.1-0.7-3.1   c0-2,0.1-4,0.1-6c0-4.3-0.1-8.7-0.1-13c0-2.1,0.1-4.2,0-6.4c-0.1-3.6-0.3-7.2-0.4-10.8c-0.1-1.7-0.2-3.4-0.1-5.1   c0.3-4,0.1-7.9,0.3-11.9c0.1-4.2,0.2-8.5,0.3-12.7c0.1-3.8,0.1-7.6,0.2-11.4C171.1,73.1,171.2,70.6,171.3,67.8z"></path>
	<path style="fill:#ABC0DE;" d="M162.7,145.8c-0.1,1.2-0.3,2.3-0.4,3.4c-0.1,1.1-1,1.8-1.5,2.7c-0.9,1.5-2.3,2.4-3.8,3.3   c-1.8,1-3.6,1.6-5.6,1c-1.2-0.4-2.5-0.7-3.5-1.4c-1.7-1.3-3.6-2.6-4.6-4.6c-0.5-1.1-0.7-2.3-1-3.5c-0.5-2.1,0-4.1,0.8-6.1   c0.2-0.6,0.7-1.1,1.2-1.5c0.9-0.8,1.8-1.6,2.8-2.4c1.5-1.2,3.2-1.6,5.1-1.6c2.2,0.1,4.1,0.6,5.8,1.9c0.8,0.6,1.6,1.4,2.3,2.2   c1,1.3,1.8,2.7,2.1,4.4C162.5,144.3,162.6,145.1,162.7,145.8z"></path>
	<path style="fill:#FCBA25;" d="M142.8-8.5C144-7,156.1,4.6,157.2,8.2s-1.7,9.1-4.5,8.9c-2.8-0.3-6.1,0.1-6.1,0.1   s-16.3-16-14.8-16.6C133.3,0,142.8-8.5,142.8-8.5z"></path>
	<path style="fill:#FCBA25;" d="M186.5,169.3c6.9,2.2,25.2,2.8,25.8,4.7c0.6,1.9,1.9,14.8-6,14.5c-7.9-0.3-18.6-4.4-19.5-5.4   C185.9,182.2,186.5,169.3,186.5,169.3z"></path>
	<path style="fill:#FCBA25;" d="M52.3,187.8c6.3-3.9-0.4-5.3,3.3-7.7s15.6-10.4,17.7-6.4s3.8,17.6-0.9,18.6   c-4.7,1-15.4,2.5-16.7,0.9C54.4,191.4,52.3,187.8,52.3,187.8z"></path>
	<path style="fill:#FCBA25;" d="M-74.1,83.8c21.9,1.6-3-0.2,18.9,1.1c18.2,1.1,13.5,5.2,31.6,6.9c13.5,1.3,27.1-1.2,40.4-3.6   c-3.5,3.5-3.4,6.9-6.9,10.4c4.2,1.4,5,2.9,9.2,4.4c-4.2,3.1-6.7,5.7-11.3,8.2c4.8,0.8,7.6,1.8,12.4,2.5c-4.9,3.6-9.4,8-14.9,10.7   c4.1,1.9,7.4,2.6,11.5,4.5c-17.3,5.2-35.8,3.9-53.8,2.5c-12-1-30.6-0.1-32.6-5.4c-1.5-4.1-5.2-25.4-5.8-27.8   C-75.7,95.8-74.1,83.8-74.1,83.8z"></path>
</g>
<g id="Fills2">
	<path style="fill:#ABC0DE;" d="M115.2,66.6c-0.3-0.1-0.5-0.2-0.6-0.2c-2,0-4-0.1-6.1-0.1c-1.2,0-2.4-0.1-3.6-0.2   c-1.1-0.1-2.2-0.1-3.3-0.1c-3.2-0.1-6.4-0.1-9.6,0.1c-2,0.1-4,0-6.1,0c-1.7,0-3.3,0.1-5,0.1c-1.6,0-3.2,0-4.9,0.1   c-1,0.1-1.5-0.7-2.3-1.1c-0.6-0.3-0.6-0.8-0.7-1.3c-0.1-0.6-0.1-1.2-0.1-1.8c-0.1-1.8-0.1-3.6-0.1-5.5c0-1.3-1.1-1.3-1.1-2.6   c0-0.2,0-0.3,0-0.5c0-1.4,0-1.1,1.2-1.6c0.5,0,1.7-0.6,2.2-0.3c0.4-0.7,2.7,0,3.5,0c1.9,0,2.1,0,4-0.1c0.7,0,1.5-0.1,2.2-0.1   c3.4-0.1,6.8-0.2,10.2-0.3c3.4-0.1,6.9,0,10.3-0.1c2.5,0,5.1-0.2,7.6-0.3c2.7-0.1,5.5-0.1,8.2-0.2c2.6,0,5.3,0,7.9-0.1   c1.5,0,3-0.1,4.5-0.2c1,0,1.9,0,2.9,0.1c1.3,0.1,2.1,0.8,2.1,2.1c0.1,2.3-0.3,3.4-0.3,5.7c0,1.6,0,3.2-0.1,4.9   c0,0.9-0.1,1.9-0.1,2.8c0,0.6-0.3,1-0.7,1.4c-1.5,1.5-3.2,2.7-5,3.8c-0.6,0.4-1.2,0.7-1.7,1.1c-1.6,1.5-3.5,2.6-5.3,3.8   c-3.4,2.2-6.7,4.6-10.1,6.8c-2.1,1.4-4.2,2.7-6.3,4.1c-0.4,0.2-0.7,0.5-1.2,0.9c0.5,0.1,0.8,0.2,1.1,0.1c2-0.3,4,0,6,0.1   c0.9,0.1,1.8,0.4,2.7,0.6c4.3,1.1,8.1,3.3,11.8,5.8c0.2,0.2,0.5,0.3,0.7,0.5c1.5,0.9,2.5,2.2,3.4,3.7c0.3,0.4,0.6,0.9,0.9,1.3   c1.4,1.6,2.5,3.4,3.3,5.3c0.7,1.7,1.4,3.4,2.1,5.2c0.4,1,0.5,2,0.7,3.1c0.8,3.5,0.9,7.1,0.7,10.6c-0.1,1.3-0.2,2.6-0.3,3.9   c-0.1,0.6-0.3,1.3-0.5,1.9c-0.4,1.3-0.9,2.6-1.4,3.9c-0.4,1-0.8,1.9-1.4,2.8c-1.1,1.7-2.2,3.4-3.4,5c-1.8,2.4-4,4.5-6.3,6.4   c-1.5,1.2-3.2,2.3-4.8,3.3c-2,1.3-4,2.5-6.2,3.4c-3,1.2-6,2.4-9.3,2.6c-2.4,0.1-4.7,0.4-7.1,0.3c-1.7,0-3.5-0.1-5.1-0.7   c-1.2-0.4-2.5-0.4-3.7-0.8c-2.1-0.6-4.3-1.2-6.4-2c-1.5-0.6-2.9-1.6-4.3-2.4c-1-0.6-2-1.4-3-2c-0.3-0.2-0.7-0.3-0.9-0.6   c-1.6-1.9-3.7-3.1-5.2-5.1c-0.8-1-1.8-1.8-2.5-2.9c-0.8-1.1-1.7-2.2-2.4-3.3c-0.4-0.5-0.6-1.1-0.8-1.7c-0.6-1.3-1.6-2.4-1.7-4   c0-0.2-0.2-0.3-0.3-0.5c-0.8-1.2-0.5-2.1,0.7-2.8c0.3-0.2,0.7-0.3,0.9-0.6c1-1,2.3-1.6,3.5-2.2c0.3-0.2,0.6-0.4,0.9-0.6   c0.6-0.3,1.1-0.7,1.7-0.9c0.3-0.1,0.7-0.2,1.1-0.1c1.3,0.5,2.5,1,3,2.4c1.2,2.9,2.9,5.4,4.8,7.9c0.6,0.7,1.2,1.4,1.9,2   c0.8,0.8,1.6,1.5,2.4,2.2c1.5,1.4,3.3,2.3,5.2,3.1c0.7,0.3,1.3,0.6,2,0.9c0.4,0.2,0.8,0.3,1.1,0.4c0.2,0,0.3,0,0.5,0.1   c2.5,0.9,5,0.6,7.6,0.8c1.5,0.1,2.9-0.1,4.4-0.1c2.1,0,4-0.5,5.9-1.4c3.1-1.5,6-3.3,8.3-5.8c2.1-2.2,4-4.5,5.5-7.1   c1-1.7,1.5-3.3,1.6-5.2c0-1,0.2-1.9,0.3-2.9c0.4-3.9-0.2-7.7-1.8-11.3c-0.6-1.4-1.6-2.7-2.5-4c-0.2-0.3-0.6-0.6-0.9-0.8   c-1.2-0.8-2.5-1.6-3.8-2.4c-3.1-2.1-6.5-3.6-10.2-4.2c-1.6-0.3-3.3-0.6-4.9-0.8c-2.6-0.4-5.2-0.4-7.7,0.1c-1.5,0.3-2.9,1-4.4,1.3   c-1.3,0.3-2.5,1.1-3.9,1.3c-1.2,0.1-2.2-0.1-3-1.1c-1.1-1.2-2.1-2.3-3-3.6c-0.6-0.8-1.2-1.6-1.8-2.4C79,93.1,79,92.2,80,91.8   c0.7-0.3,1.2-1,1.8-1.4c1.5-1.1,2.9-2.3,4.5-3.2c3.3-2,6.5-4.3,9.6-6.6c1.5-1.1,3.1-2.2,4.6-3.3c0.9-0.6,1.7-1.3,2.6-2   c2.4-1.7,4.9-3.4,7.4-5.1C112,69,113.5,67.9,115.2,66.6z"></path>
	<path style="fill:#ABC0DE;" d="M44.8,66.3c-0.5-0.1,0.3,0.3,0,0.5c-0.6,0.5-1.2,1.1-1.9,1.6c-0.3,0.2-0.5,0.4-0.8,0.5   c-1.4,0.6-1.9,0.4-2.6-0.9c-1-1.9-2-3.9-3-5.9c-0.4-0.8-0.8-1.5-1.2-2.3c-0.2-0.4-0.1-0.7,0.2-1c2.2-2.3,5.2-3.4,7.5-5.7   c0.7-0.7,1.5-1.4,2.3-2.1c0.3-0.3,0.7-0.6,1-0.6c1.4,0.2,2.6-0.8,4-0.7c1.4,0.1,2.8,0.2,4.2,0.3c1,0.1,2,0.1,2.9,0.2   c0.9,0.1-0.1,0.1,0,1c0,0.2,0.1,0.5,0.2,0.6c0.8,0.9,1,2,1,3.2c0,3.2-0.6,5.5-0.7,8.7c-0.1,3.9-0.2,7.8-0.3,11.7   c0,1.5-0.2,3.1-0.2,4.6c0,1.5,0,2.9,0,4.4c0,0.8-0.1,1.6-0.1,2.4c0,1.2,0,2.4-0.1,3.7c0,1.4-0.1,2.9-0.1,4.3   c0,5.4,0.1,10.9-0.1,16.3c-0.1,3.8,0.2,7.6,0.2,11.4c0,2.7-0.1,5.5-0.1,8.2c0,1.3,0.2,2.5,0.2,3.8c-0.1,4.2-0.2,8.4-0.3,12.6   c-0.1,2.6,0.7,5.2,0.5,7.8c0.1-1.3-2.7,3.2-0.5,1.7c-0.7,0.5-1.6,0.9-2.5,0.8c-0.5-0.1-1-0.2-1.6-0.2c-1.5-0.1-2.9-0.2-4.4-0.1   c-1.1,0.1-1.8-0.6-2.7-1c-0.2-0.1-0.4-0.4-0.2-0.7c0.5-0.5-0.8-1.1-1.1-1.5c-0.4-0.5-0.5-1.1-0.5-1.7c0-2.4,0-4.8,0.1-7.2   c0-1.5,0-3,0-4.5c0-1.8,0.1-3.6,0-5.4c-0.2-4.1,0.1-8.2-0.2-12.2c-0.2-3.3,0.9-6.5,0.8-9.8c0-0.6-0.1-1.1-0.1-1.7   c0-0.6-0.1-1.2,0-1.8c0.1-2.1,0.2-4.2,0.2-6.2c0.1-4.3-0.7-8.7-0.6-13c0.1-3,0.1-6,0.1-9.1c0.1-3.4,0.1-6.8,0.2-10.2   C44.7,69.5,44.8,67.9,44.8,66.3z"></path>
	<path style="fill:#ABC0DE;" d="M173.4,65.7c-0.9,0.7-1.6,1.3-2.2,1.9c-0.7,0.7-1.5,1.2-2.6,1.3c-0.6,0-1,0-1.3-0.6   c-1.1-2.2-2.2-4.3-3.3-6.4c-0.4-0.7-0.7-1.5-1.1-2.2c-0.3-0.5-0.2-0.8,0.2-1.2c2.9-2.9,6-5.6,9-8.4c0.3-0.3,0.6-0.6,1-0.7   c0.5-0.1,1.2,0.1,1.6-0.2c0.5-0.4,1.1-0.3,1.6-0.5c0.5-0.2,1.1-0.2,1.7-0.2c0.3,0,0.6,0,0.9,0c1.7,0.1,2.4,2.3,4.2,2.4   c0.9,0.1,1,0.2,1.2,1.1c0.1,0.3,0.2,0.6,0.3,0.9c0.6,0.7,0.9,1.6,0.9,2.5c0,1.6,0,3.2,0,4.8c0,1.1,0,2.3,0,3.4   c-0.1,2.6-0.2,5.1-0.3,7.7c0,2,0,4-0.1,6c0,1.3-0.2,2.6-0.2,3.9c-0.1,1.4-0.1,2.9-0.1,4.3c0,1,0,2,0,3c0,1.1,0,2.2-0.1,3.3   c0,1.8-0.1,3.6-0.1,5.4c0,5.3,0,10.5,0,15.8c0,2.5,0,5,0,7.5c0,2.2,0.1,4.3,0.1,6.5c0,2.4,0.1,4.7,0.1,7.1c0,2.4,0.1,4.9,0.1,7.3   c0,2.2-0.2,4.3-0.3,6.5c-0.1,1.4-0.3,2.8-0.2,4.1c0.1,1.8-0.2,3.6-0.3,5.3c0,0.8-0.3,1.3-1.1,1.5c-0.7,0.3-1.4,0.5-2.1,0.3   c-1.9-0.4-2.7-2.3-4.6-2.2c-1.1,0.1-1.8-0.6-2.7-1c-0.3-0.2-0.4-0.5-0.1-0.8c0.3-0.4,0.2-0.9,0-1.2c-0.9-0.9-0.7-2.1-0.7-3.1   c0-2,0.1-4,0.1-6c0-4.3-0.1-8.7-0.1-13c0-2.1,0.1-4.2,0-6.4c-0.1-3.6-0.3-7.2-0.4-10.8c-0.1-1.7-0.2-3.4-0.1-5.1   c0.3-4,0.1-7.9,0.3-11.9c0.1-4.2,0.2-8.5,0.3-12.7c0.1-3.8,0.1-7.6,0.2-11.4C173.2,71,173.3,68.5,173.4,65.7z"></path>
	<path style="fill:#ABC0DE;" d="M164.8,143.7c-0.1,1.2-0.3,2.3-0.4,3.4c-0.1,1.1-1,1.8-1.5,2.7c-0.9,1.5-2.3,2.4-3.8,3.3   c-1.8,1-3.6,1.6-5.6,1c-1.2-0.4-2.5-0.7-3.5-1.4c-1.7-1.3-3.6-2.6-4.6-4.6c-0.5-1.1-0.7-2.3-1-3.5c-0.5-2.1,0-4.1,0.8-6.1   c0.2-0.6,0.7-1.1,1.2-1.5c0.9-0.8,1.8-1.6,2.8-2.4c1.5-1.2,3.2-1.6,5.1-1.6c2.2,0.1,4.1,0.6,5.8,1.9c0.8,0.6,1.6,1.4,2.3,2.2   c1,1.3,1.8,2.7,2.1,4.4C164.6,142.2,164.7,143,164.8,143.7z"></path>
	<path style="fill:#FCBA25;" d="M141.6-9.6c1.6,1.2,15.9,10.2,17.8,13.5c1.9,3.3,0.3,9.3-2.5,9.6s-8.4,3.9-8.4,3.9   s-16.8-15-15.6-15.9S141.6-9.6,141.6-9.6z"></path>
	<path style="fill:#FCBA25;" d="M188.4,167.4c6.9,2.2,25.2,2.8,25.8,4.7c0.6,1.9,1.9,14.8-6,14.5c-7.9-0.3-18.6-4.4-19.5-5.4   S188.4,167.4,188.4,167.4z"></path>
	<path style="fill:#FCBA25;" d="M53.8,187.1c5.8-4.6,0-6.4,3.7-8.9s15.6-10.4,17.7-6.4c1.7,3.2,1.4,16.7-0.9,17.4   c-4.6,1.5-15,4.3-16.5,2.8C56.2,190.5,53.8,187.1,53.8,187.1z"></path>
	<path style="fill:#FCBA25;" d="M-72,81.7c21.9,1.6-3-0.2,18.9,1.1c18.2,1.1,13.5,5.2,31.6,6.9C-8,90.9,5.6,88.5,19,86.1   C15.5,89.5,12,93,8.5,96.5c4.2,1.4,8.5,2.9,12.7,4.3c-4.2,3.1-8.7,5.9-13.2,8.5c4.8,0.8,9.6,1.5,14.3,2.3   c-4.9,3.6-10.2,6.8-15.6,9.6c4.1,1.9,8.2,3.8,12.3,5.6c-17.3,5.2-35.9,5.1-53.8,2.5c-11.6-1.7-28.6-3.6-32.6-5.4   c-3.9-1.8-5.2-25.4-5.8-27.8C-73.6,93.7-72,81.7-72,81.7z"></path>
</g>
<g id="Fills3">
	<path style="fill:#ABC0DE;" d="M113.2,66.6c-0.3-0.1-0.5-0.2-0.6-0.2c-2,0-4-0.1-6.1-0.1c-1.2,0-2.4-0.1-3.6-0.2   c-1.1-0.1-2.2-0.1-3.3-0.1c-3.2-0.1-6.4-0.1-9.6,0.1c-2,0.1-4,0-6.1,0c-1.7,0-3.3,0.1-5,0.1c-1.6,0-3.2,0-4.9,0.1   c-1,0.1-1.5-0.7-2.3-1.1c-0.6-0.3-0.6-0.8-0.7-1.3C71.1,63.2,71,62.6,71,62c-0.1-1.8-0.1-3.6-0.1-5.5c0-1.3,0-2.5-0.1-3.8   c0-0.2,0-0.3,0-0.5c0.1-1.3,0.7-1.6,1.9-0.9c0.1,0,0.1,0.1,0.3,0.1c0.4-0.7,1-0.9,1.9-0.9c1.9,0,3.7-0.1,5.6-0.2   c0.7,0,1.5-0.1,2.2-0.1c3.4-0.1,6.8-0.2,10.2-0.3c3.4-0.1,6.9,0,10.3-0.1c2.5,0,5.1-0.2,7.6-0.3c2.7-0.1,5.5-0.1,8.2-0.2   c2.6,0,5.3,0,7.9-0.1c1.5,0,3-0.1,4.5-0.2c1,0,1.9,0,2.9,0.1c1.3,0.1,2.1,0.8,2.1,2.1c0.1,2.3,0.1,4.5,0.1,6.8c0,1.6,0,3.2-0.1,4.9   c0,0.9-0.1,1.9-0.1,2.8c0,0.6-0.3,1-0.7,1.4c-1.5,1.5-3.2,2.7-5,3.8c-0.6,0.4-1.2,0.7-1.7,1.1c-1.6,1.5-3.5,2.6-5.3,3.8   c-3.4,2.2-6.7,4.6-10.1,6.8c-2.1,1.4-4.2,2.7-6.3,4.1c-0.4,0.2-0.7,0.5-1.2,0.9c0.5,0.1,0.8,0.2,1.1,0.1c2-0.3,4,0,6,0.1   c0.9,0.1,1.8,0.4,2.7,0.6c4.3,1.1,8.1,3.3,11.8,5.8c0.2,0.2,0.5,0.3,0.7,0.5c1.5,0.9,2.5,2.2,3.4,3.7c0.3,0.4,0.6,0.9,0.9,1.3   c1.4,1.6,2.5,3.4,3.3,5.3c0.7,1.7,1.4,3.4,2.1,5.2c0.4,1,0.5,2,0.7,3.1c0.8,3.5,0.9,7.1,0.7,10.6c-0.1,1.3-0.2,2.6-0.3,3.9   c-0.1,0.6-0.3,1.3-0.5,1.9c-0.4,1.3-0.9,2.6-1.4,3.9c-0.4,1-0.8,1.9-1.4,2.8c-1.1,1.7-2.2,3.4-3.4,5c-1.8,2.4-4,4.5-6.3,6.4   c-1.5,1.2-3.2,2.3-4.8,3.3c-2,1.3-4,2.5-6.2,3.4c-3,1.2-6,2.4-9.3,2.6c-2.4,0.1-4.7,0.4-7.1,0.3c-1.7,0-3.5-0.1-5.1-0.7   c-1.2-0.4-2.5-0.4-3.7-0.8c-2.1-0.6-4.3-1.2-6.4-2c-1.5-0.6-2.9-1.6-4.3-2.4c-1-0.6-2-1.4-3-2c-0.3-0.2-0.7-0.3-0.9-0.6   c-1.6-1.9-3.7-3.1-5.2-5.1c-0.8-1-1.8-1.8-2.5-2.9c-0.8-1.1-1.7-2.2-2.4-3.3c-0.4-0.5-0.6-1.1-0.8-1.7c-0.6-1.3-1.6-2.4-1.7-4   c0-0.2-0.2-0.3-0.3-0.5c-0.8-1.2-0.5-2.1,0.7-2.8c0.3-0.2,0.7-0.3,0.9-0.6c1-1,2.3-1.6,3.5-2.2c0.3-0.2,0.6-0.4,0.9-0.6   c0.6-0.3,1.1-0.7,1.7-0.9c0.3-0.1,0.7-0.2,1.1-0.1c1.3,0.5,2.5,1,3,2.4c1.2,2.9,2.9,5.4,4.8,7.9c0.6,0.7,1.2,1.4,1.9,2   c0.8,0.8,1.6,1.5,2.4,2.2c1.5,1.4,3.3,2.3,5.2,3.1c0.7,0.3,1.3,0.6,2,0.9c0.4,0.2,0.8,0.3,1.1,0.4c0.2,0,0.3,0,0.5,0.1   c2.5,0.9,5,0.6,7.6,0.8c1.5,0.1,2.9-0.1,4.4-0.1c2.1,0,4-0.5,5.9-1.4c3.1-1.5,6-3.3,8.3-5.8c2.1-2.2,4-4.5,5.5-7.1   c1-1.7,1.5-3.3,1.6-5.2c0-1,0.2-1.9,0.3-2.9c0.4-3.9-0.2-7.7-1.8-11.3c-0.6-1.4-1.6-2.7-2.5-4c-0.2-0.3-0.6-0.6-0.9-0.8   c-1.2-0.8-2.5-1.6-3.8-2.4c-3.1-2.1-6.5-3.6-10.2-4.2c-1.6-0.3-3.3-0.6-4.9-0.8c-2.6-0.4-5.2-0.4-7.7,0.1c-1.5,0.3-2.9,1-4.4,1.3   c-1.3,0.3-2.5,1.1-3.9,1.3c-1.2,0.1-2.2-0.1-3-1.1c-1.1-1.2-2.1-2.3-3-3.6c-0.6-0.8-1.2-1.6-1.8-2.4c-0.5-0.8-0.6-1.7,0.4-2.1   c0.7-0.3,1.2-1,1.8-1.4c1.5-1.1,2.9-2.3,4.5-3.2c3.3-2,6.5-4.3,9.6-6.6c1.5-1.1,3.1-2.2,4.6-3.3c0.9-0.6,1.7-1.3,2.6-2   c2.4-1.7,4.9-3.4,7.4-5.1C109.9,69,111.5,67.9,113.2,66.6z"></path>
	<path style="fill:#ABC0DE;" d="M43.7,66.3c-0.5-0.1-0.7,0.3-1,0.5c-0.6,0.5-1.2,1.1-1.9,1.6c-0.3,0.2-0.5,0.4-0.8,0.5   c-1.4,0.6-1.9,0.4-2.6-0.9c-1-1.9-2-3.9-3-5.9c-0.4-0.8-0.8-1.5-1.2-2.3c-0.2-0.4-0.1-0.7,0.2-1c2.2-2.3,4.7-4.3,7-6.5   c0.7-0.7,1.5-1.4,2.3-2.1c0.3-0.3,0.7-0.6,1-0.6c1.4,0.2,2.6-0.8,4-0.7c1.4,0.1,2.8,0.2,4.2,0.3c1,0.1,2,0.1,2.9,0.2   c0.9,0.1,0.9,0.1,1,1c0,0.2,0.1,0.5,0.2,0.6c0.8,0.9,1,2,1,3.2c0,3.2-0.1,6.4-0.2,9.5c-0.1,3.9-0.2,7.8-0.3,11.7   c0,1.5-0.2,3.1-0.2,4.6c0,1.5,0,2.9,0,4.4c0,0.8-0.1,1.6-0.1,2.4c0,1.2,0,2.4-0.1,3.7c0,1.4-0.1,2.9-0.1,4.3   c0,5.4,0.1,10.9-0.1,16.3c-0.1,3.8,0.2,7.6,0.2,11.4c0,2.7-0.1,5.5-0.1,8.2c0,1.3,0.2,2.5,0.2,3.8c-0.1,4.2-0.2,8.4-0.3,12.6   c-0.1,2.6-0.3,5.2-0.5,7.8c0,0.6,0.1,1.4-0.5,1.7c-0.7,0.5-1.6,0.9-2.5,0.8c-0.5-0.1-1-0.2-1.6-0.2c-1.5-0.1-2.9-0.2-4.4-0.1   c-1.1,0.1-1.8-0.6-2.7-1c-0.2-0.1-0.4-0.4-0.2-0.7c0.5-0.5,0.2-1.1-0.1-1.5c-0.4-0.5-0.5-1.1-0.5-1.7c0-2.4,0-4.8,0.1-7.2   c0-1.5,0-3,0-4.5c0-1.8,0.1-3.6,0-5.4c-0.2-4.1,0.1-8.2-0.2-12.2c-0.2-3.3-0.1-6.5-0.2-9.8c0-0.6-0.1-1.1-0.1-1.7   c0-0.6-0.1-1.2,0-1.8c0.1-2.1,0.2-4.2,0.2-6.2c0.1-4.3,0.3-8.7,0.4-13c0.1-3,0.1-6,0.1-9.1c0.1-3.4,0.1-6.8,0.2-10.2   C43.6,69.5,43.7,67.9,43.7,66.3z"></path>
	<path style="fill:#ABC0DE;" d="M171.3,65.7c-0.9,0.7-1.6,1.3-2.2,1.9c-0.7,0.7-1.5,1.2-2.6,1.3c-0.6,0-1,0-1.3-0.6   c-1.1-2.2-2.2-4.3-3.3-6.4c-0.4-0.7-0.7-1.5-1.1-2.2c-0.3-0.5-0.2-0.8,0.2-1.2c2.9-2.9,6-5.6,9-8.4c0.3-0.3,0.6-0.6,1-0.7   c0.5-0.1,1.2,0.1,1.6-0.2c0.5-0.4,1.1-0.3,1.6-0.5c0.5-0.2,1.1-0.2,1.7-0.2c0.3,0,0.6,0,0.9,0c1.7,0.1,3.5,0.3,5.2,0.4   c0.9,0.1,1,0.2,1.2,1.1c0.1,0.3,0.2,0.6,0.3,0.9c0.6,0.7,0.9,1.6,0.9,2.5c0,1.6,0,3.2,0,4.8c0,1.1,0,2.3,0,3.4   c-0.1,2.6-0.2,5.1-0.3,7.7c0,2,0,4-0.1,6c0,1.3-0.2,2.6-0.2,3.9c-0.1,1.4-0.1,2.9-0.1,4.3c0,1,0,2,0,3c0,1.1,0,2.2-0.1,3.3   c0,1.8-0.1,3.6-0.1,5.4c0,5.3,0,10.5,0,15.8c0,2.5,0,5,0,7.5c0,2.2,0.1,4.3,0.1,6.5c0,2.4,0.1,4.7,0.1,7.1c0,2.4,0.1,4.9,0.1,7.3   c0,2.2-0.2,4.3-0.3,6.5c-0.1,1.4-0.3,2.8-0.2,4.1c0.1,1.8-0.2,3.6-0.3,5.3c0,0.8-0.3,1.3-1.1,1.5c-0.7,0.3-1.4,0.5-2.1,0.3   c-1.9-0.4-3.7-0.3-5.6-0.2c-1.1,0.1-1.8-0.6-2.7-1c-0.3-0.2-0.4-0.5-0.1-0.8c0.3-0.4,0.2-0.9,0-1.2c-0.9-0.9-0.7-2.1-0.7-3.1   c0-2,0.1-4,0.1-6c0-4.3-0.1-8.7-0.1-13c0-2.1,0.1-4.2,0-6.4c-0.1-3.6-0.3-7.2-0.4-10.8c-0.1-1.7-0.2-3.4-0.1-5.1   c0.3-4,0.1-7.9,0.3-11.9c0.1-4.2,0.2-8.5,0.3-12.7c0.1-3.8,0.1-7.6,0.2-11.4C171.1,71,171.2,68.5,171.3,65.7z"></path>
	<path style="fill:#ABC0DE;" d="M162.7,143.7c-0.1,1.2-0.3,2.3-0.4,3.4c-0.1,1.1-1,1.8-1.5,2.7c-0.9,1.5-2.3,2.4-3.8,3.3   c-1.8,1-3.6,1.6-5.6,1c-1.2-0.4-2.5-0.7-3.5-1.4c-1.7-1.3-3.6-2.6-4.6-4.6c-0.5-1.1-0.7-2.3-1-3.5c-0.5-2.1,0-4.1,0.8-6.1   c0.2-0.6,0.7-1.1,1.2-1.5c0.9-0.8,1.8-1.6,2.8-2.4c1.5-1.2,3.2-1.6,5.1-1.6c2.2,0.1,4.1,0.6,5.8,1.9c0.8,0.6,1.6,1.4,2.3,2.2   c1,1.3,1.8,2.7,2.1,4.4C162.5,142.2,162.6,143,162.7,143.7z"></path>
	<path style="fill:#FCBA25;" d="M139.8-9.6c1.6,1.2,15.9,10.2,17.8,13.5c1.9,3.3,0.3,9.3-2.5,9.6c-2.8,0.3-8.4,3.9-8.4,3.9   S129.8,2.3,131,1.4S139.8-9.6,139.8-9.6z"></path>
	<path style="fill:#FCBA25;" d="M186.5,167.4c6.9,2.2,25.2,2.8,25.8,4.7c0.6,1.9,1.9,14.8-6,14.5c-7.9-0.3-18.6-4.4-19.5-5.4   S186.5,167.4,186.5,167.4z"></path>
	<path style="fill:#FCBA25;" d="M51.9,187.1c5.8-4.6,0-6.4,3.7-8.9s15.6-10.4,17.7-6.4s3.7,15.9-0.9,17.4c-4.6,1.5-15,4.3-16.5,2.8   C54.4,190.5,51.9,187.1,51.9,187.1z"></path>
	<path style="fill:#FCBA25;" d="M-74.1,81.7c21.9,1.6-3-0.2,18.9,1.1C-37,84-41.7,88-23.6,89.7c13.5,1.3,29.3-0.2,42.7-2.7   c-3.5,3.5-6,6.3-9.4,9.8c4.2,1.4,5.3,2.6,9.6,4c-4.2,3.1-8.7,5.9-13.2,8.5c4.8,0.8,9.6,1.5,14.3,2.3c-4.9,3.6-10.2,6.8-15.6,9.6   c4.1,1.9,8.2,3.8,12.3,5.6c-17.3,5.2-35.9,5.1-53.8,2.5c-11.6-1.7-29.3-5.8-33.3-7.7c-3.9-1.8-4.5-23.2-5.1-25.5   C-75.7,93.7-74.1,81.7-74.1,81.7z"></path>
</g>
<g id="Lines">
	<path style="fill:#162B54;" d="M113.6,66.5c-0.3-0.1-0.5-0.2-0.6-0.2c-2,0-4.1-0.1-6.1-0.1c-1.2,0-2.4-0.1-3.7-0.2   c-1.1-0.1-2.2-0.1-3.3-0.1c-3.2-0.1-6.4-0.1-9.7,0.1c-2,0.1-4.1,0-6.1,0c-1.7,0-3.3,0.1-5,0.1c-1.6,0-3.3,0-4.9,0.1   c-1,0.1-1.6-0.7-2.3-1.2c-0.6-0.3-0.6-0.9-0.7-1.4c-0.1-0.6-0.1-1.2-0.1-1.8C71,60,71,58.1,70.9,56.3c0-1.3,0-2.5-0.1-3.8   c0-0.2,0-0.3,0-0.5c0.1-1.3,0.7-1.6,1.9-1c0.1,0,0.2,0.1,0.3,0.1c0.4-0.7,1-0.9,1.9-0.9c1.9,0,3.7-0.1,5.6-0.2   c0.7,0,1.5-0.1,2.2-0.1c3.4-0.1,6.9-0.2,10.3-0.3c3.5-0.1,6.9,0,10.4-0.1c2.6,0,5.1-0.2,7.7-0.3c2.8-0.1,5.5-0.1,8.3-0.2   c2.7,0,5.3,0,8-0.1c1.5,0,3-0.1,4.5-0.2c1,0,2,0,2.9,0.1c1.4,0.1,2.1,0.8,2.2,2.1c0.1,2.3,0.1,4.6,0.1,6.9c0,1.6,0,3.3-0.1,4.9   c0,0.9-0.1,1.9-0.1,2.8c0,0.6-0.3,1-0.7,1.4c-1.5,1.6-3.2,2.8-5,3.9c-0.6,0.4-1.2,0.7-1.7,1.1c-1.7,1.5-3.5,2.6-5.4,3.8   c-3.4,2.2-6.7,4.6-10.1,6.9c-2.1,1.4-4.2,2.8-6.4,4.2c-0.4,0.2-0.7,0.5-1.2,0.9c0.5,0.1,0.8,0.2,1.1,0.1c2-0.3,4.1,0,6.1,0.1   c0.9,0.1,1.8,0.4,2.7,0.6c4.4,1.1,8.2,3.3,11.9,5.9c0.2,0.2,0.5,0.3,0.7,0.5c1.5,0.9,2.5,2.2,3.4,3.7c0.3,0.5,0.6,0.9,0.9,1.3   c1.4,1.6,2.5,3.4,3.3,5.4c0.7,1.7,1.4,3.5,2.1,5.2c0.4,1,0.5,2.1,0.8,3.1c0.8,3.5,0.9,7.1,0.7,10.7c-0.1,1.3-0.2,2.6-0.4,3.9   c-0.1,0.6-0.3,1.3-0.5,1.9c-0.4,1.3-0.9,2.6-1.4,3.9c-0.4,1-0.9,2-1.4,2.8c-1.1,1.7-2.3,3.4-3.5,5c-1.8,2.5-4,4.5-6.4,6.4   c-1.5,1.2-3.2,2.3-4.8,3.3c-2,1.3-4,2.5-6.2,3.4c-3,1.2-6.1,2.4-9.4,2.6c-2.4,0.1-4.8,0.4-7.2,0.3c-1.7,0-3.5-0.1-5.2-0.7   c-1.2-0.4-2.5-0.5-3.7-0.8c-2.2-0.6-4.3-1.2-6.4-2c-1.5-0.6-2.9-1.6-4.4-2.4c-1-0.6-2-1.4-3-2c-0.3-0.2-0.7-0.3-0.9-0.6   c-1.6-1.9-3.7-3.2-5.2-5.1c-0.8-1-1.8-1.8-2.5-2.9c-0.8-1.1-1.7-2.2-2.5-3.3c-0.4-0.5-0.6-1.2-0.8-1.7c-0.6-1.3-1.7-2.4-1.7-4   c0-0.2-0.2-0.3-0.3-0.5c-0.8-1.2-0.5-2.1,0.7-2.8c0.3-0.2,0.7-0.4,0.9-0.6c1-1,2.3-1.6,3.5-2.2c0.3-0.2,0.6-0.4,0.9-0.6   c0.6-0.3,1.1-0.7,1.7-0.9c0.3-0.1,0.8-0.2,1.1-0.1c1.3,0.5,2.5,1,3.1,2.4c1.2,2.9,2.9,5.5,4.8,7.9c0.6,0.7,1.3,1.4,1.9,2.1   c0.8,0.8,1.6,1.5,2.4,2.3c1.5,1.4,3.3,2.4,5.2,3.1c0.7,0.3,1.3,0.6,2,0.9c0.4,0.2,0.8,0.3,1.1,0.4c0.2,0,0.3,0,0.5,0.1   c2.5,0.9,5.1,0.6,7.6,0.8c1.5,0.1,2.9-0.1,4.4-0.1c2.1,0,4-0.5,5.9-1.4c3.1-1.5,6-3.3,8.4-5.9c2.1-2.2,4-4.5,5.6-7.1   c1-1.7,1.5-3.4,1.6-5.3c0-1,0.2-2,0.3-2.9c0.4-3.9-0.2-7.8-1.8-11.4c-0.6-1.4-1.6-2.7-2.5-4c-0.2-0.3-0.6-0.6-0.9-0.8   c-1.3-0.8-2.5-1.6-3.8-2.5c-3.2-2.1-6.6-3.6-10.3-4.2c-1.7-0.3-3.3-0.6-5-0.8c-2.6-0.4-5.2-0.4-7.8,0.1c-1.5,0.3-2.9,1-4.4,1.4   c-1.3,0.4-2.5,1.1-3.9,1.3c-1.2,0.1-2.2-0.1-3.1-1.1c-1.1-1.2-2.1-2.4-3-3.7c-0.6-0.8-1.2-1.6-1.8-2.4C77,93.2,77,92.3,78,91.9   c0.7-0.3,1.2-1,1.8-1.4c1.5-1.1,3-2.3,4.6-3.3c3.4-2,6.5-4.4,9.7-6.7c1.6-1.1,3.1-2.2,4.7-3.3c0.9-0.6,1.7-1.3,2.6-2   c2.5-1.7,5-3.4,7.4-5.2C110.3,68.9,111.8,67.7,113.6,66.5z M64.7,131.2c0.3,0.3,0.4,0.5,0.6,0.7c0.5,0.5,1.1,0.9,1.1,1.7   c0,0.1,0.1,0.3,0.2,0.4c0.6,1.1,1.2,2.2,1.9,3.2c2,2.8,4.1,5.5,6.7,7.8c1.8,1.6,3.7,3,5.6,4.4c1.9,1.4,3.9,2.3,6.1,3   c2,0.6,4,1.2,6,1.7c3.1,0.8,6.2,1.3,9.4,1.1c0.4,0,0.8-0.1,1.2-0.2c0.5-0.1,1-0.3,1.5-0.3c4.1-0.1,8-1.4,11.6-3.1   c1.9-0.8,3.6-2,5.3-3c2.9-1.7,5.3-3.9,7.6-6.3c1.5-1.6,2.6-3.6,3.8-5.4c0.2-0.4,0.4-0.8,0.5-1.2c0.1-1.3,0.5-2.6,0.9-3.8   c0.4-1.2,0.8-2.5,1.1-3.8c0.6-2.9,0.6-5.9,0.6-8.8c-0.1-3.6-0.7-7.2-2.1-10.6c-0.4-1-0.9-1.9-1.2-2.9c-0.7-1.8-1.7-3.3-3.2-4.6   c-0.7-0.5-1.3-1.1-1.9-1.7c-0.6-0.6-1.1-1.3-1.8-1.8c-2-1.3-4.1-2.6-6.2-3.9c-0.6-0.4-1.2-0.7-1.8-1c-1.7-0.8-3.4-1.3-5.2-1.8   c-2.8-0.7-5.6-0.8-8.4-0.5c-1,0.1-2,0.2-3,0.2c-0.2,0-0.6-0.2-0.7-0.3c-0.1-0.1,0.1-0.4,0.2-0.6c0.1-0.1,0.2-0.3,0.3-0.3   c0.9-0.4,1.5-1.1,1.9-2c0.1-0.2,0.3-0.4,0.4-0.6c1.6-1.7,3.3-3.2,5.2-4.6c2-1.3,3.9-2.7,5.8-4c3.1-2.2,6.2-4.3,9.4-6.5   c1.1-0.7,2.2-1.3,3.3-2.1c1.7-1.2,3.3-2.5,5-3.7c0.2-0.2,0.7-0.3,0.9-0.3c0.8,0.4,1.2-0.1,1.6-0.7c-0.5-0.8-0.7-1.7-0.6-2.7   c0.1-3.1,0.2-6.2,0.3-9.3c0-0.7,0-0.8-0.7-0.8c-1.1,0-2.2-0.1-3.3,0c-4.2,0.2-8.5,0.5-12.7,0.3c-2.6-0.1-5.2,0.1-7.8,0.2   c-0.7,0-1.3,0-2,0.1c-3.1,0.4-6.1,0.3-9.2,0.2c-2.9-0.1-5.9,0-8.8,0.1c-2.4,0-4.8,0.1-7.2,0.1c-2.3,0-4.6-0.2-6.8-0.2   c-0.8,0-1.7,0-2.7,0c0,3.7,0.2,7.3,0.5,11c1-0.1,1.8-0.3,2.7-0.4c4.3-0.5,8.7-0.5,13.1-0.7c1.4-0.1,2.8,0,4.2,0c3.8,0,7.6,0,11.4,0   c0.9,0,1.8,0.1,2.7,0.1c2.2,0,4.5,0.1,6.7,0.1c0.4,0,0.9,0.1,1.3,0.2c0.2,0,0.4,0.2,0.5,0.4c0.3,0.6,0.1,1.3-0.5,1.8   c-0.3,0.3-0.5,0.6-0.7,0.8c0.9,1.3,0.8,1.9-0.1,3c-0.8,0.9-1.7,1.6-2.7,2.3c-1.7,1.2-3.4,2.3-5,3.5c-4.8,3.3-9.7,6.7-14.5,10.1   c-3.4,2.4-6.9,4.6-10.4,6.6c-0.5,0.3-1,0.7-1.5,1.1c-0.6,0.5-0.6,0.6-0.1,1.2c1.3,1.9,2.7,3.8,4.1,5.8c0.9-0.6,1.6-1.3,2.5-1.7   c1.8-0.8,3.6-1.5,5.5-2c3.6-1,7.4-1,11.1-0.4c2.9,0.5,5.8,1.1,8.6,1.8c1.6,0.4,3.1,1,4.5,1.8c1.4,0.9,2.9,1.8,4.3,2.8   c0.6,0.4,1.1,0.8,1.5,1.4c1,1.4,2,2.8,2.9,4.2c2.4,3.7,3.6,7.8,3.7,12.1c0,1.7,0,3.4-0.4,5.1c-0.4,1.5-0.7,3.1-1.2,4.6   c-0.6,2-1.5,3.9-2.9,5.5c-1.3,1.5-2.8,3-4.1,4.6c-1.6,2-3.6,3.4-5.5,5c-0.2,0.1-0.4,0.2-0.5,0.3c-1.8,0.7-3.6,1.5-5.4,2.2   c-1.1,0.5-2.1,0.8-3.3,1c-2.8,0.4-5.5,0.4-8.3,0.2c-5-0.4-9.6-1.7-14-4c-0.6-0.3-1.2-0.8-1.8-1.3c-2.2-1.9-4.1-4.1-6-6.3   c-0.4-0.5-0.6-1.1-1-1.5c-0.8-0.9-1.5-1.8-2.1-2.8c-0.5-0.9-0.9-1.8-1.4-2.7c-0.4-0.8-0.6-1.8-1.4-2.5   C68.6,128.7,66.4,129.5,64.7,131.2z"></path>
	<path style="fill:#162B54;" d="M43.7,67.3c-0.5-0.1-0.7,0.3-1,0.5c-0.6,0.5-1.2,1.1-1.9,1.6c-0.3,0.2-0.5,0.4-0.8,0.5   c-1.4,0.6-1.9,0.4-2.6-0.9c-1-1.9-2-3.9-3-5.9c-0.4-0.8-0.8-1.5-1.2-2.3c-0.2-0.4-0.1-0.7,0.2-1c2.2-2.3,4.7-4.3,7-6.5   c0.7-0.7,1.5-1.4,2.3-2.1c0.3-0.3,0.7-0.6,1-0.6c1.4,0.2,2.6-0.8,4-0.7c1.4,0.1,2.8,0.2,4.2,0.3c1,0.1,2,0.1,2.9,0.2   c0.9,0.1,0.9,0.1,1,1c0,0.2,0.1,0.5,0.2,0.6c0.8,0.9,1,2,1,3.2c0,3.2-0.1,6.4-0.2,9.5c-0.1,3.9-0.2,7.8-0.3,11.7   c0,1.5-0.2,3.1-0.2,4.6c0,1.5,0,2.9,0,4.4c0,0.8-0.1,1.6-0.1,2.4c0,1.2,0,2.4-0.1,3.7c0,1.4-0.1,2.9-0.1,4.3   c0,5.4,0.1,10.9-0.1,16.3c-0.1,3.8,0.2,7.6,0.2,11.4c0,2.7-0.1,5.5-0.1,8.2c0,1.3,0.2,2.5,0.2,3.8c-0.1,4.2-0.2,8.4-0.3,12.6   c-0.1,2.6-0.3,5.2-0.5,7.8c0,0.6,0.1,1.4-0.5,1.7c-0.7,0.5-1.6,0.9-2.5,0.8c-0.5-0.1-1-0.2-1.6-0.2c-1.5-0.1-2.9-0.2-4.4-0.1   c-1.1,0.1-1.8-0.6-2.7-1c-0.2-0.1-0.4-0.4-0.2-0.7c0.5-0.5,0.2-1.1-0.1-1.5c-0.4-0.5-0.5-1.1-0.5-1.7c0-2.4,0-4.8,0.1-7.2   c0-1.5,0-3,0-4.5c0-1.8,0.1-3.6,0-5.4c-0.2-4.1,0.1-8.2-0.2-12.2c-0.2-3.3-0.1-6.5-0.2-9.8c0-0.6-0.1-1.1-0.1-1.7   c0-0.6-0.1-1.2,0-1.8c0.1-2.1,0.2-4.2,0.2-6.2c0.1-4.3,0.3-8.7,0.4-13c0.1-3,0.1-6,0.1-9.1c0.1-3.4,0.1-6.8,0.2-10.2   C43.6,70.5,43.6,68.9,43.7,67.3z M52.6,155.7c0-0.5,0-0.8,0-1.2c0.1-4,0.2-8,0.3-12c0.1-2.3,0.2-4.6,0.2-6.9c0-2.7-0.1-5.4-0.1-8.1   c0-3.5-0.1-6.9-0.1-10.4c0-4.2-0.1-8.5,0-12.7c0-2.4,0.1-4.8,0.2-7.2c0-1.1-0.2-2.2-0.1-3.3c0.1-3.3,0.3-6.6,0.4-9.9   c0.1-2.8,0.2-5.6,0.3-8.4c0-1.8,0-3.6,0.1-5.4c0.1-3.7,0.3-7.4,0.4-11.1c0-0.3,0.1-0.6,0.1-0.9c0.1-1.7,0.2-3.3,0.2-5   c0-0.6,0-0.6-0.7-0.6c-0.7,0-1.4,0-2.1,0c-1.3,0-2.5,0-3.8,0c-0.4,0-0.7,0-1.1,0c-0.6,0-1.2-0.3-1.7-0.1c-0.5,0.2-0.8,0.8-1.2,1.2   c0,0-0.1,0-0.1,0.1c-1.8,1.6-3.7,3.2-5.5,4.8c-0.9,0.7-1.8,1.4-2.7,2.2c1.3,2.2,2.6,4.5,4,6.8c0.3-0.2,0.6-0.4,0.8-0.6   c0.9-0.7,1.7-1.4,2.6-2.1c0.9-0.6,1.5-0.6,2.1,0.4c0.1,0.2,0.3,0.6,0.5,0.7c0.9,0.2,0.8,0.9,0.8,1.5c0,0.7,0.1,1.3,0.1,2   c0,2.2,0,4.5,0,6.7c0,1.8,0.2,3.7,0.2,5.5c0,2.5-0.1,5-0.1,7.5c-0.1,2.7-0.2,5.4-0.3,8.1c-0.1,3.5-0.1,7-0.2,10.5   c0,2.3-0.1,4.6-0.1,6.8c0.1,4.5,0.2,9.1,0.4,13.6c0,0.9,0.2,1.9,0.1,2.8c-0.1,1.8-0.2,3.5-0.1,5.2c0.1,3.1,0.1,6.1,0.1,9.2   c0,2.2-0.1,4.4-0.2,6.6c0,0.9,0,1.9,0,2.8c0,0.7,0.1,0.8,0.8,0.8c1,0,2,0,2.9,0C50.8,155.5,51.6,155.6,52.6,155.7z"></path>
	<path style="fill:#162B54;" d="M171.3,66.9c-0.9,0.7-1.6,1.3-2.2,1.9c-0.7,0.7-1.5,1.2-2.6,1.3c-0.6,0-1,0-1.3-0.6   c-1.1-2.2-2.2-4.3-3.3-6.4c-0.4-0.7-0.7-1.5-1.1-2.2c-0.3-0.5-0.2-0.8,0.2-1.2c2.9-2.9,6-5.6,9-8.4c0.3-0.3,0.6-0.6,1-0.7   c0.5-0.1,1.2,0.1,1.6-0.2c0.5-0.4,1.1-0.3,1.6-0.5c0.5-0.2,1.1-0.2,1.7-0.2c0.3,0,0.6,0,0.9,0c1.7,0.1,3.5,0.3,5.2,0.4   c0.9,0.1,1,0.2,1.2,1.1c0.1,0.3,0.2,0.6,0.3,0.9c0.6,0.7,0.9,1.6,0.9,2.5c0,1.6,0,3.2,0,4.8c0,1.1,0,2.3,0,3.4   c-0.1,2.6-0.2,5.1-0.3,7.7c0,2,0,4-0.1,6c0,1.3-0.2,2.6-0.2,3.9c-0.1,1.4-0.1,2.9-0.1,4.3c0,1,0,2,0,3c0,1.1,0,2.2-0.1,3.3   c0,1.8-0.1,3.6-0.1,5.4c0,5.3,0,10.5,0,15.8c0,2.5,0,5,0,7.5c0,2.2,0.1,4.3,0.1,6.5c0,2.4,0.1,4.7,0.1,7.1c0,2.4,0.1,4.9,0.1,7.3   c0,2.2-0.2,4.3-0.3,6.5c-0.1,1.4-0.3,2.8-0.2,4.1c0.1,1.8-0.2,3.6-0.3,5.3c0,0.8-0.3,1.3-1.1,1.5c-0.7,0.3-1.4,0.5-2.1,0.3   c-1.9-0.4-3.7-0.3-5.6-0.2c-1.1,0.1-1.8-0.6-2.7-1c-0.3-0.2-0.4-0.5-0.1-0.8c0.3-0.4,0.2-0.9,0-1.2c-0.9-0.9-0.7-2.1-0.7-3.1   c0-2,0.1-4,0.1-6c0-4.3-0.1-8.7-0.1-13c0-2.1,0.1-4.2,0-6.4c-0.1-3.6-0.3-7.2-0.4-10.8c-0.1-1.7-0.2-3.4-0.1-5.1   c0.3-4,0.1-7.9,0.3-11.9c0.1-4.2,0.2-8.5,0.3-12.7c0.1-3.8,0.1-7.6,0.2-11.4C171.1,72.2,171.2,69.7,171.3,66.9z M167,67.4   c0.3-0.3,0.6-0.4,0.8-0.6c0.9-0.7,1.7-1.4,2.6-2.1c0.9-0.7,1.5-0.6,2.1,0.3c0.2,0.3,0.3,0.7,0.6,0.8c0.8,0.2,0.7,0.7,0.7,1.3   c0.1,3.7,0.2,7.3,0.2,11c0,2.3,0,4.7-0.1,7c-0.1,3.7-0.2,7.4-0.3,11.1c-0.1,4.7-0.2,9.5-0.2,14.2c0,2.7,0,5.5,0.1,8.2   c0.1,3,0.2,6,0.3,8.9c0,1.1,0.2,2.2,0.1,3.3c0,1.5-0.1,3.1-0.1,4.6c0,3.1,0.1,6.2,0.1,9.3c0,3.2-0.1,6.5-0.1,9.7c0,1,0,1,1,1   c1.6,0,3.1,0.1,4.7,0.1c0.7,0,0.7,0,0.7-0.6c0-1.5,0-3.1,0-4.6c0-1.7,0.1-3.4,0.1-5.1c0.1-3.1,0.3-6.1,0.3-9.2   c0-2.2-0.1-4.3-0.1-6.5c0-2.5,0.1-4.9,0-7.4c-0.1-5.7-0.2-11.4-0.2-17.1c0-4.2,0.1-8.4,0.1-12.6c0-1.3,0.1-2.5,0.1-3.8   c0-0.9,0-1.7,0-2.6c0-1.4,0.1-2.9,0.2-4.3c0.1-1.3,0.1-2.5,0.2-3.8c0.1-1.3,0.2-2.7,0.2-4c0.1-2.8,0.2-5.5,0.2-8.3   c0-1.6,0.1-3.3,0.1-4.9c0-0.8,0.1-1.5,0.1-2.3c0.1-1.8,0.2-3.5,0.3-5.3c0-0.6-0.1-0.7-0.7-0.7c-2.3,0-4.6,0-6.8,0   c-0.6,0-1.3-0.3-1.8-0.1c-0.5,0.2-0.9,0.9-1.4,1.3c-0.8,0.8-1.7,1.5-2.6,2.3c-0.8,0.7-1.6,1.5-2.5,2.2c-1,0.9-2.1,1.7-3.1,2.5   C164.4,62.8,165.7,65,167,67.4z"></path>
	<path style="fill:#162B54;" d="M162.6,146c-0.1,1.2-0.3,2.3-0.4,3.4c-0.1,1.1-1,1.8-1.5,2.7c-0.9,1.5-2.3,2.4-3.8,3.3   c-1.8,1-3.6,1.6-5.6,1c-1.2-0.4-2.5-0.7-3.5-1.4c-1.7-1.3-3.6-2.6-4.6-4.6c-0.5-1.1-0.7-2.3-1-3.5c-0.5-2.1,0-4.1,0.8-6.1   c0.2-0.6,0.7-1.1,1.2-1.5c0.9-0.8,1.8-1.6,2.8-2.4c1.5-1.2,3.2-1.6,5.1-1.6c2.2,0.1,4.1,0.6,5.8,1.9c0.8,0.6,1.6,1.4,2.3,2.2   c1,1.3,1.8,2.7,2.1,4.4C162.4,144.5,162.5,145.3,162.6,146z M144.3,145c0,0.3,0,0.7,0.1,1c0.3,1.3,0.5,2.6,1.5,3.7   c1.2,1.1,2.3,2.1,4,2.4c0.3,0,0.5,0.2,0.8,0.3c1.1,0.4,2.1,0.6,3.2,0.2c0.6-0.2,1.3-0.4,1.9-0.5c0.5-0.1,0.8-0.3,1.1-0.8   c0.5-0.8,1-1.6,1.5-2.4c0.9-1.6,1.2-3.4,0.5-5.2c-0.3-0.7-0.6-1.3-0.8-2c-0.5-1.7-1.8-2.6-3.3-3.3c-3.1-0.5-6.1-0.6-8.4,2.1   c-0.1,0.1-0.2,0.2-0.3,0.2C144.7,141.8,144.4,143.3,144.3,145z"></path>
	<path style="fill:#162C54;" d="M-74.9,127.8c12.3,1.6,24.4,4.7,36.4,7.5c9.4,2.2,18.7,4.1,28.3,2.6c10.2-1.6,20.4-3.5,29.7-8.2   c0.8-0.4,1.3-1.2,2-1.8c-0.8-0.4-1.6-0.8-2.5-1c-3.6-1-7.2-2-11.4-3.2c5.6-3.7,10.1-6.7,14.6-9.7c-0.2-0.4-0.4-0.7-0.6-1.1   c-4.1-0.2-8.1-0.5-12.7-0.7c5.1-4.1,9.4-7.6,13.8-11.1c-5-1.2-9.8,0.5-14.4-2.7c1-0.4,1.4-0.6,1.9-0.8c4.5-1.8,8-4.8,9.9-9.4   c0.3-0.6,0.1-1.6-0.3-2.3c-0.2-0.3-1.2-0.4-1.7-0.3c-3.8,1.2-7.5,3.2-11.4,3.7c-8,1.1-16.2,2.4-24.2,2.1   c-8.6-0.3-17.2-2.2-25.7-3.8c-7.6-1.4-14.9-4.1-22.5-5c0,0,1.9,2,2.7,3s5.3,0.7,5.3,0.7c15.5,3.5,30.5,9.2,46.7,7.3   c7.3-0.8,14.5-1.9,21.7-2.8c1.7-0.2,3.3-0.6,5.5-1.1c-0.5,0.9-0.6,1.5-0.9,1.6c-2.9,1.6-5.8,3.1-8.7,4.6c-0.7,0.4-1.6,1-1.8,1.6   c-0.1,0.6,0.5,1.6,1.1,2.1c0.8,0.7,1.7,1.3,2.7,1.5c2.2,0.7,4.5,1.1,7.8,1.9c-3.8,2.5-7,4.7-10.1,6.8c-0.5,0.4-1.3,0.9-1.3,1.3   c0,0.6,0.5,1.5,1.1,1.7c1.5,0.7,3,1.1,4.6,1.5c1.4,0.3,2.8,0.5,4.2,0.7c-2.9,2.4-6,4-9.1,5.6c-0.9,0.5-1.7,1-2.6,1.5   c0.6,0.7,1.1,1.6,1.9,2.1c2.5,1.5,5.1,2.8,8.1,4.5c-1.1,0.7-1.4,0.9-1.8,1.1c-10,4-20.6,6.1-31.2,5.6c-8.5-0.4-17-2.4-25.5-4.1   c-5.1-1-10.1-2.9-15.2-3.9c0,0-4-1.8-6.6-2C-69.9,125.2-74.9,127.8-74.9,127.8z"></path>
	<path style="fill:#162C54;" d="M147.8-5.4c-1.6-2.2-4.9-8.5-8.1-8.7c-1.1,0-1.4,0.3-2,1.2c-0.8,1.2-1.1,2.8-1.8,4.1   c-0.7,1.3-1.8,2.3-2.5,3.6c-1.4,2.6-0.9,5.2,1.8,6.5c0,0,0.1,0,0.1,0c-0.4,0.5-0.5,1.3,0.1,1.8c4.8,4.1,6.7,10.7,12.4,13.9   c0.6,0.3,1.2,0.2,1.7-0.3c2.9-3.4,6.5-5.9,10.6-7.7c0.8-0.4,0.9-1.6,0.2-2.1C155.4,3.5,151.3-0.5,147.8-5.4z M148.4,14.5   c-4.9-3.3-7-9.4-11.5-13.3c-0.1-0.1-0.2-0.1-0.3-0.2c0.4-0.6,0.4-1.6-0.5-2c-2.4-1.2,1.9-6.5,2.5-7.8c0.1-0.2,1.1-3,0.8-2.9   c1.2-0.5,5.9,6.9,6.6,7.8c3.2,4.5,7,8.3,11.4,11.6C154,9.4,151,11.7,148.4,14.5z"></path>
	<path style="fill:#162C54;" d="M215.7,169.8c-4.3,0.4-8.7,0.4-13-0.2c-2.3-0.4-4.6-0.9-6.9-1.6c-1.2-0.4-2.8-1.3-4.1-1.3   c-4.7-0.1-6.1,9.6-7,13c-0.4,1.6,2,2.5,2.4,0.9c0.7-2.9,1.5-6.6,3-9.2c1.5-2.5,2.3-1.7,4.7-1c1.4,0.4,2.9,0.8,4.3,1.1   c4.8,1.1,9.7,1.3,14.6,1c-1.8,3.9-3.7,7.8-5.5,11.7c-5-1.7-10.1-3.2-15.3-4.3c-1.6-0.4-1.8,2.2-0.2,2.6c5.4,1.2,10.6,2.7,15.8,4.6   c0.7,0.2,1.4-0.1,1.7-0.8c2.3-4.9,4.6-9.8,7-14.7C217.6,170.6,216.6,169.7,215.7,169.8z"></path>
	<path style="fill:#162C54;" d="M75.9,176.4c-0.2-2.4-0.2-5.1-2-6.9c-0.3-0.3-0.9-0.4-1.3-0.3c-3.5,1-6.3,4.4-9.7,5.8   c-3.6,1.4-6.3,4.3-9.9,5.6c-0.7,0.2-1.1,1-0.8,1.7c1.6,4.2,3,8.5,4.1,12.8c0.4,1.7,3,0.8,2.5-0.9c-1.1-4-2.3-7.8-3.7-11.7   c1.3-0.6,2.4-1.4,3.5-2.2c2.4-1.7,4.8-2.5,7.4-3.7c1.6-0.7,3-1.8,4.4-2.9c3.2-2.5,2.7,0.5,2.9,3.4c0.1,1.8,0.6,3.4,0.9,5.2   c0.2,1.3,0.9,0.8,0.2,1.8c-0.6,0.8-3.6,1.8-4.6,2.3c-3.2,1.4-6.7,2-8.9,5c-1,1.4,1,3.2,2,1.8c2.1-2.9,6.4-3.5,9.5-5.1   c1.5-0.8,4.9-1.8,5.3-3.8c0.1-0.6-0.2-0.9-0.2-1.4C77.1,180.8,76.1,178.7,75.9,176.4z"></path>
</g>
</svg></div>
															
															<script type="text/template" id="Training13_1_template">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg" data-bf-svg data-url="/images/shoefinder-new/13_1.svg" data-bf-stepped-animation  data-active-screens="Training"></div>
														</script>
														</div>
														<div class="bf-media-button__text" id="training_3Label">Half Marathon</div>
													</div>
												</div>
											</div>
							
										
											
												<div class="bf-grid__col-1 bf-grid__col-2-3-tablet-up bf-training-screen__transition-group-6">
													


	  <!--  option [object Object] -->
	  <!--  valueOverride 4 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="training" value="4" id="training_4" tabindex="-1" required="" aria-hidden="true">
			
												
													<div role="button" aria-labelledby="training_4Label" class="bf-media-button bf-media-button--aspect bf-media-button--aspect-short" data-bf-input-button="" data-input-id="training_4" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Training" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="3" data-gtm-screen-title="Training" data-gtm-user-response="Marathon or more" data-gtm-question="What are you training for?" data-gtm-question-category="Demographics" tabindex="4">
											
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg bf-media--loaded" data-bf-svg="" data-url="/images/shoefinder-new/26_2.svg" data-bf-stepped-animation="" data-active-screens="Training"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" role="image">
<title>Marathon</title>
<g id="Fills1">
	<path style="fill:#ABC0DE;" d="M275.8,132c1-0.1,2-0.2,3.1-0.3c0.5,0,0.9,0,1.4,0c0.8,0,1.7,0.1,2.5,0.1c1.8,0,3.6,0.1,5.4,0   c2.2,0,4.3-0.2,6.5-0.2c2.6-0.1,5.2-0.1,7.8-0.1c2.6,0,5.1,0,7.7,0c1.3,0,2.5-0.1,3.7-0.2c1.4-0.1,1.7,1.5,2.4,2.8   c0.1,0.3,0.1,0.6,0.2,0.9c0,1.5,0.1,3.1,0.1,4.6c0,1.1,0,2.1,0,3.2c0,1-0.1,2-0.1,2.9c0,0.1,0,0.2-0.1,0.3c-0.9,1-1.7,2.2-3.4,2.3   c-4.2,0.3-8.3,0.4-12.5-0.1c-2.2-0.2-4.3-0.3-6.5-0.5c-2.6-0.2-5.2-0.2-7.7-0.4c-1.8-0.2-3.6,0-5.4,0.1c-3.4,0.1-6.8,0.2-10.2,0.4   c-1.7,0.1-3.4,0.1-5.1,0.2c-1.1,0-2.1-0.1-3.2-0.1c-2.6,0-5.2-0.1-7.8-0.1c-0.2,0-0.5,0-0.7,0c-0.2,0-0.4-0.2-0.4-0.3   c0.2-0.7-0.5-1.1-0.7-1.7c-0.1-0.2-0.2-0.5-0.2-0.7c-0.1-1.5-0.2-3-0.2-4.5c0-1.1,0-2.1,0-3.2c0-0.7,0.2-1.1,0.8-1.4   c0.3-0.2,0.6-0.5,0.8-0.8c0.4-0.5,0.8-1.2,1.3-1.7c1.3-1.3,2.6-2.5,3.8-3.8c1.5-1.5,3-3,4.4-4.6c2-2.1,4-4.3,6-6.5   c1.3-1.4,2.6-2.9,3.9-4.3c2-2.2,4.1-4.3,6.1-6.5c1.2-1.3,2.4-2.7,3.7-4c2.5-2.5,5-5,7.4-7.6c1.9-2,3.8-3.9,5.6-6   c2.1-2.4,3.4-5.2,4.4-8.2c0.1-0.2,0.1-0.5,0.2-0.7c0.5-1.3,0.5-2.7,0.2-4c-0.3-1.4,0.6-3.5,0.1-4.7c-0.2-0.5-0.5-0.9-0.9-1.2   c-2.3-1.9-4.8-3.3-7.8-4c-1.7-0.4-3.5-0.6-5.2-0.6c-1.2-0.1-2.2,0.4-3.3,0.9c-2.5,1-6,3-8.1,4.5c-1.5,1.1-2.9,2.3-4.4,3.5   c-0.9,0.8-1.9,1.6-2.7,2.4c-0.8,0.8-1.5,1.6-2.3,2.4c-0.5,0.6-1.2,0.2-1.7,0.7c-0.3,0.3-0.7,0.4-1.1,0.2c-1.3-0.5-2.3-0.6-3.4-1.6   c-1.2-1-2.4-2-3.6-2.9c-1-0.8-1.7-1.4-1.6-2.7c0-0.2,0-0.4,0.1-0.5c0.7-1.1,1.1-2.5,2.1-3.5c0.7-0.7,1.3-1.6,2-2.3   c1.1-1,2.2-1.9,3.4-2.8c1.6-1.3,3.3-2.5,5-3.8c1.3-1,2.7-1.9,4.1-2.8c0.6-0.4,1.3-0.6,2-0.9c1.4-0.6,2.6-1.3,4.1-1.6   c1.6-0.3,4.2-1,5.8-1.4c0.2,0,0.3-0.1,0.5-0.2c0.6-0.1,1.2-0.4,1.8-0.4c2.3,0.1,4.6-0.1,6.8,0.3c2.5,0.4,4.9,1,7.2,2   c2.8,1.1,5.5,2.4,8,4.2c0.5,0.3,0.9,0.7,1.3,1.1c1,1.2,0.9,2.8,2,3.9c1.3,1.3,1.9,3,2.5,4.6c0.5,1.4,0.6,2.8,1,4.2   c0.3,1,0.2,2,0.1,3.1c-0.1,0.8-0.1,1.7,0,2.5c0.2,1.7,0.1,3.3-0.1,5c-0.1,0.5-0.3,0.9-0.4,1.4c-0.7,2.5-1.5,4.9-2.7,7.1   c-0.9,1.7-1.9,3.4-3,5c-2.4,3.3-5.2,6.3-8.2,9.1c-1.2,1.1-2.3,2.4-3.5,3.7c-1.1,1.2-2.2,2.3-3.2,3.5c-1.4,1.4-2.7,2.9-4.1,4.3   c-0.8,0.8-1.7,1.6-2.5,2.5c-0.8,0.8-1.5,1.7-2.3,2.5c-0.3,0.4-0.6,0.7-1,1c-2,1.9-4,3.8-6,5.7c-0.7,0.7-1.4,0.4-2.1,1.1   c-0.1,0.1-0.2,0.3-0.3,0.4C275.7,131.8,275.8,131.9,275.8,132z"></path>
	<path style="fill:#ABC0DE;" d="M109.7,131.3c0.5,0,0.9,0.1,1.3,0c1.5-0.3,3.1-0.3,4.6-0.2c2.5,0.1,5,0.1,7.5,0.1   c3.2,0,6.3-0.2,9.5-0.3c3.5-0.1,7,0,10.5-0.1c1.2,0,2.5,0,3.7-0.2c1.6-0.2,2.3,1,2.5,2.1c0.2,1,0.2,2.1,0.2,3.2c0,1.9,0,3.9,0,5.8   c0,0.8-0.3,1.5-0.1,2.3c0,0.1,0,0.3,0,0.3c-0.9,1-1.5,2.2-3.1,2.3c-4.1,0.4-8.2,0.4-12.2-0.1c-2.1-0.2-4.3-0.3-6.4-0.5   c-2.5-0.2-5-0.2-7.5-0.4c-1.7-0.2-3.5,0-5.2,0.1c-3.3,0.1-6.5,0.2-9.8,0.4c-1.7,0.1-3.3,0.1-5,0.2c-1,0-2-0.1-3-0.1   c-2.6,0-5.1-0.1-7.7-0.1c-0.8,0-0.8,0-1.1-0.8c0-0.1,0-0.2-0.1-0.2c-1.1-1.3-0.9-2.9-1-4.4c-0.1-1.7,0-3.4,0-5.1   c0-0.6,0.2-1,0.8-1.3c0.3-0.2,0.6-0.4,0.8-0.7c0.6-1.1,1.4-2,2.3-2.8c1.8-1.9,3.6-3.7,5.4-5.5c1.6-1.7,3.1-3.4,4.7-5.2   c1.9-2.1,3.8-4.2,5.6-6.4c2-2.3,4.1-4.6,6.2-6.9c2-2.2,3.9-4.3,5.9-6.4c1.9-2,3.8-4,5.7-6c1.8-1.9,3.6-3.8,5.3-5.8   c2-2.4,3.4-5.3,4.3-8.3c0.1-0.2,0.1-0.5,0.2-0.7c0.5-1.3,0.5-2.7,0.2-4c-0.2-1.1-0.4-2.3-0.8-3.4c-0.4-1-0.9-1.7-1.7-2.4   c-2.1-1.6-4.4-2.8-6.9-3.5c-1.7-0.4-3.3-0.5-5-0.6c-1.1-0.1-2.2,0.4-3.2,0.9c-2.4,1-4.7,2.3-6.8,3.8c-1.5,1-2.8,2.3-4.2,3.4   c-0.9,0.8-1.8,1.6-2.7,2.4c-0.7,0.7-1.3,1.5-2,2.2c-0.6,0.6-1.1,1.3-1.7,1.9c-0.3,0.4-0.8,0.4-1.2,0.3c-1.5-0.5-2.8-1.2-4-2.3   c-0.9-0.8-1.8-1.6-2.8-2.3c-0.6-0.5-1.2-1.1-1.4-1.8c-0.3-0.8-0.4-1.6,0-2.5c0.8-1.7,1.9-3,3-4.5c1.1-1.5,2.5-2.6,4-3.7   c1.7-1.3,3.3-2.6,5-3.8c1.3-0.9,2.6-1.8,3.9-2.7c0.7-0.4,1.4-0.7,2.2-1.1c1.3-0.6,2.6-1.3,4.1-1.6c1.5-0.3,3-0.6,4.5-1.1   c2.6-0.9,5.2-0.6,7.9-0.3c4.5,0.4,8.6,2,12.5,4.2c1.1,0.6,2.2,1.3,3.3,2c0.6,0.4,1,0.9,1.5,1.4c0.2,0.2,0.4,0.5,0.7,0.7   c0.5,0.6,1.1,1.2,1.6,1.8c0.8,1,1.6,2,2.1,3.2c0.8,1.7,1,3.4,1.5,5.2c0.1,0.5,0.3,1.1,0.3,1.6c0.1,0.6,0.2,1.3,0.1,1.8   c-0.2,1.1-0.1,2.2,0,3.3c0.1,1.7,0.1,3.3-0.1,5c-0.1,0.5-0.3,0.9-0.4,1.4c-0.6,2.5-1.5,4.8-2.6,7.1c-1.1,2.2-2.3,4.4-3.9,6.3   c-2.2,2.7-4.4,5.4-7,7.8c-1.2,1.1-2.2,2.4-3.3,3.6c-1,1.1-2.1,2.3-3.1,3.4c-1.4,1.5-2.7,3-4.1,4.4c-0.8,0.8-1.6,1.6-2.3,2.4   c-0.8,0.9-1.5,1.8-2.3,2.7c-0.3,0.3-0.6,0.7-0.9,1c-1.9,1.9-3.9,3.7-5.8,5.6c-0.7,0.7-1.4,1.5-2.1,2.2   C109.9,130.9,109.9,131.1,109.7,131.3z"></path>
	<path style="fill:#ABC0DE;" d="M243.9,137.2c-0.1,1-0.2,2-0.3,2.9c-0.1,1-0.8,1.6-1.3,2.4c-0.8,1.4-2.1,2.1-3.4,2.8   c-1.8,1-3.7,1.3-5.7,0.4c-1.5-0.6-2.8-1.4-3.9-2.5c-0.7-0.6-1.3-1.3-1.8-2c-0.3-0.4-0.5-0.9-0.6-1.3c-0.2-0.6-0.3-1.3-0.4-1.9   c-0.4-1.8-0.1-3.6,0.7-5.3c0.2-0.5,0.6-1,1-1.3c0.8-0.7,1.6-1.4,2.4-2c1.3-1,2.7-1.4,4.4-1.3c1.9,0,3.5,0.6,5,1.6   c0.7,0.5,1.4,1.2,1.9,1.9c0.8,1.1,1.6,2.3,1.8,3.7C243.7,135.9,243.8,136.6,243.9,137.2z"></path>
	<path style="fill:#ABC0DE;" d="M225.8,110.1c-0.2-1.1-0.3-2.1-0.8-3.1c-0.2-0.5-0.4-1-0.5-1.6c-0.3-1.5-0.9-2.8-1.8-4   c-1-1.4-1.9-2.9-3-4.2c-1.4-1.8-2.9-3.5-4.7-4.9c-2.2-1.7-4.7-2.7-7-4.1c-0.1,0-0.1-0.1-0.2-0.1c-1.6-0.5-3.2-1.3-4.9-1.7   c-2-0.4-3.9-1-6-1c-1.2,0-2.3,0-3.5,0c-2.5-0.1-5,0.4-7.4,1.1c-1.4,0.4-2.8,0.8-4.1,1.3c-1.5,0.6-2.9,1.2-4.3,1.9   c-1.9,1-3.5,2.5-5.1,4.1c-0.2,0.3-0.5,0.5-0.8,0.8c-0.1-0.1-0.2-0.1-0.2-0.2c0.1-0.4,0.2-0.9,0.4-1.3c0.8-1.8,1.6-3.6,2.5-5.4   c1.8-3.7,4.3-6.7,7.2-9.6c2.2-2.2,4.7-4.2,7.3-6c1.2-0.8,2.3-1.7,3.5-2.5c0.3-0.2,0.6-0.4,0.9-0.6c1.4-0.8,2.8-1.6,4.2-2.4   c1.5-0.9,3.1-1.7,4.7-2.3c1.6-0.6,3.2-1.4,4.8-2.1c0.7-0.3,1.4-0.8,2.1-0.8c1.4-0.1,2.6-0.7,3.9-0.9c0.4,0,0.9-0.2,1.3-0.2   c0.8-0.1,0.9-0.1,1.1-0.8c0.1-0.3,0.1-0.7,0.1-1c-0.1-1.8-0.3-3.6-0.4-5.4c-0.1-1.2-0.4-1.4-1.5-1.4c-0.3,0-0.5,0.1-0.8,0.1   c-0.8,0.1-1.6,0.2-2.4,0.2c-1.9-0.2-3.7,0.1-5.6,0.4c-0.5,0.1-0.9,0.3-1.4,0.4c-1.4,0.4-2.8,0.6-4.2,1.1c-2.7,0.9-5.4,1.8-8.1,2.7   c-3.3,1.2-6.6,2.6-9.5,4.6c-1.6,1.1-3.1,2.4-4.7,3.7c-2.3,2-4.4,4.2-6.3,6.6c-2.2,3-4.2,6.1-5.8,9.5c-1.9,4.2-4,8.3-5.3,12.7   c-1,3.4-1.5,6.9-2,10.4c-0.3,1.8-0.2,3.6-0.3,5.4c0,3.1,0.2,6.2,1,9.3c0.2,0.8,0.5,1.7,0.8,2.5c0.5,1.5,1,3,1.5,4.5   c0.2,0.6,0.4,1.2,0.7,1.7c0.8,1.6,1.6,3.1,2.5,4.7c1.4,2.3,3,4.4,5,6.3c0.7,0.6,1.3,1.3,2,1.9c1,0.8,1.9,1.8,3,2.5   c1.5,0.9,3,1.7,4.6,2.5c0.4,0.2,0.7,0.4,1.1,0.5c2,0.7,4,1.3,6.1,1.5c2,0.3,3.9,0.5,5.9,0.3c2.3-0.2,4.5-0.5,6.8-1   c2-0.4,4-1.1,5.8-1.9c0.5-0.2,0.9-0.4,1.4-0.6c0.6-0.3,1.2-0.5,1.8-0.8c0.5-0.2,0.9-0.5,1.4-0.7c2.2-0.9,4-2.3,5.7-3.9   c1.4-1.3,2.6-2.9,3.9-4.3c2.2-2.4,3.6-5.2,4.9-8.1c0.7-1.5,1.1-3.2,1.5-4.8C225.9,117.7,226.5,113.9,225.8,110.1z M215,115.5   c-0.1,2.5-1,4.7-1.8,7c-0.7,2.1-2,3.8-3.3,5.4c-1.2,1.5-2.4,3-3.8,4.3c-1.9,1.9-4.3,3.2-6.9,3.8c-0.9,0.2-1.8,0.5-2.8,0.7   c-1,0.1-2,0.2-3,0.1c-1.8-0.1-3.5-0.1-5.3-0.4c-2.2-0.3-4.4-0.8-6.4-1.7c-0.4-0.2-0.8-0.4-1.1-0.7c-1.4-1.3-2.8-2.5-4-4.1   c-0.9-1.2-1.7-2.5-2.5-3.8c-1.4-2.5-2.3-5.2-3.1-7.9c0-0.1,0-0.2,0-0.2c-0.8-1.7-0.4-3.5-0.2-5.3c0.4-2.9,1.9-5.3,3.6-7.6   c1.7-2.3,3.7-4.3,6-5.9c1.6-1.2,3.4-2.2,5.4-2.8c1-0.3,2-0.6,3-1c1.3-0.4,2.6-0.7,4-0.5c0.3,0,0.6,0,1,0C197,95,200,96,203,97.5   c1.7,0.9,3.4,1.9,5,3c1.2,0.9,2.3,1.9,3.2,3.2c0.5,0.7,1,1.4,1.5,2c0.8,1.1,1.2,2.3,1.5,3.5c0.2,0.6,0.5,1.2,0.7,1.7   c0.2,0.5,0.4,1,0.4,1.5C215.2,113.5,215,114.5,215,115.5z"></path>
	<path style="fill:#FCBA25;" d="M438,104.5c-16.1-3.2-33.8-10.7-49.6-15.1s-29.4-6.1-45.6-3.9c3.4,2.3,6.2,3.2,9.6,5.5   c-5.3,1.7-9.6,4.1-14.5,6.6c4.2,1.4,7.3,4.2,11.5,5.5c-4.5,1.6-8.2,2.7-12.4,4.9c3.6,1.9,6.5,4.7,10.2,6.6   c-3.6,2.6-6.3,3.8-9.9,6.4c12.3-0.3,24.5,0.5,36.5,3.5c16,4,29.7,14.2,45.8,17.7c19.5,4.3,40.1-0.8,59.5,3.6   c10.6,2.4,17.6,4.4,27.2,9.5c-1.3-5-0.8-6.6-3.6-10.9c-1.3-2-2.9-4-3.4-6.3c-1.5-6.1,4.9-12.1,2.6-17.9c-2.2-5.5-12-6.8-17-8.1   C469.5,108.4,453.5,107.6,438,104.5z"></path>
	<g>
		<path style="fill:#FCBA25;" d="M-85.5,117.4c10-5.7,38.2-20.3,48.7-24.8c12.9-5.5,26.5-9.1,40.8-8.4c5.6,0.3,12.3-0.8,17.8-0.3    c6.4,0.6,12.8,2.1,19.2,2.5c7.2,0.4,13.2,0.8,20.4,0.8c3.7,0,7.5,0,11.2,0.3c0.7,0,1.4,1,2.1,1.5c-0.6,0.6-1.1,1.4-1.8,1.8    c-4,2.2-8.1,4.2-13.3,6.9c4,1.3,6.9,2.2,9.8,3.2c1.1,0.3,2.2,0.6,3.1,1.1c0.8,0.4,1.4,1.2,2.1,1.8c-0.9,0.5-1.8,1.2-2.7,1.6    c-3.9,1.6-6.6,2.6-11.2,4.4c7.2,2.9,12.4,6.1,18.8,8.8c-0.1,0.4-0.1,0.8-0.2,1.1c-3.8,1.2-7.6,2.4-11.4,3.5    c-9.3,2.8-18.9,2.4-28.4,1.5c-7.6-0.7-15.2-2-22.8-2.9c-9.2-1.2-17.5,2.2-26,4.9c-4,1.3-8.2,2.5-11.9,4.4c-6.5,3.4-12.7,7.2-19,11    c-6.7,4.1-13.4,8.3-20.1,12.4c-0.8,0.5-15.5,12.9-16.7,12.4c1-0.7-1-18,2.5-35.2C-72.9,124.2-85.9,117.7-85.5,117.4z"></path>
	</g>
	<path style="fill:#FCBA25;" d="M13.8,24.8c3.3-3.1,7.3-8.5,8.3-6.3C23.2,20.7,41,39.7,41,39.7s-13.4,10.9-14.7,8.7   c-1.3-2.2-13.2-18-13.2-19.3S13.8,24.8,13.8,24.8"></path>
	<path style="fill:#FCBA25;" d="M123.2-2.1c-2.3,5-12.5,16.2-16.7,15.8s-3.9,9-0.7,9.4c3.2,0.5,14.7,0,18.8-6.8S130,3.3,130,3.3   L123.2-2.1"></path>
	<path style="fill:#FCBA25;" d="M268.7,6.2c5.3-4.4,9.6-6.7,9.6-6.7s19.3,13.7,16.7,17.2c-2.6,3.5-6.6,9.2-8.8,8.3   C284,24.2,268.7,6.2,268.7,6.2z"></path>
	<path style="fill:#FCBA25;" d="M329,13c4.2-3.4,9.3-5.9,9.3-5.9h19c0,0,4.2,10.6,2.1,10.6c-2.1,0-21.7,6.8-23,8.4   c-1.3,1.7-4.2,0.6-5.5-0.2C329.7,25,329,13,329,13z"></path>
	<path style="fill:#FCBA25;" d="M366.9,172.2c6.2-1.4,22.1,7.9,22.1,7.9l-3.1,11.9l-23-7.8L366.9,172.2z"></path>
	<path style="fill:#FCBA25;" d="M150.4,193.3c1.9-0.5,26.6-2.8,26.6-2.8s-1,12.4-2.4,12.9c-1.4,0.5-18.6,3.3-21,2.9   C151.3,205.8,150.4,193.3,150.4,193.3z"></path>
	<polyline style="fill:#FCBA25;" points="26,163.2 50.8,171.8 41.7,184.6 19.8,173.2 26,163.2  "></polyline>
</g>
<g id="Fills2">
	<path style="fill:#ABC0DE;" d="M276.8,131.7c1-0.1,2-0.2,3.1-0.3c0.5,0,0.9,0,1.4,0c0.8,0,1.7,0.1,2.5,0.1c1.8,0,3.6,0.1,5.4,0   c2.2,0,4.3-0.2,6.5-0.2c2.6-0.1,5.2-0.1,7.8-0.1c2.6,0,5.1,0,7.7,0c1.3,0,2.5-0.1,3.7-0.2c1.4-0.1,1.7,0.5,2.4,1.8   c0.1,0.3,0.1,0.6,0.2,0.9c0,1.5,0.1,3.1,0.1,4.6c0,1.1-0.1,3.4-0.1,4.4c0,1-0.1,2-0.1,2.9c0,0.1,0,0.2-0.1,0.3   c-0.9,1,0.5,1.6-1.2,1.7c-4.2,0.3-8.3,0.4-12.5-0.1c-2.2-0.2-4.3-0.3-6.5-0.5c-2.6-0.2-5.2-0.2-7.7-0.4c-1.8-0.2-3.6,0-5.4,0.1   c-3.4,0.1-6.8,0.2-10.2,0.4c-1.7,0.1-3.4,0.1-5.1,0.2c-1.1,0-2.1-0.1-3.2-0.1c-2.6,0-7.8,0.2-10.4,0.1c-0.2,0-0.5,0-0.7,0   c-0.2,0-0.4-0.2-0.4-0.3c0.2-0.7-0.5-1.1-0.7-1.7c-0.1-0.2-0.2-0.5-0.2-0.7c-0.1-1.5,0.4-3.9,0.3-5.4c0-1.1,0-2.1,0-3.2   c0-0.7,0.2-1.1,0.8-1.4c0.3-0.2,0.6-0.5,0.8-0.8c0.4-0.5,0.8-1.2,1.3-1.7c1.3-1.3,2.6-2.5,3.8-3.8c1.5-1.5,3-3,4.4-4.6   c2-2.1,4-4.3,6-6.5c1.3-1.4,2.6-2.9,3.9-4.3c2-2.2,4.1-4.3,6.1-6.5c1.2-1.3,2.4-2.7,3.7-4c2.5-2.5,5-5,7.4-7.6c1.9-2,3.8-3.9,5.6-6   c2.1-2.4,3.4-5.2,4.4-8.2c0.1-0.2,0.1-0.5,0.2-0.7c0.5-1.3,0.5-2.7,0.2-4c-0.3-1.4-0.5-2.7-1.1-4c-0.2-0.5-0.5-0.9-0.9-1.2   c-2.3-1.9-4.8-3.3-7.8-4c-1.7-0.4-3.5-0.6-5.2-0.6c-1.2-0.1-2.2,0.4-3.3,0.9c-2.5,1-4.8,2.3-7,3.8c-1.5,1.1-2.9,2.3-4.4,3.5   c-0.9,0.8-1.9,1.6-2.7,2.4c-0.8,0.8-1.5,1.6-2.3,2.4c-0.5,0.6-1,1.1-1.6,1.7c-0.3,0.3-0.7,0.4-1.1,0.2c-1.3-0.5-1.8-0.2-3-1.1   c-1.2-1-2.4-2-3.6-2.9c-1-0.8-2.8-0.7-2.8-2c0-0.2-0.3-2-0.2-2.1c0.7-1.1,1-2,2-3c0.7-0.7,1.1-1.7,1.9-2.4c1.1-1,2.2-1.9,3.4-2.8   c1.6-1.3,4.5-3.4,6.2-4.6c1.3-1,2.7-1.9,4.1-2.8c0.6-0.4,1.3-0.6,2-0.9c1.4-0.6,2.6-1.3,4.1-1.6c1.6-0.3,3.1-0.7,4.7-1.1   c0.2,0,0.3-0.1,0.5-0.2c0.6-0.1,1.2-0.4,1.8-0.4c2.3,0.1,4.6-0.1,6.8,0.3c2.5,0.4,4.9,1,7.2,2c2.8,1.1,5.5,2.4,8,4.2   c0.5,0.3,0.9,0.7,1.3,1.1c1,1.2,2,2.5,3.1,3.6c1.3,1.3,1.2,3.3,1.8,5c0.5,1.4,0.6,2.8,1,4.2c0.3,1,0.2,2,0.1,3.1   c-0.1,0.8-0.1,1.7,0,2.5c0.2,1.7,0.1,3.3-0.1,5c-0.1,0.5-0.3,0.9-0.4,1.4c-0.7,2.5-0.8,4.5-2,6.7c-0.9,1.7-1.9,3.4-3,5   c-2.4,3.3-5.2,6.3-8.2,9.1c-1.2,1.1-2.3,2.4-3.5,3.7c-1.1,1.2-2.2,2.3-3.2,3.5c-1.4,1.4-2.7,2.9-4.1,4.3c-0.8,0.8-1.7,1.6-2.5,2.5   c-0.8,0.8-1.5,1.7-2.3,2.5c-0.3,0.4-0.6,0.7-1,1c-2,1.9-4,3.8-6,5.7c-0.7,0.7-1.4,1.4-2.1,2.1c-0.1,0.1-0.2,0.3-0.3,0.4   C276.8,131.6,276.8,131.6,276.8,131.7z"></path>
	<path style="fill:#ABC0DE;" d="M111.9,130.6c0.5,0,0.9,0.1,1.3,0c1.5-0.3,3.1-0.3,4.6-0.2c2.5,0.1,5,0.1,7.5,0.1   c3.2,0,6.3-0.2,9.5-0.3c3.5-0.1,7,0,10.5-0.1c1.2,0,2.5,0,3.7-0.2c1.6-0.2,2.3,1,2.5,2.1c0.2,1,0.2,2.1,0.2,3.2c0,1.9,0,3.9,0,5.8   c0,0.8-0.3,1.5-0.1,2.3c0,0.1,0,0.3,0,0.3c-0.9,1-1.5,2.2-3.1,2.3c-4.1,0.4-8.2,0.4-12.2-0.1c-2.1-0.2-4.3-0.3-6.4-0.5   c-2.5-0.2-5-0.2-7.5-0.4c-1.7-0.2-3.5,0-5.2,0.1c-3.3,0.1-6.5,0.2-9.8,0.4c-1.7,0.1-3.3,0.1-5,0.2c-1,0-2-0.1-3-0.1   c-2.6,0-5.1-0.1-7.7-0.1c-0.8,0-0.8,0-1.1-0.8c0-0.1,0-0.2-0.1-0.2c-1.1-1.3-0.9-2.9-1-4.4c-0.1-1.7,0-3.4,0-5.1   c0-0.6,0.2-1,0.8-1.3c0.3-0.2,0.6-0.4,0.8-0.7c0.6-1.1,1.4-2,2.3-2.8c1.8-1.9,3.6-3.7,5.4-5.5c1.6-1.7,3.1-3.4,4.7-5.2   c1.9-2.1,3.8-4.2,5.6-6.4c2-2.3,4.1-4.6,6.2-6.9c2-2.2,3.9-4.3,5.9-6.4c1.9-2,3.8-4,5.7-6c1.8-1.9,3.6-3.8,5.3-5.8   c2-2.4,3.4-5.3,4.3-8.3c0.1-0.2,0.1-0.5,0.2-0.7c0.5-1.3,0.5-2.7,0.2-4c-0.2-1.1-0.4-2.3-0.8-3.4c-0.4-1-0.9-1.7-1.7-2.4   c-2.1-1.6-4.4-2.8-6.9-3.5c-1.7-0.4-3.3-0.5-5-0.6c-1.1-0.1-2.2,0.4-3.2,0.9c-2.4,1-4.7,2.3-6.8,3.8c-1.5,1-2.8,2.3-4.2,3.4   c-0.9,0.8-1.8,1.6-2.7,2.4c-0.7,0.7-1.3,1.5-2,2.2c-0.6,0.6-1.1,1.3-1.7,1.9c-0.3,0.4-0.8,0.4-1.2,0.3c-1.5-0.5-2.8-1.2-4-2.3   c-0.9-0.8-1.8-1.6-2.8-2.3c-0.6-0.5-1.2-1.1-1.4-1.8c-0.3-0.8-0.4-1.6,0-2.5c0.8-1.7,1.9-3,3-4.5c1.1-1.5,2.5-2.6,4-3.7   c1.7-1.3,3.3-2.6,5-3.8c1.3-0.9,2.6-1.8,3.9-2.7c0.7-0.4,1.4-0.7,2.2-1.1c1.3-0.6,2.6-1.3,4.1-1.6c1.5-0.3,3-0.6,4.5-1.1   c2.6-0.9,5.2-0.6,7.9-0.3c4.5,0.4,8.6,2,12.5,4.2c1.1,0.6,2.2,1.3,3.3,2c0.6,0.4,1,0.9,1.5,1.4c0.2,0.2,0.4,0.5,0.7,0.7   c0.5,0.6,1.1,1.2,1.6,1.8c0.8,1,1.6,2,2.1,3.2c0.8,1.7,1,3.4,1.5,5.2c0.1,0.5,0.3,1.1,0.3,1.6c0.1,0.6,0.2,1.3,0.1,1.8   c-0.2,1.1-0.1,2.2,0,3.3c0.1,1.7,0.1,3.3-0.1,5c-0.1,0.5-0.3,0.9-0.4,1.4c-0.6,2.5-1.5,4.8-2.6,7.1c-1.1,2.2-2.3,4.4-3.9,6.3   c-2.2,2.7-4.4,5.4-7,7.8c-1.2,1.1-2.2,2.4-3.3,3.6c-1,1.1-2.1,2.3-3.1,3.4c-1.4,1.5-2.7,3-4.1,4.4c-0.8,0.8-1.6,1.6-2.3,2.4   c-0.8,0.9-1.5,1.8-2.3,2.7c-0.3,0.3-0.6,0.7-0.9,1c-1.9,1.9-3.9,3.7-5.8,5.6c-0.7,0.7-1.4,1.5-2.1,2.2   C112.2,130.2,112.1,130.3,111.9,130.6z"></path>
	<path style="fill:#ABC0DE;" d="M245.5,136.2c-0.1,1.1-0.3,2.1-0.4,3.1c-0.1,1-0.9,1.7-1.4,2.5c-0.9,1.5-2.2,2.3-3.7,3.1   c-2,1.1-4,1.4-6.2,0.5c-1.6-0.6-3-1.5-4.3-2.7c-0.7-0.7-1.4-1.4-2-2.2c-0.3-0.4-0.5-0.9-0.6-1.4c-0.2-0.7-0.3-1.4-0.5-2.1   c-0.4-2-0.1-3.9,0.7-5.8c0.2-0.5,0.6-1,1.1-1.4c0.8-0.8,1.7-1.5,2.6-2.2c1.4-1.1,3-1.5,4.7-1.4c2,0,3.8,0.6,5.4,1.8   c0.8,0.6,1.5,1.3,2.1,2c0.9,1.2,1.7,2.5,2,4C245.3,134.8,245.4,135.5,245.5,136.2z"></path>
	<path style="fill:#ABC0DE;" d="M226.7,109.2c-0.2-1.1-0.3-2.1-0.8-3.1c-0.2-0.5-0.4-1-0.5-1.6c-0.3-1.5-0.9-2.8-1.8-4   c-1-1.4-1.9-2.9-3-4.2c-1.4-1.8-2.9-3.5-4.7-4.9c-2.2-1.7-4.7-2.7-7-4.1c-0.1,0-0.1-0.1-0.2-0.1c-1.6-0.5-3.2-1.3-4.9-1.7   c-2-0.4-3.9-1-6-1c-1.2,0-2.3,0-3.5,0c-2.5-0.1-5,0.4-7.4,1.1c-1.4,0.4-2.8,0.8-4.1,1.3c-1.5,0.6-2.9,1.2-4.3,1.9   c-1.9,1-3.5,2.5-5.1,4.1c-0.2,0.3-0.5,0.5-0.8,0.8c-0.1-0.1-0.2-0.1-0.2-0.2c0.1-0.4,0.2-0.9,0.4-1.3c0.8-1.8,1.6-3.6,2.5-5.4   c1.8-3.7,4.3-6.7,7.2-9.6c2.2-2.2,4.7-4.2,7.3-6c1.2-0.8,2.3-1.7,3.5-2.5c0.3-0.2,0.6-0.4,0.9-0.6c1.4-0.8,2.8-1.6,4.2-2.4   c1.5-0.9,3.1-1.7,4.7-2.3c1.6-0.6,3.2-1.4,4.8-2.1c0.7-0.3,1.4-0.8,2.1-0.8c1.4-0.1,2.6-0.7,3.9-0.9c0.4,0,0.9-0.2,1.3-0.2   c0.8-0.1,0.9-0.1,1.1-0.8c0.1-0.3,0.1-0.7,0.1-1c-0.1-1.8-0.3-3.6-0.4-5.4c-0.1-1.2-0.4-1.4-1.5-1.4c-0.3,0-0.5,0.1-0.8,0.1   c-0.8,0.1-1.6,0.2-2.4,0.2c-1.9-0.2-3.7,0.1-5.6,0.4c-0.5,0.1-0.9,0.3-1.4,0.4c-1.4,0.4-2.8,0.6-4.2,1.1c-2.7,0.9-5.4,1.8-8.1,2.7   c-3.3,1.2-6.6,2.6-9.5,4.6c-1.6,1.1-3.1,2.4-4.7,3.7c-2.3,2-4.4,4.2-6.3,6.6c-2.2,3-4.2,6.1-5.8,9.5c-1.9,4.2-4,8.3-5.3,12.7   c-1,3.4-1.5,6.9-2,10.4c-0.3,1.8-0.2,3.6-0.3,5.4c0,3.1,0.2,6.2,1,9.3c0.2,0.8,0.5,1.7,0.8,2.5c0.5,1.5,1,3,1.5,4.5   c0.2,0.6,0.4,1.2,0.7,1.7c0.8,1.6,1.6,3.1,2.5,4.7c1.4,2.3,3,4.4,5,6.3c0.7,0.6,1.3,1.3,2,1.9c1,0.8,1.9,1.8,3,2.5   c1.5,0.9,3,1.7,4.6,2.5c0.4,0.2,0.7,0.4,1.1,0.5c2,0.7,4,1.3,6.1,1.5c2,0.3,3.9,0.5,5.9,0.3c2.3-0.2,4.5-0.5,6.8-1   c2-0.4,4-1.1,5.8-1.9c0.5-0.2,0.9-0.4,1.4-0.6c0.6-0.3,1.2-0.5,1.8-0.8c0.5-0.2,0.9-0.5,1.4-0.7c2.2-0.9,4-2.3,5.7-3.9   c1.4-1.3,2.6-2.9,3.9-4.3c2.2-2.4,3.6-5.2,4.9-8.1c0.7-1.5,1.1-3.2,1.5-4.8C226.8,116.8,227.4,113,226.7,109.2z M215.9,114.6   c-0.1,2.5-1,4.7-1.8,7c-0.7,2.1-2,3.8-3.3,5.4c-1.2,1.5-2.4,3-3.8,4.3c-1.9,1.9-4.3,3.2-6.9,3.8c-0.9,0.2-1.8,0.5-2.8,0.7   c-1,0.1-2,0.2-3,0.1c-1.8-0.1-3.5-0.1-5.3-0.4c-2.2-0.3-4.4-0.8-6.4-1.7c-0.4-0.2-0.8-0.4-1.1-0.7c-1.4-1.3-2.8-2.5-4-4.1   c-0.9-1.2-1.7-2.5-2.5-3.8c-1.4-2.5-2.3-5.2-3.1-7.9c0-0.1,0-0.2,0-0.2c-0.8-1.7-0.4-3.5-0.2-5.3c0.4-2.9,1.9-5.3,3.6-7.6   c1.7-2.3,3.7-4.3,6-5.9c1.6-1.2,3.4-2.2,5.4-2.8c1-0.3,2-0.6,3-1c1.3-0.4,2.6-0.7,4-0.5c0.3,0,0.6,0,1,0c3.2-0.2,6.2,0.9,9.1,2.4   c1.7,0.9,3.4,1.9,5,3c1.2,0.9,2.3,1.9,3.2,3.2c0.5,0.7,1,1.4,1.5,2c0.8,1.1,1.2,2.3,1.5,3.5c0.2,0.6,0.5,1.2,0.7,1.7   c0.2,0.5,0.4,1,0.4,1.5C216.1,112.6,215.9,113.6,215.9,114.6z"></path>
	<path style="fill:#FCBA25;" d="M439.9,102.6c-16.1-3.2-31.6-8.9-47.4-13.3s-32.5-8.1-48.7-5.8c3.4,2.3,5.5,4.5,8.9,6.8   c-5.3,1.7-9,4.5-13.9,7c4.2,1.4,8.4,2.7,12.6,4.1c-4.5,1.6-9.2,3.8-13.4,6c3.6,1.9,6.3,5.2,9.9,7.1c-3.6,2.6-5.9,4.5-9.5,7.1   c12.3-0.3,24.9-1.6,36.8,1.4c16,4,32,15.6,48.2,19.2c19.5,4.3,38.9-0.4,58.3,4c10.6,2.4,16.5,4.4,26.1,9.5c-1.3-5-0.1-8.8-3-13.1   c-1.3-2-2.9-4-3.4-6.3c-1.5-6.1,2.4-15.1,0-20.9c-2.2-5.5-8.8-4.9-13.8-6.2C472,105.3,455.4,105.7,439.9,102.6z"></path>
	<g>
		<path style="fill:#FCBA25;" d="M-80.9,116.3c10.1-5.5,36.1-21.8,46.7-26.2c13-5.3,26.7-8.6,41-7.7c5.5,0.4,11.1,0.3,16.7,0.9    c6.4,0.7,12.7,2.3,19.1,2.8c7.1,0.5,12.4,0.2,19.6,0.3c3.7,0.1,7.5,0.2,11.2,0.5c0.7,0.1,3.3-0.9,4-0.4c-0.6,0.6-1.8,1.8-2.5,2.2    c-4.1,2.1-7.6,5.6-12.7,8.2c3.9,1.3,10.7,2.3,13.6,3.3c1,0.4-1.7,0.6-0.7,1.2c0.8,0.4,1.4,1.2,2.1,1.8c-0.9,0.5-1.8,1.1-2.8,1.5    c-4,1.5-7.5,2.9-12.1,4.7c7.1,3,12.1,4.8,18.5,7.5c-0.1,0.4-0.1,0.8-0.2,1.1c-3.8,1.1-6.6,3.4-10.5,4.4c-9.4,2.6-18.9,2-28.4,1    c-7.6-0.9-15.2-2.2-22.7-3.3c-9.2-1.3-17.6,1.9-26,4.4c-4.1,1.2-8.2,2.4-12,4.2c-6.6,3.3-12.9,7-19.2,10.7    c-6.8,3.9-13.5,8.1-20.3,12c-0.8,0.5-15,13.5-16.2,13c1.1-0.7-1.4-18.9,2.4-36C-70.9,121-81.4,116.5-80.9,116.3z"></path>
	</g>
	<path style="fill:#FCBA25;" d="M17.3,20.8c3.8-2.5,8.5-2.8,9.2-0.4c0.7,2.4,13.5,18.5,13.5,18.5s-13.6,9.8-14.5,7.4   c-0.9-2.4-9.8-20-9.6-21.3C16.1,23.6,17.3,20.8,17.3,20.8"></path>
	<path style="fill:#FCBA25;" d="M124.9-2.6c-3.1,4.8-13.6,14.5-17.9,13.4c-4.3-1-4.8,10-1.5,11c3.2,1,13.9,2,19.2-4.4   s8.3-13.7,8.3-13.7L124.9-2.6"></path>
	<path style="fill:#FCBA25;" d="M270.4,4.5c5.3-4.4,9.6-6.7,9.6-6.7s19.3,13.7,16.7,17.2c-2.6,3.5-8.3,9.7-10.5,8.8   C284,22.9,270.4,4.5,270.4,4.5z"></path>
	<path style="fill:#FCBA25;" d="M331.4,9.4c4.6-2.8,9.9-4.7,9.9-4.7L360.2,7c0,0,2.9,11,0.8,10.7c-2.1-0.3-24,4.7-25.4,6.2   c-1.5,1.5-3.5,1.2-4.6,0.2C329.8,23.2,331.4,9.4,331.4,9.4z"></path>
	<path style="fill:#FCBA25;" d="M369,173.7c6-2.1,21.2,2.8,21.2,2.8l-5.7,14l-20.4-5L369,173.7z"></path>
	<path style="fill:#FCBA25;" d="M154.6,194.2c1.9-0.5,24.4-5.6,24.4-5.6s-1,12.4-2.4,12.9c-1.4,0.5-18.6,3.3-21,2.9   C153.3,203.9,154.6,194.2,154.6,194.2z"></path>
	<polyline style="fill:#FCBA25;" points="27.9,161.3 52.7,169.9 43.6,182.7 21.7,171.3 27.9,161.3  "></polyline>
</g>
<g id="Fills3">
	<path style="fill:#ABC0DE;" d="M275.8,131.1c1-0.1,2-0.2,3.1-0.3c0.5,0,0.9,0,1.4,0c0.8,0,1.7,0.1,2.5,0.1c1.8,0,3.6,0.1,5.4,0   c2.2,0,4.3-0.2,6.5-0.2c2.6-0.1,5.2-0.1,7.8-0.1c2.6,0,5.1,0,7.7,0c1.3,0,2.5-0.1,3.7-0.2c1.4-0.1,1.7,0.5,2.4,1.8   c0.1,0.3,0.1,0.6,0.2,0.9c0,1.5,0.1,3.1,0.1,4.6c0,1.1,0,2.1,0,3.2c0,1-0.1,2-0.1,2.9c0,0.1,0,0.2-0.1,0.3c-0.9,1-1.7,2.2-3.4,2.3   c-4.2,0.3-8.3,0.4-12.5-0.1c-2.2-0.2-4.3-0.3-6.5-0.5c-2.6-0.2-5.2-0.2-7.7-0.4c-1.8-0.2-3.6,0-5.4,0.1c-3.4,0.1-6.8,0.2-10.2,0.4   c-1.7,0.1-3.4,0.1-5.1,0.2c-1.1,0-2.1-0.1-3.2-0.1c-2.6,0-5.2-0.1-7.8-0.1c-0.2,0,0.2-0.2-0.7,0c-0.2,0-0.4-0.2-0.4-0.3   c0.2-0.7-0.5-1.1-0.7-1.7c-0.1-0.2-0.2-0.5-0.2-0.7c-0.1-1.5-0.2-3-0.2-4.5c0-1.1,0-2.1,0-3.2c0-0.7,0.2-1.1,0.8-1.4   c0.3-0.2,0.6-0.5,0.8-0.8c0.4-0.5,0.8-1.2,1.3-1.7c1.3-1.3,2.7-2.2,4-3.4c1.5-1.5,3-3,4.4-4.6c2-2.1,4-4.3,6-6.5   c1.3-1.4,2.6-2.9,3.9-4.3c2-2.2,4.1-4.3,6.1-6.5c1.2-1.3,2.4-2.7,3.7-4c2.5-2.5,5-5,7.4-7.6c1.9-2,3.8-3.9,5.6-6   c2.1-2.4,3.3-5.6,4.2-8.6c0.1-0.2,0.1-0.5,0.2-0.7c0.5-1.3,0.5-2.7,0.2-4c-0.3-1.4-0.5-2.7-1.1-4c-0.2-0.5-0.5-0.9-0.9-1.2   c-2.3-1.9-4.8-3.3-7.8-4c-1.7-0.4-3.5-0.6-5.2-0.6c-1.2-0.1-2.2,0.4-3.3,0.9c-2.5,1-4.8,2.3-7,3.8c-1.5,1.1-2.9,2.3-4.4,3.5   c-0.9,0.8-1.9,1.6-2.7,2.4c-0.8,0.8-1.5,1.6-2.3,2.4c-0.5,0.6-1,1.1-1.6,1.7c-0.3,0.3-0.7,0.4-1.1,0.2c-1.3-0.5-2.7-1-3.8-1.9   c-1.2-1-2.4-2-3.6-2.9c-1-0.8-1.4-2-1.4-3.3c0-0.2,0-0.4,0.1-0.5c0.7-1.1,1.1-2.5,2.1-3.5c0.7-0.7,1.3-1.6,2-2.3   c1.1-1,2.2-1.9,3.4-2.8c1.6-1.3,3.3-2.5,5-3.8c1.3-1,2.7-1.9,4.1-2.8c0.6-0.4,1.3-0.6,2-0.9c1.4-0.6,2.6-1.3,4.1-1.6   c1.6-0.3,3.1-0.7,4.7-1.1c0.2,0,0.3-0.1,0.5-0.2c0.6-0.1,1.2-0.4,1.8-0.4c2.3,0.1,4.6-0.1,6.8,0.3c2.5,0.4,4.9,1,7.2,2   c2.8,1.1,5.5,2.4,8,4.2c0.5,0.3,0.9,0.7,1.3,1.1c1,1.2,2,2.5,3.1,3.6c1.3,1.3,1.9,3,2.5,4.6c0.5,1.4,0.6,2.8,1,4.2   c0.3,1,0.2,2,0.1,3.1c-0.1,0.8-0.1,1.7,0,2.5c0.2,1.7,0.1,3.3-0.1,5c-0.1,0.5-0.3,0.9-0.4,1.4c-0.7,2.5-1.5,4.9-2.7,7.1   c-0.9,1.7-1.9,3.4-3,5c-2.4,3.3-5.2,6.3-8.2,9.1c-1.2,1.1-2.3,2.4-3.5,3.7c-1.1,1.2-2.2,2.3-3.2,3.5c-1.4,1.4-2.7,2.9-4.1,4.3   c-0.8,0.8-1.7,1.6-2.5,2.5c-0.8,0.8-1.5,1.7-2.3,2.5c-0.3,0.4-0.6,0.7-1,1c-2,1.9-4,3.8-6,5.7c-0.7,0.7-1.4,1.4-2.1,2.1   c-0.1,0.1-0.2,0.3-0.3,0.4C275.7,130.9,275.8,131,275.8,131.1z"></path>
	<path style="fill:#ABC0DE;" d="M109.4,131.7c0.5,0,0.9,0.1,1.3,0c1.5-0.3,3.1-0.3,4.6-0.2c2.5,0.1,5,0.1,7.5,0.1   c3.2,0,6.3-0.2,9.5-0.3c3.5-0.1,7,0,10.5-0.1c1.2,0,2.5,0,3.7-0.2c1.6-0.2,2.3,1,2.5,2.1c0.2,1,0.2,2.1,0.2,3.2c0,1.9,0,3.9,0,5.8   c0,0.8-0.3,1.5-0.1,2.3c0,0.1,0,0.3,0,0.3c-0.9,1-1.5,2.2-3.1,2.3c-4.1,0.4-8.2,0.4-12.2-0.1c-2.1-0.2-4.3-0.3-6.4-0.5   c-2.5-0.2-5-0.2-7.5-0.4c-1.7-0.2-3.5,0-5.2,0.1c-3.3,0.1-6.5,0.2-9.8,0.4c-1.7,0.1-3.3,0.1-5,0.2c-1,0-2-0.1-3-0.1   c-2.6,0-5.1-0.1-7.7-0.1c-0.8,0-0.8,0-1.1-0.8c0-0.1,0-0.2-0.1-0.2c-1.1-1.3-0.9-2.9-1-4.4c-0.1-1.7,0-3.4,0-5.1   c0-0.6,0.2-1,0.8-1.3c0.3-0.2,0.6-0.4,0.8-0.7c0.6-1.1,1.4-2,2.3-2.8c1.8-1.9,3.6-3.7,5.4-5.5c1.6-1.7,3.1-3.4,4.7-5.2   c1.9-2.1,3.8-4.2,5.6-6.4c2-2.3,4.1-4.6,6.2-6.9c2-2.2,3.9-4.3,5.9-6.4c1.9-2,3.8-4,5.7-6c1.8-1.9,3.6-3.8,5.3-5.8   c2-2.4,3.4-5.3,4.3-8.3c0.1-0.2,0.1-0.5,0.2-0.7c0.5-1.3,0.5-2.7,0.2-4c-0.2-1.1-0.4-2.3-0.8-3.4c-0.4-1-0.9-1.7-1.7-2.4   c-2.1-1.6-4.4-2.8-6.9-3.5c-1.7-0.4-3.3-0.5-5-0.6c-1.1-0.1-2.2,0.4-3.2,0.9c-2.4,1-4.7,2.3-6.8,3.8c-1.5,1-2.8,2.3-4.2,3.4   c-0.9,0.8-1.8,1.6-2.7,2.4c-0.7,0.7-1.3,1.5-2,2.2c-0.6,0.6-1.1,1.3-1.7,1.9c-0.3,0.4-0.8,0.4-1.2,0.3c-1.5-0.5-2.8-1.2-4-2.3   c-0.9-0.8-1.8-1.6-2.8-2.3c-0.6-0.5-1.2-1.1-1.4-1.8c-0.3-0.8-0.4-1.6,0-2.5c0.8-1.7,1.9-3,3-4.5c1.1-1.5,2.5-2.6,4-3.7   c1.7-1.3,3.3-2.6,5-3.8c1.3-0.9,2.6-1.8,3.9-2.7c0.7-0.4,1.4-0.7,2.2-1.1c1.3-0.6,2.6-1.3,4.1-1.6c1.5-0.3,3-0.6,4.5-1.1   c2.6-0.9,5.2-0.6,7.9-0.3c4.5,0.4,8.6,2,12.5,4.2c1.1,0.6,2.2,1.3,3.3,2c0.6,0.4,1,0.9,1.5,1.4c0.2,0.2,0.4,0.5,0.7,0.7   c0.5,0.6,1.1,1.2,1.6,1.8c0.8,1,1.6,2,2.1,3.2c0.8,1.7,1,3.4,1.5,5.2c0.1,0.5,0.3,1.1,0.3,1.6c0.1,0.6,0.2,1.3,0.1,1.8   c-0.2,1.1-0.1,2.2,0,3.3c0.1,1.7,0.1,3.3-0.1,5c-0.1,0.5-0.3,0.9-0.4,1.4c-0.6,2.5-1.5,4.8-2.6,7.1c-1.1,2.2-2.3,4.4-3.9,6.3   c-2.2,2.7-4.4,5.4-7,7.8c-1.2,1.1-2.2,2.4-3.3,3.6c-1,1.1-2.1,2.3-3.1,3.4c-1.4,1.5-2.7,3-4.1,4.4c-0.8,0.8-1.6,1.6-2.3,2.4   c-0.8,0.9-1.5,1.8-2.3,2.7c-0.3,0.3-0.6,0.7-0.9,1c-1.9,1.9-3.9,3.7-5.8,5.6c-0.7,0.7-1.4,1.5-2.1,2.2   C109.7,131.3,109.6,131.4,109.4,131.7z"></path>
	<path style="fill:#ABC0DE;" d="M242.4,137.4c-0.1,1-0.2,2-0.4,3c-0.1,1-0.9,1.6-1.3,2.4c-0.8,1.4-2.1,2.2-3.5,2.9   c-1.9,1-3.7,1.3-5.9,0.5c-1.5-0.6-2.8-1.5-4-2.5c-0.7-0.6-1.3-1.3-1.9-2.1c-0.3-0.4-0.5-0.9-0.6-1.4c-0.2-0.6-0.3-1.3-0.4-2   c-0.4-1.9-0.1-3.7,0.7-5.4c0.2-0.5,0.6-1,1-1.4c0.8-0.7,1.6-1.4,2.5-2.1c1.3-1,2.8-1.4,4.5-1.4c1.9,0,3.6,0.6,5.1,1.7   c0.7,0.5,1.4,1.2,2,1.9c0.8,1.1,1.6,2.4,1.9,3.8C242.2,136,242.3,136.7,242.4,137.4z"></path>
	<path style="fill:#ABC0DE;" d="M225.5,110.3c-0.2-1.1-0.3-2.1-0.8-3.1c-0.2-0.5-0.4-1-0.5-1.6c-0.3-1.5-0.9-2.8-1.8-4   c-1-1.4-1.9-2.9-3-4.2c-1.1-1.4-2.5-3.2-4.7-4.9c-2.2-1.7-4.8-1.9-7.1-3.3c-0.1,0-0.1-0.1-0.2-0.1c-1.6-0.5-3.2-1.3-4.9-1.7   c-2-0.4-3.9-1-6-1c-1.2,0-2.3,0-3.5,0c-2.5-0.1-5,0.4-7.4,1.1c-1.4,0.4-2.8,0.8-4.1,1.3c-1.5,0.6-2.9,1.2-4.3,1.9   c-1.9,1-3.5,1.7-5,3.3c-0.2,0.3-0.5,0.5-0.8,0.8c-0.1-0.1-0.2-0.1-0.2-0.2c0.1-0.4,0.2-0.9,0.4-1.3c0.8-1.8,1.6-3.6,2.5-5.4   c1.8-3.7,4.3-6.7,7.2-9.6c2.2-2.2,4.7-4.2,7.3-6c1.2-0.8,2.3-1.7,3.5-2.5c0.3-0.2,0.6-0.4,0.9-0.6c1.4-0.8,2.8-1.6,4.2-2.4   c1.5-0.9,3.1-1.7,4.7-2.3c1.6-0.6,3.2-1.4,4.8-2.1c0.7-0.3,1.4-0.8,2.1-0.8c1.4-0.1,2.6-0.7,3.9-0.9c0.4,0,0.9-0.2,1.3-0.2   c0.8-0.1,0.9-0.1,1.1-0.8c0.1-0.3,0.1-0.7,0.1-1c-0.1-1.8-0.3-3.6-0.4-5.4c-0.1-1.2-0.4-1.4-1.5-1.4c-0.3,0-0.5,0.1-0.8,0.1   c-0.8,0.1-1.6,0.2-2.4,0.2c-1.9-0.2-3.7,0.1-5.6,0.4c-0.5,0.1-0.9,0.3-1.4,0.4c-1.4,0.4-2.8,0.6-4.2,1.1c-2.7,0.9-5.4,1.8-8.1,2.7   c-3.3,1.2-6.6,2.6-9.5,4.6c-1.6,1.1-3.1,2.4-4.7,3.7c-2.3,2-4.4,4.2-6.3,6.6c-2.2,3-4.2,6.1-5.8,9.5c-1.9,4.2-4,8.3-5.3,12.7   c-1,3.4-1.5,6.9-2,10.4c-0.3,1.8-0.2,3.6-0.3,5.4c0,3.1,0.2,6.2,1,9.3c0.2,0.8,0.5,1.7,0.8,2.5c0.5,1.5,1,3,1.5,4.5   c0.2,0.6,0.4,1.2,0.7,1.7c0.8,1.6,1.6,3.1,2.5,4.7c1.4,2.3,3,4.4,5,6.3c0.7,0.6,1.3,1.3,2,1.9c1,0.8,1.9,1.8,3,2.5   c1.5,0.9,3,1.7,4.6,2.5c0.4,0.2,0.7,0.4,1.1,0.5c2,0.7,4,1.3,6.1,1.5c2,0.3,3.9,0.5,5.9,0.3c2.3-0.2,4.5-0.5,6.8-1   c2-0.4,4-1.1,5.8-1.9c0.5-0.2,0.9-0.4,1.4-0.6c0.6-0.3,1.2-0.5,1.8-0.8c0.5-0.2,0.9-0.5,1.4-0.7c2.2-0.9,4-2.3,5.7-3.9   c1.4-1.3,2.6-2.9,3.9-4.3c2.2-2.4,3.6-5.2,4.9-8.1c0.7-1.5,1.1-3.2,1.5-4.8C225.6,117.9,226.2,114.2,225.5,110.3z M214.7,115.8   c-0.1,2.5-1,4.7-1.8,7c-0.7,2.1-2,3.8-3.3,5.4c-1.2,1.5-2.4,3-3.8,4.3c-1.9,1.9-4.3,3.2-6.9,3.8c-0.9,0.2-1.8,0.5-2.8,0.7   c-1,0.1-2,0.2-3,0.1c-1.8-0.1-3.5-0.1-5.3-0.4c-2.2-0.3-4.4-0.8-6.4-1.7c-0.4-0.2-0.8-0.4-1.1-0.7c-1.4-1.3-2.8-2.5-4-4.1   c-0.9-1.2-1.7-2.5-2.5-3.8c-1.4-2.5-2.3-5.2-3.1-7.9c0-0.1,0-0.2,0-0.2c-0.8-1.7-0.4-3.5-0.2-5.3c0.4-2.9,1.9-5.3,3.6-7.6   c1.7-2.3,3.7-4.3,6-5.9c1.6-1.2,3.4-2.2,5.4-2.8c1-0.3,2-0.6,3-1c1.3-0.4,2.6-0.7,4-0.5c0.3,0,0.6,0,1,0c3.2-0.2,6.2,0.9,9.1,2.4   c1.7,0.9,3.4,1.9,5,3c1.2,0.9,2.3,1.9,3.2,3.2c0.5,0.7,1,1.4,1.5,2c0.8,1.1,1.2,2.3,1.5,3.5c0.2,0.6,0.5,1.2,0.7,1.7   c0.2,0.5,0.4,1,0.4,1.5C214.9,113.8,214.7,114.8,214.7,115.8z"></path>
	<path style="fill:#FCBA25;" d="M438,103.6c-16.1-3.2-31.6-8.9-47.4-13.3c-15.8-4.4-32.4-7.5-48.6-5.2c3.4,2.3,7.3,2.9,10.7,5.2   c-5.3,1.7-10.9,5.5-15.8,8c4.2,1.4,8.4,2.7,12.6,4.1c-4.5,1.6-8.8,3.6-13.1,5.8c3.6,1.9,7.2,3.8,10.8,5.7   c-3.6,2.6-7.2,5.3-10.8,7.9c12.3-0.3,24.9-0.6,36.8,2.4c16,4,30.3,13.8,46.4,17.4c19.5,4.3,40.1-0.8,59.5,3.6   c10.6,2.4,20.3,7.6,29.9,12.8c-1.3-5-3.5-9.8-6.3-14.1c-1.3-2-2.9-4-3.4-6.3c-1.5-6.1,4.9-12.1,2.6-17.9c-2.2-5.5-12-6.8-17-8.1   C469.5,107.5,453.5,106.7,438,103.6z"></path>
	<g>
		<path style="fill:#FCBA25;" d="M-82.5,112.9c10-5.7,35.2-17.6,45.7-22.2c12.9-5.5,26.5-9.1,40.8-8.4c5.6,0.3,11.1,0.1,16.7,0.6    c6.4,0.6,12.8,2.1,19.2,2.5c7.2,0.4,14.4,0,21.5,0c3.7,0,7.5,0,11.2,0.3c0.7,0,1.4,1,2.1,1.5c-0.6,0.6-1.1,1.4-1.8,1.8    c-4,2.2-7.8,5.3-12.9,8c4,1.3,6.6,1.1,9.5,2.1c1.1,0.3,2.2,0.6,3.1,1.1c0.8,0.4,1.4,1.2,2.1,1.8c-0.9,0.5-1.8,1.2-2.7,1.6    c-3.9,1.6-8.6,4.3-13.1,6.1c7.2,2.9,14.3,4.4,20.8,7c-0.1,0.4-0.1,0.8-0.2,1.1c-3.8,1.2-7.3,3.1-11.1,4.2    c-9.3,2.8-19.1,1.7-28.6,0.8c-7.6-0.7-15.2-2-22.8-2.9c-9.2-1.2-17.5,2.2-26,4.9c-4,1.3-8.2,2.5-11.9,4.4c-6.5,3.4-12.7,7.2-19,11    c-6.7,4.1-13.4,8.3-20.1,12.4c-0.8,0.5-14.7,13.7-16,13.3c1-0.7-1.7-18.9,1.7-36C-70.7,111.3-91.9,118.3-82.5,112.9z"></path>
	</g>
	<path style="fill:#FCBA25;" d="M13.8,23c3.3-3.1,8.9-6.8,10-4.6c1.1,2.3,17.4,20.3,17.4,20.3s-13.5,10.1-14.8,7.9   c-1.3-2.2-13.2-18-13.2-19.3C13.1,26,13.8,23,13.8,23"></path>
	<path style="fill:#FCBA25;" d="M122.8-4c-2.4,5.2-13.2,17-17.6,16.6c-4.4-0.4-2.6,10.3,0.7,10.7c3.3,0.5,11.3-1.6,17.8-6.9   c6.2-5.1,10.9-9.8,6.2-14.8L122.8-4"></path>
	<path style="fill:#FCBA25;" d="M270.2,5.5c5.3-4.4,8-7.7,8-7.7S297.6,11.5,295,15c-2.6,3.5-9.5,10.9-10.5,8.8   C283.8,22.5,272,5,270.2,5.5z"></path>
	<path style="fill:#FCBA25;" d="M329,11.3c4.2-3.4,9.3-5.9,9.3-5.9h19c0,0,4.2,10.6,2.1,10.6c-2.1,0-23.2,7.6-24.5,9.3   c-1.3,1.7-1.7,1.3-3,0.4C330.7,24.8,329,11.3,329,11.3z"></path>
	<path style="fill:#FCBA25;" d="M367.5,173.3c6.2-1.4,22.8,4.5,22.8,4.5l-4.8,14.5l-23.1-7.3L367.5,173.3z"></path>
	<path style="fill:#FCBA25;" d="M151.4,192.7c19.1-5.5,27.1-4.4,25.7-4c0,0-1,12.4-2.4,12.9c-1.4,0.5-18.6,3.3-21,2.9   S151.4,192.7,151.4,192.7z"></path>
	<polyline style="fill:#FCBA25;" points="26,161.3 50.8,169.9 41.7,182.7 19.8,171.3 26,161.3  "></polyline>
</g>
<g id="Lines">
	<path style="fill:#162B54;" d="M274.8,131.5c1.1-0.1,2.1-0.2,3.2-0.3c0.5,0,1,0,1.5,0c0.9,0,1.7,0.1,2.6,0.1c1.9,0,3.7,0.1,5.6,0   c2.2,0,4.5-0.2,6.7-0.2c2.7-0.1,5.4-0.1,8.1-0.1c2.7,0,5.3,0,8,0c1.3,0,2.6-0.1,3.9-0.2c1.4-0.1,1.8,0.6,2.4,1.9   c0.1,0.3,0.1,0.6,0.2,0.9c0,1.6,0.1,3.2,0.1,4.8c0,1.1,0,2.2,0,3.3c0,1-0.1,2-0.1,3c0,0.1,0,0.3-0.1,0.3c-1,1.1-1.7,2.3-3.5,2.4   c-4.3,0.3-8.6,0.4-12.9-0.1c-2.2-0.2-4.5-0.3-6.7-0.5c-2.7-0.2-5.3-0.2-8-0.5c-1.9-0.2-3.7,0-5.6,0.1c-3.5,0.1-7,0.2-10.5,0.4   c-1.7,0.1-3.5,0.1-5.2,0.2c-1.1,0-2.2-0.1-3.3-0.1c-2.7,0-5.4-0.1-8.1-0.1c-0.2,0-0.5,0-0.7,0c-0.2,0-0.4-0.2-0.4-0.3   c0.2-0.8-0.6-1.1-0.7-1.8c-0.1-0.3-0.2-0.5-0.2-0.7c-0.1-1.6-0.2-3.1-0.2-4.7c0-1.1,0-2.2,0-3.3c0-0.7,0.2-1.1,0.8-1.5   c0.3-0.2,0.6-0.6,0.9-0.9c0.4-0.6,0.8-1.2,1.3-1.7c1.3-1.3,2.7-2.6,4-3.9c1.5-1.6,3.1-3.2,4.6-4.8c2.1-2.2,4.1-4.5,6.2-6.7   c1.4-1.5,2.7-3,4.1-4.5c2.1-2.3,4.2-4.5,6.3-6.7c1.3-1.4,2.5-2.8,3.8-4.1c2.5-2.6,5.1-5.2,7.7-7.8c2-2,3.9-4,5.8-6.2   c2.1-2.5,3.6-5.4,4.5-8.5c0.1-0.3,0.1-0.5,0.2-0.8c0.5-1.4,0.5-2.8,0.3-4.2c-0.3-1.4-0.6-2.8-1.1-4.2c-0.2-0.5-0.5-0.9-0.9-1.3   c-2.4-2-5-3.4-8-4.2c-1.8-0.4-3.6-0.6-5.4-0.7c-1.2-0.1-2.3,0.5-3.4,0.9c-2.6,1-5,2.4-7.2,3.9c-1.6,1.1-3,2.4-4.5,3.6   c-1,0.8-1.9,1.6-2.8,2.5c-0.8,0.8-1.6,1.7-2.3,2.5c-0.5,0.6-1.1,1.2-1.6,1.8c-0.3,0.3-0.7,0.4-1.2,0.2c-1.4-0.5-2.8-1-3.9-2   c-1.2-1-2.5-2-3.7-3c-1.1-0.9-1.5-2-1.4-3.4c0-0.2,0-0.4,0.1-0.5c0.8-1.2,1.2-2.5,2.2-3.6c0.7-0.7,1.3-1.7,2.1-2.4   c1.1-1,2.3-2,3.5-2.9c1.7-1.3,3.4-2.6,5.2-3.9c1.4-1,2.8-2,4.3-2.9c0.6-0.4,1.4-0.6,2.1-0.9c1.4-0.6,2.7-1.4,4.2-1.7   c1.6-0.3,3.2-0.8,4.8-1.1c0.2,0,0.4-0.1,0.5-0.2c0.6-0.2,1.3-0.4,1.9-0.4c2.4,0.1,4.7-0.1,7.1,0.3c2.6,0.4,5.1,1.1,7.5,2   c2.9,1.1,5.7,2.5,8.3,4.3c0.5,0.3,1,0.7,1.4,1.2c1.1,1.2,2,2.6,3.2,3.7c1.3,1.4,2,3.1,2.5,4.8c0.5,1.4,0.6,2.9,1,4.3   c0.3,1.1,0.2,2.1,0.1,3.2c-0.1,0.9-0.1,1.7,0,2.6c0.2,1.7,0.1,3.4-0.1,5.1c-0.1,0.5-0.3,0.9-0.4,1.4c-0.7,2.5-1.5,5-2.8,7.4   c-0.9,1.8-1.9,3.5-3.1,5.2c-2.5,3.4-5.3,6.5-8.5,9.4c-1.3,1.2-2.4,2.5-3.6,3.8c-1.1,1.2-2.2,2.4-3.3,3.6c-1.4,1.5-2.8,3-4.2,4.5   c-0.8,0.9-1.7,1.7-2.6,2.6c-0.8,0.9-1.6,1.8-2.4,2.6c-0.3,0.4-0.7,0.7-1,1.1c-2.1,2-4.2,3.9-6.2,5.8c-0.7,0.7-1.4,1.5-2.1,2.2   c-0.1,0.1-0.2,0.3-0.3,0.4C274.8,131.3,274.8,131.4,274.8,131.5z M262.9,76.3c0.2-0.3,0.4-0.5,0.6-0.7c0.9-1.1,1.7-2.1,2.6-3.2   c0.2-0.2,0.4-0.5,0.6-0.7c1.1-1,2.1-2,3.2-2.9c1.5-1.3,3-2.6,4.6-3.7c1.5-1,3.1-1.8,4.6-2.7c0.7-0.4,1.4-0.7,2.1-0.8   c1.8-0.3,3.6-0.5,5.4-0.7c0.2,0,0.4,0,0.6,0c3.5,0.1,6.8,0.9,9.9,2.3c0.3,0.1,0.6,0.3,0.9,0.5c0.7,0.5,1.3,1,2,1.6   c0.6,0.5,1.2,1.1,1.5,2c0.3,1,0.8,2.1,1.1,3.1c0.1,0.3,0.2,0.7,0.2,1c0.4,1.9,0.1,3.9-0.1,5.8c-0.1,0.7,0,1.5-0.2,2.1   c-0.6,1.9-1,3.8-2,5.6c-0.1,0.2-0.2,0.3-0.2,0.5c-0.3,1.4-1.1,2.5-2,3.6c-0.9,1.1-1.9,2.1-2.8,3.1c-1.8,1.9-3.5,3.8-5.3,5.6   c-2.2,2.3-4.5,4.5-6.7,6.8c-1.1,1.1-2.1,2.4-3.2,3.5c-1.2,1.3-2.5,2.6-3.7,3.9c-2.3,2.5-4.6,5.1-6.9,7.6c-1.7,1.8-3.4,3.6-5,5.4   c-0.8,0.9-1.7,1.9-2.6,2.7c-1.7,1.6-3.3,3.2-5,4.8c-1.1,1-2.2,2-3.3,2.9c0,0-0.1,0-0.1,0.1c-0.6,0.5-0.9,1.1-0.9,1.9   c0,2.5,0.3,5,0.6,7.5c1.4-0.1,2.8-0.3,4.2-0.4c2.8-0.1,5.7-0.1,8.5-0.2c0.8,0,1.7,0,2.5-0.1c2.6-0.1,5.2-0.4,7.9-0.4   c5.4-0.1,10.7-0.1,16.1-0.1c4.4,0,8.8,0.4,13.2,0.8c2.6,0.3,5.2,0.1,7.8-0.1c0.7-0.1,0.8-0.2,0.8-1c0-0.7-0.1-1.4-0.1-2.2   c0-1.7,0.1-3.5,0-5.2c0-0.7-0.1-1.4-0.2-2.2c-0.2-0.8-0.3-0.8-1.1-0.7c-0.6,0.1-1.1,0.3-1.7,0.3c-3.6,0.1-7.2,0.2-10.7,0.3   c-2.2,0-4.3-0.1-6.5-0.1c-0.5,0-1,0-1.5,0c-2.2,0-4.3,0-6.5,0c-1.2,0-2.4-0.1-3.7-0.1c-1.4,0-2.7-0.1-4.1-0.1c-0.9,0-1.7,0-2.6,0   c-1.5,0.1-3,0.2-4.5,0.3c-0.7,0-1.3-0.1-1.8-0.4c0-0.6,0.3-0.8,0.7-1c0.2-0.1,0.3-0.4,0.3-0.5c-0.4-0.8,0.1-1.3,0.5-1.7   c1.7-1.8,3.3-3.7,5.1-5.4c2.8-2.8,5.8-5.3,8.4-8.2c1.3-1.5,2.7-2.8,4.1-4.3c0.4-0.4,0.8-0.9,1.2-1.3c1.2-1.2,2.5-2.3,3.7-3.5   c0.4-0.4,0.7-0.8,1.1-1.2c1.6-1.7,3.1-3.5,4.8-5.2c1.8-1.7,3.6-3.5,5.1-5.5c1.4-1.6,2.6-3.4,3.8-5.1c2-2.9,3.4-6.1,4.3-9.5   c0.2-0.7,0.4-1.3,0.5-2c0.1-2.4,0.2-4.8-0.1-7.2c-0.1-0.7-0.2-1.4-0.4-2.1c-0.4-1.2-0.6-2.5-1.3-3.6c-0.6-0.9-1.1-1.8-1.7-2.7   c-1.3-2-3-3.5-5-4.8c-1.9-1.3-4-2.3-6.1-3.3c-1.2-0.6-2.4-1.1-3.6-1.3c-3-0.6-6-0.9-9-0.7c-1.4,0-2.8,0.1-4.1,0.4   c-2.2,0.5-4.3,1.1-6.5,1.8c-3.1,1-6,2.5-8.6,4.4c-2.1,1.6-4.2,3.1-6.2,4.7c-1.1,0.8-2,1.9-2.9,2.9c-1.1,1.2-2.2,2.6-3.3,3.9   c1.4,0.1,2.5,0.9,3.6,1.7c1.1,0.8,2.2,1.7,3.3,2.5C261.9,75.7,262.4,76,262.9,76.3z"></path>
	<path style="fill:#162B54;" d="M110.6,132.3c0.5,0,1,0.1,1.4,0c1.6-0.3,3.2-0.3,4.8-0.2c2.6,0.1,5.2,0.1,7.8,0.1   c3.3,0,6.5-0.2,9.8-0.3c3.6-0.1,7.2,0,10.8-0.1c1.3,0,2.6,0,3.9-0.2c1.6-0.2,2.3,1,2.5,2.2c0.2,1.1,0.2,2.2,0.3,3.3c0,2,0,4,0,6   c0,0.8-0.3,1.6-0.1,2.4c0,0.1,0,0.3,0,0.3c-0.9,1-1.5,2.3-3.2,2.4c-4.2,0.4-8.4,0.4-12.7-0.1c-2.2-0.2-4.4-0.4-6.6-0.5   c-2.6-0.2-5.2-0.2-7.8-0.5c-1.8-0.2-3.6,0-5.4,0.1c-3.4,0.1-6.8,0.2-10.2,0.4c-1.7,0.1-3.4,0.1-5.1,0.2c-1,0-2.1-0.1-3.1-0.1   c-2.7-0.1-5.3-0.1-8-0.1c-0.9,0-0.9,0-1.1-0.9c0-0.1,0-0.2-0.1-0.2c-1.2-1.3-0.9-3-1-4.6c-0.1-1.7,0-3.5,0-5.3   c0-0.6,0.2-1.1,0.8-1.4c0.3-0.2,0.6-0.5,0.8-0.8c0.6-1.2,1.5-2,2.3-2.9c1.8-1.9,3.8-3.8,5.6-5.7c1.6-1.7,3.2-3.5,4.8-5.3   c2-2.2,3.9-4.4,5.8-6.6c2.1-2.4,4.2-4.8,6.4-7.2c2-2.2,4.1-4.4,6.1-6.6c2-2.1,4-4.1,5.9-6.2c1.8-2,3.7-3.9,5.5-6   c2.1-2.5,3.5-5.4,4.4-8.6c0.1-0.3,0.1-0.5,0.2-0.8c0.5-1.4,0.5-2.8,0.2-4.2c-0.2-1.2-0.4-2.4-0.9-3.5c-0.4-1-0.9-1.8-1.8-2.4   c-2.2-1.7-4.5-2.9-7.2-3.6c-1.7-0.4-3.5-0.6-5.2-0.7c-1.2-0.1-2.2,0.4-3.3,0.9c-2.5,1-4.9,2.4-7.1,3.9c-1.5,1.1-2.9,2.3-4.3,3.5   c-1,0.8-1.9,1.6-2.8,2.5c-0.7,0.7-1.4,1.5-2.1,2.3c-0.6,0.6-1.2,1.3-1.7,2c-0.4,0.4-0.8,0.4-1.2,0.3c-1.5-0.5-2.9-1.2-4.1-2.3   c-0.9-0.9-1.9-1.7-2.9-2.4c-0.7-0.5-1.2-1.1-1.5-1.8c-0.3-0.8-0.4-1.7,0-2.6c0.8-1.7,1.9-3.2,3.1-4.6c1.2-1.5,2.6-2.7,4.1-3.9   c1.7-1.3,3.4-2.7,5.1-4c1.3-1,2.7-1.9,4-2.8c0.7-0.4,1.5-0.8,2.2-1.1c1.4-0.6,2.7-1.4,4.2-1.7c1.5-0.3,3.1-0.6,4.6-1.1   c2.7-1,5.4-0.6,8.1-0.3c4.6,0.4,8.9,2,12.9,4.3c1.2,0.7,2.3,1.3,3.4,2.1c0.6,0.4,1,1,1.5,1.5c0.2,0.2,0.4,0.5,0.7,0.8   c0.5,0.6,1.1,1.2,1.6,1.9c0.8,1,1.6,2.1,2.2,3.3c0.8,1.7,1.1,3.6,1.5,5.4c0.1,0.6,0.3,1.1,0.3,1.7c0.1,0.6,0.2,1.3,0.1,1.9   c-0.2,1.1-0.1,2.3,0,3.4c0.2,1.7,0.1,3.4-0.1,5.1c-0.1,0.5-0.3,0.9-0.4,1.4c-0.7,2.5-1.6,5-2.7,7.4c-1.1,2.3-2.4,4.5-4,6.5   c-2.3,2.8-4.6,5.6-7.2,8.1c-1.2,1.1-2.3,2.5-3.4,3.7c-1.1,1.2-2.1,2.4-3.2,3.6c-1.4,1.5-2.8,3.1-4.3,4.6c-0.8,0.8-1.6,1.6-2.4,2.5   c-0.8,0.9-1.6,1.8-2.4,2.7c-0.3,0.3-0.6,0.7-0.9,1c-2,1.9-4,3.8-6,5.8c-0.8,0.7-1.5,1.5-2.2,2.3C110.8,131.8,110.7,132,110.6,132.3   z M90.1,145.7c1.3-0.1,2.6-0.3,3.9-0.4c2.6-0.1,5.2-0.1,7.9-0.2c2.9-0.1,5.7-0.2,8.6-0.3c2.6-0.1,5.2-0.2,7.8-0.2   c3.1,0,6.2,0,9.3,0c3.4,0,6.8,0.1,10.1,0.5c3.6,0.4,7.2,0.7,10.8,0.2c1-0.1,1.1-0.2,1.1-1.2c0-0.7-0.1-1.4-0.1-2.2   c0-1.7,0.1-3.4,0-5.1c0-0.7-0.1-1.4-0.2-2c-0.2-0.8-0.3-0.8-1.1-0.7c-1.1,0.2-2.3,0.4-3.4,0.4c-3.3,0.1-6.5,0.1-9.8,0.1   c-3.7,0-7.3,0.1-11,0c-1.8,0-3.5-0.1-5.3-0.2c-1.5,0-2.9-0.1-4.4-0.1c-0.8,0-1.6,0-2.4,0c-1.4,0.1-2.9,0.2-4.3,0.3   c-0.4,0-0.9-0.1-1.3-0.2c-0.5-0.1-0.5-0.5-0.2-0.9c0.2-0.2,0.4-0.3,0.5-0.4c0.1-0.2,0.3-0.4,0.2-0.6c-0.3-0.6,0-1,0.3-1.3   c0.4-0.5,0.8-1,1.2-1.5c3-3,5.9-6,8.9-9c0.7-0.8,1.5-1.5,2.2-2.3c1.7-1.8,3.4-3.7,5.1-5.5c0.3-0.4,0.6-0.8,1-1.1   c1.2-1.2,2.4-2.3,3.6-3.5c0.4-0.4,0.7-0.8,1.1-1.2c1.5-1.7,3-3.5,4.6-5.2c1.8-1.7,3.5-3.5,5-5.4c1.3-1.7,2.5-3.4,3.7-5.2   c2-3,3.4-6.2,4.2-9.7c0.2-0.8,0.4-1.6,0.5-2.5c0.1-2.2,0.1-4.3-0.1-6.5c-0.1-0.7-0.2-1.4-0.4-2.1c-0.4-1.2-0.7-2.5-1.2-3.7   c-0.4-1-1.1-1.9-1.7-2.8c-1.3-2-2.9-3.5-4.8-4.8c-1.8-1.2-3.8-2.2-5.8-3.2c-1.1-0.6-2.4-1.1-3.6-1.4c-3.3-0.6-6.6-0.9-10-0.7   c-1.3,0.1-2.6,0.3-3.9,0.7c-1.1,0.4-2.2,0.8-3.3,1c-1.4,0.3-2.8,0.8-4.1,1.4c-1.4,0.7-2.8,1.3-4,2.1c-2.2,1.5-4.2,3.1-6.3,4.7   c-1.4,1.1-2.9,2.2-4,3.5c-1.3,1.5-2.5,3-3.7,4.5c1.3,0.4,2.7,1.1,3.6,1.8c1.1,0.9,2.2,1.7,3.3,2.5c0.4,0.3,0.8,0.5,1.2,0.7   c0.2-0.2,0.4-0.4,0.5-0.6c0.8-1.1,1.7-2.1,2.5-3.2c0.2-0.3,0.4-0.5,0.7-0.8c0.9-0.9,1.9-1.7,2.9-2.6c1.8-1.7,3.8-3.3,5.9-4.7   c0.4-0.3,0.8-0.6,1.2-0.8c1.5-0.8,2.8-1.8,4.5-2c1.8-0.3,3.6-0.4,5.4-0.6c0,0,0.1,0,0.1,0c3.3,0.1,6.5,0.9,9.5,2.2   c0.3,0.2,0.7,0.3,1,0.6c0.6,0.5,1.2,1,1.8,1.4c0.8,0.7,1.5,1.5,1.7,2.6c0.1,0.6,0.3,1.2,0.6,1.7c0.5,1,0.6,2.1,0.8,3.2   c0.2,1.4-0.1,2.8-0.2,4.2c0,0.9-0.1,1.8-0.3,2.6c-0.5,1.8-0.9,3.7-1.9,5.3c-0.1,0.2-0.2,0.3-0.2,0.5c-0.2,1.3-1,2.4-1.8,3.4   c-1.5,1.8-3.1,3.6-4.7,5.3c-2.5,2.7-5.1,5.3-7.6,7.9c-2.5,2.6-4.8,5.3-7.3,7.9c-0.1,0.1-0.2,0.2-0.2,0.3c-2.2,2.5-4.4,5.1-6.6,7.6   c-2.1,2.4-4.2,4.7-6.3,7c-0.9,1-1.7,2-2.6,2.9c-2.7,2.7-5.2,5.4-8.2,7.8c-0.6,0.5-0.9,1.1-0.9,1.9   C89.5,140.8,89.8,143.2,90.1,145.7z"></path>
	<path style="fill:#162B54;" d="M170.2,95.1c0.3-0.3,0.5-0.5,0.8-0.8c1.6-1.6,3.2-3.1,5.2-4.2c1.4-0.8,2.9-1.4,4.5-2   c1.4-0.5,2.8-1,4.2-1.4c2.5-0.7,5-1.2,7.6-1.2c1.2,0,2.4,0,3.6,0c2.1,0.1,4.1,0.6,6.2,1.1c1.8,0.4,3.4,1.2,5.1,1.8   c0.1,0,0.1,0,0.2,0.1c2.4,1.5,5,2.5,7.3,4.3c1.9,1.5,3.5,3.2,4.9,5.1c1.1,1.4,2,2.9,3.1,4.4c0.9,1.3,1.5,2.7,1.8,4.2   c0.1,0.6,0.3,1.1,0.5,1.6c0.5,1,0.6,2.1,0.8,3.2c0.7,4,0.1,7.9-0.8,11.7c-0.4,1.7-0.9,3.4-1.6,5c-1.3,3-2.8,5.9-5,8.4   c-1.4,1.5-2.6,3.1-4,4.5c-1.8,1.7-3.7,3-5.9,4c-0.5,0.2-0.9,0.5-1.4,0.7c-0.6,0.3-1.3,0.5-1.9,0.8c-0.5,0.2-1,0.4-1.4,0.7   c-1.9,0.9-3.9,1.6-6,2c-2.3,0.5-4.6,0.8-7,1c-2.1,0.2-4.1-0.1-6.1-0.3c-2.2-0.3-4.2-0.9-6.3-1.6c-0.4-0.1-0.8-0.3-1.1-0.5   c-1.6-0.8-3.2-1.6-4.7-2.6c-1.1-0.7-2.1-1.7-3.1-2.5c-0.7-0.6-1.4-1.3-2.1-1.9c-2-2-3.7-4.1-5.1-6.5c-0.9-1.6-1.8-3.2-2.6-4.8   c-0.3-0.6-0.5-1.2-0.8-1.8c-0.5-1.5-1.1-3.1-1.6-4.6c-0.3-0.9-0.6-1.7-0.8-2.6c-0.8-3.2-1.1-6.4-1.1-9.6c0-1.9,0-3.7,0.3-5.6   c0.6-3.6,1.1-7.2,2.1-10.7c1.3-4.6,3.4-8.9,5.4-13.2c1.6-3.5,3.6-6.8,6-9.8c1.9-2.5,4.1-4.8,6.5-6.9c1.6-1.3,3.1-2.7,4.8-3.8   c3-2.1,6.3-3.6,9.8-4.8c2.8-1,5.6-1.9,8.4-2.8c1.4-0.4,2.9-0.7,4.3-1.1c0.5-0.1,0.9-0.3,1.4-0.4c1.9-0.3,3.8-0.6,5.8-0.4   c0.8,0.1,1.7-0.1,2.5-0.2c0.3,0,0.5-0.1,0.8-0.1c1.2,0,1.5,0.2,1.6,1.4c0.2,1.9,0.3,3.7,0.5,5.6c0,0.3,0,0.7-0.1,1   c-0.2,0.8-0.3,0.8-1.1,0.9c-0.5,0-0.9,0.2-1.3,0.2c-1.4,0.1-2.7,0.8-4.1,0.9c-0.8,0.1-1.5,0.5-2.2,0.8c-1.6,0.7-3.3,1.5-4.9,2.1   c-1.7,0.7-3.3,1.5-4.9,2.4c-1.4,0.8-2.9,1.6-4.4,2.5c-0.3,0.2-0.6,0.4-0.9,0.6c-1.2,0.9-2.4,1.8-3.6,2.6c-2.7,1.9-5.3,3.9-7.6,6.2   c-2.9,2.9-5.6,6.1-7.4,9.9c-0.9,1.8-1.7,3.7-2.5,5.6c-0.2,0.4-0.3,0.9-0.4,1.4C170,95,170.1,95.1,170.2,95.1z M213.1,52.4   c-0.6,0.2-1.1,0.3-1.7,0.4c-1.3,0.3-2.7,0.5-4,0.7c-0.9,0.2-1.9,0.3-2.8,0.5c-2.4,0.6-4.8,1.1-7.2,1.8c-2.3,0.6-4.5,1.5-6.6,2.6   c-0.8,0.4-1.7,0.8-2.6,1.2c-1.1,0.5-2.2,1-3.3,1.6c-0.9,0.5-1.7,1.1-2.6,1.7c-1.1,0.8-2.3,1.6-3.3,2.5c-1.3,1.2-2.5,2.5-3.7,3.7   c-2.1,2.1-4.2,4.3-5.7,6.9c-1.5,2.5-2.9,5-4.2,7.6c-1.2,2.5-2.4,5.1-3.4,7.7c-1,2.6-1.8,5.2-2.6,7.9c-1,3.6-1.4,7.3-1.7,11   c-0.1,2,0,4,0.4,5.9c0.4,1.7,0.8,3.3,1.5,4.9c1.2,3,2,6.2,3.7,9.1c0.9,1.5,1.7,3.2,2.8,4.6c1.6,2.1,3.3,4.3,5.4,6   c0.9,0.8,1.7,1.8,2.7,2.4c1.3,0.9,2.8,1.6,4.2,2.3c3.4,1.6,7.1,2.1,10.9,2.1c1.6,0,3.1-0.1,4.6-0.4c2.7-0.5,5.4-1,7.9-2   c1.5-0.6,3.2-1.1,4.6-1.9c3.1-1.7,5.7-4.2,8-6.9c0.8-0.9,1.4-1.9,2.2-2.8c0.7-0.8,1.3-1.7,1.9-2.5c0.8-1.2,1.3-2.5,2-3.7   c0.9-1.7,1.4-3.6,2-5.4c0.6-2,0.7-4,1.1-6c0.2-1.1,0.4-2.1,0.1-3.2c-0.3-1.6-0.5-3.3-1-4.9c-0.8-2.6-2-4.9-3.7-7   c-1.4-1.8-2.9-3.4-4.4-5.1c-0.1-0.1-0.2-0.2-0.3-0.3c-2.8-2.3-5.9-4.1-9.1-5.5c-3.2-1.4-6.5-2.2-9.9-2.5c-1.7-0.1-3.5-0.1-5.2,0.1   c-2.1,0.2-4.1,0.9-6.1,1.5c-1.1,0.4-2.3,0.8-3.4,1.3c-1.8,0.8-3.6,1.5-5.1,2.7c-1.1,0.9-2.2,1.8-3.2,2.7c-2.1,2-4.5,3.6-6.5,5.8   c-0.1,0.1-0.2,0.1-0.3,0.1c-0.4-0.3-0.4-0.7-0.4-1.1c0.1-0.6,0.1-1.1,0.3-1.7c0.1-0.5,0.3-1,0.4-1.5c0.4-1.4,0.7-2.9,1.1-4.3   c1.2-3.8,3.3-7.2,5.3-10.7c1.1-1.9,2.7-3.5,4.2-5.1c1.9-2,3.9-3.8,6.1-5.5c1.2-1,2.4-1.9,3.7-2.9c1.4-1,2.7-1.9,4.2-2.8   c1.5-0.9,3.1-1.9,4.7-2.7c1.7-0.8,3.5-1.6,5.2-2.3c2.4-1,4.9-1.7,7.4-2.2c1.8-0.4,3.7-0.7,5.5-0.6c0.2,0,0.3-0.1,0.5-0.1   C213.5,56.2,213.3,54.3,213.1,52.4z"></path>
	<path style="fill:#162B54;" d="M244.4,137c-0.1,1.1-0.3,2.1-0.4,3.1c-0.1,1.1-0.9,1.7-1.4,2.6c-0.9,1.5-2.2,2.3-3.7,3.1   c-2,1.1-4,1.4-6.2,0.5c-1.6-0.6-3-1.5-4.3-2.7c-0.7-0.7-1.4-1.4-2-2.2c-0.3-0.4-0.5-0.9-0.6-1.4c-0.2-0.7-0.3-1.4-0.5-2.1   c-0.4-2-0.1-3.9,0.7-5.8c0.2-0.5,0.6-1,1.1-1.4c0.8-0.8,1.7-1.5,2.6-2.2c1.4-1.1,3-1.5,4.8-1.4c2,0,3.8,0.6,5.4,1.8   c0.8,0.6,1.5,1.3,2.1,2.1c0.9,1.2,1.7,2.5,2,4.1C244.2,135.6,244.3,136.3,244.4,137z M234.9,129.6c-0.2,0-0.5,0-0.7,0   c-2.6,0-4.4,1.4-6,3.2c-0.1,0.1-0.1,0.2-0.2,0.3c-0.6,1.2-0.9,2.5-0.6,3.9c0.2,1.2,0.4,2.4,1.3,3.3c1.1,1.1,2.2,2.1,3.8,2.3   c0.1,0,0.3,0.1,0.4,0.1c1.2,0.6,2.4,0.5,3.8,0.3c1.6-0.3,2.6-1.1,3.3-2.5c0.4-0.8,0.9-1.7,1.1-2.6c0.5-2.2-0.5-4.1-1.4-5.9   C238.8,130.1,236.9,129.5,234.9,129.6z"></path>
	<path style="fill:#162B54;" d="M192.2,141.3c-4.1,0-7.7-0.7-11.2-2.1c-0.7-0.3-1.4-0.7-2.1-1.1c-0.8-0.5-1.7-1-2.5-1.6   c-1.4-0.9-2.5-2.1-3.5-3.4c-2.9-3.5-4.7-7.4-5.7-11.8c-0.1-0.7-0.3-1.3-0.5-2c-0.4-1.7-0.4-3.4,0-5.1c0.2-1,0.4-2.1,0.6-3.1   c0.1-0.4,0.2-0.9,0.4-1.3c1.2-2.6,2.6-5.1,4.8-7.2c1.1-1,2-2.2,3.1-3.2c1.8-1.6,3.8-3,6.1-4c2-0.9,4.1-1.5,6.3-1.9   c2.4-0.4,4.8-0.7,7.1-0.2c2.9,0.5,5.7,1.3,8.3,2.7c1.6,0.8,3.1,1.7,4.6,2.7c1.9,1.2,3.6,2.6,5.1,4.4c0.8,0.9,1.3,2,1.8,3.2   c0.8,2.1,1.7,4.2,2.3,6.3c0.3,1.2,0.4,2.3,0.2,3.5c-0.2,1.2-0.3,2.5-0.5,3.7c-0.1,1.4-0.5,2.7-1,3.9c-0.8,2.2-1.6,4.5-3.1,6.3   c-1.7,2-3.3,4.2-5.3,5.9c-2.3,2-5,3.5-8,4.2c-1.4,0.3-2.8,0.7-4.2,0.9C194.1,141.3,193,141.2,192.2,141.3z M192.9,95.7   c-0.5,0-0.8,0-1.1,0c-1.4-0.2-2.8,0.1-4.1,0.5c-1,0.4-2.1,0.7-3.1,1c-2.1,0.6-3.8,1.6-5.5,2.9c-2.4,1.7-4.4,3.8-6.2,6.1   c-1.8,2.4-3.2,4.9-3.7,7.9c-0.3,1.8-0.7,3.7,0.2,5.5c0,0.1,0,0.1,0.1,0.2c0.8,2.8,1.7,5.6,3.2,8.1c0.8,1.4,1.6,2.7,2.5,3.9   c1.2,1.6,2.7,2.9,4.2,4.2c0.3,0.3,0.7,0.5,1.2,0.7c2.1,0.9,4.4,1.4,6.6,1.7c1.8,0.3,3.6,0.3,5.5,0.4c1,0,2.1,0,3.1-0.1   c1-0.1,1.9-0.5,2.9-0.7c2.8-0.6,5.2-2,7.2-4c1.4-1.4,2.7-2.9,3.9-4.5c1.4-1.7,2.7-3.5,3.4-5.6c0.8-2.4,1.8-4.7,1.8-7.3   c0-1,0.2-2,0.2-3.1c0-0.5-0.2-1-0.4-1.5c-0.2-0.6-0.5-1.2-0.7-1.8c-0.3-1.3-0.8-2.5-1.6-3.6c-0.5-0.7-1.1-1.4-1.6-2.1   c-0.9-1.3-2-2.4-3.3-3.3c-1.6-1.2-3.4-2.2-5.2-3.1C199.3,96.7,196.2,95.6,192.9,95.7z"></path>
	<g>
		<path style="fill:#162C54;" d="M25.8,43.2c0.9,1.6,1.2,3,3.2,2.8c1.5-0.1,3.1-1.4,4.5-1.9c2.5-0.9,5-1.4,7.6-1.6    c1.4-0.1,1.5-1.8,0.3-2.3c-4.8-2-6.7-6.8-9.5-10.7c-2-2.9-4.5-4.1-7-6.3c-1.5-1.3-1.9-4.5-4.4-4.5c-2.7,0-6.2,2.9-7.8,4.9    c0,0,0,0.1-0.1,0.2c-0.8,0-1.6,0.8-1.1,1.8c1.7,3.3,3.7,6.4,6.2,9.1C20.3,37.5,23.8,39.8,25.8,43.2z M14.1,25.4    c0.1-0.1,0.2-0.1,0.3-0.2c1-1.3,2.5-2.7,4.1-3.3c2.1-0.7,2.2,0.3,3.3,1.5c2,2.2,4.8,3.3,6.9,5.6c3.4,3.8,5.2,8.6,9,11.6    c-2.1,0.4-4.1,0.9-6.1,1.7c-1.3,0.5-2.2,1.4-3.3,0.7c-0.5-0.3-1.4-2.5-1.9-3.1c-1.8-2.3-4.1-4-6.2-6    C17.8,31.4,15.8,28.5,14.1,25.4z"></path>
		<path style="fill:#162C54;" d="M285.5,3.5c-1.4-2-4.4-7.8-7.4-7.9c-1,0-1.3,0.3-1.8,1.1c-0.7,1.1-1,2.6-1.6,3.7    c-0.7,1.1-1.6,2.1-2.2,3.3c-1.2,2.4-0.8,4.8,1.6,5.9c0,0,0,0,0.1,0c-0.4,0.4-0.4,1.2,0.1,1.6c4.4,3.7,6.1,9.7,11.3,12.6    c0.6,0.3,1.1,0.2,1.5-0.3c2.7-3.1,5.9-5.4,9.6-7c0.8-0.3,0.8-1.4,0.2-1.9C292.4,11.6,288.7,7.9,285.5,3.5z M286.1,21.6    c-4.5-3-6.4-8.6-10.5-12.1c-0.1-0.1-0.2-0.1-0.3-0.2c0.4-0.5,0.3-1.4-0.4-1.8c-2.2-1,1.7-6,2.3-7.1c0.1-0.2,1-2.8,0.7-2.6    c1.1-0.5,5.4,6.3,6,7.1c2.9,4.1,6.4,7.5,10.3,10.5C291.1,17,288.4,19,286.1,21.6z"></path>
		<path style="fill:#162C54;" d="M51.5,167.9c-4-0.3-7.8-1-11.6-2.2c-2-0.7-4-1.5-5.9-2.5c-1-0.5-2.3-1.5-3.4-1.8    c-4.2-0.8-7,7.7-8.2,10.6c-0.6,1.4,1.4,2.5,2,1.2c1.1-2.5,2.3-5.7,4.1-7.8c1.7-2,2.3-1.2,4.3-0.2c1.2,0.6,2.4,1.2,3.7,1.7    c4.2,1.7,8.5,2.6,12.9,3.1c-2.2,3.2-4.5,6.4-6.7,9.6c-4.2-2.3-8.6-4.4-13.1-6.2c-1.4-0.6-2,1.7-0.6,2.3c4.6,1.9,9.1,4.1,13.4,6.5    c0.6,0.3,1.2,0.1,1.6-0.4c2.8-4,5.7-8.1,8.5-12.1C53,168.9,52.3,168,51.5,167.9z"></path>
		<path style="fill:#162C54;" d="M391.4,176.3c-3.9,0.4-7.9,0.4-11.8-0.2c-2.1-0.3-4.2-0.8-6.3-1.4c-1.1-0.3-2.5-1.1-3.7-1.2    c-4.3-0.1-5.6,8.7-6.3,11.8c-0.4,1.4,1.8,2.3,2.2,0.8c0.7-2.6,1.3-6,2.8-8.4c1.4-2.2,2.1-1.6,4.2-0.9c1.3,0.4,2.6,0.7,3.9,1    c4.4,1,8.8,1.2,13.3,0.9c-1.7,3.5-3.4,7.1-5,10.6c-4.6-1.6-9.2-2.9-13.9-3.9c-1.5-0.3-1.7,2-0.2,2.3c4.9,1.1,9.6,2.5,14.3,4.1    c0.6,0.2,1.2-0.1,1.5-0.7c2.1-4.5,4.2-8.9,6.3-13.4C393.1,177,392.2,176.2,391.4,176.3z"></path>
		<path style="fill:#162C54;" d="M174.2,189.7c-3.2-0.4-6.8,1.5-10.2,1.4c-3.5-0.1-6.8,1.3-10.3,1.2c-0.6,0-1.3,0.5-1.3,1.1    c-0.2,4.1-0.5,8.2-1.1,12.2c-0.2,1.6,2.2,1.7,2.4,0.2c0.5-3.7,0.8-7.4,1-11.1c1.3-0.1,2.5-0.3,3.8-0.6c2.6-0.6,4.9-0.4,7.5-0.5    c1.6-0.1,3.2-0.5,4.7-0.9c3.6-0.9,2.1,1.4,1.2,3.9c-0.5,1.5-0.7,3.1-1.1,4.6c-0.3,1.2,0.4,1-0.5,1.5c-0.8,0.5-3.6,0.3-4.6,0.3    c-3.2,0.1-6.3-0.7-9.2,1.1c-1.3,0.8-0.3,3,1.1,2.2c2.8-1.7,6.6-0.7,9.7-0.9c1.6-0.1,4.7,0.2,5.8-1.3c0.3-0.4,0.2-0.8,0.3-1.2    c0.5-2,0.4-4,1.1-6.1c0.7-2.1,1.6-4.3,0.7-6.5C175,189.9,174.6,189.7,174.2,189.7z"></path>
		<path style="fill:#162C54;" d="M123.2-8.9c-0.7-0.9-2.2-0.1-1.9,0.9c1,4.4,0.8,9.1-2,12.8c-2.9,3.9-6.5,4.1-10.9,4.2    c-5.6,0.2-4.2,9.8-4,13.4c0.1,1.4,2.3,1.6,2.2,0.1c0-0.3,0-0.6,0-0.9c0.3,0.7,1.3,1.1,1.9,0.3c2.6-3.5,9.1-1.6,12.9-3.3    c2.9-1.3,5.2-3.5,6.5-6.4c1.4-3.2,2-7.9,1.5-11.4C128.8-2.8,125.4-6.1,123.2-8.9z M122.3,15.7c-4.8,3.2-11.8,0.1-15.5,5    c-0.1,0.1-0.1,0.2-0.1,0.3c-0.1-1.7-0.1-3.4,0-5.2c0.1-1.5,0-2.5,1.2-3.6c1.3-1.2,1.2-0.8,2.8-0.8c2.7,0,5.3-0.8,7.4-2.3    c4.4-3.1,6.2-8.2,6-13.3c1.7,2.3,3.1,4.6,3.2,7.6C127.4,7.9,126.3,13,122.3,15.7z"></path>
		<path style="fill:#162C54;" d="M357.1,3.7c-0.2-0.9-1.4-1.4-2.1-0.7c-3.3,3.1-7.1,4-11.5,3.1c-2.6-0.5-3.5-0.4-5.5,1.5    c-2.3,2.1-5.8,4.7-7.4,7.4c-0.6,1-0.6,1.4-0.6,2.6c0,2.6-0.1,4.5-1,6.9c-0.6,1.5,1.8,2.4,2.4,0.8c1.3-3.2,0.6-7.3,2.5-10.2    c1.8-2.8,6.1-6.8,9.4-6.5c4.6,0.3,8.3,0.2,11.9-2.4c0.7,2.9,1.9,5.6,3.6,8c-2.1,0.4-3.9,1.2-5.9,2.2c-2,1-3.7,1.8-5.9,2    c-1.1,0.1-2.1,0-3.2,0.1c-4.9,0.7-9,3.7-11.5,7.9c-0.8,1.4,1.2,2.9,2.1,1.4c1.5-2.6,3.6-4.6,6.3-5.9c2.7-1.3,5.1-0.9,8-1.1    c1.4-0.1,2.4-0.5,3.6-1.2c3.1-1.7,5.3-3.1,8.9-3.4c1-0.1,1.3-1.4,0.7-2.1C359.3,11.2,357.8,7.7,357.1,3.7z"></path>
	</g>
	<g>
		<path style="fill:#162C54;" d="M72,101c-4.2-0.9-8.3-1.8-12.5-2.6c-0.7-0.1-1.4,0-2.1-0.2c-0.5-0.2-0.9-0.6-1.4-1    c0.4-0.4,0.8-1,1.3-1.3c4.9-2.5,9.8-5,14.6-8.1c-3.5,0-6.9-0.2-10.4,0.2c-11.5,1.2-22.9,0.1-34.3-0.8c-11.1-0.9-22.5-2.3-33.4-0.8    c-10.9,1.5-21.7,5.4-31.9,9.8c-9.6,4.1-18.3,10.3-28.2,15c0.8-1.2,1.4-2.9,2.5-3.6c10-5.7,19.8-12.1,30.3-16.6    c12.9-5.5,26.5-9.1,40.8-8.4c5.6,0.3,11.1,0.1,16.7,0.6c6.4,0.6,12.8,2.1,19.2,2.5c7.2,0.4,14.4,0,21.5,0c3.7,0,7.5,0,11.2,0.3    c0.7,0,1.4,1,2.1,1.5c-0.6,0.6-1.1,1.4-1.8,1.8c-4,2.2-8.1,4.2-13.3,6.9c4,1.3,6.9,2.2,9.8,3.2c1.1,0.3,2.2,0.6,3.1,1.1    c0.8,0.4,1.4,1.2,2.1,1.8c-0.9,0.5-1.8,1.2-2.7,1.6c-3.9,1.6-7.9,3.2-12.5,5c7.2,2.9,13.7,5.6,20.1,8.2c-0.1,0.4-0.1,0.8-0.2,1.1    c-3.8,1.2-7.6,2.4-11.4,3.5c-9.3,2.8-18.9,2.4-28.4,1.5c-7.6-0.7-15.2-2-22.8-2.9c-9.2-1.2-17.5,2.2-26,4.9    c-4,1.3-8.2,2.5-11.9,4.4c-6.5,3.4-12.7,7.2-19,11c-6.7,4.1-13.4,8.3-20.1,12.4c-0.8,0.5-1.8,0.5-3.1,0c1.7-1.2,3.4-2.4,5.1-3.6    c7-4.7,13.8-9.9,21.2-14.1c7.7-4.3,15.8-8.1,24-11.4c6.1-2.4,12.6-4.5,19.1-5.3c6.5-0.8,13.2-0.6,19.7,0.3    c11.3,1.5,22.5,3.4,33.9,2.1c4.8-0.5,9.4-1.8,14.2-2.8c0-0.4,0.1-0.9,0.1-1.3c-2.9-1.1-5.8-2.2-8.8-3.1c-4.7-1.5-9.6-2.7-14.3-4.2    c-0.8-0.2-1.4-1.2-1.7-1.6c6.4-1.7,12.8-3.4,19.2-5.1C71.9,102.2,72,101.6,72,101z"></path>
		<path style="fill:#162C54;" d="M2.7,99.5c-6.4,3.9-13.9,8.5-21.7,13.3C-11.9,106.7-4.7,101.5,2.7,99.5z"></path>
	</g>
	<path style="fill:#162C54;" d="M345.4,86.6c2.5,1.9,4.6,3.5,6.6,5.2c0.6,0.5,0.9,1.4,1.4,2.1c-0.8,0.3-1.7,0.7-2.5,1   c-3,1-6,2-9,3.7c1.2,0.4,2.5,0.7,3.6,1.2c1.3,0.6,2.7,1.2,3.9,2c0.5,0.3,0.8,1.2,0.7,1.7c-0.1,0.4-0.9,0.8-1.4,1   c-3.1,1.5-6.3,2.9-10,4.7c2.8,1.1,4.8,1.9,6.7,2.7c0.8,0.4,1.6,1,2.2,1.8c0.4,0.5,0.9,1.5,0.7,2.1c-0.2,0.5-1.1,0.9-1.8,1.2   c-2.8,1-5.6,1.9-8.4,3c-0.3,0.1-0.5,0.6-1,1.4c2-0.1,3.6-0.2,5.1-0.2c6.6,0.1,13.3,0.2,19.9,0.5c14.9,0.6,27.6,7.8,41,13.1   c7.1,2.8,15,3.8,22.7,4.9c9.3,1.4,18.7,1.9,28.1,2.9c5.1,0.6,10.3,1,15.2,2.3c9.1,2.4,18.1,5.3,27.1,8c2.4,0.7,4.8,1.2,7.2,1.9   c0.5,0.1,1,0.6,1.4,0.9c-0.5,0.3-1,1-1.5,0.9c-2.5-0.4-5-0.9-7.4-1.6c-15.7-4.7-31.1-10.3-47.7-10.9c-6.6-0.3-13.2-1.2-19.8-2   c-6.3-0.8-12.7-1.2-18.8-2.9c-6.7-1.9-12.9-5.3-19.5-7.6c-7.4-2.6-14.8-5.5-22.5-7c-7.2-1.4-14.7-1.4-22.1-1.5   c-3.6,0-7.2,1.2-10.8,1.8c-0.5,0.1-1.4-0.2-1.5-0.5c-0.2-0.6-0.3-1.5,0.1-2.1c2.4-3.8,5.9-6,10.2-7c0.4-0.1,0.8-0.2,1.8-0.4   c-3.7-3.5-8.3-2.6-12.6-4.4c4.4-2.5,8.8-5.1,13.9-8c-4.1-0.9-7.7-1.6-11.3-2.4c-0.1-0.4-0.2-0.7-0.4-1.1c4.4-2,8.9-4.1,14.5-6.6   c-3.7-1.7-6.8-3-9.8-4.5c-0.7-0.3-1.4-0.9-2.1-1.3c0.7-0.5,1.3-1.1,2-1.4c9-3,18.4-3.3,27.8-3.3c8.9,0,17,3,25.1,6.3   c10.5,4.2,20.9,8.6,31.7,11.8c8,2.3,18.3,4,26.6,5.3c0.6,0.1,1.2,0.1,2,0.2c-0.1,0.5-0.2,0.9-0.3,1.2c-0.1,0.4-0.3,0.7-0.7,1.7   c-6.5-1-15.1-3-21.7-4.5c-6.3-1.5-12.6-3.5-18.7-5.7c-4.5-1.6-8.7-4-13.1-5.6c-7.4-2.6-14.7-5.7-22.3-7.2   c-9.5-1.9-19.3-1.5-28.8,0.7C346.8,85.9,346.5,86.1,345.4,86.6z"></path>
	<path style="fill:#162C54;" d="M373.7,96c5.2-0.5,9.2,2.8,12.6,5.1c2.8,1.9,8,5.6,10.6,7.9c-0.2,0.2-3.5-2.1-3.8-1.9   C386.9,103.5,380.7,100,373.7,96z"></path>
	<path style="fill:#162C54;" d="M398.5,115.6c-6.9-4.2-13.9-8.5-20.9-12.7c0.2-0.3-1.2-0.3-1-0.6   C380.1,102.9,398.9,114.5,398.5,115.6z"></path>
	<path style="fill:#162C54;" d="M382.4,112.3c5.6,0.9,13.1,4.3,11.7,6.7C391,117.1,385.3,114.2,382.4,112.3z"></path>
</g>
</svg></div>
															
															<script type="text/template" id="Training26_template">
															<div class="bf-media bf-media--loader bf-media--full-size bf-animated-svg" data-bf-svg data-url="/images/shoefinder-new/26_2.svg" data-bf-stepped-animation  data-active-screens="Training"></div>
														</script>
														</div>
														<div class="bf-media-button__text" id="training_4Label">Marathon or more</div>
													</div>
												</div>
											</div>
							
										
									</div>
								</div>
							</div>										
						</section>
						<!-- END: Training Screen -->
						
						<!-- START: Injuries Screen -->
						
						<section class="bf-screen bf-injuries-screen" data-bf-screen="" data-id="Injuries" data-type="form" data-bf-form-step="" data-bf-injuries="" data-injury-input-name="injury" data-no-injuries-value="none">
							<div class="bf-screen__content">
								<div class="bf-injuries-screen__transition-group">
									<div class="bf-screen__title">
										<h2 class="bf-h2--small" data-focus-first="" tabindex="0">In the past six months, have you had any pain or injuries in these areas?</h2>
									</div>
									<div data-bf-behind-the-science-link="" data-template-id="InjuryInfo" data-gtm-screen-title="Recent Injuries" data-gtm-click-event="shoe-finder-behind-the-science"><div role="button" class="bf-info-link" data-bf-info-overlay-link="" data-template-id="InjuryInfo" data-bf-button="" data-bf-event="behindScience" data-event-label="" tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"></path>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div></div>
								</div>
								<div class="bf-screen__main">
									<div class="bf-injuries">
										<div class="bf-injuries__media bf-injuries-screen__transition-group-2">
											<div data-bf-load-template-before-screen="" data-template="Skeleton" data-id="Injuries"></div>
											<script type="text/template" id="Skeleton">
												<div class="bf-skeleton" data-bf-skeleton data-injury-input-name="injury" data-foot-input-value="foot" data-leg-input-value="leg" data-knees-input-value="knees" data-url="/images/shoefinder-new/skeleton.svg" data-bf-stepped-animation data-active-screens="Injuries"></div>
											</script>
										</div>
										<div class="bf-injuries__options">
											
												
											
																								
													<label class="bf-injuries__option bf-injuries-screen__transition-group-4" data-bf-input-button="" data-bf-button="" tabindex="0">																							
														


	  <!--  option 0 -->
	  <!--  valueOverride knees -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="checkbox" name="injury" value="knees" id="injury_1" tabindex="-1" required="" aria-hidden="true">
			

														<span class="bf-select"><i></i><span class="bf-select__text">Knees</span>
													</span></label>
												
											
																								
													<label class="bf-injuries__option bf-injuries-screen__transition-group-4" data-bf-input-button="" data-bf-button="" tabindex="0">																							
														


	  <!--  option 5 -->
	  <!--  valueOverride leg -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="checkbox" name="injury" value="leg" id="injury_2" tabindex="-1" required="" aria-hidden="true">
			

														<span class="bf-select"><i></i><span class="bf-select__text">Lower Leg</span>
													</span></label>
												
											
																								
													<label class="bf-injuries__option bf-injuries-screen__transition-group-4" data-bf-input-button="" data-bf-button="" tabindex="0">																							
														


	  <!--  option 10 -->
	  <!--  valueOverride foot -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="checkbox" name="injury" value="foot" id="injury_3" tabindex="-1" required="" aria-hidden="true">
			

														<span class="bf-select"><i></i><span class="bf-select__text">Foot or Arch</span>
													</span></label>
												
											  
										</div>
									</div>
								</div>
	  							<div class="bf-button-wrap bf-button-wrap--list bf-injuries-screen__transition-group-5">
  									<div class="bf-button-wrap__item" data-no-injuries-button="" style="display: block;">
  										
  												<input type="checkbox" name="injury" value="none" tabindex="-1" id="NoInjuries" data-no-injuries-input="" aria-hidden="true">
  										  											  								
			  							<button type="button" class="bf-button" data-bf-event="questionAnswered" data-event-label="Injuries" data-bf-input-button="" data-bf-next-screen-link="" data-bf-send-form-progress="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="4" data-gtm-screen-title="Recent Injuries" data-gtm-user-response="none" data-gtm-question="In the past six months, have you had any pain or injuries in these areas?" data-gtm-question-category="Biomechanics">None of these</button>			  							
			  						</div>
									<div class="bf-button-wrap__item" data-continue-button="" style="padding-top: 0px; display: none;">
										<button type="button" class="bf-button" data-bf-event="questionAnswered" data-event-label="Injuries" data-bf-next-screen-link="" data-bf-send-form-progress="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="4" data-gtm-screen-title="Recent Injuries" data-bf-gtm-user-response="injury" data-gtm-question="In the past six months, have you had any pain or injuries in these areas?" data-gtm-question-category="Biomechanics" data-gtm-user-response="">Continue</button>
									</div>
								</div>
	  						</div>
						</section>
						<!-- END: Injuries Screen -->
						
						<!-- START: Checkpoint 1 Screen -->
								
						<section class="bf-screen bf-checkpoint-screen" data-bf-screen="" data-id="Checkpoint1" data-type="checkpoint" data-priority-screen="" data-bf-screen-event="checkpointReached" data-event-label="Checkpoint 1">
							<div class="bf-screen__content">
								<div class="bf-screen__main">
									<div class="bf-checkpoint bf-checkpoint--1">
										<div class="bf-checkpoint__container">
											<div class="bf-checkpoint__rings-wrap">
												<div class="bf-checkpoint__rings bf-checkpoint-screen__transition-group">
													<div data-bf-load-template-before-screen="" data-template="CheckpointRings" data-id="Checkpoint1"></div>
												</div>
											</div>
											<div class="bf-checkpoint__circle-wrap">
												<div class="bf-checkpoint__circle  bf-checkpoint-screen__transition-group-2"></div>
											</div>
											<div class="bf-checkpoint__content-wrap  bf-checkpoint-screen__transition-group-3">
												<div class="bf-checkpoint__image-wrap">
													<div data-bf-load-template-before-screen="" data-template="Checkpoint1Shoes" data-id="Checkpoint1"></div>
													<script type="text/template" id="Checkpoint1Shoes">
														<div class="bf-media bf-media--loader bf-checkpoint-1-shoe" data-bf-svg data-url="/images/shoefinder-new/checkpoint1_shoe.svg" data-bf-stepped-animation data-active-screens="Checkpoint1"></div>
													</script>
												</div>
												<div class="bf-checkpoint__grow">
													<div class="bf-checkpoint__text">
														<h2 data-focus-first="" tabindex="0">Take 'em off</h2>
														<p>Your shoes, that is. Doing the following exercises barefoot will help us more accurately determine whether you need a Neutral or Support shoe.</p>
													</div>
												</div>
												<div class="bf-checkpoint__button bf-checkpoint-screen__transition-group-4">
													<button type="button" class="bf-button" data-bf-next-screen-link="">Okay, they're off</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- END: Checkpoint 1 Screen -->
						
						<!-- START: Foot Angle Screen -->
						
						<section class="bf-screen bf-foot-angle-screen" data-bf-screen="" data-id="Foot Angle" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-foot-angle-screen__transition-group">
									<div class="bf-screen__title">
										<h2 data-focus-first="" tabindex="0">Walk around. What are your feet up to?</h2>
									</div>
									<div data-bf-behind-the-science-link="" data-template-id="FeetInfo" data-screen-title="Foot Angle" data-gtm-screen-title="Foot Angle" data-gtm-click-event="shoe-finder-behind-the-science"><div role="button" class="bf-info-link" data-bf-info-overlay-link="" data-template-id="FeetInfo" data-bf-button="" data-bf-event="behindScience" data-event-label="" tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"></path>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div></div>
								</div>
								<div class="bf-screen__main">
									<div class="bf-grid bf-grid--centered bf-grid--pad-vert bf-grid--extra-large">
										
											<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-foot-angle-screen__transition-group-2">
												<div class="bf-mobile-media-pad">
													


	  <!--  option 0 -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="feet" value="0" id="FeetParallel" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="FeetParallelLabel" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="FeetParallel" data-bf-alert-link="" data-template-id="TooltipAlert_5_option_0" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Foot Angle" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="5" data-gtm-screen-title="Foot Angle" data-gtm-user-response="My feet stay parallel" data-gtm-question="Walk around. What are your feet up to?" data-gtm-question-category="Biomechanics" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__media">
																<div data-bf-video="" data-video-src="https://player.vimeo.com/external/298055015.sd.mp4?s=394919d4cbc3ffd5d8843bbb1aa37d2928cf32c0&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/feet_parallel.jpg" data-title="My feet stay parallel">
		<div class="bf-video bf-video--no-touch" data-container="">
			<div class="bf-video__toggle" data-pause-toggle=""><i class="bf-pause-icon" data-pause-icon=""></i><i class="bf-play-icon" data-play-icon=""></i><svg viewBox="0 0 38 38" class="bf-video__progress"><circle cx="19" cy="19" r="8" class="video__progress__outline"></circle><circle cx="19" cy="19" r="8" class="video__progress__meter" data-progress-circle="" style="stroke-dasharray: 50.2655; stroke-dashoffset: 50.2655;"></circle></svg></div>
			<div class="bf-video__wrap">
				<img src="/images/shoefinder-new/video/feet_parallel.jpg" class="bf-video__image" data-bf-image="" alt="My feet stay parallel">
				<video autoplay="autoplay" loop="" muted="" playsinline="">
					 <source src="https://player.vimeo.com/external/298055015.sd.mp4?s=394919d4cbc3ffd5d8843bbb1aa37d2928cf32c0&amp;profile_id=165" type="video/mp4">
				</video>
			</div>
		</div>
	</div>
																<script type="text/template" id="FeetParallelVideo">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298055015.sd.mp4?s=394919d4cbc3ffd5d8843bbb1aa37d2928cf32c0&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/feet_parallel.jpg" data-title="My feet stay parallel"></div>
															</script>
															</div>
															<div class="bf-media-button__text" id="FeetParallelLabel">My feet stay parallel</div>
														</div>
													</div>
												</div>
											</div>
										
											<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-foot-angle-screen__transition-group-3">
												<div class="bf-mobile-media-pad">
													


	  <!--  option 10 -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="feet" value="1" id="FeetInward" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="FeetInwardLabel" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="FeetInward" data-bf-alert-link="" data-template-id="TooltipAlert_5_option_1" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Foot Angle" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="5" data-gtm-screen-title="Foot Angle" data-gtm-user-response="My feet pointed inward" data-gtm-question="Walk around. What are your feet up to?" data-gtm-question-category="Biomechanics" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__media">
																<div data-bf-video="" data-video-src="https://player.vimeo.com/external/298054972.sd.mp4?s=0ce5f0b2c437bd67021974c4fa2a0647ab33b32f&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/feet_inward.jpg" data-title="My feet pointed inward">
		<div class="bf-video bf-video--no-touch" data-container="">
			<div class="bf-video__toggle" data-pause-toggle=""><i class="bf-pause-icon" data-pause-icon=""></i><i class="bf-play-icon" data-play-icon=""></i><svg viewBox="0 0 38 38" class="bf-video__progress"><circle cx="19" cy="19" r="8" class="video__progress__outline"></circle><circle cx="19" cy="19" r="8" class="video__progress__meter" data-progress-circle="" style="stroke-dasharray: 50.2655; stroke-dashoffset: 50.2655;"></circle></svg></div>
			<div class="bf-video__wrap">
				<img src="/images/shoefinder-new/video/feet_inward.jpg" class="bf-video__image" data-bf-image="" alt="My feet pointed inward">
				<video autoplay="autoplay" loop="" muted="" playsinline="">
					 <source src="https://player.vimeo.com/external/298054972.sd.mp4?s=0ce5f0b2c437bd67021974c4fa2a0647ab33b32f&amp;profile_id=165" type="video/mp4">
				</video>
			</div>
		</div>
	</div>
																<script type="text/template" id="FeetInwardVideo">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298054972.sd.mp4?s=0ce5f0b2c437bd67021974c4fa2a0647ab33b32f&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/feet_inward.jpg" data-title="My feet pointed inward"></div>
															</script>
															</div>
															<div class="bf-media-button__text" id="FeetInwardLabel">My feet pointed inward</div>
														</div>
													</div>
												</div>
											</div>
										
											<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-foot-angle-screen__transition-group-4">
												<div class="bf-mobile-media-pad">
													


	  <!--  option 15 -->
	  <!--  valueOverride 2 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="feet" value="2" id="FeetOutward" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-labelledby="FeetOutwardLabel" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="FeetOutward" data-bf-alert-link="" data-template-id="TooltipAlert_5_option_2" data-bf-button="" data-bf-event="questionAnswered" data-event-label="Foot Angle" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="5" data-gtm-screen-title="Foot Angle" data-gtm-user-response="My feet pointed outward" data-gtm-question="Walk around. What are your feet up to?" data-gtm-question-category="Biomechanics" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__media">
																<div data-bf-video="" data-video-src="https://player.vimeo.com/external/298054996.sd.mp4?s=33756b507c6a06a070669f8f40c7cf188513b5bd&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/feet_outward.jpg" data-title="My feet pointed outward">
		<div class="bf-video bf-video--no-touch" data-container="">
			<div class="bf-video__toggle" data-pause-toggle=""><i class="bf-pause-icon" data-pause-icon=""></i><i class="bf-play-icon" data-play-icon=""></i><svg viewBox="0 0 38 38" class="bf-video__progress"><circle cx="19" cy="19" r="8" class="video__progress__outline"></circle><circle cx="19" cy="19" r="8" class="video__progress__meter" data-progress-circle="" style="stroke-dasharray: 50.2655; stroke-dashoffset: 50.2655;"></circle></svg></div>
			<div class="bf-video__wrap">
				<img src="/images/shoefinder-new/video/feet_outward.jpg" class="bf-video__image" data-bf-image="" alt="My feet pointed outward">
				<video autoplay="autoplay" loop="" muted="" playsinline="">
					 <source src="https://player.vimeo.com/external/298054996.sd.mp4?s=33756b507c6a06a070669f8f40c7cf188513b5bd&amp;profile_id=165" type="video/mp4">
				</video>
			</div>
		</div>
	</div>
																<script type="text/template" id="FeetOutwardVideo">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298054996.sd.mp4?s=33756b507c6a06a070669f8f40c7cf188513b5bd&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/feet_outward.jpg" data-title="My feet pointed outward"></div>
															</script>
															</div>
															<div class="bf-media-button__text" id="FeetOutwardLabel">My feet pointed outward</div>
														</div>
													</div>
												</div>
											</div>
										
									</div>
								</div>
							</div>
						</section>
						<!-- END: Foot Angle Screen -->
						<!-- START: Balance Screen -->
						
						<section class="bf-screen bf-balance-screen" data-bf-screen="" data-id="Balance" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-balance-screen__transition-group">
									<div class="bf-screen__title">
										<h2 data-focus-first="" tabindex="0">Stand on one leg and feel how balanced you are.</h2>
									</div>
									<div data-bf-behind-the-science-link="" data-template-id="BalanceInfo" data-gtm-screen-title="Balance" data-gtm-click-event="shoe-finder-behind-the-science"><div role="button" class="bf-info-link" data-bf-info-overlay-link="" data-template-id="BalanceInfo" data-bf-button="" data-bf-event="behindScience" data-event-label="" tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"></path>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div></div>
								</div>
								<div class="bf-screen__main">
									<div class="bf-grid bf-grid--centered bf-grid--pad-vert bf-grid--extra-large">
										
											<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-balance-screen__transition-group-2">
												<div class="bf-mobile-media-pad">
													


	  <!--  option 0 -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="balance" value="0" id="BalanceStable" tabindex="-1" required="" aria-hidden="true">
			
													
													<div role="button" aria-labelledby="BalanceStableLabel" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="BalanceStable" data-bf-alert-link="" data-template-id="TooltipAlert_6_option_0" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="6" data-gtm-screen-title="Balance" data-gtm-user-response="I feel stable" data-gtm-question="Stand on one leg and feel how balanced you are." data-gtm-question-category="Biomechanics" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__media">
																<div data-bf-load-template-before-screen="" data-template="StableVideo" data-id="Balance"></div>
																<script type="text/template" id="StableVideo">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298055059.sd.mp4?s=a303b5c9c91e4d2bbda07672abf2835b38d78077&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/stable.jpg" data-title="I feel stable"></div>
															</script>
															</div>
															<div class="bf-media-button__text" id="BalanceStableLabel">I feel stable</div>
														</div>
													</div>
												</div>
											</div>
										
											<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-balance-screen__transition-group-3">
												<div class="bf-mobile-media-pad">
													


	  <!--  option 15 -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="balance" value="1" id="BalanceUnstable" tabindex="-1" required="" aria-hidden="true">
			
													
													<div role="button" aria-labelledby="BalanceStableLabel" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="BalanceUnstable" data-bf-alert-link="" data-template-id="TooltipAlert_6_option_1" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="6" data-gtm-screen-title="Balance" data-gtm-user-response="I feel a bit unstable" data-gtm-question="Stand on one leg and feel how balanced you are." data-gtm-question-category="Biomechanics" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__media">
																<div data-bf-load-template-before-screen="" data-template="UnstableVideo" data-id="Balance"></div>
																<script type="text/template" id="UnstableVideo">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298055077.sd.mp4?s=d8c245c65eb3a0c42e193cec58a60e2b993a710e&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/unstable.jpg" data-title="I feel a bit unstable"></div>
															</script>
															</div>
															<div class="bf-media-button__text" id="BalanceStableLabel">I feel a bit unstable</div>
														</div>
													</div>
												</div>
											</div>
										
									</div>
								</div>
							</div>
						</section>
						<!-- END: Balance Screen -->
						<!-- START: Knee Pressure Screen -->
						
						<section class="bf-screen bf-knee-screen" data-bf-screen="" data-id="Knee" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-knee-screen__transition-group">
									<div class="bf-screen__title">
										<h2 class="bf-h2--small" data-focus-first="" tabindex="0">Stand with your feet touching each other. Put your hand between your knees and do a few shallow squats.</h2>
									</div>
									<div data-bf-behind-the-science-link="" data-template-id="KneeInfo" data-gtm-screen-title="Knee Bend" data-gtm-click-event="shoe-finder-behind-the-science"><div role="button" class="bf-info-link" data-bf-info-overlay-link="" data-template-id="KneeInfo" data-bf-button="" data-bf-event="behindScience" data-event-label="" tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"></path>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div></div>
								</div>
								<div class="bf-screen__main bf-knee-screen__transition-group-2">
									<div class="bf-grid bf-grid--centered bf-grid--pad-vert bf-grid--extra-large">
										<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up">
											<div class="bf-mobile-media-pad">
												<div class="bf-standalone-video">
													<div data-bf-load-template-before-screen="" data-template="KneeVideo" data-id="Knee"></div>
													<script type="text/template" id="KneeVideo">
														<div data-bf-video data-video-src="https://player.vimeo.com/external/298055046.sd.mp4?s=e4123ddd2f3445cb646568e1d19eb86d30a64728&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/knee.jpg" data-title="Squating with hand between knees"></div>
													</script>
												</div>
											</div>
										</div>
									</div>
								</div>
								<p class="bf-button-label bf-knee-screen__transition-group-3">How does the pressure on your hand change?</p>
								<div class="bf-button-wrap bf-button-wrap--list bf-knee-screen__transition-group-4">
									
										<div class="bf-button-wrap__item">
											


	  <!--  option 15 -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="knee" value="0" id="Knee0" tabindex="-1" required="" aria-hidden="true">
			

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="Knee0" data-bf-alert-link="" data-template-id="TooltipAlert_7_option_0" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="7" data-gtm-screen-title="Knee Bend" data-gtm-user-response="The pressure increases" data-gtm-question="Stand with your feet touching each other. Put your hand between your knees and do a few shallow squats." data-gtm-question-category="Biomechanics">The pressure increases</button>
										</div>
									
										<div class="bf-button-wrap__item">
											


	  <!--  option 10 -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="knee" value="1" id="Knee1" tabindex="-1" required="" aria-hidden="true">
			

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="Knee1" data-bf-alert-link="" data-template-id="TooltipAlert_7_option_1" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="7" data-gtm-screen-title="Knee Bend" data-gtm-user-response="The pressure decreases" data-gtm-question="Stand with your feet touching each other. Put your hand between your knees and do a few shallow squats." data-gtm-question-category="Biomechanics">The pressure decreases</button>
										</div>
									
										<div class="bf-button-wrap__item">
											


	  <!--  option 0 -->
	  <!--  valueOverride 2 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="knee" value="2" id="Knee2" tabindex="-1" required="" aria-hidden="true">
			

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="Knee2" data-bf-alert-link="" data-template-id="TooltipAlert_7_option_2" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="7" data-gtm-screen-title="Knee Bend" data-gtm-user-response="The pressure doesn't change" data-gtm-question="Stand with your feet touching each other. Put your hand between your knees and do a few shallow squats." data-gtm-question-category="Biomechanics">The pressure doesn't change</button>
										</div>
									
								</div>
							</div>
						</section>
						<!-- END: Knee Pressure Screen -->
						<!-- START: Flexibility Screen -->
						
						<section class="bf-screen bf-flexibility-screen" data-bf-screen="" data-id="Flexibility" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-flexibility-screen__transition-group">
									<div class="bf-screen__title">
										<h2 data-focus-first="" tabindex="0">Place your hand on a table and bend your index finger back. How flexible is it?</h2>
									</div>
									<div data-bf-behind-the-science-link="" data-template-id="FlexibilityInfo" data-screen-title="Flexibility" data-gtm-screen-title="Flexibility" data-gtm-click-event="shoe-finder-behind-the-science"><div role="button" class="bf-info-link" data-bf-info-overlay-link="" data-template-id="FlexibilityInfo" data-bf-button="" data-bf-event="behindScience" data-event-label="" tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"></path>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div></div>
								</div>
								<div class="bf-screen__main">									
									<div class="bf-grid bf-grid--centered bf-grid--pad-vert bf-grid--extra-large">
									
										<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-flexibility-screen__transition-group-2">
											<div class="bf-mobile-media-pad">
												


	  <!--  option 25 -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="flexibility" value="0" id="Flexibility0" tabindex="-1" required="" aria-hidden="true">
			

												<div role="button" aria-label="Not that flexible" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="Flexibility0" data-bf-alert-link="" data-template-id="TooltipAlert_8_option_0" data-gtm-click-event="shoe-finder-step" data-bf-button="" data-gtm-step-number="8" data-gtm-screen-title="Flexibility" data-gtm-user-response="Not that flexible" data-gtm-question="Place your hand on a table and bend your index finger back. How flexible is it?" data-gtm-question-category="Biomechanics" tabindex="0">
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div data-bf-load-template-before-screen="" data-template="Finger_0_Video" data-id="Flexibility"></div>
															<script type="text/template" id="Finger_0_Video">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298055033.sd.mp4?s=8970a106798f0b52911eaa658fa055f871daa888&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/finger_below.jpg" data-title="Finger is below 45 degrees"></div>
															</script>
														</div>
														<div class="bf-media-button__text">Not that flexible<div class="bf-media-button__text__description">It doesn't make it to 45°</div></div>
													</div>
												</div>
											</div>
										</div>																	
									
										<div class="bf-grid__col-1 bf-grid__col-1-3-tablet-up bf-flexibility-screen__transition-group-3">
											<div class="bf-mobile-media-pad">
												


	  <!--  option 0 -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="flexibility" value="1" id="Flexibility1" tabindex="-1" required="" aria-hidden="true">
			

												<div role="button" aria-label="Very Flexible" class="bf-media-button bf-media-button--video" data-bf-input-button="" data-input-id="Flexibility1" data-bf-alert-link="" data-template-id="TooltipAlert_8_option_1" data-gtm-click-event="shoe-finder-step" data-bf-button="" data-gtm-step-number="8" data-gtm-screen-title="Flexibility" data-gtm-user-response="Very Flexible" data-gtm-question="Place your hand on a table and bend your index finger back. How flexible is it?" data-gtm-question-category="Biomechanics" tabindex="0">
													<div class="bf-media-button__content">
														<div class="bf-media-button__media">
															<div data-bf-load-template-before-screen="" data-template="Finger_1_Video" data-id="Flexibility"></div>
															<script type="text/template" id="Finger_1_Video">
																<div data-bf-video data-video-src="https://player.vimeo.com/external/298055021.sd.mp4?s=c70a95cd4a8074dc96e4669c03ee1ccf7b2ac5c5&amp;profile_id=165" data-placeholder="/images/shoefinder-new/video/finger_above.jpg" data-title="Finger is above 45 degrees"></div>
															</script>
														</div>
														<div class="bf-media-button__text">Very Flexible<div class="bf-media-button__text__description">It can bend 45° or more</div></div>
													</div>
												</div>
											</div>
										</div>																	
									

									</div>
								</div>
							</div>
						</section>
						<!-- END: Flexibility Screen -->
						<!-- START: Checkpoint 2 Screen -->
						<section class="bf-screen bf-checkpoint-screen" data-bf-screen="" data-id="Checkpoint2" data-type="checkpoint" data-wait-for="checkpoint2" data-bf-screen-event="checkpointReached" data-event-label="Checkpoint 2">
							<div class="bf-screen__content">
								<div class="bf-screen__main">
									<div class="bf-checkpoint bf-checkpoint--2">
										<div class="bf-checkpoint__container">
											<div class="bf-checkpoint__rings-wrap">
												<div class="bf-checkpoint__rings bf-checkpoint-screen__transition-group">
													<div data-bf-load-template-before-screen="" data-template="CheckpointRings" data-id="Checkpoint2"></div>
												</div>
											</div>
											<div class="bf-checkpoint__circle-wrap">
												<div class="bf-checkpoint__circle bf-checkpoint-screen__transition-group-2"></div>
											</div>
											<div data-bf-dynamic-template-container="" data-screen-id="Checkpoint2"></div>
										</div>
									</div>
								</div>
	  						</div>
						</section>
						<!-- END: Checkpoint 2 Screen -->
						<!-- START: Shoe Feel Screen -->
						
						<section class="bf-screen bf-feel-screen" data-bf-screen="" data-id="Feel" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-screen__title bf-feel-screen__transition-group">
									<h2 data-focus-first="" tabindex="0">When picking a shoe I want to:</h2>
								</div>
								<div class="bf-screen__main">
									<div class="bf-grid bf-grid--pad-vert bf-grid--centered bf-grid--extra-large">
										
											<div class="bf-grid__col-1 bf-grid__col-1-2-tablet-up bf-grid__col-1-3-short-desktop bf-feel-screen__transition-group-2">
												<div class="bf-mobile-media-pad">
													


	  <!--  option feel -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="feel" value="0" id="Feel0" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-label="I want a lightweight shoe that allows me to feel the ground." class="bf-media-button bf-media-button--large" data-bf-clear-form-value-on-click="impact" data-bf-input-button="" data-input-id="Feel0" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="9" data-gtm-screen-title="Shoe Feel" data-gtm-user-response="Feel" data-gtm-question="When picking a shoe I want to:" data-gtm-question-category="Experience" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__label">Feel</div>
															<div class="bf-media-button__media">
																<div data-bf-load-template-before-screen="" data-template="Shoe_0_Feel" data-id="Feel"></div>
																<script type="text/template" id="Shoe_0_Feel">
																<div class="bf-shoe-type-image" data-bf-svg data-url="/images/shoefinder-new/shoe_feel.svg" data-bf-stepped-animation></div>
															</script>
															</div>
															<div class="bf-media-button__text"><div>I want a lightweight shoe that allows me to feel the ground.</div></div>
														</div>
													</div>
												</div>
											</div>
										
											<div class="bf-grid__col-1 bf-grid__col-1-2-tablet-up bf-grid__col-1-3-short-desktop bf-feel-screen__transition-group-3">
												<div class="bf-mobile-media-pad">
													


	  <!--  option float -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="feel" value="1" id="Feel1" tabindex="-1" required="" aria-hidden="true">
			

													<div role="button" aria-label="I want more substance below my foot for a floating feeling." class="bf-media-button bf-media-button--large" data-bf-clear-form-value-on-click="impact" data-bf-input-button="" data-input-id="Feel1" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="9" data-gtm-screen-title="Shoe Feel" data-gtm-user-response="Float" data-gtm-question="When picking a shoe I want to:" data-gtm-question-category="Experience" tabindex="0">
														<div class="bf-media-button__content">
															<div class="bf-media-button__label">Float</div>
															<div class="bf-media-button__media">
																<div data-bf-load-template-before-screen="" data-template="Shoe_1_Feel" data-id="Feel"></div>
																<script type="text/template" id="Shoe_1_Feel">
																<div class="bf-shoe-type-image" data-bf-svg data-url="/images/shoefinder-new/shoe_float.svg" data-bf-stepped-animation></div>
															</script>
															</div>
															<div class="bf-media-button__text"><div>I want more substance below my foot for a floating feeling.</div></div>
														</div>
													</div>
												</div>
											</div>
										
									</div>
								</div>
							</div>
						</section>
						<!-- END: Shoe Feel Screen -->
						<!-- START: Impact Screen -->
						
						<section class="bf-screen bf-impact-screen" data-bf-screen="" data-id="Impact" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-screen__title bf-impact-screen__transition-group">
									<h2 data-focus-first="" tabindex="0">I want each step to feel:</h2>
								</div>
								<div class="bf-screen__main">
									<div class="bf-grid bf-grid--pad-vert bf-grid--centered bf-grid--extra-large">
										<div class="bf-grid__col-1 bf-grid__col-1-2-tablet-up bf-grid__col-1-3-short-desktop bf-impact-screen__transition-group-2" data-bf-show-on-form-value="" data-name="feel" data-value="0" aria-hidden="true" style="display: none;">
											<div class="bf-mobile-media-pad">
												


	  <!--  option speed -->
	  <!--  valueOverride 0 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="impact" value="0" id="Impact0" tabindex="-1" required="" aria-hidden="true">
			

												<div role="button" aria-label="Fast. I want a lightweight shoe that helps me run faster." class="bf-media-button bf-media-button--large" data-bf-input-button="" data-input-id="Impact0" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="10" data-gtm-screen-title="Shoe Impact" data-gtm-user-response="Fast" data-gtm-question="I want each step to feel:" data-gtm-question-category="Experience" tabindex="0">
													<div class="bf-media-button__content">
														<div class="bf-media-button__label">Fast</div>
														<div class="bf-media-button__media">
															<div data-bf-load-template-before-screen="" data-template="ShoeFast" data-id="Impact"></div>
															<script type="text/template" id="ShoeFast">
																<div class="bf-shoe-type-image" data-bf-svg data-url="/images/shoefinder-new/shoe_fast.svg" data-bf-stepped-animation></div>
															</script>
														</div>
														<div class="bf-media-button__text"><div>I want a lightweight shoe that helps me run faster.</div></div>
													</div>
												</div>
											</div>
										</div>
										<div class="bf-grid__col-1 bf-grid__col-1-2-tablet-up bf-grid__col-1-3-short-desktop bf-impact-screen__transition-group-3" data-bf-show-on-form-value="" data-name="feel" data-value="0" aria-hidden="true" style="display: none;">
											<div class="bf-mobile-media-pad">
												


	  <!--  option connect -->
	  <!--  valueOverride 1 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="impact" value="1" id="Impact1" tabindex="-1" required="" aria-hidden="true">
			

												<div role="button" aria-label="Connected. I want a minimal shoe so I can feel the ground." class="bf-media-button bf-media-button--large" data-bf-input-button="" data-input-id="Impact1" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="10" data-gtm-screen-title="Shoe Impact" data-gtm-user-response="Connected" data-gtm-question="I want each step to feel:" data-gtm-question-category="Experience" tabindex="0">
													<div class="bf-media-button__content">
														<div class="bf-media-button__label">Connected</div>
														<div class="bf-media-button__media">
															<div data-bf-load-template-before-screen="" data-template="ShoeConnected" data-id="Impact"></div>
															<script type="text/template" id="ShoeConnected">
																<div class="bf-shoe-type-image" data-bf-svg data-url="/images/shoefinder-new/shoe_connected.svg" data-bf-stepped-animation></div>
															</script>
														</div>
														<div class="bf-media-button__text"><div>I want a low profile shoe so I can feel the ground.</div></div>
													</div>
												</div>
											</div>
										</div>
										<div class="bf-grid__col-1 bf-grid__col-1-2-tablet-up bf-grid__col-1-3-short-desktop bf-impact-screen__transition-group-2" data-bf-show-on-form-value="" data-name="feel" data-value="1" aria-hidden="true" style="display: none;">
											<div class="bf-mobile-media-pad">
												


	  <!--  option cushion -->
	  <!--  valueOverride 2 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="impact" value="2" id="Impact2" tabindex="-1" required="" aria-hidden="true">
			

												<div role="button" aria-label="Soft. I want a comfier shoe that cushions every step." class="bf-media-button bf-media-button--large" data-bf-input-button="" data-input-id="Impact2" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="10" data-gtm-screen-title="Shoe Impact" data-gtm-user-response="Soft" data-gtm-question="I want each step to feel:" data-gtm-question-category="Experience" tabindex="0">
													<div class="bf-media-button__content">
														<div class="bf-media-button__label">Soft</div>
														<div class="bf-media-button__media">
															<div data-bf-load-template-before-screen="" data-template="ShoeSoft" data-id="Impact"></div>
															<script type="text/template" id="ShoeSoft">
																<div class="bf-shoe-type-image" data-bf-svg data-url="/images/shoefinder-new/shoe_soft.svg" data-bf-stepped-animation></div>
															</script>
														</div>
														<div class="bf-media-button__text"><div>I want a comfier shoe that cushions every step.</div></div>
													</div>
												</div>
											</div>
										</div>
										<div class="bf-grid__col-1 bf-grid__col-1-2-tablet-up bf-grid__col-1-3-short-desktop bf-impact-screen__transition-group-3" data-bf-show-on-form-value="" data-name="feel" data-value="1" aria-hidden="true" style="display: none;">
											<div class="bf-mobile-media-pad">
												


	  <!--  option energize -->
	  <!--  valueOverride 3 -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="impact" value="3" id="Impact3" tabindex="-1" required="" aria-hidden="true">
			

												<div role="button" aria-label="Springy. I want my shoe to help propel me forward." class="bf-media-button bf-media-button--large" data-bf-input-button="" data-input-id="Impact3" data-bf-next-screen-link="" data-bf-send-form-progress="" data-bf-button="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="10" data-gtm-screen-title="Shoe Impact" data-gtm-user-response="Springy" data-gtm-question="I want each step to feel:" data-gtm-question-category="Experience" tabindex="0">
													<div class="bf-media-button__content">
														<div class="bf-media-button__label">Springy</div>
														<div class="bf-media-button__media">
															<div data-bf-load-template-before-screen="" data-template="ShoeSpringy" data-id="Impact"></div>
															<script type="text/template" id="ShoeSpringy">
																<div class="bf-shoe-type-image" data-bf-svg data-url="/images/shoefinder-new/shoe_springy.svg" data-bf-stepped-animation></div>
															</script>
														</div>
														<div class="bf-media-button__text"><div>I want my shoe to help propel me forward.</div></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- END: Impact Screen -->
						<!-- START: Checkpoint 3 Screen -->
						<section class="bf-screen bf-checkpoint-screen" data-bf-screen="" data-id="Checkpoint3" data-type="checkpoint" data-wait-for="checkpoint3" data-bf-screen-event="checkpointReached" data-event-label="Checkpoint 3">
							<div class="bf-screen__content">
								<div class="bf-screen__main">
									<div class="bf-checkpoint bf-checkpoint--3">
										<div class="bf-checkpoint__container">
											<div class="bf-checkpoint__rings-wrap">
												<div class="bf-checkpoint__rings bf-checkpoint-screen__transition-group">
													<div data-bf-load-template-before-screen="" data-template="CheckpointRings" data-id="Checkpoint3"></div>
												</div>
											</div>
											<div class="bf-checkpoint__circle-wrap">
												<div class="bf-checkpoint__circle bf-checkpoint-screen__transition-group-2"></div>
											</div>
											<div data-bf-dynamic-template-container="" data-screen-id="Checkpoint3"></div>
										</div>
									</div>
								</div>
	  						</div>
						</section>
						<!-- END: Checkpoint 3 Screen -->
						<!-- START: Shoe Preference Screen -->
						
						<section class="bf-screen bf-screen--stretch bf-preference-screen" data-bf-screen="" data-id="Preference" data-type="form" data-bf-form-step="">
							<div class="bf-screen__content">
								<div class="bf-screen__title bf-preference-screen__transition-group">
									<h2 data-focus-first="" tabindex="0">Which type of shoes do you prefer to run in?</h2>
								</div>
								<div class="bf-screen__main bf-preference-screen__transition-group-2">
									<div data-bf-load-template-before-screen="" data-template="ShoePileImage" data-id="Preference"></div>
									<script type="text/template" id="ShoePileImage">
										<div class="bf-shoe-pile" data-bf-svg data-url="/images/shoefinder-new/shoe_pile.svg" data-bf-stepped-animation></div>
									</script>
								</div>
								<div class="bf-button-wrap bf-button-wrap--pair bf-preference-screen__transition-group-3">
									
										<div class="bf-button-wrap__item">										
											


	  <!--  option womens -->
	  <!--  valueOverride womens -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="gender" value="womens" id="Gender0" tabindex="-1" required="" aria-hidden="true">
			

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="Gender0" data-bf-next-screen-link="" data-bf-send-form-progress="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="11" data-gtm-screen-title="Shoe Preference" data-gtm-user-response="Women's" data-gtm-question="Which type of shoes do you prefer to run in?" data-gtm-question-category="Demographics" data-event-label="Shoe Preference">Women's</button>
										</div>
									
										<div class="bf-button-wrap__item">										
											


	  <!--  option mens -->
	  <!--  valueOverride mens -->
	  <!--  answered? No -->
	  <!--  answer is:  false -->
	<input type="radio" name="gender" value="mens" id="Gender1" tabindex="-1" required="" aria-hidden="true">
			

											<button type="button" class="bf-button" data-bf-input-button="" data-input-id="Gender1" data-bf-next-screen-link="" data-bf-send-form-progress="" data-gtm-click-event="shoe-finder-step" data-gtm-step-number="11" data-gtm-screen-title="Shoe Preference" data-gtm-user-response="Men's" data-gtm-question="Which type of shoes do you prefer to run in?" data-gtm-question-category="Demographics" data-event-label="Shoe Preference">Men's</button>
										</div>
									
								</div>
							</div>
						</section>
						<!-- END: Shoe Preference Screen -->
					</form>
					<!-- START: Loading Screen -->
					
					<section class="bf-screen bf-loading-screen" data-bf-screen="" data-id="Loading" data-bf-loading-screen="">
						<div class="bf-screen__content">
							<div class="bf-screen__title bf-loading-screen__transition-group">
								<h2 data-focus-first="" tabindex="0">Lacing up your results…</h2>
							</div>
							<div class="bf-loading-screen__transition-group-2"><div data-bf-load-template-before-screen="" data-template="LoadingAnimation" data-id="Preference"></div></div>
							<script type="text/template" id="LoadingAnimation">
								<div class="bf-lace-image">
									<img src="/images/shoefinder-new/laces_2x.gif" class="bf-image bf-load-image" alt="Loading" data-bf-image alt="Loading" />
								</div>
							</script>
						</div>
					</section>
					<!-- END: Loading Screen -->
					<!-- START: Results Screen -->
					<section class="bf-screen bf-results-screen" data-bf-screen="" data-id="Results" data-wait-for="results" data-bf-gtm-screen-active-event="results">
						<div class="bf-screen__content" data-bf-dynamic-template-container="" data-screen-id="Results"></div>
					</section>
					<!-- END: Results Screen -->
					<!-- START: City / Trail Image -->
					<div class="bf-city-trail bf-city-trail--loaded" data-bf-city-trail="" data-url="/images/shoefinder-new/city_trail_v2.svg" data-terrain-input-name="surface" data-bf-stepped-animation="" data-road-input-value="road" data-trail-input-value="trail" data-active-screens="Terrain,Mileage" data-steps="3">
						<div class="bf-city-trail__image-wrap">
							<div class="bf-city-trail__image" data-image-container="">
							</div>
						</div>
					</div>
					<!-- END: City / Trail Image -->
				</div>
			</div>
		</div>
		<!-- START: Info Overlay -->
		<div class="bf-info-overlay" data-bf-info-overlay="" role="dialog" style="display: none;">
			<div class="bf-info-overlay__bg" data-bf-close-info-overlay-link=""></div>
			<div class="bf-info-overlay__wrap">
				<div class="bf-info-overlay__content" data-content="" tabindex="0"></div>
				<button type="button" class="bf-info-overlay__close" data-bf-close-info-overlay-link="" aria-label="Close"><i class="bf-close-icon"></i></button>
			</div>
		</div>
		<!-- END: Info Overlay -->
		<!-- START: Alert Overlay -->
		<div class="bf-info-overlay bf-info-overlay--alert" data-bf-alert="" role="dialog" aria-hidden="true" style="display: none;">
			<div class="bf-info-overlay__bg" data-bf-close-alert-link=""></div>
			<div class="bf-info-overlay__wrap">
				<div class="bf-info-overlay__content" data-content="" tabindex="0"></div>
				<div class="bf-info-overlay__button-wrap">
					<button type="button" class="bf-button" data-bf-next-screen-link="" data-button="" data-bf-screen-load-button="" data-bf-send-form-progress="" data-gtm-click-event="shoe finder continue button">Continue<i class="bf-button__loader"></i></button>
				</div>
				<button type="button" class="bf-info-overlay__close" data-bf-close-alert-link="" aria-label="Close Alert"><i class="bf-close-icon"></i></button>
			</div>
		</div>
		<!-- END: Alert Overlay -->
	</article>
	<!-- END: QUIZ -->
	

	<!-- START: Behind the Science Templates -->

		
<script type="text/template" id="TrainingInfo">
	<aside>
		<h3>Behind the Science</h3>
		<div class="bf-behind-science" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
		
			<p>Comparing your running habits with what you plan to achieve allows us to better prepare you for success in reaching your goals.</p>
		
			<p>For example, someone who is currently running 0-10 miles a week and plans to train for a marathon will be ramping up their mileage, therefore benefiting from a little more support.</p>
		
			<p>Likewise, someone who runs two miles a week, but does it to stay healthy is not likely to dramatically ramp up their miles.</p>
		
			<p>With this information, we can better recommend a shoe that will help you along your journey.</p>
		
	</aside>	
</script>
	 
		
<script type="text/template" id="InjuryInfo">
	<aside>
		<h3>Behind the Science</h3>
		<div class="bf-behind-science" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
		
			<p>Injuries tell us a lot about the kind of support you need. Since some injuries have to do with improper biomechanics, telling us the challenges you are dealing with, or have dealt with, will help us guide you to a shoe.</p>
		
	</aside>	
</script>
		
		
<script type="text/template" id="FeetInfo">
	<aside>
		<h3>Behind the Science</h3>
		<div class="bf-behind-science" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
		
			<p>Looking at how your foot is positioned when you walk tells us what part of your foot experiences loads or forces. This weight distribution can place demands on muscles and soft tissue that support your body.</p>
		
			<p>If you walk with your toes turned in, you'll notice the weight of your body loads the arch of your foot and the lateral part of your forefoot.</p>
		
			<p>If you walk with your toes turned out, you'll find the weight of your body unloads the arch and puts more load on your medial forefoot.</p>
		
			<p>If you land straight, you should have an evenly distributed loading pattern throughout the foot.</p>
		
			<p>Knowing this helps us select the right shoe for you.</p>
		
	</aside>	
</script>
		
		
<script type="text/template" id="BalanceInfo">
	<aside>
		<h3>Behind the Science</h3>
		<div class="bf-behind-science" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
		
			<p>Every time you land when running, a force 3.5 times your bodyweight is applied to your foot and leg. Soft tissues work to try to stabilize your joints under this greater load.</p>
		
			<p>If you wobble while standing, imagine the movement your foot will undergo when running.</p>
		
			<p>If you feel more stable while standing, this indicates your body is able to guide and control the motions of your foot.</p>
		
			<p>This test helps us understand what shoe will help stabilize your foot while running.</p>
		
	</aside>	
</script>
	
	 
		
<script type="text/template" id="KneeInfo">
	<aside>
		<h3>Behind the Science</h3>
		<div class="bf-behind-science" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
		
			<p>This exercise helps us understand how your knees may perform while running.</p>
		
			<p>If you feel increased pressure on your hands, your knees are moving in (we call this adduction).</p>
		
			<p>If you feel decreased pressure on your hands, your knees are moving out (we call this abduction).</p>
		
			<p>If you feel no added pressure to your hands, your knees are staying straight.</p>
		
			<p>Knees moving in or out during a shallow squat likely results in a higher deviation while running. This deviation could cause the impact above and below your knee to increase.</p>
		
			<p>Some shoes will work better for your unique movement pattern than others. And by the end of these questions, we’ll find some just for you.</p>
		
	</aside>	
</script>
		

		
<script type="text/template" id="FlexibilityInfo">
	<aside>
		<h3>Behind the Science</h3>
		<div class="bf-behind-science" data-bf-svg data-url="/images/shoefinder-new/science_equipment.svg" data-bf-stepped-animation></div>
		
			<p>The flexibility in your finger is correlated to the flexibility of your other joints and ligaments.</p>
		
			<p>If you have inflexible ligaments (if you’re less bendy), motions at the foot will move through the joint causing movements that affect the knee.</p>
		
			<p>If you have flexible ligaments (if you’re bendy), the motion of the foot doesn’t necessarily translate to the knee, so the knee moves more independently then what the foot is doing.</p>
		
			<p>Knowing this helps us find the shoe that will best support your knee in motion.</p>
		
	</aside>	
</script>
		
	
	<!-- END: Behind the Science Templates -->

	<!-- START: Alert Templates -->

					<script type="text/template" id="TooltipAlert_5_option_0">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your parallel foot positioning carries weight properly across your foot. This is an indicator of needing a neutral shoe.</p>
						</div>
					</script>
					
					<script type="text/template" id="TooltipAlert_5_option_1">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your inward foot position indicates your weight does not distribute evenly across your foot.</p>
						</div>
					</script>
		
					<script type="text/template" id="TooltipAlert_5_option_2">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your outward foot position indicates your weight does not distribute evenly across your foot.</p>
						</div>
					</script>
		
					<script type="text/template" id="TooltipAlert_6_option_0">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your forefoot, ankle ligaments and soft tissue are strong and don&rsquo;t need much additional support.</p>
						</div>
					</script>
		
					<script type="text/template" id="TooltipAlert_6_option_1">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your forefoot, ankle ligaments and soft tissue could use some extra help supporting you.</p>
						</div>
					</script>
				
		
					<script type="text/template" id="TooltipAlert_7_option_0">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your knees are moving in, which is usually linked to a flatter arch.</p>
						</div>
					</script>
					
		
					<script type="text/template" id="TooltipAlert_7_option_1">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your knees are moving out which means you may experience side-to-side motion in your legs while you run. </p>
						</div>
					</script>
					
					<script type="text/template" id="TooltipAlert_7_option_2">
						<div>	
							<h3>What does this mean?</h3>
							<p>Your knees stay straight which means there will be less side-to-side motion in your legs while you run. </p>
						</div>
					</script>
		
					<script type="text/template" id="TooltipAlert_8_option_0">
						<div>	
							<h3>What does this mean?</h3>
							<p>Less flexible fingers tend to mean that your body parts handle movement together, meaning movements in the foot have the potential to negatively affect the knee.</p>
						</div>
					</script>

					<script type="text/template" id="TooltipAlert_8_option_1">
						<div>	
							<h3>What does this mean?</h3>
							<p>A flexible finger means your body parts handle movement more independently from each other.</p>
						</div>
					</script>


	<!-- END: Alert Templates -->



	<!-- START: Shoe Finder ImagesTemplates -->

	<script type="text/template" id="CheckpointRings">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 854 872">
		<path id="Ring2" d="M435,748.5c47.4,0,70.6-0.8,97.1-4.2c35.3-4.6,63.8-13.5,86.7-28.5c84.4-55.2,135.7-171.3,135.7-293.8
			c0-72.3-11.8-109.8-51.5-164.5c-30.6-42.2-71.8-81.9-116.4-111.1c-50-32.7-102-50.9-151.6-50.9c-86.9,0-162,37-224.7,105.5
			c-59.8,65.4-94.8,141.9-94.8,221C115.5,602.3,258.5,748.5,435,748.5z"/>
		<path id="Ring1" d="M190.4,693.6c39.4,35.5,59.3,52.2,83.9,69.2c32.8,22.6,63.2,36.5,93.5,41.2c111.6,17.3,241.2-40.9,332.9-142.7
			c54.1-60.1,72.4-100.2,80.4-175.5c6.1-58,1.6-121.9-13.6-179.6c-17.1-64.7-46.7-118.7-88-155.9c-72.2-65-162.5-90.5-265.8-80.4
			c-98.7,9.6-185.2,47-244.5,112.8C34.1,332.7,43.6,561.4,190.4,693.6z"/>
		</svg>
	</script>

	<script type="text/template" id="CushionLogo">
		<div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/cushion_horizontal.svg" data-bf-stepped-animation></div>
	</script>

	<script type="text/template" id="SpeedLogo">
		<div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/speed_horizontal.svg" data-bf-stepped-animation></div>
	</script>

	<script type="text/template" id="ConnectLogo">
		<div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/connect_horizontal.svg" data-bf-stepped-animation></div>
	</script>

	<script type="text/template" id="EnergizeLogo">
		<div class="bf-shoe-type-logo" data-bf-svg data-url="/images/shoefinder-new/energize_horizontal.svg" data-bf-stepped-animation></div>
	</script>

	<script type="text/template" id="CushionImage">
		<div class="bf-media bf-media--loader bf-experience-icon" data-bf-svg data-url="/images/shoefinder-new/cushion.svg" data-bf-stepped-animation data-active-screens="Checkpoint3"></div>
	</script>
	<script type="text/template" id="ConnectedImage">
		<div class="bf-media bf-media--loader bf-experience-icon" data-bf-svg data-url="/images/shoefinder-new/connect.svg" data-bf-stepped-animation data-active-screens="Checkpoint3"></div>
	</script>
	<script type="text/template" id="SpeedImage">
		<div class="bf-media bf-media--loader bf-experience-icon" data-bf-svg data-url="/images/shoefinder-new/speed.svg" data-bf-stepped-animation data-active-screens="Checkpoint3"></div>
	</script>
	<script type="text/template" id="EnergizeImage">
		<div class="bf-media bf-media--loader bf-experience-icon" data-bf-svg data-url="/images/shoefinder-new/energize.svg" data-bf-stepped-animation data-active-screens="Checkpoint3"></div>
	</script>
	<script type="text/template" id="VideoTemplate">
		<div class="bf-video" data-container>
			<div class="bf-video__toggle" data-pause-toggle><i class="bf-pause-icon" data-pause-icon></i><i class="bf-play-icon" data-play-icon></i><svg viewBox="0 0 38 38" class="bf-video__progress" ><circle cx="19" cy="19" r="8" class="video__progress__outline"/><circle cx="19" cy="19" r="8" class="video__progress__meter" data-progress-circle/></svg></div>
			<div class="bf-video__wrap">
				<img class="bf-video__image" class="bf-video__image" data-bf-image alt="" />
				<video autoplay="autoplay" loop muted playsinline>
					 <source type="video/mp4">
				</video>
			</div>
		</div>
	</script>

	<script type="text/template" id="BehindTheScienceLink">
		<div role="button" class="bf-info-link" data-bf-info-overlay-link data-template-id data-bf-button data-bf-event="behindScience" data-event-label tabindex="0">
			<div class="bf-info-link__icon">
				<i class="bf-beaker-icon">
					<svg viewBox="0 0 45 51" xmlns="http://www.w3.org/2000/svg" role="image">
						<path fill="#002955" d="M43.8,41.2L32.4,21.6L32.1,6.7H33c1.2,0,2.2-1,2.2-2.2V2.5c0-1.2-1-2.2-2.2-2.2h-1H12.9h-1
						c-1.2,0-2.2,1-2.2,2.2v1.9c0,1.2,1,2.2,2.2,2.2h0.9l-0.1,15L1.2,41.1c-2.5,4.3,0.6,9.6,5.5,9.6h31.6C43.2,50.7,46.2,45.4,43.8,41.2z
						 M14.3,31.9l4.1-6.8l0.9-1.5l0-1.8l0.1-14.9h6.2l0.3,14.8l0,1.7l0.9,1.5l4.1,7H14.3z"/>
					</svg>
				</i>
			</div>
			<div class="bf-info-link__text">Behind the Science</div>
		</div>
	</script>


	<!-- END: Shoe Finder Templates -->

	<!-- END: Shoe Finder -->


	<!-- START: Shoe Finder Scripts -->
	<script src="/js/shoefinder-new/ss-vendor.min.js" type="text/javascript"></script>
	<script src="/js/shoefinder-new/ss-nonmin.js" type="text/javascript"></script>
    

	<!-- END: Shoe Finder Scripts -->

	<!-- START: Shoe Finder Configuration -->
	<script>

		// Define BF endpoints 
		BF.endpoints = {
			checkpoint2: {
				url:'/ShoeFinder-Checkpoint?id=2',
				type: 'POST'
			},
			checkpoint3: {
				url: '/ShoeFinder-Checkpoint?id=3',
				type: 'GET'
			},
			results: {
				url: '/ShoeFinder-ResultsShow',
				type: 'GET'
			},
			// send progress endpoint must exist
			sendProgress: {
				url: '/ShoeFinder-Progress',
				type: 'GET'
			}
		}

		// Define Analytics events

		BF.eventTracking = {
			startQuiz: {
				category: 'Shoe Finder',
				action: 'Start Quiz',
				// label: 'lorem ipsum'
				// value: 123,
				// unique: true - if true event will only be submitted once per page load
			},
			restartQuiz: {
				category: 'Shoe Finder',
				action: 'Restart Quiz',
			},
			continueQuiz: {
				category: 'Shoe Finder',
				action: 'Continue Quiz',
			},
			viewResults: {
				category: 'Shoe Finder',
				action: 'View Results',
			},
			questionAnswered: {
				category: 'Shoe Finder',
				action: 'Question Answered',
				label: '' // assigned on individual inputs
			},
			behindScience: {
				category: 'Shoe Finder',
				action: 'Behind the Science',
				label: '' // assigned on individual links
			},
			checkpointReached: {
				category: 'Shoe Finder',
				action: 'Checkpoint',
				label: '' // checkpoint id assigned on individual links
			},
			resultsPageReached: {
				category: 'Shoe Finder',
				action: 'Results Page',
			}
		}

	</script>

	<!-- END: Shoe Finder Configuration -->

	<script>
		// Start finder app
		
		$(function() {			
		   BF.start();
		});
	</script>
</div>
</div>
</div>	
@endsection