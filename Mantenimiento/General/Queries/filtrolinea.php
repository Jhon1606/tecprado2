<?php

require_once "../../Equipos/Modelo/equipos.php";

$grupo = $_POST['grupo'];

$ModeloLinea = new equipo();
$InformacionLineas = $ModeloLinea->verLineaPorGrupo($grupo);

$selectLinea = "<label class='form-label'>Linea</label>";
$selectLinea .= "<select class='form-select' name='codigo_linea' id='codigo_linea'";

if($InformacionLineas != null){

    if($linea != ""){

        foreach ($InformacionLineas as $InfoLinea) {

            if($InfoLinea["grupo"] == $linea){

                $selectLinea .= "<option value='" . $InfoLinea["codigo_linea"] . "'>" . $InfoLinea["descripcion"] . "</option>";

            }    
        }
    } 
    
    $selectLinea .= "<option value=''>Seleccione una opción</option>";

    foreach ($InformacionLineas as $InfoLinea) {

        $selectLinea .= "<option value='" . $InfoLinea["codigo_linea"] . "'>" . $InfoLinea["descripcion"] . "</option>";

    }
}

$selectLinea .= "</select>";

echo $selectLinea;

?>