<?php
namespace Profesor\ProyecFin\controllers;

use PDOException;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Producto;
use Profesor\ProyecFin\models\Familia;

class ControllerProducto extends Controller {
    private Producto $proc;
    public function list(){
        $this->renderBa("listarProductos", Producto::getProductos());
    }

    public function create(){
        $this->renderBa("crearProducto", ['op'=>'Insertar','Familia'=>Familia::getFamilias()]);
    }

    public function buscarPorNombre(){
        $this->renderBa("listarProductos", Producto::buscarProducto($this->get('nombre')));
    }
    //meee 
     public function save(){
        try {
            $this->proc= new Producto((float)$this->get('precio'),$this->get('nombre'),$this->controImg("img"),$this->get('id_familia'),$this->get('descripcion'));
            $this->proc->inserta();
            $this->renderBa("listarProductos", Producto::getProductos());
        } catch (PDOException $th) {
            $this->renderBa("crearProducto", ['op'=>'Insertar','error'=>'Nombre ya en uso','Familia'=>Familia::getFamilias()]);
        }
     }


    public function delete(){
        $this->proc=new Producto(0,"",$this->get('img'),"","",$this->get('id_producto'));
        $this->proc->delete();
        $this->renderBa("listarProductos", Producto::getProductos());
    }

    //lleva a la pantalla para editar
    public function edit(){
        $this->renderBa("crearProducto", ['op'=>'Actualizar','precio'=>$this->get('precio'),
        'nombre'=>$this->get('nombre'),'id_familia' => $this->get('id_familia'),
        'descripcion'=> $this->get('descripcion'),'id_producto'=>$this->get('id_producto'),'Familia'=>Familia::getFamilias()]);
    }

    public function update(){
        $this->proc= new Producto($this->get('precio'),$this->get('nombre'),$this->controImg("img"),$this->get('id_familia'),$this->get("descripcion"),$this->get('id_producto'));
        $this->proc->update();
        $this->renderBa("listarProductos", Producto::getProductos());
    }

}

?>