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
        public $eliminar="";

    // //función que consulta los roles registrados
        // public function ConsultarListaRoles(){
        //     //consulta para traer la información de los roles
        //     $sql="SELECT * FROM rol";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
        //     $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        //     //se retorna la consulta
        //     return $result;
        // }

            //función que consulta del rol por el idRol
            public function ConsultarListaPaginasModulo(){
                //consulta para traer la información de los roles
                $sql="SELECT * FROM pagina WHERE idModulo=$this->idModulo";
                //se ejecuta la consulta
                $result=mysqli_query($this->getConexion(),$sql);
                //se organiza el resultado de la consulta en un arreglo asociativo para buscar usando como indice el nombre de cada campo
                $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
                // foreach($result as $registro){
                //     $this->idRol=$registro['idRol'];
                //     $this->nombreRol=$registro['nombreRol'];
                // }
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
        // //función para eliminar Rol
        // public function eliminarRol(){
        //     $sql="UPDATE rol SET eliminado=true WHERE idModulo=$this->idRol";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     return $result;
        // }

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