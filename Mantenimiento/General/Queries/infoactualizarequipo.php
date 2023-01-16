<?php

require_once("../../Equipos/Modelo/equipos.php");

$ideditar = $_POST["ideditar"];
$arreglo = array();

$modeloEquipo = new equipo();
$informacionEquipo= $modeloEquipo->getById($ideditar);

if ($informacionEquipo != null){

    foreach ($informacionEquipo as $infoEquipo) {
       
        $arreglo[] = array(
                            "codigo_eqp"=>$infoEquipo["codigo_eqp"],
                            "descripcion"=>$infoEquipo["descripcion"], 
                            "fecha_ultimo_mtto"=>$infoEquipo["fecha_ultimo_mtto"]
                        );
    }
}

echo json_encode($arreglo);

?>