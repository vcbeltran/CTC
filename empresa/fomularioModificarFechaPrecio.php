 <?php
    include ('../consultas/consultasLocalFechaPrecio.php');
        
    session_start();
    
    //echo  $_SESSION['nombrelocal'];
    $_SESSION['accion'] = "actualizar";
    $idLocalFechaPrecio = $_REQUEST['codigo'];        
  
    $consultaFechas = new consultasLocalFechaPrecio();
    $fechaPrecioFila = array();
    $fechaPrecioFila = $consultaFechas->recuperaFilaLocalFechaPrecio($idLocalFechaPrecio);    
    //var_dump($fechaPrecioFila['IDLOCALFECHAPRECIO']);
    //echo "id local fecha". $idLocalFechaPrecio;
   
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
        <?php include ('../includes/include.php'); ?>
        <title>Modifica Fecha Precio</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="detalleEditarFechaPrecio.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Vuelva a la lista de fechas</a>
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
                        <form action="actualizarFechaPrecio.php?accion=actualizar" method="GET">
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
                                <input type="text" class="form-control" id="fecha"  name="fecha" value="<?php echo date("d-m-Y", strtotime($fechaPrecioFila['FECHARESERVADA'])) ?>">
                            </div>      
                            <div class="form-group">
                                <label for="precio" class="col-form-label">Precio</label>               
                                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $fechaPrecioFila['PRECIO'] ?>">
                            </div>             
                            <div class="form-group">
                                <label for="horaini" class="col-form-label">Hora inicio</label>                
                                <input  type="time" class="form-control" id="horaini"  name="horaInicio"  value="<?php echo $fechaPrecioFila['HORAINICIO'] ?>">
                            </div> 
                            <div class="form-group">
                                <label for="horafin" class="col-form-label">Hora Fin</label>                
                                <input  type="time" class="form-control" id="horaini"  name="horaFin"  value="<?php echo $fechaPrecioFila['HORAFIN'] ?>">
                            </div> 
                            <div class="form-group row">
                                <div class="col-3">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                        Alta Fecha
                                    </button> 
                                </div>
                                <input class="btn btn-success" type="reset" value="Reset">
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Va a modificar un registro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Seguro que quiere cambiar los datos?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cierre sin guardar</button>
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </form>                        
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
