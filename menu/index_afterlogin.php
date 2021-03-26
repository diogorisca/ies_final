<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/fonts.css" rel="stylesheet" />
        <link href="../styles/slideshow.css" rel="stylesheet" />
        <script src="../scripts/slideshow.js"></script>
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a class="active" href="index_afterlogin.php" accesskey="1">Início</a></li>
                    <li><a href="perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a href="#">Área</a></li>
                                            <li><a href="#">Curso</a></li>
                                            <li><a href="#">Distrito</a></li>
                                            <li><a href="#">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="simular_candidatura.php">Simular Candidatura</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="../index.php" accesskey="4">Terminar Sessão</a></li>
                </ul>
            </div>
        </div>

        <!-- Fim do menu -->

        <div id="page" class="container">
            <div class="tbox1">
                <h3>Introdução</h3>
                <p>texto texto texto</p>
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
                            <img src="../assets/ulp.jpg" alt="Universidade Lusófona do Porto">
                        </div>
                        <div class="slide">
                            <img src="../assets/feup.jpg" alt="Faculdade de Engenharia da Universidade do Porto">
                        </div>
                        <div class="slide">
                            <img src="../assets/ulisboa.jpg" alt="Universidade de Lisboa">
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