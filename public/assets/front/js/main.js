(function($) {
    $('.dropdown > a').on('click', function(e) {
        e.preventDefault();
        $(this).next().toggle();
    });
    $('.mobile-menu-toggler, .mobile-menu-close').on('click', function() {
        $('.mobile-menu-wrapper').toggleClass('show');
    });
})(jQuery);