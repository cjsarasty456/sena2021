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
<table class="table">
    <!-- etiqueta el encabezado de la tabla -->
    <thead>
        <tr>
            <th>Rol</th>
            <th><a class="btn btn-success" href="NuevoRol.php"><i class="far fa-plus-square"></i> Añadir</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Se incorpora el archivo controlador de la vista
        require_once '../../controllers/userController.php';
        //se instancia el objeto del controlador
        $ouserController=new userController();
        //se llama la función listaRoles para almacenar los registros dentro de la variable $Consulta
        $Consulta=$ouserController->ListaRoles();
        foreach($Consulta as $registro){
            ?>
            <tr>
                <td><?php echo $registro['nombreRol']; ?></td>
                <td>
                    <a href="detalleRol.php?idRol=<?php echo $registro['idRol']; ?>" class="btn btn-info"><i class="far fa-eye"></i></a>
                    <!-- <a href="edi.php?id=<?php echo $registro['idRol']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a> -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal" onclick="eliminar(<?php echo $registro['idRol'];?>);">
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
$requiereSesion=true;
require_once '../footer.php';
?>

<script>
    function eliminar(id){
        document.getElementById("id").value=id;
    }
</script>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Elimina</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      ¿Está seguro de que desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="../eliminarEstudiante.php" method="GET">
          <input id="id" name="id" type="text" style="display:none;">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>