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