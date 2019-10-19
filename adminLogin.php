<?php

/* 
 * Clase que te comprueba qué tipo de usuario eres y te lleva a la pantalla según 
 * tu rol y tipo de funcionalidades que puedes usar. Una vez que el usuario ya esté
 * dado de alta en la base de datos. 
 */

include 'consultas/conexiones.php';
//creo un objeto de la clase conexión
$conexion = new Conexiones();

//rescato los datos del formulario
$nombre = $_REQUEST['nombre'];
$mail = $_REQUEST['mail'];

$conexionTipo = array();
//llamo a la función que comprueba qué tipo de usuario es.
//como el correo es unique me vale con preguntar con ese parámetro
$conexionTipo = $conexion->compruebaTipoUsuario($mail);

 //si es un administrador, redirecciono a la página
if ($conexionTipo[2] == 1){
   session_start();
   $_SESSION['tipo'] = $conexionTipo[1];
   $_SESSION['id'] = $conexionTipo[2];
   $_SESSION['nombre'] = $conexionTipo[0];
   
   include 'administrador/menuAdministrador.php';
   header("location:administrador/menuAdministrador.php");
   //var_dump($conexionTipo);
    
} elseif ($conexionTipo[2] == 2){
    session_start();
   $_SESSION['tipo'] = $conexionTipo[1];
   $_SESSION['id'] = $conexionTipo[2];
   $_SESSION['nombre'] = $conexionTipo[0];
   session_start();
   
   header("location:empresa/menuEmpresa.php");
    
} else {
    echo 'No existe usuario';
}

