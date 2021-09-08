btnDetalleModuloEditar=document.getElementById('btnDetallesEditar');
btnDetalleModuloCancelar=document.getElementById('btnDetallesCancelar');
btnDetalleModuloGuardar=document.getElementById('btnDetallesGuardar');
txtDetalleNombreModulo=document.getElementById('nombreModulo');
cancelarEditar();
function cancelarEditar(){
    btnDetalleModuloEditar.style.display="";
    btnDetalleModuloCancelar.style.display="none";
    btnDetalleModuloGuardar.style.display="none";
    txtDetalleNombreModulo.readOnly=true;
}
function habilitarEditar(){
    btnDetalleModuloEditar.style.display="none";
    btnDetalleModuloCancelar.style.display="";
    btnDetalleModuloGuardar.style.display="";
    txtDetalleNombreModulo.readOnly=false;
}







