<?php
header('Content-Type: text/html; charset=iso-8859-1');
$servidor = "localhost";
$utilizador = "root";
$pass = "#Qwerty3";
$bd = "ies_final";
$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);

if ($ligacao->connect_error) {
    die("Erro de conexão:" . $ligacao->connect_error);
}

?>
