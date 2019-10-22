<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsultasLocales
 *
 * @author Vero
 */
class ConsultasLocales {
    //put your code here
    private $conexion;
    private $resultado;
    
    // constructor de la conexion
    function __construct() {
        $this->conexion = new mysqli('localhost', 'vero', 'proyectodaw', 'ctc');
        if ($this->conexion->connect_error) {
            die("Error de conexión(" . $this->conexion->connect_errno . ") "
                    . $this->conexion->connect_errno);
        }
    } 
    /*
     * Te devuelve un array con todos los locales
     */
    function listarLocales($iniciar,$localesPorPagina){
        try {
        $consulta = "SELECT * FROM LOCAL LIMIT ?, ?";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param('ss', $iniciar, $localesPorPagina);
        $stmt -> execute();
        $this->resultado = $stmt->get_result();
        $locales = array();
            if ($this->resultado->num_rows != 0){
                while ($fila = $this->resultado->fetch_array()){
                    array_push($locales, $fila);
                    return $locales;     
                }                
            } else {
                return false;
            }   
        } catch (Excepcion $e){
            echo 'Error en el metodo comprobar gestores '.$e->getMessage()."\n";
        }
        
//        $locales = array();        
//        //$this->resultado = $this->conexion->query($consulta);
//        //Se recorre el resultado con while añadiendo cada fila en array locales
//        while ($fila = $this->resultado->fetch_array()){
//            array_push($locales, $fila);
//        }
//        return $locales;
    }
    
    /*Contar las filas del total de locales para la paginación*/
    function totalFilas(){
        $consulta = "SELECT * FROM LOCAL";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $totalRegistros = $resultado->num_rows;
        
        return $totalRegistros;
    }

//    public function limiteArticulos(){
//        $consulta = "SELECT * FROM LOCAL LIMIT 1,8";
//        $stmt = $this->conexion->prepare($consulta);
//        $stmt->execute();
//        //$resultado = $stmt->get_result();
//        
//        $resultado = $stmt->get_result();
//        $totalRegistros = $resultado->num_rows;
//        return $totalRegistros;
//    }
    /*
     * Te devuelve una fila de un único local
     */
    function seleccionarFila($codigoLocal){
        $consulta = "SELECT * FROM LOCAL WHERE IDLOCAL = '$codigoLocal'";
       $this->conexion->query($consulta);
        
        $local = $this->resultado->fetch_array();
        
        return $local;
    }
    
    function annadirLocal($nombre, $direccion, $aforo, $imagen){
        $annadir = "INSERT INTO LOCAL (NOMBRELOCAL, DIRECCION, AFORO, IMAGEN) VALUES ('$nombre','$direccion','$aforo','$imagen')";
        
        if ($this->conexion->query($annadir)) {
            //return header("location:articulos.php");
           return true;
        } 
    }
    
    function borrarLocal($id){
        $eliminar = "DELETE FROM LOCAL WHERE IDLOCAL = '$id'";     
        
        if ($this->conexion->query($eliminar)) {
            return true;
        } 
    }
    
    function actualizarLocalConFoto($id, $nombre, $direccion, $aforo, $caratula) {
        $consulta = "UPDATE LOCAL SET NOMBRELOCAL='$nombre', DIRECCION='$direccion', "
                . "AFORO='$aforo', IMAGEN='$caratula' "
                . "WHERE IDLOCAL='$id'";
        if ($this->conexion->query($consulta)) {
            return true;
        }
    }

    function actualizarLocalSinFoto($id, $nombre, $direccion, $aforo) {
        $consulta = "UPDATE LOCAL SET NOMBRELOCAL='$nombre', DIRECCION='$direccion', "
                . "AFORO='$aforo' WHERE IDLOCAL='$id'";
        if ($this->conexion->query($consulta)) {
           return true;
        } 
    }
    
    /*Funcion para listar los locales libres que no tengan asignado un usuario empresa */
    public function listaLocalDisponible() {
        $consulta = "SELECT LOCAL.* FROM LOCAL LEFT JOIN USUARIO ON "
                . "(LOCAL.IDLOCAL = USUARIO.IDLOCAL)"
                . "WHERE USUARIO.IDLOCAL IS NULL";

        $this->resultado = $this->conexion->query($consulta);
        //creo el array para meter los datos
        $locales = array();
        //Se recorre el resultado con while añadiendo cada fila en array locales
        while ($fila = $this->resultado->fetch_array()){
            array_push($locales, $fila);
        }
        return $locales;
    }

}
