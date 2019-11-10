<?php

/*
 * Clase que te comprueba qué tipo de usuario eres y te lleva a la pantalla según 
 * tu rol y tipo de funcionalidades que puedes usar. Una vez que el usuario ya esté
 * dado de alta en la base de datos. 
 */

include 'consultas/conexiones.php';
//creo un objeto de la clase conexión
$conexion = new Conexiones();
$compruebaLogin = new Conexiones();
//rescato los datos del formulario
//$nombre = $_REQUEST['nombre'];
$mail = $_REQUEST['mail'];
$pass = md5($_REQUEST['contra']);
//var_dump($nombre);
//var_dump($mail);
//var_dump($pass);

$conexionTipo = array();
//llamo a la función que comprueba qué tipo de usuario es.
//como el correo es unique me vale con preguntar con ese parámetro
$conexionTipo = $conexion->compruebaTipoUsuario($mail);

/* Comprobar con la contraseña y el usuario que está logueado correctamente */
$datosLogin = $compruebaLogin->compruebaLogin($mail, $pass);

if (isset($mail) && isset($pass)){  
    /*Comparo si coincide el tipo y el valor*/
    if (($datosLogin['CORREO'] == $mail) && ($datosLogin['PASSWORD'] == $pass)){
        /* SI ES UN ADMINISTRADOR SE REDIRECCIONA AL MENÚ */
        if ($conexionTipo[2] == 1) {
            session_start();
            $_SESSION['tipo'] = $conexionTipo[1];
            $_SESSION['id'] = $conexionTipo[2];
            $_SESSION['nombre'] = $conexionTipo[0];

            include 'administrador/menuAdministrador.php';
            header("location:administrador/menuAdministrador.php");
            //var_dump($conexionTipo);
       /* SI ES UN USUARIO EMPRESA SE REDIRECCIONA AL MENÚ */
        } elseif ($conexionTipo[2] == 2) {
            session_start();
            //nombre usuario  
            //extrae el nombre local
            $extraeDatosLocal = $conexion->dameLocalUsuario($mail);
            //es el nombre
            $_SESSION['nombre'] = $conexionTipo[0];
            //tipo de conexion en string
            $_SESSION['tipo'] = $conexionTipo[1];
            // id de la conexion
            $_SESSION['id'] = $conexionTipo[2];
            // id del local
            $_SESSION['local'] = $conexionTipo[3];
            //literal nombre local
            $_SESSION['nombrelocal'] = $extraeDatosLocal[0];
            
            $_SESSION['idLocalFechaPrecio']  = null;

            header("location:empresa/menuEmpresa.php");
        /* SI ES UN USUARIO ONLINE REDIRECCIONA PERMITIENDO RESERVAS */
        } elseif ($conexionTipo[2] == 3){
            session_start();
            
            //correo usuario conectado
            $_SESSION['nombre'] = $conexionTipo[0];
            //tipo conexion en string
             $_SESSION['tipo'] = $conexionTipo[1];
            //id del tipo la conexion
            $_SESSION['id'] = $conexionTipo[2];
             //nombre del usuario online
            $_SESSION['nombreUsuario'] = $conexionTipo[4];
            //idusuario
            $_SESSION['idUsuario'] = $conexionTipo[5];
      
            $_SESSION['idLocal'] = null;
            
            $_SESSION['idLocalFechaPrecio']  = null;
            header("location:inicio.php?pagina=1");
        } 
        
        
    } else {
       header("location:relogin.php");
    }
 }



