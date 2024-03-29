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
//cart popup on adding product on details page
$(document).ready(function () {
    $(".cart-popup-desktop-show").show();
    $(".cart-close").click(function () {
        $(".cart-popup-desktop-show").hide();
    });
});
// Other popup JS
$(document).ready(function () {
    $(".afterpay-popup--control").click(function () {
        $("#afterpay-popup--wrapper").addClass("show");
    });
    $(".afterpay-popup--close").click(function () {
        $("#afterpay-popup--wrapper").removeClass("show");
    });
    $("#sizechart-popup--control").click(function () {
        $("#sizechart-popup--wrapper").addClass("show");
    });
    $("#sizechart-popup--close").click(function () {
        $("#sizechart-popup--wrapper").removeClass("show");
    });
    $(".close-popup").click(function () {
        $(".password-popup").css("display", "none");
    });
});


// carousel for landing page
$(document).ready(function () {
    var owl = $(".new-arrival--container .owl-carousel");
    owl.owlCarousel({
        items: 4,
        itemsDesktop: [1000, 4],
        itemsDesktopSmall: [900, 4],
        itemsCustom: false,
        pagination: false,
        rewindNav: false,
        dots: true
    });
    $(".next").click(function () {
        console.log("next");
        $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.next');
    })
    $(".prev").click(function () {
        $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.prev');
    })
});

// shipping page 
$(document).ready(function () {
    $("#different-address").change(function () {
        if ($("this.checked")) {
            $(".billing-address").show(500);
        }
    });
    $("#same-address").change(function () {
        if ($("this.checked")) {
            $(".billing-address").hide(500);
        }
    });
    $("#reset-pass-open").click(function () {
        $("#password-popup--reset").show();
    });
});

// cart
$(document).ready(function () {
    $(".edit-cart--handle").click(function () {
        $("#edit-cart--popup").addClass("show");
    });
    $(".edit-cart--close").click(function () {
        $("#edit-cart--popup").removeClass("show");
    });
});

// All tabs
$('ul.tabs li').click(function () {
    var tab_id = $(this).attr('data-tab');
    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');
    $(this).addClass('current');
    $("#" + tab_id).addClass('current');
})

// custom select
$(document).ready(function () {
    $(".select-option--wrapper").hide();
    $(".custom-select .label-heading").click(function (event) {
        $(this).parent().find(".select-option--wrapper").slideToggle("fast");
        $(this).find(".sel-icon span").toggleClass("icon-down-arrow");
        $(this).find(".sel-icon span").toggleClass("icon-top-arrow");
        event.stopPropagation();
    });
    $(".custom-select .option-value").click(function () {
        $(this).parent().parent().find(".label-heading .text").html($(this).html());
        $(this).parent().slideToggle("fast");
        $(this).parent().parent().find(".label-heading .sel-icon span").removeClass("icon-top-arrow");
        $(this).parent().parent().find(".label-heading .sel-icon span").addClass("icon-down-arrow");
        event.stopPropagation();
    });
    $("html").click(function () {
        $(".select-option--wrapper").slideUp("fast");
        $(".custom-select .label-heading .sel-icon span").removeClass("icon-top-arrow");
        $(".custom-select .label-heading .sel-icon span").addClass("icon-down-arrow");
    });
});


// less and more info btn
$(document).ready(function () {
    function splitText(text) {
        var textBreak = textLimit;
        var first = text.substring(0, textBreak);
        var second = text.substring(textBreak);
        var aux = second.substring(0, second.indexOf(" "));
        var spaceIndex = second.indexOf(" ");
        second = " " + second.substring(spaceIndex + 1);
        first = first.substring(0, textBreak) + aux;
        var bothTextes = [first, second];
        return bothTextes;
    }
    var textLimit = 200;
    var text = $("#info-more").html();
    if (text.length > textLimit) {
        var textArray = splitText(text);
        $("#info-more").text(textArray[0]);
        $("#info-more").append("<span onclick=\"expandText()\" class='show-more'>...<span class=\"red\">show more</span></span>");
        $("#info-more").append("<span style=\"display: none\" class='rest-of-description'>" + textArray[1] + "</span>");
        $("#info-more").append("<span onclick=\"collapseText()\" style=\"display: none\" class='red show-less'> show less </span>");
    } else {
        $("#info-more").text(text);
    }
});
function expandText() {
    $(".rest-of-description").show();
    $(".show-less").show();
    $(".show-more").hide();
}
function collapseText() {
    $(".rest-of-description").hide();
    $(".show-less").hide();
    $(".show-more").show();
}


//update, delete products from cart
$(document).on('click', '.cp-details__wrapper .mob-btn button,.product-wrapper a', function () {
    let cart_page = $(this).data("cart-page");
    let action = $(this).data("action");
    let sku = $(this).data("sku");
    if (action == 'remove') {
        method = "delete";
        data = {id: sku}
    } else {
        let qty = $(this).closest(".cp-details__wrapper").find("input[name='qty']").val();
        method = "patch";
        data = {id: sku, qty: qty}
    }
    console.log(cart_page);
    console.log(method);
    console.log(sku);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/cartitem",
        method: method,
        data: data,
        success: function (result) {
            //console.log(result);
            let cart_items = result.cartitemshtml;
            let cart_page_cart_items = result.cartpagecartitemshtml;
            let order_summary = result.ordersummaryhtml;
            let cart_count = result.cart_count;
            if (cart_count == '') {
                cart_count = '0';
                $(".proceed-to-purchase").remove();
            }
            $(".ajax_cart_popup").html(cart_items);
            if (cart_page == 'Yes') {
                $(".ajax_cart").html(cart_page_cart_items);
                $(".order_summary").html(order_summary);
            }
            $(".icon-shopping-cart span").text(cart_count);
            $('body,html').animate({scrollTop: 0}, 800);
            $(".cart-product--popup").slideDown();
        },
        error: function (error) {
            let obj = JSON.parse(error.responseText);
            if (cart_page == 'Yes' && action == 'update') {
                let target = $(".ajax_cart").find('[data-main-sku="' + sku + '"]');
                let replace_qty = target.find("input[name=qty]").data("qty");
                target.find(".action").prepend("<p class='error'>" + obj.errors + "</p>");
                setTimeout(function () {
                    target.find("input[name=qty]").val(replace_qty);
                    target.find(".action .error").remove();
                }, 2500);
            }
        },
        statusCode: {
            419: function () {
                window.location.href = "/cart";
            }
        }
    });
    return false;
});