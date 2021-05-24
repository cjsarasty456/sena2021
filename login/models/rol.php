<?php
require_once 'conexiondb.php';
/*

author: Carlos Julio Cadena Sarasty
company: calicheSoftware
application: exampleLogin
description: clase modelo que contiene las funciones y atributos de la tabla rol
state: Developing

*/
        // //clase que contiene los atribtos de la tabla rol
class rol extends conexiondb{
    

        public $idRol="";
        public $nombreRol="";
        public $eliminate="";

    //función que consulta los roles registrados
        public function ConsultarListaRoles(){
            //consulta para traer la información de los roles
            $sql="SELECT * FROM rol";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            //se retorna la consulta
            return $result;
        }

        //función para registrar los roles
        public function registrarRol(){
            if($this->idRol!="")
            $sql="UPDATE rol SET nombreRol=$this->nameRol, eliminado=false WHERE id=$this->idRol";
            else
            $sql="INSERT INTO rol (nombreRol,eliminado) VALUES ('$this->nombreRol',false)";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }
}

?>