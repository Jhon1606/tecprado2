<?php

require_once("../../MttoActualizar/Modelo/actualizar.php");

$codigo = $_POST["codigo"];
$arreglo = array();

$modeloActualizar = new actualizar();
$historiales = $modeloActualizar->getMtto($codigo);

if($historiales != null){ 

    foreach($historiales as $historial){
       
        $arreglo[] = array(
            "codigo_eqp"=>$historial["codigo_eqp"],
            "descripcion"=>$historial["descripcion"],
            "fecha_mtto"=>$historial["fecha_mtto"]
        );
   

    }
}

echo json_encode($arreglo);

?>