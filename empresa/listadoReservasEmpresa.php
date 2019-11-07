<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <?php include ('../includes/include.php'); ?>
        <title>Seleccione día</title>
    </head>
    <body>
        <?php
         session_start();
        //$idLocal = $_REQUEST['codigo'];
       $pagina= $_GET['pagina'];
       $idLocal = $_SESSION['local'];
        if (!$_GET) {
            header("location:listadoReservasEmpresa.php?pagina=1");
        }    
        $fechasPorPagina = 10;    
    
        $iniciar = ($pagina-1)*$fechasPorPagina;
       
        $reservado = 1;
        $idUsuario = null;
        
        include ('../consultas/consultasLocalFechaPrecio.php');
        include ('../consultas/consultasLocales.php');
        $consultaDisponibilidadLocal = new consultasLocalFechaPrecio();
        $datosFechaPrecio = array();
        $datosFechaPrecio = $consultaDisponibilidadLocal->recuperaDatosLocalFechaPrecio($idLocal, $reservado, $idUsuario,$iniciar,$fechasPorPagina);
        //var_dump($_GET['pagina']);
        //var_dump($iniciar);        
        //var_dump($datosFechaPrecio);
        $detalleLocal = new ConsultasLocales();
        $datosDetalleLocal = $detalleLocal->seleccionarFila($idLocal);
                
        $nombre = $datosDetalleLocal[1];
        //echo ($datosDetalleLocal[4]);
        ?>
        <div class="container mt-5">
            <div class='row'>
                <div class="col md-2">
                    <a class="btn btn-success" href="menuEmpresa.php" > <i class="fa fa-home" aria-hidden="true"></i> Vuelva al menú </a>
                </div>
                <div class="col md-2">
                    <img src='../administrador/<?php echo $datosDetalleLocal['4'] ?>' alt="local" class="img-thumbnail"/>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <h1>Fechas reservadas en su local </h1>                     
               <div class="row ml-md-3 mr-md-3 ">
                    <div class="col list-group-item-success py-3 px-lg-5">Fecha Reserva</div>
                    <div class="col list-group-item-warning py-3 px-lg-5">Horario de Inicio</div>
                    <div class="col list-group-item-success py-3 px-lg-5">Horario de Fin</div>
                    <div class="col list-group-item-warning py-3 px-lg-5">Precio</div>                 
                    <div class="col list-group-item-success py-3 px-lg-5">Mail Usuario</div>                 
                    <div class="w-100"></div>
                    <?php if (isset($datosFechaPrecio)):?>
                     <?php foreach ($datosFechaPrecio as $datos): ?>       
                        <div class="col list-group-flush py-3 "><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></div>
                        <div class="col list-group-flush py-3 "><?php echo $datos['horainicio'] ?></div>
                        <div class="col list-group-flush py-3 "><?php echo $datos['horafin'] ?></div>
                        <div class="col list-group-flush py-3 "><?php echo $datos['precio'] ?></div>                        
                        <div class="col list-group-flush py-3 "><?php echo $datos['correo'] ?></div>                                                
                       <div class="w-100"></div>
                    <?php endforeach; ?>
                  <?php  endif;?>
                </div>
         </div>
         <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
<!--                    Boton anterior-->
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="listadoReservasEmpresa.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
                    </li>                 
                    <?php
                   $cuentaFilas = new consultasLocalFechaPrecio();
                   $filas = array();
                   $filas = $cuentaFilas->contarFilasLocalFechaPrecio($idLocal,$reservado,$idUsuario);    
                    //var_dump($filas);
                    //botones de paginación             
                    $totalPaginas = ceil($filas / $fechasPorPagina);
                    for ($i = 0; $i < $totalPaginas; $i++):
                        ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="listadoReservasEmpresa.php?pagina=<?php echo $i + 1 ?>"> <?php echo $i + 1 ?> </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $_GET['pagina'] >= $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="listadoReservasEmpresa.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>  
        
    </body>
</html>
