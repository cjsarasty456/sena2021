<?php

/*

author: Carlos Julio Cadena Sarasty
company: calicheSoftware
application: exampleLogin
description: classe controllador de usuario que gestiona las
sesiones dentro de la plataforma
state: Developing

*/

require_once '../models/user.php';
$oUser=new userController();
// if(isset($_POST['funcion'])) $funcion=$_POST['funcion'];
// if(isset($_['funcion'])) $funcion=$_POST['funcion'];
$funcion=$_REQUEST['funcion'];

switch($funcion){
    case "inicioSesion":
        $email=$_POST['email'];
        $password=$_POST['password'];
        $oUser->login($email,$password);
        break;
    case "registrar":
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        $oUser->register($name,$email,$password,$confirmPassword);
        break;
    case "cerrarSesion":
        $oUser->logOut();
}

class userController {

    public function login($email,$password){
        session_start();
        $oUser=new user();
        $result=$oUser->login($email,$password);
        
        if($result==1){
            $_SESSION["idUser"]=$oUser->getIdUser();
        $_SESSION["nameUser"]=$oUser->getNameUser();
            // echo "inicio correcto";
            // echo $_SESSION["nameUser"];
            header("Location: ../views/home/index.php");
        } 
        else{ 
            // echo "error en el inicio";
            header("Location: ../views/config/login.php?mensaje=usuario o contraseña incorrecto");
        }
    }

    public function register($name,$email,$password,$confirmPassword){
        $oUser=new user();
        //se verifica si el correo electronico ya existe en el sistema
        $checkEmail=$result=$oUser->checkEmail($email);
        if($password!=$confirmPassword) header("Location: ../views/config/register.php?name=$name&email=$email&mensaje=Las contraseñas registradas no coinciden");
        elseif(sizeof($checkEmail)>0){ 
            header("Location: ../views/config/register.php?name=$name&email=$email&mensaje=El correo ya existe, si olvidó su contraseña intente restablecerla");
        }else{
            $result=$oUser->register($name,$email,$password,$confirmPassword);
            //se indica que se presentó un error al iniciar sesión
            if(!$result) header("Location: ../views/config/register.php?name=$name&email=$email&mensaje=Error al registrar el usuario");
            //se indica que se registró correctamente y se redirije al login
            else header("Location: ../views/config/login.php?mensaje=se registró correctamente");
        }
        
    }

    public function logOut(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../views/config/login.php");
    }
}

?>