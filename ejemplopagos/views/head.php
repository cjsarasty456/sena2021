<?php
// require_once "../../config/config.php";
require_once '../../controllers/mensajeController.php';
require_once '../../controllers/userController.php';

// $oConfig=new config();
    session_start();
    // echo $_SESSION['idUser'];
    if($requiereSesion and !isset($_SESSION['idUser'])){
        // echo "requiere iniciar";
        header("Location: ../../views/user/login.php");
        die();
    }elseif($requiereSesion and isset($_SESSION['idUser'])){
        //inició sesión
        $oUserController=new userController();
        $oUserController->verificarPermiso($idPagina);
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../../assets/dist/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
</head>

<body>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center"> -->
    <!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
    <!-- <p class="animation__shake">Cargando modulos...</p>
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-orange navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../home/index.php" class="nav-link">Inicio</a>
      </li> -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="../home/index.php" class="brand-link">
      <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart"></i> Tienda Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <?php if(isset($_SESSION["nameUser"])){ ?>
            <a href="../user/user.php" class="d-block"><?php echo $_SESSION["nameUser"]; ?></a>
            <a href="../../controllers/userController.php?funcion=cerrarSesion">Cerrar Sesión</a>
          <?php } ?>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../home/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pagina Inicial</p>
                </a>
                <a href="../home/acercaDe.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Acerca de</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-store"></i>
              <p>
                Tienda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tienda/productos.php" class="nav-link">
                <i class="fas fa-store-alt"></i>
                  <p>Productos</p>
                </a>
                <a href="../user/listaRoles.php" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
                  <p>Carro de compras</p>
                </a>
                <a href="../user/listaModulo.php" class="nav-link">
                <i class="fas fa-map-marked-alt"></i>
                  <p>Direcciones</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-users-cog"></i>
              <p>
                Configuración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../user/user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfil</p>
                </a>
                <a href="../user/listaRoles.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
                <a href="../user/listaModulo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modulos</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
<br>

<div class="content-wrapper">
  <div class="container-xl">
    <div class="box">
      <div class="box-body">
