<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class grupo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo_gru,$descripcion,$consecutivo){
    $statement=$this->conexion->prepare("INSERT INTO grupo_equipo (codigo_gru,descripcion,consecutivo)
                                        VALUES(:codigo_gru,:descripcion,:consecutivo)");
    $statement->bindParam(':codigo_gru',$codigo_gru);
    $statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':consecutivo',$consecutivo);
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
        $statement=$this->conexion->prepare("SELECT * FROM grupo_equipo");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM grupo_equipo WHERE codigo_gru = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    
    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM grupo_equipo WHERE codigo_gru = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        if($statement->fetchColumn()>0){
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function update($codigo_gru,$descripcion,$consecutivo){
        $statement=$this->conexion->prepare("UPDATE grupo_equipo SET descripcion=:descripcion,
                                            consecutivo=:consecutivo WHERE codigo_gru = :codigo_gru");

         $statement->bindParam(':codigo_gru',$codigo_gru);
         $statement->bindParam(':descripcion',$descripcion);
         $statement->bindParam(':consecutivo',$consecutivo);
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
             header('Location: ../Vista/edit.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM grupo_equipo WHERE codigo_gru = :codigo");
        $statement->bindParam(":codigo",$codigo);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al eliminar","error");
            header('Location: ../Vista/delete.php');
        }
    }
}

?>

