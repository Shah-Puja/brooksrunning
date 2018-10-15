// Listing Page JS
$(document).ready(function() {
      var owl = $(".more-color--container .owl-carousel");
      owl.owlCarousel({
          items : 4,
          itemsDesktop : [1024,3],
          itemsDesktopSmall : [900,2],
          itemsMobile : [667,1],
          itemsCustom : false,
          pagination : false,
          rewindNav : false
      });
      var owl1 = $(".more-color--container .owl-carousel-clothing");
      owl1.owlCarousel({
          items : 4,
          itemsDesktop : [1024,3],
          itemsDesktopSmall : [900,2],
          itemsMobile : [667,3],
          itemsCustom : false,
          pagination : false,
          rewindNav : false
      });
      $(".next").click(function(){
        console.log("next");
        $(this).parent(".more-color--container").find(".owl-carousel").trigger('owl.next');
      })
      $(".prev").click(function(){
        $(this).parent(".more-color--container").find(".owl-carousel").trigger('owl.prev');
      })
      if ($(window).width() > 667){
        $(".plp-wrapper__sub .plp-thumb").on("click", function(){
              var bigImg = $(this).data("big");
              $('.plp-wrapper-container .plp-thumb').removeClass('active-thumb');
              $(this).addClass('active-thumb');
              $(this).closest('.plp-wrapper__sub').find('#plp-img').attr("src", bigImg);
              return false;
        });
      }
      $(".plp-wrapper__sub .plp-thumb--bg").on("click", function(){
            var bigImg = $(this).data("big");
            $('.plp-wrapper-container .plp-thumb--bg').removeClass('active-thumb');
            $(this).addClass('active-thumb');
            $(this).closest('.plp-wrapper__sub').find('.plp-main--img--wrapper').css({backgroundImage: "url("+bigImg+")"});
            return false;
      });
      // Listing mobile filter popup
      $("#mob-filter--popup").click(function(){
         $(".plp-mob-filter__control").show();
         $(".header-mobile").css("position", "fixed");
      });
      $(".mobile-plp--close .icon-close").click(function(){
         $(".plp-mob-filter__control").hide();
         $(".header-mobile").css("position", "relative");
      });
      //var text = $(".element-item:visible").length;
	    //$(".all-product--count").find("p span").text(text);
});

var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  getSortData: {
  price: function(item) {
    // remove possible dollar sign
    var text = $(item).find('a .price .price_text').text().replace( '$', '' );
    
    return parseFloat( text );
      },
  name: function(item){
        var name = $(item).find("a .info h3").text();
        return name;
      },
  date: function(item){
    var date = $(item).find("a .info").data('date');
    return date;
  }
}
  
});

var filters = {};
var loadmore_count = '12'; 

$(document).on("click",".filter-value",function(){
  console.log(filters);
  var filterValue='';
  var value = $(this).text();
	var this_value= $(this).closest("li").data("filter-value");
	$(this).find("input").prop("checked",true);
  var this_closest_group = $(this).closest("ul").data("filter-group");
	if($(this).closest("li").hasClass("selected")){
		//$(this).find(".show-icon").removeClass("selected");
		var selected= false;
	}else{
		$(this).closest("li").addClass("selected");
		var selected= true;
  }
	if(selected){
      $(".filter-heading a").show();
      var selection_filter_div = '<div class="selection-filter--container selection-Lfilter--container"><li class="selection-filter"><a href="#" data-filter-attribute="'+this_closest_group+'" data-filter-value="'+this_value+'"><span class="val">'+value+'</span><span class="close"><i class="icon-close"></i></span></a></li></div>';
      $(".filter-selection-wrapper ul").append(selection_filter_div);
      $(".filter-selection-wrapper").show();
      var filterGroup = filters[this_closest_group];
        if (!filterGroup) {
            filterGroup = filters[this_closest_group] = [];
         }
    filters[ this_closest_group ].push(this_value);
		var comboFilter = getComboFilter( filters );
		console.log(comboFilter);
		$grid.isotope({ filter: comboFilter ,layoutMode: 'fitRows'});
  }

  loadMore(12);
  return false;
});

$(document).on('click','.selection-filter--container li',function(){
    var removeItem = $(this).find("a").data("filter-value");
    var removeAttribute = $(this).find("a").data("filter-attribute");
    //console.log(filters);
    filters[removeAttribute] = jQuery.grep(filters[removeAttribute], function(value) {
      return value != removeItem;
    });
    $("[data-filter-value='" + removeItem + "']").find("input").prop("checked",false);
    $("[data-filter-value='" + removeItem + "']").removeClass("selected");
    $(this).closest(".selection-filter--container").remove();
    if($(".filter-selection-wrapper li").length==0){
        $(".filter-selection-wrapper").hide();
        $(".filter-heading a").hide();
    }else{
        $(".filter-selection-wrapper").show();
    }
    var comboFilter = getComboFilter( filters );
		console.log(comboFilter);
    $grid.isotope({ filter: comboFilter ,layoutMode: 'fitRows'});
    loadMore(12);
  return false;
});

$(document).on('click','.reset-filter',function(){
  $(".size-filter").removeClass("selected");
  $(".filter-list").removeClass("selected");
  $(".filter-value").find("input:checkbox").prop("checked", false);
  $(".selection-filter--container").remove();
  $(".filter-selection-wrapper").hide();
  $(".filter-heading a").hide();
	reset_filter = '*';
  $grid.isotope({ filter: reset_filter });
  loadMore(12);
  filters = [];
  return false;
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

    //****************************
  // Isotope Load more button
  //****************************
  var initShow = 12; //number of images loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = $grid.data('isotope'); // get Isotope instance

  $(window).load(function(){
    $grid.isotope({ sortBy: 'price' , sortAscending: true ,layoutMode: 'fitRows'});
    loadMore(initShow);
  });
   //execute function onload

  function loadMore(toShow) {
    //console.log("toShow"+toShow);
    $grid.find(".hidden").removeClass("hidden");
    var select_type =  $(".select-option--wrapper .selected").attr('data-sorttype');
    var select_value =  $(".select-option--wrapper .selected").attr('value');
    if(select_type=='ass'){
        var sortAscending =  false ;
    }else{
      var sortAscending =  true ;
    }
    //console.log('select_type'+select_type);
    //console.log('select_value'+select_value);
    $grid.isotope({ sortBy: select_value , sortAscending: sortAscending ,layoutMode: 'fitRows' });
    //console.log("iso.filteredItems.length" + iso.filteredItems.length);
    var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
      return item.element;
    });
    $(hiddenElems).addClass('hidden');
    $grid.isotope({ sortBy: select_value , sortAscending: sortAscending ,layoutMode: 'fitRows'});
    $(".plp-load-more").remove();
    var hidden_count = $(".element-item:hidden").length;
    if(iso.filteredItems.length > toShow){
      $grid.after('<div class="plp-load-more"><a href="javascript:void(0)" class="load-more">Load More ('+hidden_count+' Remaining)</a></div>');
      //when no more to load, hide show more button
      if (hidden_count == 0) {
          $(".plp-load-more").hide();
      } else {
        $(".plp-load-more").show();
      }
    }
    var text =iso.filteredItems.length;
    $(".all-product--count").find("p span").text(text);

  }
  
  //append load more button
  //$grid.after('<div class="plp-load-more"><a href="javascript:void(0)" id="load-more">Load More (15 Remaining)</a></div>');

  //when load more button clicked
  $(document).on("click",".load-more",function() {
    $(".plp-load-more").remove();
    counter = counter + initShow;
    loadMore(counter);
  });
