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
            $datosReservaSeleccionada = $consultaDetalle->detalleLocalFechaPrecio($idCodigoFecha);
            foreach($datosReservaSeleccionada as $datos):
            var_dump($datos['horainicio']);
            endforeach;
       ?>
       <div class="container mt-5">
            <h1>Los datos de su reserva </h1>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item list-group-item-warning">Fecha Reserva</li>
                <li class="list-group-item list-group-item-warning">Horario de Inicio</li>
                <li class="list-group-item list-group-item-warning">Horario de Fin</li>
                <li class="list-group-item list-group-item-warning">Precio</li>
            </ul>
       
        <?php foreach ($datosReservaSeleccionada as $valor): ?>          
                    <ul class="list-group list-group-horizontal">              
                        <li class="list-group-item"><?php echo date("d-m-Y", strtotime($valor['fechareservada'])) ?></li>
                        <li class="list-group-item"><?php echo $datos['horainicio'] ?></li>
                        <li class="list-group-item"><?php echo $datos['horafin'] ?></li>
                        <li class="list-group-item"><?php echo " " . $datos['precio'] . " " ?></li>
                    </ul>
        <?php endforeach; ?>
         </div>
    </body>
</html>
