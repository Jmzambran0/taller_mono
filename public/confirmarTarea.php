<?php
require '../models/db/tareas_db.php';
require '../models/queries/tareasQuery.php';
require '../models/entity/tareas.php';
require '../controllers/tareasController.php';
require '../views/tareasView.php';
use App\views\TareasView;

$tareasView = new TareasView();
$datosFormulario = $_POST;
$msg = $tareasView->getMsgConfirmarTarea($datosFormulario);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Acción</title>
</head>
<body>
    <header>
        <h1>Estas de la operacion</h1>
    </header>
    <section>
        <?php 
        echo $msg;
        ?>
        <br>
        <a href="inicio.php">Volver a inicio</a>
    </section>
</body>
</html>