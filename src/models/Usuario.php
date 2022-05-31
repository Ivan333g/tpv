<?php

namespace Profesor\ProyecFin\models;
use PDO;
use Profesor\ProyecFin\lib\Model;

class Usuario extends Model{

    private $id_usuario;
    private string $rol;
    private string $password;
    private string $nombre;

    public function __construct($nombre,$password,$rol, $id_usuario=null){
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->rol=$rol;
    }

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

    public static function getUsuarios(){
        $usuarios = [];
        $datos = self::query("SELECT id_usuario, nombre,password,rol FROM usuarios");
        while ($p = $datos->fetch()) {
            $usuarios[] = new Usuario($p['nombre'],$p['password'],$p['rol'],$p['id_usuario']);
        }
        return $usuarios;
    }
    public static function getUsuario($id){
        $query = self::prepare("SELECT id_usuario,nombre,password,rol FROM usuarios WHERE id_usuario= :id_usuario");
        $query->execute(['id_usuario' => $id]);
        $p = $query->fetch();

        return ($p) ? new Usuario($p['nombre'],$p['password'],$p['rol'],$p['id_usuario']) : null;
    }

    public function insert(){
        $query = $this->prepare('INSERT INTO usuarios (nombre,password,rol) VALUES (:nombre, :password,:rol)');
        $query->execute(['nombre'=>$this->nombre,'password'=>$this->password,'rol'=>$this->rol]);
    }
    public function deleteUsu(){
        $query = $this->prepare('DELETE FROM usuarios WHERE id_usuario= :id_usuario');
        $query->execute(['id_usuario'=>$this->id_usuario]);
    }
    public function update(){
        $query = $this->prepare('UPDATE usuarios SET nombre=:nombre, password=:password,rol=:rol WHERE id_usuario=:id_usuario');
        $query->execute(['id_usuario'=>$this->id_usuario,
         'nombre'=>$this->nombre,'password'=>$this->password,'rol'=>$this->rol]);  
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