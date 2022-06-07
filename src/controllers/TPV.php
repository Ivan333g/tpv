<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Cuenta;
use Profesor\ProyecFin\models\Familia;
use Profesor\ProyecFin\models\Mesa;
use Profesor\ProyecFin\models\Producto;
use Profesor\ProyecFin\models\PantallaCuenta;

class TPV extends Controller{
    // private PantallaCuenta $cuenta;
    private Cuenta $cuenta;

    public function __construct(){
        parent::__construct();
        $this->cuenta=new Cuenta(0,0,0);
    }

    public function showMesas(){
        $this->renderFr("elegirMesas", ['mesas'=>Mesa::getMesas(),'orden'=>Cuenta::estados()]);
    }

    public function enOrden(){
        Cuenta::enOrden($this->get('mesa'));
    }

    public function mostrarProc(){
        if($this->get('id_familia')==null){
            $this->renderFr("vistaFrontend",['familia'=>Familia::getFamilias(),'producto'=>Producto::verProductos(1),"cuenta"=>$this->cuenta]);
        }else{
            $this->renderFr("vistaFrontend",['familia'=>Familia::getFamilias(),'producto'=>Producto::verProductos($this->get('id_familia')),"cuenta"=>$this->cuenta]);
        }
    }

    public function showBackend(){
        $this->renderBa("menudesplegable",null);
    }

    public function addProductoPantalla(){
        $this->cuenta=new Cuenta($this->get('producto'),$this->get('num_mesa'));
        if($this->cuenta->esta()){
            $this->cuenta->update();
        }else{
            $this->cuenta->insert();
        }
    }

    public function quitarCuenta($mesa){
        $this->cuenta->quitar($this->get('id_producto'),$mesa);
        $this->mostrarProc();
    }

    public function buyCuenta(){
        $this->renderFr("cuenta",["cuenta"=>$this->cuenta]);
    }

    public function cancelar(){
        $this->cuenta->cancelar($this->get('mesa'));
    }

    public function closeSesion(){
        
        $this->renderFr("logoff",["error"=>'']);
    }
     //mee 
    //terminar la parte del render
    // public function payCesta(){
    //     if(Usuario::enviarRecibo($_SESSION['usuario'],$this->cesta)){
    //         $this->render("pagar",["error"=>"se le envio una factura al correo"]);
    //     }else{
    //         echo "error al enviar factura";
    //     }
    // }

}

?>

