@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">
<section class="br-events-content">
    <section class="event-banner">
        <div class="event-banner--wrapper">
            <picture>
                <source media="(max-width: 595px)" srcset="/images/events/banner/{{ $event->banner }}">
                <img src="/images/events/banner/{{ $event->banner }}" alt="Header Images">
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
                                <a href="/events/month/{{ $event->month }}">Running Events {{ $event->month }}</a>
                            </li>
                            <li>
                                <a href="JavaScript:Void(0);" class="active">{{ $event->event_name }}</a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="sub-header">{{ $event->event_name }}</h3>
                    <h3 class="event-date">{{ $event->event_date }} </h3>
                    <p> {!! $event->content !!} </p>
                    <!-- <a target="_blank" class="registration-cta button no-mobile" href="http://bridgetobrisbaneday.com.au/">
                            Register Now
                        </a> -->
                    <div class="regNow-btn">
                        <a class="secondary-button" href="{{ $event->page_link }}">Register now</a>
                    </div>
                </div>
                <div class="col-2 tab-1">&nbsp;</div>
                <div class="col-5 tab-5 event-img">
                    @if(!empty($event->image)) 
                    <img src="/images/events/main/{{ $event->image }}" alt="{{ $event->event_name }}" />
                    @else 
                    <img src="/images/events/generic_event_image.jpg" alt="mothers-dayimg" />
                    @endif           
                </div>
            </div>
        </div>
    </section>
</section>
@endsection