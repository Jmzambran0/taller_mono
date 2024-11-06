<?php
namespace App\models\queries;

class EmpleadosQuery{

    static function all(){
        return "select * from empleados";
    }
}
