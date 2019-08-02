// Listing Page JS
$(document).ready(function() {

  $(".size-filter").removeClass("selected");
  $(".filter-list").removeClass("selected");
  $(".fullbox-filter").removeClass("selected");
  $(".filter-value").find("input:checkbox").prop("checked", false).removeAttr ("checked");
      var owl = $(".more-color--container .owl-carousel");
      owl.owlCarousel({
          items : 4,
          itemsDesktop : [1024,3],
          itemsDesktopSmall : [900,2],
          itemsMobile : [667,1],
          itemsCustom : false,
          pagination : false,
          rewindNav : false,
          afterAction: function(elem){
            if ( elem.find(".owl-item").length > this.options.items ) {
              elem.parent().find('.next').show();
              elem.parent().find('.prev').show();
          
              elem.parent().find('.next').removeClass('disabled');
              elem.parent().find('.prev').removeClass('disabled');
              if ( this.currentItem == 0 ) {
                elem.parent().find('.prev').addClass('disabled');
              }
              if ( this.currentItem == this.maximumItem ) {
                elem.parent().find('.next').addClass('disabled');
              }
          
            } else {
              elem.parent().find('.next').addClass('disabled');
              elem.parent().find('.prev').addClass('disabled');
            }
          }
      });
      var owl1 = $(".more-color--container .owl-carousel-clothing");
      owl1.owlCarousel({
          items : 4,
          itemsDesktop : [1024,3],
          itemsDesktopSmall : [900,2],
          itemsMobile : [667,3],
          itemsCustom : false,
          pagination : false,
          rewindNav : false,
          afterAction: function(elem){
            if ( elem.find(".owl-item").length > this.options.items ) {
              elem.parent().find('.next').show();
              elem.parent().find('.prev').show();
          
              elem.parent().find('.next').removeClass('disabled');
              elem.parent().find('.prev').removeClass('disabled');
              if ( this.currentItem == 0 ) {
                elem.parent().find('.prev').addClass('disabled');
              }
              if ( this.currentItem == this.maximumItem ) {
                elem.parent().find('.next').addClass('disabled');
              }
          
            } else {
              elem.parent().find('.next').addClass('disabled');
              elem.parent().find('.prev').addClass('disabled');
            }
          }
      });
      $(".next").click(function(){
        $(this).parent(".more-color--container").find(".owl-carousel").trigger('owl.next');
      })
      $(".prev").click(function(){
        $(this).parent(".more-color--container").find(".owl-carousel").trigger('owl.prev');
      })
      
      // Listing mobile filter popup
      $("#mob-filter--popup").click(function(){
         $(".plp-mob-filter__control").show();
         $(".header-mobile").css("position", "fixed");
      });
      $(".mobile-plp--close .icon-close,.mobile-plp--close").click(function(){
         $(".plp-mob-filter__control").hide();
         $(".header-mobile").css("position", "relative");
      });
      //var text = $(".element-item:visible").length;
	    //$(".all-product--count").find("p span").text(text);
});

if ($(window).width() > 667){
  $(document).on("click",".plp-wrapper__sub .plp-thumb", function(){
        var bigImg = $(this).data("big");
        $('.plp-wrapper-container .plp-thumb').removeClass('active-thumb');
        $(this).addClass('active-thumb');
        $(this).closest('.plp-wrapper__sub').find('#plp-img').attr("src", bigImg);
        var href = $(this).data('url');
        //console.log(href);
        $("[data-main-id="+$(this).data('style')+"]").find(".plp-product .main_link").attr('href',href);
        return false;
  });
}
$(document).on("click",".plp-wrapper__sub .plp-thumb--bg", function(){
      var bigImg = $(this).data("big");
      $('.plp-wrapper-container .plp-thumb--bg').removeClass('active-thumb');
      $(this).addClass('active-thumb');
      $(this).closest('.plp-wrapper__sub').find('.plp-main--img--wrapper').css({backgroundImage: "url("+bigImg+")"});
      var href = $(this).data('url');
      $("[data-main-id="+$(this).data('style')+"]").find(".plp-product .main_link").attr('href',href);
      return false;
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
    var date = $(item).find(".plp-product").data('release-dt');
    return date;
  }
}
  
});

var filters = {};
var loadmore_count = '15'; 

$(document).on("click",".filter-value",function(){

  var value = $(this).text();
  var this_value= $(this).closest("li").data("filter-value");
  $(this).find("input").attr("checked","checked");
	$(this).find("input").prop("checked",true);
  var this_closest_group = $(this).closest("ul").data("filter-group");
	if($(this).closest("li").hasClass("selected")){
		var selected= false;
	}else{
		$(this).closest("li").addClass("selected");
		var selected= true;
  }
  var filter_width_value='';
	if(selected){
      $(".filter-heading a").show();
      var selection_filter_div = '<div class="selection-filter--container"><li class="selection-filter"><a href="#" data-filter-attribute="'+this_closest_group+'" data-filter-value="'+this_value+'"><span class="val">'+value+'</span><span class="close"><i class="icon-close"></i></span></a></li></div>';
      $(".filter-selection-wrapper ul").append(selection_filter_div);
      $(".filter-selection-wrapper").show();
      var filterGroup = filters[this_closest_group];
        if (!filterGroup) {
            filterGroup = filters[this_closest_group] = [];
         }
    filters[ this_closest_group ].push(this_value);
		var comboFilter = getComboFilter( filters );
	
    $grid.isotope({ filter: comboFilter ,layoutMode: 'fitRows'});
    var status = 'ON';
    if(this_closest_group=='Width') filter_width_value=this_value;
  
  }else{
      filters[this_closest_group] = jQuery.grep(filters[this_closest_group], function(value) {
        return value != this_value;
      });
      $("[data-filter-value='" + this_value + "']").find("input").prop("checked",false).removeAttr ("checked");
      $("[data-filter-value='" + this_value + "']").removeClass("selected");
      $(".selection-filter--container").find("[data-filter-value='" + this_value + "']").closest(".selection-filter--container").remove();
      if($(".filter-selection-wrapper li").length==0){
          $(".filter-selection-wrapper").hide();
          $(".filter-heading a").hide();
      }else{
          $(".filter-selection-wrapper").show();
      }
     
      var comboFilter = getComboFilter( filters );
      $grid.isotope({ filter: comboFilter ,layoutMode: 'fitRows'});
      
       var status = 'OFF';
  }
 
 
  setTimeout(function(){
    localStorage.setItem("filters", JSON.stringify(filters));
    localStorage.setItem("comboFilter", comboFilter);
    localStorage.setItem("plpfilter", $(".plp-filter").html());
    localStorage.setItem("listingurl",window.location.pathname);
    localStorage.setItem("filterwidth",filter_width_value);
    check_swatches(this_value,'',comboFilter);
    counter = 15;
   loadMore(counter);
  }, 500);
  
  return false;
});

$(document).on('click','.selection-filter',function(){
  //console.log("clicked");
    var removeItem = $(this).find("a").data("filter-value");
    var removeAttribute = $(this).find("a").data("filter-attribute");
    //console.log("before remove"+removeAttribute);
    filters[removeAttribute] = jQuery.grep(filters[removeAttribute], function(value) {
      return value != removeItem;
    });
    //console.log("before remove"+filters);
    $("[data-filter-value='" + removeItem + "']").find("input").prop("checked",false).removeAttr ("checked");
    $("[data-filter-value='" + removeItem + "']").removeClass("selected");
    $(this).closest(".selection-filter--container").remove();
    if($(".filter-selection-wrapper li").length==0){
        $(".filter-selection-wrapper").hide();
        $(".filter-heading a").hide();
    }else{
        $(".filter-selection-wrapper").show();
    }
    //console.log("filters remove"+filters[removeAttribute]);
    var comboFilter = getComboFilter( filters );
		//console.log(comboFilter);
    $grid.isotope({ filter: comboFilter ,layoutMode: 'fitRows'});
    
    setTimeout(function(){
      localStorage.setItem("filters", JSON.stringify(filters));
      localStorage.setItem("comboFilter", comboFilter);
      localStorage.setItem("plpfilter", $(".plp-filter").html());
      localStorage.setItem("listingurl",window.location.pathname);
      if(removeAttribute=='Width') localStorage.setItem("filterwidth","");
      check_swatches(removeItem,'',comboFilter);
      counter = 15;
      loadMore(counter);
    }, 500);
   
  return false;
});

$(document).on('click','.reset-filter',function(){
  $(".size-filter").removeClass("selected");
  $(".filter-list").removeClass("selected");
  $(".fullbox-filter").removeClass("selected");
  $(".filter-value").find("input:checkbox").prop("checked", false).removeAttr ("checked");
  $(".selection-filter--container").remove();
  $(".filter-selection-wrapper").hide();
  $(".filter-heading a").hide();
	reset_filter = '*';
  $grid.isotope({ filter: reset_filter });
  
  setTimeout(function(){
    localStorage.setItem("comboFilter","");
    localStorage.setItem("listingurl",window.location.pathname);
    localStorage.setItem("filterwidth","");
    check_swatches('','',reset_filter);
    counter = 15;
    loadMore(counter);
  }, 500);
  
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
  var initShow = 15; //number of images loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = $grid.data('isotope'); // get Isotope instance

  $(window).load(function(){
    var select_type =  $(".select-option--wrapper .selected").attr('data-sorttype');
    var select_value =  $(".select-option--wrapper .selected").attr('value');
    if(select_type=='ass' || select_type=='new'){
        var sortAscending =  false ;
    }else{
      var sortAscending =  true ;
    }
    var selected_text = $(".select-option--wrapper .selected").text();
    if(selected_text!=''){
        $(".custom-select .select-box").find(".label-heading .text").html(selected_text);
    }

    var comboFilter = localStorage.getItem("comboFilter");
    var currentURL = window.location.pathname;
    //console.log(currentURL);
    var listingurl = localStorage.getItem("listingurl");
    if(currentURL==listingurl && comboFilter!=null && comboFilter!=''){
      //console.log("storage");
       var filter_value = comboFilter;
      $(".plp-filter").html(localStorage.getItem("plpfilter"));
      filters = JSON.parse(localStorage.getItem("filters"));
      var status ='ON';
    }else{
      //console.log("not storage");
       var filter_value = '*';
       var status ='';
    }
    //console.log("filter_value"+filter_value);
    $grid.isotope({ filter: filter_value , sortBy: select_value , sortAscending: sortAscending  ,layoutMode: 'fitRows'});
    check_swatches('',status,filter_value);
    loadMore(initShow); 
    if(!localStorage.getItem("plpfilter")){
      localStorage.removeItem("filterwidth");
    }
    localStorage.removeItem("comboFilter");
    localStorage.removeItem("plpfilter")
    localStorage.removeItem("filters")
    
  });
   //execute function onload

  function loadMore(toShow) { 
    //console.log("toShow"+toShow);
    $grid.find(".hidden").removeClass("hidden");
    var select_type =  $(".select-option--wrapper .selected").attr('data-sorttype');
    var select_value =  $(".select-option--wrapper .selected").attr('value');
    if(select_type=='ass' || select_type=='new'){
        var sortAscending =  false ;
    }else{
      var sortAscending =  true ;
    }
    var count_element = iso.filteredItems.map(function(item2) {
      return item2.element;
    });
    var filteredItems_length = $(count_element).filter(".element-item:not(.swatches-hidden)").length;
    $grid.isotope({ sortBy: select_value , sortAscending: sortAscending ,layoutMode: 'fitRows'});
    var hiddenElems = iso.filteredItems.slice(toShow, filteredItems_length).map(function(item) {
      return item.element;
    });
    $(hiddenElems).filter(".element-item:not(.swatches-hidden)").addClass('hidden');

    $grid.isotope({ sortBy: select_value , sortAscending: sortAscending ,layoutMode: 'fitRows'});
    $(".plp-load-more").remove();
    var hidden_count = $(".element-item:hidden:not(.swatches-hidden)").length;
   
    if(filteredItems_length > toShow){
      $grid.after('<div class="plp-load-more"><a href="javascript:void(0)" class="load-more">Load More ('+hidden_count+' Remaining)</a></div>');
      //when no more to load, hide show more button
      if (hidden_count == 0) {
          $(".plp-load-more").hide();
      } else {
        $(".plp-load-more").show();
      }
    }
   
    //console.log($(count_element));
    var text =$(count_element).filter(".element-item:not(.swatches-hidden)").length;
    $(".all-product--count").find("p span").text(text);
    return false;
  }
  
  //when load more button clicked
  $(document).on("click",".load-more",function() {
      $(".plp-load-more").remove();
      //var counter = $(".element-item:not('.hidden')").length;
      //console.log(counter);
      //console.log($(".element-item:visible").length);
      counter = counter + initShow;
      console.log(counter);
      loadMore(counter);
      return false;
  });

  $(document).on('click','.color-wrapper--more--add',function(){
     $(this).closest(".color-wrapper--more--container").find(".color-wrapper--more .remaining").toggle();
     return false;
  });

  function check_swatches(value,status,comboFilter){
    //if(status!='OFF'){
     $(".owl-item .item").css("display","block");
    
      value = value.replace(".", "").trim();
      //console.log(value + status);
      var yourArray = [];
      $(".selection-filter--container").each(function(){
          var selection_value = $(this).find('a').data("filter-value");
          selection_value = selection_value.replace(".", "").trim();
          yourArray.push(selection_value);
      });
      //console.log(yourArray.length);
      if(yourArray.length == 0){
         $(".element-item").removeClass("swatches-hidden");
      }else{
        $(".element-item").addClass("swatches-hidden");
      }
      //console.log(yourArray);
      var data1 = '';
      var current_style = '';
      var swatch_class ='';
      var count = 0;
      //console.log($(".more-color--container").is(":visible"));
      //if($(".more-color--container").is(":visible")){
        //console.log($(".more-color--container").is(":visible"));
        //console.log("inside more color");
        $(".owl-item").each(function(){
            var style = $(this).find(".item").data('style');
            let if_condition = "";
            let if_condition_test = "";
            //console.log(yourArray.length+ "inarray");
            if(comboFilter!='' && comboFilter!='*'){
              //console.log("inarray");
              console.log(comboFilter+"sadsadsdsd");
              var new_comboFilter= comboFilter.trim().split(',');
             
              for ( var i = 0; i < new_comboFilter.length; i++ ){
                var split_combofilter =  new_comboFilter[i];
                split_combofilter = split_combofilter.split('.');
                if_condition_test += "(";
                for ( var j = 0; j < split_combofilter.length; j++ ){
                  if(split_combofilter[j]!='' && split_combofilter[j]!=' '){
                      if_condition_test += " $(this).find('.item').hasClass('"+split_combofilter[j]+"')  && ";
                    }
                  }
                if_condition_test =if_condition_test.substring(0, if_condition_test.length - 3);
                if_condition_test += ") || ";
                //if_condition += " $(this).find('.item').hasClass('"+yourArray[i]+"')  || ";
              }
              if_condition_test =if_condition_test.substring(0, if_condition_test.length - 3);
              console.log(if_condition_test);
              /*for ( var i = 0; i < yourArray.length; i++ ){
                if_condition += " $(this).find('.item').hasClass('"+yourArray[i]+"')  && ";
              }
              if_condition =if_condition.substring(0, if_condition.length - 3);
              console.log(if_condition);*/
                if(eval(if_condition_test)){
                  //$(this).show();
                  $(this).css("display","block");
                  current_style = style;
                  swatch_class = 'visible';
                }else{
                  //$(this).hide();
                  $(this).css("display","none");
                  current_style ='';
                  swatch_class ='';
                  count = 0;
                }
                if(style==current_style && swatch_class=='visible'){
                    $(this).closest(".element-item").removeClass("swatches-hidden");
                    if(count==0){
                      var big_img =  $(this).find(".item img").data("big");
                      var href = $(this).find(".item img").data("url");
                      console.log(big_img);
                      $(this).closest(".element-item").find(".img img").attr('src',big_img);
                      $(this).closest(".element-item").find('.plp-main--img--wrapper').css({backgroundImage: "url("+big_img+")"});
                      $(this).closest(".element-item").find(".main_link").attr('href',href);
                    }
                    count++;
                }
            }else{
              //$(this).show();
              $(this).css("display","block");
              current_style = style;
              swatch_class = 'visible';
              var big_img =  $(this).closest(".element-item").find(".owl-item:visible:eq(0) .item img").data("big");
              var href = $(this).closest(".element-item").find(".owl-item:visible:eq(0) .item img").data("url");
              console.log(big_img);
              $(this).closest(".element-item").find(".img img").attr('src',big_img);
              $(this).closest(".element-item").find('.plp-main--img--wrapper').css({backgroundImage: "url("+big_img+")"});
              $(this).closest(".element-item").find(".main_link").attr('href',href);
          }

          

            //var style = $(this).find(".item").data('style');
            /*if(style!=data1){
              if($(this).is(':visible')){
                var big_img = $(this).find(".item img").data("big");
                var href = $(this).find(".item img").data("url");
                $(this).closest(".element-item").find(".img img").attr('src',big_img);
                $(this).closest(".element-item").find('.plp-main--img--wrapper').css({backgroundImage: "url("+big_img+")"});
                $(this).closest(".element-item").find(".main_link").attr('href',href);
                
                 //console.log(style+"not mached");
                 data1 = style
              }
               
            }else{
              //console.log(style+"mached");
            }*/
        });
        
     //}

      if($(".color-wrapper--more--container").is(":visible")){
        $(".swatches-icon").each(function(){
            //console.log(jQuery.inArray(value, yourArray) !== -1);
            //if(!($(this).find(".item").hasClass(value)) && status=='ON'){
            if(yourArray.length > 0 ){
              for ( var i = 0; i < yourArray.length; i++ ){
                //console.log(yourArray[i] +"yourarrsy");
                if ($(this).hasClass(yourArray[i])){
                    $(this).show();
                    break;  
                  }else{
                    $(this).hide();
                }
              }
               
            }else{
                $(this).show();
            }
            var style = $(this).data('style');
            if(style!=data1){
              if($(this).is(':visible')){
                var big_img = $(this).find("img").data("big");
                var href = $(this).find("img").data("url");
                $(this).closest(".element-item").find(".img img").attr('src',big_img);
                $(this).closest(".element-item").find('.plp-main--img--wrapper').css({backgroundImage: "url("+big_img+")"});
                $(this).closest(".element-item").find(".main_link").attr('href',href);
                
                 //console.log(style+"not mached");
                 data1 = style
              }
               
            }else{
              //console.log(style+"mached");
            }
        });
      }

    //}

  }
