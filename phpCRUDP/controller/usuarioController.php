<?php

//esta función almacena que operación quiere el usuario
$funcion=$_POST['funcion'];
//solo va a hacer este caso
$oUsuario=new usuarioController();

switch($funcion){
    case "registro":
        $oUsuario->registrarUsuario();
        break;
    case "iniciarSesion":
        $oUsuario->login();
    break;

}


//clase usuarioController.php genera la comunicación entre la vista y el modelo
//contiene las funciones necesarias para alimentar la vista
class usuarioController{

    //función para registrar el usuario
    public function registrarUsuario(){
        require_once '../modelo/usuario.php';
        $oUser= new usuario();
        $nombre=$_POST['nombre'];
        $correoElectronico=$_POST['correoElectronico'];
        $contrasena=$_POST['contrasena'];
        $confirmContrasena=$_POST['confirmContrasena'];
        if($contrasena==$confirmContrasena){
            //si son iguales las contraseña y confirma contraseña se va a generar el registro
            if($oUser->consultarCorreoElectronico($correoElectronico)==0){
                //se registra al usuario
                $result=$oUser->registroUsuario($nombre,$correoElectronico,$contrasena);
                if($result){
                    echo "se registró correctamente";
                }else{
                    echo "error al momento de registrar el usuario";
                }
            }else{
                // existe un registro con este correo electronico
                echo "ya existe un registro con este correo electronico";
            }
        }else{
            //si són diferentes le vamos a indicar al usuario que no son iguales
            //no se genera el registro
            echo "la contraseña y confirmación de la contraseña no coinciden";
        }
    }
}

?>