<?php
/**
 * Description of conexiones
 *
 * @author Vero
 */
class Conexiones {
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

    public function compruebaTipoUsuario($usuario, $contra) {
        try {
            $conec = Conexiones::getConexion();

            $consulta = "SELECT user.correo, tipo.nombre FROM USUARIO as USER, ROL as TIPO WHERE USER.NOMBRE = ? && USER.PASSWORD = ? "
                    . "AND USER.IDROL = TIPO.IDROL";
            $stmt = $conec->prepare($consulta);    
            $stmt->bind_param('ss', $usuario, $contra);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if($resultado -> num_rows != 0){
                 $tipo = $resultado->fetch_array();
                 return $tipo[0];
            } else {
                return false;
            }
           
            //return $envio;  
        } catch (Excepcion $e) {
            echo 'Error en el metodo comprobar tipo de usuarios' . $e->getMessage() . "\n";
        }
    }    
 
}


