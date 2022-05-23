<?php

namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Familia;

class ControllerFamilia extends Controller  {
    private Familia $familia;

    public function list(){
        $this->render("listarFamilias", Familia::getFamilias());
    }

    public function create(){
        $this->render("crearFamilia", ['op'=>'Insertar']);
    }

    public function save(){
        $this->familia= new Familia($this->get('nombre'), $this->controImg('img'));
        $this->familia->insert();
        $this->render("listarFamilias", Familia::getFamilias());
    }
    
    public function delete(){
        $this->familia=new Familia($this->get('codigo'),"");
        $this->familia->delete();
        $this->render("listarFamilias", Familia::getFamilias());
    }
    public function update(){
        $this->familia= new Familia($this->get('codigo'), $this->get('nombre'));
        $this->familia->update();
        $this->render("listarFamilias", Familia::getFamilias());
    }
    public function edit(){
        $this->render("crearFamilia", ['op'=>'Actualizar','codigo'=>$this->get('codigo'),'nombre'=>$this->get('nombre')]);

    }    
}
