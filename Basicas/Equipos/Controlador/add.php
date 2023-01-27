<?php
require_once('../Modelo/equipos.php');

if ($_POST) {
    $modeloEquipo = new equipo();

    $codigo_eqp = $_POST['codigo_eqp'];
    $centro_costo = $_POST['centro_costo']; 
    $ambiente = $_POST['ambiente']; 
    $descripcion = strtoupper($_POST['descripcion']); 
    $codigo_grupo = $_POST['codigo_grupo']; 
    $codigo_linea = $_POST['codigo_linea']; 
    $serie = $_POST['serie']; 
    $modelo = $_POST['modelo']; 
    $marca = $_POST['marca']; 
    $observaciones = $_POST['observaciones']; 
    $codigo_und = $_POST['codigo_und']; 
    $estandar_combustible = $_POST['estandar_combustible']; 
    if($modeloEquipo->existe($codigo_eqp)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloEquipo->add($codigo_eqp,$centro_costo,$ambiente,$descripcion,$codigo_grupo,$codigo_linea,$serie,$modelo,$marca,$observaciones,$codigo_und,$estandar_combustible);
    }  

}else{
    header('Location: ../../index.php');
}

?>