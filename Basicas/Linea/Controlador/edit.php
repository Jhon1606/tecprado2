<?php

require_once('../Modelo/linea.php');

if ($_POST) {
    $modeloLinea = new linea();

    $codigo_linea = $_POST['codigo_linea'];
    $descripcion = strtoupper($_POST['descripcion']);
    $grupo = $_POST['grupo'];
    
    $modeloLinea->update($codigo_linea,$descripcion,$grupo);
    }else{
        header('Location: ../Vista/index.php');
    }

?>