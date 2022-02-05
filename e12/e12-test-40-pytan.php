<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177834165-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-177834165-1');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Strona przygotwoująca do kwalifikacji zawodowych w zawodzie technik informatyk w oparciu o zmodernizowane podstawy programowe kształcenia.">
    <title>Technik informatyk - Kwalifikacje E.12, E.13, E.14</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="theme-color" content="#040405"/>
    <meta name="msapplication-navbutton-color" content="#040405">
    <meta name="apple-mobile-web-app-status-bar-style" content="#040405">
    <link rel="Stylesheet" type="text/css" href="../style.css"/>
    <link rel="Stylesheet" type="text/css" href="../media.css"/>
    <link rel="Stylesheet" type="text/css" href="../animate.css"/>
    <link rel="Stylesheet" type="text/css" href="../css/fontello.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js">
        </script>
    <![endif]-->
</head>
    <body>
        <div id="cnt-wrapper">
            <div id="preloader">
                <div id="animation-status-top"></div>
                <div id="animation-status"></div>
            </div>
            <div id="nav-wrapper" class="navbar navbar-expand-lg">
                <div class="container">
                    <div id="row-nav" class="row col-12 ml-0 mr-0 pl-0 pr-0 align-items-end">
                        <button class="navbar-toggler btn btn-min e12" type="button" data-toggle="collapse" data-target="#nav-header-exam" aria-controls="nav-header-exam" aria-expanded="false" aria-label="Przełącznik nawigacji">
                            <i class="icon-menu"></i>
                        </button>
                        <nav>
                            <ul id="nav-header-exam" class="collapse navbar-collapse">
                                <li class="nav-items" id="home-nav"><a href="">Start</a></li>
                                <li class="nav-items" id="e12-nav"><a href="../e12/e12-teoria">Egzamin E.12<i class="icon-down-open-mini icon-down-open-mini-toogle"></i></a>
                                    <ul class="nav-header-subpage">
                                        <li><a href="../e12/e12-teoria">E12 - Teoria</a></li>
                                        <li><a href="../e12/e12-praktyka">E12 - Praktyka</a></li>
                                    </ul>
                                </li>
                                <li class="nav-items" id="e13-nav"><a href="../e13/e13-teoria">Egzamin E.13<i class="icon-down-open-mini icon-down-open-mini-toogle"></i></a>
                                    <ul class="nav-header-subpage">
                                        <li><a href="../e13/e13-teoria">E13 - Teoria</a></li>
                                        <li><a href="../e13/e13-praktyka">E13 - Praktyka</a></li>
                                    </ul>
                                </li>
                                <li class="nav-items" id="e14-nav"><a href="../e14/e14-teoria">Egzamin E.14<i class="icon-down-open-mini icon-down-open-mini-toogle"></i></a>
                                    <ul class="nav-header-subpage">
                                        <li><a href="../e14/e14-teoria">E14 - Teoria</a></li>
                                        <li><a href="../e14/e14-praktyka">E14 - Praktyka</a></li>
                                    </ul>
                                </li>
                                <li class="nav-items" id="autor-nav"><a href="../autor">Autor</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-wrapper">
                <div class="container container-main">
                    <div class="row col-lg-9 col-12">
                        <div id="test-wrapper">
                            <h1 class="title-main">Test 40 pytań <span style="color:#ff4845;">E.12</span></h1>
                            <p class="descritpion">Kwalifikacja E.12 - Montaż i eksploatacja komputerów osobistych oraz urządzeń peryferyjnych</p>
                            <div id="test">
                                <form action="e12-test-40-pytan-odpowiedzi" method="post" id="egzamin">
                                <?php
                                    if (file_exists('loadtest.php')) {
                                        require_once "loadtest.php";
                                    }
                                    else {
                                        echo '<div id="error">Error: Błąd ładowania pytań!</div>';
                                    }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="description-footer-copyright">
                <p>COPY RIGHT 2020 © RIGHTS RESERVED</p>
            </div>
            <div id="scrollup" class="e12">
                <i class="icon-up-open"></i>
            </div>
            <div id="time-sh-side" class="e12">
                <div id="time-sh" class="e12">
                    <i class="icon-clock"></i>
                    <div id="sh-side-options-hover"></div>
                </div>
            </div>
        </div>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../js/effect.js"></script>
    <script src="../js/number.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Timer
            if($('.finish-test').length) {
                $("#test form").prepend('<div id="time" class="e12"></div>');

                let minuta = 60;
                let sekunda = 1;
                let koniecegzaminu = 0;
                let koniecczasu = 0;

                let refreshIntervalId = setInterval(odliczanie, 1000);

                function odliczanie () {
                    if(minuta<=0 && sekunda<=0) {
                        $('#time').html('Koniec czasu - nastąpi przekierowanie do strony z wynikami');
                        $('#sh-side-options-hover').html('Koniec!');
                        clearInterval(refreshIntervalId);
                        koniecczasu = 1;
                        $('#egzamin').submit();
                    }
                    else {
                        sekunda--;
                        if(sekunda<0) {
                            sekunda=59;
                            minuta--;
                        }

                        $("#time").html('Do końca egzaminu pozostało: <span>'+('0' + minuta).slice(-2)+'min '+('0' + sekunda).slice(-2)+'sek </span>');
                        $('#sh-side-options-hover').html(('0' + minuta).slice(-2)+':'+('0' + sekunda).slice(-2));
                    }
                }

                //---------- Security timer ----------//
                let t = $('#time-sh-side');
                if ($(window).scrollTop() > 250) {
                    t.fadeIn();
                }

                //---------- Timer efect ----------//
                $(window).on("scroll", function () {
                    if ($(this).scrollTop() > 250) {
                        t.fadeIn();
                    } else {
                        t.fadeOut();
                    }
                });
            };

            window.onbeforeunload = function (evt)
            {
                if ((typeof evt == 'undefined')) {
                evt = window.event;
                }
                if ((evt)&&(koniecegzaminu==0)&&(koniecczasu==0)){
                    return "Czy opuścić egzamin bez sprawdzenia odpowiedzi? (utracisz aktualny zestaw pytań)";
                }
                if ((evt)&&(koniecegzaminu==1)&&(koniecczasu==0)&&(evt=="submit")){
                    return "Gotowe? Można sprawdzić?";
                }

            }

            //---------- Uncheck other checkbox on one checked ----------//
            $('.question').each(function(i){
                i++;
                $('.ansa'+i).on('change', function() {
                    $(this).parent().parent().addClass('odpchecked');
                    $('.ansa'+i).not(this).prop('checked', false).parent().parent().removeClass('odpchecked');
                    if(!$(this).is(':checked')){$(this).prop('checked', false).parent().parent().removeClass('odpchecked');}
                });
            });
        });
    </script>
    </body>
</html>