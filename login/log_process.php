<?php

    include '../database/dbconnection.php';

    $username = $_POST['user'];
    $password = $_POST['pass'];

    $username = stripslashes($username);
    $password = stripslashes($password);

    $sql = "SELECT * FROM utilizador WHERE email='$username' AND pass='$password'";
    $resultado = mysqli_query($ligacao, $sql);
    $resultadocheck = mysqli_num_rows($resultado);
    $linha = $resultado->fetch_assoc();
    
    $count = mysqli_num_rows($resultado);

    if($count == 1){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
    }
    header("location: ../index.php");
    
?>