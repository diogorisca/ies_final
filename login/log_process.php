<?php

include '../database/dbconnection.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "SELECT * FROM utilizador WHERE email='$username' AND pass='$password'";
$resultado = mysqli_query($ligacao, $sql);
$resultadocheck = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado);
if ($resultado > 0) {

    if ($linha['email'] == $username && $linha['pass'] == $password) {
        if ($linha['tipo'] == 1) {
            header("location: ../index.php");
        }
        if ($linha['tipo'] == 2) {
            header("location: ../index.php");
        }
    }
} 
