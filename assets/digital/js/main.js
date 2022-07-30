(function($) {
    'use strict';

    // [ JS Active Code Index ]

    // :: 1.0 Add class reveal for scroll to top
    // :: 2.0 Click event to scroll to top
    // :: 3.0 CountDown for coming soon page
    // :: 4.0 wow animation - on scroll
    // :: 5.0 Owl carousel active code
    // :: 6.0 Resize function
    // :: 7.0 FullScreenHeight function
    // :: 8.0 ScreenFixedHeight function
    // :: 9.0 FullScreenHeight and screenHeight with resize function

    var $window = $(window);

    $(document).ready(function() {

        // :: 1.0 Add class reveal for scroll to top
        $window.on('scroll', function() {
            if ($window.scrollTop() > 600) {
                $('#back-to-top').addClass('reveal');
            } else {
                $('#back-to-top').removeClass('reveal');
            }
        });

        // :: 2.0 Click event to scroll to top
        $('#back-to-top').on('click', function() {
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
            return false;
        });

        // :: 3.0 CountDown for coming soon page
        $(".countdown").countdown({
            date: "01 Jan 2021 00:01:00", //set your date and time. EX: 15 May 2014 12:00:00
            format: "on"
        });

    });

    // :: 4.0 wow animation - on scroll
    var wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 0, // default
        mobile: false, // default
        live: true // default
    })
    wow.init();

    // :: 5.0 Owl carousel active code
    $(".carousel-style1").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        smartSpeed: 800,
        nav: false,
        dots: true
    });

    $(".home-slider-banner").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        smartSpeed: 800,
        nav: true,
        dots: true,
        navText: ['<span class="fas fa-angle-left text-black text-medium-large"></span>', '<span class="fas fa-angle-right text-black text-medium-large"></span>']
    });

    // :: 6.0 Resize function
    $window.resize(function(event) {
        setTimeout(function() {
            SetResizeContent();
        }, 500);
        event.preventDefault();
    });

    // :: 7.0 FullScreenHeight function
    function fullScreenHeight() {
        var element = $(".full-screen");
        var $minheight = $window.height();
        element.css('min-height', $minheight);
    }

    // :: 8.0 ScreenFixedHeight function
    function ScreenFixedHeight() {
        var $headerHeight = $("header").height();
        var element = $(".screen-height");
        var $screenheight = $window.height() - $headerHeight;
        element.css('height', $screenheight);
    }

    // :: 9.0 FullScreenHeight and screenHeight with resize function
    function SetResizeContent() {
        fullScreenHeight();
        ScreenFixedHeight();
    }

    SetResizeContent();

})(jQuery);