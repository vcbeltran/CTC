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
        <title>Actualizar información local</title>
    </head>
    <body id="admin">
        <?php
       
        
        include ('../consultas/consultasLocales.php');
        session_start();
        // echo $_SESSION['tipo'];
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
             if (isset($caratula)){
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
        <?php  }              
            }    
       }
        } else { 
                ?>
        <div class="container mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>¡Ojo!</strong> No has actualizado foto! 
                    </div> 
                </div>
            </div>
          
   <?php  } if ($consultas->actualizarLocalSinFoto($id, $nombre, $direccion, $aforo)){ ?>
                <div class="container  mt-5" >
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div class="alert alert-success">
                            <strong>¡¡Bien!!</strong> Has actualizado los datos, puedes volver al menú de edición <a href="editarLocal.php" class="alert-link">pulsando aquí</a>.
                        </div>  
                    </div>
                </div>  
    <?php } else { 
                ?>
        <div class="container mt-5" >
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <strong>¡Ojo!</strong> Ojo el nombre del local está repetido! puedes volver al menú de edición <a href="editarLocal.php" class="alert-link">pulsando aquí</a>. 
                    </div> 
                </div>
            </div>
          
   <?php  } ?>
    </body>
</html>
