<?php
/*

author: Carlos Julio Cadena Sarasty
company: calicheSoftware
application: exampleLogin
description: clase que contiene los atributos y funciones para la gestión
de usuarios de la aplicación y comunicación con la base de datos
state: Developing

*/  

require_once 'conexiondb.php';
//clase  que contiene los atributos del usuario y funciones del usuario
    class recuperacionContrasena extends conexiondb{

        public $idRecuperacion="";
        public $email="";
        public $codigo="";
        public $habilitado=false;
        public $fechaRecuperacion="";

        public function registrarRecuperacionContrasena(){
            //se genera la consulta necesaria para registrar la recuperación
            $sql="INSERT INTO recuperacioncontrasena (email,codigoRecuperacion,habilitado,fechaRecuperacion)
            VALUE ('$this->email','$this->codigo',$this->habilitado,NOW())";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }

        //función que genera la consulta si existe una solicitud de recuperación habilitada
        public function verificarCodigo(){
            //se genera la consulta para verificar si el codigo y el correo electronico existe
            $sql="SELECT * FROM recuperacioncontrasena 
                WHERE email='$this->email' and codigoRecuperacion='$this->codigo' and habilitado=true";
            //se ejecuta la sentencia
            $result=mysqli_query($this->getConexion(),$sql);
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            if(sizeof($result)>0){
                //se genera la consulta para verificar si el codigo y el correo electronico existe
                $sql="UPDATE recuperacioncontrasena SET habilitado=FALSE
                    WHERE email='$this->email' and codigoRecuperacion='$this->codigo' and habilitado=TRUE";
                //se ejecuta la sentencia
                $result=mysqli_query($this->getConexion(),$sql);
                return $result;
            }
            return false;
        }

        // public function login($email, $password){
        //     //encripta la contraseña utilizando el algoritmo criptografico md5
        //     //convirtiendo el texto en una cadena de caracteres númerico de 32 caracteres.
        //     $md5Password=md5($password);
        //     //consulta para retornar un solo registro
        //     $sql="SELECT * FROM usuario WHERE correoElectronico='$email' and contrasena='$md5Password'";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        //     foreach($result as $registro){
        //         //se registra la consulta en los parametros
        //         $this->idUser=$registro['idUser'];
        //         $this->name=$registro['nombre'];
        //         return true;
        //     }
        //     return false;
        // }
        // public function register($name,$email,$password,$confirmPassword){
        //     //encripta la contraseña utilizando el algoritmo criptografico md5
        //     //convirtiendo el texto en una cadena de caracteres númerico de 32 caracteres.
        //     $md5Password=md5($password);
        //     //consulta para retornar un solo registro
        //     $sql="INSERT INTO usuario (nombre,correoElectronico,contrasena,resetContrasena,idRol,eliminado)
        //     VALUE ('$name','$email','$md5Password',0,NULL,false)";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     return $result;
        // }
        // public function checkEmail($email){
        //     //se verifica si el correo electronico existe en los usuarios
        //     $sql="SELECT * FROM usuario WHERE correoElectronico='$email'";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        //     return $result;
        // }
        // public function disableUser(){
        //     $sql="UPDATE usuario SET eliminado=true WHERE idUser=$this->getIdUser";
        //     //se ejecuta la consulta
        //     $result=mysqli_query($this->getConexion(),$sql);
        //     $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        //     return $result;
        // }

    }
?>