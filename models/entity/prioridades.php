<?php
namespace App\models\entity;

use App\models\queries\PrioridadesQuery;
use App\models\db\TareasDb;
class Prioridades{
    private $id;
    private $nombre;

    static function find($id){
        $sql = PrioridadesQuery::whereId($id);

        
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


}