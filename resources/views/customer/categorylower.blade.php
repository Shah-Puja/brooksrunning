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
							<a href="#">Womens</a>
						</li>
						<li>
							<a href="JavaScript:Void(0);" class="active">Womens Running Shoes</a>
						</li>
					</ul>
				</div>
				<h1 class="br-mainheading">Womens Running Shoes</h1>
				<div class="sub-info">
					Ready for any workout, Our women's running gear proves "look good, feel good" is true.
				</div>
			</div>
		</div>
	</div>
</section>
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
			<div class="col-3 tab-4 mobile-plp--filter plp-mob-filter__control">
				<div class="mobile-plp--main">
					<div class="mobile-plp--close">
						<span class="icon-close"></span>
					</div>
					<div class="plp-filter">
						<ul class="plp-filter--wrapper">
							<li class="filter-menu">
								<label class="label br-mainheading category-heading">Categories</label>
								<ul class="filter-list filter-list--category clearfix">
									<li class="fullbox-filter category">
										Road Running Shoes
									</li>
									<li class="fullbox-filter category">
										Trail Running Shoes
									</li>
									<li class="fullbox-filter category selected">
										Walking Shoes
									</li>
									<li class="fullbox-filter category">
										Competition Shoes
									</li>
									<li class="fullbox-filter category">
										Neutral
									</li>
								</ul>
							</li>
							<li class="filter-heading">
								<h3>Filter</h3>
							</li>
							<li class="filter-menu">
								<label class="label">Size</label>
								<ul class="filter-list clearfix">
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">7.0</a>
									</li>
									<li class="size-filter selected">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">7.5</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">8.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">8.5</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">9.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">9.5</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">10.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">10.5</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">11.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">11.5</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">12.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">12.5</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">13.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">14.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">15.0</a>
									</li>
									<li class="size-filter">
										<a href="#" data-filter-attribute="size" data-filter-value=" ">16.0</a>
									</li>
								</ul>
							</li>
							<li class="filter-menu">
								<label class="label">Width</label>
								<ul class="filter-list clearfix">
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="2A-Narrow 2">
											      <label for="2A-Narrow 2">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">2A-Narrow 2</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="2E Extra Wide 4" checked="checked">
											      <label for="2E Extra Wide 4">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">2E Extra Wide 4</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="B-Normal 1">
											      <label for="B-Normal 1">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">B-Normal 1</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="d-wide 3" checked="checked">
											      <label for="d-wide 3">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">d-wide 3</div>
											       </label>
											  </div>
										</div>	
									</li>
								</ul>
							</li>
							<li class="filter-menu">
								<label class="label">SUPPORT LEVEL</label>
								<ul class="filter-list clearfix">
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Neutral">
											      <label for="Neutral">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">Neutral</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Support" checked="checked">
											      <label for="Support">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">Support</div>
											       </label>
											  </div>
										</div>	
									</li>
								</ul>
							</li>
							<li class="filter-menu">
								<label class="label">EXPERIENCE TYPE</label>
								<ul class="filter-list clearfix">
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Connect">
											      <label for="Connect">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">Connect</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Cushion">
											      <label for="Cushion">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">Cushion</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Energize">
											      <label for="Energize">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">Energize</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Speed">
											      <label for="Speed">
											      	    <div class="mark"><span></span></div>
											      	    <div class="text">Speed</div>
											       </label>
											  </div>
										</div>									
									</li>
								</ul>
							</li>
							<li class="filter-menu">
								<label class="label">COLOR</label>
								<ul class="filter-list clearfix">
									<li class="fullbox-filter color-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Black">
											      <label for="Black">
											      	    <div class="mark" style="background-color: black"><span></span></div>
											      	    <div class="text">Black</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter color-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Blue">
											      <label for="Blue">
											      	    <div class="mark" style="background-color: blue"><span></span></div>
											      	    <div class="text">Blue</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter color-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Green">
											      <label for="Green">
											      	    <div class="mark" style="background-color: green"><span></span></div>
											      	    <div class="text">Green</div>
											       </label>
											  </div>
										</div>	
									</li>
									<li class="fullbox-filter color-filter">
										<div class="input-wrapper">
											  <div class="checklist-inline">
											  	  <input type="checkbox" id="Red">
											      <label for="Red">
											      	    <div class="mark" style="background-color: red"><span></span></div>
											      	    <div class="text">Red</div>
											       </label>
											  </div>
										</div>	
									</li>
								</ul>
							</li>
						</ul>
					</div>
			    </div>
				<div class="plp-store-finder">
					<h3 class="br-heading">Need help<br/>choosing a shoe?</h3>
					<p class="br-info">Try the shoe finder</p>
					<a class="primary-button" href="#">Shoe Finder</a>
					<img src="images/brooks-shoes--logo.png" alt="">
				</div>
			</div>
			<div class="col-9 tab-8">
				<div class="row">
					<div class="col-6 tab-5 mob-12 hidden-mob">
						<div class="all-product--count">
							<p>Women's Running Shoes (34)</p>
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
					<div class="plp-wrapper-container">
					@if($styles!='' && count($styles) >0 )
						@foreach($styles as $style)
							@php 
								$price_sale = $style->variants->max('price_sale');
								$price = $style->variants->max('price');
							@endphp
							<div class="mob-6 col-4 plp-wrapper__sub">
								<div class="plp-product">
									<div class="offer-info">
										<span>NEW</span>
										@if($price_sale < $price)
											<span class="sale">SALE</span>
										@endif
									</div>
									<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html" class="hidden-mob">
										<div class="img img-shoes">
											<img id="plp-img" src="{{ $style->image->image1Original() }}" alt="">
										</div>
									</a>
									<div class="more-color--container">
										<span class="icon-style icon-back-arrow prev"></span>
										<div class="owl-carousel owl-theme">
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
												<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Widths Available</li>
													</ul>
												</a>
											</div>
										</div>
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
												<img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Width available</li>
													</ul>
												</a>
											</div>
										</div>
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
												<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Width available</li>
													</ul>
												</a>
											</div>
										</div>
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
												<img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Width available</li>
													</ul>
												</a>
											</div>
										</div>
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
												<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Width available</li>
													</ul>
												</a>
											</div>
										</div>
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
												<img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Width available</li>
													</ul>
												</a>
											</div>
										</div>
										<div class="item">
											<picture>
												<source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
												<img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
											</picture>
											<div class="plp-mob--info visible-mob">
												<a href="detail-apparel.php">
													<ul>
														<li>3 Colours</li>
														<li class="no-pad">Width available</li>
													</ul>
												</a>
											</div>
										</div>
										</div>
										<span class="icon-style icon-next-arrow next"></span>
									</div>
									<a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
										<div class="info">
											<h3>{{ $style->stylename }}</h3>
											<div class="price">
												@if($price_sale < $price)
													<del><span>&dollar;{{ $price }}</span></del>
													<span>&dollar;{{ $price_sale }}</span>
												@else
													<span>&dollar;{{ $price }}</span>
												@endif
											</div>
											
											<div class="shoes-type">{{ $style->h2 }}</div>
										</div>
										<div class="info-sub">
											<div class="row">
												<div class="mob-6">
													<p>Neutral Speed</p>
												</div>
												<div class="mob-6">
													<p class="right">Width Available</p>
												</div>
											</div>
										</div>
									</a>
								</div>
							</div>
						@endforeach
						<div class="plp-load-more" style="display:none">
							<a href="#">Load More (15 Remaining)</a>
						</div>
					@endif
					</div>
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
