<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Formulario Empresa</title>
    </head>
    <body>
        <?php
        include ('../consultas/consultasEmpresas.php');
        include '../consultas/consultasLocales.php';

        $local = new ConsultasLocales();
        session_start();
        if (!isset($_SESSION)) {
            header("location:../inicio.php");
        }
        ?>
        <div class="container mt-5">
            <fieldset class="scheduler-border">
                <form action="altaFechaPrecio.php" method="POST">
                    <legend class="scheduler-border">Formulario con los datos de su local</legend>         
                    <div class="form-group row">                        
                        <label for="example-text-input" class="col-2 col-form-label">Nombre de su local</label>
                        <div class="col-8">
                            <input class="form-control" type="text" placeholder="El dato de su local" id="InputName" value="  <?php echo $_SESSION['nombrelocal'] ?>  " readonly="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Fecha Disponbible</label>
                        <div class="col-8">
                            <input class="form-control" type="date" id="example-date-input" name="fecha">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Precio</label>
                        <div class="col-8">
                            <input class="form-control" type="number" placeholder="Introduzca precio" name="precio">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-time-input" class="col-2 col-form-label">Hora Inicio</label>
                        <div class="col-8">
                            <input class="form-control" type="time" name="horainicio" name="horainicio">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-time-input" class="col-2 col-form-label">Hora Final</label>
                        <div class="col-8">
                            <input class="form-control" type="time" id="example-time-input" name="horafinal">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-3"></div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Actualizar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Va a dar de alta un registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quiere grabar los datos?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cierre sin guardar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-2">
                        <input class="btn btn-primary" type="reset" value="Reset">
                    </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </body>
</html>
