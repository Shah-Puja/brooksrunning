@extends('customer.layouts.master')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/main.css">
<style>
    @media only screen and (max-width: 767px) and (orientation: landscape) {
        .event-mob-lanscape{
            width: 33.3333333333%;
            float: left;
        }
    }
</style>
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
                                        <a href="JavaScript:Void(0);" class="active">Events</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h1 class="large">Brooks at Events</h1>

                        <p class="type">Brooks is proud to partner with a number of major running events around Australia and New Zealand all throughout the year. Check out upcoming events near you.</p>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>

            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                <img src="/images/new-events/banner/brooks-events-header-image.jpg">
            </div>
        </div>
    </div>
</div>
<section class="event-filters">
    <div class="event-full-background  wrapper">
        <div class="row">
            <div class="col-12 tab-12">
                <div class="row">
                    <div class="wrapper pr-0 pl-0">
                        <div class="event-background wrapper">
                            <form name="event_filter" method='post' action='/events-listing'>
                                @csrf
                                <h1 class="br-mainheading">Find an Event</h1>
                                <div class="col-4 tab-4 mob-6">
                                    <div class="event-filters--wrapper">
                                        <div class="input-wrapper">
                                            <select class="select-field" name="where" id="where" style="margin-bottom: 0px;">
                                                <option value="">Where</option>
                                                <option  style="font-weight:bold;color:#000;" <?php echo ($where == "Australia") ? "selected=selected" : ""; ?> value="Australia ">Australia</option>
                                                <option <?php echo ($where == "ACT") ? "selected=selected" : ""; ?> value="ACT">ACT</option>
                                                <option  <?php echo ($where == "NSW") ? "selected=selected" : ""; ?> value="NSW">NSW</option>
                                                <option <?php echo ($where == "NT") ? "selected=selected" : ""; ?> value="NT">NT</option>
                                                <option <?php echo ($where == "QLD") ? "selected=selected" : ""; ?> value="QLD">QLD</option>
                                                <option <?php echo ($where == "SA") ? "selected=selected" : ""; ?> value="SA">SA</option>
                                                <option <?php echo ($where == "TAS") ? "selected=selected" : ""; ?> value="TAS">TAS</option>
                                                <option <?php echo ($where == "VIC") ? "selected=selected" : ""; ?> value="VIC">VIC</option>
                                                <option <?php echo ($where == "WA") ? "selected=selected" : ""; ?> value="WA">WA</option>
                                                <option  style="font-weight:bold;color:#000;" <?php echo ($where == "New Zealand") ? "selected=selected" : ""; ?> value="New Zealand">New Zealand</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 tab-4 mob-6">
                                    <div class="event-filters--wrapper">
                                        <div class="input-wrapper">
                                            <select class="select-field" name="when" id="when" style="margin-bottom: 0px;">
                                                <option value="">When</option>
                                                <?php
                                                $month = strtotime(date('Y') . '-' . date('m') . '-' . date('j') . ' + 0 months');
                                                $end = strtotime(date('Y') . '-' . date('m') . '-' . date('j') . ' + 13 months');
                                                while ($month < $end) {
                                                    ?>
                                                    <option <?php echo (date('m Y', $month) == $when) ? 'selected=selected' : ''; ?> value="<?php echo date('m Y', $month); ?>" ><?php echo date('F Y', $month); ?></option>
                                                    <?php
                                                    echo "\n";
                                                    $month = strtotime("+1 month", $month);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 tab-4 mob-12">
                                    <div class="event-filters--wrapper">
                                        <div class="btn">
                                            <button type="submit" class="primary-button">Find Events</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="no-result" >
                                @if(count($all_events) == 0)
                                <p class="error">Sorry, currently no events match those selections. Please try again.</p>
                                @endif
                                @if(($when!='') OR ($where!=''))
                                <p class="clear-filter">clear filters <a id="clear_filter" href=""><span style="color:#000;">&#9746;</span></a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="event-container">
    <div class="wrapper">
        <div class="row">
            <div class="col-12 tab-12">
                <div class="row">
                    <div class="event-wrapper-container">
                        @if (count($all_events) > 0)
                        @foreach($all_events as $events)
                        <div class="mob-6 col-4 tab-4 event-wrapper__sub event-mob-lanscape">
                            <div class="event-section"> 
                                <a href="#" >
                                    <div class="img">
                                        @if(!empty($events->logo))  
                                        <img id="event-img" src="/images/events/monthly/logo/{{ $events->logo }}" alt="">
                                        @else 
                                        <img src="/images/events/generic_event_image.jpg" alt="mothers-dayimg" />
                                        @endif         
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="info">
                                        <h3>{{ $events->event_name }}</h3>
                                        <div class="event-info-sub">
                                            @if(!empty($events->event_date))
                                            <div class="date">
                                                {{$events->event_date}}
                                            </div> 
                                            @endif 
                                            <div class="location">{{ $events->location }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- <div class="event-load-more">
                                <a href="#">Load More (15 Remaining)</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@php
echo "<pre>";print_r($other_upcoming_events);die;
@endphp
<section class="event-container">
    <div class="wrapper">
        <div class="row">
            <div class="col-12 tab-12">
                <div class="row">
                    <h1 class="br-mainheading">Other Upcoming Events</h1>
                    <div class="event-wrapper-container">	
                        <div class="mob-6 col-4 tab-4 event-wrapper__sub event-mob-lanscape">
                            <div class="event-section">
                                <a href="#" >
                                    <div class="img">
                                        <img id="event-img" src="images/new-events/logo/X-Adventure_logo.jpg" alt="">
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="info">
                                        <h3>Olivia Newton John Wellness Walk &amp; Research Run</h3>
                                        <div class="event-info-sub"><div class="date">September 2019</div>
                                            <div class="location">Melbourne, VIC</div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mob-6 col-4 tab-4 event-wrapper__sub event-mob-lanscape">
                            <div class="event-section">
                                <a href="#" >
                                    <div class="img">
                                        <img id="event-img" src="images/new-events/logo/Point-Pinnacle_logo.png" alt="">
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="info">
                                        <h3>Point To Pinnacle</h3>
                                        <div class="event-info-sub">
                                            <div class="date">November 2019</div>
                                            <div class="location">Hobart, TAS</div>
                                        </div></div>
                                </a>
                            </div>
                        </div>
                        <div class="mob-6 col-4 tab-4 event-wrapper__sub event-mob-lanscape">
                            <div class="event-section">
                                <a href="#" >
                                    <div class="img">
                                        <img id="event-img" src="images/new-events/logo/PortMac_RF_logo.jpg" alt="">
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="info">
                                        <h3>Run The Bridge Hobart</h3>
                                        <div class="event-info-sub">
                                            <div class="date">
                                                February 2020
                                            </div>
                                            <div class="location">Hobart, TAS</div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="event-load-more">
                                <a href="#">Load More (15 Remaining)</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /Updated Section -->
<script>
    $(document).ready(function () {
        $('#clear_filter').click(function () {
            $('#when').prop('selectedIndex', 0);
            $('#where').prop('selectedIndex', 0);
        })
    });
</script>
@endsection       


