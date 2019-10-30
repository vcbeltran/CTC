<!DOCTYPE html>
<!--
Esta página es la que permite al administrador,incluir locales e incluir
los uusuarios de tipo empresa. 
Además permite ver algún listado de los locales. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/9572130963.js"></script>
        <title>Bienvenido al menu de Empresa</title>
    </head>
    <body>
        <?php
        session_start();
        include ('../consultas/consultasLocales.php');
        $codigoLocal = $_SESSION['local'];
        $consultaDatosLocal = new ConsultasLocales();
        $infoLocal = $consultaDatosLocal->seleccionarFila($codigoLocal);
        var_dump($infoLocal);
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
                                <a class="dropdown-item" href="editarFechaPrecio.php"><i class="fa fa-pencil" aria-hidden="true"></i> Consultar fechas precio</a>
                            </div>               
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Consultar reservas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="#"> <i class="fa fa-list" aria-hidden="true"></i> Listado reservas</a>
                            </div>  
                        </div>
                        <a class="navbar-brand" href="#"> Listados </a>
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
                            Los datos de su local
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
    </body>
</html>
