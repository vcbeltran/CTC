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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Editar Información Empresa</title>
    </head>
    <body>
        <?php
        include './consultasEmpresas.php';
        include './consultasLocales.php';
        session_start();
        $consulta = new consultasEmpresas();
        $codigoEmpresa = $_REQUEST['codigo'];
             
        $consultaLocal = new ConsultasLocales();
        $localesLibres = array();
        $localesLibres = $consultaLocal->listaLocalDisponible();

        $filaEmpresa = $consulta->seleccionarFila($codigoEmpresa);
        var_dump($filaEmpresa);
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuAdministrador.php">Vuelva al menú de administrador</a>
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
                      <h2>Edite los datos del Local</h2>
                    <form action="actualizaEmpresa.php" method="POST" enctype="multipart/form-data">    
                        <div class="form-group"> 
                            <label for="InputName">Código Empresa</label>
                            <input type="text" class="form-control" id="InputName" name="codigo" value="<?php echo $filaEmpresa[0] ?> " readonly="true">
                        </div>
                        <div class="form-group">                   
                            <label for="InputName">Nombre Empresa</label>
                            <input type="text" class="form-control" id="InputName" placeholder="Introduzca nombre" name="nombre" value="<?php echo $filaEmpresa[1] ?>">
                        </div>
                        <div class="form-group">
                            <label for="InputDireccion">Correo</label>
                            <input type="text" class="form-control" id="InputDireccion" placeholder="Introduzca dirección" name="correo" value="<?php echo $filaEmpresa[2] ?>">
                        </div>
                        <div class="form-group">
                            <label for="InputAforo">Password</label>
                            <input type="text" class="form-control" id="InputAforo" placeholder="Introduzca número" name="contra" value="<?php echo $filaEmpresa[3] ?>">
                        </div>  
                        <div class="form-group">
                            <label for="InputDireccion">Local asignado</label>
                            <input type="text" class="form-control" id="InputDireccion" name="direccion" value="<?php echo $filaEmpresa[4] ?>" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Elija local nuevo</label>       
                            <select class='form-control' id='exampleFormControlSelect1' name="idlocal">                            
                                <?php
                                foreach ($localesLibres as $listaLocal):
                                    print ("<option value=" . $listaLocal[0] . " >" . $listaLocal[1] . "</option>");
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <!-- Este botón submite el formulario de forma normal, sin abrir la ventana con la pregunta
                        <div class="form-group  mt-5">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Modificar</button>
                            </div>
                        </div>-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Actualizar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Va a actualizar un registro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Seguro que quiere actualizar los datos?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cierre sin guardar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
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