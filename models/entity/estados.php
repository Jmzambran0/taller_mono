<?php
namespace App\models\entity;

use App\models\queries\EstadosQuery;
use App\models\db\TareasDb;
class Estados{
    static function all() {
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
}