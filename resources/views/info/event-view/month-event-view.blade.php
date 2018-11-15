@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">

<section class="br-events-months" >
    <section class="event-banner" style="background: #0079b8;">
        <div class="event-banner--wrapper">
            <picture>
                <source media="(max-width: 595px)" srcset="/images/events/monthly/banner-monthly.png">
                <img src="/images/events/monthly/banner-monthly.png" alt="Header Images">
            </picture>
            <div class="event-banner--info">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner--info">
                                @php //echo "<pre>";print_r($prev_month);die; @endphp 
                                <h1 class="br-mainheading">RUNNING EVENTS {{ $month_name }}</h1>
                                <p class="br-info">Spring has sprung, which means it's time to spring into a new month of exciting running events. Brooks partners with a number of marathons, fun runs, triathlons and more being held around Australia in September 2018; plenty for you to join in on! 
                                    So if your running gear needs a bit of a spring clean, why not check out everything happening in Brooks' 2018 September running event calendar. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper monthly-events">
        <div class="content-asset clearfix row">
            <div class="no-mobile events-top">
                <a href="/events" class="cta backtoeventtop"><span style="display:none;">➤</span>Back to Events Page</a>
            </div>
            <ul class="monthly-event-list">
                <li>
                    <a href="/events/YMCA-fathers-day-fun-run" class="findout"><div class="event-title">
                            YMCA Fathers Day Fun Run                             </div></a>
                    <div class="title eventdate">Sun 02/09/18                                
                    </div>
                    <div class="event-img-main">
                        <a href="/events/YMCA-fathers-day-fun-run" class="findout">
                            <img src="/images/events/monthly/logo/YMCA-Fathers-Day_logo1.jpg" alt="YMCA Fathers Day Fun Run ">                                    </a>
                    </div>
                    <a href="/events/YMCA-fathers-day-fun-run" class="findout"><span class="location">Location, Melbourne, VIC</span></a>
                    <a href="/events/YMCA-fathers-day-fun-run" class="findout cta">Find Out More</a>
                </li>
                <li>
                    <a href="/events/sandy-point-half-marathon" class="findout"><div class="event-title">
                            Sandy Point Half Marathon </div></a>
                    <div class="title eventdate">Sun 09/09/18                                
                    </div>
                    <div class="event-img-main">
                        <a href="/events/sandy-point-half-marathon" class="findout">
                            <img src="/images/events/monthly/logo/SandyPointHalf_logo.jpg" alt="Sandy Point Half Marathon">                                    </a>
                    </div>
                    <a href="/events/sandy-point-half-marathon" class="findout"><span class="location">Location, Melbourne, VIC</span></a>
                    <a href="/events/sandy-point-half-marathon" class="findout cta">Find Out More</a>
                </li>
                <li>
                    <a href="/events/coffs-harbour-half-marathon" class="findout"><div class="event-title">
                            Coffs Harbour Running Festival</div></a>
                    <div class="title title eventdate">Sun 09/09/18</div>
                    <div class="event-img-main">
                        <a href="/events/coffs-harbour-half-marathon" class="findout">
                            <img src="/images/events/monthly/logo/coffs_logo.jpg" alt="Coffs Harbour Running Festival ">                                    </a>
                    </div>
                    <a href="/events/coffs-harbour-half-marathon" class="findout"><span class="location">Location, Coffs Harbour, NSW</span></a>
                    <a href="/events/coffs-harbour-half-marathon" class="findout cta">Find Out More</a>
                </li>
                <li>
                    <a href="/events/the-olivia-newton-john-wellness-walk-and-research-run" class="findout"><div class="event-title">The Olivia Newton John Wellness Walk and Research Run </div></a>
                    <div class="title eventdate">Sun 16/09/18                                
                    </div>
                    <div class="event-img-main">
                        <a href="/events/the-olivia-newton-john-wellness-walk-and-research-run" class="findout">
                            <img src="/images/events/monthly/logo/onj_wellness_logo.jpg" alt="The Olivia Newton John Wellness Walk and Research Run ">                                    </a>
                    </div>
                    <a href="/events/the-olivia-newton-john-wellness-walk-and-research-run" class="findout"><span class="location">Location, Melbourne, VIC</span></a>
                    <a href="/events/the-olivia-newton-john-wellness-walk-and-research-run" class="findout cta">Find Out More</a>
                </li>
                <li>
                    <a href="/events/forster-running-festival" class="findout"><div class="event-title">
                            Forster Running Festival                            </div></a>
                    <div class="title eventdate">Sun 23/09/18                                
                    </div>
                    <div class="event-img-main">
                        <a href="/events/forster-running-festival" class="findout">
                            <img src="/images/events/monthly/logo/forster_logo.jpg" alt="Forster Running Festival">                                    </a>
                    </div>
                    <a href="/events/forster-running-festival" class="findout"><span class="location">Location, Forster, NSW</span></a>
                    <a href="/events/forster-running-festival" class="findout cta">Find Out More</a>
                </li>
            </ul>
            <div class="linkpages"> 
                <div class="events-btn">
                    <span><a class="secondary-button" href="/events/month/{{$prev_month}}">Previous Month</a></span>
                    <span><a class="secondary-button" href="/events/month/{{$next_month}}">Next Month</a></span>
                    <a href="/events" class="cta backtoevent">Back to Events Page</a>
                </div>
            </div>
        </div>	
    </section>
</section>
@endsection