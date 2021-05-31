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
class modulo extends conexiondb{
    

    public $idModulo="";
    public $nombreModulo="";
    public $eliminado="";

//función que consulta los modulos registrados
    public function ConsultarListaModulo(){
        //consulta para traer la información de los roles
        $sql="SELECT * FROM modulo WHERE eliminado=0";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        //se retorna la consulta
        return $result;
    }

        //función que consulta del Modulo por el idModulo
        public function ConsultarModuloId($idModulo){
            //consulta para traer la información de los Modulo
            $sql="SELECT * FROM modulo WHERE idModulo=$idModulo";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($result as $registro){
                $this->idModulo=$registro['idModulo'];
                $this->nombreModulo=$registro['nombreModulo'];
            }
            return $this;
        }

    //función para registrar los Modulo
    public function registrarModulo(){
        if($this->idModulo!="")
        $sql="UPDATE modulo SET nombreModulo='$this->nombreModulo' WHERE idModulo=$this->idModulo";
        else
        $sql="INSERT INTO modulo (nombreModulo,eliminado) VALUES ('$this->nombreModulo',false)";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        return $result;
    }
        //función para eliminar Modulo
        public function eliminarModulo(){
            $sql="UPDATE modulo SET eliminado=true WHERE idModulo=$this->idModulo";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }

}
?>