<?php

          
        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Actualizar información local</title>
    </head>
    <body>
        <?php
       
        
        include ('consultasLocales.php');
        session_start();
         echo $_SESSION['tipo'];
        $id = $_REQUEST['codigo'];
        $nombre = strtoupper($_REQUEST['nombre']);
        $direccion = strtoupper($_REQUEST['direccion']);
        $aforo = $_REQUEST['aforo'];
        $consultas = new ConsultasLocales();

        $caratula;
        if (is_uploaded_file($_FILES['caratula']['tmp_name'])) {
            if (!is_dir("imagenes/"))
             mkdir("imagenes/");
            $destino = "imagenes/";
            $caratula = $destino . $_FILES['caratula']['name'];
            if (!is_file($caratula)) {
                move_uploaded_file($_FILES['caratula']['tmp_name'], $caratula);
                //echo "fichero movido";
         ?>  
            <div class="container mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-success">
                        <strong>¡Ya está actualizada la foto!</strong> Puedes volver a la página de administrador <a href="editarLocal.php" class="alert-link">pulsando aquí</a>.
                    </div> 
                </div>
            </div>               
         <?php       
            } else {
                if ($consultas->actualizarLocalConFoto($id, $nombre, $direccion, $aforo, $caratula)) {
                    ?>
                <div class="container mt-5" >
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="alert alert-success">
                                <strong>¡Ya está añadido el archivo!</strong> Puedes volver a la página de edición <a href="editarLocal.php" class="alert-link">pulsando aquí</a>.
                            </div> 
                        </div>
                    </div>
        <?php  }              
            } 
        } else { 
                ?>
        <div class="container mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>¡Ojo!</strong> No has cambiado foto o nombre local existe!!!! 
                    </div> 
                </div>
            </div>
           <?php  if($consultas->actualizarLocalSinFoto($id, $nombre, $direccion, $aforo)){ ?>
                <div class="container  mt-5" >
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            <strong>¡¡Bien!!</strong> Has actualizado los datos sin actualizar la foto, puedes volver al menú de edición <a href="editarLocal.php" class="alert-link">pulsando aquí</a>.
                        </div>  
                    </div>
                </div>  
        <?php
             }
         }
         ?>
    </body>
</html>
