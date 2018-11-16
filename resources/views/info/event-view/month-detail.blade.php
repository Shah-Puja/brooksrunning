@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">

<section class="br-events-content">
	<section class="event-banner">
	<div class="event-banner--wrapper">
	      <picture>
	        <source media="(max-width: 595px)" srcset="/images/events/banner/bridge2bris_event_header.jpg">
	        <img src="/images/events/banner/bridge2bris_event_header.jpg" alt="Header Images">
	      </picture>
	  </div>
	</section>
	<section class="create-account--header plp-header">
	<div class="wrapper">
		<div class="row">
			<div class="col-5 tab-6">
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="/">Home</a>
						</li>
						<li>
							<a href="/events">Events</a>
						</li>
						<li>
							<a href="#">Running Events August</a>
						</li>
						<li>
							<a href="JavaScript:Void(0);" class="active">Bridge to brisbane</a>
						</li>
					</ul>
				</div>
				<h3 class="sub-header">Bridge to Brisbane</h3>
                <h3 class="event-date">Sunday 26th August 2018</h3>
                <p>Bridge to Brisbane Day is the day to celebrate what makes Brisbane special. We get together to show our big heart by running for charity in the morning. Then get together with the ones we love in the afternoon to enjoy all that's wonderful about living in Brisbane. It's a natural human trait to feel that a good (and healthy) deed in the morning earns you good times for the rest of the day - Bridge to Brisbane Day acknowledges and encourages that feeling. You're invited to join in the 5km or 10km course. For more information, visit&nbsp;<a href="http://bridgetobrisbaneday.com.au/">www.bridgetobrisbaneday.com.au</a> or to see more events in August visit our <a href="/events/month/august">August Event Calendar</a> page.</p>
                <!-- <a target="_blank" class="registration-cta button no-mobile" href="http://bridgetobrisbaneday.com.au/">
                        Register Now
                    </a> -->
                <div class="regNow-btn">
				<a class="secondary-button" href="http://bridgetobrisbaneday.com.au/">Register now</a>
				</div>
			</div>
			<div class="col-2 tab-1">&nbsp;</div>
			<div class="col-5 tab-5 event-img">
                        <img src="/images/events/main/bridge2bris_event_image.jpg" alt="Bridge to Brisbane">                   
			</div>
		</div>
	</div>
</section>

</section>

@endsection