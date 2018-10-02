// Header JS
    $(document).ready(function(){
            if ($(window).width() < 1025) {
                 $("#desktop-navigation .main-nav").click(function(){
                    $("#desktop-navigation .main-nav").next().removeClass("active");
                    $(this).next().toggleClass("active");
                });
            }
            else{
                $("#desktop-navigation .main").on("mouseenter", function(){
                    $("#desktop-navigation .main .main-nav").next().removeClass("active");
                    $(this).find(".main-nav").next().addClass("active");
                });
                $("#desktop-navigation .main").on("mouseleave", function(){
                    $("#desktop-navigation .main .main-nav").next().removeClass("active");
                });
            }
    		// header submenu top height fixed
    		var headHeight = $(".header-desktop").height() -5;
    		$(".desktop-navigation--sub").css("top", headHeight);
    		$(window).on("scroll", function() {
    			 $("#desktop-navigation .main .main-nav").next().removeClass("active");
    	    });

            // Search Box show for desktop
            $(".header-desktop .search-header--popup").click(function(){
                $("#header-search--popup").show();
            });

            $("#header-search--popup .close").click(function(){
                $("#header-search--popup").hide();
            });
    });
    $(document).ready(function () {
        $("#mob-nav--control").click(function(){
            $(this).find(".close").toggleClass("icon-close");
            $(".header-mobile").toggleClass("fixed");
            $("#mobile-navbar--container").toggleClass("active");
            $("#mobile-navbar--container").find("li").removeClass("menu-active");
            $("#mobile-navbar--container").find("li ul").removeClass("slide");
            $("#mobile-navbar--container").find("li ul").css("display","none");
        });
         $("#mobile-navbar").aceResponsiveMenu({});
    });
    (function ($) {
        $.fn.aceResponsiveMenu = function (options) {

            //plugin's default options
            var defaults = {
                resizeWidth: '768',
                animationSpeed: 'fast',
                accoridonExpAll: false
            };

            //Variables
            var options = $.extend(defaults, options),
                opt = options,
                $resizeWidth = opt.resizeWidth,
                $animationSpeed = opt.animationSpeed,
                $expandAll = opt.accoridonExpAll,
                $aceMenu = $(this),
                $menuStyle = $(this).attr('data-menu-style');

            // Initilizing        
            $aceMenu.find('ul').addClass("sub-menu");
            $aceMenu.find('ul').siblings('a').append('<span class="icon-down-arrow"></span>');
            if ($menuStyle == 'accordion') { $(this).addClass('collapse'); }

            // Window resize on menu breakpoint 
            if ($(window).innerWidth() <= $resizeWidth) {
                menuCollapse();
            }
            $(window).resize(function () {
                menuCollapse();
            });

            // Menu Toggle
            function menuCollapse() {
                var w = $(window).innerWidth();
                if (w <= $resizeWidth) {
                    $aceMenu.find('li.menu-active').removeClass('menu-active');
                    $aceMenu.find('ul.slide').removeClass('slide').removeAttr('style');
                    $aceMenu.addClass('collapse hide-menu');
                    $aceMenu.attr('data-menu-style', '');
                    $('.menu-toggle').show();
                } else {
                    $aceMenu.attr('data-menu-style', $menuStyle);
                    $aceMenu.removeClass('collapse hide-menu').removeAttr('style');
                    $('.menu-toggle').hide();
                    if ($aceMenu.attr('data-menu-style') == 'accordion') {
                        $aceMenu.addClass('collapse');
                        return;
                    }
                    $aceMenu.find('li.menu-active').removeClass('menu-active');
                    $aceMenu.find('ul.slide').removeClass('slide').removeAttr('style');
                }
            }

            //ToggleBtn Click
            $('#menu-btn').click(function () {
                $aceMenu.slideToggle().toggleClass('hide-menu');
            });


            // Main function 
            return this.each(function () {

                // Function for Vertical/Responsive Menu on mouse click
                $aceMenu.on('click', '> li a', function () {
                    if ($aceMenu.hasClass('collapse') === false) {
                        //return false;
                    }
                    $(this).off('mouseover', '> li a');
                    if ($(this).parent().hasClass('menu-active')) {
                        $(this).parent().children('.sub-menu').slideUp().removeClass('slide');
                        $(this).parent().removeClass('menu-active');
                    } else {
                        if ($expandAll == true) {
                            $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                            return;
                        }
                        $(this).parent().siblings().removeClass('menu-active');
                        $(this).parent('li').siblings().children('.sub-menu').slideUp().removeClass('slide');
                        $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                    }
                });
                //End of responsive menu function

            });
            //End of Main function
        }
    })(jQuery);

    $(document).ready(function() {
        $("#afterpay-popup--control").click(function(){
            $("#afterpay-popup--wrapper").addClass("show");
        });
        $("#afterpay-popup--close").click(function(){
            $("#afterpay-popup--wrapper").removeClass("show");
        });
        $("#sizechart-popup--control").click(function(){
            $("#sizechart-popup--wrapper").addClass("show");
        });
        $("#sizechart-popup--close").click(function(){
            $("#sizechart-popup--wrapper").removeClass("show");
        });
    });


// carousel for landing page
$(document).ready(function() {
      var owl = $(".new-arrival--container .owl-carousel");
      owl.owlCarousel({
          items : 4,
          itemsDesktop : [1000,4],
          itemsDesktopSmall : [900,4],
           dots: true
      });
      $(".next").click(function(){
        console.log("next");
        $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.next');
      })
      $(".prev").click(function(){
        $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.prev');
      })
      });