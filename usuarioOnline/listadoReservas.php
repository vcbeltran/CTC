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
    <body>
        <?php
        session_start();
        include '../consultas/consultasLocalFechaPrecio.php';
        //var_dump($_SESSION);
    
        
        $idUsuario = $_SESSION['idUsuario'];
        // echo 'Hola esta es su reserva' . $idUsuario;
   
        $idLocal = null;
        $reservado = 1;
        
        $consultaReservas = new consultasLocalFechaPrecio();
        $datosMisReservas = array();
        $datosMisReservas = $consultaReservas->recuperaDatosLocalFechaPrecioSinPaginar($idLocal, $reservado, $idUsuario);        
        //var_dump($datosMisReservas);
        
        ?>
        <div class="container mt-5">
            <h1>Mis reservas </h1>
            <div class="row">
                <div class="col list-group-item-info py-3 px-lg-5">Foto Local</div>
                <div class="col list-group-item-info py-3 px-lg-5">Nombre Local</div>
                <div class="col list-group-item-info py-3 px-lg-5">Fecha </div>
                <div class="col list-group-item-info py-3 px-lg-5">Precio</div>
                <div class="col list-group-item-info py-3 px-lg-5">Anular reserva</div>
                <div class="w-100"></div>
        <?php foreach ($datosMisReservas as $datos): ?>
                <div class="col  py-3 px-lg-5"> <img src='../administrador/<?php echo $datos['imagen'] ?>' alt="local" class="img-thumbnail"/></div>
                <div class="col  py-3 px-lg-5"><?php echo $datos['nombrelocal'] ?></div>
                <div class="col  py-3 px-lg-5"><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></div>
                <div class="col  py-3 px-lg-5"><?php echo $datos['precio']." €" ?></div>
                <div class="col  py-3 px-lg-5"><a class="btn list-group-item-danger" href='detalleReservaLocalFechaPrecio.php?idLocalFechaPrecio=<?php echo $datos['idlocalfechaprecio'] ?>' ><i class="far fa-calendar-times"></i> Anular </a></div>
               <div class="w-100"></div>
        <?php endforeach; ?>               
        </div>
        </div>
        <div class="container mt-5">
            <div class="row">           
                <div class="col md-2">
                    <a class="btn btn-warning" href="../inicio.php" > <i class="fa fa-home" aria-hidden="true"></i> Vuelva al inicio </a>
                </div>
            </div>
        </div>
    </body>
</html>
