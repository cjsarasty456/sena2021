<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}

require "vendor/autoload.php";

$qrcode = new QrReader($_FILES['qrimage']['tmp_name']);
$text = $qrcode->text();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Decodificar códigos QR con PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="qr.css">
</head>
<body class="bg">
    <div class="container">
        <br><br><br>
        <div class="row ">
            <div class="col-md-6 offset-md-3 card" >
                <div class="panel-heading">
                    <h1>Decodificar códigos QR</h1>
                </div>
                <hr>
                <p><strong>Datos del código QR:</strong></p>
                <p><?php echo $text ?></p>
                <hr>
                <a href="index.php">Decodificar otro</a>
            </div>
        </div>
    </div>
    
</body>
</html>