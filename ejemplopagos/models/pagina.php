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
    public function ConsultarListaPaginasModulo(){
        //consulta para traer la información de los roles
        $sql="SELECT 
        pag.idPagina,pag.idModulo,pag.nombrePagina,
        per.idRol
         FROM pagina pag LEFT JOIN permiso per on pag.idPagina=per.idPagina WHERE pag.idModulo=$this->idModulo";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $result;
    }

    //función para obtener pagina del modulo
    public function obtenerPagina(){
        //consulta para traer la información de los roles
        $sql="SELECT * FROM pagina WHERE idPagina=$this->idPagina";
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
        $sql="UPDATE pagina SET nombreRol='$this->nombreRol' WHERE idRol=$this->idPagina";
        else
        $sql="INSERT INTO pagina (idModulo,nombrePagina,eliminado) VALUES ($this->idModulo,'$this->nombrePagina',false)";
        //se ejecuta la consulta
        $result=mysqli_query($this->getConexion(),$sql);
        return $result;
    }
}
?>