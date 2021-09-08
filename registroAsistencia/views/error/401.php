<?php
$requiereSesion=false;
require_once '../head.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Error 401</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- contenido de la pagina -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

            <h1>No tiene permiso</h1>
            <p>Actualmente no tiene permiso para acceder a esta pagina, solicita al administrador el permiso necesario</p>

        </div>
    </div>

<?php
$requiereSesion=true;
require_once '../footer.php';
?>