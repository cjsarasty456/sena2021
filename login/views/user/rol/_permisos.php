<?php
  require_once "../../controllers/userController.php";
  $oUser=new UserController();
  $listaModulos=$oUser->ConsultarListaModulos();
  // $listaPaginas=$oUser->ObtenerPaginasModulo($idModulo);
?>
<h5>Paginas de permiso</h5>
<form action="" method="post">
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
                                <label for="">

                                </label>
                                <?php echo $registroPagina['nombrePagina']; ?>
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