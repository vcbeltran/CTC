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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Alta local</title>
    </head>
    <body>
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
