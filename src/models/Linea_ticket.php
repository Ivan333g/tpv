<?php

namespace Profesor\ProyecFin\models;

use Profesor\ProyecFin\config\Constantes;
use Profesor\ProyecFin\lib\Model;

class Linea_ticket extends Model{
    public $id_linea_ticket;
    public $cantidad;
    public $id_ticket;
    public $id_producto;

    public function __construct($cantidad,$id_ticket,$id_producto,$id_linea_ticket=null){
        $this->id_linea_ticket = $id_linea_ticket;
        $this->cantidad = $cantidad;
        $this->id_ticket = $id_ticket;
        $this->id_producto = $id_producto;
    }

    public static function getLineaTicket($id){
        $lineas_ticket=[];
        $datos = self::query("SELECT id_linea_ticket,cantidad,id_ticket,id_producto FROM lineas_ticket WHERE id_ticket=$id");
        while ($p = $datos->fetch()) {
            $lineas_ticket[] = new Linea_ticket($p['cantidad'], $p['id_ticket'],$p['id_producto'],$p['id_linea_ticket']);
        }
        return $lineas_ticket;

    }
    //insertar ticket
    public function insert(){
        $query = $this->prepare('INSERT INTO lineas_ticket (id_linea_ticket,cantidad,id_ticket,id_producto) VALUES (:id_linea_ticket, :cantidad,:id_ticket,:id_producto)');
        $query->execute(['id_linea_ticket'=>$this->id_linea_ticket,'cantidad'=>$this->cantidad,'id_ticket'=>$this->id_ticket,'id_producto'=>$this->id_producto]);
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $valor)
    {
        $this->$prop = $valor;
    }
}

?>