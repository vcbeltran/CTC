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
        $consulta = "SELECT USUARIO.NOMBRE, USUARIO.CORREO, LOCAL.NOMBRELOCAL, LOCAL.IDLOCAL "
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

    public function actualizarEmpresa(){
        $actualizar = "UPDATE ";
    }
}
