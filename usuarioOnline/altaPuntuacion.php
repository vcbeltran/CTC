<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../includes/include.php';?>
        <title>Enhorabuena! </title>
    </head>
    <body id="user">
        <?php
        include ('../includes/includeCabecera.php');
        session_start();
        include '../consultas/consultasReservas.php';
        $puntuacion = $_REQUEST['puntos'];
           
        $idLocalFechaPrecio = $_SESSION['idLocalFechaPrecio'];
       
        $altaPuntuacion = new consultasReservas();
         
        if ($altaPuntuacion->insertaPuntuacion($puntuacion, $idLocalFechaPrecio)){?>
        <div class="container mt-5">
                <div class="alert alert-success mb-2" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-star"></i>¡Muchas gracias!</h4>
                    <hr>
                    <p class="mb-0">¡Has incluido una puntuación de <?php echo $puntuacion?> estrellas! <a href="../inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a></p>
                </div>
            </div>  
        <?php } else { ?>
                <div class="container mt-5">
                <div class="alert alert-danger mb-2" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-meh-rolling-eyes"></i>¡Lo sentimos!</h4>
                    <hr>
                    <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Algo ha ido mal <a href="../inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a></p>
                </div>
            </div>       
        <?php } ?>
    </body>
</html>
