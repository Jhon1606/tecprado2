<?php
require_once("../Modelo/usuarios.php");

if ($_POST) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $modelo = new usuarios();
    $modelo->addUser($nombre,$usuario,$password);
        
   }else{
        header('Location: ../../register.php');
   }

?>