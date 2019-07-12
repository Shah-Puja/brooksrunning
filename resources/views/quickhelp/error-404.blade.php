@extends('customer.layouts.master')
@section('content')
<style>
@media only screen 
and (min-device-width : 375px) 
and (max-device-width : 667px) 
and (orientation : landscape) { /* STYLES GO HERE */

	.bg{ height: 110vh !important; background-position: center center !important;}

	}
	@media only screen and (min-device-width : 414px) and (max-device-width : 736px) and (orientation : landscape) { 
		/* STYLES GO HERE */
		.bg{ height: 110vh !important; background-position: center center !important;}
	}
	@media only screen and (min-device-width : 375px) and (max-device-width : 812px) and (-webkit-device-pixel-ratio : 3) and (orientation : landscape) { /* STYLES GO HERE */
		.bg{ height: 110vh !important; background-position: center center !important;}
	}
</style>

<section class="errorpage-404-container ">
	<div class="wrapper">
		<div class="row">
			<div class="col-2 tab-2"></div>
			<div class="col-8 tab-8">
				<div class="errorpage-404-container--wrapper info errorpage-header--wrapper">
					<h3 class="br-heading">Oops! Looks like that page has run off!</h3>
					<p>Use our menu links or search bar to get you on the right path, <br class="hidden-mob hidden-tab visible-col"/> or check out our <a href="/shoefinder" class="shoefinder-link">Shoe Finder</a> to find your match.</p>
					<div class="button_fixed">
		       			<a class="secondary-button" href="/">Find shoes for your run</a>
		       	  </div>
				</div>
			</div>
				<!--<form name="subscriber_news1" method='post' action='/meet_brooks/enewsletter'>-->
			<div class="col-2 tab-2"></div>
		</div>
	</div>
</section>
<section class="create-account errorpage-404-section bg">
	<div class="wrapper">
		<div class="row">
			<div class="col-2 tab-2"></div>
			<div class="col-8 tab-8">
				<div class="errorpage-404-container--wrapper info errorpage-middle--wrapper errorpage-middle--wrapper-onmob">
					<div class="button_fixed_second">
						<a class="primary-button" href="/">Shop Women</a>
					</div>
					<div class="button_fixed_second">
						<a class="primary-button" href="/">Shop Men</a>
					</div>
				</div>
			</div>
				<!--<form name="subscriber_news1" method='post' action='/meet_brooks/enewsletter'>-->
			<div class="col-2 tab-2"></div>
		</div>
	</div>
</section>

@endsection