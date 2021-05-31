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
    class user extends conexiondb{

        private $idUser="";
        public $name="";
        private $email="";
        private $password="";
        private $resetContrasena="";
        private $idRol="";

        public function getIdUser(){
            return $this->idUser;
        }
        public function getNameUser(){
            return $this->name;
        }
        //función para obtener el rol del usuario
        public function getRolUser($idUser){
            $sql="SELECT * FROM usuario WHERE idRol=$idUser";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($result as $registro)
            {
                //se registra la consulta en los parametros
                $this->idRol=$registro['idRol'];
            }
            return $this->idRol;
        }

        public function login($email, $password){
            //encripta la contraseña utilizando el algoritmo criptografico md5
            //convirtiendo el texto en una cadena de caracteres númerico de 32 caracteres.
            $md5Password=md5($password);
            //consulta para retornar un solo registro
            $sql="SELECT * FROM usuario WHERE correoElectronico='$email' and contrasena='$md5Password'";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($result as $registro){
                //se registra la consulta en los parametros
                $this->idUser=$registro['idUser'];
                $this->name=$registro['nombre'];
                return true;
            }
            return false;
        }
        public function register($name,$email,$password,$confirmPassword){
            //encripta la contraseña utilizando el algoritmo criptografico md5
            //convirtiendo el texto en una cadena de caracteres númerico de 32 caracteres.
            $md5Password=md5($password);
            //consulta para retornar un solo registro
            $sql="INSERT INTO usuario (nombre,correoElectronico,contrasena,resetContrasena,idRol,eliminado)
            VALUE ('$name','$email','$md5Password',0,NULL,false)";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            return $result;
        }
        public function checkEmail($email){
            //se verifica si el correo electronico existe en los usuarios
            $sql="SELECT * FROM usuario WHERE correoElectronico='$email'";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function disableUser(){
            $sql="UPDATE usuario SET eliminado=true WHERE idUser=$this->getIdUser";
            //se ejecuta la consulta
            $result=mysqli_query($this->getConexion(),$sql);
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }

    }
?>