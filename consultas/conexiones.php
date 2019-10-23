<?php
/**
 * Description of conexiones
 *
 * @author Vero
 */
class Conexiones {
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
    //comprueba el tipo de usuario de la base de datos, y devuelve su rol
    
    public function compruebaTipoUsuario($mail) {
        try {
            $conec = Conexiones::getConexion();

            $consulta = "SELECT USER.CORREO, TIPO.NOMBRE, TIPO.IDROL, USER.IDLOCAL "
                    . "FROM USUARIO AS USER, ROL AS TIPO "
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

    public function dameLocalUsuario($mail) {
        $consulta = "SELECT LOCAL.NOMBRELOCAL FROM LOCAL, USUARIO
                        WHERE LOCAL.IDLOCAL =  USUARIO.IDLOCAL 
                        AND USUARIO.CORREO = '$mail'";

        $conexion = Conexiones::getConexion();
        $this->resultado = $conexion->query($consulta);
        // $datosLocal = array();       
        $tipo = $this->resultado->fetch_array();
        return $tipo;
    }
    /*Comprueba correo y contraseña en bbdd para ver si son correctos */
    public function compruebaLogin($mail, $pass){
        $consulta = "SELECT * FROM USUARIO WHERE "
                . "CORREO = ? AND PASSWORD = ? ";
        
        $conexion = Conexiones::getConexion();
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ss', $mail,$pass);
        $stmt->execute();
        $this->resultado = $stmt->get_result();
        
        $fila = $this->resultado->fetch_assoc();
        return $fila;
    }
    
    
    // desconecta de la base de datos
    public function desconectar() {
        $this->conexion->close();
    }
    


}

