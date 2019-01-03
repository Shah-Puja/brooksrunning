// Header JS
$(document).ready(function () {
    // Header Menu Script for ipad views
    if ($(window).width() >= 768 && $(window).width() <= 1024) {
        var clickBtn = false;
        var data = false;
        var data1 = '';
        $('.sm-navigation--menu .main-nav').on("touchstart", function(e) {
            console.log("ipad clicked");
            var set_data = $(this).closest(".sm-navigation--menu").attr("data");
            console.log(set_data);
            $(".sm-navigation--menu").removeClass("tab-active");
            $(".desktop-navigation--sub").removeClass("active");
            if ((clickBtn == false && data == false) || (set_data != data1 && data1 != '')) {
                data1 = set_data;
                $(this).addClass("tab-active");
                $(this).closest(".sm-navigation--menu").find(".desktop-navigation--sub").addClass("active");
                e.preventDefault();
            } else {
                data1 = '';
            }
            if (set_data == data1 && data1 != '') {
                clickBtn = true;
                data = true;
            } else {
                clickBtn = false;
                data = false;
            }
        });
    }else{
        if ($(window).width() < 1025) {
            $("#desktop-navigation .main-nav").click(function () {
                $("#desktop-navigation .main-nav").next().removeClass("active");
                $(this).next().toggleClass("active");
            });
        }
        else {
            $("#desktop-navigation .main").on("mouseenter", function () {
                $("#desktop-navigation .main .main-nav").next().removeClass("active");
                $(this).find(".main-nav").next().addClass("active");
            });
            $("#desktop-navigation .main").on("mouseleave", function () {
                $("#desktop-navigation .main .main-nav").next().removeClass("active");
            });
        }
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
        console.log("desktop");
        $("#header-search--popup").hide();
        $(".search-container .search-wrapper").find(".search-product-content").html("");
        $("form[name='searchproduct'] input[name='q']").val("");
        return false;
    });

    $(".mob-search--product .search-container .search-wrapper .close").click(function () {
        console.log("mob");
        $(".new-arrival--container").hide();
        $(".mob-search--product .search-container .search-wrapper .close").hide();
        $(".search-container .search-wrapper").find(".search-product-content").html("");
        $("form[name='mob_searchproduct'] input[name='q']").val("");
        return false;
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

//cart popup on adding product on details page
$(document).ready(function () {
    $(".cart-popup-desktop-show").show();
    $(".cart-close").click(function () {
        $(".cart-popup-desktop-show").hide();
    });
});

// Other popup JS
$(document).on("click", ".afterpay-popup--control", function () {
    $("#afterpay-popup--wrapper").addClass("show");
});
$(document).on("click", ".afterpay-popup--close", function () {
    $("#afterpay-popup--wrapper").removeClass("show");
});


$(document).ready(function() {
    
    $(".privacy-terms--popup").click(function(){
        $(".privacy-content").load("/terms_conditions/eoyrpghost11_terms .privacy-content",function(){
            $(".privacy-terms--wrapper").show();
        });
    });

    $(".afterpay-popup--close").click(function(){
        $(".privacy-terms--wrapper").hide();
    });

}); 


$(document).ready(function(){
    $(".uTube-popup--control").on('click',function(){
        $("#uTube-popup--wrapper").addClass("show");
    });
    $(".uTube-popup--close").on('click',function(){
        $("#uTube-popup--wrapper").removeClass("show");
        // $('.shoe--vdo-show-iframe').attr('src', '');
        $('.shoe--vdo-show-iframe').attr('src', $('.shoe--vdo-show-iframe').attr('src'));
        stopVideo($('.shoe--vdo-show-iframe'));
        return false;
    });
});
$(document).on("click", "#sizechart-popup--control", function () {
    $("#sizechart-popup--wrapper").addClass("show");
});
$(document).on("click", "#sizechart-popup--close", function () {
    $("#sizechart-popup--wrapper").removeClass("show");
});
$("#expertadv-popup--control").click(function(){
    $("#expertadv-popup--wrapper").addClass("show");
});
$("#expertadv-popup--close").click(function(){
    $("#expertadv-popup--wrapper").removeClass("show");
});
$(document).on("click", ".close-popup", function () {
    $(".password-popup").css("display", "none");
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
        dots: true,
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
    $(".next").click(function () {
        $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.next');
    })
    $(".prev").click(function () {
        $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.prev');
    })
});
$(document).on("click",".next",function () {
    $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.next');
})
$(document).on("click",".prev",function () {
    $(this).parent(".new-arrival--container").find(".owl-carousel").trigger('owl.prev');
})


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
        var attr_id =$(this).attr('id').split("_");
        var  variant_id = attr_id[1];
        //alert(variant_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/cart/edit_cart",
            method: "POST",
            data: {variant_id: variant_id},
            success: function (result) {
                let cart_items = result.cartitemshtml;
                //console.log(cart_items);
                $("#edit-cart--popup").html(cart_items);
                $("#edit-cart--popup").addClass("show");
                
            },
        });
    });
    $(".edit-cart--close").click(function () {
        $("#edit-cart--popup").removeClass("show");
    });
});

// Edit my account order details
$(document).ready(function() {
    $(".edit-order--handle").click(function(){
        var attr_id =$(this).attr('id').split("_");
        var  order_id = attr_id[1];
        //console.log(order_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/order/view_order",
            method: "POST",
            data: {order_id: order_id},
            success: function (result) {
                let order_items = result.orderitemshtml;
                //console.log(result);
                //return false;
                $("#edit-order--popup").html(order_items);
                $("#edit-order--popup").addClass("show");
                
            },
        }); 
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
    $("html").click(function () {
        $(".select-option--wrapper").slideUp("fast");
        $(".custom-select .label-heading .sel-icon span").removeClass("icon-top-arrow");
        $(".custom-select .label-heading .sel-icon span").addClass("icon-down-arrow");
    });
});

$(document).on('click', '.custom-select .label-heading', function (event) {
    $(this).parent().find(".select-option--wrapper").slideToggle("fast");
    $(this).find(".sel-icon span").toggleClass("icon-down-arrow");
    $(this).find(".sel-icon span").toggleClass("icon-top-arrow");
    event.stopPropagation();
});
$(document).on('click', '.custom-select .option-value', function () {
    $(".select-option--wrapper li").removeClass("selected");
    let value = $(this).data('value');
    $(this).addClass("selected");
    $(this).parent().parent().find(".label-heading .text").html($(this).text());
    $(this).parent().slideUp("fast");
    $(this).parent().parent().find(".label-heading .sel-icon span").removeClass("icon-top-arrow");
    $(this).parent().parent().find(".label-heading .sel-icon span").addClass("icon-down-arrow");

    /** listing sort */
    var type = $(this).attr('data-sorttype');
    var sortValue = $(this).attr('value');
    if(type=='ass' || type=='new'){
        $grid.isotope({ sortBy: sortValue , sortAscending: false});
    }else{
        $grid.isotope({ sortBy: sortValue , sortAscending: true});
    }
    loadMore(12);
    event.stopPropagation();
});

//cart popup by Puja Shah
$(document).ready(function () {
    $(".cart-popup-desktop-show").show();
    $(".cart-close").click(function () {
        $(".cart-popup-desktop-show").hide();
    });
});

//cart popup by Puja Shah
$(document).ready(function () {
    $(".cart-close, .close-cart--popup").click(function () {
        $(".cart-popup-desktop").hide();
    });

    $('.icon-shopping-cart').hover(function (e) {
        if(window.location.pathname != "/payment"){
            $(".cart-popup-desktop").slideDown();
        } 
    });

    $('.cart-popup-desktop').mouseleave(function (e) {
        $('.cart-popup-desktop').hide();
    });
});

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

// less and more info btn
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
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

//update, delete products from cart by Puja Shah
$(document).on('click', '.cp-details__wrapper .mob-btn button,.product-wrapper button', function () {
    var cart_items = '';
    var cart_page_cart_items = '';
    var order_summary = '';
    
    let cart_page = $(this).data("cart-page");
    let action = $(this).data("action");
    let sku = $(this).data("sku");
    if (action == 'remove') {
        method = "delete";
        data = { id: sku }
    } else {
        let qty = $(this).closest(".cp-details__wrapper").find("input[name='qty']").val();
        method = "patch";
        data = { id: sku, qty: qty }
    }
    /*console.log(cart_page);
    console.log(method);
    console.log(sku);*/
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/cartitem",
        method: method,
        data: data,
        success: function (result) {
            console.log(result);
            if(action=="update"){
                location.reload();
            }
            var cart_items = result.cartitemshtml;
            var cart_page_cart_items = result.cartpagecartitemshtml;
            var order_summary = result.ordersummaryhtml;
            let cart_count = result.cart_count;
            if (cart_count == '') {
                cart_count = '0';
                $(".proceed-to-purchase").remove();
            }
            $(".cart-count").text(cart_count);
            $(".ajax_cart_popup").html(cart_items);
            if (cart_page == 'Yes') {
                $(".ajax_cart").html(cart_page_cart_items);
                $(".order_summary").html(order_summary);
            }
            $('body,html').animate({ scrollTop: 0 }, 800);
            $(".cart-popup-desktop").slideDown();
        },
        error: function (error) {
            let obj = JSON.parse(error.responseText);
            if (cart_page == 'Yes' && action == 'update') {
                let target = $(".ajax_cart").find('[data-main-sku="' + sku + '"]');
                let replace_qty = target.find("input[name=qty]").data("qty");
                target.find(".mob-btn").prepend("<p class='error'>" + obj.errors + "</p>");
                setTimeout(function () {
                    target.find("input[name=qty]").val(replace_qty);
                    target.find(".mob-btn .error").remove();
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


function search_product(){
    var search = $("form[name='searchproduct'] input[name='q']").val();
    $("form[name='searchproduct']").find("button img").show();
    $("form[name='searchproduct']").find("button i").hide();
    $("form[name='searchproduct']").find("button").addClass("formsearchbtn");
    $.ajax({
        url: "/search", 
        method: "get", 
        data: { q: search },
        success: function(response) {
            dataLayer.push({'event' : 'SearchResults'});
            $("#header-search--popup .search-wrapper").find(".search-product-content").html(response);
            var owl = $("#header-search--popup .new-arrival--container .owl-carousel");
            owl.owlCarousel({
                items: 6,
                itemsDesktop: [1000, 6],
                itemsDesktopSmall: [900, 6],
                itemsCustom: false,
                pagination: false,
                rewindNav: false,
                dots: true,
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
            $("form[name='searchproduct']").find("button img").hide();
            $("form[name='searchproduct']").find("button i").show();
            $("form[name='searchproduct']").find("button").removeClass("formsearchbtn");
        }
    });
    
    return false; 
}	

$("document").on('keypress','form[name="searchproduct"] input[name="q"]',function(){
    var key = e.which;
    if(key == 13){
        $('form[name="searchproduct"]').submit();
     }
     return false;
});
function mob_search_product(){
    var search = $("form[name='mob_searchproduct'] input[name='q']").val();
    $("form[name='mob_searchproduct']").find("button img").show();
    $("form[name='mob_searchproduct']").find("button i").hide();
    $("form[name='mob_searchproduct']").find("button").addClass("formsearchbtn");
    $.ajax({
        url: "/search", 
        method: "get", 
        data: { q: search },
        success: function(response) {
            $(".mob-search--product .search-container .search-wrapper .close").show();
            dataLayer.push({'event' : 'SearchResults'});
            $(".mob-search--product .search-container .search-wrapper").find(".search-product-content").html(response);
            var owl = $(".mob-search--product .search-container .new-arrival--container .owl-carousel");
            owl.owlCarousel({
                items: 4,
                itemsTablet : [768,4],
                 itemsMobile : [479,2],
                itemsCustom: false,
                pagination: false,
                rewindNav: false,
                dots: true,
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
            $("form[name='mob_searchproduct']").find("button img").hide();
            $("form[name='mob_searchproduct']").find("button i").show();
            $("form[name='mob_searchproduct']").find("button").removeClass("formsearchbtn");
        }
    });
    
    return false; 
}	



  /*Map Js*/  

 /* /Map Js*/  
