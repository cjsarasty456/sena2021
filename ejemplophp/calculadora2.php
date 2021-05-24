<?php
if(isset($_GET['operacion'])){
    $num1=$_GET['num1'];
    $num2=$_GET['num2'];
    $operacion=$_GET['operacion'];
    $resultado=0;
    switch($operacion){
        case "+":
            $resultado=$num1+$num2;
            break;
        case "-":
            $resultado=$num1-$num2;
            break;    
        case "*":
            $resultado=$num1*$num2;
            break;    
        case "/":
            if($num2==0){
                $resultado="no se puede dividir en cero";
            }else{
                $resultado=$num1/$num2;
            }
            break;
        default:
            $resultado="opción no valida";
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Calculadora</title>
</head>
<body>
    <div class="container">
        <form action="" method="GET">
            <div class="row">
                <div class="col col-6">
                    <label for="">Número 1</label>
                    <input type="number" name="num1" class="form-control">
                </div>
                <div class="col col-6">
                    <label for="">Número 2</label>
                    <input type="number" name="num2" class="form-control">
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-success" name="operacion" value="+"> 
            <input type="submit" class="btn btn-warning" name="operacion" value="-"> 
            <input type="submit" class="btn btn-danger" name="operacion" value="*"> 
            <input type="submit" class="btn btn-primary" name="operacion" value="/">
            <br>
            <label>resultado</label>
            <input type="number" class="form-control" readonly value="<?php echo $resultado; ?>"> 
        </form>
    </div>

</body>
</html>