<?php

require_once "../../Equipos/Modelo/equipos.php";

$complejo = $_POST['complejo'];
$ambiente = $_POST['ambiente'];

$ModeloAmbientesC = new equipo();
$InformacionAmbientes = $ModeloAmbientesC->verAmbientesPorComplejo($complejo);

$selectAmbiente = "<label class='form-label'>Ambiente</label>";
$selectAmbiente .= "<select class='form-select' name='ambiente' id='ambiente'>";

if($InformacionAmbientes != null){

    if($ambiente != ""){

        foreach ($InformacionAmbientes as $InfoAmbiente) {

            if($InfoAmbiente["id"] == $ambiente){

                $selectAmbiente .= "<option value='" . $InfoAmbiente["id"] . "'>" . $InfoAmbiente["descripcion"] . "</option>";

            }    
        }
    } 
    
    $selectAmbiente .= "<option value=''>Seleccione una opción</option>";

    foreach ($InformacionAmbientes as $InfoAmbiente) {

        $selectAmbiente .= "<option value='" . $InfoAmbiente["id"] . "'>" . $InfoAmbiente["descripcion"] . "</option>";

    }
}

$selectAmbiente .= "</select>";

echo $selectAmbiente;

?>