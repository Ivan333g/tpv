<?php

namespace Profesor\ProyecFin\models;
use Profesor\ProyecFin\lib\Model;

class Cierre_caja extends Model{
    public $id_cierre;
    public $fecha;
    public $abrir;
    public $cierre;

    public function __construct($fecha,$abrir,$cierre=null,$id_cierre=null){
        $this->id_cierre = $id_cierre;
        $this->fecha = $fecha;
        $this->abrir = $abrir;
        $this->cierre = $cierre;
        
    }

    public static function getCierres(){
        $cierres = [];
        $datos = self::query("SELECT id_cierre, fecha,abrir,cierre FROM cierres_caja");
        while ($p = $datos->fetch()) {
            $cierres[] = new Cierre_caja($p['fecha'],$p['abrir'], $p['cierre'],$p['id_cierre']);
        }
        return $cierres;
    }

    public function insert(){
        $query = $this->prepare('INSERT INTO cierres_caja (id_cierre,fecha,abrir,cierre) VALUES (:id_cierre, :fecha,:abrir,:cierre)');
        $query->execute(['id_cierre'=>$this->id_cierre,'fecha'=>$this->fecha,'abrir'=>$this->abrir,'cierre'=>$this->cierre]);
    }

    private function ultimoCierre(){
        $query = self::query("SELECT max(id_cierre) as id_cierre FROM cierres_caja");
        $p = $query->fetch();
        return ($p) ? $p['id_cierre'] : null;
    }

    public function update(){
        $query = $this->prepare('UPDATE cierres_caja SET cierre=:cierre WHERE id_cierre=:id_cierre');
        $query->execute(['cierre'=>$this->cierre,"id_cierre"=>$this->ultimoCierre()]);  
    }
    public function updateId(){
        $query = $this->prepare('UPDATE cierres_caja SET cierre=:cierre WHERE id_cierre=:id_cierre');
        $query->execute(['cierre'=>$this->cierre,"id_cierre"=>$this->id_cierre]);  
    }

    public static function buscarCierre($fecha){
        $cierres = [];
        $datos = self::query("SELECT id_cierre, fecha,abrir,cierre FROM cierres_caja where fecha='$fecha'");
        while ($p = $datos->fetch()) {
            $cierres[] = new Cierre_caja($p['fecha'],$p['abrir'], $p['cierre'],$p['id_cierre']);
        }
        return $cierres;
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