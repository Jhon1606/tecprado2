<?php

require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $codigo_und = $_POST['codigo_und'];
    $descripcion = strtoupper($_POST['descripcion']);
    
    $modeloUnidades->update($codigo_und,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>