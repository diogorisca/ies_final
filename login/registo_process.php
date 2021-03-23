<?php

include '../database/dbconnection.php';

$user = $_POST['user'];
$cc = $_POST['pass'];
$date = $_POST['date'];
$contacto = $_POST['contacto'];
$morada = $_POST['morada'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$media = $_POST['media'];
$prova = $_POST['prova'];
$tipo = 1;

$sql = "INSERT INTO utilizador (nome, cartao_cidadao, data_nascimento, email, contacto, media_acesso, provas_acesso, morada, pass, tipo)
        VALUES ('$user', '$cc', '$date', '$email', '$contacto', '$media', '$prova', '$morada', '$pass', '$tipo')";
$resultado = mysqli_query($ligacao, $sql);

    header("location: ../menu/login.php");

?>