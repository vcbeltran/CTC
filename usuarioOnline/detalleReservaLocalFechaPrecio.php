<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include('../includes/include.php');?>
        <title>Su lista de reservas</title>
    </head>
    <body id="user">
        <?php
        include ('../includes/includeCabecera.php');
        session_start();
        include '../consultas/consultasLocalFechaPrecio.php';
        //var_dump($_SESSION);     
        $idLocalFechaPrecio = $_GET['idLocalFechaPrecio'];
        $_SESSION['idLocalFechaPrecio'] = $idLocalFechaPrecio;
        $idUsuario = null;
               
        $idLocal = null;
        $reservado = null;
        
           
        $consultaDetalle = new consultasLocalFechaPrecio();
        $datosReservaSeleccionada = array();
        $datosReservaSeleccionada = $consultaDetalle->detalleLocalFechaPrecio($idLocalFechaPrecio);
        
        ?>
        <div class="container-fluid  mt-5">
            <h1 class="ml-md-3">Detalle de mi reserva </h1>
            <div class="row mr-md-3 ml-md-3">  
                <div class="col-md list-group-item-info py-3 px-lg-5">Nombre Local</div>
                <div class="col-md list-group-item-info py-3 px-lg-5">Fecha </div>
                <div class="col-md list-group-item-info py-3 px-lg-5">Precio</div>
                <div class="col-md list-group-item-info py-3 px-lg-5">Hora Inicio</div>
                <div class="col-md list-group-item-info py-3 px-lg-5">Hora Fin</div>
                <div class="col-md list-group-item-info py-3 px-lg-5">Fecha alta</div>
                <div class="col-md list-group-item-info py-3 px-lg-5">Anular reserva</div>
                <div class="w-100"></div>
                <?php foreach ($datosReservaSeleccionada as $datos): ?>
                    <div class="col-md  py-3 px-lg-5"><?php echo $datos['nombrelocal'] ?></div>
                    <div class="col-md  py-3 px-lg-5"><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></div>
                    <div class="col-md  py-3 px-lg-5"><?php echo $datos['precio'] . " €" ?></div>
                    <div class="col-md  py-3 px-lg-5"><?php echo $datos['horainicio'] ?></div>
                    <div class="col-md  py-3 px-lg-5"><?php echo $datos['horafin'] ?></div>      
                    <div class="col-md  py-3 px-lg-5"><?php echo date("d-m-Y", strtotime($datos['fecharealiza'])) ?></div>
                    <div class="col-md  py-3 px-lg-5"><a class="btn list-group-item-danger" href='' onclick="javascript:if (!funcion_anular('eliminaReserva.php?idLocalFechaPrecio=<?php echo $idLocalFechaPrecio ?>')) return false"><i class="far fa-calendar-times"></i> Confirma Anular </a></div>                
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container">
            <a class="btn list-group-item-info" href='listadoReservas.php'><i class="fas fa-arrow-alt-circle-left"></i> Volver atrás</a>            
        </div>
    </body>
</html>
