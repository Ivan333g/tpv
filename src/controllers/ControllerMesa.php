<?php

namespace Profesor\ProyecFin\controllers;

use PDOException;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Mesa;

class ControllerMesa extends Controller  {
    private Mesa $mesa;

    public function list(){
        $this->renderBa("listarMesas", Mesa::getMesas());
    }

    public function create(){
        $this->renderBa("crearMesa", ['op'=>'Insertar']);
    }

    public function save(){
        try {
            $this->mesa= new Mesa($this->get('num_mesa'), $this->get('tipo'));
            $this->mesa->insert();
            $this->renderBa("listarMesas", Mesa::getMesas());
        } catch (PDOException $th) {
            $this->renderBa("crearMesa", ['op'=>'Insertar','error'=>'Nombre ya en uso']);
        }
    }
    
    public function delete(){
        $this->mesa=new Mesa($this->get('num_mesa')," ");
        $this->mesa->deleteMe();
        $this->renderBa("listarMesas", Mesa::getMesas());
    }

    public function edit(){
        $this->renderBa("crearMesa", ['op'=>'Actualizar','num_mesa'=>$this->get('num_mesa'),'tipo'=>$this->get('tipo')]);
    } 

    public function update(){
        $this->mesa= new Mesa($this->get('num_mesa'),$this->get('tipo'));
        //le envio el id anterior para que no se confunda con el nuevo id
        $this->mesa->update($this->get('old_num'));
        $this->renderBa("listarMesas", Mesa::getMesas());
    }
       
}
