<?php
$requiereSesion=true;
require_once '../head.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modulos</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- etiqueta para crear la tabla -->
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
<table class="table">
    <!-- etiqueta el encabezado de la tabla -->
    <thead>
        <tr>
            <th>Nombre Modulo</th>
            <th><a class="btn btn-success" href="NuevoModulo.php"><i class="far fa-plus-square"></i> Añadir</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Se incorpora el archivo controlador de la vista
        require_once '../../controllers/userController.php';
        //se instancia el objeto del controlador
        $ouserController=new userController();
        //se llama la función listaRoles para almacenar los registros dentro de la variable $Consulta
        $Consulta=$ouserController->ConsultarListaModulos();
        foreach($Consulta as $registro){
            ?>
            <tr>
                <td><?php echo $registro['nombreModulo']; ?></td>
                <td>
                    <a href="detalleModulo.php?idModulo=<?php echo $registro['idModulo']; ?>" class="btn btn-info"><i class="far fa-eye"></i></a>
                    <!-- <a href="edi.php?id=<?php echo $registro['idModulo']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a> -->
                    <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-Eliminar" onclick="eliminar(<?php echo $registro['idModulo'];?>);">
                        <i class="fas fa-trash"></i> 
                    </button> -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-Eliminar" onclick="cargarId(<?php echo $registro['idModulo'];?>);">
                    <i class="fas fa-trash"></i> 
                </button>
                </td>
            </tr>
            <?php
        }
        ?>
       
    </tbody>
</table>
<?php
if(Count($Consulta)==0){
            ?>
                <h4>No se encontrarón resultados</h4>
            <?php
        }
        ?>

<?php
$requiereSesion=true;
require_once '../footer.php';
?>

<script>
    function eliminar(id){
        document.getElementById("id").value=id;
    }
</script>

<div class="modal fade" id="modal-Eliminar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Modulo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Está seguro de eliminar este registro</p>
            </div>
            <form action="../../controllers/userController.php" method="POST">
                <input type="hidden" id="idModulo" name="idModulo">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="funcion" value="eliminarModulo" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      
  
<script>
function cargarId(id){
  document.getElementById('idModulo').value=id;
}
</script>