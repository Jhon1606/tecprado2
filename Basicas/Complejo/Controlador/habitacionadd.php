<?php
require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $piso = $_POST['piso'];
    $centro_costo = $_POST['centro_costo']; 
    if($modeloComplejo->existeHabitacion($piso)){
        create_flash_message("Error", "La habitación ya existe","error");
        header('Location: ../Vista/index.php');
    }else{
        $modeloComplejo->addHabitacion($piso,$centro_costo);
    }
    
}else{
    header('Location: ../Vista/index.php');
}

?>