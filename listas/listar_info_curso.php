<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/informacao.css" rel="stylesheet" media="screen">
        <link href="../styles/info.css" rel="stylesheet" media="screen">
        <link href="../styles/listas.css" rel="stylesheet" />
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Iní­cio</a></li>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<li><a href="../menu/perfil.php" accesskey="2">Perfil</a></li>';
                    } else {
                        echo '<li><a href="../menu/login.php?log=naoauth" accesskey="2">Perfil</a></li>';
                    }
                    ?>
                    <li class="dropdown">
                        <a class="active" accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a href="#">Área</a></li>
                                            <li><a href="listar_cursos.php">Curso</a></li>
                                            <li><a href="listar_distrito.php">Distrito</a></li>
                                            <li><a href="listar_ies.php">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="../menu/simular_candidatura.php">Simular Candidatura</a></li>
                            </ul>
                        </div>
                    </li>

                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<li><a href="../login/logout_process.php" accesskey="4">Terminar Sessão</a></li>';
                    } else {
                        echo '<li><a href="../menu/login.php" accesskey="4">Login</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>

        <!-- Fim do menu -->

        <?php
        include '../database/dbconnection.php';

        $idcurso = $_GET['idcurso'];
        $sql = "SELECT * FROM curso WHERE id = '$idcurso'";
        $resultado = mysqli_query($ligacao, $sql);
        $linha = $resultado->fetch_assoc();

        /* echo $linha["Observações"];
        echo $linha["plano_estudos"]; */

        ?>

        <section class="u-clearfix u-section-1" id="carousel_2636">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-expanded-height u-grey-5 u-shape u-shape-rectangle u-shape-1"></div>
                <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-size-30">
                                <div class="u-layout-col">
                                    <div class="u-align-center u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1">
                                        <div class="u-container-layout"></div>
                                    </div>
                                    <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-2">
                                        <div class="u-container-layout u-valign-top u-container-layout-2">
                                            <p class="u-text u-text-1"><b>Lugar onde vai estar o echo das observações</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div class="u-align-right u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-3">
                                        <div class="u-container-layout u-container-layout-3">
                                            <h2 class="u-text u-text-2"><strong>Guia das Provas de Ingresso</strong> <br><br> <?php echo $linha["faculdade"]; ?> <br> <i> <?php echo $linha["nome"]; ?></i></h2>
                                            <p class="u-text u-text-3">
                                                <strong>Provas de Ingresso:</strong>
                                                <br>
                                                <strong><?php echo $linha["prova_ingresso"]; ?>: </strong><?php echo $linha["provaIngresso"]; ?>%
                                                <br>
                                                <strong>Nota de Candidatura: </strong><?php echo $linha["notaCandidatura"]; ?>%
                                                <br><br>
                                                <strong>Média de Candidatura: </strong><?php echo $linha["media"]; ?>
                                                <br><br>
                                                <strong>Vagas: </strong><?php echo $linha["vagas"]; ?>
                                                <br><br>
                                                <strong>Grau: </strong><?php echo $linha["Grau"]; ?>
                                                <br><br>
                                                <strong>Duração: </strong><?php echo $linha["Duração"]; ?>
                                                <br><br>
                                                <strong>ECTS: </strong><?php echo $linha["ECTS"]; ?>
                                                <br><br>
                                                <strong>Área: </strong><?php echo $linha["Área"]; ?>
                                            </p>
                                            <br>
                                            <?php
                                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                                $utilizador = $_SESSION['username'];
                                                $sqlid = "SELECT id FROM utilizador WHERE email='$utilizador'";
                                                $resultadoid = mysqli_query($ligacao, $sqlid);
                                                $linhaid = $resultadoid->fetch_assoc();
                                                echo "<a href='../simulacao/algoritmo_simular.php?idcurso=$idcurso &amp;
                                                idutilizador=$linhaid[id]' class='botao-adicionar'>Simular Candidatura</a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</main>

<!--            

Varios campos especificos vao precisar de queries especificas, para criar simulaÃ§Ã£o podemos dar display de tudo

Nesta pagina devera existir um botao que diga simular candidatura, assim que o utilizador o prima, chama a funÃ§Ã£o
simulaÃ§ao e da display de uma tabela com a ordem de suposta entrada para o curso.

-->