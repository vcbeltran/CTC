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
        <title>Formulario Fecha Empresa</title>
    </head>
    <body>
        <?php
        session_start();
        //var_dump($_SESSION);
        
        if (!isset($_SESSION)) {
            header("location:../inicio.php");
        }
        $_SESSION['accion'] = "alta";
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuEmpresa.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>   Vuelva al menú Empresa</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="container mt-5">       
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3>Añada nueva fecha para su empresa</h3>
                    <form action="altaFechaPrecio.php" method="GET">
                        <div class="form-group row">
                            <label for="example-texto-local" class="col-2 col-form-label">Tu local es </label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-texto-local"  value="<?php echo $_SESSION['nombrelocal'] ?>" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Fecha disponible</label>
                            <div class="col-10">
                                <input class="form-control" type="date"  id="example-date-input" name="fecha">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-2 col-form-label">Precio</label>
                            <div class="col-10">
                                <input class="form-control" type="number" id="example-number-input"   step="any" name="precio">
                            </div>
                        </div>       
                        <div class="form-group row">
                            <label for="example-time-input" class="col-2 col-form-label">Hora Inicio</label>
                            <div class="col-10">
                                <input class="form-control" type="time" id="example-time-input" name="horaInicio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-time-input2" class="col-2 col-form-label">Hora Fin</label>
                            <div class="col-10"> 
                                <input class="form-control" type="time" id="example-time-input2" name="horaFin">
                            </div>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Va a añadir un registro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Seguro que quiere agregar los datos?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cierre sin guardar</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
    </body>
</html>
