<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class complejo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo,$descripcion){
     
        $statement=$this->conexion->prepare("INSERT INTO centros_costos(codigo,descripcion)
                                            VALUES(:codigo,:descripcion)");
        $statement->bindParam(':codigo',$codigo);
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
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos WHERE codigo= :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM centros_costos WHERE codigo = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        if($statement->fetchColumn()>0){
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function update($codigo,$descripcion){
        $statement=$this->conexion->prepare("UPDATE centros_costos SET descripcion = :descripcion WHERE codigo = :codigo");

         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':descripcion',$descripcion);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al Editar","error");
            header('Location: ../Vista/index.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM centros_costos WHERE codigo = :codigo");
        $statement->bindParam(":codigo",$codigo);
        if($statement->execute()){
            create_flash_message("Exitoso", "Eliminado con exito","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al Eliminar","error");
            header('Location: ../Vista/index.php');
        }
    }
}

?>