<?php
require 'head.php';
require_once '../modelo/estudiante.php';
require_once '../modelo/notas.php';
$oEstudiante= new estudiante();
$oEstudiante->id=$_GET['idEstudiante'];
$oEstudiante->ConsultarEstudiante();
$oNotas=new notas();
$oNotas->idMatricula=$_GET['idMatricula'];
$oNotas->consultarNotaPorIdMatricula();

?>
<h1>Registro Notas</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarCurso.php">Listar Curso</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalle Curso</li>
  </ol>
</nav>
<form action="../guardarNota.php" method="GET">
<div class="row">
    <div class="col col-xl-3 col-md-6 col-12">
        <label for="">Nombre Estudiante</label>
        <input class="form-control" value="<?php echo $oEstudiante->nombres." ".$oEstudiante->apellidos; ?>" readonly>
    </div>
</div>
<div class="row">
    <div class="col col-12 col-md-6 col-xl-6">
        <input type="text" name="idMatricula" value="<?php echo $_GET['idMatricula']; ?>" style="display:none;">
        <label for="">Nota 1</label>
        <input class="form-control" id="nota1" type="number" min="0" max="5" step="0.01" onchange="calcularPromedio();" name="notas1" type="text" value="<?php echo $oNotas->nota1; ?>">
    </div>
    <div class="col col-12 col-md-6 col-xl-6">
        <label for="">Nota 2</label>
        <input class="form-control" id="nota2" type="number" min="0" max="5" step="0.01" onchange="calcularPromedio();" name="notas2" type="text" value="<?php echo $oNotas->nota2; ?>">
    </div>
</div>
<div class="row">
    <div class="col col-12 col-md-6 col-xl-6">
        <label for="">Nota 3</label>
        <input class="form-control" id="nota3" type="number" min="0" max="5" step="0.01" onchange="calcularPromedio();" name="notas3" type="text" value="<?php echo $oNotas->nota3; ?>">
    </div>
    <div class="col col-12 col-md-6 col-xl-6">
        <label for="">Promedio</label>
        <input class="form-control" id="promedio" type="text" disabled>
    </div>
</div>
<br>
<input type="submit" class="btn btn-success" value="Guardar">
</form>
<script>
    function calcularPromedio(){
        var nota1=document.getElementById("nota1").value;
        var nota2=document.getElementById("nota2").value;
        var nota3=document.getElementById("nota3").value;
        if(nota1=="") nota1="0";
        if(nota2=="") nota2="0";
        if(nota3=="") nota3="0";
        nota1=parseFloat(nota1);
        nota2=parseFloat(nota2);
        nota3=parseFloat(nota3);
        promedio=((nota1+nota2+nota3)/3).toFixed(2);
        document.getElementById("promedio").value=promedio;
    }
</script>
<?php
echo "<script>calcularPromedio();</script>";
require 'footer.php';
?>
