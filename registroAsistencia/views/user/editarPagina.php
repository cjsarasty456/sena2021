<?php
$requiereSesion=true;
$idPagina=18;
require_once '../head.php';

require_once '../../controllers/userController.php';
$oUserController=new userController();
$oPagina=$oUserController->obtenerPagina($_GET['idPagina']);

?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Página</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- contenido de la pagina -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
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
        <form action="../../controllers/userController.php" method="post">
            <input type="hidden" name="idModulo" value="<?php echo $oPagina->idModulo; ?>">
            <input type="hidden" name="idPagina" value="<?php echo $oPagina->idPagina; ?>">
            <div class="row">
                <div class="col col-xl-6">
                    <label for="">Nombre Página</label>
                    <input class="form-control" name="nombrePagina" type="text" placeholder="Ingrese el nombre de la pagina" value="<?php echo $oPagina->nombrePagina; ?>">
                </div>
                <div class="col col-xl-6">
                    <label for="">Url</label>
                    <input type="text" class="form-control" name="url" value="<?php echo $oPagina->url; ?>">
                </div>
            </div>
            <br>
            <button class="btn btn-success" type="submit" name="funcion" value="registrarPagina"><i class="far fa-save"></i> Guardar</button>
        </form>
        </div>
    </div>

<?php
$requiereSesion=true;
require_once '../footer.php';
?>