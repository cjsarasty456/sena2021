<?php
//se importan los archivos de conexiondb.php y estudiantr.php
require_once 'modelo/notas.php';
require_once 'modelo/matricula.php';
require_once 'modelo/conexiondb.php';
require_once 'mensajes.php';
$oNotas=new notas();
$oNotas->idMatricula=$_GET['idMatricula'];
$oNotas->nota1=$_GET['notas1'];
$oNotas->nota2=$_GET['notas2'];
$oNotas->nota3=$_GET['notas3'];
$result=$oNotas->registrarNota();
$oMensaje=new mensaje();
$oMatricula=new matricula();
$oMatricula->id=$oNotas->idMatricula;
$oMatricula->consultarMatriculaPorId();
if($result){
  header("Location: views/detalleCurso.php?id=$oMatricula->idCurso&tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
  }else{
  echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el Curso");
  }

?>