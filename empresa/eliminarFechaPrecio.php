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
        <title>Elimina Fecha Precio </title>
    </head>
    <body id="empresa">
        <?php
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
        $codigo = $_REQUEST['codigo'];
           
        $consultaEliminar = new consultasLocalFechaPrecio();       
      
         
        if ($consultaEliminar->borrarFechaPrecio($codigo)){ ?>
                <div class="container mt-5">
                    <div class="alert alert-success mb-2" role="alert">
                        <i class="fa fa-check" aria-hidden="true"></i> Has eliminado el registro <a href="editarFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver a la lista</strong></a>
                    </div>
                </div>                          
       <?php  } ?>
    </body>
</html>
