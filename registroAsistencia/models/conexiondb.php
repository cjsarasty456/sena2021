<?php

class conexiondb{

    //estos parameteros perment la conexión con la base datos
    //variable $servidor indica donde está ubicada la base de datos
    private $servidor="localhost";
    //variable $baseDatos almace el nombre de la base de datos
    private $baseDatos="registroAsistencia";
    //variable $usuario almacena el usuario que tiene acceso a la base datos
    private $usuario="root";
    // variable $contrasena almacena la contraseña del usuario
    private $contrasena="";
    
    private $conexion="";

    public function __construct(){
        $this->conexion();
    }

    //esta función establece conexión con la base de datos
    public function  conexion(){
        /*se llama la clase mysqli_connect y se le agrega
        los parametros para conectar la base de datos
        */
        $this->conexion=mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->contrasena,
            $this->baseDatos
        );
    }

    public function getConexion(){
        return $this->conexion;
    }

}
//se instancia el objeto conectar()
// $oConexion=new conectar();
// if($oConexion->conexion()){
//     echo "se estableció conexión correctamente";
// }else{
//     echo "error al conectar";
// }


?>