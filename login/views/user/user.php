<?php
$requiereSesion=true;
require_once '../head.php';
require_once "../../controllers/userController.php";
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- contenido de la pagina -->
    <div class="row">
        <div class="col col-12 col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-right-Detalle-tab" data-toggle="pill" href="#vert-tabs-right-Detalle" role="tab" aria-controls="vert-tabs-right-Detalle" aria-selected="true"><i class="fas fa-info-circle"></i> Perfil</a>
                        <a class="nav-link" id="vert-tabs-right-Pagina-tab" data-toggle="pill" href="#vert-tabs-right-Pagina" role="tab" aria-controls="vert-tabs-right-Pagina" aria-selected="false"><i class="far fa-copy"></i> Seguridad</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-12 col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="tab-content" id="vert-tabs-right-tabContent">
                        <div class="tab-pane fade show active" id="vert-tabs-right-Detalle" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab">
                            <?php require_once "usuario/_perfil.php"; ?>
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-right-Pagina" role="tabpanel" aria-labelledby="vert-tabs-right-profile-tab">
                            <?php require_once "usuario/_seguridad.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$requiereSesion=true;
require_once '../footer.php';
?>