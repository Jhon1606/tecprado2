<?php
require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $codigo = $_POST['codigo'];
    $descripcion = strtoupper($_POST['descripcion']); 
    if($modeloComplejo->existe($codigo)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloComplejo->add($codigo,$descripcion);
    }
   
}else{
    header('Location: ../../index.php');
}
?>