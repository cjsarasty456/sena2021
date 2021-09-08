<?php

$oEstudiante=new estudianteController();
$funcion="";
if(isset($_GET['funcion']))
$funcion=$_GET['funcion'];

if(isset($_POST['funcion']))
$funcion=$_POST['funcion'];
switch($funcion){
    case "registrarEstudiante":
        $oEstudiante->registrarEstudiante();
        break;
}
class estudianteController{
    public function consultarEstudiante($tipoDocumento,$documento){
         //se importan los archivos de estudiante.php
         require_once '../../models/estudiante.php';
        $oEstudiante=new estudiante();
       return $oEstudiante->ListarEstudiantes(1,$tipoDocumento,$documento);
    }
    public function registrarEstudiante(){
        require_once 'configController.php';
        $oConfig=new configController();
        //se importan los archivos de estudiante.php
        require_once '../models/estudiante.php';
        //se instancia el objeto estudiante
        $oEstudiante=new estudiante();
        do{
        $oEstudiante->idEstudiante=$oConfig->generarCodigo36();
        }while(count($oEstudiante->verificarIdEstudiante())>0);
        $oEstudiante->tipoDocumento=$_GET['tipoDocumento'];
        $oEstudiante->documento=$_GET['documento'];
        $oEstudiante->nombre=$_GET['nombre'];
        $oEstudiante->apellido=$_GET['apellido'];
        $oEstudiante->direccion=$_GET['direccion'];
        $oEstudiante->telefono=$_GET['telefono'];
        $oEstudiante->ficha=$_GET['ficha'];
        $result=$oEstudiante->nuevoEstudiante();
        // require_once 'mensajes.php';
        // $oMensaje=new mensaje();
        if($result){
            header("Location: ../views/estudiante/listarEstudiante.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
        }else{
            echo "error al registrar el estudiante";
        }
    }
}
?>