<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class equipo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo_eqp,$centro_costo,$ambiente,$descripcion,$codigo_grupo,$codigo_linea,$serie,$modelo,$marca,$observaciones,$codigo_und,$estandar_combustible){
    $statement=$this->conexion->prepare("INSERT INTO equipo(codigo_eqp,centro_costo,ambiente,descripcion,codigo_grupo,codigo_linea,serie,modelo,marca,observaciones,codigo_und,estandar_combustible)
                                        VALUES(:codigo_eqp,:centro_costo,:ambiente,:descripcion,:codigo_grupo,:codigo_linea,:serie,:modelo,:marca,:observaciones,:codigo_und,:estandar_combustible)");
    $statement->bindParam(':codigo_eqp',$codigo_eqp);
    $statement->bindParam(':centro_costo',$centro_costo);
    $statement->bindParam(':ambiente',$ambiente);
    $statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':codigo_grupo',$codigo_grupo);
    $statement->bindParam(':codigo_linea',$codigo_linea);
    $statement->bindParam(':serie',$serie);
    $statement->bindParam(':modelo',$modelo);
    $statement->bindParam(':marca',$marca);
    $statement->bindParam(':observaciones',$observaciones);
    $statement->bindParam(':codigo_und',$codigo_und);
    $statement->bindParam(':estandar_combustible',$estandar_combustible);
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
        $statement=$this->conexion->prepare("SELECT a.codigo_eqp, b.descripcion AS centro_costo, c.descripcion AS ambiente, a.descripcion, 
                                            d.descripcion AS codigo_grupo, e.descripcion AS codigo_linea, a.serie, a.modelo, a.marca, a.observaciones,
                                            f.descripcion AS codigo_und, a.estandar_combustible
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

    public function getComplejos(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getAmbiente(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM ubicacion");
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

    public function getLinea(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM linea_equipos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getCapacidad(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM unidades");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function verAmbientesPorComplejo($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM ubicacion WHERE centro_costo=:codigo");
        $statement->bindParam(":codigo",$codigo);
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

    
    public function existe($codigo_eqp){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM equipo WHERE codigo_eqp = :codigo_eqp");
        $statement->bindParam(":codigo_eqp",$codigo_eqp);
        $statement->execute();
        if($statement->fetchColumn()>0){
            return true;
        }
        return false;
    }

    public function update($codigo_eqp,$centro_costo,$ambiente,$descripcion,$codigo_grupo,$codigo_linea,$serie,$modelo,$marca,$observaciones,$codigo_und,$estandar_combustible){
        $statement=$this->conexion->prepare("UPDATE equipo SET centro_costo=:centro_costo, ambiente=:ambiente, descripcion=:descripcion, codigo_grupo=:codigo_grupo,
                                            codigo_linea=:codigo_linea, serie=:serie, modelo=:modelo, marca=:marca, observaciones=:observaciones, codigo_und=:codigo_und,
                                            estandar_combustible=:estandar_combustible WHERE codigo_eqp = :codigo_eqp");

        $statement->bindParam(':codigo_eqp',$codigo_eqp);
        $statement->bindParam(':centro_costo',$centro_costo);
        $statement->bindParam(':ambiente',$ambiente);
        $statement->bindParam(':descripcion',$descripcion);
        $statement->bindParam(':codigo_grupo',$codigo_grupo);
        $statement->bindParam(':codigo_linea',$codigo_linea);
        $statement->bindParam(':serie',$serie);
        $statement->bindParam(':modelo',$modelo);
        $statement->bindParam(':marca',$marca);
        $statement->bindParam(':observaciones',$observaciones);
        $statement->bindParam(':codigo_und',$codigo_und);
        $statement->bindParam(':estandar_combustible',$estandar_combustible);
         
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