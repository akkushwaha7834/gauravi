(function ($) {

    'use strict';

    // mobile menu dropdows
    $(".moblie-dropdwon").on("click", function () {
        var current_dropdown = $(this).next(".dropdown-mb-menu");
        $(".dropdown-mb-menu").not(current_dropdown).slideUp();
        current_dropdown.slideToggle();
        return false;
    });

    // Slide-left Animation //

    $(document).ready(function () {
        const animationElements = $('.animation-slide-left');

        function checkInView() {
            const windowHeight = $(window).height();
            const windowTop = $(window).scrollTop();
            const windowBottom = windowTop + windowHeight;

            animationElements.each(function () {
                const element = $(this);
                const elementTop = element.offset().top;
                const elementBottom = elementTop + element.outerHeight();

                if (elementBottom >= windowTop && elementTop <= windowBottom) {
                    element.addClass('slide-left');
                }
            });
        }

        $(window).on('scroll resize', checkInView).trigger('scroll');
    });


    // WOW JS
    if ($('.wow').length) {
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    }
})(jQuery);
