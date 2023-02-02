<?php

require_once("../../Complejo/Modelo/complejo.php");

$complejo = $_POST["complejo"];
$arreglo = array();

$modeloComplejo = new complejo();

$habitaciones = $modeloComplejo->getHabitacion($complejo);
if($habitaciones != null){ 
    foreach($habitaciones as $habitacion){
       
        $arreglo[] = array(
            "piso"=>$habitacion["piso"],
            "complejo"=>$habitacion["descripcion"]
        );
   

    }
}

echo json_encode($arreglo);

?>