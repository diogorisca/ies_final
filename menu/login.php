<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/logstyles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<li><a href="perfil.php" accesskey="2">Perfil</a></li>';
                    } else {
                        echo '<li><a href="login.php?log=naoauth" accesskey="2">Perfil</a></li>';
                    }
                    ?>
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
                    <li><a class="active" href="login.php" accesskey="4">Login</a></li>
                </ul>
            </div>
        </div>

        <!-- Fim do menu -->
        <?php
        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
            echo "<h4 class='msg-erro'>Dados de acesso inválidos. Por favor, tente novamente.</h4>";
        }
        if (isset($_GET["log"]) && $_GET["log"] == 'naoauth') {
            echo "<h4 class='msg-erro'>Precisa de estar autenticado para aceder ao perfil!<p>Por favor, faça a autenticação!</h4>";
        }
        if (isset($_GET["criar"]) && $_GET["criar"] == 'sucesso') {
            echo "<h4 class='msg-sucesso'>Conta criada com sucesso.</h4>";
        }
        if (isset($_GET["log"]) && $_GET["log"] == 'naoauthsimu') {
            echo "<h4 class='msg-erro'>Precisa de estar autenticado para aceder às simulações do utilizador!</h4>";
        }
        ?>

        <h2 class="titulo">Login</h2>

        <form action="../process/login_process.php" method="post">

            <div class="container">
                <span><i class="fas fa-at"></i></span>
                <input type="text" placeholder="Email" name="user" required>
                <p></p>
                <span><i class="fas fa-key"></i></span>
                <input type="password" placeholder="Palavra-passe" name="pass" required>
                <p></p>
                <button type="submit">Login</button>
                <h5>Ainda não tem conta? <a href="registo.php">Clique aqui!</a></h5>
            </div>

        </form>

    </body>

</main>