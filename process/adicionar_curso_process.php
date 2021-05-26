<?php
session_start();

include "../database/dbconnection.php"; 

$nome = $_POST['nome'];
$faculdade = $_POST['faculdade'];

$sql_id_ies = "SELECT id FROM ies WHERE nome = '$faculdade'";
$resultado_id_ies = mysqli_query($ligacao, $sql_id_ies);
$linha_id_ies = $resultado_id_ies->fetch_assoc();
$ies_id = $linha_id_ies['id'];

$provas_ingresso = $_POST['provas_ingresso'];
$notaCandidatura = $_POST['notaCandidatura'];
$provaIngresso = $_POST['provaIngresso'];
$media = $_POST['media'];
$vagas = $_POST['vagas'];
$grau = $_POST['grau'];

if ($grau == "Mestrado Integrado") {
    $duracao = "10 Semestres";
    $ects = "300";
} else {
    $duracao = "6 Semestres";
    $ects = "180";
}

$area = $_POST['area'];

$sql = "INSERT INTO curso (ies_id, nome, faculdade, prova_ingresso, notaCandidatura, provaIngresso, media, vagas, Grau, Duração, ECTS, Área, plano_estudos)
        VALUES ('$ies_id', '$nome', '$faculdade', '$provas_ingresso', '$notaCandidatura', '$provaIngresso', '$media', '$vagas', '$grau', '$duracao', '$ects', '$area', ' ')";

$resultado = mysqli_query($ligacao, $sql);

header("location: ../listas/listar_cursos.php?add=verdade");
?>