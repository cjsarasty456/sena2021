<?php

class mensaje{
    //variables tipo mensaje
    public $tipoPeligo="danger";
    public $tipoAdvertencia="warning";
    public $tipoInfo="info";
    public $tipoCorrecto="success";

    //variables iconos
    public $iconoPeligo="fas fa-times-circle";
    public $iconoAdvertencia="fas fa-exclamation-triangle";
    public $iconoInfo="fas fa-exclamation-circle";
    public $iconoCorrecto="fas fa-check-circle";


    public function mostrarMensaje($titulo,$tipoMensaje,$mensaje){
        $retorno= "<div class='alert alert-$tipoMensaje alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class=".$this->icono($tipoMensaje)."></i> $titulo</h5>
        $mensaje
      </div>";
      return $retorno;
    }
    public function icono($tipo){
        switch($tipo){
            case $this->tipoPeligo:
                return $this->iconoPeligo;
            break;
            case $this->tipoAdvertencia:
                return $this->iconoAdvertencia;
            break;
            case $this->tipoInfo:
                return $this->iconoInfo;
            break;
            case $this->tipoCorrecto:
                return $this->iconoCorrecto;
            break;
        }
    }

    public function enviarCorreo($asunto,$mensaje,$correoDestino){
        //archivo base para enviar correo electronico
        //utilizando la función mail
        // $correoDestino="cjsarasty@gmail.com";
        // $asunto="Asunto Correo de prueba";
        // $mensaje="Cuerpo del mensaje del correo prueba";
        $header='MIME-Version: 1.0' . "\r\n";
        $header.='Content-type: text/html; charset=utf-8' . "\r\n";
        $header.="From: info@calichesoftware.com"."\r\n ";
        $header.="Reply-To: info@calichesoftware.com"."\r\n";
        $header.="X-Mailer: PHP/".phpversion();
        $cuerpoMensaje="<html>";
        $cuerpoMensaje.="<body>$mensaje</body>";
        $cuerpoMensaje.="</html>";
        $mail=mail($correoDestino,$asunto,$cuerpoMensaje,$header);
        if($mail) echo "Se envió correctamente";
        else echo "error al enviar";
    }

    public function enviarCorreoSolicitudContrasena($correoDestino,$codigo){
        $asunto="Solicitud Cambio de contraseña";
        $mensaje="Ingrese al siguiente enlace para restablecer la contraseña <br>";
        $url=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."?funcion=restablecerContrasena&email=$correoDestino&codigo=$codigo";
        $mensaje.="<a href='".$url."'>Click acá para restablecer la contraseña</a>";
        $this->enviarCorreo($asunto,$mensaje,$correoDestino);
        // echo $url;   
    }

    public function enviarCorreoRestablecerContrasena($correoDestino,$contrasena){
        $asunto="Solicitud Cambio de contraseña";
        $mensaje="Ingrese al siguiente enlace para restablecer la contraseña <br>";
        $mensaje.="Contraseña: ".$contrasena."<br>";
        $mensaje.="Recuerde cambiar la contraseña al siguiente inicio\n\r";
        $this->enviarCorreo($asunto,$mensaje,$correoDestino);
    }
}
?>