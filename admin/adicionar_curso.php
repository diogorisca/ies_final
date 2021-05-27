<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/logstyles.css" rel="stylesheet" />
        <link href="../styles/radio-cargo.css" rel="stylesheet" />
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
                                            <li><a href="../listas/listar_cursos.php">Curso</a></li>
                                            <li><a href="../listas/listar_distrito.php">Distrito</a></li>
                                            <li><a href="../listas/listar_ies.php">Instituição</a></li>
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

        <h2 class="titulo">Adicionar Curso</h2>

        <form action="../process/adicionar_curso_process.php" method="POST">
            <div class="container">

                <input type="text" placeholder="Nome" name="nome" required>
                <p></p>

                <select class="ies_drop_options" id="faculdade" name="faculdade" required>
                    <option selected hidden>Selecione a IES do Curso</option>
                    <?php

                    include "../database/dbconnection.php";

                    $sql = "SELECT DISTINCT nome FROM ies ORDER BY nome ASC";
                    $resultado = $ligacao->query($sql);

                    if ($resultado->num_rows > 0) { //verificar se existem linhas
                        while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                    ?>
                            <option value="<?php echo $linha['nome']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <p></p>

                <input type="text" placeholder="Provas de Ingresso" name="provas_ingresso" required>
                <p></p>

                <input type="number" placeholder="Percentagem da Nota de Candidatura (Sem %)" name="notaCandidatura" min=0 max=100 required>
                <p></p>

                <input type="number" placeholder="Percentagem da Prova de Ingresso (Sem %)" name="provaIngresso" min=0 max=100 required>
                <p></p>

                <input type="number" placeholder="Média de Candidatura (0-200)" name="media" min=0 max=200 required>
                <p></p>

                <input type="number" placeholder="Número de Vagas" name="vagas" required>
                <p></p>

                <div class="card" style="margin-left: 22px; margin-bottom:22px;">
                    <div class="card-body">
                        <h4 class="card-title">
                            Selecione o Grau:
                        </h4>
                        <div>
                            <input type="radio" name="grau" id="radio1" value="Licenciatura - 1º ciclo" />
                            <label class="radio" for="radio1"><strong>Licenciatura - 1º ciclo</strong></label>
                            <input type="radio" name="grau" id="radio2" value="Mestrado Integrado" />
                            <label for="radio2"><strong>Mestrado Integrado</strong></label>
                        </div>
                    </div>
                </div>
                <p></p>

                <input type="text" placeholder="Área" name="area" required>
                <p></p>

                <button type="submit">Adicionar Curso</button>
                <p></p>
            </div>
        </form>

    </body>
</main>