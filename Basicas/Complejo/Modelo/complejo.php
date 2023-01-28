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

    public function addHabitacion($piso,$centro_costo){
     
        $statement=$this->conexion->prepare("INSERT INTO habitaciones(id,piso,centro_costo)
                                            VALUES(:piso,:piso,:centro_costo)");
        $statement->bindParam(':piso',$piso);
        $statement->bindParam(':centro_costo',$centro_costo);
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

    public function getHabitacion($complejo){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.piso, b.descripcion FROM habitaciones AS a 
                                            INNER JOIN centros_costos AS b ON a.centro_costo = b.codigo
                                            WHERE centro_costo =:complejo");
        $statement->bindParam(':complejo',$complejo);
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
            return true;
        }
        return false;
    }

    public function existeHabitacion($piso){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM habitaciones WHERE piso = :piso");
        $statement->bindParam(":piso",$piso);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
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

    public function deleteHabitacion($id_piso){
        $statement=$this->conexion->prepare("DELETE FROM habitaciones WHERE piso = :id_piso");
        $statement->bindParam(":id_piso",$id_piso);
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