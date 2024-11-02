<?php
namespace App\controllers;

use App\models\entity\Prioridades;

class PrioridadesController{

    function allPrioridades(){
        $tareas = Prioridades::all();
        return $tareas;
    }

    function getPrioridad($id){
        return Prioridades::find($id);
    }
}

