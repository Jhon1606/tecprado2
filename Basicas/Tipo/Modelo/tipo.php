<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class tipo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($descripcion){
    $statement=$this->conexion->prepare("INSERT INTO tipo_ubicacion (descripcion)
                                        VALUES(:descripcion)");
    $statement->bindParam(':descripcion',$descripcion);
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
        $statement=$this->conexion->prepare("SELECT * FROM tipo_ubicacion");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($ideditar){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM tipo_ubicacion WHERE id=:ideditar");
        $statement->bindParam(":ideditar",$ideditar);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$descripcion){
        $statement=$this->conexion->prepare("UPDATE tipo_ubicacion SET descripcion=:descripcion WHERE id = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':descripcion',$descripcion);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM tipo_ubicacion WHERE id = :id");
        $statement->bindParam(":id",$id);
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