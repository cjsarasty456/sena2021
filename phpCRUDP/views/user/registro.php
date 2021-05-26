<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <title>Document</title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Bienvenido sistema</b>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Ingrese los siguientes datos</p>
        <p style="color:#FE2D00;">
     <form action="" method="POST">
        <label for="">Nombre</label>
        <input class="form-control" type="text">
        <label for="">Correo electronico</label>
        <input class="form-control" type="email">
        <label for="">Contraseña</label>
        <input class="form-control" type="password">
        <label for="">Confirmar Contraseña</label>
        <input class="form-control" type="password">
        <br>
        <button type="submit" class="btn btn-info">Registrar Usuario</button>
    </form>
    <p class="mb-1">
        <a href="recuperarContrasena.php">¿Olvidó su contraseña?</a>
      </p>
      <p class="mb-0">
        <a href="login.php" class="text-center">¿Si tiene usuario?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
</html>