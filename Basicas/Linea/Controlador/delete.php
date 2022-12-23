<?php

require_once('../Modelo/linea.php');

if ($_POST) {
    $modeloLinea = new linea();

    $codigo = $_POST['codigo'];
    
    $modeloLinea->delete($codigo);
    }else{
        header('Location: ../../index.php');
    }

?>