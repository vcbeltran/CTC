<?php

/* 
 * Clase que es la que da de alta al usuario
 */
include ('conexiones.php');
session_start();
/* LOGIN */
    $conexion = new Conexiones();
    $usuario = $_REQUEST['nombre'];
    $correo = $_REQUEST['mail'];
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Alta usuario</title>
    </head>
    <body>
        <?php
        if ($conexion->altaUsuario($usuario, $correo, $password)) {
            $_SESSION['useronline'] = $usuario;
            $_SESSION['tipo'] = 3;
            ?>
            <div class="container" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <div class="alert alert-success">
                    <strong>¡Ya está registrado!</strong> Puedes volver a la página de inicio <a href="inicio.php" class="alert-link">pulsando aquí</a>.
                </div> 
                </div>
            </div>
            <?php } else { ?>
            <div class="container  mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>Lo sentimos!</strong> Faltan datos o el usuario ya está en uso.
                    </div>  
                </div>
            </div>        
            <?php } ?>     
    </body>
</html>
