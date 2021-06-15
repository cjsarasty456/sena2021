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

    public function enviarCorreo(){
        //archivo base para enviar correo electronico
        //utilizando la función mail
        $correoDestino="cjsarasty@gmail.com";
        $asunto="Asunto Correo de prueba";
        $mensaje="Cuerpo del mensaje del correo prueba";
        $header="From: correoOrigen@gmail.com"."\r\n ";
        $header.="Reply-To: correoOrigen@gmail.com"."\r\n";
        $header.="X-Mailer: PHP/".phpversion();
        $mail=mail($correoDestino,$asunto,$mensaje,$header);
        if($mail) echo "Se envió correctamente";
        else echo "error al enviar";
    }

}

?>