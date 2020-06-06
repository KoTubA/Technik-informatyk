$(document).ready(function () {
    $(".btn-normal-cnt").hide();
    
    $('.btn-bug-cnt').one("click", function () {
        $(this).css({'-webkit-animation:' : 'hinge 2s forwards',
                 'animation' : 'hinge 2s forwards'}).delay(2000).queue(function(next){
                    $(this).css({'display' : 'none'});
                    next();
                }).queue(function(next){
                    $("#bug-bg").addClass('dissolve').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
                    next();
                }).delay(1200).queue(function(next){
                    $(".bug-info").remove();
                    next();
                }).delay(1000).queue(function(next){
                    $(".btn-normal-cnt").show().css({'-webkit-transform' : 'scale(1)',
                    '-moz-transform' : 'scale(1)','transform' : 'scale(1)'});
                    next();
                });
    });
});