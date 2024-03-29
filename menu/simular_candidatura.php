<!--

Esta pagina devera dar display das tabelas de simulações em que o utilizador logado se encontra.

O nome do utilizador deverá estar evidenciado.

-->
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
                                            <li><a href="../listas/listar_cursos.php">Curso</a></li>
                                            <li><a href="../listas/listar_distrito.php">Distrito</a></li>
                                            <li><a href="../listas/listar_ies.php">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<li><a href="simular_candidatura.php">Simular Candidatura</a></li>';
                                } else {
                                    echo '<li><a href="login.php?log=naoauthsimu">Simular Candidatura</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<li><a href="../process/logout_process.php" accesskey="4">Terminar Sessão</a></li>';
                    } else {
                        echo '<li><a href="login.php" accesskey="4">Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Fim do menu -->

        <?php
        include '../database/dbconnection.php';

        $id_utilizador = $_SESSION['id_username'];

        $sql_nome_utilizador = "SELECT nome FROM utilizador WHERE id = '$id_utilizador'";
        $resultado_nome_utilizador = mysqli_query($ligacao, $sql_nome_utilizador);
        $linha_nome_utilizador = $resultado_nome_utilizador->fetch_assoc();
        ?>

        <section class="container-lista">
            <div class="grid-item">
                <div class="tabela">
                    <h1 class="titulo">Simulações Efetuadas por <?php echo $linha_nome_utilizador["nome"]; ?></h1>
                    <input type="text" id="ies_input" onkeyup="filtrar()" placeholder="Procurar...">
                    <br><br>
                    <?php

                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        $id_utilizador = $_SESSION['id_username'];
                        $sql_cargo = "SELECT cargo FROM utilizador WHERE id = $id_utilizador";
                        $resultado_cargo = mysqli_query($ligacao, $sql_cargo);
                        $linha_cargo = $resultado_cargo->fetch_assoc();
                    }

                    $sql = "SELECT DISTINCT curso_id, notaFinal FROM simulacao WHERE utilizador_id = '$id_utilizador' ORDER BY notaFinal DESC";
                    $resultado = $ligacao->query($sql);
                    if ($resultado->num_rows > 0) { //verificar se existem linhas
                    ?>

                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th class="texto-simu-esq">Curso</th>
                                    <th class="texto-simu-meio">IES</th>
                                    <th class="texto-simu-dir">Nota Final</th>
                                </tr>
                            </thead>

                            <?php
                            while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                                $id_curso = $linha["curso_id"];
                                $sql_verificar_curso = "SELECT DISTINCT ies_id, nome FROM curso WHERE id = '$id_curso'";
                                $resultado_verificar_curso = mysqli_query($ligacao, $sql_verificar_curso);
                                $linha_verificar_curso = $resultado_verificar_curso->fetch_assoc();

                                $ies_id = $linha_verificar_curso["ies_id"];
                                $sql_nome_ies = "SELECT DISTINCT nome FROM ies WHERE id = '$ies_id'";
                                $resultado_nome_ies = mysqli_query($ligacao, $sql_nome_ies);
                                $linha_nome_ies = $resultado_nome_ies->fetch_assoc();

                                $sql_nome_curso = "SELECT DISTINCT nome FROM curso WHERE id = '$id_curso'";
                                $resultado_nome_curso = mysqli_query($ligacao, $sql_nome_curso);
                                $linha_nome_curso = $resultado_nome_curso->fetch_assoc();
                            ?>

                                <tbody id="tabela">
                                    <tr>
                                        <!-- Imprime as info na tabela -->
                                        <td class="simu">
                                            <a href="../listas/listar_cursos_selecionados.php?nome=<?php echo $linha_nome_curso["nome"]; ?>">
                                                <?php
                                                echo $linha_verificar_curso["nome"];
                                                ?>
                                            </a>
                                        </td>
                                        <td class="simu">
                                            <a href="../listas/listar_info_ies.php?iesid=<?php echo $linha_verificar_curso["ies_id"]; ?>">
                                                <?php
                                                echo $linha_nome_ies["nome"];
                                                ?>
                                            </a>
                                        </td>
                                        <td class="simu">
                                            <?php
                                            echo $linha["notaFinal"];
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
                        echo "<h3 class='text-simu'>Ainda não foram efetuadas simulações por este utilizador!</h3>";
                        echo "<h3 class='text-simu-add'><a href='../listas/listar_cursos.php'>Faça já a sua primeira simulação aqui!</a></h3>";
                    }
                    ?>

                </div>
            </div>
        </section>

    </body>

</main>

</html>