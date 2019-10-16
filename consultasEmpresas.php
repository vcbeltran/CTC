<?php

/**
 * Clase que sirve para la gestión de los datos necesarios que son relativos al perfil de empresa
 * 
 *
 * @author Verobel
 */

include ('conexiones.php');

class consultasEmpresas {
    public function altaRolEmpresa($nombre, $correo, $password){
            
        $alta = "INSERT INTO USUARIO (NOMBRE, CORREO, PASSWORD, IDROL) VALUES ('$nombre', '$correo', '$password', 2)";
        
        $conexion = Conexiones::getConexion();
        if ($conexion->query($alta)) {
            return true;
        } 
        
    }
}
