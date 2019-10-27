 <?php
    include ('../consultas/consultasLocalFechaPrecio.php');
        
    session_start();
    
    echo  $_SESSION['nombrelocal'];
    $_SESSION['accion'] = "actualizar";
    $idLocalFechaPrecio = $_REQUEST['codigo'];        
  
    $consultaFechas = new consultasLocalFechaPrecio();
    $fechaPrecioFila = array();
    $fechaPrecioFila = $consultaFechas->recuperaFilaLocalFechaPrecio($idLocalFechaPrecio);    
    var_dump($fechaPrecioFila['IDLOCALFECHAPRECIO']);
    echo "id local fecha". $idLocalFechaPrecio;
    echo "id local: ".$fechaPrecioFila['IDLOCALFECHAPRECIO'];
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
         <script src="https://use.fontawesome.com/9572130963.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="editarFechaPrecio.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vuelva a la lista de fechas</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
            <div class="container mt-5" >
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Actualiza las fechas disponibles del local</legend>
                        <form action="altaFechaPrecio.php?accion=actualizar" method="GET">
                            <div class="form-group">                               
                                <div class="col-5">
                                       <label for="nombre" class="col-form-label"> Nombre de su local </label>    
                                    <input type="text" class="form-control" id="nombre"  name="nombre" value="<?php echo $_SESSION['nombrelocal'] ?>" readonly="true">
                                    <label for="codigo" class="col-form-label"> Codigo de su fecha disponible </label>               
                                    <input type="text" class="form-control" id="codigo"  name="codigoFecha" value="<?php echo $idLocalFechaPrecio; ?>" readonly="true">
                                </div>
                            </div>   
                           <div class="form-group">
                                <label for="fecha" class="col-form-label"> Fecha </label>               
                                <input type="text" class="form-control" id="fecha"  name="fecha" value="<?php echo date("d-m-Y",strtotime($fechaPrecioFila['FECHARESERVADA']))  ?>">
                            </div>      
                            <div class="form-group">
                                <label for="precio" class="col-form-label">Precio</label>               
                                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $fechaPrecioFila['PRECIO']?>">
                            </div>             
                            <div class="form-group">
                                <label for="horaini" class="col-form-label">Hora inicio</label>                
                                <input  type="time" class="form-control" id="horaini"  name="horaInicio"  value="<?php echo $fechaPrecioFila['HORAINICIO']?>">
                            </div> 
                            <div class="form-group">
                                <label for="horafin" class="col-form-label">Hora Fin</label>                
                                <input  type="time" class="form-control" id="horaini"  name="horaFin"  value="<?php echo $fechaPrecioFila['HORAFIN']?>">
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
