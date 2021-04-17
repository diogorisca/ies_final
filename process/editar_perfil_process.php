<?php
include "../database/dbconnection.php";

//Receber informação do formulario
$id_utilizador = $_POST['id_utilizador'];
$novo_email = $_POST['email'];
$novo_contacto = $_POST['contacto'];
$nova_morada = $_POST['morada'];
$nova_media = $_POST['media'];
$nova_notaA = $_POST['notaA'];
$nova_notaB = $_POST['notaB'];
$nova_notaC = $_POST['notaC'];
$nova_notaD = $_POST['notaD'];
$nova_notaE = $_POST['notaE'];

//UPDATE (editar) dados do perfil na BD
$sql = "UPDATE utilizador SET email='$novo_email', contacto='$novo_contacto', morada='$nova_morada', media_acesso='$nova_media',
notaBIO='$nova_notaA', notaFQ='$nova_notaB', notaMat='$nova_notaC', notaPT='$nova_notaD', notaGeoM='$nova_notaE' WHERE id = '$id_utilizador'";
$preparar = $ligacao->prepare($sql);
$preparar->execute();
header("location: ../menu/perfil.php");
?>