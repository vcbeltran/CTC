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
    <body id="admin">
        <?php
        $pagina = $_GET['pagina'];
        if (!$_GET) {
            header("location:listadoInformeTotalReservasPorLocales.php?pagina=1");
        }
        
        include '../consultas/consultasLocalFechaPrecio.php';
        session_start();
        $consultas = new consultasLocalFechaPrecio();
        
        $idLocal = null;
        
        $datosPorPagina = 10;
        //$iniciar = 0;
        $iniciar = ($pagina - 1) * $datosPorPagina;
        
        $resultado = $consultas->informeTotalReservasPorLocales($idLocal, $iniciar, $datosPorPagina);
        //var_dump($resultado);
 
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
        <div class="container-fluid mt-5">
            <div class="card">        
                <h1> Informe total reservas por locales </h1>                     
                <div class="row ml-md-3 mr-md-3 ">
                    <div class="col list-group-item-primary py-3 px-lg-5 justify-content-center">Nombre Local</div>
                    <div class="col list-group-item-primary py-3 px-lg-5 justify-content-center">Total Reservas </div>
                    <div class="col list-group-item-primary py-3 px-lg-5 justify-content-center">Total Ganacias por reservas</div>
                    <div class="col list-group-item-primary py-3 px-lg-5 justify-content-center">Total Disponibles</div>                 
                    <div class="col list-group-item-primary py-3 px-lg-5 justify-content-center">Ganacias Pendientes</div>                 
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
         <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--                    Boton anterior-->
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="listadoInformeTotalReservasPorLocales.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
                    </li>                 
                    <?php
                    $cuentaFilas = new consultasLocalFechaPrecio();
                    $filas = array();
                    $filas = $cuentaFilas->contarTotalReservasPorLocales($idLocal);
                    //var_dump($filas);
                    //botones de paginación             
                    $totalPaginas = ceil($filas / $datosPorPagina);
                    for ($i = 0; $i < $totalPaginas; $i++):
                        ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="listadoInformeTotalReservasPorLocales.php?pagina=<?php echo $i + 1 ?>"> <?php echo $i + 1 ?> </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $_GET['pagina'] >= $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="listadoInformeTotalReservasPorLocales.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>  
        
        <?php include '../includes/includeFooter.php';?>
    </body>
</html>
