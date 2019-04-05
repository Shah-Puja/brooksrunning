@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css">

<div class="create-account--header event__hero">
 
        <div class="row">
            <div class="m-block--hero m-block--hero--basic--collection mob-12 col-6 tab-12">
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
                                            <a href="JavaScript:Void(0);" class="active">Sunset Series</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <h1 class="event-title">Sunset Series</h1>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>
            <div class="category__hero__image mob-12 col-6 tab-12 pr-0 pl-0">
                <img src="/images/new-events/banner/iwdfr-event-header-image.jpg">
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
                    <!-- <div class="event-series-first">
                        <h2>Date TBA March, 2020 </h1>
                        <h2>Brisbane, QLD</h1>
                        <hr width="20%" class="eventunderline"/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div> -->
            <div class="tabbedcontent">

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
                    <div id="tab-1" class="tab-content current">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div id="tab-2" class="tab-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab.</p>
                    </div>
                    <div id="tab-3" class="tab-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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

<script>
    $(document).ready(function(){
	
	$('ul.event_tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.event_tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})
</script>
<!-- /Updated Section -->
    
@endsection       
      

