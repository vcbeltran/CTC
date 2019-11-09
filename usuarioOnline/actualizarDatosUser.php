<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php');?>
        <title>Actualización datos</title>
    </head>
    <body>
        <?php
        include ('../includes/includeCabecera.php');
        include('../consultas/conexiones.php');
        session_start();
        $idUsuario = $_SESSION['idUsuario'];
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['mail'];
        $password = null;
        if (!empty($_REQUEST['password'])) {
            $password = md5($_REQUEST['password']);
        }
        $telefono = $_REQUEST['telefono'];

       if (empty($nombre) || empty($correo)){
           echo "Nombre y correo campos obligatorios";
       } else {

                
        $conexiones = new Conexiones();   
        if ($conexiones->actualizaUsuario($nombre, $correo, $password, $telefono, $idUsuario)){
            $_SESSION['nombre'] = $correo;
            $_SESSION['nombreUsuario'] = $nombre;
        
        ?>
         <div class="container mt-5">
                 <div class="alert alert-success" role="alert">
                     <h4 class="alert-heading"><i class="fas fa-smile-wink"></i>¡Todo en orden!</h4>
                     <p> Ha cambiado sus datos personales.</p>
                     <hr>
                     <p class="mb-0"> <a class="alert-link" href="../inicio.php?pagina=1"><strong>Pulse aquí para volver al inicio</strong></a></p>
                 </div>
             </div>

         <?php } else { ?>
        <div class="container mt-5">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> ¡Algo ha ido mal!</h4>
                        <p> No ha cambiado sus datos personales.</p>
                        <hr>
                        <p class="mb-0"> <a class="alert-link" href="formularioDatosUser.php"><strong>Pulse aquí para volver al formulario</strong></a></p>
                    </div>
                </div>
         <?php }
       } ?>
    </body>
</html>
