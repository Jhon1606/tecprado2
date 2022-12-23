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
                            "centro_costo"=>$infoEquipo["centro_costo"],
                            "ambiente"=>$infoEquipo["ambiente"],
                            "habitacion"=>$infoEquipo["habitacion"],
                            "descripcion"=>$infoEquipo["descripcion"],
                            "codigo_grupo"=>$infoEquipo["codigo_grupo"],
                            "codigo_linea"=>$infoEquipo["codigo_linea"],
                            "serie"=>$infoEquipo["serie"],
                            "modelo"=>$infoEquipo["modelo"],
                            "marca"=>$infoEquipo["marca"],
                            "observaciones"=>$infoEquipo["observaciones"],
                            "codigo_und"=>$infoEquipo["codigo_und"],
                            "estandar_combustible"=>$infoEquipo["estandar_combustible"], 
                            "fecha_ultimo_mtto"=>$infoEquipo["fecha_ultimo_mtto"] 
                        );
    }
}

echo json_encode($arreglo);

?>