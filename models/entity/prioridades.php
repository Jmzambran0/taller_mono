<?php
namespace App\models\entity;

use App\models\db\TareasDb;
use App\models\queries\PrioridadesQuery;

class Prioridades {
    
    function set($prop, $value){
        $this-> {$prop} = $value;
    }
    function get($prop){
        return $this-> {$prop};
    }
    static function all() {
        $db = new TareasDb(); 
        $sql = PrioridadesQuery::all();
        $result = $db->query($sql); 
        $prioridades = []; 
        while ($row = $result->fetch_assoc()) {
        $prioridad = new Prioridades();
        $prioridad->set('idPrioridad',$row['idPrioridad']);
        array_push($empleados, $prioridad);
        }
        $db->close(); 
        return $prioridades; 
    }

    static function list() {
        $db = new TareasDb(); 
        $sql = PrioridadesQuery::all();
        $result = $db->query($sql); 
        $prioridades = []; 

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $prioridades[] = ['id' => $row["id"], 'nombre' => $row["nombre"]];
            }
        }

        $db->close(); 
        return $prioridades; 
    }
    static function find($id){
        $sql = PrioridadesQuery::whereIdPrioridad($id);
        $db = new TareasDb();
        $result = $db->query($sql);
        $prioridad = new Empleados();
        while($row = $result->fetch_assoc()){
            $prioridad->set('id',$row['id']);
            $prioridad->set('nombre',$row['nombre']);
        }
        $db->close();
        return $prioridad;
    }
}