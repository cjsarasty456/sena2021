<?php
require_once '../../controllers/userController.php';
//se Instancia el objeto de usuario Controller que contiene las funciones de usuarios
$oUserController=new userController();
//se obtiene los usuario que están registrados en este rol
$listaRegistros=$oUserController->ObtenerPaginasModulo($idModulo);
?>

<h2><i class="fas fa-file"></i> Paginas del Modulo</h2>
<table class="table table-bordered table-hover">
    <thead>
        <th>
            Nombre Página
        </th>
        <th>
          Url
        </th>
        <th>
        <a href="NuevaPagina.php?idModulo=<?php echo $idModulo; ?>" class="btn btn-success"><i class="far fa-plus-square"></i> Agregar Página</a>
        <!-- <button class="btn btn-success"><i class="far fa-plus-square"></i> Añadir Masivo</button> -->
        </th>
    </thead>
    <tbody>
    <?php foreach($listaRegistros as $registro){ ?>
    <tr>
        <td><?php echo $registro['nombrePagina']; ?></td>
        <td><?php echo $registro['url']; ?></td>
        <td>
            <a href="editarPagina.php?idPagina=<?php echo $registro['idPagina']; ?>" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-Eliminar">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>

<div class="modal fade" id="modal-Eliminar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Retirar usuario del rol</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                <p>Se procederá eliminar el usuario del rol</p>
                <input id="idUser" name="idUser" type="hidden">
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->