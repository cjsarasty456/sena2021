<?php
$textqr=$_GET['idEstudiante'];//Recibo la variable pasada por post
$sizeqr=300;
// $sizeqr=$_GET['sizeqr'];//Recibo la variable pasada por post
include('../../library/vendor/autoload.php');//Llamare el autoload de la clase que genera el QR
use Endroid\QrCode\QrCode;

$qrCode = new QrCode($textqr);//Creo una nueva instancia de la clase
$qrCode->setSize($sizeqr);//Establece el tamaño del qr
//header('Content-Type: '.$qrCode->getContentType());
$image= $qrCode->writeString();//Salida en formato de texto 

 $imageData = base64_encode($image);//Codifico la imagen usando base64_encode
?>
<style>
    .imagen{
        padding-top: 50px;
        padding-left: 15%;
        padding-right: 50%;    
    }
    .texto{
        background-color: black;
        color: white;
        text-align: center;
        margin-left: 30px;
        width: 300px;
        padding:10px ;
        border-top-right-radius: 50px;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        font-size: 20pt;
    }
</style>
<div class="imagen" >
<?php
    echo '<img src="data:image/png;base64,'.$imageData.'">';
?>
    <div class="texto" >Escanéame</div>
</div>