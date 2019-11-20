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
    <body id="empresa">
        <?php    
        include ('../consultas/consultasLocales.php');
        include ('../consultas/consultasReservas.php');
        session_start();
        if (!isset($_SESSION['id'])) {
            header("location:../inicio/inicio.php");
        }

        $codigoLocal = $_SESSION['local'];
        $consultaDatosLocal = new ConsultasLocales();
        $infoLocal = $consultaDatosLocal->seleccionarFila($codigoLocal);
        
        $tipo = $_SESSION;
        
        $consulta = new consultasReservas();
        $datosMedia = $consulta->consultaMedia($codigoLocal);
        //var_dump($datosMedia);
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
                        <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ver Informe 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="listadoInformeReservasLocal.php"> <i class="far fa-calendar-check"></i> Total reservas</a>
                            </div>  
                        </div>                    
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
                        <div class="card card-body text-center"> 
                            <p class='card-text mb-0'>Dirección: <?php echo $infoLocal['DIRECCION'] ?></p>
                            <p class='card-text mb-0'>Aforo: <?php echo $infoLocal['AFORO'] ?></p>
                            <?php foreach ($datosMedia as $datos):?>
                              <?php if(!empty($datos['preciomedio'])){ ?>
                            <p class='card-tex mb-0'>Precio medio: <?php echo ceil($datos['preciomedio']) ?></p>
                             <?php } ?>
                            <?php if(!empty($datos['media'])){ ?>
                            <p class="center mb-0"><img class="img-responsive" src="../administrador/imagenes/estrellas/puntuacion_<?php echo ceil($datos['media'])?>.png"/></p>
                            <?php } else { ?>
                            <p class="center mb-0">Aún no tiene puntuaciones en su local</p>
                            <?php } 
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                 <div class="col-md-2"></div>
            </div>
        </div>  
         <?php include ('../includes/includeFooter.php'); ?>
    </body>
</html>
