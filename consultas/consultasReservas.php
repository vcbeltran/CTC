<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of consultasReservas
 *
 * @author Vero
 */
class consultasReservas {
    //put your code here
    private $conexion;
    public function __construct() {
        $this->conexion = new mysqli('localhost', 'vero', 'proyectodaw', 'ctc');
        if ($this->conexion->connect_error) {
            die("Error de conexión(" . $this->conexion->connect_errno . ") "
                    . $this->conexion->connect_errno);
        }
    } 
    
    public function insertarReserva($fechaRealiza, $idCodigoFecha, $idUsuario){
        $alta = "INSERT INTO RESERVA (FECHAREALIZA, IDLOCALFECHAPRECIO, IDUSUARIO) "
                . " VALUES ('$fechaRealiza', '$idCodigoFecha', '$idUsuario')";
       
        if ($this->conexion->query($alta)) {
            $this->actualizaReservado($idCodigoFecha);
                return true;
            }
    }
    
    private function actualizaReservado($idCodigoFecha){
        $actualizar = "UPDATE LOCALFECHAPRECIO SET RESERVADO = 1 WHERE IDLOCALFECHAPRECIO = '$idCodigoFecha'";
        
        if($this->conexion->query($actualizar)){
            return true;
        }
        
    }
        public function eliminarReserva($idCodigoFecha){
        $alta = "DELETE FROM RESERVA WHERE IDLOCALFECHAPRECIO = '$idCodigoFecha' ";
        echo $alta;
            if ($this->conexion->query($alta)) {
                $this->actualizaReservadoLibre($idCodigoFecha);
                return true;
            }
    }
        private function actualizaReservadoLibre($idCodigoFecha){
        $actualizar = "UPDATE LOCALFECHAPRECIO SET RESERVADO = 0 WHERE IDLOCALFECHAPRECIO = '$idCodigoFecha'";
        
        if($this->conexion->query($actualizar)){
            return true;
        }        
    }
}
