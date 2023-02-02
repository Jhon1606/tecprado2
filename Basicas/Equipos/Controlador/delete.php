<?php

require_once('../Modelo/equipos.php');

if ($_POST) {
    $modeloEquipo = new equipo();

    $codigo = $_POST['codigo'];
    
    $modeloEquipo->delete($codigo);
    }else{
        header('Location: ../../index.php');
    }

?>