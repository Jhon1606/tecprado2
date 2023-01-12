<?php 
session_start();
require_once("../../../conexion.php");
require_once("../../../Helpers/alert.php");

class equipo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo_eqp,$centro_costo,$ambiente,$habitacion,$descripcion,$codigo_grupo,$codigo_linea,$serie,$modelo,$marca,$observaciones,$codigo_und,$estandar_combustible,$fecha_ultimo_mtto){
        $statement=$this->conexion->prepare("INSERT INTO equipo(codigo_eqp,centro_costo,ambiente,habitacion,descripcion,codigo_grupo,codigo_linea,serie,modelo,marca,observaciones,codigo_und,estandar_combustible,fecha_ultimo_mtto)
                                            VALUES(:codigo_eqp,:centro_costo,:ambiente,:habitacion,:descripcion,:codigo_grupo,:codigo_linea,:serie,:modelo,:marca,:observaciones,:codigo_und,:estandar_combustible,:fecha_ultimo_mtto)");
        $statement->bindParam(':codigo_eqp',$codigo_eqp);
        $statement->bindParam(':centro_costo',$centro_costo);
        $statement->bindParam(':ambiente',$ambiente);
        $statement->bindParam(':habitacion',$habitacion);
        $statement->bindParam(':descripcion',$descripcion);
        $statement->bindParam(':codigo_grupo',$codigo_grupo);
        $statement->bindParam(':codigo_linea',$codigo_linea);
        $statement->bindParam(':serie',$serie);
        $statement->bindParam(':modelo',$modelo);
        $statement->bindParam(':marca',$marca);
        $statement->bindParam(':observaciones',$observaciones);
        $statement->bindParam(':codigo_und',$codigo_und);
        $statement->bindParam(':estandar_combustible',$estandar_combustible);
        $statement->bindParam(':fecha_ultimo_mtto',$fecha_ultimo_mtto);
        if($statement->execute()){
            create_flash_message("Exitoso", "Registro exitoso","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al registrar","error");
            header('Location: ../Vista/index.php');
        }
    }

    public function addArchivo($equipo,$nomdocumento,$comentario,$archivo){
        $statement=$this->conexion->prepare("INSERT INTO equipos_doc (equipo, nomdocumento, comentario, archivo)
                                            VALUES(:equipo, :nomdocumento, :comentario, :archivo)");
    
        $statement->bindParam(':equipo',$equipo);
        $statement->bindParam(':nomdocumento',$nomdocumento);
        $statement->bindParam(':comentario', $comentario);
        $statement->bindParam(':archivo', $archivo);
    
        if($statement->execute()){
            create_flash_message("Exitoso", "El archivo se subió correctamente","success");
            header('Location: ../Vista/index.php');
        }else{
            create_flash_message("Error", "Error al subir archivo","error");
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

    public function getDocs($equipo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM equipos_doc WHERE equipo=:equipo");
        $statement->bindParam(":equipo",$equipo);
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

    public function getHabitacion(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM habitaciones");
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

    public function verParametroPorAmbiente($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM parametros WHERE valor=:codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function verLineaPorGrupo($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM linea_equipos WHERE grupo=:codigo");
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
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function update($codigo_eqp,$centro_costo,$ambiente,$habitacion,$descripcion,$codigo_grupo,$codigo_linea,$serie,$modelo,$marca,$observaciones,$codigo_und,$estandar_combustible,$fecha_ultimo_mtto){
        $statement=$this->conexion->prepare("UPDATE equipo SET centro_costo=:centro_costo, ambiente=:ambiente, habitacion=:habitacion, descripcion=:descripcion, codigo_grupo=:codigo_grupo,
                                            codigo_linea=:codigo_linea, serie=:serie, modelo=:modelo, marca=:marca, observaciones=:observaciones, codigo_und=:codigo_und,
                                            estandar_combustible=:estandar_combustible, fecha_ultimo_mtto=:fecha_ultimo_mtto WHERE codigo_eqp = :codigo_eqp");

        $statement->bindParam(':codigo_eqp',$codigo_eqp);
        $statement->bindParam(':centro_costo',$centro_costo);
        $statement->bindParam(':ambiente',$ambiente);
        $statement->bindParam(':habitacion',$habitacion);
        $statement->bindParam(':descripcion',$descripcion);
        $statement->bindParam(':codigo_grupo',$codigo_grupo);
        $statement->bindParam(':codigo_linea',$codigo_linea);
        $statement->bindParam(':serie',$serie);
        $statement->bindParam(':modelo',$modelo);
        $statement->bindParam(':marca',$marca);
        $statement->bindParam(':observaciones',$observaciones);
        $statement->bindParam(':codigo_und',$codigo_und);
        $statement->bindParam(':estandar_combustible',$estandar_combustible);
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

    public function deleteFile($id){
        $statement=$this->conexion->prepare("DELETE FROM equipos_doc WHERE iddocumento = :id");
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