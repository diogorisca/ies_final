<?php
header('Content-Type: text/html; charset=utf-8');
$servidor = "localhost";
$utilizador = "root";
$pass = "#Qwerty3";
$bd = "ies_final";
$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);

if ($ligacao->connect_error) {
    die("Erro de conexão:" . $ligacao->connect_error);
}

?>
