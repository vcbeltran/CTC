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
               
        $idUsuario = $_SESSION['idUsuario'];
      
        $idLocal = null;
        $reservado = 1;
        
        $consultaReservas = new consultasLocalFechaPrecio();
        $datosMisReservas = array();
        $datosMisReservas = $consultaReservas->recuperaDatosLocalFechaPrecioSinPaginar($idLocal, $reservado, $idUsuario);        
       
       
        ?>
        <div class="container-fluid mt-5 mr-md-3 ml-md-3">
            <h1>Mis reservas </h1>
            <div class="row">
                <div class="col-md  list-group-item-info py-3 px-lg-5">Foto Local</div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Nombre Local</div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Fecha </div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Precio</div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Anular reserva</div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Puntuar reserva</div>
                <div class="w-100"></div>
        <?php 
        if (isset($datosMisReservas)) :
            foreach ($datosMisReservas as $datos): ?>
                <div class="col-md  py-3 px-lg-5"> <img src='../administrador/<?php echo $datos['imagen'] ?>' alt="local" class="img-thumbnail"/></div>
                <div class="col-md  py-3 px-lg-5"><?php echo $datos['nombrelocal'] ?></div>
                <div class="col-md  py-3 px-lg-5"><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></div>
                <div class="col-md  py-3 px-lg-5"><?php echo $datos['precio']." €" ?></div>
                <?php if (date("Ymd", strtotime($datos['fechareservada'])) >  date("Ymd")){ ?>
                    <div class="col  py-3 px-lg-5"><a class="btn list-group-item-danger" href='detalleReservaLocalFechaPrecio.php?idLocalFechaPrecio=<?php echo $datos['idlocalfechaprecio'] ?>' ><i class="far fa-calendar-times"></i> Anular </a></div>
                     <div class="col  py-3 px-lg-5"><button class='btn btn-danger'><i class="fas fa-ban"></i> Espere </button></div>
                <?php } else { ?>
                    <div class="col-md  py-3 px-lg-5"><button class='btn btn-danger'><i class="fas fa-ban"></i> No anulable</button></div>
                    <?php if (empty($datos['puntuacion'])) {?>
                        <div class="col-md  py-3 px-lg-5"><a class="btn list-group-item-success" href='puntuarLocal.php?idlocalfechaprecio=<?php echo $datos['idlocalfechaprecio'] ?>' ><i class="far fa-thumbs-up"></i> Puntuar </a></div>
                    <?php } else {?>
                        <div class="col  py-3 px-lg-5"><button class='btn list-group-item-info'><i class="fas fa-grin-stars"></i> Ya puntuado </button></div>
                    <?php } ?>
                    <?php $_SESSION['idLocalFechaPrecio'] = $datos['idlocalfechaprecio'];} ?>
                 <div class="w-100"></div>
            <?php endforeach; 
        endif; ?>            
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
