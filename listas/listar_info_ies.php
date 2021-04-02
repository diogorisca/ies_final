<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../styles/indexstyles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../styles/nicepage.css" media="screen">
        <link rel="stylesheet" href="../styles/lista_info.css" media="screen">
    </head>

    <body>

        <!-- Ínicio do menu -->

        <div id="menu-wrapper">
            <div id="menu" class="topnav">
                <ul>
                    <li><a href="../index.php" accesskey="1">Início</a></li>
                    <li><a href="../menu/perfil.php" accesskey="2">Perfil</a></li>
                    <li class="dropdown">
                        <a class="active" accesskey="3">Guia de Candidatura</a>
                        <div class="dropdown-content">
                            <ul>
                                <li class="side-dropdown">
                                    <a href="#">Índice de Cursos</a>
                                    <div class="side-hide-dropdown">
                                        <ul>
                                            <li><a href="#">Área</a></li>
                                            <li><a href="listar_cursos.php">Curso</a></li>
                                            <li><a href="listar_distrito.php">Distrito</a></li>
                                            <li><a href="listar_ies.php">Instituição</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="../menu/simular_candidatura.php">Simular Candidatura</a></li>
                            </ul>
                        </div>
                    </li>

                    <?php
                    if (isset($_SESSION['user']) and $_SESSION['user'] != '') {
                        echo '<li><a href="listar_ies.php"><span>Terminar Sessão</span></a></li>';
                    } else {
                        echo '<li><a href="../menu/login.php" accesskey="4">Login</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>

        <!-- Fim do menu -->

        <?php
        include '../database/dbconnection.php';

        $iesid = $_GET['iesid'];
        $sql = "SELECT * FROM ies WHERE id = '$iesid'";
        $resultado = mysqli_query($ligacao, $sql);
        $linha = $resultado->fetch_assoc();
        ?>

        <section class="u-clearfix u-section-1" id="carousel_2636">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-expanded-height u-grey-5 u-shape u-shape-rectangle u-shape-1"></div>
                <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-size-30">
                                <div class="u-layout-col">
                                    <div class="u-align-center u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1">
                                        <div class="u-container-layout"></div>
                                    </div>
                                    <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-2">
                                        <div class="u-container-layout u-valign-top u-container-layout-2">
                                            <p class="u-text u-text-1"><b><?php echo $linha["pagina_oficial"]; ?></b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div class="u-align-right u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-3">
                                        <div class="u-container-layout u-container-layout-3">
                                            <h2 class="u-text u-text-2"><?php echo $linha["nome"]; ?></h2>
                                            <p class="u-text u-text-3"><?php echo $linha["descricao"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="sec-ac6a">
            <div class="u-clearfix u-sheet u-sheet-1">
                <h2 class="u-text u-text-1">Contacte a Instituição</h2>
                <div class="u-form u-form-1">
                    <form action="#" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="custom" name="form">
                        <div class="u-form-group u-form-name">
                            <label for="name-6797" class="u-form-control-hidden u-label">Nome</label>
                            <input type="text" placeholder="Nome" id="name-6797" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
                        </div>
                        <div class="u-form-email u-form-group">
                            <label for="email-6797" class="u-form-control-hidden u-label">Email</label>
                            <input type="email" placeholder="Email" id="email-6797" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
                        </div>
                        <div class="u-form-group u-form-message">
                            <label for="message-6797" class="u-form-control-hidden u-label">Mensagem</label>
                            <textarea placeholder="Mensagem" rows="4" cols="50" id="message-6797" name="message" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required=""></textarea>
                        </div>
                        <div class="u-align-left u-form-group u-form-submit">
                            <button>Enviar</button>
                            <input type="submit" value="submit" class="u-form-control-hidden">
                        </div>
                        <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                </div>
                <div class="u-align-left u-expanded-width u-grey-10 u-map u-map-1">
                    <div class="embed-responsive">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $linha["morada"]; ?>&key=AIzaSyCde12RAX3KGlMl0X7E29Hu8weTOT9s_I0"></iframe>
                    </div>
                </div>
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                                <div class="u-container-layout u-valign-top u-container-layout-1">
                                    <h4 class="u-text u-text-2">Morada</h4>
                                    <p class="u-text u-text-3"><?php echo $linha["morada"]; ?></p>
                                </div>
                            </div>
                            <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <h4 class="u-text u-text-4">Contactos</h4>
                                    <p class="u-text u-text-5"><strong>Por email: </strong><?php echo $linha["contacto_email"]; ?><br><strong>Por telefone: </strong><?php echo $linha["contacto_telefone"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

</main>