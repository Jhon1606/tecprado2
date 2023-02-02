<?php

require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $codigo = $_POST['codigo'];
    
    $modeloComplejo->delete($codigo);
    }else{
        header('Location: ../../index.php');
    }

?>