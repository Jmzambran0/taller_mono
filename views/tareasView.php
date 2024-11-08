<?php

namespace App\views;

use App\controllers\TareasController;


class TareasView
{

    private $tareasController;

    function __construct()
    {
        $this->tareasController = new TareasController();
    }

    function tablatareas()
    {
        $rows = '';
        $tareas = $this->tareasController->alltareas();
        if (count($tareas) > 0) {
            foreach ($tareas as $tarea) {
                $id = $tarea->get('id');
                $rows .= '<tr>';
                $rows .= '  <td>' . $tarea->get('titulo') . '</td>';
                $rows .= '  <td>' . $tarea->get('descripcion') . '</td>';
                $rows .= '  <td>' . $tarea->get('fechaEstimadaFinalizacion') . '</td>';
                $rows .= '  <td>' . $tarea->get('fechaFinalizacion') . '</td>'; 
                $rows .= '  <td>' . $tarea->get('creadorTarea') . '</td>'; 
                $rows .= '  <td>' . $tarea->get('observaciones') . '</td>'; 
                $rows .= '  <td>' . $tarea->empleado()->get("nombre") . '</td>';  
                $rows .= '  <td>' . $tarea->estado()->get("nombre") . '</td>';
                $rows .= '  <td>' . $tarea->prioridad()->get("nombre") . '</td>';
                $rows .= '  <td>' . $tarea->get('created_at') . '</td>';   
                $rows .= '  <td>' . $tarea->get('updated_at') . '</td>'; 
                $rows .= '  <td>';
                $rows .= '      <a href="formularioTarea.php?cod='.$id.'"><button type="submit" name="modificar" > Modificar</button> </a>';
                $rows .= '      <a href="eliminarTarea.php?cod='.$id.'"><button type="submit" name="eliminar" > Eliminar</button> </a>';
                $rows .= '  </td>'; 
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '  <td colspan="3">No hay datos</td>';
            $rows .= '</tr>';
        }
        $table = '<table>';
        $table .= ' <thead>';
        $table .= '     <tr>';
        $table .= '         <th>Titulo</th>';
        $table .= '         <th>Descripcion</th>';
        $table .= '         <th>Fecha estimada de finalizacion</th>';
        $table .= '         <th>Fecha de finalizacion</th>';
        $table .= '         <th>Creador de la tarea</th>';
        $table .= '         <th>Observaciones</th>';
        $table .= '         <th>Empelado</th>';
        $table .= '         <th>Estado</th>';
        $table .= '         <th>Prioridad</th>';
        $table .= '         <th>Fecha de creacion</th>';
        $table .= '         <th>Fecha de actualizacion</th>';
        $table .= '         <th>Eliminar o Modificar</th>';
        $table .= '     </tr>';
        $table .= ' </thead>';
        $table .= ' <tbody>';
        $table .= $rows;
        $table .= ' </tbody>';
        $table .= '</table>';
        return $table;
    }

    function getMsgConfirmarTarea($datosFormulario){
            $datosGuardados = empty($datosFormulario['cod']) 
            ?$this->tareasController->newTareas($datosFormulario)
            :$this->tareasController->updateTareas($datosFormulario);
        if($datosGuardados){
            return '<p>Datos del contacto guardatos</p>';
        }else{
            return '<p>No se pudo gardar los datos de la tarea</p>';
        }
    }

    function getMsgEliminarTarea($id){
        $this->tareasController->deleteTarea($id);
    }
}
