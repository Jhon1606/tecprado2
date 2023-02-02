<?php

require_once('../Modelo/tipo.php');

if ($_POST) {
    $modeloTipo = new tipo();

    $id = $_POST['id'];
    $descripcion = strtoupper($_POST['descripcion']);
    
    $modeloTipo->update($id,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>