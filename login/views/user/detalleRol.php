<?php
$requiereSesion=true;
require_once '../head.php';
require_once '../../controllers/userController.php';
$idRol=$_GET['idRol'];
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalle Rol</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- contenido de la pagina -->
<div class="card">
<br>
<div class="card-header d-flex p-0">
<!-- <h3 class="card-title p-3">Tabs</h3> -->
    <div class="container">
        <?php
          require_once '../../controllers/UserController.php';
          if(isset($_GET['tituloMensaje'])!=""){ 
            require_once '../../controllers/mensajeController.php';
            $oMensaje=new  mensaje();
            $tituloMensaje=$_GET['tituloMensaje'];
            $tipoMensaje=$_GET['tipoMensaje'];
            $mensaje=$_GET['mensaje'];
            echo $oMensaje->mostrarMensaje($tituloMensaje,$tipoMensaje,$mensaje);
          }
        ?>
        <div class="row">
            <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-right-tabContent">
                    <div class="tab-pane fade show active" id="vert-tabs-right-home" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab">
                        <?php require_once "rol/_detalles.php"; ?>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-right-profile" role="tabpanel" aria-labelledby="vert-tabs-right-profile-tab">
                        <?php require_once "rol/_listaUsuario.php"; ?>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-right-messages" role="tabpanel" aria-labelledby="vert-tabs-right-messages-tab">
                        <?php require_once "rol/_permisos.php"; ?>
                    </div>
                </div>
            </div>
            <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="vert-tabs-right-home-tab" data-toggle="pill" href="#vert-tabs-right-home" role="tab" aria-controls="vert-tabs-right-home" aria-selected="true"><i class="fas fa-info-circle"></i> Detalles</a>
                    <a class="nav-link" id="vert-tabs-right-profile-tab" data-toggle="pill" href="#vert-tabs-right-profile" role="tab" aria-controls="vert-tabs-right-profile" aria-selected="false"><i class="fas fa-users-cog"></i> Usuarios</a>
                    <a class="nav-link" id="vert-tabs-right-messages-tab" data-toggle="pill" href="#vert-tabs-right-messages" role="tab" aria-controls="vert-tabs-right-messages" aria-selected="false"><i class="fas fa-tasks"></i> Permisos</a>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>

<?php
$requiereSesion=true;
require_once '../footer.php';
?>