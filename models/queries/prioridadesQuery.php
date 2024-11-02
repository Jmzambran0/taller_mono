<?php
namespace App\models\queries;

class PrioridadesQuery{

    static function all(){
        return "select * from prioridades";
    }

    static function whereId($id) {
        return "select * from prioridades where id=$id";
    }
}