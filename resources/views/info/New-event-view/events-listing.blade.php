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
                                            <a href="JavaScript:Void(0);" class="active">Events</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <h1 class="large">Brooks at Events</h1>
                       
                        <p class="type">Brooks is proud to partner with a number of major running events around Australia and New Zealand all throughout the year.</p>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>
            <div class="category__hero__image mob-12 col-6 tab-12 pr-0 pl-0">
                <img src="/images/new-events/banner/brooks-events-header-image.jpg">
            </div>
        </div>
</div>
<section class="event-filters">
	<div class="event-background wrapper">
	<h1 class="br-mainheading">Find an Event</h1>
		<div class="row">
			<form name="event_filter" method='post' action='/meet_brooks/events'>
				<div class="col-4 tab-6">
					<div class="event-filters--wrapper">
						<div class="input-wrapper">
							<select class="select-field" name="category" id="category" style="margin-bottom: 0px;">
								<option value="">Where</option>
								<option value="Australia ">Australia </option>
								<option value="ACT">ACT</option>
								<option  value="NSW">NSW</option>
								<option value="NT">NT</option>
								<option value="QLD">QLD</option>
								<option value="SA">SA</option>
								<option value="TAS">TAS</option>
								<option value="VIC">VIC</option>
								<option value="WA">WA</option>
								<option value="New Zealand">New Zealand</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-4 tab-6">
					<div class="event-filters--wrapper">
						<div class="input-wrapper">
							<select class="select-field" name="category" id="category" style="margin-bottom: 0px;">
								<option value="">When</option>
								<option value="March 2019">March 2019</option>
								<option value="April 2019">April 2019</option>
								<option  value="May 2019">May 2019</option>
								<option value="June 2019">June 2019</option>
								<option value="July 2019">July 2019</option>
								<option value="August 2019">August 2019</option>
								<option value="September 2019">September 2019</option>
								<option value="October 2019">October 2019</option>
								<option value="November 2019">November 2019</option>
								<option value="December 2019">December 2019</option>
								<option value="January 2020">January 2020</option>
								<option value="February 2020">February 2020</option>
								<option value="March 2020">March 2020</option>
								<option value="other">Other</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-4 tab-12">
					<div class="event-filters--wrapper">
						<div class="btn">
							<button type="submit" class="primary-button">Find Events</button>
						</div>
					</div>
				</div>
			</form>
	    </div>
		<div class="no-result" style="display:none;">
			<p class="error">Sorry, currently no events match those selections. Please try again.</p>
			<p class="clear-filter">clear filters <a href="#"><span>&#9746;</span></a></p>
		</div>
	</div>
</section>
<section class="event-container">
	<div class="wrapper">
		<div class="row">
			<div class="col-12 tab-12">
				<div class="row">
					<div class="event-wrapper-container">
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/iwdfr_logo.png" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>International Women's Day Fun Run</h3>
										<div class="date">
										3 March 2019 
										</div>
										<div class="location">Melbourne, VIC</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/SunsetSeries_logo.jpg" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>Sunset Series Race 3</h3>
										<div class="date">
										6 March 2019
										</div>
										<div class="location"> Princess Park, VIC</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/PortMac_RF_logo.jpg" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>Port Macquarie Running Festival</h3>
										<div class="date">
										9 March 2019 
										</div>
										<div class="location">Port Macquarie, NSW</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/Christchurch-City-to-Surf_logo.jpg" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>City 2 Surf Christchurch</h3>
										<div class="date">24 March 2019 </div>
										<div class="location">Christchurch, NZ</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/albany_lakes_logo.png" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>Albany Lakes Summer Series Race 3</h3>
										<div class="date">24 March 2019</div>
										<div class="location">Albany, NZ</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/X-Adventure_logo.jpg" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>X-Adventure Triathlon</h3>
										<div class="date">30-31 March 2019</div>
										<div class="location">Dunsborough, WA</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/iwdfr_logo.png" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>International Women's Day Fun Run</h3>
										<div class="date">
										3 March 2019 
										</div>
										<div class="location">Melbourne, VIC</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 event-wrapper__sub">
							<div class="event-section">
								
								<a href="#" >
								<div class="img">
										<img id="event-img" src="images/new-events/logo/iwdfr_logo.png" alt="">
								</div>
								</a>
								
								<a href="#">
									<div class="info">
										<h3>International Women's Day Fun Run</h3>
										<div class="date">
										3 March 2019 
										</div>
										<div class="location">Melbourne, VIC</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="event-load-more">
							<a href="#">Load More (15 Remaining)</a>
						</div>
					</div>
			    </div>
			</div>
			<div class="filter-mob--apply event-mob-filter__control">
				<a href="#">Apply</a>
			</div>
	    </div>
	</div>
</section>

<!-- /Updated Section -->
    
@endsection       
      

