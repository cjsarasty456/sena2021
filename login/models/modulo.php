<?php
require_once 'conexiondb.php';
/*

author: Carlos Julio Cadena Sarasty
company: calicheSoftware
application: exampleLogin
description: clase modelo que contiene las funciones y atributos de la tabla modulo
state: Developing

*/
        // //clase que contiene los atribtos de la tabla modulo
class rol extends conexiondb{
    

        public $idModulo="";
        public $nombreModulo="";
        public $eliminado="";

    //función que consulta los modulos registrados
        public function ConsultarListaModulo(){
            //consulta para traer la información de los roles
            $sql="SELECT * FROM modulo";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            //se retorna la consulta
            return $result;
        }

            función que consulta del rol por el idRol
            public function ConsultarModuloId(){
                //consulta para traer la información de los roles
                $sql="SELECT * FROM modulo WHERE idModulo=$this->idModulo";
                //se ejecuta la consulta
                $result=mysqli_query($this->getConexion(),$sql);
                //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
                $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
                foreach($result as $registro){
                    $this->idRol=$registro['idModulo'];
                    $this->nombreRol=$registro['nombreModulo'];
                }
            }

        //función para registrar los roles
        public function registrarModulo(){
            if($this->idRol!="")
            $sql="UPDATE modulo SET nombreModulo='$this->nombreRol', eliminado=false WHERE idRol=$this->idModulo";
            else
            $sql="INSERT INTO modulo (nombreModulo,eliminado) VALUES ('$this->nombreModulo',false)";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }

        // public function ObtenerUsuariosRol($idRol){
        //     //se Consulta los usuario por rol
        //     $sql="SELECT u.idUser, u.nombre FROM rol r INNER JOIN usuario u on r.idRol=u.idRol WHERE r.idRol=$idRol";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        //     return $result;
        // }
}

?>