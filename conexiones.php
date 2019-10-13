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
    //comprueba el tipo de usuario de la bade de datos, su rol
    
    public function compruebaTipoUsuario($mail) {
        try {
            $conec = Conexiones::getConexion();

            $consulta = "SELECT USER.CORREO, TIPO.NOMBRE, TIPO.IDROL FROM USUARIO AS USER, ROL AS TIPO"
                    . " WHERE  USER.CORREO = ? "
                    . " AND USER.IDROL = TIPO.IDROL";
            $stmt = $conec->prepare($consulta);    
            $stmt->bind_param('s',$mail);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if($resultado -> num_rows != 0){
                 $tipo = $resultado->fetch_array();
                 return $tipo;
            } else {
                return false;
            }         
        
        } catch (Excepcion $e) {
            echo 'Error en el metodo comprobar tipo de usuarios' . $e->getMessage() . "\n";
        }
    }
    //función para dar de alta usuarios tipo online
    public function altaUsuario($name, $correo, $password) {
        $alta = "INSERT INTO USUARIO (NOMBRE, CORREO, PASSWORD, IDROL) VALUES ('$name', '$correo','$password', 3)";

        $conexion = Conexiones::getConexion();
        if ($conexion->query($alta)) {
            return true;
        }
    }

    // desconecta de la base de datos
    function desconectar() {
        $this->conexion->close();
    }
    
    
    //cierra sesión de usuario
    function cierreSesion(){
        session_destroy();
    }
}



