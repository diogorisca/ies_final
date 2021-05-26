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
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
                    <li><a href="perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a class="active" accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a class="active" href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a class="active" href="../listas/listar_cursos.php">Curso</a></li>
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
        if (isset($_GET["acao"]) && $_GET["acao"] == 'editar_curso') { //form para editar curso
        ?>

            <h2 class="titulo">Editar Curso</h2>

            <?php
            $idcurso = $_GET["id_curso"];
            ?>

            <form action="../process/editar_apagar.php?acao=editar_curso&idcurso=<?php echo $idcurso; ?>" method="POST">
                <div class="container">

                    <?php
                    include_once '../database/dbconnection.php';

                    $id_curso = $_GET["id_curso"];
                    $sql_id_curso = "SELECT * FROM curso WHERE id ='$id_curso'";
                    $resultado_id_curso = mysqli_query($ligacao, $sql_id_curso);
                    $linha_id_curso = $resultado_id_curso->fetch_assoc();

                    $ies_id = $linha_id_curso['ies_id'];
                    $sql_id_nome = "SELECT nome FROM ies WHERE id = '$ies_id'";
                    $resultado_id_nome = mysqli_query($ligacao, $sql_id_nome);
                    $linha_id_nome = $resultado_id_nome->fetch_assoc();
                    ?>

                    <input type="text" placeholder="Nome" name="nome" value="<?php echo $linha_id_curso["nome"]; ?>" required>
                    <p></p>

                    <select class="ies_drop_options" id="faculdade" name="faculdade" value="<?php echo $linha_id_nome["nome"]; ?>" required>
                        <option value="<?php echo $linha_id_nome['nome']; ?>"><?php echo $linha_id_nome['nome']; ?></option>
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

                    <input type="text" placeholder="Provas de Ingresso" name="provas_ingresso" value="<?php echo $linha_id_curso["prova_ingresso"]; ?>" required>
                    <p></p>

                    <input type="number" placeholder="Percentagem da Nota de Candidatura (Sem %)" name="notaCandidatura" min=0 max=100 value="<?php echo $linha_id_curso["notaCandidatura"]; ?>" required>
                    <p></p>

                    <input type="number" placeholder="Percentagem da Prova de Ingresso (Sem %)" name="provaIngresso" min=0 max=100 value="<?php echo $linha_id_curso["provaIngresso"]; ?>" required>
                    <p></p>

                    <input type="number" placeholder="Média de Candidatura (0-200)" name="media" min=0 max=200 value="<?php echo $linha_id_curso["media"]; ?>" required>
                    <p></p>

                    <input type="number" placeholder="Número de Vagas" name="vagas" value="<?php echo $linha_id_curso["vagas"]; ?>" required>
                    <p></p>

                    <div class="card" style="margin-left: 22px; margin-bottom:22px;">
                        <div class="card-body">
                            <h4 class="card-title">
                                Selecione o Grau:
                            </h4>
                            <div>
                                <?php
                                if ($linha_id_curso["Grau"] == "Licenciatura - 1º ciclo") {
                                ?>
                                    <input type="radio" name="grau" id="radio1" value="Licenciatura - 1º ciclo" checked />
                                    <label class="radio" for="radio1"><strong>Licenciatura - 1º ciclo</strong></label>
                                    <input type="radio" name="grau" id="radio2" value="Mestrado Integrado" />
                                    <label for="radio2"><strong>Mestrado Integrado</strong></label>
                                <?php
                                } else {
                                ?>
                                    <input type="radio" name="grau" id="radio1" value="Licenciatura - 1º ciclo" />
                                    <label class="radio" for="radio1"><strong>Licenciatura - 1º ciclo</strong></label>
                                    <input type="radio" name="grau" id="radio2" value="Mestrado Integrado" checked />
                                    <label for="radio2"><strong>Mestrado Integrado</strong></label>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <p></p>

                    <input type="text" placeholder="Área" name="area" value="<?php echo $linha_id_curso["Área"]; ?>" required>
                    <p></p>

                    <button type="submit">Editar Curso</button>
                    <p></p>
                </div>
            </form>
        <?php
        } else if (isset($_GET["acao"]) && $_GET["acao"] == 'editar_ies') { //form para editar ies
        ?>
            <h2 class="titulo">Editar IES</h2>

            <?php
            include "../database/dbconnection.php";

            $id_ies = $_GET["id_ies"];

            $sql_ies_informacao = "SELECT * FROM ies WHERE id='$id_ies'";
            $resultado_ies_informacao = mysqli_query($ligacao, $sql_ies_informacao);
            $linha_ies_informacao = $resultado_ies_informacao->fetch_assoc();

            ?>

            <form action="../process/editar_apagar.php?acao=editar_ies&idies=<?php echo $id_ies; ?>" method="POST">
                <div class="container">
                    <input type="text" placeholder="Nome" name="nome" value="<?php echo $linha_ies_informacao["nome"]; ?>" required>
                    <p></p>

                    <input type="text" placeholder="Morada" name="morada" value="<?php echo $linha_ies_informacao["morada"]; ?>" required>
                    <p></p>

                    <input type="email" placeholder="Email" name="email" value="<?php echo $linha_ies_informacao["contacto_email"]; ?>" required>
                    <p></p>

                    <input type="tel" pattern="[0-9]{9}" placeholder="Contacto" name="contacto" value="<?php echo $linha_ies_informacao["contacto_telefone"]; ?>" required>
                    <p></p>

                    <textarea class="textarea" placeholder="Descrição" name="descricao" required><?php echo $linha_ies_informacao["descricao"]; ?></textarea>
                    <p></p>

                    <input type="url" placeholder="Website Oficial" name="website" value="<?php echo $linha_ies_informacao["pagina_oficial"]; ?>" required>
                    <p></p>

                    <input type="text" placeholder="Distrito" name="distrito" value="<?php echo $linha_ies_informacao["distrito"]; ?>" required>
                    <p></p>

                    <button type="submit">Editar IES</button>
                    <p></p>
                </div>
            </form>
        <?php
        }
        ?>

    </body>
</main>