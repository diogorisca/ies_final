<?php

include 'bd-conection.php';

$username = $_POST['user'];
$password = $_POST['pass'];



$sql = "SELECT * FROM utilizador WHERE email='$username' AND pass='$password'";
$resultado = mysqli_query($ligacao, $sql);
$resultadocheck = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado);
if ($resultadocheck > 0) {


    if ($linha['email'] == $username && $linha['pass'] == $password) {
        if ($linha['tipo'] == 1) {
            header("location: after-login.php");
        }
        if ($linha['tipo'] == 2) {
            header("location: after-login.php");
        }
    }
} else {

    echo  '<div class="alert alert-danger">
                <a href="log.php" class="close" data-dismiss="alert" aria-label="close">Voltar</a>
                <p><strong>Alerta!</strong></p>
                Email or password wrong! Please try again!.
            </div>';
}

?>



