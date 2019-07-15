@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css">

<div class="create-account--header event__hero">
	<div class="wrapper pr-0 pl-0">	
        <div class="row">
            <div class="m-block--hero m-block--hero--basic--collection mob-12 col-6 tab-6">
				<div class="m-block--hero--collection__content">
						<div class="m-block--hero__content__copy">
						<div class="about-header">
							<div class="breadcrumbs">
										<ul>
											<li>
												<a href="/">Home</a>
                                            </li>
                                            <li>
												<a href="/events-listing">Events</a>
											</li>
											<li>
												<a href="JavaScript:Void(0);" class="active">{{ucwords(str_replace("-"," ",$single_event->event_name))}}</a>
											</li>
										</ul>
									</div>
								</div>
							<h1 class="event-title">{{ucwords(str_replace("-"," ",$single_event->event_name))}}</h1>
						
							<!-- <p class="type">Brooks is proud to partner with a number of major running events around Australia and New Zealand all throughout the year.</p> -->
						</div>
					</div>
					<div class="collection-hero-overlay hidden-mob"></div>
				</div>
			
            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                @if($single_event->banner!='')
                    <img src="/images/new-events/banner/{{$single_event->banner}}">
                @else
                    <img src="/images/new-events/brooks-events-header-image.jpg">
                @endif
            </div>
		</div>
	</div>
</div>
<div class="create-account--header event-header event-intro">
  <div class="wrapper">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
      	    <div class="about-header">
            <div class="event-logo single-event">
                @if($single_event->logo!='')
                    <img src="/images/new-events/monthly/logo/{{$single_event->logo}}">
                @else
                    <img src="/images/new-events/generic_event_image.jpg">
                @endif
            </div>
            @if($single_event->end_dt < date('Y-m-d') && $single_event->end_dt!=00)
            <h2>{{date('F Y',strtotime($single_event->next_dt))}} </h1>
            @else
            <h2>{{$single_event->date_str}} </h1>
            @endif
            <h4>{{$single_event->city}}</h4>
            <hr  class="event-single-underline"/>
            <p>{!!$single_event->content!!}</p>
            @if($single_event->end_dt < date('Y-m-d') || $single_event->end_dt==00)
            <div class="stay-tuned">
                <p class="info">Stay tuned for more details on this event.</p>
		        <p class="event-signup"><a href="/meet_brooks/enewsletter" target="_blank" style="color:#005CFB;">Sign up</a> to our newsletter for event updates.</p> 
            </div>
            @else  
            <div class="event-findmore-btn" >
                    <div class="btn">
                    <a href="{{$single_event->link}}" target="_blank" class="primary-button">Find Out More </a>
                    </div>
            </div>  
            @endif
        </div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>
  </div>
</div>
<section class="event-footer">
	<div class="wrapper">
		<div class="row">
	  		<div class="col-12 tab-12">
	    		<div class="event-footer--wrapper info">
                    <div class="btn">
                        <a href='/events-listing' ><button type="submit" class="secondary-button">See More Events </button></a>
                    </div>
		     	</div>
	        </div>
	    </div>
	</div>
</section>


<!-- /Updated Section -->
    
@endsection       
      

