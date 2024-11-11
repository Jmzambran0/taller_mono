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
use App\models\entity\Empleados;
use App\models\entity\Prioridades;

$listarEmpleados = Empleados::list();
$listarPrioridades = Prioridades::list();

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
            <form action="" method="get" class="filtro">
                <label>Ordenar por:</label>
                    <select name="filter">
                        <option value="8">Prioridad</option>
                        <option value="9">Titulo (A - Z)</option>
                    </select>
                <div>
                    <button type="submit">Ordenar</button>
                </div>
            </form>
            <form action="" method="get">
                <div>
                    <label>Fecha inicial</label>
                    <input type="date" name="fechaInicio" required>
                </div>
                <div>
                    <label>Fecha final</label>
                    <input type="date" name="fechaFinal" required>
                </div>
                <div>
                    <button type="submit">buscar</button>
                </div>
            </form>
            <form action="" method="get" class="filtro">
                <label>Empleado</label>
                    <select name="filter">
                        <?php
                        foreach ($listarEmpleados as $empleado) {
                        echo '<option value="' . $empleado['id'] . '">' . $empleado['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                <div>
                    <button type="submit">buscar</button>
                </div>
            </form>
            <form action="" method="get" class="filtro">
                <label>Prioridad</label>
                    <select name="priority">
                        <?php
                        foreach ($listarPrioridades as $prioridad) {
                        echo '<option value="' . $prioridad['id'] . '">' . $prioridad['nombre'] . '</option>';
                        }
                        ?>
                    </select>
                <div>
                    <button type="submit">buscar</button>
                </div>
            </form>
        </div>
        <br>
        <?php 
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];
            echo $tareasViews->tablatareas(intval($filter));
        } elseif(isset($_GET['fechaInicio'])){
            echo $tareasViews->tablatareas($_GET);
        } elseif(isset($_GET['priority'])){
            $prioridad = $_GET['priority'];
            echo $tareasViews->tablatareas(intval($prioridad) + 10);
        } else {
            echo $tareasViews->tablaTareas(0);
        }?>
        <br>
    </section>
</body>

</html>