<?php
use Profesor\ProyecFin\controllers\Login;
use Profesor\ProyecFin\controllers\TPV;

require 'vendor/autoload.php';

//de tienda mvc
session_start();
$tpv=new TPV();
$login = new Login();
//comprobamos si esta la seccion abierta y tiene una accion
if (isset($_REQUEST['action'])) {
    $op = $_REQUEST['action'];
    if (isset($_REQUEST['tabla'])) {
        $clase = "Profesor\ProyecFin\controllers\Controller" . $_REQUEST['tabla'];
        $crud = new $clase();
    }
    switch ($op) {
        //si le da al boton de logearse comprobaremos el usuario
        case 'Login':
            $login->checkUser();
            break;
        //listara los ya sea las familias o los porductos
        case 'Listar':
            $crud->list();
            break;
        //creara ya sea las familias o los porductos
        case 'Crear':
            $crud->create();
            break;
        //insertara ala base de datos los datos enviados
        case 'Insertar':
            $crud->save();
            break;
        //eliminar usuario de la base de datos
        case 'Eliminar':
            $crud->delete();
            break;
        //lleva a la pantalla de editar usuario
        case 'Editar':
            $crud->edit();
            break;
        //usa los datos para actualizar
        case 'Actualizar':
            $crud->update();
            break;
        //muestra los productos de la familia seccionada
        case 'VerProductos':
            $tpv->mostrarProc();
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