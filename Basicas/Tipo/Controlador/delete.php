<?php

require_once('../Modelo/tipo.php');

if ($_POST) {
    $modeloTipo = new tipo();

    $id = $_POST['id'];
    
    $modeloTipo->delete($id);
    }else{
        header('Location: ../../index.php');
    }

?>