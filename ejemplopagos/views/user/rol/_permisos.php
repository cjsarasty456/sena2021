<?php
  require_once "../../controllers/userController.php";
  $oUser=new UserController();
  $listaModulos=$oUser->ConsultarListaModulos();
  // $listaPaginas=$oUser->ObtenerPaginasModulo($idModulo);
?>
<h5><i class="fas fa-window-maximize"></i> Paginas de permiso</h5>
<form action="../../controllers/userController.php" method="POST">
  <button type="submit" class="btn btn-success" name="funcion" value="actualizarPermisos">
    <i class="fas fa-save"></i> Actualizar permisos 
  </button>
  <input type="hidden" name="idRol" value="<?php echo $idRol; ?>">
  <br>
  <table class="table table-hover">
    <tbody>
      <?php foreach($listaModulos as $registro){ ?>
      <tr data-widget="expandable-table" aria-expanded="true">
        <td>
          <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
          <?php echo $registro['nombreModulo']; ?>
        </td>
      </tr>
      <tr class="expandable-body">
                  <td>
                    <div class="p-0">
                      <table class="table table-hover">
                        <tbody>
                          <?php 
                            $listaPaginas=$oUser->ObtenerPaginasModulo($registro['idModulo']);
                            foreach($listaPaginas as $registroPagina){
                          ?>
                            <tr>
                              <td>
                                <input type="checkbox" name="idPaginas[]" value="<?php echo $registroPagina['idPagina']; ?>"
                                <?php if($registroPagina['idRol']==$idRol) echo "checked"; ?>>
                                <label for="check<?php echo $registroPagina['idPagina'] ?>"> 
                                  <?php echo $registroPagina['nombrePagina']; ?>
                                </label>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
      
      <?php } ?>
    </tbody>
  </table>
</form>