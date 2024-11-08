<?php
namespace App\models\queries;

class EmpleadosQuery{

    static function all(){
        return "select * from empleados";
    }
    static function whereIdEmpleado($id) {
        return "select * from empleados where id=$id";
    }
}
