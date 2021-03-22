<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link href="../styles/fonts.css" rel="stylesheet" />
        <link href="../styles/logstyles.css" rel="stylesheet" />
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
                    <li><a href="perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a href="#">Área</a></li>
                                            <li><a href="#">Curso</a></li>
                                            <li><a href="#">Distrito</a></li>
                                            <li><a href="#">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="simular_candidatura.php">Simular Candidatura</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="active" href="login.php" accesskey="4">Login</a></li>
                </ul>
            </div>
        </div>

        <!-- Fim do menu -->

        <h2 class="titulo">Dados Principais</h2>
        <div class="container">

            <input type="text" placeholder="Nome Completo" name="user" required>
            <p></p>

            <input type="text" placeholder="Email" name="user" required>
            <p></p>

            <input type="password" placeholder="Palavra-passe" name="pass" required>
            <p></p>

            <h2 class="titulo2">Dados Académicos</h2>

            <input type="text" placeholder="Média de Acesso" name="user" required>
            <p></p>

            <input type="text" placeholder="Provas de Ingresso" name="user" required>
            <p></p>

            <button type="submit">Registar</button>
        </div>

    </body>

</main>