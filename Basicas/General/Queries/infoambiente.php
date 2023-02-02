<?php

require_once("../../Ambiente/Modelo/ambiente.php");

$ideditar = $_POST["ideditar"];
$arreglo = array();

$modeloAmbiente = new ambiente();
$informacionAmbiente= $modeloAmbiente->getById($ideditar);

if ($informacionAmbiente != null){

    foreach ($informacionAmbiente as $infoAmbiente) {
       
        $arreglo[] = array(
                            "codigo"=>$infoAmbiente["codigo"],
                            "descripcion"=>$infoAmbiente["descripcion"],
                            "tipo_ubicacion"=>$infoAmbiente["tipo_ubicacion"],
                            "centro_costo" => $infoAmbiente["centro_costo"],    
                        );
    }
}

echo json_encode($arreglo);

?>