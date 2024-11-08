<?php
namespace App\models\entity;

use App\models\queries\EstadosQuery;
use App\models\db\TareasDb;
class Estados{
    function set($prop, $value){
        $this-> {$prop} = $value;
    }
    function get($prop){
        return $this-> {$prop};
    }

    static function all() {
        $db = new TareasDb(); 
        $sql = EstadosQuery::all();
        $result = $db->query($sql); 
        $estados = []; 
        while ($row = $result->fetch_assoc()) {
        $estado = new Estados();
        $estado->set('idEmpleado',$row['idEmpleado']);
        array_push($estados, $estado);
        }
        $db->close(); 
        return $estados; 
    }

    static function list() {
        $db = new TareasDb(); 
        $sql = EstadosQuery::all();
        $result = $db->query($sql); 
        $estados = []; 

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estados[] = ['id' => $row["id"], 'nombre' => $row["nombre"]];
            }
        }

        $db->close(); 
        return $estados; 
    }

    static function find($id){
        $sql = EstadosQuery::whereIdEstados($id);
        $db = new TareasDb();
        $result = $db->query($sql);
        $estado = new Estados();
        while($row = $result->fetch_assoc()){
            $estado->set('id',$row['id']);
            $estado->set('nombre',$row['nombre']);
        }
        $db->close();
        return $estado;
    }
}