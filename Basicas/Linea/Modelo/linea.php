<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class linea extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo_linea,$descripcion,$grupo){
    $statement=$this->conexion->prepare("INSERT INTO linea_equipos (codigo_linea,descripcion,grupo)
                                        VALUES(:codigo_linea,:descripcion,:grupo)");
    $statement->bindParam(':codigo_linea',$codigo_linea);
    $statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':grupo',$grupo);
    if($statement->execute()){
        create_flash_message("Exitoso", "Registro exitoso","success");
        header('Location: ../Vista/index.php');
    }else{
        create_flash_message("Error", "Error al registrar","error");
        header('Location: ../Vista/index.php');
    }

    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM linea_equipos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getGrupo(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM grupo_equipo");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM linea_equipos WHERE codigo_linea = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        if($statement->fetchColumn()>0){
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function getById($ideditar){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM linea_equipos WHERE codigo_linea=:ideditar");
        $statement->bindParam(":ideditar",$ideditar);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($codigo_linea,$descripcion,$grupo){
        $statement=$this->conexion->prepare("UPDATE linea_equipos SET descripcion=:descripcion, grupo=:grupo WHERE codigo_linea = :codigo_linea");

         $statement->bindParam(':codigo_linea',$codigo_linea);
         $statement->bindParam(':descripcion',$descripcion);
         $statement->bindParam(':grupo',$grupo);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM linea_equipos WHERE codigo_linea = :codigo");
        $statement->bindParam(":codigo",$codigo);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al eliminar","error");
            header('Location: ../Vista/index.php');
        }
    }
}

?>