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
        <link href="../styles/checkbox_provas.css" rel="stylesheet" />
        <script src="../scripts/checkbox_provas.js"></script>
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
        include_once '../database/dbconnection.php';

        $id_utilizador = $_GET["id_utilizador"];
        $sql = "SELECT * FROM utilizador WHERE id ='$id_utilizador'";
        $resultado = mysqli_query($ligacao, $sql);
        $linha = $resultado->fetch_assoc();
        ?>

        <!-- Formulario para editar perfil -->

        <?php
        if (isset($_GET["emailexiste"]) && $_GET["emailexiste"] == 'verdade') {
            echo "<h4 class='msg-erro'>Email inserido já se encontra registado.<p>Por favor, tente novamente.</h4>";
        }
        ?>

        <h1 class="titulo-edit">Editar Perfil</h1>
        <h2 class="tituloedit">Dados Principais</h2>
        <form action="../process/editar_perfil_process.php" method="POST">
            <div class="container">
                <label>
                    <h3>Nome:</h3>
                </label>
                <p> <?php echo $linha['nome']; ?></p>
                <p></p>

                <label>
                    <h3>Número Cartão de Cidadão:</h3>
                </label>
                <p><?php echo $linha['cartao_cidadao']; ?></p>
                <p></p>

                <label>
                    <h3>Data de Nascimento:</h3>
                </label>
                <p>
                    <?php
                    $oldDate = $linha['data_nascimento'];
                    $newDate = date("d-m-Y", strtotime($oldDate));
                    echo $newDate;
                    ?>
                </p>
                <p></p>

                <label>
                    <h3>Contacto:</h3>
                </label>
                <input id="contacto" type="tel" pattern="[0-9]{9}" placeholder="Contacto" name="contacto" value="<?php echo $linha['contacto']; ?>" required>
                <p></p>

                <label>
                    <h3>Morada:</h3>
                </label>
                <input id="morada" type="text" placeholder="Morada" name="morada" value="<?php echo $linha['morada']; ?>" required>
                <p></p>

                <label>
                    <h3>Email:</h3>
                </label>
                <input id="email" type="email" placeholder="Email" name="email" value="<?php echo $linha['email']; ?>" required>
                <p></p>

                <h2 class="titulo2">Dados Académicos</h2>

                <label>
                    <h3>Média de Acesso:</h3>
                </label>
                <input id="media" type="number" class="number-block" placeholder="Média de Acesso" name="media" min="0" max="20" value="<?php echo $linha['media_acesso']; ?>" required>
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
                    </div>
                </div>

                <input type="number" class="notas" id="text1" placeholder="Nota de Biologia e Geologia" name="notaA" min="0" max="20" value="<?php echo $linha['notaBIO']; ?>">
                <input type="number" class="notas" id="text2" placeholder="Nota de Física e Química A" name="notaB" min="0" max="20" value="<?php echo $linha['notaFQ']; ?>">
                <input type="number" class="notas" id="text3" placeholder="Nota de Matemática A" name="notaC" min="0" max="20" value="<?php echo $linha['notaMAT']; ?>">
                <input type="number" class="notas" id="text4" placeholder="Nota de Português" name="notaD" min="0" max="20" value="<?php echo $linha['notaPT']; ?>">
                <input type="number" class="notas" id="text12" placeholder="Nota de Geometria Descritiva A" name="notaE" min="0" max="20" value="<?php echo $linha['notaGeoM']; ?>">

                <p></p>

                <input type="hidden" id="id_utilizador" name="id_utilizador" value="<?php echo $id_utilizador; ?>">

                <button type="submit">Atualizar Perfil</button>
                <p></p>
            </div>
        </form>

    </body>
</main>