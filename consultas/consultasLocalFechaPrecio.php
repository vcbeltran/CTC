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

    public function recuperaDatosLocalFechaPrecioSinPaginar($idLocal,$reservado,$idUsuario){
        return $this->recuperaDatosLocalFechaPrecio($idLocal,$reservado,$idUsuario,null,null);
    } 

    public function recuperaDatosLocalFechaPrecio($idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina){
        try {
            $select = " local.idlocal, local.nombrelocal, local.imagen, "
             . " usuario.idusuario, usuario.nombre as nombreusuario, usuario.correo, "
             . " localfechaprecio.idlocalfechaprecio, localfechaprecio.fechareservada, "
             . " localfechaprecio.horainicio, localfechaprecio.horafin, localfechaprecio.precio, localfechaprecio.reservado, "
             . " reserva.puntuacion ";            
            $where = null;
            $groupBy = null;
            $orderBy = " order by localfechaprecio.fechareservada desc ";
            $limit = null;
             if (isset($fechasPorPagina)){
                $limit = " LIMIT ?, ? ";
            }
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
                   
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina);
            $stmt -> execute();
            $resultado = $stmt->get_result();
            
            $fechasPrecio = array();
            if ($resultado->num_rows != 0){
                while ($fila = $resultado->fetch_assoc()){
                    array_push($fechasPrecio, $fila);                    
                }             
                return $fechasPrecio;     
            } else {
                return null;
            }
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar pagina '.$e->getMessage()."\n";
        }
    }
    
    

    
    //Cuenta el total de filas
    public function contarFilasLocalFechaPrecio($idLocal,$reservado,$idUsuario){
        try {
            $select = " count(*) as total ";
            $where = null;
            $groupBy = null;
            $orderBy = null;
            $limit = null;
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
            
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,null,null);
            
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

    public function recuperaDatosLocalFechaPrecioFuturas($idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina){
        try {
            $select = " local.idlocal, local.nombrelocal, local.imagen, "
             . " usuario.idusuario, usuario.nombre as nombreusuario, usuario.correo, "
             . " localfechaprecio.idlocalfechaprecio, localfechaprecio.fechareservada, "
             . " localfechaprecio.horainicio, localfechaprecio.horafin, localfechaprecio.precio, localfechaprecio.reservado ";            
            $where = " and localfechaprecio.fechareservada >= DATE(sysdate()) ";
            $groupBy = null;
            $orderBy = " order by local.nombrelocal, localfechaprecio.fechareservada desc ";
            $limit = null;
             if (isset($fechasPorPagina)){
                $limit = " LIMIT ?, ? ";
            }
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
                   
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina);
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

    public function contarFilasLocalFechaPrecioFuturas($idLocal,$reservado,$idUsuario){
        try {
            $select = " count(*) as total ";
            $where = " and localfechaprecio.fechareservada >= DATE(sysdate()) ";
            $groupBy = null;
            $orderBy = null;
            $limit = null;
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
            
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,null,null);
            
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
    

    
    private function consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit){
        $consulta = " select ";
        $consulta = $consulta . $select;


        $consulta = $consulta . " from "
          . " local left join localfechaprecio on (local.idlocal = localfechaprecio.idlocal) "
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
        
        if (isset($where)) {
            $consulta = $consulta . $where;
        }

        if (isset($groupBy)){
            $consulta = $consulta . $groupBy;
        }
        
        if ($orderBy){
            $consulta = $consulta . $orderBy;
        }        

        if ($limit) {
            $consulta = $consulta . $limit;
        }
        
        return $consulta;
    }
    
    
    private function bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina){
            //0 es nulo, 1 no es nulo
            if (!isset($idLocal) && !isset($reservado) && !isset($idUsuario)){ //000
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('ss',$iniciar,$fechasPorPagina);
                } else {
                    ;
                }
            } else if (!isset($idLocal) && !isset($reservado) && isset($idUsuario)) {//001
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iss',$idUsuario,$iniciar,$fechasPorPagina);               
                } else {
                    $stmt->bind_param('i',$idUsuario);    
                }                
                
            } else if (!isset($idLocal) && isset($reservado) && !isset($idUsuario)) {//010
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iss',$idUsuario,$iniciar,$fechasPorPagina);
                } else {
                    $stmt->bind_param('i',$reservado);
                }                
                
            } else if (!isset($idLocal) && isset($reservado) && isset($idUsuario)) {//011
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iiss',$reservado,$idUsuario,$iniciar,$fechasPorPagina);
                } else {
                    $stmt->bind_param('ii',$reservado,$idUsuario);
                }                
                
            } else if (isset($idLocal) && !isset($reservado) && !isset($idUsuario)) {//100
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iss',$idLocal,$iniciar,$fechasPorPagina);
                } else {
                    $stmt->bind_param('i',$idLocal);    
                }                
                
            } else if (isset($idLocal) && !isset($reservado) && isset($idUsuario)) {//101
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iiss',$idLocal,$idUsuario,$iniciar,$fechasPorPagina);
                } else {
                    $stmt->bind_param('ii',$idLocal,$idUsuario);    
                }                
                
            } else if (isset($idLocal) && isset($reservado) && !isset($idUsuario)) {//110
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iiss',$idLocal,$reservado,$iniciar,$fechasPorPagina);
                } else {
                    $stmt->bind_param('ii',$idLocal,$reservado);
                }                
                
            } else if (isset($idLocal) && isset($reservado) && isset($idUsuario)) {//111
                if (isset($fechasPorPagina)){
                    $stmt->bind_param('iiiss',$idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina);
                } else {
                    $stmt->bind_param('iii',$idLocal,$reservado,$idUsuario);    
                }                
            }
        
        return $stmt;
    }    
    
    
    private $consultaTotalReservasPorLocales = "". 
            " local.idlocal, local.nombrelocal, " .
            " sum(nvl(localfechaprecio.reservado, 0)) as totalreserva, " .
            " sum( " .
                    " case  " .
                            " when nvl(localfechaprecio.reservado, 0)  = 1 then localfechaprecio.precio " .
                    " else 0 " .
                    " end ) as totalpreciopagado, " .
            " sum(case  " .
                    " when nvl(localfechaprecio.reservado, 1) = 0 then 1 " .
                    " else 0 " .
               " end) as totallibres, " .
            " sum( " .
                    " case  " .
                            " when nvl(localfechaprecio.reservado, 0)  = 0 then nvl(localfechaprecio.precio,0) " .
                    " else 0 " .
                    " end ) as totalpreciolibre ";
            
    
    /*Este informe es para usuario empresa y admin si local es nulo saca todo*/
    public function informeTotalReservasPorLocales($idLocal,$iniciar,$datosPorPagina){    

        try {
            $reservado = null;
            $idUsuario = null;
            
            $select = $this->consultaTotalReservasPorLocales;
            $where = null;
            $groupBy = " group by local.idlocal, local.nombrelocal ";
            $orderBy = " order by local.nombrelocal ";
            $limit = null;
             if (isset($datosPorPagina)){
                $limit = " LIMIT ?, ? ";
            }
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
                   
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,$iniciar,$datosPorPagina);
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
    
    

    
    //Cuenta el total de reservas realizadas o no
    public function contarTotalReservasPorLocales($idLocal){
        try {
            $reservado = null;
            $idUsuario = null;
            
            $select = " count(*) as total from ( select ";
            $select = $select . $this->consultaTotalReservasPorLocales;
            
            
            $where = null;
            $groupBy = " group by local.idlocal, local.nombrelocal) tabla ";
            $orderBy = null;
            $limit = null;
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
           
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,null,null);
            
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
    
    
    
    
    
    
    
    public function detalleLocalFechaPrecioUsuarioReserva($idLocalFechaPrecio, $idUsuario, $reservado){
        try {
            $idLocal = null;
            //$reservado = null; viene por parámetro
            //$idUsuario = null; viene por parámetro
            $select = " localfechaprecio.fechareservada, localfechaprecio.precio, localfechaprecio.horainicio , localfechaprecio.horafin, local.imagen, local.nombrelocal, reserva.fecharealiza  ";
            $where =  " and localfechaprecio.idlocalfechaprecio = '$idLocalFechaPrecio' ";
            $groupBy = null;
            $orderBy = null;
            $limit = null;
            
            $consulta = $this->consultaMaestraLocalFechaPrecio($idLocal,$reservado,$idUsuario,$select,$where,$groupBy,$orderBy,$limit);
            $stmt = $this->conexion->prepare($consulta);

            $this->bindeaPreparedStatement($stmt, $idLocal,$reservado,$idUsuario,null,null);
           
            $stmt -> execute();
            $resultado = $stmt->get_result();

            $fechasPrecio = array();
            
            
            if ($resultado->num_rows != 0){
                while ($fila = $resultado->fetch_assoc()){
                    array_push($fechasPrecio, $fila);                    
                }      
                return $fechasPrecio;     
            }  else {
                return null;
            }
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar detalle local fecha precio '.$e->getMessage()."\n";
        }        
    }    
    
    public function detalleLocalFechaPrecio($idLocalFechaPrecio){
        return $this->detalleLocalFechaPrecioUsuarioReserva($idLocalFechaPrecio, null, null);
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
