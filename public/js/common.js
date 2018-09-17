// Header JS
$(document).ready(function () {
    if ($(window).width() < 1025) {
        $("#desktop-navigation .main-nav").click(function () {
            $("#desktop-navigation .main-nav").next().removeClass("active");
            $(this).next().toggleClass("active");
        });
    } else {
        $("#desktop-navigation .main").on("mouseenter", function () {
            $("#desktop-navigation .main .main-nav").next().removeClass("active");
            $(this).find(".main-nav").next().addClass("active");
        });
        $("#desktop-navigation .main").on("mouseleave", function () {
            $("#desktop-navigation .main .main-nav").next().removeClass("active");
        });
    }
    // header submenu top height fixed
    var headHeight = $(".header-desktop").height() - 5;
    $(".desktop-navigation--sub").css("top", headHeight);
    $(window).on("scroll", function () {
        $("#desktop-navigation .main .main-nav").next().removeClass("active");
    });

    // Search Box show for desktop
    $(".header-desktop .search-header--popup").click(function () {
        $("#header-search--popup").show();
    });

    $("#header-search--popup .close").click(function () {
        $("#header-search--popup").hide();
    });
});
$(document).ready(function () {
    $("#mob-nav--control").click(function () {
        $(this).find(".close").toggleClass("icon-close");
        $(".header-mobile").toggleClass("fixed");
        $("#mobile-navbar--container").toggleClass("active");
        $("#mobile-navbar--container").find("li").removeClass("menu-active");
        $("#mobile-navbar--container").find("li ul").removeClass("slide");
        $("#mobile-navbar--container").find("li ul").css("display", "none");
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
        if ($menuStyle == 'accordion') {
            $(this).addClass('collapse');
        }

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

// Listing Page JS
$(document).ready(function () {
    var owl = $(".more-color--container .owl-carousel");
    owl.owlCarousel({
        items: 3,
        itemsDesktop: [1000, 3],
        itemsDesktopSmall: [900, 3],
        itemsTablet: false,
        itemsTabletSmall: false,
        itemsMobile: false,
        itemsCustom: false,
        pagination: false,
        rewindNav: false
    });
    $(".next").click(function () {
        console.log("next");
        $(this).parent(".more-color--container").find(".owl-carousel").trigger('owl.next');
    })
    $(".prev").click(function () {
        $(this).parent(".more-color--container").find(".owl-carousel").trigger('owl.prev');
    })
    $(".plp-wrapper__sub .plp-thumb").on("click", function () {
        var bigImg = $(this).data("big");
        $('.plp-wrapper-container .plp-thumb').removeClass('active-thumb');
        $(this).addClass('active-thumb');
        $(this).closest('.plp-wrapper__sub').find('#plp-img').hide();
        $(this).closest('.plp-wrapper__sub').find('#plp-img').fadeIn('fast');
        $(this).closest('.plp-wrapper__sub').find('#plp-img').attr("src", bigImg);
        return false;
    });
    // Listing mobile filter popup
    $("#mob-filter--popup").click(function () {
        $(".plp-mob-filter__control").show();
        $(".header-mobile").css("position", "fixed");
    });
    $(".mobile-plp--close .icon-close").click(function () {
        $(".plp-mob-filter__control").hide();
        $(".header-mobile").css("position", "relative");
    });
});

$(document).ready(function () {
    $(".select-option--wrapper").hide();
    $(".custom-select .label-heading .bottom").show();
    $(".custom-select .label-heading").click(function (event) {
        $(this).parent().find(".select-option--wrapper").slideToggle("fast");
        $(".custom-select .label-heading .top").toggle();
        event.stopPropagation();
    });
    $(".custom-select .option-value").click(function () {
        $(this).parent().parent().find(".label-heading").html($(this).html());
        $(this).parent().slideToggle("fast");
        event.stopPropagation();
    });
    $("html").click(function () {
        $(".select-option--wrapper").slideUp("fast");
    });
});

 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 