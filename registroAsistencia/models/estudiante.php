<?php
require_once 'conexiondb.php';
class estudiante{
    //atributos de la tabla estudiante
    public $idEstudiante=0;
    public $tipoDocumento="";
    public $documento="";
    public $nombre="";
    public $apellido="";
    public $direccion="";
    public $telefono="";
    public $ficha="";
    public $numRegistro=0;

//esta función crea un nuevo registro de estudiante
    function nuevoEstudiante(){
        //instancia la clase conectar
        $oConexion=new conexiondb();
        //se establece la conexión con la base datos
        $conexion=$oConexion->getConexion();
        //sentencia SQL para instertar estudiante
        $sql="INSERT INTO estudiante (idEstudiante,tipoDocumento,documentoIdentidad,nombres,apellidos,direccion,telefono,ficha,eliminado)
        VALUES ('$this->idEstudiante','$this->tipoDocumento','$this->documento','$this->nombre','$this->apellido','$this->direccion','$this->telefono','$this->ficha',0)";
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    //esta función realiza una consulta a la base de datos
    //y devuelve un arreglo con los estudiantes
    function ListarEstudiantes($pagina,$tipoDocumento,$documento){
        //se instancia el objeto conectar
        $oConexion=new conexiondb();
        //se establece la conexión con la base datos
        $conexion=$oConexion->getConexion();
        //se registra la consulta sql
        $where="WHERE eliminado=false ";
        if($tipoDocumento!="")
        $where .=" AND tipoDocumento='$tipoDocumento'";
        if($documento!="")
        $where .=" AND documentoIdentidad like '%$documento%'";
        $sql="SELECT count(tipoDocumento) as numRegistro FROM estudiante $where";
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);       //se registra la consulta sql
        foreach($result as $registro){
            $this->numRegistro=$registro['numRegistro'];
        }
        $inicio=(($pagina-1)*10);
        //se registra la consulta sql
        $sql="SELECT * FROM estudiante $where LIMIT 10 OFFSET $inicio";
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function verificarIdEstudiante(){
        //se instancia el objeto conectar
        $oConexion=new conexiondb();
        //se establece la conexión con la base datos
        $conexion=$oConexion->getConexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM estudiante WHERE idEstudiante='$this->idEstudiante'";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
       return $result;
    }
    function ConsultarEstudiante(){
        //se instancia el objeto conectar
        $oConexion=new conexiondb();
        //se establece la conexión con la base datos
        $conexion=$oConexion->getConexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM estudiante WHERE idEstudiante='$this->idEstudiante'";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            //se registra la consulta en los parametros
         $this->idEstudiante=$registro['idEstudiante'];
         $this->tipoDocumento=$registro['tipoDocumento'];
         $this->documento=$registro['documentoIdentidad'];
         $this->nombres=$registro['nombres'];
         $this->apellidos=$registro['apellidos'];
         $this->direccion=$registro['direccion'];
         $this->telefono=$registro['telefono'];
         $this->ficha=$registro['ficha'];
        }
    }
        function actualizarEstudiante(){
            //se instancia el objeto conectar
            $oConexion=new conexiondb();
            //se establece la conexión con la base datos
            $conexion=$oConexion->getConexion();
            //consulta para actualizar el registro
            $sql="UPDATE estudiante SET tipoDocumento='$this->tipoDocumento',
            documentoIdentidad='$this->documento',
            nombres='$this->nombre',
            apellidos='$this->apellido',
            direccion='$this->direccion',
            telefono='$this->telefono',
            ficha='$this->ficha'
            WHERE idEstudiante='$this->idEstudiante'";
            //se ejecuta la consulta
            $result=mysqli_query($conexion,$sql);
            return $result;
        }
        function eliminarEstudiante(){
            //se instancia el objeto conectar
            $oConexion=new conexiondb();
            //se establece la conexión con la base datos
            $conexion=$oConexion->getConexion();
            //consulta para eliminar el registro
            $sql="UPDATE estudiante SET eliminado=true WHERE idEstudiante=$this->idEstudiante";
            // $sql="DELETE FROM estudiante WHERE id=$this->id";
            //se ejecuta la consulta
            $result=mysqli_query($conexion,$sql);
            return $result;
        }
}
?>