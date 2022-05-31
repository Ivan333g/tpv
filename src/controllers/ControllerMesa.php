<?php

namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Mesa;

class ControllerMesa extends Controller  {
    private Mesa $mesa;

    public function list(){
        $this->render("listarMesas", Mesa::getMesas());
    }

    public function create(){
        $this->render("crearMesa", ['op'=>'Insertar']);
    }

    public function save(){
        $this->mesa= new Mesa($this->get('num_mesa'), $this->get('tipo'));
        $this->mesa->insert();
        $this->render("listarMesas", Mesa::getMesas());
    }
    
    public function delete(){
        $this->mesa=new Mesa($this->get('num_mesa')," ");
        $this->mesa->deleteMe();
        $this->render("listarMesas", Mesa::getMesas());
    }

    public function edit(){
        $this->render("crearMesa", ['op'=>'Actualizar','num_mesa'=>$this->get('num_mesa'),'tipo'=>$this->get('tipo')]);
    } 

    public function update(){
        $this->mesa= new Mesa($this->get('num_mesa'),$this->get('tipo'));
        //le envio el id anterior para que no se confunda con el nuevo id
        $this->mesa->update($this->get('old_num'));
        $this->render("listarMesas", Mesa::getMesas());
    }
       
}
