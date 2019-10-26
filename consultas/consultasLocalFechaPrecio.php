<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
        $alta = "INSERT INTO LOCALFECHAPRECIO (FECHARESERVADA, PRECIO, HORAINICIO, HORAFIN, IDLOCAL)"
                . " VALUES ('$fecha','$precio','$horaIni','$horaFin', '$idlocal')";
       
        if($this->conexion->query($alta)){
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
}
