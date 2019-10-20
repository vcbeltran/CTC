<?php

/**
 * Clase que sirve para la gestión de los datos necesarios que son relativos al perfil de empresa
 * 
 *
 * @author Verobel
 */

class consultasEmpresas {
    
   private $conexion;
   private $resultado;
    //put your code here
    public function getConexion() {
        $this->conexion = new mysqli("localhost", "vero", "proyectodaw", "ctc");
        if ($this->conexion->connect_error) {
            die("Error de Conexión(" . $conexion->connect_errno . ")" . $conexion->connect_error);
        }
        return $this->conexion;
    }
    
    public function altaRolEmpresa($nombre, $correo, $password, $idlocal){
            
        $alta = "INSERT INTO USUARIO (NOMBRE, CORREO, PASSWORD, IDROL, IDLOCAL)"
              . " VALUES ('$nombre', '$correo', '$password', 2, '$idlocal')";
        
        $conexion = consultasEmpresas::getConexion();
        if ($conexion->query($alta)) {
            return true;
        }         
    }
   //devuelve la lista de los usuarios de tipo empresa para modificarlos.  
    public function consultaUsuarioEmpresa() {
        $consulta = "SELECT USUARIO.NOMBRE, USUARIO.CORREO, LOCAL.NOMBRELOCAL, USUARIO.IDUSUARIO "
                  . "FROM USUARIO, LOCAL WHERE usuario.IDLOCAL = LOCAL.IDLOCAL;";
        
        $conexion = consultasEmpresas::getConexion();
        $this->resultado = $conexion->query($consulta);
        $usuariosEmpresa = array();
        //mientas que haya una fila que lo vaya agregando al array de usuarios
        while ($fila = $this->resultado->fetch_array()) {
            array_push($usuariosEmpresa, $fila);
        } 
        return $usuariosEmpresa;
    }

     /*
     * Te devuelve una fila de una única empresa con el nombre del local asignado
     */
    function seleccionarFila($codigoEmpresa){
        $consulta = "SELECT USUARIO.IDUSUARIO, USUARIO.NOMBRE, USUARIO.CORREO,"
                . "USUARIO.PASSWORD, LOCAL.NOMBRELOCAL"
                . " FROM USUARIO, LOCAL WHERE IDUSUARIO = '$codigoEmpresa'"
                . "AND LOCAL.IDLOCAL = USUARIO.IDLOCAL";
        
        $conexion = consultasEmpresas::getConexion();
        $this->resultado = $conexion->query($consulta);
        
        $empresa = $this->resultado->fetch_array();
        
        return $empresa;
    }
    public function actualizarEmpresa($codigo, $nombre, $mail, $contra, $idlocal){
        $actualizar = "UPDATE USUARIO SET NOMBRE = '$nombre', CORREO = '$mail', "
                . "PASSWORD = '$contra', IDLOCAL = '$idlocal' where IDUSUARIO = '$codigo' ";
         $conexion = consultasEmpresas::getConexion();
         if ($conexion->query($actualizar)){
             return true;
         }
    }
    
    public function eliminarUsuarioEmpresa($codigo){
        $borrar = "DELETE FROM USUARIO WHERE IDUSUARIO = '$codigo'";
        
        $conexion = consultasEmpresas::getConexion();
        
        if ($conexion->query($borrar)){
            return true;
        }
    }
    
}
