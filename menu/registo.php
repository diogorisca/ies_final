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
        <link href="../styles/checkbox_provas.css" rel="stylesheet" />
        <script src="../scripts/checkbox_provas.js"></script>
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
        <form action="../login/registo_process.php" method="post">
            <div class="container">

                <input type="text" placeholder="Nome Completo" name="user" required>
                <p></p>

                <input type="text" placeholder="Número Cartão de Cidadão" name="cc" required>
                <p></p>

                <input type="text" placeholder="Data Nascimento" name="date" required>
                <p></p>

                <input type="text" placeholder="Contacto" name="contacto" required>
                <p></p>

                <input type="text" placeholder="Morada" name="morada" required>
                <p></p>

                <input type="text" placeholder="Email" name="email" required>
                <p></p>

                <input type="password" placeholder="Palavra-passe" name="pass" required>
                <p></p>

                <h2 class="titulo2">Dados Académicos</h2>

                <input type="text" placeholder="Média de Acesso" name="media" required>
                <p></p>

                <div class="multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>Selecione as Provas de Ingresso</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <label for="um">
                            <input type="checkbox" id="um" />Alemão</label>
                        <label for="dois">
                            <input type="checkbox" id="dois" />Biologia e Geologia</label>
                        <label for="tres">
                            <input type="checkbox" id="três" />Desenho A</label>
                        <label for="quatro">
                            <input type="checkbox" id="quatro" />Economia A</label>
                        <label for="cinco">
                            <input type="checkbox" id="cinco" />Espanhol</label>
                        <label for="seis">
                            <input type="checkbox" id="seis" />Filosofia</label>
                        <label for="sete">
                            <input type="checkbox" id="sete" />Física e Química A</label>
                        <label for="oito">
                            <input type="checkbox" id="oito" />Francês</label>
                        <label for="nove">
                            <input type="checkbox" id="nove" />Geografia A</label>
                        <label for="dez">
                            <input type="checkbox" id="dez" />Geometria Descritiva A</label>
                        <label for="onze">
                            <input type="checkbox" id="onze" />História</label>
                        <label for="doze">
                            <input type="checkbox" id="doze" />História da Cultura e das Artes</label>
                        <label for="treze">
                            <input type="checkbox" id="treze" />Inglês</label>
                        <label for="catorze">
                            <input type="checkbox" id="catorze" />Latim A</label>
                        <label for="quinze">
                            <input type="checkbox" id="quinze" />Literatura Portuguesa</label>
                        <label for="dezasseis">
                            <input type="checkbox" id="dezasseis" />Matemática A</label>
                        <label for="dezassete">
                            <input type="checkbox" id="dezassete" />Matemática B</label>
                        <label for="dezoito">
                            <input type="checkbox" id="dezoito" />Matemática Aplicada às Ciências Sociais</label>
                        <label for="dezanove">
                            <input type="checkbox" id="dezanove" />Português</label>
                        <label for="vinte">
                            <input type="checkbox" id="vinte" />Mandarim</label>
                    </div>
                </div>

                <p></p>

                <button type="submit">Registar</button>
                <p></p>
            </div>
        </form>
    </body>

</main>