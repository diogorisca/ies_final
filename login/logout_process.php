<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION["loggedin"]);
$_SESSION = array();

header("location: ../index.php");
?>