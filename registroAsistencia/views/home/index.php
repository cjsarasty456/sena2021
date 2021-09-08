<?php
// $requiereSesion=true;
// $idPagina=5;
// require_once '../head.php';
require_once '../headInvited.php';
$tipoDocumento="";
if(isset($_GET['tipoDocumento'])) $tipoDocumento=$_GET['tipoDocumento'];
$documento="";
if(isset($_GET['documento'])) $documento=$_GET['documento'];

require_once '../../controllers/estudianteController.php';
$oEstudiante=new estudianteController();
$registros=$oEstudiante->consultarEstudiante($tipoDocumento,$documento);
?>
  <div class="card">
  <div class="card-header">
    Consulta Aprendiz
  </div>
  <div class="card-body">
        <form action="" method="GET">
            <div class="row">
                <div class="col col-12 col-md-6">
                    <label for="">Tipo Documento</label>
                    <select class="form-control" name="tipoDocumento" id="" onChange="this.form.submit();">
                        <option value="" disabled selected>Selecciones una opción</option>
                        <!-- <option value="RC" >Registro Civil</option> -->
                        <option value="TI" <?php if($tipoDocumento=="TI") echo "selected"; ?> >Tarjeta de Identidad</option>
                        <option value="CC" <?php if($tipoDocumento=="CC") echo "selected"; ?>>Cedula Ciudadanía</option>
                        <option value="CE" <?php if($tipoDocumento=="CE") echo "selected"; ?>>Cedula Extranjería</option>
                    </select>
                </div>
                <div class="col col-12 col-md-6">
                    <label for="">Documento Identidad</label>
                    <input type="text" class="form-control" name="documento" value="<?php echo $documento; ?>" onChange="this.form.submit();">
                </div>
            </div>
        </form>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Aprendiz</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($registros as $registro){
                        ?>
                        <tr>
                            <td>
                                Documento: <?php	
                                echo $registro['tipoDocumento']." - ".$registro['documentoIdentidad'];
                                ?>
                                <br>
                                Nombre completo: <?php	
                                echo $registro['nombres']." - ".$registro['apellidos'];
                                ?>
                            </td>
                            <td>
                                <a href="generarCodigoQr.php?idEstudiante=www.<?php echo $_SERVER['HTTP_HOST']."/views/home/registrarAsistencia.php?id=".$registro['idEstudiante'];?>">Generar código QR</a>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" onclick="abrirModal('<?php echo $registro['idEstudiante'];?>')">
                  Launch Default Modal
                </button>
                            </td>
                        </tr>
                        <?php
                    }
                ?>

            </tbody>
        </table>
  </div>
</div>


<?php
require_once '../footer.php';
?>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <iframe id="iframe" style="width:100%;height:610px;" style="border:none;"  ></iframe>
        </div>
  
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<script>
  function abrirModal(idEstudiante){
    var iframe=document.getElementById('iframe');
    iframe.src="generarCodigoQr.php?idEstudiante="+idEstudiante;
 
  }
</script>