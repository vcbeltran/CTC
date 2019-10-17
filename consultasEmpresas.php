<?php

/**
 * Clase que sirve para la gestión de los datos necesarios que son relativos al perfil de empresa
 * 
 *
 * @author Verobel
 */

class consultasEmpresas {
    
   private $conexion;
    //put your code here
    public function getConexion() {
        $this->conexion = new mysqli("localhost", "vero", "proyectodaw", "ctc");
        if ($this->conexion->connect_error) {
            die("Error de Conexión(" . $conexion->connect_errno . ")" . $conexion->connect_error);
        } else {
            echo 'Conexion correcta';
        }
        return $this->conexion;
    }
    
    public function altaRolEmpresa($nombre, $correo, $password, $idlocal){
            
        $alta = "INSERT INTO USUARIO (NOMBRE, CORREO, PASSWORD, IDROL, IDLOCAL) VALUES ('$nombre', '$correo', '$password', 2, '$idlocal')";
        
        $conexion = consultasEmpresas::getConexion();
        if ($conexion->query($alta)) {
            return true;
        } 
        
    }
}
