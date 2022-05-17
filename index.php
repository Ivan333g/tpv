<?php
use Profesor\ProyecFin\controllers\Login;
require 'vendor/autoload.php';

//de tienda mvc
session_start();
$login = new Login();
//comprobamos si esta la seccion abierta y tiene una accion
if (isset($_REQUEST['action'])) {
    $op = $_REQUEST['action'];
    switch ($op) {
        //si le da al boton de logearse comprobaremos el usuario
        case 'Login':
            $login->checkUser();
            break;
        //si no tiene accion le montrara para logearse
        default:
            $login->showLogin();
    }
} else {
//si no lo mandamos al login
    $login->showLogin();
}

?>