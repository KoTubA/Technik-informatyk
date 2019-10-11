$(document).ready(function () {
    const s = $('#scrollup'),
        tab = [$('.button-main-teoria'), $('.button-main-praktyka')],
        t = [$('.container-wrapper-first'),$('.container-wrapper-sec')],
        list = $('.list-about-exam');

    var h = 'bhide';

    //---------- Media height nav ----------//
    const media = window.matchMedia("(min-width: 991px)");
    (media.matches) ? (h = 'bhide',$('.navbar').removeClass('hide')) : (h = 'hide',$('.navbar').removeClass('bhide'),$('#e12-nav, #e13-nav, #e14-nav').addClass('small-nav'),$('.nav-items a').addClass('nav-items-disable'));

    media.addListener(function (media) {
        (media.matches) ? (h = 'bhide',$('.navbar').removeClass('hide'),$('#e12-nav, #e13-nav, #e14-nav').removeClass('small-nav'),$('.nav-items a').removeClass('nav-items-disable'),check()) : (h = 'hide',$('.navbar').removeClass('bhide'),$('#e12-nav, #e13-nav, #e14-nav').addClass('small-nav'),$('.nav-items a').addClass('nav-items-disable'),check());
    });

    //---------- Nav disable element ----------//
    function check() {
        if($('.small-nav').length) {
            $('.small-nav .nav-header-subpage').hide();

            $('.small-nav').on('click', function(e) {
                e.preventDefault();
                if(!$(this).find('.nav-header-subpage').is(':hidden')) {
                    $(this).find('.nav-header-subpage').stop().slideUp();
                    $(this).find('.icon-down-open-mini').stop().removeClass('flip');
                    $(this).children().removeClass('active-nav');
                }
                else {
                    $('.small-nav').find('.nav-header-subpage').not(this).stop().slideUp();
                    $('.small-nav').find('.icon-down-open-mini').not(this).removeClass('flip');
                    $('.small-nav').children().not(this).removeClass('active-nav');
                    $(this).find('.nav-header-subpage').stop().slideDown();
                    $(this).find('.icon-down-open-mini').stop().addClass('flip');
                    $(this).children().addClass('active-nav');
                }
            });
        }
        else {
            $('#e12-nav, #e13-nav, #e14-nav').unbind();
            $('#e12-nav, #e13-nav, #e14-nav').children().removeClass('active-nav');
            $('#e12-nav, #e13-nav, #e14-nav').find('.icon-down-open-mini').removeClass('flip');
            $('#nav-header-exam').removeClass('show');
        }
    };
    check();

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
            if(!$(this).next().is(':hidden')) {
                $('.cnt-list-about-exam').stop().slideUp();
                $(this).find('.icon-plus-1').removeClass('hide-ele');
                $(this).find('.icon-minus').addClass('hide-ele');
            }
            else {
                $('.cnt-list-about-exam').not(this).stop().slideUp();
                $('.list-about-exam .icon-minus').addClass('hide-ele');
                $('.list-about-exam .icon-plus-1').removeClass('hide-ele');
                $(this).next().stop().slideDown();
                $(this).find('.icon-plus-1').toggleClass('hide-ele');
                $(this).find('.icon-minus').toggleClass('hide-ele');
            }
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
        if (_opened === true && !clickover.hasClass("navbar-toggler") && !clickover.hasClass("navbar") && !clickover.hasClass("row-nav") && !clickover.hasClass("nav-items") && !clickover.hasClass("nav-items-disable") && !clickover.hasClass("icon-down-open-mini-toogle")) {
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