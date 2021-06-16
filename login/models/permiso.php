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
class permiso extends conexiondb{
    

        public $idRol="";
        public $idModulo="";
        public $idPagina="";

        //función registrar el permiso de pagina
        public function registroPermiso(){
            //consulta para traer la información de los roles
            $sql="INSERT INTO permiso (idRol,idModulo,idPagina) VALUES ($this->idRol,$this->idModulo,$this->idPagina)";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }
        //función eliminar permisos por Rol de pagina
        public function eliminarPorRolPermisos(){
            //consulta para traer la información de los roles
            $sql="DELETE FROM permiso WHERE idRol=$this->idRol";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }

        public function verificarPermiso(){
            $sql="SELECT * FROM permiso WHERE idRol=$this->idRol AND idPagina=$this->idPagina";
            $result=mysqli_query($this->getConexion(),$sql);
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;       
        }
    //         //función que consulta del rol por el idRol
    //         public function ConsultarRolId(){
    //             //consulta para traer la información de los roles
    //             $sql="SELECT * FROM rol WHERE idRol=$this->idRol";
    //             //se ejecuta la consulta
    //             $result=mysqli_query($this->getConexion(),$sql);
    //             //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
    //             $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    //             foreach($result as $registro){
    //                 $this->idRol=$registro['idRol'];
    //                 $this->nombreRol=$registro['nombreRol'];
    //             }
    //         }
}
?>