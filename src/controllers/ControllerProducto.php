<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Producto;
use Profesor\ProyecFin\models\Familia;

class ControllerProducto extends Controller {
    private Producto $proc;
    private Familia $fami;
    public function list(){
        $this->render("listarProductos", Producto::getProductos());
    }

    public function create(){
        $this->render("crearProducto", ['op'=>'Insertar','Familia'=>Familia::getFamilias()]);
    }

    //meee 
     public function save(){
        $this->proc= new Producto($this->get('precio'),$this->get('nombre'),$this->controImg("img"),$this->get('id_familia'),$this->get('descripcion'));
        $this->proc->inserta();
        $this->render("listarProductos", Producto::getProductos());
     }


    public function delete(){

        $this->proc=new Producto($this->get('codigo'),"","","","","");
        $this->proc->delete();
        $this->render("listarProductos", Producto::getProductos());
    }

    public function update(){
        $this->proc= new Producto($this->get('codigo'),null, $this->get('nombre_corto'),$this->get('precio'),$this->get('familia'),$this->get("descripcion"));
        $this->proc->update();
        $this->render("listarProductos", Producto::getProductos());
    }
    
    //ver porque no muestra los productos al actualizar
    public function edit(){
    $this->render("crearProducto", ['op'=>'Actualizar','codigo'=>$this->get('codigo'),
    'nombre_corto'=>$this->get('nombre_corto'),'precio'=>$this->get('precio'),'familia' => $this->get('familia'),
    'descripcion'=> $this->get('descripcion')]);
    }


    public function getStock(){
        $this->render("listarStock", Stock::getStocks());        

    }


}

?>