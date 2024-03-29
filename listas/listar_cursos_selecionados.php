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

        <!-- Ãnicio do menu -->

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
        $nome = $_GET['nome'];
        $sql = "SELECT id, nome, faculdade FROM curso WHERE nome = '$nome' ORDER BY faculdade ASC";
        $resultadox = mysqli_query($ligacao, $sql);
        $resultado = mysqli_query($ligacao, $sql);
        $linhax = $resultadox->fetch_assoc();
        ?>
        
        <section class="container-lista">
            <div class="grid-item">
                <div class="tabela">
                    <h1 class="titulo">Instituições com o curso de <?php echo $linhax["nome"]; ?></h1>
                    <input type="text" id="ies_input" onkeyup="filtrar()" placeholder="Procurar...">

                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        $id_utilizador = $_SESSION['id_username'];
                        $sql_cargo = "SELECT cargo FROM utilizador WHERE id = $id_utilizador";
                        $resultado_cargo = mysqli_query($ligacao, $sql_cargo);
                        $linha_cargo = $resultado_cargo->fetch_assoc();

                        if ($linha_cargo['cargo'] == "admin") {

                            $id_utilizador = $_SESSION['id_username'];
                            $sql_cargo = "SELECT cargo FROM utilizador WHERE id = $id_utilizador";
                            $resultado_cargo = mysqli_query($ligacao, $sql_cargo);
                            $linha_cargo = $resultado_cargo->fetch_assoc();


                            if ($linha_cargo['cargo'] == "admin") {
                    ?>
                                <input type="button" class="botao-adicionar" value="Adicionar instituição" onclick="location='#'" />
                        <?php
                            } 
                        } else {
                            echo "<br><br>";
                        }
                    }

                    if ($resultado->num_rows > 0) { //verificar se existem linhas
                        ?>

                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th class="texto">Instituição</th>
                                </tr>
                            </thead>

                            <?php
                            while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                            ?>

                                <tbody id="tabela">
                                    <tr>
                                        <!-- Imprime as instituições na tabela -->
                                        <td>
                                            <a href="listar_info_curso.php?idcurso=<?php echo $linha['id']; ?>">
                                                <?php
                                                echo $linha["faculdade"];
                                                ?>
                                            </a>
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