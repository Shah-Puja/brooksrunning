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

$(window).load(function(){
	$grid.isotope({ sortBy: 'price' , sortAscending: true ,layoutMode: 'fitRows'});
});


var filters = {};

$(document).on("click",".filter-value",function(){
	var filterValue='';
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
    	var filterGroup = filters[this_closest_group];
        if (!filterGroup) {
            filterGroup = filters[this_closest_group] = [];
         }
		filters[ this_closest_group ].push(this_value);
		var comboFilter = getComboFilter( filters );
		//console.log(comboFilter);
		$grid.isotope({ filter: comboFilter ,layoutMode: 'fitRows'});
		setTimeout(function(){
			if($(".element-item:visible").length == 0){
				var text = "0";
				$(".empty-records").show();
			}else{
				$(".empty-records").hide();
				var text = $(".element-item:visible").length;
			}
			$(".all-product--count").find("p span").text(text);
		}, 500);
  }
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