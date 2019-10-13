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
    function listarLocales(){
        $consulta = "SELECT * FROM LOCAL";
        $locales = array();
        
        $this->resultado = $this->conexion->query($consulta);
        //Se recorre el resultado con while añadiendo cada fila en array locales
        while ($fila = $this->resultado->fetch_array()){
            array_push($locales, $fila);
        }
        return $locales;
    }
    /*
     * Te devuelve una fila de un único local
     */
    function seleccionarFila($codigoLocal){
        $consulta = "SELECT * FROM LOCAL WHERE IDLOCAL = '$codigo'";
        $this->resultado = $this->conexion->query($consulta);
        
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
            echo "El local ha sido eliminado correctamente";
        } else {
            echo "No se pudo efectuar el borrado";
        }
    }
    
}
