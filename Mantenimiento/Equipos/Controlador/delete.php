<?php

require_once('../Modelo/equipos.php');

if ($_POST) {
    $modeloEquipo = new equipo();

    $id = $_POST['id'];
    
    $modeloEquipo->delete($id);
    }else{
        header('Location: ../../index.php');
    }

?>