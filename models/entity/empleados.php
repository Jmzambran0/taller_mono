<?php
namespace App\models\entity;

use App\models\queries\EmpleadosQuery;
use App\models\db\TareasDb;

class Empleados{
    private $idEmpleado;

    static function all() {
        $db = new TareasDb(); 
        $sql = EmpleadosQuery::all();
        $result = $db->query($sql); 
        $empleados = []; 
        while ($row = $result->fetch_assoc()) {
        $empleado = new Empleados();
        $empleado->set('idEmpleado',$row['idEmpleado']);
        array_push($empleados, $empleado);
        }
        $db->close(); 
        return $empleados; 
    }

    static function list() {
        $db = new TareasDb(); 
        $sql = EmpleadosQuery::all();
        $result = $db->query($sql); 
        $empleados = []; 

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $empleados[] = ['id' => $row["id"], 'nombre' => $row["nombre"]];
            }
        }
        $db->close(); 
        return $empleados; 
    }

    function set($prop, $value){
        $this-> {$prop} = $value;
    }
    function get($prop){
        return $this-> {$prop};
    }

    static function find($id){
        $sql = EmpleadosQuery::whereIdEmpleado($id);
        $db = new TareasDb();
        $result = $db->query($sql);
        $empleado = new Empleados();
        while($row = $result->fetch_assoc()){
            $empleado->set('id',$row['id']);
            $empleado->set('nombre',$row['nombre']);
        }
        $db->close();
        return $empleado;
    }
}