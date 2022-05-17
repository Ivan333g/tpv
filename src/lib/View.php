<?php
namespace Profesor\ProyecFin\lib;
class View{
    public $datos;
    public function render($name, $data=[]){
        $this->datos=$data;
        require 'src/views/'.$name. '.php';
    }
}

?>