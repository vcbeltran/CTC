<?php

/* 
 * Página que llama a la clase de alta de usuario e informa al usuario
 */
include ('consultas/conexiones.php');

/* LOGIN */
    $conexion = new Conexiones();
    $usuario = $_REQUEST['nombre'];
    $correo = strtolower($_REQUEST['mail']);
    $password = md5($_REQUEST['contra']);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('includes/include.php'); ?>
        <title>Alta usuario</title>
    </head>
    <body>
        <?php
        if ($conexion->altaUsuario($usuario, $correo, $password)) {
//            $_SESSION['useronline'] = $usuario;
//            $_SESSION['tipo'] = 3;
            ?>
            <div class="container mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <div class="alert alert-success">
                    <strong>¡Ya está registrado! </strong> Puedes volver a la página de inicio para acceder <a href="inicio.php" class="alert-link"> pulsando aquí</a>.
                </div> 
                </div>
            </div>
            <?php } else { ?>
            <div class="container  mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <i class="fa fa-frown-o" aria-hidden="true"></i><strong>¡Lo sentimos!</strong> Faltan datos o el usuario ya está en uso.<a href="inicio.php" class="alert-link">Vuelva al inicio pulsando aquí</a>.
                    </div>  
                </div>
            </div>        
            <?php } ?>     
    </body>
</html>
