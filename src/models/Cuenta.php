<?php

namespace Profesor\ProyecFin\models;

use Profesor\ProyecFin\config\Constantes;
use Profesor\ProyecFin\lib\Model;

$produc=[];
class Cuenta extends Model{
    public $id_cuenta;
    public $id_producto;
    public int $num_mesa;
    public int $cantidad;

    public function __construct($id_producto, $num_mesa,$cantidad=1,$id_cuenta=null){
        $this->id_cuenta = $id_cuenta;
        $this->id_producto = $id_producto;
        $this->num_mesa = $num_mesa;
        $this->cantidad = $cantidad;
        
    }

    public function getCuenta($num_mesa){
        
        $datos = self::query("SELECT id_producto,cantidad FROM cuentas WHERE num_mesa=$num_mesa");
        while ($p = $datos->fetch()) {
            $id=$p['id_producto'];
            $can=$p['cantidad'];
            $datos2=self::query("SELECT * FROM productos WHERE id_producto=$id");
            while ($p2 = $datos2->fetch()) {
                $produc[]= new Producto($p2['precio'], $p2['nombre'],$p2['img'],$p2['id_familia'],$p2['descripcion'],$p2['id_producto'],$p['cantidad']);
            }
        }
        return $produc;
    }
    //insertara la cuenta en la base de datos guardando la id del producto
    public function insert(){
        $query = $this->prepare('INSERT INTO cuentas (id_producto,num_mesa,cantidad) VALUES (:id_producto, :num_mesa, :cantidad)');
        $query->execute(['id_producto'=>$this->id_producto,'num_mesa'=>$this->num_mesa,'cantidad'=>$this->cantidad]);
    }
    public function deletePro($id,$mesa){
        $query = $this->prepare('DELETE FROM Cuentas WHERE id_producto= :id_producto and num_mesa=:num_mesa');
        $query->execute(['id_producto'=>$id,'num_mesa'=>$mesa]);
    }
    //si el producto ya se encuentra actualizara la base de datos en la cantidad
    public function update(){
        $query = $this->prepare('UPDATE cuentas SET cantidad=cantidad+1 WHERE id_producto=:id_producto and num_mesa=:num_mesa');
        $query->execute(['id_producto'=>$this->id_producto,'num_mesa'=>$this->num_mesa]);
    }
    //comprueba si el producto esta en la bbdd
    public function esta(){
        $query = self::prepare("SELECT * FROM cuentas WHERE id_producto= :id_producto and num_mesa=:num_mesa");
        $query->execute(['id_producto' => $this->id_producto,'num_mesa'=>$this->num_mesa]);
        return $query->fetch();
    }

    public function isEmpty($mesa){
        $query = self::prepare("SELECT * FROM cuentas WHERE num_mesa=:num_mesa");
        $query->execute(['num_mesa'=>$mesa]);
        if ($query->rowcount()>0) {
            return false;
        }
        return true;
    }
    
    public function getCoste($mesa){
        $coste=0;
        $datos = self::query("SELECT id_producto,cantidad FROM cuentas WHERE num_mesa=$mesa");
        while ($p = $datos->fetch()) {
           $id=$p['id_producto'];
           $datos2=self::query("SELECT precio FROM productos WHERE id_producto=$id");
           while ($p2 = $datos2->fetch()) {
                $coste+=$p2['precio']*$p['cantidad'];
            }
        }
        return $coste;
    }

    public function quitar($id,$mesa){
        $datos = self::query("SELECT cantidad FROM cuentas WHERE id_producto=$id and num_mesa=$mesa");
        if($p = $datos->fetchColumn()==1) {
            $this->deletePro($id,$mesa);
        }
        $query = $this->prepare('UPDATE cuentas SET cantidad=cantidad-1 WHERE id_producto=:id_producto and num_mesa=:num_mesa');
        $query->execute(['id_producto'=>$id,'num_mesa'=>$mesa]);
    }

    public static function enOrden($mesa){
        $query = self::query('UPDATE cuentas SET estado=1 WHERE num_mesa='.$mesa);
    }
    public static function estados(){
        $num_mesa=[];
        $datos = self::query('SELECT num_mesa FROM cuentas where estado=1 GROUP by num_mesa');
        while ($p = $datos->fetch()) {
            $num_mesa[]=$p['num_mesa'];
        }
        return $num_mesa;
    }

    public function cancelar($mesa){
        $query = $this->prepare('DELETE FROM cuentas WHERE num_mesa= :num_mesa');
        $query->execute(['num_mesa'=>$mesa]);
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