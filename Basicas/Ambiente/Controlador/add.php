<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Modelo/ambiente.php');

if ($_POST) {
    $modeloAmbiente = new ambiente();

    $codigo = $_POST['codigo'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $centro_costo = $_POST['centro_costo']; 
    $tipo_ubicacion = $_POST['tipo_ubicacion']; 
    
    if($modeloAmbiente->existe($codigo)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloAmbiente->add($codigo,$descripcion,$centro_costo,$tipo_ubicacion);
    }  

}else{
    header('Location: ../../index.php');
}

?>