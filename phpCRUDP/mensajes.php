<?php
class mensaje{

    public $tipoError="danger";
    public $tipoAdvertencia="warning";
    public $tipoCorrecto="success";
    public $tipoInformacion="info";

    public function mostrarMensaje($tipoMensaje,$mensaje){
        return "<div class='alert alert-".$tipoMensaje." alert-dismissible fade show' role='alert'>
        ".$mensaje." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
}

?>