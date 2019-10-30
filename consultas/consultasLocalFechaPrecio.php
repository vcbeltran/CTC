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

    

    public function recuperaDatosLocalFechaPrecio($idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina){
        try {
            //$consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCAL = ? AND RESERVADO = ? ORDER BY FECHARESERVADA DESC LIMIT ?, ? ";
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,false);
            $consulta = $consulta .  " LIMIT ?, ? ";

                   
            $stmt = $this->conexion->prepare($consulta);

            //0 es nulo, 1 no es nulo
            if (!isset($idLocal) && !isset($reservado) && !isset($idUsuario)){ //000
                $stmt->bind_param('ss',$iniciar,$fechasPorPagina);
            } else if (!isset($idLocal) && !isset($reservado) && isset($idUsuario)) {//001
                $stmt->bind_param('iss',$idUsuario,$iniciar,$fechasPorPagina);
            } else if (!isset($idLocal) && isset($reservado) && !isset($idUsuario)) {//010
                $stmt->bind_param('iss',$reservado,$iniciar,$fechasPorPagina);
            } else if (!isset($idLocal) && isset($reservado) && isset($idUsuario)) {//011
                $stmt->bind_param('iiss',$reservado,$idUsuario,$iniciar,$fechasPorPagina);
            } else if (isset($idLocal) && !isset($reservado) && !isset($idUsuario)) {//100
                $stmt->bind_param('iss',$idLocal,$iniciar,$fechasPorPagina);
            } else if (isset($idLocal) && !isset($reservado) && isset($idUsuario)) {//101
                $stmt->bind_param('iiss',$idLocal,$idUsuario,$iniciar,$fechasPorPagina);
            } else if (isset($idLocal) && isset($reservado) && !isset($idUsuario)) {//110
                $stmt->bind_param('iiss',$idLocal,$reservado,$iniciar,$fechasPorPagina);
            } else if (isset($idLocal) && isset($reservado) && isset($idUsuario)) {//111
                $stmt->bind_param('iiiss',$idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina);
            }

            $stmt -> execute();
            $resultado = $stmt->get_result();
            
            $fechasPrecio = array();
            if ($resultado->num_rows != 0){
                while ($fila = $resultado->fetch_assoc()){
                    array_push($fechasPrecio, $fila);                    
                }             
                return $fechasPrecio;     
            } 
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar pagina '.$e->getMessage()."\n";
        }
    }
    
    

    
    //Cuenta el total de filas
    public function contarFilasLocalFechaPrecio($idLocal,$reservado,$idUsuario){
        try {
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,true);
            
            $stmt = $this->conexion->prepare($consulta);

            
            //0 es nulo, 1 no es nulo
            if (!isset($idLocal) && !isset($reservado) && !isset($idUsuario)){ //000
                //no hay ningún parámetro no hago bind_param
            } else if (!isset($idLocal) && !isset($reservado) && isset($idUsuario)) {//001
                $stmt->bind_param('i',$idUsuario);
            } else if (!isset($idLocal) && isset($reservado) && !isset($idUsuario)) {//010
                $stmt->bind_param('i',$reservado);
            } else if (!isset($idLocal) && isset($reservado) && isset($idUsuario)) {//011
                $stmt->bind_param('ii',$reservado,$idUsuario);
            } else if (isset($idLocal) && !isset($reservado) && !isset($idUsuario)) {//100
                $stmt->bind_param('i',$idLocal);
            } else if (isset($idLocal) && !isset($reservado) && isset($idUsuario)) {//101
                $stmt->bind_param('ii',$idLocal,$idUsuario);
            } else if (isset($idLocal) && isset($reservado) && !isset($idUsuario)) {//110
                $stmt->bind_param('ii',$idLocal,$reservado);
            } else if (isset($idLocal) && isset($reservado) && isset($idUsuario)) {//111
                $stmt->bind_param('iii',$idLocal,$reservado,$idUsuario);
            }

            $stmt -> execute();
            $this->resultado = $stmt->get_result();

            if ($this->resultado->num_rows != 0){
                $fila = $this->resultado->fetch_assoc(); //fetch_array();
                return $fila['total'];
            } else {
                return 0;
            }
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar pagina '.$e->getMessage()."\n";
        }
    }


    private function consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$bTotal){
        $consulta = " select ";

        if ($bTotal){
            $consulta = $consulta . " count(*) as total ";
        } else {
             $consulta = $consulta . " local.idlocal, local.nombrelocal, local.imagen, "
             . " usuario.idusuario, usuario.nombre as nombreusuario, usuario.correo, "
             . " localfechaprecio.idlocalfechaprecio, localfechaprecio.fechareservada, "
             . " localfechaprecio.horainicio, localfechaprecio.horafin, localfechaprecio.precio, localfechaprecio.reservado ";
        }
        $consulta = $consulta . " from "
          . " local inner join localfechaprecio on (local.idlocal = localfechaprecio.idlocal) "
          . " left join reserva on (localfechaprecio.idlocalfechaprecio = reserva.idlocalfechaprecio) "
          . " left join usuario on (reserva.idusuario = usuario.idusuario ) "
          . " where (1=1) ";

        
        
        if (isset($idLocal)) {
            $consulta = $consulta . " and local.idlocal=? ";
        }
        if (isset($reservado)) {
            $consulta = $consulta . " and localfechaprecio.reservado=? ";
        }
        if (isset($idUsuario)) {
            $consulta = $consulta . " and usuario.idusuario=? ";
        }
        
        if (!$bTotal){
            $consulta = $consulta . " order by local.nombrelocal, localfechaprecio.fechareservada desc ";
        }        

        return $consulta;
    }
    
    
    
    /*recupera los datos de una fila del local fechas y precio*/
    public function recuperaFilaLocalFechaPrecio($codigo){
        $consulta = "SELECT * FROM LOCALFECHAPRECIO WHERE IDLOCALFECHAPRECIO = '$codigo'";

        $resultado = $this->conexion->query($consulta);

        $fila = $resultado->fetch_assoc();
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
