<!-- Esta pagína permite crear un nuevo rol -->
<?php
$requiereSesion=true;
$idPagina=13;
require_once '../head.php';
// require_once '../../controllers/UserController.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Modulo</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- contenido de la pagina -->
    <form action="../../controllers/UserController.php" method="post">
        <div class="row">
            <div class="col">
                <label for="">Nombre Modulo</label>
                <input type="hidden" name="idModulo">
                <input class="form-control" name="nombreModulo" type="text" minlength="6" placeholder="Ingrese el nombre del Modulo">
            </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit" name="funcion" value="registrarModulo"><i class="far fa-save"></i> Guardar</button>
    </form>
<?php
$requiereSesion=true;
require_once '../footer.php';
?>