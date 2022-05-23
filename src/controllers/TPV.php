<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Familia;
use Profesor\ProyecFin\models\Producto;

class TPV extends Controller{

    public function showFrontend(){

        $this->render("vistaFrontend",Familia::getFamilias());
    }

    public function showBackend(){

        $this->render("menudesplegable",null);
    }
}

?>