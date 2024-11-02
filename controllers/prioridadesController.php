<?php
namespace App\models\entity;

use App\models\entity\Prioridades;

class PrioridadesController{
    function allPrioridades(){
        $prioridades = tareas::all();
        return $prioridades;
    }


}