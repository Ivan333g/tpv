<?php

namespace Profesor\ProyecFin\models;

use Profesor\ProyecFin\lib\Model;

class Producto extends Model{

    public $id_producto;
    public $precio;
    public $descripcion;
    public $id_familia;
    public $nombre;
    public $img;
    
    public $unidades;

    public function __construct($precio,$nombre,$img,$id_familia,$descripcion, $id_producto=null)
    {
        $this->id_producto = $id_producto;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->id_familia = $id_familia;
        $this->nombre = $nombre;
        $this->img = $img;
        $this->unidades = 1;
    }

    public static function getProductos(){
        $productos = [];
        $datos = self::query("SELECT id_producto,precio,descripcion,id_familia,nombre,img FROM productos");
        while ($p = $datos->fetch()) {
            $productos[] = new Producto($p['precio'], $p['nombre'], $p['img'], $p['id_familia'], $p['id_producto'],$p['descripcion']);
        }
        return $productos;
    }
    //rebisar estos metodos
    public static function getProducto($codigo){
        $query = self::prepare("SELECT id_producto,precio,descripcion,id_familia,nombre,img FROM productos WHERE id_producto= :id_producto");
        $query->execute(['id_producto' => $codigo]);
        $p = $query->fetch();
        return ($p) ? new Producto($p['precio'], $p['nombre'], $p['img'], $p['id_familia'], $p['id_producto'],$p['descripcion']) : null;
    }

    //mi funcion inserta ojear revisar las tablas
    public function inserta(){
        $query = $this->prepare('INSERT INTO productos (id_producto,precio,descripcion,id_familia,nombre,img) VALUES (:id_producto,:precio,:descripcion,:id_familia,:nombre,:img)');
        $query->execute(['id_producto'=>$this->id_producto,'precio'=>$this->precio,
        'descripcion'=>$this->descripcion,'id_familia'=>$this->id_familia, 'nombre'=>$this->nombre,'img'=>$this->img]);
    }
    //actualizar copiada (ponerla para productos)
    public function actualiza(){
        $datos=array("nombre"=>$this->nombre, "telefono"=>$this->telefono);
        $resultado=self::setDatosWS("contactos",json_encode($datos),"PUT",$this->codigo);
        
    }

//     public function __get($prop){
//         return $this->$prop;
//     }
//     public function __set($prop, $valor){
//         $this->$prop = $valor;
//     }
}


?>