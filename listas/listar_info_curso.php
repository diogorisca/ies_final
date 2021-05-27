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
                                    <a class="active" href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a class="active" href="listar_cursos.php">Curso</a></li>
                                            <li><a href="listar_distrito.php">Distrito</a></li>
                                            <li><a href="listar_ies.php">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<li><a href="../menu/simular_candidatura.php">Simular Candidatura</a></li>';
                                } else {
                                    echo '<li><a href="../menu/login.php?log=naoauthsimu">Simular Candidatura</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </li>

                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<li><a href="../process/logout_process.php" accesskey="4">Terminar Sessão</a></li>';
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

        ?>

        <section class="u-clearfix u-section-1" id="carousel_2636">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-expanded-height u-grey-5 u-shape u-shape-rectangle u-shape-1">
                    <?php
                    if (isset($_GET["editar"]) && $_GET["editar"] == 'sucesso') {
                        echo "<h4 class='msg-sucesso'><strong>Curso atualizado com sucesso.</strong></h4>";
                    }
                    ?>
                </div>
                <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-size-30">
                                <div class="u-layout-col">
                                    <div class="u-align-center u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1">
                                        <div class="u-container-layout">

                                            <!-- Tabela de simulação -->
                                            <h1 class="titulo"><strong>Simulações</strong></h1>

                                            <?php
                                            $sql4 = "SELECT DISTINCT utilizador_id, notaFinal FROM simulacao WHERE curso_id = '$idcurso' ORDER BY notaFinal DESC";
                                            $resultado4 = mysqli_query($ligacao, $sql4);

                                            if (isset($_GET["simu"]) && $_GET["simu"] == 'sucesso_simu') {
                                                echo "<h4 class='msg-sucesso'><strong>Simulação efetuada com sucesso!</strong></h4><br>";
                                            }

                                            if ($resultado4->num_rows > 0) { //verificar se existem linhas
                                            ?>

                                                <table id="table" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="texto-simu-esq">Nome</th>
                                                            <th class="texto-simu-dir">Nota Final</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    while ($linha4 = $resultado4->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                                                    ?>
                                                        <tbody id="tabela">
                                                            <!-- Imprime as simulações na tabela -->

                                                            <td class="simu">
                                                                <?php
                                                                $utilizador_id = $linha4["utilizador_id"];
                                                                $sql_nome = "SELECT DISTINCT nome FROM utilizador WHERE id = $utilizador_id";
                                                                $resultado_nome = mysqli_query($ligacao, $sql_nome);
                                                                $linha_nome = $resultado_nome->fetch_assoc();
                                                                echo $linha_nome["nome"];
                                                                ?>
                                                            </td>
                                                            <td class="simu">
                                                                <?php
                                                                echo $linha4["notaFinal"];
                                                                ?>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            <?php
                                            } else {
                                                echo "<h3 class='text-simu'>Ainda não foram registadas simulações neste curso!</h3>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div class="u-align-right u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-3">
                                        <div class="u-container-layout u-container-layout-3">
                                            <?php
                                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                                                $id_utilizador = $_SESSION['id_username'];
                                                $sql_cargo = "SELECT cargo FROM utilizador WHERE id = $id_utilizador";
                                                $resultado_cargo = mysqli_query($ligacao, $sql_cargo);
                                                $linha_cargo = $resultado_cargo->fetch_assoc();
                                                if ($linha_cargo['cargo'] == "admin") {
                                            ?>
                                                    <a href="../menu/editar_ies_curso.php?id_curso=<?php echo $linha["id"] ?>&acao=editar_curso">
                                                        <img src="../assets/edit.png" width="25" height="25" style="margin-top: 10px;" title="Editar curso">
                                                    </a>
                                                    <a href="../process/editar_apagar.php?id_curso=<?php echo $linha["id"] ?>&acao=apagar_curso">
                                                        <img src="../assets/apagar.png" width="25" height="25" style="margin-top: 10px; margin-left: 10px;" title="Apagar curso">
                                                    </a>
                                            <?php
                                                }
                                            }
                                            ?>
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
                                                $id_utilizador = $_SESSION['id_username'];

                                                echo "<a href='../process/simular_candidatura_process.php?idcurso=$idcurso&amp;idutilizador=$id_utilizador'
                                                class='botao-adicionar'>Simular Candidatura</a>";
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