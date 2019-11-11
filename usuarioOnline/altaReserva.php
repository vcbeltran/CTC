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
    <body id="user">
        <?php
        include ('../includes/includeCabecera.php');
        include '../consultas/consultasReservas.php';
        include '../consultas/consultasLocalFechaPrecio.php';
        include '../correo/enviarCorreo.php';
        
        session_start();
        
        $idUsuario = $_SESSION['idUsuario'];
        $idLocalFechaPrecio = $_GET['idLocalFechaPrecio'];
        $fechaRealiza = date("Y-m-d");
        
        $altaReserva = new consultasReservas();
        
        if ($altaReserva->insertarReserva($fechaRealiza, $idLocalFechaPrecio, $idUsuario)){
            //consulto los datos de la reserva
            $consultaLocalFechaPrecio = new consultasLocalFechaPrecio();
            $datosReservaSeleccionada = $consultaLocalFechaPrecio->detalleLocalFechaPrecio($idLocalFechaPrecio);

            $direccionEmail = $_SESSION['nombre'];
            $nombreUsuario = $_SESSION['nombreUsuario'];
            $nombreLocal = null;
            $fechaReservada = null;
            $horaInicio = null;
            $horaFin = null;
            $precio = null;
            $fechaRealiza = null;

            
            foreach ($datosReservaSeleccionada as $datos):
                $nombreLocal = $datos['nombrelocal'];
                $fechaReservada = date("d-m-Y", strtotime($datos['fechareservada']));
                $precio = $datos['precio'] . " €";
                $horaInicio = $datos['horainicio'];
                $horaFin = $datos['horafin'];
                $fechaRealiza = date("d-m-Y", strtotime($datos['fecharealiza']));
            endforeach;
            

            $subject = 'Aviso de reserva de CTC';
            
            $texto = "Estimad@ " . $nombreUsuario . ": <br> Con fecha " . $fechaRealiza . " ha realizado una reserva en el local " . $nombreLocal . " para el día " . $fechaReservada . " de " . $horaInicio . " a " . $horaFin .
                    " por un precio de " .$precio;

            $enviarCorreo = new enviarCorreo();     
            $enviarCorreo->enviarConPlantilla($direccionEmail, $texto, $subject);
                    
            ?>
            <div class="container mt-5">
                <div class="alert alert-success mb-2" role="alert">
                    <h4 class="alert-heading"><i class="far fa-smile-wink"></i>¡Enhorabuena!</h4>
                    <hr>
                    <p class="mb-0">Has relizado una reserva! Consulte su mail para más información <a href="../inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a></p>
                </div>
            </div>  
        <?php } else {?>
        <div class="container mt-5">
                <div class="alert alert-danger mb-2" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-meh-rolling-eyes"></i>¡Lo sentimos!</h4>
                    <hr>
                    <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Algo ha ido mal <a href="../inicio.php?pagina=1" class="alert-link"><strong>Pulse aquí para consultar los locales</strong></a></p>
                </div>
            </div>  
        <?php   }
        
        
        ?>
    </body>
</html>
