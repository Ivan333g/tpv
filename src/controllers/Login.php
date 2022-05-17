<?php 
namespace Profesor\ProyecFin\controllers;
use Profesor\ProyecFin\models\Usuario;
use Profesor\ProyecFin\lib\Controller;

class Login extends Controller{

    //metodo para comprobar que la contraseña y el usuario son correctos sino retorna mensaje de error
    //ademas dependiendo de su rol podra entrar al backend o al frontend
    public function checkUser(){
        $user = $this->get("usuario");
        $pass = $this->get("password");
        if (empty($user) || empty($pass)) {
            $datos = ["error" => "Debes introducir un nombre de usuario y una contraseña"];
        } else {
            //guardamos la respuesta del Usuario
            $estado = Usuario::checkUser($user, $pass,$rol);
            if ($estado == 1) {
                $_SESSION['usuario'] = $user;
                $tpv = new TPV;
                if ($rol == 'admin') {
                    $tpv->showBackend();
                } else {
                    $tpv->showFrontend();
                }
                exit;
            } else {
                $datos = ["error" => "Usuario o contraseña no válidos!"];
            }
        }
        $this->render("login", $datos);
    }

    public function showLogin(){
        $this->render("login", ["error" => ""]);
    }
}
