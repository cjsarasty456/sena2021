<!-- Esta pagína permite crear un nuevo rol -->
<?php
$requiereSesion=true;
$idPagina=17;
require_once '../head.php';
// require_once '../../controllers/UserController.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agregar Página</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- contenido de la pagina -->
    <form action="../../controllers/userController.php" method="post">
        <input type="hidden" name="idModulo" value="<?php echo $_GET['idModulo']; ?>">
        <input type="hidden" name="idPagina">
        <div class="row">
            <div class="col col-xl-6">
                <label for="">Nombre Página</label>
                <input class="form-control" name="nombrePagina" type="text" placeholder="Ingrese el nombre de la pagina">
            </div>
            <div class="col col-xl-6">
                <label for="">Url</label>
                <input type="text" class="form-control" name="url">
            </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit" name="funcion" value="registrarPagina"><i class="far fa-save"></i> Guardar</button>
    </form>
<?php
$requiereSesion=true;
require_once '../footer.php';
?>