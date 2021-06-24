<?php
require_once 'conexiondb.php';
/*

author: Carlos Julio Cadena Sarasty
company: calicheSoftware
application: exampleLogin
description: clase modelo que contiene las funciones y atributos de la tabla pagina
state: Developing

*/
        // //clase que contiene los atribtos de la tabla Pagina
class pagina extends conexiondb{
    
    public $idPagina="";
    public $idModulo="";
    public $nombrePagina="";
    public $url="";
    public $eliminar="";

    //función que consulta del rol por el idRol
    public function ConsultarListaPaginasModulo($idModulo){
        //consulta para traer la información de los roles
        $sql="SELECT 
        *
         FROM pagina pag 
         WHERE  pag.idModulo=$idModulo AND pag.eliminado=false";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $result;
    }

    //función para obtener pagina del modulo
    public function obtenerPagina($idPagina){
        //consulta para traer la información de los roles
        $sql="SELECT * FROM pagina WHERE idPagina=$idPagina";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        // return $result;
        foreach($result as $registro){
            $this->idPagina=$registro['idPagina'];
            $this->idModulo=$registro['idModulo'];
            $this->nombrePagina=$registro['nombrePagina'];
            $this->url=$registro['url'];
            $this->eliminar=$registro['eliminado'];
        }
    }

    //función para registrar las paginas
    public function registrarPagina(){
        if($this->idPagina!="")
        $sql="UPDATE pagina SET nombrePagina='$this->nombrePagina', url='$this->url' WHERE idPagina=$this->idPagina";
        else
        $sql="INSERT INTO pagina (idModulo,nombrePagina,url,eliminado) VALUES ($this->idModulo,'$this->nombrePagina','$this->url',false)";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        return $result;
    }
}
?>