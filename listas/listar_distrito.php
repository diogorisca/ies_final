/*

Listar os concelhos existentes em sistema




De seguida listar as faculdades que pertencem ao concelho escolhido


*/

<?php

include '../database/dbconnection.php';

$sql = "SELECT DISTINCT distrito FROM `ies` order by substring_index(nome, ' ', -1)";
$resultado = $ligacao->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $distrito = $linha["distrito"];
        echo $distrito;
    }
}

?>