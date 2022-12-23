<?php

require_once("../../Grupo/Modelo/grupo.php");

$ideditar = $_POST["ideditar"];
$arreglo = array();

$modeloGrupo = new grupo();
$informacionGrupo= $modeloGrupo->getById($ideditar);

if ($informacionGrupo != null){

    foreach ($informacionGrupo as $infoGrupo) {
       
        $arreglo[] = array(
                            "codigo_gru"=>$infoGrupo["codigo_gru"],
                            "descripcion"=>$infoGrupo["descripcion"],
                            "consecutivo" => $infoGrupo["consecutivo"],    
                        );
    }
}

echo json_encode($arreglo);

?>