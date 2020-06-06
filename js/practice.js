$(document).ready(function () {
    let nav = $('.header-choose-year'),
        btn = $('.cnt-exam-choose-semestr'),
        cnt = $('.cnt-exam-practice-wrapper'),
        button = $('.exam-practice-show-exam');

    nav.each(function(i) {
        $(this).on('click', function(){
            $(nav).removeClass('choose-btn-header');
            $(this).addClass('choose-btn-header');
            $(cnt).addClass('cnt-exam-practice-hide');
            $(cnt).eq(i).removeClass('cnt-exam-practice-hide');
        });
    });

    btn.each(function() {
        $(this).on('click', function(e) {
            let id = '#'+$(this).parent().parent().attr('id');
            let klasa = '.'+btn.attr('class').split(' ')[0];
            $(id+' '+klasa).removeClass('choose-btn');
            $(this).addClass('choose-btn');
            let element = $(id+' .cnt-exam-practice');
            $(element).addClass('cnt-exam-practice-hide');
            let button = $(id+' .cnt-exam-choose-semestr'); //We only download the button responsible for the relevant year
            let num = -1; //defult value
            $(button).each(function() {
                if ($(this).html()==e.target.innerHTML) //We check whether the text in the element clicked equals any of the buttons
                num = $(this).index(); //We retrieve item positions [0,1,2]
            });
            $(element).eq(num).removeClass('cnt-exam-practice-hide');
        });
    });

    $('.exam-practice-cnt').hide();

    button.each(function() {
        $(this).on('click', function() {
            let id = '#'+$(this).parent().parent().parent().attr('id');
            let element = $(id+' .exam-practice-show-exam');
            
            if(!$(this).parent().next().is(':hidden')) {
                $(this).parent().next().stop().slideUp();
                $(this).find('.icon-minus').addClass('hide-ele');
                $(this).find('.icon-plus-1').removeClass('hide-ele');
            }
            else {
                $(element).not(this).find('.icon-minus').addClass('hide-ele');
                $(element).not(this).find('.icon-plus-1').removeClass('hide-ele');
                $(this).find('.icon-minus').removeClass('hide-ele');
                $(this).find('.icon-plus-1').addClass('hide-ele');
                $(element).not(this).parent().next().stop().slideUp();
                $(this).parent().next().stop().slideDown();
            }
        });
    });
});