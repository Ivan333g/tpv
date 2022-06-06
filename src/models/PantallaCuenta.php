<?php
namespace Profesor\ProyecFin\models;
use Profesor\ProyecFin\lib\Model;

class PantallaCuenta extends Model{
    protected  $productos = [];
    private $coste;


    // public function addProducto($codigo){
    // //me
    //     if (empty($this->productos)) {
    //         $this->productos[] = Producto::getProducto($codigo);
    //     }else{
    //         $esta=false;
    //         foreach ($this->productos as $prod){ 
    //             if ($prod->id_producto==$codigo) {              
    //                 $prod->unidades++;   
    //                 $esta=true;             
    //             }
    //         }
    //         if (!$esta) {
    //             $this->productos[] = Producto::getProducto($codigo);
    //         }
    //     }
    //     // $this->productos[] = Producto::getProducto($codigo);
    // }

    // public function getProductos(){
    //     return $this->productos;
    // }

    // public function getCoste(){
    //     $coste= 0;
    //      foreach ($this->productos as $p)
    //          $coste += $p->precio*$p->unidades;
    //     return $coste;
    // }

    // public function isEmpty(){
    //     if (count($this->productos) == 0)
    //         return true;
    //     return false;
    // }

    public function quitar($id){
        //probar con if cuando cree la tabla cuenta
        $this->productos = [];
        if (isset($_SESSION['cuenta'])) {
            unset($_SESSION['cuenta']);
        }
    }
    // public function saveCuenta(){
    //     $_SESSION['cuenta'] = serialize($this);
    // }

//listo creo
    // public static function loadCuenta(){
    //     if (!isset($_SESSION['cuenta']))
    //         return new PantallaCuenta();
    //     else
    //         return (unserialize($_SESSION['cuenta']));
    // }
}
