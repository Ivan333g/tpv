<?php

namespace Profesor\ProyecFin\models;
use PDO;
use Profesor\ProyecFin\lib\Model;

class Mesa extends Model{

    private $num_mesa;
    private string $tipo;


    public function __construct($num_mesa,$tipo){
        $this->num_mesa = $num_mesa;
        $this->tipo = $tipo;
    }

    public static function getMesas(){
        $mesas = [];
        $datos = self::query("SELECT num_mesa,tipo FROM mesas");
        while ($p = $datos->fetch()) {
            $mesas[] = new Mesa($p['num_mesa'],$p['tipo']);
        }
        return $mesas;
    }
    public static function getMesa($id){
        $query = self::prepare("SELECT num_mesa,tipo FROM mesas WHERE num_mesa= :num_mesa");
        $query->execute(['num_mesa' => $id]);
        $p = $query->fetch();

        return ($p) ? new Mesa($p['num_mesa'],$p['tipo']) : null;
    }

    public function insert(){
        $query = $this->prepare('INSERT INTO mesas (num_mesa,tipo) VALUES (:num_mesa, :tipo)');
        $query->execute(['num_mesa'=>$this->num_mesa,'tipo'=>$this->tipo]);
    }
    public function deleteMe(){
        $query = $this->prepare('DELETE FROM mesas WHERE num_mesa= :num_mesa');
        $query->execute(['num_mesa'=>$this->num_mesa]);
    }
    public function update($old){
        $query = $this->prepare('UPDATE mesas SET num_mesa=:num_mesa, tipo=:tipo WHERE num_mesa=:old');
        $query->execute(['num_mesa'=>$this->num_mesa,'tipo'=>$this->tipo,'old'=>$old]);
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