<?php
require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $codigo_und = $_POST['codigo_und'];
    $descripcion = strtoupper($_POST['descripcion']); 
    if($modeloUnidades->existe($codigo_und)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloUnidades->add($codigo_und,$descripcion);
    }  
    
}else{
    header('Location: ../Vista/index.php');
}

?>