<?php
require_once('../Modelo/linea.php');

if ($_POST) {
    $modeloLinea = new linea();

    $codigo_linea = $_POST['codigo_linea'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $grupo = $_POST['grupo'];
    if($modeloLinea->existe($codigo_linea)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloLinea->add($codigo_linea,$descripcion,$grupo);
    }  
   
}else{
    header('Location: ../../index.php');
}

?>