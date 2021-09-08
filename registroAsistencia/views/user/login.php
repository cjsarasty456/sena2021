<?php
session_start();
require_once "../../config/config.php";
    // echo $_SESSION['idUser'];
    if(isset($_SESSION['idUser'])){
        // echo "requiere iniciar";
        header("Location: ../home/index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio Sesión</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets//dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Bienvenido</b>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Inicia sesión para continuar</p>
        <p style="color:#FE2D00;">
        <?php
        // require_once '../../controllers/UserController.php';
          if(isset($_GET['tituloMensaje'])){ 
            require_once '../../controllers/mensajeController.php';
            $oMensaje=new  mensaje();
            $tituloMensaje=$_GET['tituloMensaje'];
            $tipoMensaje=$_GET['tipoMensaje'];
            $mensaje=$_GET['mensaje'];
            echo $oMensaje->mostrarMensaje($tituloMensaje,$tipoMensaje,$mensaje);
          }
        ?></p>
      <form action="../../controllers/userController.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Correo electronico" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="funcion" value="inicioSesion">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- <div class="text-center mb-3">
        <p>- También -</p>
        <a href="?login=Facebook" class="btn btn-block btn-primary">
          <i   class="fab fa-facebook mr-2"></i> Ingresar con Facebook
        </a>
        <a href="?login=Google" class="btn btn-block btn-danger">
          <i  class="fab fa-google mr-2"></i> Ingresar con Google
        </a>
        <a href="?login=Twitter" class="btn btn-block btn-info ">
          <i  class="fab fa-twitter mr-2"></i> Ingresar con Twitter
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="recuperarContrasena.php">¿Olvidó su contraseña?</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">¿No tiene usuario?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
