<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../includes/include.php'; ?>
        <title>Listado TOP 5</title>
    </head>
    <body id="admin">
        <?php
        include ('../consultas/consultasReservas.php');
        session_start();

        $idLocal = null;
        $consulta = new consultasReservas();
        $datosMedia = array();
        $datosMedia = $consulta->consultaMedia($idLocal);
        
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuAdministrador.php"><i class="fas fa-arrow-circle-left"></i> Vuelva al menú de administrador</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="container-fluid mt-5 mr-md-3 ml-md-3">
            <h1>Listado TOP 5</h1>
            <div class="row">
                <div class="col-md  list-group-item-info py-3 px-lg-5">Foto Local </div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Nombre Local</div>
                <div class="col-md  list-group-item-info py-3 px-lg-5">Puntuación Mínima </div>        
                <div class="col-md  list-group-item-info py-3 px-lg-5">Puntuación Máxima </div>    
                <div class="col-md  list-group-item-info py-3 px-lg-5">Puntuación Media </div>    
                <div class="w-100"></div>
                <?php
                if (isset($datosMedia)) :
                    foreach ($datosMedia as $datos):
                        ?>
                        <div class="col-md  py-3 px-lg-5"><img src='../administrador/<?php echo $datos['imagen'] ?>' alt="local" class="img-thumbnail"/></div>
                        <div class="col-md  py-3 px-lg-5"><?php echo $datos['nombrelocal'] ?></div>                      
                        <div class="col-md  py-3 px-lg-5"><?php $mediaTotal = (ceil($datos['minima'])); ?><img class='img-resposive' src="../administrador/imagenes/puntuacion_<?php echo $mediaTotal; ?>.png" /></div>                        
                        <div class="col-md  py-3 px-lg-5"><?php $mediaTotal = (ceil($datos['maxima'])); ?><img class='img-resposive' src="../administrador/imagenes/puntuacion_<?php echo $mediaTotal; ?>.png" /></div>                        
                        <div class="col-md  py-3 px-lg-5"><?php $mediaTotal = (ceil($datos['media'])); ?><img class='img-resposive' src="../administrador/imagenes/puntuacion_<?php echo $mediaTotal; ?>.png" /></div>                        
                        <div class="w-100"></div>
                        <?php
                    endforeach;
                endif;
                ?>     
            </div>
        </div>
        <?php include '../includes/includeFooter.php'; ?>
    </body>
</html>
