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
                                                <a href="javascript:void(0)" class="active">{{$event_name->event_name}}</a>
                                            </li>
										</ul>
									</div>
								</div>
                                <h1 class="event-title">{{$event_name->event_name}}</h1>
							<!-- <p class="type">Brooks is proud to partner with a number of major running events around Australia and New Zealand all throughout the year.</p> -->
						</div>
					</div>
					<div class="collection-hero-overlay hidden-mob"></div>
				</div>
			
            <div class="category__hero__image mob-12 col-6 tab-6 pr-0 pl-0">
                @if($event_name->banner!='')
                    <img src="/images/new-events/banner/{{$event_name->banner}}">
                @else
                    <img src="/images/new-events/generic_event_header.png">
                @endif
            </div>
		</div>
	</div>
</div>
<div class="create-account--header event-header event-intro">
  <div class="wrapper">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
      	    <div class="about-header">
            <div class="event-logo">
                @if($event_name->logo!='')
                    <img src="/images/new-events/monthly/logo/{{$event_name->logo}}">
                @else
                    <img src="/images/new-events/generic_event_image.jpg">
                @endif
            </div>


            <div class="tabbedcontent hidden-mob visible-col visible-tab ">
                
                    <ul class="event_tabs">
                    @foreach($series_event as $series_events)

                        <li class="tab-link @if($city==$series_events->city) echo current @endif " data-tab="{{$series_events->id}}">
                            <div class="event-series-header">
                            <h2>{{$series_events->event_name}} </h2>
                             <h3> {{date('D d M Y',strtotime($series_events->date))}}</h3>
                            <h3> {{$series_events->city}}</h3>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                   
                    <!-- <hr  class="eventunderline"/> -->
                    @foreach($series_event as $series_events)
                    <div id="{{$series_events->id}}" class="tab-content @if($city==$series_events->city) current @endif">
                        @if(trim(empty($series_events->content)))
                        <p> This text is for Race 1 at Melbourne Zoo.</p>
                        @else
                        <p>{{$series_events->content}}</p>
                        @endif 
                    </div>
                    @endforeach
            </div>

            <!-- For mobile only -->
            <div class="new-event--container visible-mob hidden-col hidden-tab">
                    <div class="tabbedmobcontent">
                        <ul class="event_mob_tabs">
                            <div id="event-carousel">
                                @php $item_count_mob=0; @endphp
                                @foreach($series_event as $series_events)
                                    @php $active_slide = ($city==$series_events->city) ? $item_count_mob: ""; @endphp
                                    <div class="item" data-current-tab='{{$active_slide}}' >
                                        <li class="tab-link" data-tab="{{$series_events->id}}">
                                            <div class="event-series-header">
                                            <h2>{{$series_events->event_name}} </h2>
                                            <h3>{{date('D d M Y',strtotime($series_events->date))}}</h3>
                                            <h3>{{$series_events->city}}</h3>
                                            </div>
                                        </li>
                                    </div>
                                @php $item_count_mob++; @endphp
                                @endforeach
                            </div>
                        </ul>
                        @foreach($series_event as $series_events)
                            <div id="mob-{{$series_events->id}}" class="event-content @if($city==$series_events->city) current @endif">
                                <p>{{$series_events->content}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
             <!-- End For mobile only -->
            <div class="stay-tuned" style="display:none;">
                <p class="info">Stay tuned for more details on this event.</p>
		        <p class="event-signup"><a href="#" style="color:#005CFB;">Sign up</a> to our newsletter for event updates.</p> 
            </div>  
            <div class="find-more" >
                    <div class="event-findmore-btn">
                        <a href="/events-listing" class="primary-button">Find Out More </a>
                    </div>
            </div>  
        </div>
        </div>
        <div class="col-1"></div>
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
                        <a href="/events-listing" class="secondary-button">See More Events </a>
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
		$('.tab-content').css('display',"none");

		$(this).addClass('current');
		$("#"+tab_id).css('display',"block");
    });
    
});

// $(document).ready(function(){
	
// 	$('ul.event_mob_tabs li').on('click',function(){
// 		var tab_id = $(this).attr('data-tab');
//         console.log(tab_id);
// 		//$('ul.event_mob_tabs li').removeClass('current');
// 		//$('.event-content').removeClass('current');

// 		//$(this).addClass('current');
//        // $("#"+tab_id).addClass('current');
//        // $(".event-content").hide();
// 		//$("#"+tab_id).show();
        
// 	});

   

// });


// New Event Page
   
</script>
<!-- /Updated Section -->
    
@endsection       
      

