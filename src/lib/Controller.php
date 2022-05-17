<?php
namespace Profesor\ProyecFin\lib;


class Controller{
    private View $view;

    public function __construct(){
        $this->view = new View();

    }

    public function render(string $name, $data){
        $this->view->render($name,$data);
    }

    //este metodo solo comprueba si el get o post enviado no esta vacio
    protected function get($param){
        if (!isset($_REQUEST[$param])){
            error_log("No existe el parametro $param");
            return NULL;
        }
        return $_REQUEST[$param];
    }

}
?>