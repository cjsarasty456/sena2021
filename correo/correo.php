<?php


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

?>