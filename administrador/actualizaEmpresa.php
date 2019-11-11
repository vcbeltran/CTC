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
        <title>Actualiza usuario empresa</title>
    </head>
    <body id="admin">
        <?php
        include '../consultas/consultasEmpresas.php';
        $consulta = new consultasEmpresas();
        
        $codigo = $_REQUEST['codigo'];
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $contra = null;
        
        if (!empty($_REQUEST['contra'])){
            $contra = md5($_REQUEST['contra']);
        } 
        
        $local = $_REQUEST['idlocal'];
               
        
        if ($consulta->actualizarEmpresa($codigo, $nombre, $correo, $contra, $local)) {
            ?>
            <div class="container mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-success">
                        <strong>¡Ya está actualizada la empresa!</strong> Puedes volver al menú edición <a href="editarEmpresa.php" class="alert-link">pulsando aquí</a>.
                    </div> 
                </div>
            </div>
        <?php } else { ?>
            <div class="container  mt-5" >
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>¡Lo sentimos!</strong> El nombre de la empresa ya está en uso.<a href="editarEmpresa.php" class="alert-link"> Pulse para volver atrás</a>
                    </div>  
                </div>
            </div>    
        <?php } ?>
    </body>
</html>
