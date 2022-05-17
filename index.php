<?php
require 'vendor/autoload.php';

use Profesor\ProyecFin\controladores\Login;

//de tienda mvc
session_start();
$login = new Login();


if (isset($_REQUEST['action'])) {
    $op = $_REQUEST['action'];
   
    switch ($op) {
        case 'Entrar':
            $login->checkUser();
            break;
        default:
            $login->showLogin();
    }
} else {
    $login->showLogin();
}

?>