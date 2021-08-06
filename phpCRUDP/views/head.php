<?php
require_once '../mensajes.php';
require_once '../modelo/conexiondb.php';
//si no está definida o no tiene valor se redirige al login
//en caso contrario no hace nada
// session_start();
// if(!isset($_SESSION['idUser'])){
//   header("Location: user/login.php");
//   die();
// }
// ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/sena/sena2021/phpCRUDP/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Sistema Estudiante</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i> Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarEstudiante.php"><i class="fas fa-graduation-cap"></i> Lista Estudiantes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarProfesor.php"><i class="fas fa-chalkboard-teacher"></i> Lista Profesor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarCurso.php"><i class="fas fa-school"></i> Lista Curso</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
      <div class="container">
<!-- 
      Bienvenido <?php echo $_SESSION['nombreUser'] ?>
      <a href="../controller/usuarioController.php?funcion=cerrarSesion" 
      class="btn btn-primary">Cerrar sesión</a> -->