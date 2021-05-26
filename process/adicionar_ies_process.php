<?php
session_start();

include "../database/dbconnection.php";

$nome = $_POST['nome'];
$morada = $_POST['morada'];
$email = $_POST['email'];
$contacto = $_POST['contacto'];
$descricao = $_POST['descricao'];
$website = $_POST['website'];
$distrito = $_POST['distrito'];
$latitude = '';
$longitude = '';

if (isset($_POST["insert"])){
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
}

$sql = "INSERT INTO ies (nome, morada, contacto_email, contacto_telefone, descricao, pagina_oficial, distrito, latitude, longitude, imagem)
        VALUES ('$nome', '$morada', '$email', '$contacto', '$descricao', '$website', '$distrito', '$latitude', '$longitude', '$file')";
$resultado = mysqli_query($ligacao, $sql);
header("location: ../listas/listar_ies.php?add=verdade");
?>