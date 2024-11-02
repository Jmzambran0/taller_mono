<?php
require '../models/db/tareas_db.php';
require '../models/queries/tareasQuery.php';
require '../models/entity/tareas.php';
require '../controllers/tareasController.php';
require '../views/tareasView.php';

use App\views\TareasView;

$tareasViews = new TareasView();
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
        <a href="formularioTarea.php">Registrar la tarea</a>
        <br>
        <?php echo $tareasViews->tablaTareas(); ?>
        <br>
    </section>
</body>

</html>