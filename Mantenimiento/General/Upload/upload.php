<?php 



require_once('../../../conexion.php');



class upload extends conexion{



    public function __construct(){

        $this->conexion=parent::__construct();

    }  



    public function subirArchivo($nombre_nuevo, $archivo){

        $temporal = $archivo["tmp_name"];

        $nombre = $archivo["name"];

        $peso = $archivo["size"];

        $tipo = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));



        $carpeta = "../Docs/";

        $nombre_nuevo_tipo = $nombre_nuevo . "." . $tipo;

        $url = $carpeta . $nombre_nuevo_tipo;
echo $url;


        $sw = 1;



        if($peso > 0){



            if ($peso > 10000000) {



                $sw = 0;



            }



            if($sw == 0) {



                return "";



            } else {



                if(move_uploaded_file($temporal, $url)) {



                    return $nombre_nuevo_tipo;



                }

            }

        }

        return "";

    }

}



?>