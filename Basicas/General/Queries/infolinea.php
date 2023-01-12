<?php

require_once("../../Linea/Modelo/linea.php");

$ideditar = $_POST["ideditar"];
$arreglo = array();

$modeloLinea = new linea();
$informacionLinea= $modeloLinea->getById($ideditar);

if ($informacionLinea != null){

    foreach ($informacionLinea as $infoLinea) {
       
        $arreglo[] = array(
                            "codigo_linea"=>$infoLinea["codigo_linea"],
                            "descripcion"=>$infoLinea["descripcion"],    
                            "grupo"=>$infoLinea["grupo"],    
                        );
    }
}

echo json_encode($arreglo);

?>