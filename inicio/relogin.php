<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php'); ?>
        <title>Vuelva a loguearse</title>
    </head>
    <body id="user">
        <?php
        // clase para dar aviso de error
        ?>
        <div class="container mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> ¡Lo sentimos!</h4>
                <p> Algún dato introducido no es correcto.</p>
                <hr>
                <p class="mb-0"> <a class="alert-link" href="formularioLogin.php"><strong>Pulse aquí para volver al formulario introducción de datos.</strong></a></p>
            </div>
        </div>
    </body>
</html>
