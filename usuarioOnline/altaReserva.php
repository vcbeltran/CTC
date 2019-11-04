<!DOCTYPE html>
<!--
Esta página formaliza una reserva a un usuario. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php')?>
        <title>Formalización reserva</title>
    </head>
    <body>
        <?php
        include '../consultas/consultasReservas.php';
        session_start();
        var_dump($_SESSION);
        $idUsuario = $_SESSION['idUsuario'];
        $idCodigoFecha = $_GET['idReserva'];
        $fechaRealiza = date("Y-m-d");
        
        $altaReserva = new consultasReservas();
        if ($altaReserva->insertarReserva($fechaRealiza, $idCodigoFecha, $idUsuario)){ ?>
            <div class="container mt-5">
                <div class="alert alert-success mb-2" role="alert">
                    <i class="fa fa-check" aria-hidden="true"></i> Has relizado una reserva! Consulte su mail para más información <a href="../inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a>
                </div>
            </div>  
        <?php } else {?>
        <div class="container mt-5">
                <div class="alert alert-danger mb-2" role="alert">
                    <i class="fa fa-check" aria-hidden="true"></i> Algo ha ido mal <a href="../inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a>
                </div>
            </div>  
        <?php   }
        
        
        ?>
    </body>
</html>
