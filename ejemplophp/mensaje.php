<?php
//lectura de información por metodo POST
$primerNombre=$_POST['primerNombre'];
$segundoNombre=$_POST['segundoNombre'];
$primerApellido=$_POST['primerApellido'];
$segundoApellido=$_POST['segundoApellido'];
//concatenación del nombre registrado en el formulario
$nombre="Bienvenido: ".$primerNombre." ".$segundoNombre." ".$primerApellido." ".$segundoApellido;
//se muestra el valor de la variable $nombre
echo $nombre;
//lectura de información por el metodo GET
// $primerNombre=$_GET[''];

?>