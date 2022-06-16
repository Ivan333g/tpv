<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Cierre_caja;
use Profesor\ProyecFin\models\Ticket;

class ControllerCierre_caja extends Controller  {
    private Cierre_caja $cierre_caja;

    public function create(){
        $this->renderBa("abrir_caja",['op'=>'Insertar']);
    }

    public function save(){
        $this->cierre_caja= new Cierre_caja(date("y/m/d"),$this->get('abrir'));
        $this->cierre_caja->insert();
        $this->renderBa("listarCierre_caja", Cierre_caja::getCierres());
    }
    
    public function list(){
        $this->renderBa("listarCierre_caja", Cierre_caja::getCierres());
    }

    public function edit(){
        $this->renderBa("abrir_caja", ['op'=>'Actualizar',"id_cierre"=>$this->get("id_cierre")]);
    } 

    public function buscarPorNombre(){
        $this->renderBa("listarCierre_caja",Cierre_caja::buscarCierre($this->get('fecha')));
    }

    public function update(){
        if($this->get("id_cierre")==null){
            $this->cierre_caja= new Cierre_caja("","",$this->get('abrir'));
            $this->cierre_caja->update();
        }else{
            $this->cierre_caja= new Cierre_caja("","",$this->get('abrir'),$this->get("id_cierre"));
            $this->cierre_caja->updateID();
        }
        
        $this->renderBa("listarCierre_caja", Cierre_caja::getCierres());
    }


}