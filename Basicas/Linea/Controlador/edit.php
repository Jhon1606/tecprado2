<?php

require_once('../Modelo/linea.php');

if ($_POST) {
    $modeloLinea = new linea();

    $codigo_linea = $_POST['codigo_linea'];
    $descripcion = strtoupper($_POST['descripcion']);
    
    $modeloLinea->update($codigo_linea,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>