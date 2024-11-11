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
    <link rel="stylesheet" href="css/filtros.css">
    <script src="js/filtros.js" defer></script>
</head>

<body>
    <header>
        <h1>Lista de tareas</h1>
    </header>
    <section>
        <div class="nuevaTarea"><a href="formularioTarea.php"><button>NUEVA TAREA</button></a></div>
        <br>
        <div>
            <label for="filtroSeleccionado">Selecciona un filtro:</label>
            <select id="filtroSeleccionado">
                <option value="">-- Selecciona un filtro --</option>
                <option value="ordenar">Ordenar por</option>
                <option value="fecha">Filtrar por fecha</option>
                <option value="empleado">Filtrar por empleado</option>
                <option value="prioridad">Filtrar por prioridad</option>
            </select>
        </div>
        <div id="filtrosContainer" style="display: none;">
            <form id="ordenarForm" action="" method="get" class="filtro" style="display: none;">
                <label>Ordenar por:</label>
                <select name="filter">
                    <option value="8">Prioridad</option>
                    <option value="9">Titulo (A - Z)</option>
                </select>
                <button type="submit">Ordenar</button>
            </form>

            <form id="fechaForm" action="" method="get" class="filtro" style="display: none;">
                <label>Fecha inicial</label>
                <input type="date" name="fechaInicio" required>
                <label>Fecha final</label>
                <input type="date" name="fechaFinal" required>
                <button type="submit">Buscar</button>
            </form>

            <form id="empleadoForm" action="" method="get" class="filtro" style="display: none;">
                <label>Empleado</label>
                <select name="filter">
                    <?php
                    foreach ($listarEmpleados as $empleado) {
                        echo '<option value="' . $empleado['id'] . '">' . $empleado['nombre'] . '</option>';
                    }
                    ?>
                </select>
                <button type="submit">Buscar</button>
            </form>

            <form id="prioridadForm" action="" method="get" class="filtro" style="display: none;">
        <label>Prioridad</label>
        <select name="priority">
            <?php
            foreach ($listarPrioridades as $prioridad) {
                echo '<option value="' . $prioridad['id'] . '">' . $prioridad['nombre'] . '</option>';
            }
            ?>
        </select>
        <button type="submit">Buscar</button>
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