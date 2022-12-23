<?php

require_once("../../Helpers/alert.php");
require_once("../../conexion.php");
session_start();


class usuarios extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function login($usuario,$password){

    $rows=null;
    $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE user_id = :usuario AND clave = :contrasena");
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':contrasena',$password);
    $statement->execute();
    if ($statement->rowCount()==1){
        $result=$statement->fetch();
        $_SESSION['Nombre'] = $result["user_nombre"];
        $_SESSION['Id'] = $result["empleado"];
        $_SESSION['Perfil'] = $result["perfil"];
        return true;
    }
        // create_flash_message("Error", "Los datos son incorrectos","error");
        return false;
    }

    public function addUser($nombre,$usuario,$password){
     
        $statement=$this->conexion->prepare("INSERT INTO usuarios(user_id,user_nombre,clave)
                                            VALUES(:nombre,:usuario,:contrasena)");
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':contrasena',$password);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../../index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../../register.php');
        }

    }

    public function salir(){
        // $_SESSION['Id'] = null;
        // $_SESSION['Nombre'] = null;
        // $_SESSION['Perfil'] = null;
        session_start();
        session_destroy();
        header('Location: ../../index.php');
    }
        
    }




?>