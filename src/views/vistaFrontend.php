<?php 
error_reporting(E_ALL);
// Y comprobamos que el usuario se haya autentificado y existe   
if (!isset($_SESSION['usuario'])) {
    // header('Location: ../index.php');
    // exit;
     die("Error - debe <a href='..\..\index.php'>identificarse</a>.<br/>");
}

echo "bienvendo al frond :P";
?>