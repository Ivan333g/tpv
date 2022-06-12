<?php

namespace Profesor\ProyecFin\models;
use Profesor\ProyecFin\lib\Model;

class Ticket extends Model{
    public $id_ticket;
    public $fecha;
    public $hora;
    public $num_mesa;

    public function __construct($fecha,$hora,$num_mesa,$id_ticket=null){
        $this->id_ticket = $id_ticket;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->num_mesa = $num_mesa;
    }

    public static function getTickets(){
        $tickets = [];
        $datos = self::query("SELECT id_ticket, fecha,hora,num_mesa FROM tickets");
        while ($p = $datos->fetch()) {
            $tickets[] = new Ticket($p['fecha'],$p['hora'],  $p['num_mesa'],$p['id_ticket']);
        }
        return $tickets;
    }
    //retorna el ultimo id registrado
    public function getUltimoId(){
        $query = self::query("SELECT max(id_ticket) as id_ticket FROM tickets");
        $p = $query->fetch();

        return ($p) ? $p['id_ticket'] : null;
    }
    //insertar ticket
    public function insert(){
        $query = $this->prepare('INSERT INTO tickets (id_ticket,fecha,hora,num_mesa) VALUES (:id_ticket, :fecha,:hora,:num_mesa)');
        $query->execute(['id_ticket'=>$this->id_ticket,'fecha'=>$this->fecha,'hora'=>$this->hora,'num_mesa'=>$this->num_mesa]);
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