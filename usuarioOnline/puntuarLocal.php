<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php')?>
        <title>Valore el local</title>
    </head>
    <body>
        <?php
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
         // var_dump($_SESSION) ;
        $idLocal = $_REQUEST['idlocal'];
        $reservado = 1;
        $idUsuario = $_SESSION['idUsuario'];
        echo $idLocal;
        $datosLocal = new consultasLocalFechaPrecio();
        $datosPuntuacion = $datosLocal->recuperaDatosLocalFechaPrecioSinPaginar($idLocal, $reservado, $idUsuario);        
        var_dump($datosPuntuacion);
        ?>
        <div class="container mt-5">
            <div class="row">            
            <?php foreach ($datosPuntuacion as $datos):?>            
            <div class="card" style="width: 30rem;">
                 <div class="card-header d-flex justify-content-center"><?php echo $datos['nombrelocal']?></div>
                <img src="../administrador/<?php echo $datos['imagen']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Por favor puntue aquí</h5>
                    <p class="card-text">Valore su experiencia en la reserva del local del 1 al 5 </p>
                    <a href="#" class="btn btn-primary">AQUI IRÍAN LAS ESTRELLITAS</a>
                </div>
            </div>
            <?php endforeach; ?>
                </div>
        </div>
    </body>
</html>
