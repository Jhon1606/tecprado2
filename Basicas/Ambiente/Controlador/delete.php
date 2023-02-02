<?php

require_once('../Modelo/ambiente.php');

if ($_POST) {
    $modeloAmbiente = new ambiente();

    $codigo = $_POST['codigo'];
    
    $modeloAmbiente->delete($codigo);
    }else{
        header('Location: ../../index.php');
    }

?>