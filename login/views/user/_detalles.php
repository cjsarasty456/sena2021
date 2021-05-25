<?php
require_once '../../controllers/userController.php';
$oUserController=new userController();
$registro=$oUserController->detalleRol($idRol);
$prueba="";
?>
<h2><i class="fas fa-info-circle"></i> Información Rol</h2>
<form action="" method="post">
    <div class="row">
        <div class="col col-12">
        <input type="hidden" name="idRol" value="<?php echo $registro->idRol; ?>">
            <label for="">Nombre Rol</label>
            <input id="nombreRol" type="text" class="form-control" name="nombreRol" value="<?php echo $registro->nombreRol; ?>">
        </div>
    </div>
    <br>
    <button id="btnDetallesEditar" type="button" class="btn btn-warning" onClick="habilitarEditar()"><i class="fas fa-edit"></i> Editar</button>
    <button id="btnDetallesCancelar" type="button" class="btn btn-secondary" onClick="cancelarEditar()"><i class="fas fa-window-close"></i> Cancelar</button>
    <button id="btnDetallesGuardar" type="submit" class="btn btn-success" name="funcion" value="registrarRol"><i class="far fa-save"></i> Guardar</button>
</form>

<script src="../../assets/js/user/_detalle.js"></script>