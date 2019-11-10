        <?php

        include '../consultas/consultasEmpresas.php';
        
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['mail'];
        $password = md5($_REQUEST['contra']);
        $local = $_REQUEST['local'];
        
        $consultaEmpresa = new ConsultasEmpresas();
        
           
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
        <?php include ('../includes/include.php'); ?>
        <title>Alta local</title>
    </head>
    <body id="admin">
        <?php
        if ($consultaEmpresa->altaRolEmpresa($nombre, $correo, $password, $local)) {
            ?>
            <div class="container mt-5" >
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="alert alert-success">
                        <strong>¡Ya está el nuevo usuario empresa!</strong> Puedes volver a la página de administrador <a href="menuAdministrador.php" class="alert-link">pulsando aquí</a>.
                    </div> 
                </div>
            </div>
        <?php } else { ?>
            <div class="container  mt-5" >
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>¡Lo sentimos!</strong> El nombre del usuario ya está en uso.<a href="formularioAltaEmpresa.php" class="alert-link"> Pulse para volver atrás</a>
                    </div>  
                </div>
            </div>    
        <?php } ?>
    </body>
</html>
