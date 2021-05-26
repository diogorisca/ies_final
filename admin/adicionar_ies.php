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
                                <li><a href="../menu/simular_candidatura.php">Simular Candidatura</a></li>
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

        <h2 class="titulo">Adicionar IES</h2>

        <form action="../process/adicionar_ies_process.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <input type="text" placeholder="Nome" name="nome" required>
                <p></p>

                <input type="text" placeholder="Morada" name="morada" required>
                <p></p>

                <input type="email" placeholder="Email" name="email" required>
                <p></p>

                <input type="tel" pattern="[0-9]{9}" placeholder="Contacto" name="contacto" required>
                <p></p>

                <textarea class="textarea" placeholder="Descrição" name="descricao" required></textarea>
                <p></p>

                <input type="url" placeholder="Website Oficial" name="website" required>
                <p></p>

                <input type="text" placeholder="Distrito" name="distrito" required>
                <p></p>

                <strong>Imagem (Tamanho máximo: 40MB)</strong>
                <input type="file" name="image" id="image" />
                <p></p>

                <button type="submit" name="insert" id="insert" value="Insert">Adicionar IES</button>
                <p></p>
            </div>
        </form>
    </body>
</main>

<script>
    $document.ready(function() {
        $('#insert').click(function() {
            var image_name = $('#image').val();
            if (image == '') {
                alert ("Por favor, insira uma imagem!");
                return false;
            } else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['png', 'jpg', 'jpeg']) == -1) {
                    alert ("Tipo de imagem inserida inválida!");
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>