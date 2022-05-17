<?php

namespace Profesor\ProyecFin\models;
use PDO;
use Profesor\ProyecFin\lib\Model;

class Usuario extends Model{

    private int $id_usuario;
    private string $rol;
    private string $password;
    private string $nombre;

    //hacemos llamada a la base de datos para comprobar si el usuario y la contraseña estan bin
    //tambien veremos que rol pinta
    public static function checkUser($user, $pass,&$rol){
        $query = self::prepare("SELECT rol FROM usuarios WHERE nombre=:nombre AND password= :pass");
        $query->execute(['nombre' => $user, 'pass' => md5($pass)]);
        $datos = $query->fetch();
        if ($datos) {
            $rol = $datos['rol'];
            return 1;
        } else {
            return -1;
        }
    }

    public function __get($prop)
    {
        return $this->$prop;
    }
    public function __set($prop, $valor)
    {
        $this->$prop = $valor;
    }
}