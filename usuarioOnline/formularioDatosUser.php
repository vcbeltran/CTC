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
        <title>Modifique sus datos</title>
    </head>
    <body>
        <?php   
        include('../consultas/conexiones.php');
        $consultas = new Conexiones();
        session_start();

        $mail = $_SESSION['nombre'];
        //var_dump($_SESSION['nombre']);
        $datos = $consultas->compruebaTipoUsuario($mail);
        //var_dump($datos);
        ?>
        <?php include ('../includes/includeCabecera.php'); ?>
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Modifique sus datos personales</h1>
                    <form action="actualizarDatosUser.php" method="POST">
                        <div class="form-group row">
                            <label for="staticName" class="col-sm-2 col-form-label">Nombre</label>  
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="staticName" value="<?php echo $datos[4] ?>" name="nombre" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="staticEmail" value="<?php echo $datos[0] ?>" name="mail" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div> 
                        </div>
                        <!--                        <div class="form-group row">
                                                    <div class="input-group row">
                                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                        <input id="Password" type="Password" Class="form-control" name="password">
                                                        <div class="input-group-append"> 
                                                            <span class="input-group-text">
                                                                <input ID="ShowPassword" type="checkbox" />
                                                            </span> 
                                                        </div>
                                                    </div>
                                                </div>  -->
                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Teléfono (opcional) </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPhone" placeholder="telephone" name="telefono"  value="<?php echo $datos[6] ?>">
                            </div>
                        </div>

                        <div class="container mt-5">
                            <div class="row">
                                <div class="col md-3">
                                    <a class="btn btn-warning" href="../inicio.php" > <i class="fa fa-home" aria-hidden="true"></i> Vuelva al inicio </a>
                                </div>
                                <div class="col md-2">
                                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i> Actualizar</button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Va a actualizar sus datos personales</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Seguro que quiere actualizar los datos?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cierre sin guardar</button>
                                                <button type="submit" class="btn btn-warning">Guardar cambios</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
