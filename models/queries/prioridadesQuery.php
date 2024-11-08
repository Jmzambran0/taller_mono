<?php
namespace App\models\queries;

class PrioridadesQuery{

    static function all(){
        return "select * from prioridades";
        
    }
    static function whereIdPrioridad($id) {
        return "select * from prioridades where id=$id";
    }
}
