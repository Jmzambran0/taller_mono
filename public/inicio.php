<?php
require '../models/db/tareas_db.php';
require '../models/queries/tareasQuery.php';
require '../models/entity/tareas.php';
require '../models/entity/empleados.php';
require '../models/queries/empleadosQuery.php';
require '../models/entity/estados.php';
require '../models/queries/estadosQuery.php';
require '../models/entity/prioridades.php';
require '../models/queries/prioridadesQuery.php';
require '../controllers/tareasController.php';
require '../views/tareasView.php';

use App\views\TareasView;

$tareasViews = new TareasView();

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    echo $tareasViews->getMsgEliminarTarea($id);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="css/tareas.css">
</head>

<body>
    <header>
        <h1>Lista de tareas</h1>
    </header>
    <section>
        <div class="nuevaTarea"><a href="formularioTarea.php"><button>NUEVA TAREA</button></a></div>
        <br>
        <div>
            <form action="inicio.php" method="get" class="filtro">
                <label>Ordenar por:</label>
                    <select name="order">
                        <option value="1">prioridad</option>
                        <option value="2">titulo</option>
                    </select>
                <div>
                    <button type="submit">Ordenar</button>
                </div>
            </form>
        </div>
        <br>
        <?php 
        if(isset($_GET['order'])) {
            $order = $_GET['order'];
            echo $tareasViews->tablaTareas($order);
        } elseif(isset($_GET['filter'])){
            $filter = $_GET['filter'];
        } else {
            echo $tareasViews->tablaTareas(null);
        }?>
        <br>
    </section>
</body>

</html>