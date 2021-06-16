<?php
$requiereSesion=true;
$idPagina=14;
require_once '../head.php';
require_once '../../controllers/userController.php';
$idModulo=$_GET['idModulo'];
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalle Modulo</h1>
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
                    <div class="tab-pane fade show active" id="vert-tabs-right-Detalle" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab">
                        <?php require_once "modulo/_detalleModulo.php"; ?>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-right-Pagina" role="tabpanel" aria-labelledby="vert-tabs-right-profile-tab">
                        <?php require_once "modulo/_listaPaginas.php"; ?>
                    </div>
                </div>
            </div>
            <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="vert-tabs-right-Detalle-tab" data-toggle="pill" href="#vert-tabs-right-Detalle" role="tab" aria-controls="vert-tabs-right-Detalle" aria-selected="true"><i class="fas fa-info-circle"></i> Detalles</a>
                    <a class="nav-link" id="vert-tabs-right-Pagina-tab" data-toggle="pill" href="#vert-tabs-right-Pagina" role="tab" aria-controls="vert-tabs-right-Pagina" aria-selected="false"><i class="far fa-copy"></i> Paginas</a>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>

<?php
// $requiereSesion=true;
require_once '../footer.php';
?>