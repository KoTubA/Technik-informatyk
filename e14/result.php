<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index,follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Technik informatyk - Baza pytań</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="theme-color" content="#040405"/>
    <meta name="msapplication-navbutton-color" content="#040405">
    <meta name="apple-mobile-web-app-status-bar-style" content="#040405">
    <link rel="Stylesheet" type="text/css" href="../style.css"/>
    <link rel="Stylesheet" type="text/css" href="../css/fontello.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
                    <div class="row col-12 ml-0 mr-0 pl-0 pr-0 align-items-end row-nav">
                        <button class="navbar-toggler btn btn-min e14" type="button" data-toggle="collapse" data-target="#nav-header-portfolio" aria-controls="nav-header-portfolio" aria-expanded="false" aria-label="Przełącznik nawigacji">
                            <i class="icon-menu"></i>
                        </button>
                        <nav>
                            <div id="nav-header-portfolio" class="collapse navbar-collapse">
                                <div class="nav-items" id="home-nav"><a href="../index.html">Start</a></div>
                                <div class="nav-items" id="e12-nav"><a href="../e12/e12.html">Egzamin E.12</a></div>
                                <div class="nav-items" id="e13-nav"><a href="../e13/e13.html">Egzamin E.13</a></div>
                                <div class="nav-items" id="e14-nav"><a href="../e14/e14.html">Egzamin E.14</a></div>
                                <div class="nav-items" id="autor-nav"><a href="../autor.html">Autor</a></div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!--
                <div id="overlay">
                    <div id="expansion">Strona nie jest w pełni funkcjonalna! <span>
                    Jeśli chcesz skorzystać z funkcji testu wróć tutaj za jakiś czas. <a href="../index.html" rel="no-follow">Strona główna.</a></span></div>
                </div>
            -->
            <div class="container container-main">
                <div class="row col-lg-9 col-12">
                    <div id="test-wrapper">
                        <h1 id="title">Test 40 pytań <span style="color:#007bff;">E.14</span></h1>
                        <p id="descritpion" class="descritpion-end">Kwalifikacja E.14 - Tworzenie aplikacji internetowych i baz danych oraz administrowanie bazami</p>
                        <div id="test-end">
<?php
    session_start();
    if((isset($_SESSION['test'])) && ($_SESSION['test']==true)) {
        if (file_exists('loadresult.php')) {
            require_once "loadresult.php";
        }
        else {
            echo '<div id="error">Error: Błąd ładowania odpowiedzi!</div>';
        }
    }
    else {
        echo '<h3 class="mid">Nie wybrano testu do rozwiązania!</h3>';
    }
?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="description-footer-copyright">
                <p>COPY RIGHT 2019 © BY SZYMON RIGHTS RESERVED</p>
            </div>
            <div id="scrollup" class="e14">
                <i class="icon-up-open"></i>
            </div>
            <div id="time-sh-side" class="e14">
                <div id="time-sh">
                    <i class="icon-clock"></i>
                    <div id="sh-side-options-hover"></div>
                </div>
            </div>
        </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../effect.js"></script>
    <script src="../number.js"></script>
    <script>
        $(document).ready(function(){
            let clone = $('.res').clone();
            $("#test-end").prepend(clone);
        });
    </script>
    </body>
</html>