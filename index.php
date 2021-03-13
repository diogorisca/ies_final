<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="styles/default.css" rel="stylesheet" />
        <link href="styles/fonts.css" rel="stylesheet" />
        <link href="styles/slideshow.css" rel="stylesheet" />
        <script src="scripts/slideshow.js"></script>
    </head>

    <body>

        <div id="menu-wrapper">
            <div id="menu" class="container">
                <ul>
                    <li><a href="#" accesskey="1" title="inicio">Início</a></li>
                    <li><a href="#" accesskey="2" title="perfil">Perfil</a></li>
                    <li><a href="#" accesskey="3" title="guia_candidatura">Guia de Candidatura</a></li>
                    <li><a href="#" accesskey="4" title="registo">Registo</a></li>
                    <li><a href="#" accesskey="5" title="login">Login</a></li>
                </ul>
            </div>
        </div>

        <div id="page" class="container">
            <div class="tbox1">
                <h3>Introdução</h3>
                <p>textinho teste</p>
                <a href="#" class="button">Saber mais</a>
            </div>

            <div class="tbox2">

                <!-- slider de imagens -->
                <div class="slider">
                    <div class="slides">

                        <!-- radio buttons -->
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">

                        <!-- imagens do slider -->
                        <div class="primeiro slide">
                            <img src="assets/ulp.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="assets/feup.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="assets/ulisboa.jpg" alt="">
                        </div>

                        <!-- navegação automática -->
                        <div class="navegacao-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                        </div>

                    </div>

                    <!-- navegação manual -->
                    <div class="navegacao-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                    </div>

                </div>



            </div>

        </div>

    </body>

</main>