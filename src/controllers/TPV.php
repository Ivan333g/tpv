<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;

class TPV extends Controller{

    public function showFrontend(){

        $this->render("vistaFrontend",null);
    }

    public function showBackend(){

        $this->render("vistaBackend",null);
    }
}

?>