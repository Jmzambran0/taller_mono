<?php
namespace App\controllers;

use App\models\entity\tareas;

class TareasController{
    function allTareas(){
        $tareas = tareas::all();
        return $tareas;
    }

    function newTareas($datos){
        $tarea = new tareas();
        $tarea->set('titulo', $datos['titulo']);
        $tarea->set('descripcion', $datos['descripcion']);
        $tarea->set('fechaEstimadaFinalizacion', $datos['fechaEstimadaFinalizacion']);
        $tarea->set('fechaFinalizacion', $datos['fechaFinalizacion']);
        $tarea->set('creadorTarea', $datos['creadorTarea']);
        $tarea->set('observaciones', $datos['observaciones']);
        $tarea->set('idEmpleado', $datos['idEmpleado']);
        $tarea->set('idEstado', $datos['idEstado']);
        $tarea->set('idPrioridad', $datos['idPrioridad']);
        $tarea->set('created_at', $datos['created_at']);
        $tarea->set('updated_at', $datos['updated_at']);
        return $tarea->save();
    }

    function getTareas($id){
        return tareas::find($id);
    }
    function updateTareas($datos){
            $tarea = new tareas();
            $tarea->set('idEstado', $datos['idEstado']);
            $tarea->set('updated_at', $datos['updated_at']);
            return $tarea->update();
        }
    }

