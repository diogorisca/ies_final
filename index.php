<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="styles/indexstyles.css" rel="stylesheet" />
        <link href="styles/fonts.css" rel="stylesheet" />
        <link href="styles/slideshow.css" rel="stylesheet" />
        <script src="scripts/slideshow.js"></script>
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a class="active" href="index.php" accesskey="1">Início</a></li>
                    <li><a href="menu/perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a href="listas/listar_IES_engenharia">Área</a></li>
                                            <li><a href="listas/listar_cursos.php">Curso</a></li>
                                            <li><a href="listas/listar_distrito.php">Distrito</a></li>
                                            <li><a href="listas/listar_ies.php">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="menu/simular_candidatura.php">Simular Candidatura</a></li>
                            </ul>
                        </div>
                    </li>

                    <?php
                    if (isset($_SESSION['user']) and $_SESSION['user'] != '') {
                        echo '<li><a href="index.php"><span>Terminar Sessão</span></a></li>';
                    } else {
                        echo '<li><a href="menu/login.php" accesskey="4">Login</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>

        <!-- Fim do menu -->

        <div id="page" class="container">
            <div class="tbox1">
                <h3 class="titulo-inicial">Acesso ao</h3>
                <h3 class="titulo-inicial">Ensino Superior</h3>

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
                            <img src="assets/ulp.jpg" alt="Universidade Lusófona do Porto">
                        </div>
                        <div class="slide">
                            <img src="assets/feup.jpg" alt="Faculdade de Engenharia da Universidade do Porto">
                        </div>
                        <div class="slide">
                            <img src="assets/ulisboa.jpg" alt="Universidade de Lisboa">
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

            <div class="tbox3">

                <p class="inform">Esta plataforma tem como objetivos principais:</p>
                <p class="texto-inform"> - Facilitar a consulta de informação relativa a cursos e Instituições de Ensino Superior.</p>
                <p class="texto-inform"> - Permitir ao estudante consultar vagas, médias de acesso.</p>
                <p class="texto-inform"> - Fazer simulação de candidatura em tempo real.</p>

            </div>
            
        </div>

    </body>

</main>