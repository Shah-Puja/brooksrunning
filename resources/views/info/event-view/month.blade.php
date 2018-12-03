@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">
<section class="br-events-content">
    <section class="event-banner">
        <div class="event-banner--wrapper" style="background-color: #1a6ec6;">
            <picture>
                <source media="(max-width: 595px)" srcset="/images/events/generic_event_header.png">
                <img src="/images/events/generic_event_header.png" alt="Header Images">
            </picture>
        </div>
    </section>
    <section class="create-account--header plp-header" style="    background-color: #ea549c; position: relative;
             padding-top: 0;">
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
                                <a href="#" class="active">Running Events</a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="sub-header">&nbsp;</h3>
                    <h3 class="event-date">&nbsp;</h3>
                    <div class="regNow-btn">
                        <a class="secondary-button" href="http://bridgetobrisbaneday.com.au/">Register now</a>
                    </div>
                </div>
                <div class="col-2 tab-1">&nbsp;</div>
                <div class="col-5 tab-5 event-img">
                    <img src="/images/events/generic_event_image.jpg" alt="Bridge to Brisbane">                   
                </div>
            </div>
        </div>
    </section>

</section>

@endsection