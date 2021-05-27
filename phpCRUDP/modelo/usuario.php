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

    //para obtener la información de IdUser
    public function getIdUser(){
        return $this->idUser;
    }
    public function getNombreUser(){
        return $this->nombre;
    }
    public function setIdUser($idUser){
        $this->idUser=$idUser;
    }
    public function setNombreUser($nombre){
        $this->nombre=$nombre;
    }

    //función que gestiona el registro de los usuario
    //las variables dentro de los parentesis son parametros que se requieren dar al momento de llamar la función
    public function registroUsuario($nombre,$correoElectronico,$contrasena){
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5=md5($contrasena);
        $oConexion=new conectar();
        //se genera la conexión con la base de datos
        $Conexion=$oConexion->conexion();
        //se crea la sentencia sql para registrar el usuario
        $sql="INSERT INTO usuario (nombre,correoElectronico,contrasena,resetContrasena,idRol,eliminado)
        VALUES ('$nombre','$correoElectronico','$contrasenaMd5',0,null,false)";
        //ejecuta la sentencia
        $result=mysqli_query($Conexion,$sql);
        //
        return $result;
    }
    //se verifica si ya hay un registro con el correo electronico 
    public function consultarCorreoElectronico($correoElectronico){
        //generar la conexión
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();
        $sql="SELECT * FROM usuario WHERE correoElectronico='$correoElectronico'";
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return count($result);

    }
       //función para consultar si el correo electronico y la contraseña son correctos
       //para buscar el registro
       public function iniciarSesion($correoElectronico,$contrasena){
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5=md5($contrasena);
        //generar la conexión
        $oConexion=new conectar();
        //establece conexión con la base datos
        $conexion=$oConexion->conexion();
        //sentencia para verificar correo y contraseña del usiario
        $sql="SELECT * FROM usuario WHERE correoElectronico='$correoElectronico' and contrasena='$contrasenaMd5'";
        //se ejecuta la sentencia
        $result=mysqli_query($conexion,$sql);
        //se almacena la consulta en un arreglo asociativo
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            $this->idUser=$registro['idUser'];
            $this->nombre=$registro['nombre'];
        }
        return count($result);

    }

}

?>