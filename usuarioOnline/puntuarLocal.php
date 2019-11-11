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
    <body id="user">
        <?php
        include ('../includes/includeCabecera.php');
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
         // var_dump($_SESSION) ;
        $idLocalFechaPrecio = $_REQUEST['idlocalfechaprecio'];
        $reservado = 1;
        $idUsuario = $_SESSION['idUsuario'];
        $_SESSION['idLocalFechaPrecio'] = $idLocalFechaPrecio;
       
        $datosLocal = new consultasLocalFechaPrecio();
        $datosPuntuacion = $datosLocal->detalleLocalFechaPrecio($idLocalFechaPrecio);        
        //var_dump($datosPuntuacion);
        ?>
        <div class="container mt-5">   
            <div class="row">       
                <div class="col-md-3"></div>
                <div class="p-3 mb-2 bg-warning text-dark lead rounded-circle d-flex justify-content-center"><i class="far fa-hand-point-right"></i> Puntúe su reserva </div>          
            </div>
            <div class="row">           
            <?php foreach ($datosPuntuacion as $datos): ?>                   
                        <div class="col-md-2"> </div>                   
                        <div class="card">
                            <div class="card-header d-flex justify-content-center"><?php echo $datos['nombrelocal'] ?></div>
                            <img src="../administrador/<?php echo $datos['imagen'] ?>" class="card-img-top" >
                            <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-laugh-wink"></i> Por favor incluya su valoración aquí</h5>
                                    <p class="card-text">Valore su experiencia en la reserva del local del 1 al 5 </p>
                                    <form method="POST" action="altaPuntuacion.php">
                                    <input id="valoracion" type="hidden" value="0" name="puntos"/>
                                    <p class="mb-0 d-flex justify-content-center ">
                                        <img class="img-responsive" id="estrella_1" src="../administrador/imagenes/estrella_vacia.png"  onclick="javascript: rellena_estrella(1)"/>
                                        <img class="img-responsive" id="estrella_2" src="../administrador/imagenes/estrella_vacia.png"  onclick="javascript: rellena_estrella(2)"/>
                                        <img class="img-responsive" id="estrella_3" src="../administrador/imagenes/estrella_vacia.png"  onclick="javascript: rellena_estrella(3)"/>
                                        <img class="img-responsive" id="estrella_4" src="../administrador/imagenes/estrella_vacia.png"  onclick="javascript: rellena_estrella(4)"/>
                                        <img class="img-responsive" id="estrella_5" src="../administrador/imagenes/estrella_vacia.png"  onclick="javascript: rellena_estrella(5)"/>
                                    </p>
                                    <br>
                                    <p id="envio"   class="mb-0 d-flex justify-content-center" style="visibility: hidden;"><button type="submit" class="btn bg-warning text-dark lead rounded-circle"> Enviar </button> </p>
                                    <p id="mensaje" class="mb-0 d-flex justify-content-center"></p>
                                    </form>
                            </div>
                        </div>
            <?php endforeach; ?>             
           </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-8"></div>
                <a class="btn list-group-item-info" href="listadoReservas.php"><i class="fas fa-arrow-alt-circle-left"></i> Vuelva atrás</a>
                </div>
            </div>

    </body>
</html>
