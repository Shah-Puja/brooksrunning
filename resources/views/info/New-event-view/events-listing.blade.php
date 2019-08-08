@extends('customer.layouts.master')

@section('head')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
@endsection

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">
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
                            <form name="event_filter">
                            {{ csrf_field() }}
                                <h1 class="br-mainheading">Find an Event</h1>
                                <div class="col-4 tab-4 mob-6">
                                    <div class="event-filters--wrapper">
                                        <div class="input-wrapper">
                                            <select class="select-field" name="where" id="where" style="margin-bottom: 0px;">
                                                <option value="">Where</option>
                                                <option  style="font-weight:bold;color:#000;" <?php echo ($where == "Australia") ? "selected=selected" : ""; ?> value="Australia">Australia</option>
                                                <option <?php echo ($where == "ACT") ? "selected=selected" : ""; ?> value="ACT">ACT</option>
                                                <option  <?php echo ($where == "NSW") ? "selected=selected" : ""; ?> value="New_South_Wales">NSW</option>
                                                <option <?php echo ($where == "NT") ? "selected=selected" : ""; ?> value="NT">NT</option>
                                                <option <?php echo ($where == "QLD") ? "selected=selected" : ""; ?> value="Queensland">QLD</option>
                                                <option <?php echo ($where == "SA") ? "selected=selected" : ""; ?> value="South_Australia">SA</option>
                                                <option <?php echo ($where == "TAS") ? "selected=selected" : ""; ?> value="Tasmania">TAS</option>
                                                <option <?php echo ($where == "VIC") ? "selected=selected" : ""; ?> value="Victoria">VIC</option>
                                                <option <?php echo ($where == "WA") ? "selected=selected" : ""; ?> value="Western_Australia">WA</option>
                                                <option  style="font-weight:bold;color:#000;" <?php echo ($where == "New Zealand") ? "selected=selected" : ""; ?> value="New_Zealand">New Zealand</option>
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
                                                    <option <?php echo (date('m Y', $month) == $when) ? 'selected=selected' : ''; ?> value="<?php echo date('m-Y', $month); ?>" ><?php echo date('F Y', $month); ?></option>
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
                                            <button type="button" id="find_events" class="primary-button">Find Events</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="no-result" >
                                <p class="error" style="display:none;">Sorry, currently no events match those selections. Please try again.</p>
                                <p class="clear-filter" style="display:none;"><a id="clear_filter" href="">clear filters <span style="color:#000;">&#9746;</span></a></p>
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
                    <div class="event-wrapper-container grid2">
                        @if (count($all_events) > 0)
                        @foreach($all_events as $events)
                        <div class="mob-6 col-4 tab-4 event-wrapper__sub event-mob-lanscape element-item2 {{str_replace(' ','_',$events->state)}} {{str_replace(' ','_',$events->country)}} {{str_replace(' ','_',date('m-Y',strtotime($events->start_dt)))}}"  event_id='{{$events->id}}'>
                        
                             <div class="event-section">
                               
                                <a href="/events/{{$events->slug}}" >
                                    <div class="img">
                                        @if(!empty($events->logo))  
                                        <img id="event-img" src="/images/new-events/monthly/logo/{{ $events->logo }}" alt="">
                                        @else 
                                        <img src="/images/new-events/event-logo-placeholder.png" alt="mothers-dayimg" />
                                        @endif         
                                    </div>
                                </a>
                                <a href="/events/{{$events->slug}}" >
                                    <div class="info">
                                        <h3>{{ $events->event_name }}</h3>
                                        <div class="event-info-sub">
                                            @if(!empty($events->date_str))
                                            <div class="date">
                                            <!-- @php
                                            $myTime = strtotime($events->date);
                                            $newTime = date('l jS  F Y', $myTime);
                                            @endphp -->
                                                {{$events->date_str}}
                                            </div> 
                                            @endif 
                                            <div class="location">{{ $events->city }}</div>
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

@if (count($other_upcoming_events) > 0) 
<section class="event-container other_upcoming_events">
    <div class="wrapper">
        <div class="row">
            <div class="col-12 tab-12">
                <div class="row">
                    <h1 class="br-mainheading">Other Upcoming Events</h1>
                    <div class="event-wrapper-container grid2">	
                        @foreach($other_upcoming_events as $upcoming_events)
                        
                        <div class="mob-6 col-4 tab-4 event-wrapper__sub event-mob-lanscape element-item2 
                        {{str_replace(' ','_',$upcoming_events->state)}} 
                        {{str_replace(' ','_',$upcoming_events->country)}}  
                        {{str_replace(' ','_',date('m-Y',strtotime($upcoming_events->next_dt)))}}
                        @if($upcoming_events->end_dt==00)
                       {{str_replace(' ','_',date('m-Y',strtotime('-1 year', strtotime($upcoming_events->next_dt))))}}
                       @endif">
                            <div class="event-section">
                           
                                <a href="/events/{{$upcoming_events->slug}}" >
                                    <div class="img">
                                        @if(!empty($upcoming_events->logo))  
                                        <img id="event-img" src="/images/new-events/monthly/logo/{{ $upcoming_events->logo }}" alt="">
                                        @else 
                                        <img src="/images/new-events/event-logo-placeholder.png" alt="mothers-dayimg" />
                                        @endif  
                                    </div>
                                </a>
                                <a href="/events/{{$upcoming_events->slug}}" >
                                    <div class="info">
                                        <h3>{{ $upcoming_events->event_name }}</h3>
                                        <div class="event-info-sub">
                                        @if(!empty($upcoming_events->date_str))
                                             @if($upcoming_events->end_dt < date('Y-m-d') && $upcoming_events->end_dt!=00)
                                             
                                             <div class="date">{{date('F Y',strtotime($upcoming_events->next_dt))}}</div>
                                             @else
                                          <div class="date">{{$upcoming_events->date_str}}</div>
                                          @endif
                                           @endif
                                            <div class="location">{{ $upcoming_events->city }}</div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                       
                        @endforeach
                        <!-- <div class="event-load-more">
                                <a href="#">Load More (15 Remaining)</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


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

@section('footer_js')



<script>
    var $grid2 = $('.grid2').isotope({
                itemSelector: '.element-item2',
                layoutMode: 'fitRows'
            });
  
    $(document).on('click','#find_events',function(){
        $(".no-result .error").hide();
        $(".no-result .clear-filter").show();
        $('.other_upcoming_events').find('.br-mainheading').show();
        var where_val = ($("#where").val()!='') ? "."+$("#where").val(): '';
        var when_val =($("#when").val()!='') ? "."+$("#when").val(): '';
        var filter_val = [where_val,when_val] ;
        var filtered = filter_val.filter(function (el) { return el!='';});
        console.log(filtered.join("").trim());
        $grid2.isotope({ filter: filtered.join("").trim() ,layoutMode: 'fitRows'});
        setTimeout(function(){
            if($('.element-item2:visible').length==0){
                $(".no-result .error").show();
            }
            if($('.other_upcoming_events').find('.element-item2:visible').length==0){
                $('.other_upcoming_events').find('.br-mainheading').hide();
            }
            console.log($('.element-item2:visible').length);
        }, 500);
        return false;
    });

    $(document).on('click','#clear_filter',function(){
        $grid2.isotope({ filter: '*',layoutMode: 'fitRows'});
        $(".no-result .clear-filter").hide();
        $(".no-result .error").hide();
        $("#where").val("");
        $("#when").val("");
        $('.other_upcoming_events').find('.br-mainheading').show();
        return false;
    });


     $(window).bind("pageshow", function() {
        $('#where').val('');
        
        $('#when').val('');

        $("#clear_filter").trigger("click");
});
</script>
@endsection
