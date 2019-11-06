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
    
    public function insertarReserva($fechaRealiza, $idLocalFechaPrecio, $idUsuario){
        if ($this->actualizaReservado($idLocalFechaPrecio)){
           $consultasLocalFechaPrecio = new consultasLocalFechaPrecio();
           $reservado = 1;
           $detalleLocalFechaPrecioReservado = $consultasLocalFechaPrecio->detalleLocalFechaPrecioUsuarioReserva($idLocalFechaPrecio, null, $reservado);
         
           $fecharealiza = null;
           foreach ($detalleLocalFechaPrecioReservado as $datos):
               $fecharealiza = $datos['fecharealiza'];
           endforeach;
           
           if (!isset($fecharealiza)) {
                $alta = "INSERT INTO RESERVA (FECHAREALIZA, IDLOCALFECHAPRECIO, IDUSUARIO) "
                        . " VALUES ('$fechaRealiza', '$idLocalFechaPrecio', '$idUsuario')";
                if ($this->conexion->query($alta)) {
                    return true;
                }
            }
        }
        
        return false;
    }

    private function actualizaReservado($idLocalFechaPrecio){
        $actualizar = "UPDATE LOCALFECHAPRECIO SET RESERVADO = 1 WHERE IDLOCALFECHAPRECIO = '$idLocalFechaPrecio' AND RESERVADO = 0";
        
        if($this->conexion->query($actualizar)){
            return true;
        }
        
        return false;
        
    }
        public function eliminarReserva($idLocalFechaPrecio){
        $alta = "DELETE FROM RESERVA WHERE IDLOCALFECHAPRECIO = '$idLocalFechaPrecio' ";
        echo $alta;
            if ($this->conexion->query($alta)) {
                $this->actualizaReservadoLibre($idLocalFechaPrecio);
                return true;
            }
    }
        private function actualizaReservadoLibre($idLocalFechaPrecio){
        $actualizar = "UPDATE LOCALFECHAPRECIO SET RESERVADO = 0 WHERE IDLOCALFECHAPRECIO = '$idLocalFechaPrecio'";
        
        if($this->conexion->query($actualizar)){
            return true;
        }        
    }
}
