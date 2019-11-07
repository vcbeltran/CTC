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
            $idLocalFechaPrecio = $_REQUEST['idLocalFechaPrecio'];
            //echo "Su id de reserva: ". $idCodigoFecha;
            include '../consultas/consultasLocalFechaPrecio.php';
            $idUsuario = null;
            $reservado = 0;
            $idLocal = $_SESSION['idLocal'];
            $pagina = $_GET['pagina'];
            //echo $pagina;
            
            $consultaDetalle = new consultasLocalFechaPrecio();
            $datosReservaSeleccionada = array();
            $datosReservaSeleccionada = $consultaDetalle->detalleLocalFechaPrecio($idLocalFechaPrecio);
            foreach($datosReservaSeleccionada as $datos):?>
        <div class="container mt-5">
                <div class='row'>            
                    <div class="col md-2 py-3 px-lg-5 ">       
                        <button class="btn btn-warning"><i class="fas fa-birthday-cake"></i> LOCAL: <?php echo $datos['nombrelocal'] ?></button>
                    </div>
                    <div class="col md-2">
                        <img src='../administrador/<?php echo $datos['imagen'] ?>' alt="local" class="img-thumbnail"/>
                    </div>
                </div>
            </div>
       <?php  endforeach; ?>
       <div class="container mt-5">
            <h1>Confirme los datos de su reserva </h1>
               <div class="row">
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Fecha Reserva</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Horario de Inicio</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Horario de Fin</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Precio</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Realizar reserva</div>
                    <div class="w-100"></div>
                     <?php foreach ($datosReservaSeleccionada as $datos): ?>       
                        <div class="col-md  py-3 px-lg-5"><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></div>
                        <div class="col-md  py-3 px-lg-5"><?php echo $datos['horainicio'] ?></div>
                        <div class="col-md  py-3 px-lg-5"><?php echo $datos['horafin'] ?></div>
                        <div class="col-md  py-3 px-lg-5"><?php echo $datos['precio'] . " €" ?></div>
                        <div class="col-md  py-3 px-lg-5">   <a class="btn list-group-item-info" href='' onclick="javascript:if (!funcion_reservar('altaReserva.php?idLocalFechaPrecio=<?php echo $idLocalFechaPrecio ?>')) return false"><i class="fas fa-check-circle"></i> Reservar</a></div>
                    <?php endforeach; ?>
                </div>
         </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col md-2"></div>                             
                    <a class="btn list-group-item-info" href='listaLocalFechaPrecioDisponible.php?pagina=<?php echo $pagina ?>&codigo=<?php echo $idLocal ?>'><i class="fas fa-arrow-alt-circle-left"></i> Volver atrás</a>
            </div>
        </div>
        <div class="container mt-5"></div>
    </body>
</html>
