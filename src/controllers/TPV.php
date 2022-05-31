<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Familia;
use Profesor\ProyecFin\models\Producto;
use Profesor\ProyecFin\models\PantallaCuenta;

class TPV extends Controller{
    private PantallaCuenta $cuenta;

    public function __construct(){
        parent::__construct();
        $this->cuenta=PantallaCuenta::loadCuenta();
    }

    public function showFrontend(){
        $this->render("vistaFrontend",['familia'=>Familia::getFamilias(),'producto'=>Producto::verProductos(1),"cuenta"=>$this->cuenta]);
    }
//recordatorio: unir estas dos vistas a una solo que no se que nombre ponerle
    public function mostrarProc(){
        $this->render("vistaFrontend",['familia'=>Familia::getFamilias(),'producto'=>Producto::verProductos($this->get('id_familia')),"cuenta"=>$this->cuenta]);
    }

    public function showBackend(){

        $this->render("menudesplegable",null);
    }

    public function addProductoPantalla(){
        $id = $this->get("producto");
        $this->cuenta->addProducto($id);
        $this->cuenta->saveCuenta();
    }

    public function quitarCuenta(){
        $this->cuenta->quitar($this->get('id_producto'));
        $this->mostrarProc();
    }

    public function buyCuenta(){
        $this->render("crearMesa",["cuenta"=>$this->cuenta]);
    }
     //mee 
    //terminar la parte del render
    public function payCesta(){
        if(Usuario::enviarRecibo($_SESSION['usuario'],$this->cesta)){
            $this->render("pagar",["error"=>"se le envio una factura al correo"]);
        }else{
            echo "error al enviar factura";
        }
    }

}

?>

