<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edite los datos de su Empresa</title>    
        <?php include ('../includes/include.php'); ?>
    </head>      
  <body>
        <?php
            if (!$_GET) {
                 header("location:detalleEditarFechaPrecio.php?pagina=1");
            }    
        $fechasPorPagina = 10;
        //El segmento por página de los locales a mostrar
        $iniciar = ($_GET['pagina']-1)*$fechasPorPagina;
        
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
        $idLocal = $_SESSION['local'];
        //var_dump($idLocal);         
        //Consulto la lista de fechas precio disponibles para mi local
        $reservado = 0;
        $idUsuario = null;
        $datosFechaPrecio = new consultasLocalFechaPrecio();
        try {
        $recuperaDatos = array();
        $recuperaDatos = $datosFechaPrecio->recuperaDatosLocalFechaPrecio($idLocal,$reservado,$idUsuario,$iniciar,$fechasPorPagina);
        } catch (Exception $e){
             echo 'Error en el metodo comprobar pagina '.$e->getMessage()."\n";
        }
        //var_dump($recuperaDatos);        
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#A9F5A9;">
                    <a class="navbar-brand" href="menuEmpresa.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Vuelva al menú Empresa</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($recuperaDatos)):?>
                        <?php foreach ($recuperaDatos as $datos): ?>        
                            <tr>                                       
                                <td scope="row"><?php echo date("d-m-Y", strtotime($datos['fechareservada'])) ?></td>
                                <td><?php echo $datos['precio'] ?></td>
                                <td><?php echo $datos['horainicio'] ?></td>
                                <td><?php echo $datos['horafin'] ?></td>                 
                                <td>                          
                                    <a class="btn btn-primary" href='fomularioModificarFechaPrecio.php?codigo=<?php echo $datos['idlocalfechaprecio'] ?>'><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger" href='' onclick="javascript:if (!funcion_confirmar('eliminarFechaPrecio.php?codigo=<?php echo $datos['idlocalfechaprecio'] ?>')) return false" ><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                    <?php  endif;?>
                </tbody>
            </table>
        </div>
                <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--Boton anterior-->
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="editarFechaPrecio.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
                    </li>
                 
                    <?php
                    //$cuentaFilas = new consultasLocalFechaPrecio();
                   
                    $filas = $datosFechaPrecio->contarFilasLocalFechaPrecio($idLocal,$reservado,$idUsuario);    
                     
                    //botones de paginación             
                    $totalPaginas = ceil($filas / $fechasPorPagina);
                    for ($i = 0; $i < $totalPaginas; $i++):
                        ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="editarFechaPrecio.php?pagina=<?php echo $i + 1 ?>"> <?php echo $i + 1 ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $_GET['pagina'] >= $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="editarFechaPrecio.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </body>
</html>
