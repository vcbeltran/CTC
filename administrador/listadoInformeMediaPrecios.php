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
        <title>Media precios </title>
    </head>
    <body id="admin">
        <?php
        $pagina = $_GET['pagina'];
        if (!$_GET) {
            header("location:listadoInformeMediaPrecios.php?pagina=1");
        }
        include '../consultas/consultasLocalFechaPrecio.php';
        session_start();

        $idLocal = null;
        $datosPorPagina = 10;
        $iniciar = ($pagina - 1) * $datosPorPagina;
        
        $consulta = new consultasLocalFechaPrecio();
        $resultado = $consulta->informePrecioMedioPorLocales($idLocal,$iniciar,$datosPorPagina);
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
        <div class="container mt-5">
            <h1>Precio medio por local</h1>
            <table class="table table-striped list-group-item-primary">
                <thead>
                    <tr>
                        <th scope="col">LOCAL</th>
                        <th scope="col">PRECIO MEDIO</th>
                        <th scope="col">TOTAL RESERVAS </th>                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    if (!empty($resultado)){
                        foreach ($resultado as $dato): ?>
                        <td scope="col"><?php echo $dato['nombrelocal'] ?></td>
                        <td><?php echo ceil($dato['preciomedio']) . " €" ?></td>
                        <td><?php echo $dato['totalreserva'] ?></td>     
                        </tr>
                    <?php endforeach;
                    } else {
                        echo "No hay medias disponibles";
                    }
                ?>                    
                </tbody>
            </table>            
        </div>
        <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--                    Boton anterior-->
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="listadoInformeMediaPrecios.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
                    </li>                 
                    <?php
                    $cuentaFilas = new consultasLocalFechaPrecio();
                    $filas = array();
                    $filas = $cuentaFilas->contarPrecioMedioPorLocales($idLocal);
                    //var_dump($filas);
                    //botones de paginación             
                    $totalPaginas = ceil($filas / $datosPorPagina);
                    for ($i = 0; $i < $totalPaginas; $i++):
                        ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="listadoInformeMediaPrecios.php?pagina=<?php echo $i + 1 ?>"> <?php echo $i + 1 ?> </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $_GET['pagina'] >= $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="listadoInformeMediaPrecios.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>          
    </body>
</html>
