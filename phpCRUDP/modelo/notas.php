<?php
class notas
{
    public $id="";
    public $idMatricula="";
    public $nota1="";
    public $nota2="";
    public $nota3="";

    public function registrarNota(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        $consulta=$this->consultarNota();
        if(sizeof($consulta)>0){
            $sql="UPDATE notas SET nota1=$this->nota1,nota2=$this->nota2,nota3=$this->nota3
            WHERE idMatricula=$this->idMatricula";
        }else{
                $sql="INSERT INTO notas (idMatricula,nota1,nota2,nota3,eliminado)
        VALUES ($this->idMatricula,$this->nota1,$this->nota2,$this->nota3,false)";
        }
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function consultarNota(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM notas where idMatricula=$this->idMatricula";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $result;
    }

    function consultarNotaPorIdMatricula(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM notas where idMatricula=$this->idMatricula";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            //se registra la consulta en los parametros
         $this->idMatricula=$registro['idMatricula'];
         $this->nota1=$registro['nota1'];
         $this->nota2=$registro['nota2'];
         $this->nota3=$registro['nota3'];
         
        }
    }
}
?>