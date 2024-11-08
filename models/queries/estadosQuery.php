<?php
namespace App\models\queries;

class EstadosQuery{

    static function all(){
        return "select * from estados";
    }
    static function whereIdEstados($id) {
        return "select * from estados where id=$id";
    }

}
