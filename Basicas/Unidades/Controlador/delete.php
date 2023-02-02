<?php

require_once('../Modelo/unidades.php');

if ($_POST) {
    $modeloUnidades = new unidades();

    $codigo = $_POST['codigo'];
    
    $modeloUnidades->delete($codigo);
    }else{
        header('Location: ../../index.php');
    }

?>