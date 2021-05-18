<?php
$requiereSesion=true;
require_once '../head.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="#">Inicio</a></li> -->
                    <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container">

<!-- contenido de la pagina -->
    <h1>Bienvenido al ejercicio de login</h1>

    <p>Esta aplicación diseñada como ejemplo contiene las siguientes características</p>
    <h3>En la sección de configuración</h3>
    <ul>
        <li>Página de login o inicio de sesión que valida si el usuario está registrado</li>
        <li>Pagina de registro para crear un usuario en el sistema, la contraseña se encriptará al momento de registrar en la base de datos</li>
        <!-- <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li> -->
    </ul>

</div>



<?php
$requiereSesion=true;
require_once '../footer.php';
?>