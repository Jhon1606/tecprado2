<?php
require_once('../Modelo/actualizar.php');

if ($_POST) {
    $modeloActualizar = new actualizar();

    $codigo_eqp = $_POST['codigo_eqp'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $fecha_ultimo_mtto = $_POST['fecha_ultimo_mtto'];
    $descripcion_mtto = $_POST['descripcion_mtto'];
    
    $modeloActualizar->addMtto($codigo_eqp,$fecha_ultimo_mtto,$descripcion_mtto);
    $modeloActualizar->updateMtto($codigo_eqp,$descripcion,$fecha_ultimo_mtto);
    }else{
        header('Location: ../../index.php');
    }

?>