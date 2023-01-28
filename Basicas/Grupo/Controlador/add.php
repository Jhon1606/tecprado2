<?php
require_once('../Modelo/grupo.php');

if ($_POST) {
    $modeloGrupo = new grupo();

    $codigo_gru = $_POST['codigo_gru'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $consecutivo = $_POST['consecutivo']; 
    if($modeloGrupo->existe($codigo_gru)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloGrupo->add($codigo_gru,$descripcion,$consecutivo);
    }  

}else{
    header('Location: ../../index.php');
}

?>