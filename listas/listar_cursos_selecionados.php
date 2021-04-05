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
                    <li><a href="../index.php" accesskey="1">InÃ­cio</a></li>
                    <li><a href="../menu/perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a class="active" accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a href="#">Ãndice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a href="#">Ãrea</a></li>
                                            <li><a href="listar_cursos.php">Curso</a></li>
                                            <li><a href="listar_distrito.php">Distrito</a></li>
                                            <li><a href="listar_ies.php">InstituiÃ§Ã£o</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="../menu/simular_candidatura.php">Simular Candidatura</a></li>
                            </ul>
                        </div>
                    </li>

                    <?php
                    if (isset($_SESSION['user']) and $_SESSION['user'] != '') {
                        echo '<li><a href="listar_ies.php"><span>Terminar SessÃ£o</span></a></li>';
                    } else {
                        echo '<li><a href="../menu/login.php" accesskey="4">Login</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>

        <?php
        include '../database/dbconnection.php';

        $nome = $_GET['nome'];
        $sql = "SELECT id, nome, faculdade FROM curso WHERE nome = '$nome' ORDER BY faculdade ASC";
        $resultadox = mysqli_query($ligacao, $sql);
        $resultado = mysqli_query($ligacao, $sql);
        $linhax = $resultadox->fetch_assoc()


        ?>

        <!-- Fim do menu -->
        <section class="container-lista">
            <div class="grid-item">
                <div class="tabela">
                    <h1 class="titulo">InstituiÃ§Ãµes com o curso de <?php echo $linhax["nome"]; ?></h1>
                    <input type="text" id="ies_input" onkeyup="filtrar()" placeholder="Procurar...">
                    <input type="button" class="botao-adicionar" value="Adicionar curso" onclick="location='#'" />

                    <?php
                    if ($resultado->num_rows > 0) { //verificar se existem linhas
                    ?>

                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th class="texto">InstituiÃ§Ã£o</th>
                                </tr>
                            </thead>

                            <?php
                            while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na pesquisa...
                            ?>

                                <tbody id="tabela">
                                    <tr>
                                        <!-- Imprime as instituiÃ§Ãµes na tabela -->
                                        <td>
                                            <a href="listar_info_curso.php?idcurso=<?php echo $linha['id']; ?>&amp;faculdade=<?php echo $linha['faculdade']; ?>">
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