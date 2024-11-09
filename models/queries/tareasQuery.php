<?php
namespace App\models\queries;

class TareasQuery{

    static function all(){
        return "select * from tareas";
    }

    static function allOrderedByPriority(){
        return "SELECT * FROM tareas ORDER BY idPrioridad ASC, fechaEstimadaFinalizacion ASC";
    }

    static function allOrderedByTitle(){
        return "SELECT * FROM tareas ORDER BY LOWER(titulo) ASC";
    }

    static function dateRangeFilter($fechaInicio, $fechaFin){
        return "SELECT * FROM tareas WHERE fechaEstimadaFinalizacion BETWEEN '$fechaInicio' AND '$fechaFin'";
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

    static function deleteId($id) {
        return "delete from tareas where id = $id";
    }

    static function update($tarea) {
        $id = $tarea->get('id');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $updated_at = $tarea->get('updated_at');
        $sql = "UPDATE tareas SET idEmpleado='$idEmpleado',idEstado='$idEstado',updated_at='$updated_at' WHERE id = '$id'";
        return $sql;
    }
}