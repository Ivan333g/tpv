<?php

namespace Profesor\ProyecFin\models;

use Profesor\ProyecFin\config\Constantes;
use Profesor\ProyecFin\lib\Model;

class Producto extends Model{

    public $id_producto;
    public float $precio;
    public $descripcion;
    public $id_familia;
    public $nombre;
    public $img;
    public $unidades;

    public function __construct($precio,$nombre,$img,$id_familia,$descripcion, $id_producto=null,$unidades=1)
    {
        $this->id_producto = $id_producto;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->id_familia = $id_familia;
        $this->nombre = $nombre;
        $this->img = $img;
        $this->unidades = $unidades;
    }

    public static function getProductos(){
        $productos = [];
        $datos = self::query("SELECT id_producto,precio,descripcion,id_familia,nombre,img FROM productos");
        while ($p = $datos->fetch()) {
            $productos[] = new Producto($p['precio'], $p['nombre'], $p['img'], $p['id_familia'], $p['descripcion'],$p['id_producto']);
        }
        return $productos;
    }

    public static function getProducto($codigo){
        $query = self::prepare("SELECT id_producto,precio,descripcion,id_familia,nombre,img FROM productos WHERE id_producto= :id_producto");
        $query->execute(['id_producto' => $codigo]);
        $p = $query->fetch();
        return ($p) ? new Producto($p['precio'], $p['nombre'], $p['img'], $p['id_familia'], $p['descripcion'],$p['id_producto']) : null;
    }

    public function buscarDatos($codigo){
        $query = self::prepare("SELECT id_producto,precio,descripcion,id_familia,nombre,img FROM productos WHERE id_producto= :id_producto");
        $query->execute(['id_producto' => $codigo]);
        $p = $query->fetch();
        return ($p) ? new Producto($p['precio'], $p['nombre'], $p['img'], $p['id_familia'], $p['descripcion'],$p['id_producto']) : null;
    }

    public static function buscarProducto($nom){
        $productos = [];
        $datos = self::query("SELECT id_producto,precio,descripcion,id_familia,nombre,img FROM productos where nombre like '%$nom%'");
        while ($p = $datos->fetch()) {
            $productos[] = new Producto($p['precio'], $p['nombre'], $p['img'], $p['id_familia'], $p['descripcion'],$p['id_producto']);
        }
        return $productos;
    }

    //mi funcion inserta 
    public function inserta(){
        echo $this->precio;
        $query = $this->prepare('INSERT INTO productos (id_producto,precio,descripcion,id_familia,nombre,img) VALUES (:id_producto,:precio,:descripcion,:id_familia,:nombre,:img)');
        $query->execute(['id_producto'=>$this->id_producto,'precio'=>$this->precio,
        'descripcion'=>$this->descripcion,'id_familia'=>$this->id_familia, 'nombre'=>$this->nombre,'img'=>$this->img]);
        
    }
    //eliminar producto
    public function delete(){
        //podria ser solo una funcion en el controlodor de lib
        unlink($_SERVER['DOCUMENT_ROOT'].Constantes::$RUTAIMG.$this->img);
        $query = $this->prepare('DELETE FROM productos WHERE id_producto=:id_producto');
        $query->execute(['id_producto'=>$this->id_producto]);
    }
    //actualiza el producto en la base de datos
    public function update(){
        $query = $this->prepare('UPDATE productos SET precio=:precio, descripcion=:descripcion, nombre=:nombre, id_familia=:id_familia,img=:img WHERE id_producto=:id_producto');
        $query->execute(['id_producto'=>$this->id_producto,
        'precio'=>$this->precio,'descripcion'=>$this->descripcion,'nombre'=>$this->nombre,'id_familia'=>$this->id_familia,'img'=>$this->img]);
    }

    public static function verProductos($id_familia){
        $proc=[];
        $datos = self::query("SELECT id_producto,precio,descripcion,productos.id_familia,productos.nombre,productos.img
        from familias INNER join productos
        where familias.id_familia=$id_familia and productos.id_familia=$id_familia" );
        while ($p = $datos->fetch()) {
            $proc[] = new Producto($p['precio'], $p['nombre'],$p['img'],$p['id_familia'], $p['descripcion'],$p['id_producto']);
           
        }
        
        return $proc;
    }
}
?>