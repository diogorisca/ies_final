<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/info.css" rel="stylesheet" />
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
                    <li><a href="../menu/perfil.php" accesskey="2">Perfil</a></li>
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
                    if (isset($_SESSION['user']) and $_SESSION['user'] != '') {
                        echo '<li><a href="listar_ies.php"><span>Terminar Sessão</span></a></li>';
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

            $nome = $_GET['nome'];
            $sql = "SELECT id, nome, faculdade FROM curso WHERE nome = '$nome'";
            $resultado = mysqli_query($ligacao, $sql);

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
            echo $linha["nome"];
            echo $linha["faculdade"];
            }
        }
        ?>

    </body>

</main>



/*
aqui vais passar o nome e a faculdade para a proxima pagina (listar_info_curso) de forma a com uma query
dar retrieve de toda a informa�ao desse curso
*/