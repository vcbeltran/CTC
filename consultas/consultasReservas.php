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
    
    public function insertaPuntuacion($puntuacion, $idLocalFechaPrecio){
        $insertar = "UPDATE RESERVA SET PUNTUACION = '$puntuacion' WHERE IDLOCALFECHAPRECIO = '$idLocalFechaPrecio' ";
        
        if($this->conexion->query($insertar)){
            return true;
        }      
    }
    
    public function consultaMedia($idLocal) {
        $consulta = " SELECT ifnull(AVG(PUNTUACION), 0) as media,  "
                . " ifnull(MIN(puntuacion), 0) as minima, "
                . " ifnull(MAX(puntuacion), 0) as maxima, "
                . " ifnull(AVG(precio), 0) as preciomedio, "                
                . " local.nombrelocal, local.imagen "
                . " FROM RESERVA reser, LOCALFECHAPRECIO localfecha, local "
                . " WHERE localfecha.IDLOCALFECHAPRECIO = reser.IDLOCALFECHAPRECIO "
                . " and localfecha.idlocal = local.idlocal ";
        if (isset($idLocal)) {
            $consulta = $consulta . " and local.idlocal = '$idLocal' ";
        }
        $consulta = $consulta . " GROUP BY local.nombrelocal, local.imagen "
                . " ORDER BY media DESC, local.nombrelocal"
                . " LIMIT 0, 5 ";

        
        $resultado = $this->conexion->query($consulta);
       // echo $consulta;
        $listaResulltado = array();
        if ($resultado->num_rows != 0) {
            while ($fila = $resultado->fetch_assoc()) {
                array_push($listaResulltado, $fila);
            }
            return $listaResulltado;
        } else {
            return null;
        }
    }

}
