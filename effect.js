$(document).ready(function () {
    const s = $('#scrollup'),
        tab = [$('.button-main-teoria'), $('.button-main-praktyka')],
        t = [$('.container-wrapper-first'),$('.container-wrapper-sec')],
        list = $('.list-about-exam');

    var h = 'bhide'

    //---------- Media height nav ----------//
    const media = window.matchMedia("(min-width: 991px)");
    (media.matches) ? (h = 'bhide',$('.navbar').removeClass('hide')) : (h = 'hide',$('.navbar').removeClass('bhide'));

    media.addListener(function (media) {
        (media.matches) ? (h = 'bhide',$('.navbar').removeClass('hide')) : (h = 'hide',$('.navbar').removeClass('bhide'));
    });


    //---------- Scroll to element ----------//
    tab.forEach(function (n, i) {
        n.on('click', function (e) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: t[i].offset().top
            }, 1000);
        });
    });

    //--------- Info about exam --------//
    $('.cnt-list-about-exam').hide();

    list.each(function(i,ele) {
        $(ele).on('click', function () {
            $(ele).next().stop().slideToggle();
            $(this).find('.icon-plus-1').toggleClass('hide-ele');
            $(this).find('.icon-minus').toggleClass('hide-ele');
        });
    });

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

    //----------Efect show menu----------//
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("show");
        if (_opened === true && !clickover.hasClass("navbar-toggler") && !clickover.hasClass("navbar") && !clickover.hasClass("row-nav")) {
            $("button.navbar-toggler").click();
        }
    });

    var zero = 0;
    if($('.navbar').length){
        if($(window).scrollTop()>100) {
            $('.navbar').addClass('notransition hide');
            setTimeout(function(){$('.navbar').removeClass('notransition hide');},0);
        }
        
        $(window).on("scroll", function () {
            if($(window).scrollTop()>100) {
                $('.navbar').toggleClass(h, $(window).scrollTop() > zero);
                zero = $(window).scrollTop();
                var _opened = $(".navbar-collapse").hasClass("show");
                if (_opened === true) {
                    $("button.navbar-toggler").click();
                };
            };
        });
    }
    else {
        $('#nav-wrapper').addClass('static');
    }

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 150) {
            $('.navbar').addClass('menu-bg');
        } else {
            $('.navbar').removeClass('menu-bg');
    }

    })
});


$(window).on('load', function () {

    //---------- Preloader ----------//
    $('#preloader').fadeOut();
    $('body').addClass('scrollbar-show');

});