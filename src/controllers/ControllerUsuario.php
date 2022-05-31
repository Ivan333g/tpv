<?php

namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Usuario;

class ControllerUsuario extends Controller  {
    private Usuario $usuario;

    public function list(){
        $this->render("listarUsuarios", Usuario::getUsuarios());
    }

    public function create(){
        $this->render("crearUsuario", ['op'=>'Insertar']);
    }

    public function save(){
        $this->usuario= new Usuario($this->get('nombre'), md5($this->get('password')),$this->get('rol'));
        $this->usuario->insert();
        $this->render("listarUsuarios", Usuario::getUsuarios());
    }
    
    public function delete(){
        $this->usuario=new Usuario("","","",$this->get('id_usuario'));
        $this->usuario->deleteUsu();
        $this->render("listarUsuarios", Usuario::getUsuarios());
    }

    public function edit(){
        $this->render("crearUsuario", ['op'=>'Actualizar','id_usuario'=>$this->get('id_usuario'),'nombre'=>$this->get('nombre'),'rol'=>$this->get('rol')]);
    } 

    public function update(){
        $this->usuario= new Usuario($this->get('nombre'), md5($this->get('password')),$this->get('rol'),$this->get('id_usuario'));
        $this->usuario->update();
        $this->render("listarUsuarios", Usuario::getUsuarios());
    }
       
}