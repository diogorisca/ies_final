<?php

include '../database/dbconnection.php';

$chave = md5('projetodois'); // key de encriptação da pass

function hashpassword($string, $chave){
    $string = crypt($string, '$1$' . $chave . '$');
    return $string;
}

$username = $_POST['user'];
$password = hashpassword($_POST['pass'], $chave);

$username = stripslashes($username);
$password = stripslashes($password);

$sql = "SELECT * FROM utilizador WHERE email='$username' AND pass='$password'";
$resultado = mysqli_query($ligacao, $sql);
$resultadocheck = mysqli_num_rows($resultado);
$linha = $resultado->fetch_assoc();

$count = mysqli_num_rows($resultado);

if ($count == 1) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: ../index.php");
} else {
    header("location:../menu/login.php?msg=failed");
}
