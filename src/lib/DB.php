<?php
namespace Profesor\ProyecFin\lib;
use Profesor\ProyecFin\config\Constantes;
use PDO;
use PDOException;

class DB{
    static function connect():PDO{
        try{
            $connection = "mysql:host=" . Constantes::$HOST . 
            ";dbname=" . Constantes::$DB . ";charset=" . Constantes::$CHARSET .";port=". Constantes::$PORT;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, Constantes::$USER, Constantes::$PASSWORD, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
?>