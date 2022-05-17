<?php
namespace Profesor\ProyecFin\lib;

class Model{

    public static function query($query){
        return DB::connect()->query($query);
    }
    public static function prepare($query){
        return DB::connect()->prepare($query);
    }
}
?>