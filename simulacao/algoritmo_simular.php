<?php
include '../database/dbconnection.php';

$curso_id = $_GET['idcurso'];
$utilizador_id =15248537;


$sql1 = "SELECT prova_ingresso, notaCandidatura, provaIngresso FROM curso WHERE id='$curso_id'";
$resultado1 = mysqli_query($ligacao, $sql1);
$linha1 = $resultado1->fetch_assoc();

$provas = $linha1["prova_ingresso"];
$cot_prova = $linha1["provaIngresso"];
$cot_media = $linha1["notaCandidatura"];

$a1 = 'Física e Química e Matemática A';
$a2 = 'Biologia e Geologia e Matemática A ou Física e Química e Matemática A';
$a3 = 'Matemática A';
$a4 = 'Física e Química e Matemática A ou Matemática A e Português';

if (strcmp ( $provas, $a1 ) == 0 ) {

$sql2 = "SELECT media_acesso, notaFQ, notaMAT FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha2 = $resultado2->fetch_assoc();

$media_acesso = $linha2["media_acesso"];
$notaFQ = $linha2["notaFQ"];
$notaMAT = $linha2["notaMAT"];

$media_acesso = $media_acesso * $cot_media/100;
$nota_acesso = ($notaFQ + $notaMAT)/2 * $cot_prova/100;
$nota_final = $media_acesso + $nota_acesso;
}

if (strcmp ( $provas, $a2 ) == 0) {

$sql2 = "SELECT media_acesso, notaBIO, notaMAT, notaFQ FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha2 = $resultado2->fetch_assoc();

$media_acesso = $linha2["media_acesso"];
$notaFQ = $linha2["notaFQ"];
$notaMAT = $linha2["notaMAT"];
$notaBIO = $linha2["notaBIO"];

$media_acesso = $media_acesso * $cot_media/100;
$nota_acesso1 = ($notaFQ + $notaMAT)/2 * $cot_prova/100;
$nota_acesso2 = ($notaBIO + $notaMAT)/2 * $cot_prova/100;
$nota_final1 = $media_acesso + $nota_acesso1;
$nota_final2 = $media_acesso + $nota_acesso2;

if ($nota_final1 > $nota_final2){
    $nota_final = $nota_final1;
}

else {
    $nota_final = $nota_final2;
}
}

if (strcmp ( $provas, $a3 ) == 0) {

$sql2 = "SELECT media_acesso, notaMAT, FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha2 = $resultado->fetch_assoc();

$media_acesso = $linha2["media_acesso"];
$notaMAT = $linha2["notaMAT"];

$media_acesso = $media_acesso * $cot_media/100;
$nota_acesso = $notaMAT * $cot_prova/100;
$nota_final = $media_acesso + $nota_acesso;

}

if (strcmp( $provas, $a4 ) == 0) {

$sql2 = "SELECT media_acesso, notaFQ, notaMAT, notaPT, FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha2 = $resultado2->fetch_assoc();

$media_acesso = $linha2["media_acesso"];
$notaFQ = $linha2["notaFQ"];
$notaMAT = $linha2["notaMAT"];
$notaPT = $linha2["notaPT"];

$media_acesso = $media_acesso * $cot_media/100;
$nota_acesso1 = ($notaFQ + $notaMAT)/2 * $cot_prova/100;
$nota_acesso2 = ($notaPT + $notaMAT)/2 * $cot_prova/100;
$nota_final1 = $media_acesso + $nota_acesso1;
$nota_final2 = $media_acesso + $nota_acesso2;

if ($nota_final1 > $nota_final2){

    $nota_final = $nota_final1;
}

else {
    $nota_final = $nota_final2;
}
}


$sql3 = "INSERT INTO simulacao (curso_id, utilizador_id, notaFinal) VALUES ('$curso_id', '$utilizador_id', '$nota_final')";
$resultado3 = mysqli_query($ligacao, $sql3);

/* 

$sql4 = "SELECT notaFinal from simulacao WHERE curso_id = '$curso_id' ORDER BY notaFinal DESC";
$resultado4 = mysqli_query($ligacao, $sql4);
$linha4 = $resultado4->fetch_assoc();

*/

