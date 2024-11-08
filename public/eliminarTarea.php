<?php
require '../controllers/tareasController.php';
use App\views\TareasView;

$tareasView = new TareasView();
$id = $_GET['cod'];
$msg = $tareasView->getMsgEliminarTarea($id);

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
        <h1>Estado de la operacion</h1>
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