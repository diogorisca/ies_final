<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/perfil.css" rel="stylesheet" />
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
                    <li><a class="active" href="perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a accesskey="3">Guia de Candidatura</a>
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
                                <li><a href="simular_candidatura.php">Simular Candidatura</a></li>
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

        $sql = "SELECT * FROM utilizador WHERE id = $id_utilizador";
        $resultado = mysqli_query($ligacao, $sql);
        $linha = $resultado->fetch_assoc();

        ?>

        <div class="perfil">

            <div class="esquerda">
                <?php
                if (empty($linha['img_perfil'])) {
                    echo '<img src="../assets/profile_pic.jpg" width="100">';
                } else {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($linha['img_perfil']) . '" width="100">';
                }
                ?>
                <h4>
                    <?php
                    echo $linha["nome"];
                    ?>
                </h4>
                <a href="editar_perfil.php?id_utilizador=<?php echo $linha["id"] ?>">
                    <img src="../assets/edit.png" width="25" height="25" title="Editar perfil">
                </a>
            </div>
            <div class="direita">

                <div class="informacao-pessoal">
                    <h3>
                        Informação Pessoal
                    </h3>
                    <div class="dados-pessoais">
                        <div class="dados">
                            <h4>
                                Email:
                            </h4>
                            <p>
                                <?php
                                echo $linha["email"];
                                ?>
                            </p>
                        </div>
                        <div class="dados">
                            <h4>
                                Contacto:
                            </h4>
                            <p>
                                <?php
                                echo $linha["contacto"];
                                ?>
                            </p>
                        </div>
                        <div class="dados">
                            <h4>
                                Morada:
                            </h4>
                            <p>
                                <?php
                                echo $linha["morada"];
                                ?>
                            </p>
                        </div>
                        <div class="dados">
                            <h4>
                                Data de Nascimento:
                            </h4>
                            <p>
                                <?php
                                $oldDate = $linha["data_nascimento"];
                                $newDate = date("d-m-Y", strtotime($oldDate));
                                echo $newDate;
                                ?>
                            </p>
                        </div>
                        <div class="dados">
                            <h4>
                                Cartão de Cidadão:
                            </h4>
                            <p>
                                <?php
                                echo $linha["cartao_cidadao"];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="informacao-academica">
                    <h3>
                        Informação Académica
                    </h3>
                    <div class="dados-academicos">
                        <div class="dados">
                            <h4>
                                Média de Acesso:
                            </h4>
                            <p>
                                <?php
                                echo $linha["media_acesso"];
                                ?>
                            </p>
                        </div>
                        <?php
                        if ($linha["notaBIO"] > 0) {
                        ?>
                            <div class="dados">
                                <h4>
                                    Nota de Biologia:
                                </h4>
                                <p>
                                    <?php
                                    echo $linha["notaBIO"];
                                    ?>
                                </p>
                            </div>
                        <?php
                        }
                        if ($linha["notaFQ"] > 0) {
                        ?>
                            <div class="dados">
                                <h4>
                                    Nota de Física e Química:
                                </h4>
                                <p>
                                    <?php
                                    echo $linha["notaFQ"];
                                    ?>
                                </p>
                            </div>
                        <?php
                        }
                        if ($linha["notaMAT"] > 0) {
                        ?>
                            <div class="dados">
                                <h4>
                                    Nota de Matemática:
                                </h4>
                                <p>
                                    <?php
                                    echo $linha["notaMAT"];
                                    ?>
                                </p>
                            </div>
                        <?php
                        }
                        if ($linha["notaPT"] > 0) {
                        ?>
                            <div class="dados">
                                <h4>
                                    Nota de Português:
                                </h4>
                                <p>
                                    <?php
                                    echo $linha["notaPT"];
                                    ?>
                                </p>
                            </div>
                        <?php
                        }
                        if ($linha["notaGeoM"] > 0) {
                        ?>
                            <div class="dados">
                                <h4>
                                    Nota de Geometria:
                                </h4>
                                <p>
                                    <?php
                                    echo $linha["notaGeoM"];
                                    ?>
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</main>