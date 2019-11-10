<?php 
    include ('consultasEmpresas.php');
    
    $nombre = $_REQUEST['nombre'];
    $mail = $_REQUEST['mail'];
    $contra = $_REQUEST['contra'];
    $local = $_REQUEST['local'];
    
    $altaEmpresa = new consultasEmpresas();

?>

<!DOCTYPE html>
<!--
Pagina que da de alta los datos introducidos en el formularioAltaEmpresa, asignándole un local y 
dando de alta un usuario nuevo de empresa para que pueda acceder a los datos de su local
-->
<html>
    <head>
        <meta charset="UTF-8">
       <?php include ('../includes/include.php'); ?>
        <title>Alta local</title>
    </head>
    <body id="admin">
        <?php
         if($altaEmpresa->altaRolEmpresa($nombre, $mail, $contra, $local)) {
            ?>
            <div class="container mt-5" >
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="alert alert-success">
                        <strong>¡Ya está añadida la nueva empresa!</strong> Puedes volver a la página de administrador <a href="menuAdministrador.php" class="alert-link">pulsando aquí</a>.
                    </div> 
                </div>
            </div>
        <?php } else { ?>
            <div class="container  mt-5" >
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>¡Lo sentimos!</strong> El nombre de la empresa ya está en uso.<a href="formularioAltaEmpresa.php" class="alert-link"> Pulse para volver atrás</a>
                    </div>  
                </div>
            </div>    
        <?php } ?>
    </body>
</html>
