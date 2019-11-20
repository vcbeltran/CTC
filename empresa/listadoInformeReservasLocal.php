<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../includes/include.php';?>
        <title>Listado de total reservas</title>
    </head>
    <body id="empresa">
        <?php
        include '../consultas/consultasLocalFechaPrecio.php';
        session_start();
        $consultas = new consultasLocalFechaPrecio();
        
        $idLocal = $_SESSION['local'];
        
        $datosPorPagina = null;   
        $iniciar = null;
        
        $resultado = $consultas->informeTotalReservasPorLocales($idLocal, $iniciar, $datosPorPagina);
         
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuEmpresa.php"><i class="fas fa-arrow-circle-left"></i> Vuelva al menú de empresa</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="card">
                <h1> Informe total reservas de mi local </h1>                     
                <div class="row ml-md-3 mr-md-3 ">
                    <div class="col list-group-item-success py-3">Nombre Local</div>
                    <div class="col list-group-item-success py-3">Total Reservas </div>
                    <div class="col list-group-item-success py-3">Total Ganacias por reservas</div>
                    <div class="col list-group-item-success py-3">Total Disponibles</div>                 
                    <div class="col list-group-item-success py-3">Ganacias Pendientes</div>                 
                    <div class="w-100"></div>
                    <?php if (isset($resultado)): ?>
                        <?php foreach ($resultado as $dato): ?>       
                            <div class="col list-group-flush py-3 justify-content-center"><strong><?php echo $dato['nombrelocal'] ?></strong></div>
                            <div class="col list-group-flush py-3 justify-content-center"><strong><?php echo $dato['totalreserva'] ?></strong></div>
                            <div class="col list-group-flush py-3 justify-content-center"><strong><?php echo $dato['totalpreciopagado'] . " €" ?></strong></div>
                            <div class="col list-group-flush py-3 justify-content-center"><strong><?php echo $dato['totallibres']  ?></strong></div>                        
                            <div class="col list-group-flush py-3 justify-content-center"><strong><?php echo $dato['totalpreciolibre'] . " €" ?></strong></div>                                                
                            <div class="w-100"></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>       
        <?php include '../includes/includeFooter.php';?>
    </body>
</html>
