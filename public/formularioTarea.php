<?php
require '../models/db/tareas_db.php';
require '../models/queries/tareasQuery.php';
require '../models/entity/tareas.php';
require '../models/entity/prioridades.php';
require '../models/queries/prioridadesQuery.php';
require '../controllers/tareasController.php';
require '../models/entity/estados.php';
require '../models/queries/estadosQuery.php';
require '../models/entity/empleados.php';
require '../models/queries/empleadosQuery.php';
use App\controllers\TareasController;
use App\models\entity\Prioridades;
use App\models\entity\Estados;
use App\models\entity\Empleados;


$titulos  = empty($_GET['cod']) ? 'Crear Tarea' : 'Modificar Tarea';
$titulo = '';
$descripcion = '';
$fechaEstimadaFinalizacion = '';
$fechaFinalizacion = '';
$creadorTarea = '';
$observaciones = '';
$idEmpleado = '';
$idEstado = '';
$idPrioridad = '';
$created_at = '';
$updated_at = '';

if (!empty($_GET['cod'])) {
    $controller = new TareasController;
    $tareas = $controller->getTareas($_GET['cod']);
    $titulo = $tareas->get('titulo');
    $descripcion = $tareas->get('descripcion');
    $fechaEstimadaFinalizacion = $tareas->get('fechaEstimadaFinalizacion');
    $fechaFinalizacion = $tareas->get('fechaFinalizacion');
    $creadorTarea = $tareas->get('creadorTarea');
    $observaciones = $tareas->get('observaciones');
    $idEmpleado = $tareas->get('idEmpleado');
    $idEstado = $tareas->get('idEstado');
    $idPrioridad = $tareas->get('idPrioridad');
    $created_at = $tareas->get('created_at');
    $updated_at = $tareas->get('updated_at');
}

$listaPrioridades = Prioridades::all();
$listarEstados = Estados::all();
$listarEmpleados = Empleados::all();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tarea</title>
</head>

<body>
    <h1><?php echo $titulos ?></h1>
    <section>
        <form action="confirmarTarea.php" method="post">
            <?php
            if (!empty($_GET['cod'])) {
                echo '<input type ="hidden" name="cod" value="' . $_GET['cod'] . '">';
            }
            ?>
            <div>
                <label>titulo de la tarea</label>
                <input type="text" name="titulo" value="<?php echo $titulo ?>" required>
            </div>
            <div>
                <label>descripcion</label>
                <input type="text" name="descripcion" value="<?php echo $descripcion ?>" required>
            </div>
            <div>
                <label>fecha Estimada de Finalizacion</label>
                <input type="date" name="fechaEstimadaFinalizacion" value="<?php echo $fechaEstimadaFinalizacion ?>" required>
            </div>
            <div>
                <label>fechaFinalizacion</label>
                <input type="date" name="fechaFinalizacion" value="<?php echo $fechaFinalizacion ?>" required>
            </div>
            <div>
                <label>creador de la Tarea</label>
                <input type="text" name="creadorTarea" value="<?php echo $creadorTarea ?>" required>
            </div>
            <div>
                <label>observaciones</label>
                <input type="text" name="observaciones" value="<?php echo $observaciones ?>" required>
            </div>
            <div>
                <label>Empleado</label>
                <select name="empleados" id="emple">
                <?php
                foreach ($listarEmpleados as $empleado) {
                    echo '<option value="' . $empleado['id'] . '">' . $empleado['nombre'] . '</option>';
                }
                ?>
                </select>
            </div>
            <div>
                <label>Estado</label>
                <select name="estados" id="estad">
                <?php
                foreach ($listarEstados as $estado) {
                    echo '<option value="' . $estado['id'] . '">' . $estado['nombre'] . '</option>';
                }
                ?>
                </select>
            </div>
            <div>
                <label>prioridad</label>
                <select name="prioridades" id="priori">
                <?php
                foreach ($listaPrioridades as $prioridad) {
                    echo '<option value="' . $prioridad['id'] . '">' . $prioridad['nombre'] . '</option>';
                }
                ?>
                </select>
            </div>
            <div>
                <label>fecha de creacion</label>
                <input type="date" name="created_at" value="<?php echo $created_at ?>" required>
            </div>
            <div>
                <label>fecha de actualizacion</label>
                <input type="date" name="updated_at" value="<?php echo $updated_at ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </section>
</body>

</html>