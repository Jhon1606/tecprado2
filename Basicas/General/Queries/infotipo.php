<?php

require_once("../../Tipo/Modelo/tipo.php");

$ideditar = $_POST["ideditar"];
$arreglo = array();

$modeloTipo = new tipo();
$informacionTipo= $modeloTipo->getById($ideditar);

if ($informacionTipo != null){

    foreach ($informacionTipo as $infoTipo) {
       
        $arreglo[] = array(
                            "id"=>$infoTipo["id"],
                            "descripcion"=>$infoTipo["descripcion"],    
                        );
    }
}

echo json_encode($arreglo);

?>