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
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/9572130963.js"></script>
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
