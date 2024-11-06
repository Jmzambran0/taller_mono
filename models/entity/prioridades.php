<?php
namespace App\models\entity;

use App\models\db\TareasDb;
use App\models\queries\PrioridadesQuery;

class Prioridades {
    static function all() {
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
}