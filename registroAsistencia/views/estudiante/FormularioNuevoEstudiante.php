<?php
$requiereSesion=false;
$idPagina=0; 
require '../head.php';
?>
<div class="">
    <h1>Nuevo Estudiante</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item"><a href="listarEstudiante.php">Listar Estudiante</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Estudiante</li>
    </ol>
    </nav>
    <form action="../../controllers/estudianteController.php" method="GET">
    <div class="row">
        <div class="col col-6">
            <label for="">Tipo de Documento</label>
            <!-- <input type="text" class="form-control" name="tipoDocumento" id=""> -->
            <select class="form-control" name="tipoDocumento">
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="RC">Registro Civil</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CC">Cedula Ciudadanía</option>
                <option value="CE">Cedula Extranjería</option>
            </select>
        </div>
        <div class="col col-6">
            <label for="">Número de documento</label>
            <input type="text" class="form-control" name="documento" id="">
        </div>
    </div>
    <div class="row">
        <div class="col col-6">
            <label for="">Nombres</label>
            <input type="text" class="form-control" name="nombre" id="">
        </div>
        <div class="col col-6">
            <label for="">Apellidos</label>
            <input type="text" class="form-control" name="apellido" id="">
        </div>
    </div>
    <div class="row">
        <div class="col col-6">
            <label for=""><i class="fas fa-map-marked-alt"></i> Dirección</label>
            <input type="text" class="form-control" name="direccion" id="">
        </div>
        <div class="col col-6">
            <label for=""><i class="fas fa-phone-alt"></i> Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="">
        </div>
    </div>
    <div class="row">
        <div class="col col-6">
            <label for=""><i class="fas fa-map-marked-alt"></i> Ficha</label>
            <select name="ficha" class="form-control" id="">
                <option value="" disable>Seleccione una Opción</option>
                <option value="2277356">2277356 ADSI</option>
            </select>
        </div>
    </div>
    <br>
    <button name="funcion" value="registrarEstudiante" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    </div>
    </form>
<?php
require '../footer.php';

?>