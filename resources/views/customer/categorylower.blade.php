@extends('customer.layouts.master')

@section('content')

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<section class="create-account--header plp-header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="#">{{ $gender=='M' ? 'Mens' : 'Womens' }}</a>
						</li>
						 @php $page_name = str_replace("-"," ",Request::segment(1)); @endphp
						<li>
							<a href="/{{Request::segment(1)}}" class="active">{{ ucwords($page_name) }}</a>
						</li>
					</ul>
				</div>
				<h1 class="br-mainheading">{{ ucwords($page_name) }}</h1>
				<!--<div class="sub-info">
					Ready for any workout, Our women's running gear proves "look good, feel good" is true.
				</div>-->
			</div>
		</div>
	</div>
</section>
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
		    @include('customer.plp_filter')
			<div class="col-9 tab-8">
				<div class="row">
					<div class="col-6 tab-5 mob-12 hidden-mob">
						<div class="all-product--count">
							<p>{{ ucwords($page_name) }} ({{ count($styles)}})</p>
						</div>
					</div>
					<div class="col-2 tab-1 mob-6">
						<div class="input-wrapper sort-by visible-mob" id="mob-filter--popup">
							<label for="">Filter</label>
							<div class="plp-filter-mob" >Filters</div>
				        </div>
					</div>
					<div class="col-4 tab-6 mob-6">
						<div class="input-wrapper sort-by">
							<label for="">SORT BY</label>
							<div class="custom-select">
						        <div class = "select-box">
								    <div class = "label-heading">
								    	<span class="text">-</span> 
								    	<div class="sel-icon">
								    		<span class="icon-down-arrow"></span>
								    	</div>
								    </div>
								    <ul class="select-option--wrapper">
								    	<li class="option-value" value="">-</li>
								    	<li class="option-value" value="">Price (High To Low)</li>
								    	<li class="option-value" value="">Price (Low To High)</li>
								    	<li class="option-value" value="">Product Name (A To Z)</li>
								    </ul>
								</div>
						    </div>
				        </div>
					</div>
				</div>
				<div class="row">
				<style>
						@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
							.owl-carousel .owl-item{
								width: 54px !important;
							}
						}
						@media (min-width: 1025px) and (max-width: 1280px) {
							.owl-carousel .owl-item{
								width: 54px !important;
							}
						}
						@media (min-width: 768px) and (max-width: 1024px) and (orientation: Portrait) {
							.owl-carousel .owl-item{
								width: 86px !important;
							}
						}
						@media (min-width: 1281px) {
							.owl-carousel .owl-item{
								width: 54px !important;
							}
						}
				</style>
					@if(strtolower($prod_type)=='footwear')
						@include('customer.plp_shoe_content')
					@else
						@include('customer.plp_apparel_content')
					@endif
			    </div>
			</div>
			<div class="filter-mob--apply plp-mob-filter__control">
				<a href="#">Apply</a>
			</div>
	    </div>
	</div>
</section>
<script>
// init Isotope
 var min = 0; 
 var max = 2000; 

 // filter functions
var filterFns = {
    filter_by_price: function() {
	    if($("#input-select").val()!=''){
			min = $("#input-select").val();
		}
		if($("#input-number").val()!=''){
			max = $("#input-number").val();
		}
		var number = $(this).find('a .price span').text().replace( '$', '' );
		number = parseInt(number);
		var filter_by_price = number >= min && number <= max;
		return filter_by_price;
   }
};

 var $grid = $('.grid').isotope({
    itemSelector: '.element-item',
    getSortData: {
		price: function(item) {
			// remove possible dollar sign
			var text = $(item).find('a .price span').text().replace( '$', '' );
      
			return parseFloat( text );
        },
		date: function(item){
			var date = $(item).find("a .info").data('date');
			return date;
		}
	}
    
  });

$(window).load(function(){
	$grid.isotope({ sortBy: 'price' , sortAscending: true});
});

$(document).on('click','.reset-filter',function(){
	$(".filter").find(".show-icon").removeClass("selected");
	$(".filter").find("input:checkbox").prop("checked", false);
	reset_filter = '*';
	$grid.isotope({ filter: reset_filter });
	html5Slider.noUiSlider.set([0, 2000.00]);
	$("#input-number").trigger('change');
	filters = [];
});

$(document).ready(function(){
    $(".select-option--wrapper").hide();
	$(".custom-select .label-heading .bottom").show();

    $(".custom-select .label-heading,.custom-select .sel-icon").click(function(event) {
    	$(".custom-select").find(".select-option--wrapper").slideToggle();
    	event.stopPropagation();
	});

    $(".custom-select .option-value").on("click",function() {
	    $(".custom-select .option-value").removeClass("active");
        $(this).closest(".select-box").find(".label-heading").text($(this).text());
	    var type = $(this).attr('data-sorttype');
		var sortValue = $(this).attr('value');
		if(type=='ass'){
			$grid.isotope({ sortBy: sortValue , sortAscending: false});
		}else if(type=='new'){
			$grid.isotope({ sortBy: sortValue , sortAscending: false });
		}else{
			$grid.isotope({ sortBy: sortValue , sortAscending: true});
		}
        $(".custom-select").find(".select-option--wrapper").slideToggle("fast");
		$(this).addClass("active");
        event.stopPropagation();
    });
    $("html").click(function() {
       $(".select-option--wrapper").slideUp("fast"); 
    });
});

var filters = {};

$(document).on("click",".filter-value",function(){
	var filterValue='';
	var this_value= $(this).closest("li").data("filter-value");
	if($(this).closest("li").hasClass("size-filter")){
		$(this).find("input").prop("checked",true);
	}
	var this_closest_group = $(this).closest("ul").data("filter-group");
	if($(this).find(".checked-icons .show-icon").hasClass("selected")){
		//$(this).find(".show-icon").removeClass("selected");
		var selected= false;
	}else{
		$(this).find(".show-icon").addClass("selected");
		var selected= true;
	}
	if(selected){
    	var filterGroup = filters[this_closest_group];
        if (!filterGroup) {
            filterGroup = filters[this_closest_group] = [];
         }
		filters[ this_closest_group ].push(this_value);
		var comboFilter = getComboFilter( filters );
		console.log(comboFilter);
		$grid.isotope({ filter: comboFilter});
		setTimeout(function(){
			if($(".element-item:visible").length == 0){
				var text = "0";
				$(".empty-records").show();
			}else{
				$(".empty-records").hide();
				var visible_product_count = $(".element-item:visible").length;
				var text = "1 - "+visible_product_count+" of "+visible_product_count;
			}
			$(".plp-sortby--container").find("li span").text(text);
		}, 500);
	}
});


function getComboFilter( filters ) {
  var i = 0;
  var comboFilters = [];
  var message = [];

  for ( var prop in filters ) {
    message.push( filters[ prop ].join(' ') );
    var filterGroup = filters[ prop ];
    // skip to next filter group if it doesn't have any values
    if ( !filterGroup.length ) {
      continue;
    }
    if ( i === 0 ) {
      // copy to new array
      comboFilters = filterGroup.slice(0);
    } else {
      var filterSelectors = [];
      // copy to fresh array
      var groupCombo = comboFilters.slice(0); // [ A, B ]
      // merge filter Groups
      for (var k=0, len3 = filterGroup.length; k < len3; k++) {
        for (var j=0, len2 = groupCombo.length; j < len2; j++) {
          filterSelectors.push( groupCombo[j] + filterGroup[k] ); // [ 1, 2 ]
        }

      }
      // apply filter selectors to combo filters for next group
      comboFilters = filterSelectors;
    }
    i++;
  }

  var comboFilter = comboFilters.join(', ');
  return comboFilter;
}
</script>
@endsection
