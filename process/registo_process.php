<?php
session_start();

include '../database/dbconnection.php';

$chave = md5('projetodois'); // key de encriptação da pass

function hashpassword($string, $chave) {
        $string = crypt($string, '$1$' . $chave . '$');
        return $string;
}


$pass_nao_encriptada = $_POST['pass'];

$user = $_POST['user'];
$media = $_POST['media'];
$cc = $_POST['cc'];
$date = $_POST['date'];
$contacto = $_POST['contacto'];
$morada = $_POST['morada'];
$email = $_POST['email'];
$pass = hashpassword($pass_nao_encriptada, $chave);
$repetir_pass = hashpassword($_POST['repetirpass'], $chave);
$cargo = $_POST['cargo'];

$notaA = $_POST['notaA'];
$notaB = $_POST['notaB'];
$notaC = $_POST['notaC'];
$notaD = $_POST['notaD'];
$notaE = $_POST['notaE'];


$sql_email = "SELECT * FROM utilizador WHERE email='$email' LIMIT 1";
$resultado_email = mysqli_query($ligacao, $sql_email);
$linha = mysqli_fetch_assoc($resultado_email);

if ($linha['email'] === $email) {
        header ("location: ../menu/registo.php?emailexiste=verdade");
} else if ($pass != $repetir_pass) {
        header ("location: ../menu/registo.php?passnaocoincide=verdade");
} else {
        $sql = "INSERT INTO utilizador (nome, cartao_cidadao, data_nascimento, email, cargo, contacto, media_acesso, notaBIO, notaFQ, notaMAT, notaPT, notaGeoM, morada, pass)
        VALUES ('$user', '$cc', '$date', '$email', '$cargo', '$contacto', '$media', '$notaA', '$notaB', '$notaC', '$notaD', '$notaE',  '$morada', '$pass')";
        $resultado = mysqli_query($ligacao, $sql);
        header("location: ../menu/login.php?criar=sucesso");
}
