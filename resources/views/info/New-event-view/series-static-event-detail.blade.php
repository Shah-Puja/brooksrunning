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
												<a href="/">Events</a>
											</li>
											<li>
												<a href="JavaScript:Void(0);" class="active">Sunset Series</a>
											</li>
										</ul>
									</div>
								</div>
                                <h1 class="event-title">Sunset Series</h1>
						
							<!-- <p class="type">Brooks is proud to partner with a number of major running events around Australia and New Zealand all throughout the year.</p> -->
						</div>
					</div>
					<div class="collection-hero-overlay hidden-mob"></div>
				</div>
			
            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                <img src="/images/new-events/banner/sunset-series-event-header-image.jpg">
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
            <div class="event-logo">
            <img src="/images/new-events/logo/SunsetSeries_logo.png">
            </div>
            <div class="seriescontent">
                    <ul class="event_tabs">
                        <li class="tab-link current" data-tab="tab-1">
                            <div class="event-series-header">
                            <h2>Race 1 </h2>
                            <h3>Wed 6 Feb, 2019</h3>
                            <h3> Melbourne Zoo</h3>
                            </div>
                        </li>
                        <li class="tab-link" data-tab="tab-2">
                            <div class="event-series-header">
                            <h2>Race 2 </h2>
                            <h3>Thurs 21 Feb, 2019 </h3>
                            <h3>The Tan</h3>
                            </div>
                        </li>
                        <li class="tab-link" data-tab="tab-3">
                            <div class="event-series-header">
                            <h2>Race 3</h2>
                            <h3>Wed 6 Mar, 2019</h3>
                            <h3> Princes Park</h3>
                            </div>
                        </li>
                    </ul>
                    <hr  class="eventunderline"/>
                    <div class="tab-content current">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
            </div>
            <div class="stay-tuned" style="display:none;">
                <p class="info">Stay tuned for more details on this event.</p>
		        <p class="event-signup"><a href="#" style="color:#005CFB;">Sign up</a> to our newsletter for event updates.</p> 
            </div>  
            <div class="find-more" >
                    <div class="event-findmore-btn">
                        <button type="submit" class="primary-button">Find Out More </button>
                    </div>
            </div>  
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
                        <button type="submit" class="secondary-button">See More Events </button>
                    </div>
		     	</div>
	        </div>
	    </div>
	</div>
</section>


<!-- /Updated Section -->
    
@endsection       
      

