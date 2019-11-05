<!DOCTYPE html>
<!--
Esta página es la que permite al administrador,incluir locales e incluir
los uusuarios de tipo empresa. 
Además permite ver algún listado de los locales. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php'); ?>
        <title>Bienvenido al menu de Empresa</title>
    </head>
    <body>
        <?php
        session_start();
        include ('../consultas/consultasLocales.php');
        $codigoLocal = $_SESSION['local'];
        $consultaDatosLocal = new ConsultasLocales();
        $infoLocal = $consultaDatosLocal->seleccionarFila($codigoLocal);
        //var_dump($infoLocal);
        if (!isset($_SESSION['id'])) {
            header("location:inicio.php");
        }
        $tipo = $_SESSION;
        //var_dump($tipo);
        ?>
   
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-2">
                    <button type="button" class="btn btn-success"><i class="fa fa-user-o" aria-hidden="true"></i> Usuario conectado: <?php echo $tipo['nombre']; ?></button>                    
                </div>   
                <!-- MENU NAVEGACION -->
                <div class="col-md-8">
                    <nav class="navbar navbar-light" style="background-color:#A9F5A9;">  
                        <!-- Navbar content -->
                        <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gestion Fechas
                            </a>                           
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="formularioFechaPrecio.php"><span><i class="fa fa-plus-square-o" aria-hidden="true"></i></span> Agregar Fechas Precio</a>
                                <a class="dropdown-item" href="detalleEditarFechaPrecio.php"><i class="fa fa-pencil" aria-hidden="true"></i> Consultar fechas precio</a>
                            </div>               
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Consultar reservas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="listadoReservasEmpresa.php"> <i class="fa fa-list" aria-hidden="true"></i> Listado reservas</a>
                            </div>  
                        </div>
                        <a class="navbar-brand" href="#"> Ver Informes </a>
                        <a class="navbar-brand" href="../administrador/logout.php"> Cierra sesión </a> 
                    </nav>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Su local es: <?php echo $tipo['nombrelocal']; ?></button>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="collapse" id="collapseExample">
                        <div class="card text-center">
                            <div class="card-header">
                                LOS DATOS DE SU LOCAL
                            </div>
                        </div>
                        <img class="card-img-top" src="../administrador/<?php echo $infoLocal['IMAGEN'] ?>" alt="Card image cap">
                        <div class="card card-body"> 
                            <p class='card-text'>Dirección: <?php echo $infoLocal['DIRECCION'] ?></p>
                            <p class='card-text'>Aforo: <?php echo $infoLocal['AFORO'] ?></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-2"></div>
            </div>
        </div>  
         <?php include ('../includes/includeFooter.php'); ?>
    </body>
</html>
