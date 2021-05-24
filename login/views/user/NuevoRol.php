<!-- Esta pagína permite crear un nuevo rol -->
<?php
$requiereSesion=true;
require_once '../head.php';
require_once '../../controllers/UserController.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Rol</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- contenido de la pagina -->
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <label for="">Nombre Rol</label>
                <input type="hidden" name="idRol">
                <input class="form-control" name="nombreRol" type="text" minlength="6" placeholder="Ingrese el nombre del Rol">
            </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit" name="funcion" value="registrarRol"><i class="far fa-save"></i> Guardar</button>
    </form>
<?php
$requiereSesion=true;
require_once '../footer.php';
?>