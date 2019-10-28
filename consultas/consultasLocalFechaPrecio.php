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
    /*recupera los datos del local fechas y precio
    lo comento porque hago paginación    */
//   public function recuperaDatosLocalFechaPrecio($idLocal){
//        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCAL = '$idLocal'";
//        
//        $resultado = $this->conexion->query($consulta);
//        $fechasPrecio = array();
//        while ($fila = $resultado->fetch_array()){
//            array_push($fechasPrecio, $fila);
//        }
//        return $fechasPrecio;
//    }
    /*Consulta para traer los datos de la tabla de fechas precio paginados. */
      public function recuperaDatosLocalFechaPrecio($idLocal,$reservado,$iniciar,$fechasPorPagina){
        try {
        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCAL = ? AND RESERVADO = ? ORDER BY FECHARESERVADA DESC LIMIT ?, ? ";

        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param('iiss',$idLocal,$reservado,$iniciar,$fechasPorPagina);
        $stmt -> execute();
        $this->resultado = $stmt->get_result();
        $fechasPrecio = array();
            if ($this->resultado->num_rows != 0){
                while ($fila = $this->resultado->fetch_array()){
                    array_push($fechasPrecio, $fila);                    
                }                
                return $fechasPrecio;     
            } 
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar pagina '.$e->getMessage()."\n";
        }
    }
    
    
    /*recupera los datos de una fila del local fechas y precio*/
    public function recuperaFilaLocalFechaPrecio($codigo){
        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCALFECHAPRECIO = '$codigo'";

        $resultado = $this->conexion->query($consulta);

        $fila = $resultado->fetch_assoc();
        return $fila;
    }
    
    /*Cuenta el total de filas*/
    public function contarFilasLocalFechaPrecio($idLocal){
        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCAL = '$idLocal' ";

        $resultado = $this->conexion->query($consulta);

        $fila = $resultado->num_rows;
        return $fila;
    }
    /* Actualiza un registro de fecha precio */
    public function actualizarFechaPrecio($fechareservada, $precio, $horainicio, $horafin, $codigo){
        $consulta = "UPDATE LOCALFECHAPRECIO SET FECHARESERVADA = '$fechareservada', PRECIO = '$precio', "
                . "HORAINICIO = '$horainicio', HORAFIN = '$horafin' WHERE IDLOCALFECHAPRECIO = '$codigo'";
        
        if ($this->conexion->query($consulta)){
            return true;
        }
        
    }
    /* Se borra un registro de fecha */
    public function borrarFechaPrecio($codigo){
        $consulta = "DELETE FROM LOCALFECHAPRECIO WHERE IDLOCALFECHAPRECIO = '$codigo'";
        
        if ($this->conexion->query($consulta)){
            return true;
        }
        
    }
}
