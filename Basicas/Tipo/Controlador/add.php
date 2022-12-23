<?php
require_once('../Modelo/tipo.php');

if ($_POST) {
    $modeloTipo = new tipo();
    $descripcion = strtoupper($_POST['descripcion']); 
    
    $modeloTipo->add($descripcion);
   
    }else{
        header('Location: ../../index.php');
    }

?>