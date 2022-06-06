<?php
namespace Profesor\ProyecFin\lib;
class View{
    public $datos;
    public function renderFr($name, $data=[]){
        $this->datos=$data;
        require 'src/views/frontend/'.$name. '.php';
    }
    public function renderBa($name, $data=[]){
        $this->datos=$data;
        require 'src/views/backend/'.$name. '.php';
    }
}

?>