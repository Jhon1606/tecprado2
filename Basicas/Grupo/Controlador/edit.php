<?php

require_once('../Modelo/grupo.php');

if ($_POST) {
    $modeloGrupo = new grupo();

    $codigo_gru = $_POST['codigo_gru'];
    $descripcion = strtoupper($_POST['descripcion']);
    $consecutivo = $_POST['consecutivo'];
    
    $modeloGrupo->update($codigo_gru,$descripcion,$consecutivo);
    }else{
        header('Location: ../Vista/index.php');
    }

?>