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
        <title>Formulario Empresa</title>
    </head>
    <body>
        <?php
        session_start();
        //var_dump($_SESSION);
        
        if (!isset($_SESSION)) {
            header("location:../inicio.php");
        }
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuEmpresa.php">Vuelva al menú Empresa</a>
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
                    <h2>Añada nueva fecha para su empresa</h2>
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
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary mb-2">Dar alta</button>
                            <input class="btn btn-primary mb-2" type="reset" value="Reset">
                        </div>                   
                    </form>
                </div>
            </div>
    </body>
</html>
