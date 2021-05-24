<?php

class mensaje{
    //variables tipo mensaje
    public $tipoPeligo="danger";
    public $tipoAdvertencia="warning";
    public $tipoInfo="info";
    public $tipoCorrecto="success";

    //variables iconos
    public $iconoPeligo="fas fa-times";
    public $iconoAdvertencia="icon fas fa-ban";
    public $iconoInfo="icon fas fa-ban";
    public $iconoCorrecto="icon fas fa-ban";


    public function mostrarMensaje($titulo,$tipoMensaje,$mensaje){
        $retorno= "<div class='alert alert-$tipoMensaje alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class=".$this->icono($tipoMensaje)."></i> $titulo</h5>
        $mensaje
      </div>";
      return $retorno;
    }
    public function icono($tipo){
        switch($tipo){
            case $this->tipoPeligo:
                return $this->iconoPeligo;
                break;
        }
    }
}

?>