<?php

require_once('../Modelo/equipos.php');

if ($_POST) {
    $modeloEquipo = new equipo();

    $equipo = $_POST['equipo'];
    $nomdocumento = $_POST['nomdocumento'];
    $comentario = $_POST['comentario'];
    
    $temporal = $_FILES['arch']["tmp_name"];
    $nombre = $_FILES['arch']["name"];
    $peso = $_FILES['arch']["size"];
    $tipo = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

    $carpeta = "../../General/Docs/";
    $nombre_nuevo_tipo = $nomdocumento . "." . $tipo;
    $url = $carpeta . $nombre_nuevo_tipo;

    move_uploaded_file($temporal, $url); 

    $modeloEquipo->addArchivo($equipo,$nomdocumento,$comentario,$nombre_nuevo_tipo);
    }else{
        header('Location: ../../index.php');
    }

?>