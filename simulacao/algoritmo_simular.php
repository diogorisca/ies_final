<?php

$curso_id = $_POST['idcurso'];
$utilizador_id = $_POST['utilizador_id'];


$sql1 = "SELECT prova_ingresso, notaCandidatura, provaIngresso FROM curso WHERE id='$curso_id'";
$resultado1 = mysqli_query($ligacao, $sql1);
$linha1 = $resultado1->fetch_assoc();

$provas = $linha["prova_ingresso"];
$cot_prova = $linha["provaIngresso"];
$cot_media = $linha["notaCandidatura"];

$a1 = 'Física e Química e Matemática A';
$a2 = 'Biologia e Geologia e Matemática A ou Física e Química e Matemática A';
$a3 = 'Matemática A';
$a4 = 'Física e Química e Matemática A ou Matemática A e Português';

if (strcmp ( $provas, $a1 ) == 0 ) {

$sql2 = "SELECT media_acesso, notaFQ, notaMAT FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha = $resultado->fetch_assoc();

$media_acesso = $linha["media_acesso"];
$notaFQ = $linha["notaFQ"];
$notaMAT = $linha["notaMAT"];

$media_acesso = $media_acesso * $cot_media/100;
$nota_acesso = ($notaFQ + $notaMAT)/2 * $cot_prova/100;
$nota_final = $media_acesso + $nota_acesso;
}

if (strcmp ( $provas, $a2 ) == 0) {

$sql2 = "SELECT media_acesso, notaBIO, notaMAT, nota FQ FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha = $resultado->fetch_assoc();

$media_acesso = $linha["media_acesso"];
$notaFQ = $linha["notaFQ"];
$notaMAT = $linha["notaMAT"];
$notaBIO = $linha["notaBIO"];

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
$linha = $resultado->fetch_assoc();

$media_acesso = $linha["media_acesso"];
$notaMAT = $linha["notaMAT"];

$media_acesso = $media_acesso * $cot_media/100;
$nota_acesso = $notaMAT * $cot_prova/100;
$nota_final = $media_acesso + $nota_acesso;

}

if (strcmp( $provas, $a4 ) == 0) {

$sql2 = "SELECT media_acesso, notaFQ, notaMAT, notaPT, FROM utilizador WHERE id = '$utilizador_id'";
$resultado2 = mysqli_query($ligacao, $sql2);
$linha = $resultado->fetch_assoc();

$media_acesso = $linha["media_acesso"];
$notaFQ = $linha["notaFQ"];
$notaMAT = $linha["notaMAT"];
$notaPT = $linha["notaPT"];

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

