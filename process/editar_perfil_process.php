<?php
session_start();

include "../database/dbconnection.php";

//Receber informação do formulario

$id_utilizador = $_SESSION['id_username'];
$novo_nome = $_POST['user'];
$nova_data = $_POST['date'];
$novo_cc = $_POST['cc'];
$novo_email = $_POST['email'];
$novo_contacto = $_POST['contacto'];
$nova_morada = $_POST['morada'];
$nova_media = $_POST['media'];
$nova_notaA = $_POST['notaA'];
$nova_notaB = $_POST['notaB'];
$nova_notaC = $_POST['notaC'];
$nova_notaD = $_POST['notaD'];
$nova_notaE = $_POST['notaE'];

$sql_email = "SELECT * FROM utilizador WHERE email='$novo_email' LIMIT 1";
$resultado_email = mysqli_query($ligacao, $sql_email);
$linha = mysqli_fetch_assoc($resultado_email);

if ($linha['email'] === $novo_email) { //Se houver um email identico na BD ao novo email colocado
        $sql_verificar_email = "SELECT email FROM utilizador WHERE id='$id_utilizador'";
        $resultado_verificar_email = mysqli_query($ligacao, $sql_verificar_email);
        $linha_verificar_email = $resultado_verificar_email->fetch_assoc();
        if ($linha_verificar_email['email'] == $novo_email) { //Se o novo email colocado for o mesmo email do utilizador autenticado
                //UPDATE (editar) dados do perfil na BD
                $sql = "UPDATE utilizador SET nome='$novo_nome', data_nascimento='$nova_data', cartao_cidadao='$novo_cc', email='$novo_email', contacto='$novo_contacto', morada='$nova_morada', 
                media_acesso='$nova_media', notaBIO='$nova_notaA', notaFQ='$nova_notaB', notaMat='$nova_notaC', notaPT='$nova_notaD', notaGeoM='$nova_notaE' WHERE id = '$id_utilizador'";

                $preparar = $ligacao->prepare($sql);
                $preparar->execute();
                header("location: ../menu/perfil.php?editar=sucesso");
        } else { //Se o novo email for diferente do email da pessoa autenticada e esse email existir na BD
                header("location:../menu/editar_perfil.php?id_utilizador=$id_utilizador&emailexiste=verdade");
        }
} else { //Se nao houver nenhum email identico na BD
        //UPDATE (editar) dados do perfil na BD
        $sql = "UPDATE utilizador SET nome='$novo_nome', data_nascimento='$nova_data', cartao_cidadao='$novo_cc', email='$novo_email', contacto='$novo_contacto', morada='$nova_morada', 
        media_acesso='$nova_media', notaBIO='$nova_notaA', notaFQ='$nova_notaB', notaMat='$nova_notaC', notaPT='$nova_notaD', notaGeoM='$nova_notaE' WHERE id = '$id_utilizador'";

        $preparar = $ligacao->prepare($sql);
        $preparar->execute();
        header("location: ../menu/perfil.php?editar=sucesso");
}
?>