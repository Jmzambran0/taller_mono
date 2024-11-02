<?php
namespace App\models\queries;

class TareasQuery{

    static function all(){
        return "select * from Tareas";
    }
    static function insert($tarea){
        $titulo = $tarea->get('titulo');
        $descripcion = $tarea->get('descripcion');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $created_at = $tarea->get('created_at');
        $updated_at = $tarea->get('updated_at');
        $sql = "insert into tareas (titulo,descripcion,
        fechaEstimadaFinalizacion,fechaFinalizacion,creadorTarea,observaciones,
        idEmpleado,idEstado,idPrioridad,created_at,updated_at) values ";
        $sql .= "('$titulo','$descripcion',
        '$fechaEstimadaFinalizacion','$fechaFinalizacion','$creadorTarea','$observaciones',
        '$idEmpleado','$idEstado','$idPrioridad','$created_at','$updated_at')";
        return $sql;
    }

    static function whereId($id) {
        return "select * from tareas where id=$id";
    }
    static function update($tarea) {
        $id = $tarea->get('id');
        $idEstado = $tarea->get('idEstado');
        $updated_at = $tarea->get('updated_at');
        $sql = "update tareas set ";
        $sql .= "idEstado='$idEstado',";
        $sql .= "updated_at='$updated_at',";
        $sql .= "   where id=$id";
        return $sql;
    }
}