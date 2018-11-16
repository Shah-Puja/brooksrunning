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
                                <p class="br-info"> {{ $months->content }} </p>
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
            @php //echo "<pre>";print_r($events);die; @endphp
                @if(isset($events[0]) && $events[0]!="")  
                    @foreach ($events as $event)
                    <li>
                        @php $event_slug = $event->slug; @endphp
                    <a href="/events/{{ $event_slug }}" class="findout"><div class="event-title"> {{ $event->event_name }} </div></a>
                    <div class="title eventdate">
                         @php
                              $event_time = strtotime($event->event_timestamp);
                              $event_date = date('D d/m/y',$event_time);
                        @endphp
                            {{ $event_date }} 
                    </div>
                    <div class="event-img-main">
                        <a href="/events/{{ $event_slug }}" class="findout"> 
                            @if(!empty($event->logo)) 
                        <img src="/images/events/monthly/logo/{{ $event->logo }}" alt="{{ $event->event_name }}" />
                            @else 
                        <img src="/images/events/generic_event_image.jpg" alt="mothers-dayimg" />
                            @endif   
                        </a>
                    </div>
                    <a href="/events/{{ $event->slug }}" class="findout"><span class="location">Location, {{ $event->location }}</span></a>
                    <a href="/events/{{ $event->slug }}" class="findout cta">Find Out More</a>
                    </li>
                    @endforeach
                @else
                    <div class="no-result"><h2>No Events Available for this month</h2></div>
                @endif 
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