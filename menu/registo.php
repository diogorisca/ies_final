<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
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
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<li><a href="../menu/perfil.php" accesskey="2">Perfil</a></li>';
                    } else {
                        echo '<li><a href="../menu/login.php?log=naoauth" accesskey="2">Perfil</a></li>';
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

                <input type="number" class="number-block" pattern="[0-9]{8}" placeholder="Número Cartão de Cidadão" name="cc" required>
                <p></p>

                <input type="date" placeholder="Data Nascimento" name="date" required>
                <p></p>

                <input type="tel" pattern="[0-9]{9}" placeholder="Contacto" name="contacto" required>
                <p></p>

                <input type="text" placeholder="Morada" name="morada" required>
                <p></p>

                <input type="email" placeholder="Email" name="email" required>
                <p></p>

                <input type="password" placeholder="Palavra-passe" name="pass" required>
                <p></p>

                <h2 class="titulo2">Dados Académicos</h2>

                <input type="number" class="number-block" placeholder="Média de Acesso" name="media" required>
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
                            <input type="checkbox" id="myCheck1" onclick="notaBG()" />Biologia e Geologia</label>
                        <label for="dois">
                            <input type="checkbox" id="myCheck2" onclick="notaFQ()" />Física e Química A</label>
                        <label for="tres">
                            <input type="checkbox" id="myCheck3" onclick="notaMatA()" />Matemática A</label>
                        <label for="quatro">
                            <input type="checkbox" id="myCheck4" onclick="notaPT()" />Português</label>
                        <label for="doze">
                            <input type="checkbox" id="myCheck12" onclick="notaGeometria()" />Geometria Descritiva A</label>
                        <!-- <label for="cinco">
                            <input type="checkbox" id="myCheck5" onclick="return false;" />Alemão</label>
                        <label for="seis">
                            <input type="checkbox" id="myCheck6" onclick="return false;" />Desenho A</label>
                        <label for="sete">
                            <input type="checkbox" id="myCheck7" onclick="return false;" />Economia A</label>
                        <label for="oito">
                            <input type="checkbox" id="myCheck8" onclick="return false;" />Espanhol</label>
                        <label for="nove">
                            <input type="checkbox" id="myCheck9" onclick="return false;" />Filosofia</label>
                        <label for="dez">
                            <input type="checkbox" id="myCheck10" onclick="return false;" />Francês</label>
                        <label for="onze">
                            <input type="checkbox" id="myCheck11" onclick="return false;" />Geografia A</label>
                        <label for="treze">
                            <input type="checkbox" id="myCheck13" onclick="return false;" />História</label>
                        <label for="catorze">
                            <input type="checkbox" id="myCheck14" onclick="return false;" />História da Cultura e das Artes</label>
                        <label for="quinze">
                            <input type="checkbox" id="myCheck15" onclick="return false;" />Inglês</label>
                        <label for="dezasseis">
                            <input type="checkbox" id="myCheck16" onclick="return false;" />Latim A</label>
                        <label for="dezassete">
                            <input type="checkbox" id="myCheck17" onclick="return false;" />Literatura Portuguesa</label>
                        <label for="dezoito">
                            <input type="checkbox" id="myCheck18" onclick="return false;" />Matemática B</label>
                        <label for="dezanove">
                            <input type="checkbox" id="myCheck19" onclick="return false;" />Matemática Aplicada às Ciências Sociais</label>
                        <label for="vinte">
                            <input type="checkbox" id="myCheck20" onclick="return false;" />Mandarim</label> -->
                    </div>
                </div>

                <input type="number" class="notas" id="text1" placeholder="Nota de Biologia e Geologia" name="notaA">
                <input type="number" class="notas" id="text2" placeholder="Nota de Física e Química A" name="notaB">
                <input type="number" class="notas" id="text3" placeholder="Nota de Matemática A" name="notaC">
                <input type="number" class="notas" id="text4" placeholder="Nota de Português" name="notaD">
                <input type="number" class="notas" id="text12" placeholder="Nota de Geometria Descritiva A" name="notaE">
                <!-- <input type="number" class="notas" id="text5" placeholder="Nota de Alemão">
                <input type="number" class="notas" id="text6" placeholder="Nota de Desenho A">
                <input type="number" class="notas" id="text7" placeholder="Nota de Economia A">
                <input type="number" class="notas" id="text8" placeholder="Nota de Espanhol">
                <input type="number" class="notas" id="text9" placeholder="Nota de Filosofia">
                <input type="number" class="notas" id="text10" placeholder="Nota de Francês">
                <input type="number" class="notas" id="text11" placeholder="Nota de Geografia A">
                <input type="number" class="notas" id="text13" placeholder="Nota de História">
                <input type="number" class="notas" id="text14" placeholder="Nota de História da Cultura e das Artes">
                <input type="number" class="notas" id="text15" placeholder="Nota de Inglês">
                <input type="number" class="notas" id="text16" placeholder="Nota de Latim A">
                <input type="number" class="notas" id="text17" placeholder="Nota de Literatura Portuguesa">
                <input type="number" class="notas" id="text18" placeholder=FNota de Matemática B">
                <input type="number" class="notas" id="text19" placeholder="Nota de Matemática Aplicada às Ciências Sociais">
                <input type="number" class="notas" id="text20" placeholder="Nota de Mandarim"> -->

                <p></p>

                <button type="submit">Registar</button>
                <p></p>
            </div>
        </form>
    </body>

</main>