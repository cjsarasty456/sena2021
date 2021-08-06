<?php
require 'head.php';
?>
<h1>Listar Estudiante</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listar Profesor</li>
  </ol>
</nav>
<?php
if(isset($_GET['mensaje'])){
  $oMensaje=new mensaje();
  echo $oMensaje->mostrarMensaje($_GET['tipoMensaje'],$_GET['mensaje']);
}
?>
<?php
    //se hace referencia a los archivos estudiante y conexiondb
    require_once '../modelo/estudiante.php';
    require_once '../modelo/conexiondb.php';
    //se instancia el objeto estudiante
    $oEstudiante=new estudiante();
    //se llama la función ListarEstudiantes y se almacena
    //el valor en la variable $Consulta
    if(isset($_GET['page'])) $pagina=$_GET['page'];
    else $pagina=1;
    $Consulta=$oEstudiante->ListarEstudiantes($pagina);
    $numeroRegistro=$oEstudiante->numRegistro;
    $numPagina=intval($numeroRegistro/10);
    if(fmod($numeroRegistro,10)>0)$numPagina++;
    echo $numPagina;
    ?>
    <div class="card-tools">
      <ul class="pagination pagination-sm float-right">
      <li class="page-item"><a class="page-link" href="listarEstudiante.php?page=<?php echo 1; ?>">&laquo;</a></li>
        <?php
          for($i=1;$i<=$numPagina;$i++){
        ?>
        <li class="page-item"><a class="page-link" href="listarEstudiante.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
          }
        ?>
         <li class="page-item"><a class="page-link" href="listarEstudiante.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
      </ul>
    </div>
<!-- etiqueta para 0crear la tabla -->
<table class="table">
    <!-- etiqueta el encabezado de la tabla -->
    <thead>
        <tr>
            <th>tipoDocumento</th>
            <th>documento</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>dirección</th>
            <th>telefono</th>
            <th><a class="btn btn-success" href="FormularioNuevoEstudiante.php"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a></th>
        </tr>
    </thead>
    <tbody>
      <?php
        $enlace="../eliminarEstudiante.php?id=";
        foreach($Consulta as $registro){
            ?>
            <tr>
                <td><?php echo $registro['tipoDocumento']; ?></td>
                <td><?php echo $registro['documentoIdentidad']; ?></td>
                <td><?php echo $registro['nombres']; ?></td>
                <td><?php echo $registro['apellidos']; ?></td>
                <td><?php echo $registro['direccion']; ?></td>
                <td><?php echo $registro['telefono']; ?></td>
                <td>
                    <a href="formularioEditarEstudiante.php?id=<?php echo $registro['id']; ?>" class="btn btn-warning"><i class="far fa-edit"></i> Editar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal" onclick="eliminar(<?php echo $registro['id'];?>);">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<?php
require 'footer.php';
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="../eliminarEstudiante.php" method="GET">
          <input id="id" name="id" type="text" style="display:none;">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>