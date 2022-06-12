<?php

namespace Profesor\ProyecFin\controllers;

use Profesor\ProyecFin\lib\Controller;
use Profesor\ProyecFin\models\Linea_ticket;
use Profesor\ProyecFin\models\Ticket;

class ControllerTicket extends Controller  {
    private Ticket $ticket;
    private Linea_ticket $linea_ticket;

    public function __construct(){
        parent::__construct();
        $this->linea_ticket=new Linea_ticket(null,null,null);
    }
    

    public function list(){
        $this->renderBa("listarTickets", ["ticket"=>Ticket::getTickets(),"linea_ticket"=>$this->linea_ticket]);
    }
    
}