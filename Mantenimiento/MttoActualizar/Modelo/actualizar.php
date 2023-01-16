<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class actualizar extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function addMtto($codigo_eqp,$fecha_mtto,$descripcion_mtto){
        $statement=$this->conexion->prepare("INSERT INTO historial_mtto(codigo_eqp,fecha_mtto,descripcion)
                                            VALUES(:codigo_eqp,:fecha_mtto,:descripcion_mtto)");
        $statement->bindParam(':codigo_eqp',$codigo_eqp);
        $statement->bindParam(':fecha_mtto',$fecha_mtto);
        $statement->bindParam(':descripcion_mtto',$descripcion_mtto);
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
        $statement=$this->conexion->prepare("SELECT a.codigo_eqp, b.descripcion AS centro_costo, c.descripcion AS ambiente, a.habitacion, a.descripcion, 
                                            d.descripcion AS codigo_grupo, e.descripcion AS codigo_linea, a.serie, a.modelo, a.marca, a.observaciones,
                                            a.fecha_ultimo_mtto, f.descripcion AS codigo_und, a.estandar_combustible
                                            FROM equipo AS a 
                                            INNER JOIN centros_costos AS b ON a.centro_costo = b.codigo
                                            INNER JOIN ubicacion AS c ON a.ambiente = c.id
                                            INNER JOIN grupo_equipo AS d ON a.codigo_grupo = d.codigo_gru
                                            INNER JOIN linea_equipos AS e ON a.codigo_linea= e.codigo_linea
                                            INNER JOIN unidades AS f ON a.codigo_und= f.codigo_und");                 
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function buscar($consulta){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.codigo_eqp, b.descripcion AS centro_costo, c.descripcion AS ambiente, a.habitacion, a.descripcion, 
                                            d.descripcion AS codigo_grupo, e.descripcion AS codigo_linea, a.serie, a.modelo, a.marca, a.observaciones,
                                            a.fecha_ultimo_mtto, f.descripcion AS codigo_und, a.estandar_combustible
                                            FROM equipo AS a 
                                            INNER JOIN centros_costos AS b ON a.centro_costo = b.codigo
                                            INNER JOIN ubicacion AS c ON a.ambiente = c.id
                                            INNER JOIN grupo_equipo AS d ON a.codigo_grupo = d.codigo_gru
                                            INNER JOIN linea_equipos AS e ON a.codigo_linea= e.codigo_linea
                                            INNER JOIN unidades AS f ON a.codigo_und= f.codigo_und 
                                            WHERE a.codigo_eqp LIKE concat('%',:consulta,'%') OR b.descripcion LIKE concat('%',:consulta,'%')
                                            OR c.descripcion LIKE concat('%',:consulta,'%') OR a.habitacion LIKE concat('%',:consulta,'%') 
                                            OR a.descripcion LIKE concat('%',:consulta,'%') OR d.descripcion LIKE concat('%',:consulta,'%')");
        $statement->bindParam(':consulta',$consulta);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM equipo WHERE codigo_eqp=:codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getByIdMtto($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM historial_mtto WHERE codigo_eqp=:codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function existe($codigo_eqp){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM equipo WHERE codigo_eqp = :codigo_eqp");
        $statement->bindParam(":codigo_eqp",$codigo_eqp);
        $statement->execute();
        if($statement->fetchColumn()>0){
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function updateMtto($codigo_eqp,$descripcion,$fecha_ultimo_mtto){
        $statement=$this->conexion->prepare("UPDATE equipo SET descripcion=:descripcion, fecha_ultimo_mtto=:fecha_ultimo_mtto WHERE codigo_eqp = :codigo_eqp");

        $statement->bindParam(':codigo_eqp',$codigo_eqp);
        $statement->bindParam(':descripcion',$descripcion);
        $statement->bindParam(':fecha_ultimo_mtto',$fecha_ultimo_mtto);
         
         if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
         }else{
            create_flash_message("Error", "Error al editar","error");
             header('Location: ../Vista/index.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM equipo WHERE codigo_eqp = :codigo");
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