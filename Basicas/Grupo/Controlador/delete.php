<?php

require_once('../Modelo/grupo.php');

if ($_POST) {
    $modeloGrupo = new grupo();

    $codigo = $_POST['codigo'];
    
    $modeloGrupo->delete($codigo);
    }else{
        header('Location: ../../index.php');
    }

?>