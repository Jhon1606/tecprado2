<?php

require_once("../../Equipos/Modelo/equipos.php");

$equipo = $_POST["equipo"];
$arreglo = array();

$modeloEquipo = new equipo();

$documentos = $modeloEquipo->getDocs($equipo);
if($documentos != null){ 
    foreach($documentos as $documento){
       
        $arreglo[] = array(
            "comentario"=>$documento["comentario"],
            "archivo"=>$documento["archivo"],
            "iddocumento"=>$documento["iddocumento"],
        );
   

    }
}

echo json_encode($arreglo);

?>