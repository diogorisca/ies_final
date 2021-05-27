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
        <link href="../styles/radio-cargo.css" rel="stylesheet" />
        <script src="../scripts/checkbox_provas.js"></script>
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
        if (isset($_GET["emailexiste"]) && $_GET["emailexiste"] == 'verdade') {
            echo "<h4 class='msg-erro'>Email inserido já se encontra registado.<p>Por favor, tente novamente.</h4>";
        }
        if (isset($_GET["passnaocoincide"]) && $_GET["passnaocoincide"] == 'verdade') {
            echo "<h4 class='msg-erro'>Palavra-Passe não coincide.<p>Por favor, tente novamente.</h4>";
        }
        ?>

        <h2 class="titulo">Dados Principais</h2>
        <form action="../process/registo_process.php" method="post">
            <div class="container">

                <span><i class="fas fa-user"></i></span>
                <input type="text" placeholder="Nome Completo" name="user" required>
                <p></p>

                <span><i class="fa fa-address-card"></i></span>
                <input type="number" class="number-block" pattern="[0-9]{8}" placeholder="Número Cartão de Cidadão" name="cc" required>
                <p></p>

                <span><i class="fas fa-calendar-day"></i></span>
                <input type="date" placeholder="Data Nascimento" name="date" required>
                <p></p>

                <span><i class="fa fa-phone"></i></span>
                <input type="tel" pattern="[0-9]{9}" placeholder="Contacto" name="contacto" required>
                <p></p>

                <span><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" placeholder="Morada" name="morada" required>
                <p></p>

                <span><i class="fas fa-at"></i></span>
                <input type="email" placeholder="Email" name="email" required>
                <p></p>

                <span><i class="fas fa-key"></i></span>
                <input type="password" placeholder="Palavra-Passe" name="pass" required>
                <p></p>

                <span><i class="fas fa-key"></i></span>
                <input type="password" placeholder="Repita a Palavra-Passe" name="repetirpass" required>
                <p></p>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-user-tag" style="margin-right: 5px;"></i>Selecione o cargo:
                        </h4>
                        <div>
                            <input type="radio" name="cargo" id="radio1" value="basic" checked="true" />
                            <label class="radio" for="radio1"><strong>Utilizador</strong></label>
                            <input type="radio" name="cargo" id="radio2" value="admin" />
                            <label for="radio2"><strong>Administrador</strong></label>
                        </div>
                    </div>
                </div>

                <h2 class="titulo2">Dados Académicos</h2>

                <input type="number" class="number-block" placeholder="Média de Acesso" name="media" min="0" max="20" required>
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
                            <input type="checkbox" id="checkBG" onclick="notaBG()" />Biologia e Geologia</label>
                        <label for="dois">
                            <input type="checkbox" id="checkFQ" onclick="notaFQ()" />Física e Química A</label>
                        <label for="tres">
                            <input type="checkbox" id="checkMatA" onclick="notaMatA()" />Matemática A</label>
                        <label for="quatro">
                            <input type="checkbox" id="checkPT" onclick="notaPT()" />Português</label>
                        <label for="doze">
                            <input type="checkbox" id="checkGeo" onclick="notaGeometria()" />Geometria Descritiva A</label>
                    </div>
                </div>

                <input type="number" class="notas" id="scoreBG" placeholder="Nota de Biologia e Geologia" name="notaA" min="0" max="20">
                <input type="number" class="notas" id="scoreFQ" placeholder="Nota de Física e Química A" name="notaB" min="0" max="20">
                <input type="number" class="notas" id="scoreMatA" placeholder="Nota de Matemática A" name="notaC" min="0" max="20">
                <input type="number" class="notas" id="scorePT" placeholder="Nota de Português" name="notaD" min="0" max="20">
                <input type="number" class="notas" id="scoreGeo" placeholder="Nota de Geometria Descritiva A" name="notaE" min="0" max="20">

                <p></p>

                <button type="submit">Registar</button>
                <p></p>
            </div>
        </form>
    </body>

</main>