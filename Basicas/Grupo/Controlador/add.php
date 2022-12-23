<?php
require_once('../Modelo/grupo.php');

if ($_POST) {
    $modeloGrupo = new grupo();

    $codigo_gru = $_POST['codigo_gru'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $consecutivo = $_POST['consecutivo']; 
    $modeloGrupo->existe($codigo_gru);
    
    $modeloGrupo->add($codigo_gru,$descripcion,$consecutivo);
   
    }else{
        header('Location: ../../index.php');
    }

?>