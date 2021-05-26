<?php

require_once 'conexiondb.php';

class usuario
{
    //el modificador private no permite acceder a los atributos fuera de la clase
    //atributos del modelo usuario
    //$idUser almacerá el id del usuario de la base datos
    private $idUser="";
    private $nombre="";
    private $correoElectronico="";
    private $contrasena="";

    //función que gestiona el registro de los usuario
    //las variables dentro de los parentesis son parametros que se requieren dar al momento de llamar la función
    public function registroUsuario($nombre,$correoElectronico,$contrasena){
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5=md5($contrasena);
        $oConexion=new conectar();
        //se genera la conexión con la base de datos
        $Conexion=$oConexion->conexion();
        //se crea la sentencia sql para registrar el usuario
        $sql="INSERT INTO usuario (nombre,correoElectronico,contrasena,eliminado)
        VALUES ('$nombre','$correoElectronico','$contrasenaMd5',false)";
        //ejecuta la sentencia
        $result=mysqli_query($Conexion,$sql);
        //
        return $result;
    }

}

?>