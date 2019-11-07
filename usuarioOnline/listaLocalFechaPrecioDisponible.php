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
        //$idLocal = $_REQUEST['codigo'];
       $pagina= $_GET['pagina'];
       $idLocal = $_GET['codigo'];
        if (!$_GET) {
            header("location:listaLocalFechaPrecioDisponible.php?pagina=1&codigo=$idLocal");
        }    
        $fechasPorPagina = 10;    
    
        //var_dump(" numero pagina : " . $pagina);
        //var_dump(" numero local : " . $idLocal);
        //El segmento por página de las fechas disponibles a mostrar
        $iniciar = ($pagina-1)*$fechasPorPagina;
        session_start();
        //echo "tipo usuario online" . $_SESSION['tipo'];  
        $reservado = 0;
        $idUsuario = null;
        
        include ('../consultas/consultasLocalFechaPrecio.php');
        include ('../consultas/consultasLocales.php');
        $consultaDisponibilidadLocal = new consultasLocalFechaPrecio();
        $datosFechaPrecio = array();
        $datosFechaPrecio = $consultaDisponibilidadLocal->recuperaDatosLocalFechaPrecioFuturas($idLocal, $reservado, $idUsuario,$iniciar,$fechasPorPagina);
        //var_dump($_GET['pagina']);
        //var_dump($iniciar);        
        //var_dump($datosFechaPrecio);
        $detalleLocal = new ConsultasLocales();
        $datosDetalleLocal = $detalleLocal->seleccionarFila($idLocal);
        $_SESSION['idLocal'] = $idLocal;
        
        $nombre = $datosDetalleLocal[1];
        //echo ($datosDetalleLocal[4]);
        ?>
        <div class="container mt-5">
            <div class='row'>
                <div class="col md-2">
                    <a class="btn btn-warning" href="../inicio.php" > <i class="fa fa-home" aria-hidden="true"></i> Vuelva al inicio </a>
                </div>
                <div class="col md-2">
                    <img src='../administrador/<?php echo $datosDetalleLocal['4'] ?>' alt="local" class="img-thumbnail"/>
                </div>
                <div class="col md-6">
                    <button type='button' class="btn btn-warning" > <i class="far fa-hand-peace"></i> <?php echo "Está reservando para el local: " . $datosDetalleLocal[1] ?> </button>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h1>Fechas disponibles </h1>
             <div class="container mt-5">            
               <div class="row">
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Fecha Reserva</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Horario de Inicio</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Horario de Fin</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Precio</div>
                    <div class="col-md list-group-item-warning py-3 px-lg-5">Acción</div>
                    <div class="w-100"></div>
                    <?php if (isset($datosFechaPrecio)):?>
                     <?php foreach ($datosFechaPrecio as $datos): ?>       
                        <div class="col-md list-group-flush  py-3 px-lg-5"><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></div>
                        <div class="col-md list-group-flush py-3 px-lg-5"><?php echo $datos['horainicio'] ?></div>
                        <div class="col-md list-group-flush py-3 px-lg-5"><?php echo $datos['horafin'] ?></div>
                        <div class="col-md list-group-flush py-3 px-lg-5"><?php echo $datos['precio'] ." € " ?></div>
                        <div class="col-md list-group-flush py-3 px-xs-5"><a class="btn btn-warning" href='detalleLocalFechaPrecioDisponible.php?idLocalFechaPrecio=<?php echo $datos['idlocalfechaprecio'] ?>&pagina=<?php echo $_GET['pagina']?>'><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Reservar</a></div>
                       <div class="w-100"></div>
                    <?php endforeach; ?>
                  <?php  endif;?>
                </div>
         </div>
        </div>
       <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
<!--                    Boton anterior-->
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="listaLocalFechaPrecioDisponible.php?pagina=<?php echo $_GET['pagina'] - 1 ?>&codigo=<?php echo $_GET['codigo'] ?>">Anterior</a>
                    </li>
                 
                    <?php
                   $cuentaFilas = new consultasLocalFechaPrecio();
                   $filas = array();
                   $filas = $cuentaFilas->contarFilasLocalFechaPrecioFuturas($idLocal,$reservado,$idUsuario);    
                    //var_dump($filas);
                    //botones de paginación             
                    $totalPaginas = ceil($filas / $fechasPorPagina);
                    for ($i = 0; $i < $totalPaginas; $i++):
                        ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="listaLocalFechaPrecioDisponible.php?pagina=<?php echo $i + 1 ?>&codigo=<?php echo $_GET['codigo'] ?>"> <?php echo $i + 1 ?> </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $_GET['pagina'] >= $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="listaLocalFechaPrecioDisponible.php?pagina=<?php echo $_GET['pagina'] + 1 ?>&codigo=<?php echo $_GET['codigo'] ?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>  
        
    </body>
</html>
