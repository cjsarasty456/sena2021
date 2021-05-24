<?php
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
echo $resultado;
?>