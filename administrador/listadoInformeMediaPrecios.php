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
        include '../consultas/consultasReservas.php';
        session_start();
        $idLocal = null;
        $consulta = new consultasReservas();
        $resultado = $consulta->consultaMedia($idLocal);
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
            <h1>TOP 5 media precio</h1>
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
                    <?php foreach ($resultado as $dato): ?>
                        <td scope="col"><?php echo $dato['nombrelocal'] ?></td>
                        <td><?php echo ceil($dato['preciomedio']) . " €" ?></td>
                        <td><?php echo ceil($dato['total']) ?></td>     
                        </tr>
                    <?php endforeach; ?>                    
                </tbody>
            </table>
        </div>
    </body>
</html>
