 <?php
    include ('../consultas/consultasLocalFechaPrecio.php');
        
    session_start();
    
    echo  $_SESSION['nombrelocal'];
    $idLocalFecha = $_REQUEST['codigo'];        
  
    $consultaFechas = new consultasLocalFechaPrecio();
    $fechaPrecioFila = array();
    $fechaPrecioFila = $consultaFechas->recuperaFilaLocalFechaPrecio($idLocalFecha);        
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
        <title></title>
    </head>
    <body>
            <div class="container mt-5" >
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Actualiza los datos del local</legend>
                        <form action= ../ method="POST">
                            <div class="form-group">
                                <label for="nombre" class="col-form-label"> Nombre de su local </label>               
                                <input type="text" class="form-control" id="nombre"  name="nombre" value="<?php echo $_SESSION['nombrelocal'] ?>" readonly="true">
                            </div>   
                           <div class="form-group">
                                <label for="fecha" class="col-form-label"> Fecha </label>               
                                <input type="date" class="form-control" id="fecha"  name="fecha" value="<?php echo date("d/m/Y",strtotime($fechaPrecioFila['FECHARESERVADA']))  ?>">
                            </div>      
                            <div class="form-group">
                                <label for="precio" class="col-form-label">Precio</label>               
                                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $fechaPrecioFila['PRECIO']?>">
                            </div>             
                            <div class="form-group">
                                <label for="horaini" class="col-form-label">Hora inicio</label>                
                                <input  type="time" class="form-control" id="horaini"  name="horaini"  value="<?php echo $fechaPrecioFila['HORAINICIO']?>">
                            </div> 
                            <div class="form-group">
                                <label for="horaini" class="col-form-label">Hora Fin</label>                
                                <input  type="time" class="form-control" id="horaini"  name="horaini"  value="<?php echo $fechaPrecioFila['HORAFIN']?>">
                            </div> 
                            <div class="form-group">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-secondary mb-2">Actualizar</button>
                                </div>
                            </div>
                        </form>                        
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
