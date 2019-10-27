<?php

/*
 * Consultas relativas a la gestión y disponibilidad de los loscales fechas y precio
 */

/**
 * Description of consultasLocalFechaPrecio
 *
 * @author Vero
 */
class consultasLocalFechaPrecio {
    private $conexion;

    // constructor de la conexion
    public function __construct() {
        $this->conexion = new mysqli('localhost', 'vero', 'proyectodaw', 'ctc');
        if ($this->conexion->connect_error) {
            die("Error de conexión(" . $this->conexion->connect_errno . ") "
                    . $this->conexion->connect_errno);
        } 
    }

    public function insertaPrecio($fecha, $precio, $horaIni, $horaFin, $idlocal){
       
            $alta = "INSERT INTO LOCALFECHAPRECIO (FECHARESERVADA, PRECIO, HORAINICIO, HORAFIN, IDLOCAL, RESERVADO)"
                        . " VALUES ('$fecha','$precio','$horaIni','$horaFin', '$idlocal', 0)";

                if ($this->conexion->query($alta)) {
                    return true;
            }        
    }
    /*recupera los datos del local fechas y precio*/
    public function recuperaDatosLocalFechaPrecio($idLocal){
        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCAL = '$idLocal'";
        
        $resultado = $this->conexion->query($consulta);
        $fechasPrecio = array();
        while ($fila = $resultado->fetch_array()){
            array_push($fechasPrecio, $fila);
        }
        return $fechasPrecio;
    }
    
    /*recupera los datos de una fila del local fechas y precio*/
    public function recuperaFilaLocalFechaPrecio($codigo){
        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCALFECHAPRECIO = '$codigo'";

        $resultado = $this->conexion->query($consulta);

        $fila = $resultado->fetch_assoc();
        return $fila;
    }
    
    public function actualizarFechaPrecio($fechareservada, $precio, $horainicio, $horafin, $codigo){
        $consulta = "UPDATE LOCALFECHAPRECIO SET FECHARESERVADA = '$fechareservada', PRECIO = '$precio', "
                . "HORAINICIO = '$horainicio', HORAFIN = '$horafin' WHERE IDLOCALFECHAPRECIO = '$codigo'";
        
        if ($this->conexion->query($consulta)){
            return true;
        }
        
    }
}
