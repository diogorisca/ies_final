<?php
session_start();

include "../database/dbconnection.php"; 

//$ies_id = ;
$nome = $_POST['nome'];
$faculdade = $_POST['faculdade'];
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

$sql = "INSERT INTO curso (nome, faculdade, prova_ingresso, notaCandidatura, provaIngresso, media, vagas, Observações, Grau, Duração, ECTS, Área, plano_estudos)
        VALUES ('$nome', '$faculdade', '$provas_ingresso', '$notaCandidatura', '$provaIngresso', '$media', '$vagas', '$observacoes', '$grau', '$duracao', '$ects', '$area', '$planoEstudos')";

$resultado = mysqli_query($ligacao, $sql);

header("location: ../listas/listar_cursos.php?add=verdade");
?>