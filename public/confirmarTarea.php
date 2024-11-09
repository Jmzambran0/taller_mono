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
    <link rel="stylesheet" href="../public/css/tareas.css">
</head>
<body>
    <header>
        <h1>Estado de la operacion</h1>
    </header>
    <section class="aviso">
        <?php 
        echo $msg;
        ?>
        <br>
        <a href="inicio.php"><button>Volver a Inicio</button></a>
    </section>
</body>
</html>