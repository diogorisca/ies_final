<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/listas.css" rel="stylesheet" />
        <script src="../scripts/procurar.js"></script>
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
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

        <section class="container-lista">
            <div class="grid-item">
                <div class="tabela">
                    <h1 class="titulo">Distritos</h1>
                    <input type="text" id="ies_input" onkeyup="filtrar()" placeholder="Procurar...">

                    <?php
                        include '../database/dbconnection.php';
                        $sql = "SELECT DISTINCT distrito FROM ies ORDER BY distrito ASC";
                        $resultado = $ligacao->query($sql);
                    ?>

                    <input type="button" class="botao-adicionar" value="Adicionar distrito" onclick="location='#'" />

                    <?php
                        if ($resultado->num_rows > 0) { //verificar se existem linhas
                    ?>

                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th class="texto">Distrito</th>
                                </tr>
                            </thead>

                            <?php
                                while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                            ?>

                                <tbody id="tabela">
                                    <tr>
                                        <!-- Imprime as instituições na tabela -->
                                        <td>
                                            <?php
                                                $distrito = $linha["distrito"];
                                                echo $distrito;
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>

                            <?php
                                }
                            ?>
                        </table>

                    <?php
                        }
                    ?>

                </div>
            </div>
        </section>

    </body>

</main>