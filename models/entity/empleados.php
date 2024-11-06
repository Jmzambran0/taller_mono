<?php
namespace App\models\entity;

use App\models\queries\EmpleadosQuery;
use App\models\db\TareasDb;
class Empleados{
    static function all() {
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
}