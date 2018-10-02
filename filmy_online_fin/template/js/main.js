function aweMaps(e){e||(e="#contact-map");var o=new GMaps({el:e,lat:$(e).data("lat"),lng:$(e).data("lng"),draggable:!0,scrollwheel:!1});o.addMarker({lat:$(e).data("lat"),lng:$(e).data("lng")})}function aweSearchMenubar(){var e=$(".awemenu-nav"),o=$("#menubar-search-form"),a=$("#open-search-form"),t=$("#close-search-form");a.on("click",function(e){e.preventDefault(),o.toggleClass("open")}),t.on("click",function(e){e.preventDefault(),o.removeClass("open")}),$(window).resize(function(){if(e.hasClass("awemenu-mobile"))o.width("100%"),o.css({right:"0"});else{var a=$(".awemenu-nav .awemenu"),t=$(".awemenu-nav .navbar-icons"),i=a.width()+35,n=t.width()+20;o.width(i),o.css({right:n})}}).trigger("resize")}function aweQuickViewProduct(){$(".product-quick-view").magnificPopup({type:"ajax"})}function aweMainSlider(){var e=$(".main-slider");e.owlCarousel({items:1,nav:!0,dots:!0,onInitialized:function(){e.find(".owl-item").each(function(){var e=$(this),o=e.find(".main-slider-item"),a=e.find(".main-slider-image > img");o.length&&a.length&&(o.addClass("background"),o.css("background-image","url("+a.attr("src")+")"),a.css({opacity:0,visibility:"hidden"}))})}})}function awePriceSlider(e){e||(e=$("#price-slider")),e.slider({values:[35,250],min:10,max:320,step:10,range:!0,slide:function(e,o){$("#amount").text("$"+o.value)}})}function aweBlogMasonry(e){e||(e=$(".blog-masonry .row-masonry")),e.imagesLoaded(function(){e.masonry({itemSelector:".column",columnWidth:".column"})})}function aweProfolioIsotope(e){e||(e=$(".grid")),e.imagesLoaded(function(){e.isotope({itemSelector:".grid-item",layoutMode:"masonry"})}),$(".awe-nav").on("click","a",function(o){o.preventDefault(),$(this).parents(".awe-nav").find("li").removeClass("active"),$(this).closest("li").addClass("active");var a=$(this).attr("data-filter");e.isotope({filter:a})})}function aweProfolioDetail(){$(".lasted-portfolio-carousel").owlCarousel({items:4,nav:!0,dots:!1,margin:30,responsive:{0:{items:3},480:{items:3},768:{items:3},980:{items:4}}}),$(".image").magnificPopup({type:"image",delegate:"a",gallery:{enabled:!0}})}function aweProductSidebar(){function e(){a.addClass("open"),i.length||$("body").append('<div class="widgets-filter-overlay"></div>'),$("body").addClass("open-filters-open")}function o(){a.removeClass("open"),$(document).find(".widgets-filter-overlay").remove(),$("body").removeClass("open-filters-open")}var a=$("#shop-widgets-filters"),t=$("#open-filters"),i=$("body").find(".widgets-filter-overlay");t.on("click",function(){a.hasClass("open")?o():e()}),$("body").on("click",".widgets-filter-overlay",function(){o()})}function aweProductRender(e){Modernizr&&!Modernizr.touch&&$(".easyzoom").easyZoom();var o=new Swiper(".product-slider-main",{loop:!1,nextButton:".swiper-button-next",prevButton:".swiper-button-prev"}),a=new Swiper(".product-slider-thumbs",{loop:!1,centeredSlides:!0,spaceBetween:e?15:0,slidesPerView:e?4:3,direction:e?"horizontal":"vertical",slideToClickedSlide:!0});o.params.control=a,a.params.control=o}if(function(e){"use strict";if(!e.fn.owlCarousel)throw"jQuery owlCarousel must loaded before the script.";var o=e(".brands-carousel.owl-carousel, .Awe_image_carousel");o.each(function(){var o=e(this),a=o.data(),t=o.data("items"),i={items:t?t:5,nav:!0,dots:!1,responsive:{320:{items:3},480:{items:3},768:{items:4},992:{items:t?t:5}}};o.owlCarousel(e.extend(i,a))})}(jQuery),function(e){"use strict";if(!e.fn.owlCarousel)throw"jQuery owlCarousel must loaded before the script.";var o=e(".home-section-posts.owl-carousel, .Awe_blog");o.each(function(){var o=e(this),a=o.data(),t=(o.data("items"),{items:3,nav:!0,dots:!1,margin:30,responsive:{320:{items:3},480:{tems:2}}});o.owlCarousel(e.extend(t,a))})}(jQuery),function(e){"use strict";if(!e.fn.owlCarousel)throw"jQuery owlCarousel must loaded before the script.";var o=e(".products.owl-carousel");o.each(function(){var o=e(this),a=o.data(),t=o.data("items");t||(t=4);var i={};4==t?i={0:{items:3},480:{items:3},768:{items:3},980:{items:4}}:3==t&&(i={0:{items:3},380:{items:3},768:{items:3},992:{items:5}});var n={margin:30,nav:!0,dots:!1,items:t,responsive:i};o.owlCarousel(e.extend(n,a))})}(jQuery),function(e){"use strict";if(!e.fn.owlCarousel)throw"jQuery owlCarousel must loaded before the script.";var o=e(".Awe_testimonial");o.each(function(){var o=e(this),a=o.data(),t={items:3,nav:!0,dots:!1};o.owlCarousel(e.extend(t,a))})}(jQuery),function(e,o){"use strict";var a=window.aweHosoren||{};a.init=function(){this.bootstrapCore(),this.bootstrapNanoScroller(),this.bootstrapCarousel(),this.bootstrapBacktop(),this.bootstrapBackgroundParallax(),this.bootstrapShowPassword(),this.bootstrapMenubar(),this.bootstrapToogle(),this.bootstrapProductsThumbSwap(),this.bootstrapLoading()},a.bootstrapLoading=function(){if(window.SHOW_LOADING){var o=e("body");o.addClass("awe-body-loading"),setTimeout(function(){o.removeClass("awe-body-loading"),e(".awe-page-loading").fadeOut(250)},1500)}else e(".awe-page-loading").remove()},a.bootstrapProductsThumbSwap=function(){e(".product.product-grid, .product.product-list").each(function(){var o=e(this),a=o.find(".product-thumbnail"),t=a.find("img");if(!(t.length<=1)){var i,n,s=function(){var e=a.find("img.current"),o=e.next();o.index()<0&&(o=t.first()),e.removeClass("current"),o.addClass("current")},r=function(){t.removeClass("current"),t.first().addClass("current")};r(),o.hover(function(){n=setTimeout(function(){s(),i=setInterval(s,2500)},200)},function(){clearTimeout(n),clearInterval(i),r()})}})},a.bootstrapCore=function(){e('[data-toggle="tooltip"]').tooltip()},a.bootstrapNanoScroller=function(){e(".nano").nanoScroller({alwaysVisible:!0})},a.bootstrapCarousel=function(){e(".entry-carousel.owl-carousel").each(function(){var o=e(this);o.hasClass("owl-carousel-inset")||o.addClass("owl-carousel-inset"),o.owlCarousel({items:3,nav:!0,dots:!1})}),e('[data-toggle="carousel"]').each(function(){var o=e(this),a={items:3,dots:!1,nav:!1};o.owlCarousel(e.extend(a,o.data()))})},a.bootstrapBacktop=function(){var o=function(o){o.preventDefault(),e("html, body").animate({scrollTop:0},250)};e("footer > .back-top").on("click",function(e){o(e)}),e(".awemenu-nav").on("click",function(a){var t=e(a.target);t&&t.hasClass("awemenu-nav")&&o(a)})},a.bootstrapBackgroundParallax=function(){e(".background.background-parallax").parallax("50%",.2)},a.bootstrapShowPassword=function(){e("input[type=password][data-show-password]").each(function(o,a){e(a).hidePassword(!0,{wrapper:{className:"hide-show-password-wrapper"},toggle:{className:"hide-show-password-toggle"},states:{shown:{toggle:{content:'<i class="fa fa-eye-slash"></i>'}},hidden:{toggle:{content:'<i class="fa fa-eye"></i>'}}}})})},a.bootstrapAnimate=function(){var o=this;e("[data-animation]").each(function(){var a=e(this);o.beforeAnimation(a),o.renderAnimation(a)})},a.beforeAnimation=function(e){e.css({opacity:0})},a.renderAnimation=function(e){var o=0,a=e.data("animation");e.data("animation-timeout")&&(o=e.data("animation-timeout")),e.hasClass("animated")||e.addClass("animated"),setTimeout(function(){e.animate({opacity:1}),e.addClass(a)},o),e.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e.removeClass(a)})},a.bootstrapMenubar=function(){var o=e(".awemenu-nav");if(o.hasClass("awemenu-wp"))e(".awemenu-wp .menu > li ul").each(function(){var o=e(this),a=300,t=o.offset().left,i=e(window).width()-t;a>i&&(o.addClass("reverse"),o.find("ul").addClass("reverse"))});else{var a=o.data("responsive-width");o.aweMenu({trigger:"hover",style:"awemenu-default",position:"standard",hoverTime:100,sticky:!1,desktopDurationDefault:300,mobileTrigger:"hover",mobileStyle:"",mobilePosition:"outleft",mobileAnimationDuration:500,responsiveWidth:a?a:992,showArrow:!1,showMobileArrow:!0})}o.headroom({offset:500,onTop:function(){e("body").removeClass("body-headroom")},onNotTop:function(){e("body").addClass("body-headroom")}}),setTimeout(function(){o.hasClass("awemenu-mobile")&&o.headroom("destroy")},250),e(window).resize(function(){o.hasClass("awemenu-mobile")?o.headroom("destroy"):o.headroom("init")}).trigger("resize")},a.bootstrapToogle=function(){e('[data-toggle="toggle"]').each(function(){var o=e(this),a=e(e(this).data("target"));o.on("click",function(){a.is(":hidden")?a.show():a.hide()})})},window.aweHosoren=a}(window.jQuery,window.aweHosoren),window.jQuery)var $=window.jQuery;$(function(){aweHosoren.init(),aweSearchMenubar(),aweQuickViewProduct()});







// Film info slide
(function() {
 $(".film-toggle").mouseenter(function() {
  var someElement = $(this);
  someElement.addClass("toggleSlideInfoActive");
  var widthElement = $(this).outerWidth() - 5;
  var someElementPos = $(this).offset().left;
  if (someElementPos < $(window).width() / 2) {
   var left = widthElement + 'px';
   var right = 'auto';
   var positionEl = true;
  } else {
   var left = 'auto';
   var right = widthElement + 'px';
   var positionEl = false;
  }
  someElement.find(".film-img").css({
   'z-index': '6',
   'box-shadow': '0px 0px 15px 3px rgba(0,0,0,0.65)'
  });
  setTimeout(function() {
   if (someElement.hasClass("toggleSlideInfoActive")) {
    if (someElement.find('.film-about-txt span').text().trim().length < 1) {
     someElement.find('.film-about-txt span').text(someElement.find('.film-about-txt').data('description'));
    }
    someElement.find(".film-img").css({
     'transform': 'scale(1.05)'
    });
    someElement.find(".film-info-slide").css({
     'z-index': '5',
     'width': '396px',
     'left': '' + left + '',
     'right': '' + right + '',
     'box-shadow': '2px 0px 8px 0px rgba(0,0,0,0.35)'
    });
   }
  }, 700);
  someElement.data('positionEl', positionEl);
 }).mouseleave(function() {
  if ($(this).hasClass("toggleSlideInfoActive")) {
   $(this).removeClass("toggleSlideInfoActive")
   if ($(this).data('positionEl') == true) {
    var left = '0px';
    var right = 'auto';
   } else {
    var right = '0px';
    var left = 'auto';
   }
   $(this).find(".film-info-slide").css({
    'z-index': '4',
    'width': '0px',
    'left': '' + left + '',
    'right': '' + right + '',
    'box-shadow': '2px 0px 8px 0px rgba(0,0,0,0)'
   })
   $(this).find(".film-img").css({
    'z-index': '4',
    'box-shadow': '0px 0px 8px 0px rgba(0,0,0,0)',
    'transform': 'scale(1)'
   });
  }
 });
}).call(this);

/*
select
*/

$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });


    
    

});