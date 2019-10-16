<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of consultasEmpresas
 *
 * @author Vero
 */
class ConsultasEmpresas {
    //put your code here
    private $conexion;
    //put your code here
    public function getConexion() {
        $this->conexion = new mysqli("localhost", "vero", "proyectodaw", "ctc");
        if ($this->conexion->connect_error) {
            die("Error de Conexión(" . $conexion->connect_errno . ")" . $conexion->connect_error);
        } else {
            echo 'Conexion correcta';
        }
        return $this->conexion;
    }
    
        public function altaEmpresa($name, $correo, $password) {
        $alta = "INSERT INTO USUARIO (NOMBRE, CORREO, PASSWORD, IDROL) VALUES ('$name', '$correo','$password', 2)";

        $conexion = ConsultasEmpresas::getConexion();
        if ($conexion->query($alta)) {
            return true;
        }
    }
}
