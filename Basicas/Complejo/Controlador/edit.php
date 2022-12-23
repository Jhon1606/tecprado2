<?php

require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $codigo = $_POST['codigo'];
    $descripcion = strtoupper($_POST['descripcion']);
    
    $modeloComplejo->update($codigo,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>