<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Cuenta;
use Profesor\ProyecFin\models\Familia;
use Profesor\ProyecFin\models\Mesa;
use Profesor\ProyecFin\models\Producto;
use Profesor\ProyecFin\models\PantallaCuenta;

class TPV extends Controller{
    private PantallaCuenta $cuenta;
    private Cuenta $cuenta2;

    public function __construct(){
        parent::__construct();
        $this->cuenta2=new Cuenta(0,0,0);
    }

    public function showMesas(){
        $this->renderFr("elegirMesas", Mesa::getMesas());
    }

    public function mostrarProc(){
        if($this->get('id_familia')==null){
            $this->renderFr("vistaFrontend",['familia'=>Familia::getFamilias(),'producto'=>Producto::verProductos(1),"cuenta"=>$this->cuenta2]);
        }else{
            $this->renderFr("vistaFrontend",['familia'=>Familia::getFamilias(),'producto'=>Producto::verProductos($this->get('id_familia')),"cuenta"=>$this->cuenta2]);
        }
    }

    public function showBackend(){
        $this->renderBa("menudesplegable",null);
    }

    public function addProductoPantalla(){
        $this->cuenta2=new Cuenta($this->get('producto'),$this->get('num_mesa'));
        if($this->cuenta2->esta()){
            $this->cuenta2->update();
        }else{
            $this->cuenta2->insert();
        }
    }

    public function quitarCuenta($mesa){
        $this->cuenta2->quitar($this->get('id_producto'),$mesa);
        $this->mostrarProc();
    }

    public function buyCuenta(){
        $this->renderFr("cuenta",["cuenta"=>$this->cuenta]);
    }

    public function closeSesion(){
        session_destroy();
        //header("Location: ./views/frontend/login.php");
        // $this->renderFr("logoff",[""]);
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

