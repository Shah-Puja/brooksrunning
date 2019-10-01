@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css?v={{ Cache::get('css_version_number') }}">

<div class="create-account--header event__hero">
	<div class="wrapper pr-0 pl-0">	
        <div class="row">
        <input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
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
												<a href="/events">Events</a>
											</li>
											<li>
                                                <span style="color: #ffffff;font-size: 12px;">{{$event_name->event_name}}</span>
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
                    <img src="/images/new-events/banner/brooks-events-header-image.jpg">
                @endif
            </div>
		</div>
	</div>
</div>
<div class="create-account--header event-header event-intro">
  <div class="wrapper">
    <div class="row">
        <div class="col-12 tab-12">
      	    <div class="about-header">
            <div class="event-logo series-event-logo">
                @if($event_name->logo!='')
                    <img src="/images/new-events/monthly/logo/{{$event_name->logo}}">
                @else
                    <img src="/images/new-events/event-logo-placeholder.png">
                @endif
            </div>


            <div class="tabbedcontent hidden-mob visible-col visible-tab ">
                
                    <ul class="event_tabs">
                    @foreach($series_event as $series_events)

                        <li class="tab-link {{$series_events->id}} @if($city==$series_events->city && $id==$series_events->id) current @endif " 
                        data-tab="{{$series_events->id}}" 
                        data-logo="{{ ($series_events->logo!='')? '/images/new-events/monthly/logo/'.$series_events->logo : '' }}" 
                        data-banner="{{ ($series_events->banner!='')? '/images/new-events/banner/'.$series_events->banner : ''}}" 
                        data-event_name="{{$series_events->event_name}}" data-event_header="{{$series_events->event_header}}"
                        data-event_date="{{$series_events->end_dt}}" data-url='/events/{{$series_events->slug}}' data-slug="{{$series_events->slug}}" >
                            <div class="event-series-header">
                            <h2>{{$series_events->event_header}} </h2>
                              
                            @if($series_events->end_dt->toDateTimeString() < date('Y-m-d') && $series_events->end_dt->toDateTimeString()!=00)
                                             <h3>{{date('F Y',strtotime($series_events->next_dt))}}</h3>
                                             @else
                                             <h3>{{$series_events->date_str}}</h3>
                                             @endif
                            <h3> {{$series_events->city}},{{$series_events->state}}</h3>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                   
                    <!-- <hr  class="eventunderline"/> -->
                    @foreach($series_event as $series_events)
                    <div id="{{$series_events->id}}" class="tab-content @if($city==$series_events->city && $id==$series_events->id ) current @endif">
                        @if(trim(empty($series_events->content)))
                        <p> This text is for Race 1 at Melbourne Zoo.</p>
                        @else
                        <p>{!!$series_events->content!!}</p>
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
                                    <div class="item id-{{$series_events->id}}" data-current-tab='{{$active_slide}}' >
                                        <li class="tab-link {{$series_events->id}} " data-tab="{{$series_events->id}}" data-logo="{{ ($series_events->logo!='')? '/images/new-events/monthly/logo/'.$series_events->logo : '' }}" 
                        data-banner="{{ ($series_events->banner!='')? '/images/new-events/banner/'.$series_events->banner : ''}}" 
                        data-event_name="{{$series_events->event_name}}" data-event_header="{{$series_events->event_header}}"
                        data-event_date="{{$series_events->end_dt}}" data-slug="{{$series_events->slug}}" data-url="/events/{{$series_events->slug}}" data-index="{{$item_count_mob}}">
                                            <div class="event-series-header">
                                            <h2>{{$series_events->event_header}} </h2>
                                           
                                            
                                            @if($series_events->end_dt->toDateTimeString() < date('Y-m-d') && $series_events->end_dt->toDateTimeString()!=00)
                                             <h3>{{date('F Y',strtotime($series_events->next_dt))}}</h3>
                                             @else
                                             <h3>{{$series_events->date_str}}</h3>
                                             @endif
                                            
                                            </div>
                                        </li>
                                    </div>
                                @php $item_count_mob++; @endphp
                                @endforeach
                            </div>
                        </ul>
                        @foreach($series_event as $series_events)
                            <div id="mob-{{$series_events->id}}" class="event-content @if($city==$series_events->city && $id==$series_events->id) current @endif">
                                <p>{!!$series_events->content!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
             <!-- End For mobile only -->
            <div class="stay-tuned" >
                <p class="info">Stay tuned for more details on this event.</p>
		        <p class="event-signup"><a href="/meet_brooks/enewsletter" target="_blank" style="color:#005CFB;">Sign up</a> to our newsletter for event updates.</p> 
            </div>  
            <div class="find-more" >
                    <div class="event-findmore-btn">
                    @foreach($series_event as $series_events) 
                    @if($city==$series_events->city && $id==$series_events->id)    
                        <a href="{{$series_events->link}}" target="_blank" class="primary-button">Find Out More </a>
                        @endif 
                        @endforeach
                    </div>
            </div>  
        </div>
        </div>
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
                        <a href="/events" class="secondary-button">See More Events </a>
                    </div>
		     	</div>
	        </div>
	    </div>
	</div>
</section>

<script >
    $(document).ready(function(){

        var event_end_date=$('ul.event_tabs li.current ').attr('data-event_date');
        let now = (new Date()).toISOString().split('T')[0];
       //console.log(event_end_date);
        if(event_end_date <= now || event_end_date==00){
            $('.stay-tuned').css('display',"block");
            $('.find-more').css('display',"none");
         }else{
            $('.stay-tuned').css('display',"none");
            $('.find-more').css('display',"block");
         }
    var e_id,e_logo,e_slug;
       if ($("ul.event_tabs li").hasClass("current")) {
         
          e_slug=$("ul.event_tabs li.current").attr('data-slug');
          console.log(e_slug);
         
}



	
	$('ul.event_tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');
		$('ul.event_tabs li').removeClass('current');
		$('.tab-content').css('display',"none");




		$(this).addClass('current');
		$("#"+tab_id).css('display',"block");
        var logo = $(this).attr('data-logo');
        var banner = $(this).attr('data-banner');
        var event_name=$(this).attr('data-event_name');
        var event_header=$(this).attr('data-event_header');
        var name=event_name+" "+event_header; 
        $('.event-title').text(event_name);
        $('.breadcrumbs li span').text(event_name);
        $(".event-logo img").attr('src',(logo!='')? logo : '/images/new-events/event-logo-placeholder.png');
        $(".category__hero__image img").attr('src',(banner!='')? banner : '/images/new-events/banner/brooks-events-header-image.jpg');
        var event_end_date=$(this).attr('data-event_date');
        let now = (new Date()).toISOString().split('T')[0];
       
        if(event_end_date <= now || event_end_date==00){
            $('.stay-tuned').css('display',"block");
            $('.find-more').css('display',"none");
         }else{
            $('.stay-tuned').css('display',"none");
            $('.find-more').css('display',"block");
         }
         var url = $('ul.event_tabs li.current ').attr('data-url');
         ChangeUrl(event_name,url);
    });

    
    

    function ChangeUrl(page, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Page: page, Url: url };
        
        history.pushState(obj, obj.Page, obj.Url);
    } else {
        console.log("Browser does not support HTML5.");
    }
}
$(window).on('popstate', function(event) {
    
    if(event.originalEvent.state== null){
    
  
      //console.log('hello');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('#csrf').val()
        },
        url:"{{route('events-slug')}}",
        method: "get",
        data:{slug:e_slug},
        success: function (result) {
        //console.log(result.slug.logo);
        $(".event-logo img").attr('src',(result.slug.logo!='')? '/images/new-events/monthly/logo/'+result.slug.logo : '/images/new-events/event-logo-placeholder.png');
        $('ul.event_tabs li').removeClass('current');
		$('.tab-content').css('display',"none");



       
        $('ul.event_tabs li.'+result.slug.id).addClass('current');
        $("#"+result.slug.id).css('display',"block");

        if(result.slug.end_dt <= now || result.slug.end_dt==00){
            $('.stay-tuned').css('display',"block");
            $('.find-more').css('display',"none");
         }else{
            $('.stay-tuned').css('display',"none");
            $('.find-more').css('display',"block");
         }
        
        }

});

  }else{
    var str=event.originalEvent.state.Url;
    var slug = str.split('/')[2];
    console.log(slug);
$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('#csrf').val()
        },
        url:"{{route('events-slug')}}",
        method: "get",
        data:{slug:slug},
        success: function (result) {
        //console.log(result.slug.logo);
        $(".event-logo img").attr('src',(result.slug.logo!='')? '/images/new-events/monthly/logo/'+result.slug.logo : '/images/new-events/event-logo-placeholder.png');
        $('ul.event_tabs li').removeClass('current');
		$('.tab-content').css('display',"none");



       
        $('ul.event_tabs li.'+result.slug.id).addClass('current');
        $("#"+result.slug.id).css('display',"block");


        if(result.slug.end_dt <= now || result.slug.end_dt==00){
            $('.stay-tuned').css('display',"block");
            $('.find-more').css('display',"none");
         }else{
            $('.stay-tuned').css('display',"none");
            $('.find-more').css('display',"block");
         }
        
        }

});
}
    
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
      

