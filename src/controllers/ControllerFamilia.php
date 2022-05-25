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
        $this->familia=new Familia("",$this->get('img'),$this->get('id_familia'));
        $this->familia->deleteFami();
        $this->render("listarFamilias", Familia::getFamilias());
    }

    public function edit(){
        $this->render("crearFamilia", ['op'=>'Actualizar','id_familia'=>$this->get('id_familia'),'nombre'=>$this->get('nombre')]);
    } 

    public function update(){
        $this->familia= new Familia($this->get('nombre'), $this->controImg('img'),$this->get('id_familia'));
        $this->familia->update();
        $this->render("listarFamilias", Familia::getFamilias());
    }
       
}
