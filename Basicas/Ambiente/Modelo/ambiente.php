<?php 
session_start();
error_reporting(0);
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class ambiente extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo,$descripcion,$centro_costo,$tipo_ubicacion){
    $statement=$this->conexion->prepare("INSERT INTO ubicacion(codigo,descripcion,centro_costo,tipo_ubicacion)
                                        VALUES(:codigo,:descripcion,:centro_costo,:tipo_ubicacion)");
    $statement->bindParam(':codigo',$codigo);
    $statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':centro_costo',$centro_costo);
    $statement->bindParam(':tipo_ubicacion',$tipo_ubicacion);
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
        $statement=$this->conexion->prepare("SELECT a.id, a.codigo, a.descripcion, b.descripcion as centro_costo, c.descripcion as tipo_ubicacion
                                             FROM ubicacion AS a
                                             INNER JOIN centros_costos AS b ON a.centro_costo = b.codigo
                                             INNER JOIN tipo_ubicacion AS c ON a.tipo_ubicacion = c.id");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM ubicacion WHERE codigo = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        
        if($statement->fetchColumn()>0){
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function getComplejos(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getTipoA(){

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
        $statement=$this->conexion->prepare("SELECT * FROM ubicacion WHERE codigo=:ideditar");
        $statement->bindParam(":ideditar",$ideditar);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($codigo,$descripcion,$centro_costo,$tipo_ubicacion){
        $statement=$this->conexion->prepare("UPDATE ubicacion SET descripcion=:descripcion, 
                                           centro_costo=:centro_costo, tipo_ubicacion=:tipo_ubicacion WHERE codigo = :codigo");

         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':descripcion',$descripcion);
         $statement->bindParam(':centro_costo',$centro_costo);
         $statement->bindParam(':tipo_ubicacion',$tipo_ubicacion);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM ubicacion WHERE codigo = :codigo");
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