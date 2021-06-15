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
}else{
    require_once '../controllers/mensajeController.php';
    require_once '../config/config.php';
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
    case "recuperarContrasena":
        return $oUser->recuperarContrasena();
    break;
    case "restablecerContrasena":
        return $oUser->restablecerContrasena();
    break;
    case "actualizarPermisos":
        return $oUser->actualizarPermisos();
    break;
    case "registrarRol":
        return $oUser->registrarRol();
    break;
    case "eliminarRol":
        return $oUser->eliminarRol();
    break;
    case "registrarModulo":
        return $oUser->registrarModulo();
    break;
    case "eliminarModulo":
        return $oUser->eliminarModulo();
    break;
    case "registrarPagina":
        return $oUser->registrarPagina();
    break;
}

class userController {
    
//Sección gestión usuario

    //función para consultar el rol del usuario 
    public function obtenerRolUsuario(){
        require_once '../../models/user.php';
        $oUser=new user();
        // $oUser->idUser=$_SESSION["idUser"];
        return $oUser->getRolUser($_SESSION["idUser"]);
    }
    public function login($email,$password){
        $oMensaje=new mensaje();
        session_start();
        require_once '../models/user.php';
        $oUser=new user();
        $result=$oUser->login($email,$password);
        if($result==1){
            // echo "inicio correcto";
            //se crea la variable de sesión para almacenar el idUser y nombre del usuario para acceder a el en cualquier página
            $_SESSION["idUser"]=$oUser->getIdUser();
            $_SESSION["nameUser"]=$oUser->getNameUser();
            //se redirige a la página principal
            header("Location: ../views/home/index.php");
            //eliminar o mate la página actual 
            die();
        } 
        else{ 
            // echo "error en el inicio";
            $oMensaje=new mensaje();
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoPeligo;
            $mensaje="usuario o contraseña incorrecto";
            header("Location: ../views/user/login.php?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            die();
        }
    }
    public function register($name,$email,$password,$confirmPassword){
        $oMensaje=new mensaje();
        require_once '../models/user.php';
        $oUser=new user();
        //se verifica si el correo electronico ya existe en el sistema
        $checkEmail=$result=$oUser->checkEmail($email);
        if($password!=$confirmPassword){
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoAdvertencia;
            $mensaje="Error al crear el usuario contraseña y confirmación de la contraseña no coinciden";
            $url="../views/user/register.php";
            header("Location: $url?name=$name&email=$email&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            die();
        } 
        elseif(sizeof($checkEmail)>0){ 
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoInfo;
            $mensaje="Error al crear el usuario, El correo electronico ya existe, intente recuperar la contraseña";
            $url="../views/user/register.php";
            header("Location: $url?name=$name&email=$email&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            die();
        }else{
            $result=$oUser->register($name,$email,$password,$confirmPassword);
            //se indica que se presentó un error al iniciar sesión
            if(!$result){
                $tituloMensaje="Error";
                $tipoMensaje=$oMensaje->tipoPeligo;
                $mensaje="Error al crear el usuario, Intente proximamente";
                $url="../views/user/register.php";
                header("Location: $url?name=$name&email=$email&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
                die();
                // header("Location: ../views/user/register.php?name=$name&email=$email&mensaje=Error al registrar el usuario");
            }
            //se indica que se registró correctamente y se redirije al login
            else header("Location: ../views/user/login.php?mensaje=se registró correctamente");
            die();
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
        die();
    }
    //función para solicitud de restablecer
    public function recuperarContrasena(){
        require_once 'configController.php';
        $oConfig=new config();
        //se genera un codigo para la recuperación del usuario
        $codigo=$oConfig->generarCodigo36();
        require_once '../models/user.php';
        $oUser=new user();
        //se verifica si el correo electronico existe
        $email=$_POST['email'];
        $emailExiste=$oUser->checkEmail($email);
        if(sizeof($emailExiste)==0){
            echo "el correo electronico no está registrado";
        }else{
            //el correo electronico existe
            require_once 'mensajeController.php';
            $oMensaje= new mensaje();
            $oMensaje->enviarCorreoSolicitudContrasena($email,$codigo);
            //se registra la solicitud de contraseña
            require_once '../models/recuperacionContrasena.php';
            $oRecuperacion=new recuperacionContrasena();
            $oRecuperacion->email=$email;
            $oRecuperacion->codigo=$codigo;
            $oRecuperacion->habilitado=TRUE;
            // $oRecuperacion->fechaRecuperacion=date("Y-m-d H:i:s");
            $result=$oRecuperacion->registrarRecuperacionContrasena();
            if($result) echo "se registró correctamente";
            else echo "error al registrar";
            

        }
    }
    //función para restablecer la contraseña
    public function restablecerContrasena(){
        require_once '../modelo/recuperacionContrasena.php';
        $oRecuperacion=new recuperacionContrasena();
        $oRecuperacion->email=$_GET['email'];
        $oRecuperacion->codigo=$_GET['codigo'];
        if($oRecuperacion->verificarCodigo()){
            //pendiente terminar recuperación de contraseña
        }
    }
    public function detalleRol($idRol){
        $oMensaje=new mensaje();
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
    public function actualizarPermisos(){
        $idRol=$_POST['idRol'];
        $idPaginas=$_POST['idPaginas'];

    }
//fin sección
//sección roles
    //función para consultar la lista de Rol 
    public function ListaRoles(){
        require_once '../../models/rol.php';
        $oRol=new rol();
        return $oRol->ConsultarListaRoles();
    }
    
    //Función para registrar el rol nuevo o editar
    public function registrarRol(){
        require_once '../models/rol.php';          
        $oRol=new rol();
        $oRol->idRol=$_POST['idRol'];
        $oRol->nombreRol=$_POST['nombreRol'];
        $oMensaje=new mensaje();
        if($oRol->registrarRol())
        {
            $tituloMensaje="Excelente";
            $tipoMensaje=$oMensaje->tipoCorrecto;
            $mensaje="Rol registrado correctamente";
            if($oRol->idRol=="")
            $url="../views/user/listaRoles.php";
            else
            $url="../views/user/detalleRol.php";
            header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }
        else{
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoPeligo;
            $mensaje="Error al guardar el Rol";
            if($oRol->idRol=="")
            $url="../views/user/NuevoRol.php";
            else
            $url="../views/user/detalleRol.php";
            header("Location: $url?idRol=$oRol->idRol&nombreRol=$oRol->nombreRol&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }
        die();
    }
    //función para eliminar los roles
    public function eliminarRol(){
        $oMensaje=new mensaje();
        require_once '../models/rol.php';          
        $oModulo=new rol();
        $oModulo->idModulo=$_POST['idRol'];
        if($oModulo->eliminarRol()){
            $tituloMensaje="Excelete";
            $tipoMensaje=$oMensaje->tipoCorrecto;
            $mensaje="Se eliminó correctamente el Rol";
            $url="../views/user/listaRol.php";
            header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }else{
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoPeligo;
            $mensaje="Error al eliminar el Rol";
            $url="../views/user/listaRol.php";
            header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }
    }
    //función para retornar los usuario relacionados con un rol
    public function ObtenerUsuariosRol($idRol){
        require_once '../../models/rol.php';          
        $oRol=new rol();
        return $oRol->ObtenerUsuariosRol($idRol);
    }
//fin sección
//Sección Modulos
    //función para consultar lista Modulos
    public function ConsultarListaModulos(){
        require_once '../../models/modulo.php';          
        $oModulo=new modulo();
        return $oModulo->ConsultarListaModulo();
    }
    //función para consultar los detalles de un modulo
    public function detalleModulo($idModulo){
        require_once '../../models/modulo.php'; 
        $oModulo=new modulo();
        return $oModulo->ConsultarModuloId($idModulo);
    }
    //Función para registrar el Modulo nuevo o editar
    public function registrarModulo(){
        require_once '../models/modulo.php';          
        $oModulo=new modulo();
        $oModulo->idModulo=$_POST['idModulo'];
        $oModulo->nombreModulo=$_POST['nombreModulo'];
        $oMensaje=new mensaje();
        if($oModulo->registrarModulo())
        {
            $tituloMensaje="Excelente";
            $tipoMensaje=$oMensaje->tipoCorrecto;
            if($oModulo->idModulo==""){
                $mensaje="Se ha creado correctamente el modulo";
                $url="../views/user/listaModulo.php";
                header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            }
            else{
                $mensaje="Se actualizó correctamente";
                $url="../views/user/detalleModulo.php";
                header("Location: $url?idModulo=$oModulo->idModulo&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            }
            die();
        }
        else{
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoPeligo;
            $mensaje="Error al guardar el Modulo";
            if($oModulo->idModulo==""){
                $url="../views/user/listaModulo.php";
                header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            }
            else{
                $url="../views/user/detalleModulo.php";
                header("Location: $url?idModulo=$oModulo->idModulo&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            }
        }
        die();
    }
    //función para eliminar los modulos
    public function eliminarModulo(){
        $oMensaje=new mensaje();
        require_once '../models/modulo.php';          
        $oModulo=new modulo();
        $oModulo->idModulo=$_POST['idModulo'];
        if($oModulo->eliminarModulo()){
            $tituloMensaje="Excelete";
            $tipoMensaje=$oMensaje->tipoCorrecto;
            $mensaje="Se eliminó correctamente el modulo";
            $url="../views/user/listaModulo.php";
            header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }else{
            $tituloMensaje="Error";
            $tipoMensaje=$oMensaje->tipoPeligo;
            $mensaje="Error al eliminar el Modulo";
            $url="../views/user/listaModulo.php";
            header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
        }
    }



//fin Sección

//sección paginas

    //consultar lista pagina por modulo
    public function ObtenerPaginasModulo($idModulo){
        $oMensaje=new mensaje();
        require_once '../../models/pagina.php';          
        $oPagina=new pagina();
        $oPagina->idModulo=$idModulo;
        return $oPagina->ConsultarListaPaginasModulo();
    }

        //función para registrar la página
        public function registrarPagina(){
            $oMensaje=new mensaje();
            require_once '../models/pagina.php';          
            $oPagina=new pagina();
            $oPagina->idPagina=$_POST['idPagina'];
            $oPagina->idModulo=$_POST['idModulo'];
            $oPagina->nombrePagina=$_POST['nombrePagina'];
            if($oPagina->registrarPagina()){
                $tituloMensaje="Excelente";
                $tipoMensaje=$oMensaje->tipoCorrecto;
                if($oPagina->idPagina==""){
                    $mensaje="Se creó correctamente la página";
                    
                }else{
                    $mensaje="Se actualizó correctamente la página";
                }
                $url="../views/user/detalleModulo.php";
                header("Location: $url?idModulo=$oPagina->idModulo&tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");                    
            }else{
                $tituloMensaje="Error";
                $tipoMensaje=$oMensaje->tipoPeligo;
                if($oPagina->idPagina==""){
                    $mensaje="Error al crear la página";
                    $url="../views/user/NuevaPagina.php";
                }else{
                    $mensaje="Error al editar la página";
                }
                header("Location: $url?tituloMensaje=$tituloMensaje&tipoMensaje=$tipoMensaje&mensaje=$mensaje");
            }
        }
//fin Sección
}

?>