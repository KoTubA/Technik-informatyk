$(document).ready(function () {
    const s = $('#scrollup');

    //---------- Security scroll ----------//
    if ($(window).scrollTop() > 250) {
        s.fadeIn();
    }

    //---------- Scroll up efect ----------//
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 250) {
            s.fadeIn();
        } else {
            s.fadeOut();
        }
    });

    //---------- Scroll up ----------//
    s.on('click', function () {
        $("html, body").stop().animate({ scrollTop: 0 }, 1000);
    });
});


$(window).on('load', function () {

    //---------- Preloader ----------//
    $('#preloader').fadeOut();
    $('body').addClass('scrollbar-show');

});