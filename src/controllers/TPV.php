<?php
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Cuenta;
use Profesor\ProyecFin\models\Familia;
use Profesor\ProyecFin\models\Linea_ticket;
use Profesor\ProyecFin\models\Mesa;
use Profesor\ProyecFin\models\Producto;
use Profesor\ProyecFin\models\Ticket;
use Dompdf\Dompdf;
use Dompdf\Options;

class TPV extends Controller{
    private Cuenta $cuenta;
    private Ticket $ticket;
    private Linea_ticket $lineaTicket;
    public Producto $produc;

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
        $this->renderBa("abrir_caja",["op"=>"Insertar"]);
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

    public function payCuenta(){
        $this->ticket=new Ticket(date("y/m/d"),date("G:i"),$this->get('mesa'));
        $this->ticket->insert();
        foreach($this->cuenta->getCuenta($this->get('mesa')) as $producto){
            $this->lineaTicket=new Linea_ticket($producto->unidades,$this->ticket->getUltimoId(),$producto->id_producto);
            $this->lineaTicket->insert();
        }
        $this->generarPDF(["ticket"=>$this->ticket,"linea_ticket"=>Linea_ticket::getLineaTicket($this->ticket->getUltimoId())]);
        $this->cuenta->cancelar($this->get('mesa'));
        $this->showMesas();
    }

    private function generarPDF($datos){
        require_once 'dompdf/autoload.inc.php';
        // reference the Dompdf namespace
        

        //esto es para porder ver la imagen remota en el pdf
        $options = new Options();
        $options->set('isRemoteEnabled',TRUE);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf($options);
        $estilos="<style>
        * {
            font-size: 20px;
            font-family: 'Times New Roman';
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        td.producto,
        th.producto {
            width: 220px;
        }
        td.cantidad,
        th.cantidad {
            word-break: break-all;
        }
        td.precio,
        th.precio {
            word-break: break-all;
        }
        .centrado {
            text-align: center;
            align-content: center;
        }
        img {
            max-width: 220px;
            width: inherit;
        }
        </style>";
        $cuerpo='<div style="text-align:center;">
        <img src="./img/ticket.jpg" alt="Logotipo">
        <p class="centrado">TICKET DE VENTA
            <br>Ribera De Los Molinos
            <br> Fecha:'.$datos['ticket']->fecha." ".$datos['ticket']->hora.'
            <br> Mesa:'.$datos['ticket']->num_mesa.'
            <br> ID Ticket:'.$datos['ticket']->getUltimoId().'</p>
        <table align="center">
            <thead>
                <tr>
                    <th class="cantidad">CANTIDAD</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">$$</th>
                </tr>
            </thead>
            <tbody>';
        $total=0;
        foreach ($datos['linea_ticket'] as $line) {
            $pro=Producto::getProducto($line->id_producto);
            $cuerpo.="<tr><td class='cantidad'>".$line->cantidad."</td>
            <td class='producto'>".$pro->nombre."</td>
            <td class='precio'>".$pro->precio."€ c/u</td>
            </tr>";
            $total+=$line->cantidad*$pro->precio;
        }          

        $cuerpo.='<tr><td class="cantidad"></td> <td class="producto">TOTAL</td><td class="precio">'.$total.'€</td></tr>
        </tbody>
            </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
            <br><a href="https://www.riberamolinos.es/">Web Ribera Molinos</a></p>
        </div>';


        $dompdf->loadHtml($estilos."".$cuerpo);

        // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
            }

}

?>

