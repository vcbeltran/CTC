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
        <title>Confirmación Eliminar</title>
    </head>
    <body id="user">
        <?php
        include ('../includes/includeCabecera.php');
        session_start();
        include '../consultas/consultasReservas.php';
        $idLocalFechaPrecio = $_GET['idLocalFechaPrecio'];
              
        $consulta = new consultasReservas();
        if ($consulta->eliminarReserva($idLocalFechaPrecio)){ ?>
        <div class="container mt-5">
                <div class="alert alert-success mb-2" role="alert">
                    <i class="fa fa-check" aria-hidden="true"></i> Has eliminado una reserva! Consulte su mail para más información <a href="../inicio/inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a>
                </div>
            </div>  
       <?php } else { ?>
        <div class="container mt-5">
                <div class="alert alert-danger mb-2" role="alert">
                    <i class="fa fa-check" aria-hidden="true"></i> Algo ha ido mal <a href="../inicio/inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a>
                </div>
            </div>  
        <?php } ?>
    </body>
</html>
