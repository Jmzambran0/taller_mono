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
        <br>
        <div class="filtrosGrid">
            <div class="filterGrid">
                <div class="filterSelectGrid">
                    <label>Filtrar por:</label>
                    <select id="filterSelect" onchange="mostrarFormulario()">
                        <option value="empleadoFilter">Empleado</option>
                        <option value="prioridadFilter">Prioridad</option>
                        <option value="titleFilter">Titulo</option>
                        <option value="descFilter">Descripcion</option>
                        <option value="dateFilter">Fecha estimada de finalizacion</option>
                    </select>
                </div>
                <div class="filterFormGrid" >
                    <form action="" id="dateFilter" method="get">
                        <label class="l1">Desde:</label>
                        <input class="d1" type="date" name="fechaInicio" required>
                        
                        <label class="l2">Hasta:</label>
                        <input class="d2" type="date" name="fechaFinal" required>
                        
                        <button type="submit">buscar</button>
                    </form>
                    <form action="" id="empleadoFilter" method="get" class="filtro">
                        <label>Empleado</label>
                            <select name="empleadoFilter">
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
                    <form action="" id="prioridadFilter" method="get" class="filtro" style="display: none;">
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
                    <form action="" id="titleFilter" method="get" class="filtroInput">
                        <label>Titulo</label>
                        <input type="text" name="titulo" required>
                        <button type="submit">buscar</button>
                    </form>
                    <form action="" id="descFilter" method="get" class="filtroInput">
                        <label>Descripcion</label>
                        <input type="text" name="descripcion" required>
                        <button type="submit">buscar</button>
                    </form>
                </div>
            </div>
            <div class="orderGrid">
                <form action="" method="get" class="filtro">
                    <label>Ordenar por:</label>
                        <select name="order">
                            <option value="1">Prioridad</option>
                            <option value="2">Titulo (A - Z)</option>
                        </select>
                    <div>
                        <button type="submit">Ordenar</button>
                    </div>
                </form>
            </div>
            <div class="nuevaTarea"><a href="formularioTarea.php"><button>NUEVA TAREA</button></a></div>
        </div>
        <br>
        <?php
        echo $tareasViews->tablatareas($_GET);
        ?>
        <br>
    </section>
    <script src="js/inicio.js"></script>
</body>

</html>