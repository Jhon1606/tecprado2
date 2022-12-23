<?php
require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $codigo_und = $_POST['codigo_und'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $modeloUnidades->existe($codigo_und);
    
    $modeloUnidades->add($codigo_und,$descripcion);
   
    }else{
        header('Location: ../../index.php');
    }

?>