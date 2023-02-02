<?php

require_once("../../Unidades/Modelo/unidades.php");

$ideditar = $_POST["ideditar"];
$arreglo = array();

$modeloUnidades = new unidades();
$informacionUnidades= $modeloUnidades->getById($ideditar);

if ($informacionUnidades != null){

    foreach ($informacionUnidades as $infoUnidades) {
       
        $arreglo[] = array(
                            "codigo_und"=>$infoUnidades["codigo_und"],
                            "descripcion"=>$infoUnidades["descripcion"],    
                        );
    }
}

echo json_encode($arreglo);

?>