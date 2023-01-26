<?php
require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $piso = $_POST['piso'];
    $centro_costo = $_POST['centro_costo']; 
    if($modeloComplejo->existe($codigo)){
        create_flash_message("Error", "El código existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloComplejo->add($piso,$centro_costo);
    }
    
    }else{
        header('Location: ../Vista/index.php');
    }

?>