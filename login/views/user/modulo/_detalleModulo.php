<?php
// require_once '../../controllers/userController.php';
$oUserController=new userController();
$registro=$oUserController->detalleModulo($idModulo);
?>
<h2><i class="fas fa-info-circle"></i> Información Modulo</h2>
<form action="../../controllers/userController.php" method="post">
    <div class="row">
        <div class="col col-12">
        <input type="hidden" name="idModulo" value="<?php echo $registro->idModulo; ?>">
            <label for="">Nombre Modulo</label>
            <input id="nombreModulo" type="text" class="form-control" name="nombreModulo" value="<?php echo $registro->nombreModulo; ?>">
        </div>
    </div>
    <br>
    <button id="btnDetallesEditar" type="button" class="btn btn-warning" onClick="habilitarEditar()"><i class="fas fa-edit"></i> Editar</button>
    <button id="btnDetallesCancelar" type="button" class="btn btn-secondary" onClick="cancelarEditar()"><i class="fas fa-window-close"></i> Cancelar</button>
    <button id="btnDetallesGuardar" type="submit" class="btn btn-success" name="funcion" value="registrarModulo"><i class="far fa-save"></i> Guardar</button>
</form>

<script src="../../assets/js/user/_detalleModulo.js"></script>