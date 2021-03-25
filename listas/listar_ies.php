<?php

include '../database/dbconnection.php';

$sql = "SELECT nome FROM ies ORDER BY nome";
$resultado = $ligacao->query($sql);

if ($resultado->num_rows > 0) {
     while ($linha = $resultado->fetch_assoc()) {
    $nome = $linha["nome"];
    echo $nome;
}
}

?>