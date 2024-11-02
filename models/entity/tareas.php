<?php
namespace App\models\entity;

use App\models\queries\TareasQuery;
use App\models\db\TareasDb;

class Tareas{
    private $id;
    private $titulo;
    private $descripcion;
    private $fechaEstimadaFinalizacion;
    private $fechaFinalizacion;
    private $creadorTarea;
    private $observaciones;
    private $idEstado;
    private $idEmpleado;
    private $idPrioridad;
    private $created_at;
    private $updated_at;

    //
    function set($prop, $value){
        $this-> {$prop} = $value;
    }
    function get($prop){
        return $this-> {$prop};
    }

    static function all(){
        $sql = TareasQuery::all();
        $db = new TareasDb();
        $result = $db-> query($sql);
        $tareas = [];
        while ($row = $result->fetch_assoc()) {
            $tarea = new Tareas();
            $tarea->set('id',$row['id']);
            $tarea->set('titulo',$row['titulo']);
            $tarea->set('descripcion',$row['descripcion']);
            $tarea->set('fechaEstimadaFinalizacion',$row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion',$row['fechaFinalizacion']);
            $tarea->set('creadorTarea',$row['creadorTarea']);
            $tarea->set('observaciones',$row['observaciones']);
            $tarea->set('idEmpleado',$row['idEmpleado']);
            $tarea->set('idEstado',$row['idEstado']);
            $tarea->set('idPrioridad',$row['idPrioridad']);
            $tarea->set('created_at',$row['created_at']);
            $tarea->set('updated_at',$row['updated_at']);
            array_push($tareas, $tarea);
        }
        $db->close();
        return $tareas;
    }

    function save(){
        $sql = TareasQuery::insert($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }

    static function find($id){
        $sql = TareasQuery::whereId($id);
        $db = new TareasDb();
        $result = $db->query($sql);
        $tarea = new Tareas();
        while($row = $result->fetch_assoc()){
            $tarea->set('id',$row['id']);
            $tarea->set('titulo',$row['titulo']);
            $tarea->set('descripcion',$row['descripcion']);
            $tarea->set('fechaEstimadaFinalizacion',$row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion',$row['fechaFinalizacion']);
            $tarea->set('creadorTarea',$row['creadorTarea']);
            $tarea->set('observaciones',$row['observaciones']);
            $tarea->set('idEmpleado',$row['idEmpleado']);
            $tarea->set('idEstado',$row['idEstado']);
            $tarea->set('idPrioridad',$row['idPrioridad']);
            $tarea->set('created_at',$row['created_at']);
            $tarea->set('updated_at',$row['updated_at']);
        }
        $db->close();
        return $tarea;
    }
    function update(){
        $sql = TareasQuery::update($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }

}
