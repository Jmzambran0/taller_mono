<?php
namespace App\models\queries;

class EstadosQuery{

    static function all(){
        return "select * from estados";
    }
}
