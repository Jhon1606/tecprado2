<?php

require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $id_piso = $_POST['id_piso'];
    
    $modeloComplejo->deleteHabitacion($id_piso);
}else{
    header('Location: ../Vista/index.php');
}

?>