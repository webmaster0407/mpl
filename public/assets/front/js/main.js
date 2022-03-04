(function($) {
    $('.dropdown > a').on('click', function(e) {
        e.preventDefault();
        $(this).next().toggle();
    });
    $('.mobile-menu-toggler, .mobile-menu-close').on('click', function() {
        $('.mobile-menu-wrapper').toggleClass('show');
    });
    if ($('.photo-grid-container').length > 0) {
        $('.photo-grid-container a').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
        });
    }
    $('.link-contactmodal').on('click', function() {
        $('#contact-modal').toggleClass('active');
        $('body').toggleClass('modal-open');
    });
    $('.close-modal').on('click', function() {
        $('#contact-modal').toggleClass('active');
        $('body').toggleClass('modal-open');
    });
})(jQuery);