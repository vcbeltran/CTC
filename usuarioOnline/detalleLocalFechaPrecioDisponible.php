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
        <title>Confirmar reserva</title>
    </head>
    <body>
        <?php
            session_start();
            $idCodigoFecha = $_REQUEST['idCodigoFecha'];
            echo "Su id de reserva: ". $idCodigoFecha;
            include '../consultas/consultasLocalFechaPrecio.php';
            $idUsuario = null;
            $reservado = 0;
            $idLocal = $_SESSION['idLocal'];
            
            var_dump($_SESSION);
            $consultaDetalle = new consultasLocalFechaPrecio();
            $datosReservaSeleccionada = array();
            $datosReservaSeleccionada = $consultaDetalle->recuperaDatosLocalFechaPrecioSinPaginar($idLocal, $reservado, $idUsuario);
            foreach($datosReservaSeleccionada as $datos):
            var_dump($datos['horainicio']);
            endforeach;
       ?>
        
        
    </body>
</html>
