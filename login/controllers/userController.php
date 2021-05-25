<?php


/*

author: Carlos Julio Cadena Sarasty
company: calicheSoftware
application: exampleLogin
description: classe controllador de usuario que gestiona las
sesiones dentro de la plataforma
state: Developing

*/
if(file_exists("../../controllers/mensajeController.php"))
{
require_once '../../controllers/mensajeController.php';
require_once '../../config/config.php';
}
$oUser=new userController();
$funcion="";
if(isset($_POST['funcion'])){
    $funcion=$_POST['funcion'];
} 
if(isset($_GET['funcion']))
{
    $funcion=$_GET['funcion'];
}

switch($funcion){
    case "inicioSesion":
        $email=$_POST['email'];
        $password=$_POST['password'];
        return $oUser->login($email,$password);
        break;
    case "registrar":
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        return $oUser->register($name,$email,$password,$confirmPassword);
        break;
    case "cerrarSesion":
        return $oUser->logOut();
        break;
    case "registrarRol":
        return $oUser->registrarRol();
        break;
}

class userController {

    public function login($email,$password){
        require_once '../../models/user.php';
        $oUser=new user();
        $result=$oUser->login($email,$password);
        
        if($result==1){
            $_SESSION["idUser"]=$oUser->getIdUser();
        $_SESSION["nameUser"]=$oUser->getNameUser();
            // echo "inicio correcto";
            // echo $_SESSION["nameUser"];
            header("Location: ../../views/home/index.php");
        } 
        else{ 
            // echo "error en el inicio";
            $oMensaje=new mensaje();
            $tituloMensaje="Error";
            $tipoMensjae=$oMensaje->tipoPeligo;
            $mensaje="usuario o contraseña incorrecto";
            header("Location: ../../views/user/login.php?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensjae&mensaje=$mensaje");
        }
    }

    public function register($name,$email,$password,$confirmPassword){
        require_once '../../models/user.php';
        $oUser=new user();
        //se verifica si el correo electronico ya existe en el sistema
        $checkEmail=$result=$oUser->checkEmail($email);
        if($password!=$confirmPassword) header("Location: ../../views/user/register.php?name=$name&email=$email&mensaje=Las contraseñas registradas no coinciden");
        elseif(sizeof($checkEmail)>0){ 
            header("Location: ../../views/user/register.php?name=$name&email=$email&mensaje=El correo ya existe, si olvidó su contraseña intente restablecerla");
        }else{
            $result=$oUser->register($name,$email,$password,$confirmPassword);
            //se indica que se presentó un error al iniciar sesión
            if(!$result) header("Location: ../../views/user/register.php?name=$name&email=$email&mensaje=Error al registrar el usuario");
            //se indica que se registró correctamente y se redirije al login
            else header("Location: ../../views/user/login.php?mensaje=se registró correctamente");
        }
    }
    public function logOut(){
        //se inicia sesión
        session_start();
        //se eliminan las variables de la sesión
        session_unset();
        //se destruyel a sesión
        session_destroy();
        header("Location: ../");
    }
    public function detalleRol($idRol){
        //se agrega la referencia del modelo de base datos Rol
        require_once '../../models/rol.php';
        //se instancia el objeto Rol
        $oRol=new rol();
        //se asigna el valor en el atributo idRol que se recibe por el parametro
        $oRol->idRol=$idRol;
        //se consulta la información del Rol
        $oRol->ConsultarRolId();
        //se retorna el objeto del rol con la información del rol
        return $oRol;
    }
    //función para consultar la lista de Rol 
    public function ListaRoles(){
        require_once '../../models/rol.php';
        $oRol=new rol();
        return $oRol->ConsultarListaRoles();
    }
    //Función para registrar el rol nuevo o editar
    //incompleta
    public function registrarRol(){
        require_once '../../models/rol.php';          
        $oRol=new rol();
        $oRol->idRol=$_POST['idRol'];
        $oRol->nombreRol=$_POST['nombreRol'];
        $oMensaje=new mensaje();
        if($oRol->registrarRol())
        {
            $tituloMensaje="Excelente";
            $tipoMensaje=$oMensaje->tipoCorrecto;
            $mensaje="usuario o contraseña incorrecto";
            $host  = $_SERVER['HTTP_HOST'];
            $url=urlRaiz."/view/user/detalleRol";
            header("Location: $url");
            // header("Location: ../../views/user/detalleRol.php?idRol=$oRol->idRol&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }
        else{
            $tituloMensaje="Error";
            $tipoMensjae=$oMensaje->tipoPeligo;
            $mensaje="Error al guardar el Rol";
        header("Location: ../../views/user/detalleRol.php?idRol=$oRol->idRol&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensjae&mensaje=$mensaje");
        }
        // return ;
    }
    //función para retornar los usuario relacionados con un rol
    public function ObtenerUsuariosRol($idRol){
        require_once '../../models/rol.php';          
        $oRol=new rol();
        return $oRol->ObtenerUsuariosRol($idRol);
    }
}

?>