<?php


$oUser=new userController();
$listaRoles=$oUser->ListaRoles();
$idRol=$oUser->obtenerRolUsuario();
?>
<h3>Pefil</h3>
<label for="">Nombre</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="text" name="nombreUsuario" class="form-control">
</div>

<label for="">Correo Electronico</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <input type="email" name="correoElectronico" class="form-control">
</div>

<label for="">Rol</label>
<select name="" id="" class="form-control" readOnly disabled>
    <option value="" disabled>Sin Rol</option>
    <?php
    foreach($listaRoles as $registro){
    ?>
        <option value="<?php echo $registro['idRol']; ?>" <?php if($registro['idRol']==$idRol) echo "selected"; ?> ><?php echo $registro['nombreRol']; ?></option>
    <?php
    }
    ?>
</select>
<br>
<button type="submit" class="btn btn-success">Guarndar</button>