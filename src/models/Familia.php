<?php

namespace Profesor\ProyecFin\models;

use Profesor\ProyecFin\config\Constantes;
use Profesor\ProyecFin\lib\Model;

class Familia extends Model{
    public $id_familia;
    public $nombre;
    public $img;

    public function __construct($nombre,$img, $id_familia=null){
        $this->id_familia = $id_familia;
        $this->nombre = $nombre;
        $this->img = $img;
    }

    public static function getFamilias(){
        $familias = [];
        $datos = self::query("SELECT id_familia, nombre,img FROM familias");
        while ($p = $datos->fetch()) {
            $familias[] = new Familia($p['nombre'],$p['img'],  $p['id_familia']);
        }
        return $familias;
    }
    public static function getFamilia($id){
        $query = self::prepare("SELECT id_familia,nombre FROM familias WHERE id_familia= :id_familia");
        $query->execute(['id_familia' => $id]);
        $p = $query->fetch();

        return ($p) ? new Familia($p['id_familia'], $p['nombre']) : null;
    }

    public function insert(){
        $query = $this->prepare('INSERT INTO familias (nombre,img) VALUES (:nombre, :img)');
        $query->execute(['nombre'=>$this->nombre,
       'img'=>$this->img]);
    }
    public function deleteFami(){
        unlink($_SERVER['DOCUMENT_ROOT'].Constantes::$RUTAIMG.$this->img);
        $query = $this->prepare('DELETE FROM familias WHERE id_familia= :id_familia');
        $query->execute(['id_familia'=>$this->id_familia]);
    }
    public function update(){
        $query = $this->prepare('UPDATE familias SET nombre=:nombre, img=:img WHERE id_familia=:id_familia');
        $query->execute(['id_familia'=>$this->id_familia,
         'nombre'=>$this->nombre,'img'=>$this->img]);  
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