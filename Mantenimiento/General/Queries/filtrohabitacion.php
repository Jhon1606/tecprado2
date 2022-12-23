<?php

require_once "../../Equipos/Modelo/equipos.php";

$ambiente = $_POST['ambiente'];
$habitacion = $_POST['habitacion'];

$modeloEquipo = new equipo();
$InformacionParametros = $modeloEquipo->verParametroPorAmbiente($ambiente);
$InformacionHabitaciones = $modeloEquipo->getHabitacion();

if($InformacionParametros != null){

    $selectHabitacion = "<label class='form-label'>Habitacion</label>";
    $selectHabitacion .= "<select class='form-select' name='habitacion' id='habitacion'>";

    if($habitacion != ""){

        foreach ($InformacionParametros as $InfoParametro) {

            if($InfoParametro["valor"] == $ambiente){

                foreach($InformacionHabitaciones as $InfoHabitacion){

                    $selectHabitacion .= "<option value='" . $InfoHabitacion["piso"] . "'>" . $InfoHabitacion["piso"] . "</option>";

                }
            }    
        }
    }

    $selectHabitacion .= "<option value=''>Seleccione una opción</option>";
    
    foreach ($InformacionParametros as $InfoParametro) {

        if($InfoParametro["valor"] == $ambiente){
            
            foreach ($InformacionHabitaciones as $InfoHabitacion) {
                $selectHabitacion .= "<option value='" . $InfoHabitacion["piso"] . "'>" . $InfoHabitacion["piso"] . "</option>";
            }
        } 
    }
}

$selectHabitacion .= "</select>";

echo $selectHabitacion;

?>