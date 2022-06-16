<?php
namespace Profesor\ProyecFin\lib;
use Profesor\ProyecFin\config\Constantes;

class Controller{
    private View $view;

    public function __construct(){
        $this->view = new View();

    }
    //funcion para las vistas de la parte frond
    public function renderFr(string $name, $data){
        $this->view->renderFr($name,$data);
    }
    //funcion para las vistas de la parte back
    public function renderBa(string $name, $data){
        $this->view->renderBa($name,$data);
    }

    //este metodo solo comprueba si el get o post enviado no esta vacio
    protected function get($param){
        if (!isset($_REQUEST[$param])){
            error_log("No existe el parametro $param");
            return null;
        }
        return $_REQUEST[$param];
    }

    //metodo para controlar el tamaño y que el fichero sea una imagen 
    //devolvera el nombre de la imagen si todo esta correcto
    protected function controImg($param){
        if (!isset($_FILES[$param])){
            error_log("No existe el parametro $param");
            return NULL;
        }
        $nombreImagen=$_FILES[$param]['name'];
        $tipoImagen=$_FILES[$param]['type'];
        $tamanoImagen=$_FILES[$param]['size'];

        //1 mega
        if($tamanoImagen<=1000000){
            if($tipoImagen=="image/jpeg" || $tipoImagen=="image/jpg" || $tipoImagen=="image/png"){
                //ruta de la carpeta
                $carpetaDestino=$_SERVER['DOCUMENT_ROOT'].Constantes::$RUTAIMG;
                //movemos la imagen del direcctorio temporal al direcctorio escogido
                move_uploaded_file($_FILES[$param]['tmp_name'],$carpetaDestino.$nombreImagen);
                return $nombreImagen;
            }else{
                error_log("el tipo de imagen debe ser .jpg/.jpeg/.png $param");
                return NULL;
            }
        }else{
            error_log("el tamaño de la imagen debe ser menor $param");
            return NULL;
        }

    }

}


// $rutaFin=$carpetaDestino;
// if(!file_exists($rutaFin)){
//     //movemos la imagen del direcctorio temporal al direcctorio escogido
//     move_uploaded_file($_FILES[$param]['tmp_name'],$rutaFin);
//     return $nombreImagen;
// }else{
//     error_log("el nombre de la imagen ya existe");
//     return NULL;
// }
?>