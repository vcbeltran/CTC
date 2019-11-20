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
        <title>Alta nueva Empresa</title>
    </head>
    <body id="admin">
        <?php
        session_start();

        if (!isset($_SESSION)) {
            header("location:inicio/inicio.php");
        }
        // echo  "Sigue siendo el usuario ". $_SESSION['tipo'];
        include '../consultas/consultasLocales.php';
        $consultaLocal = new ConsultasLocales();
        $localesLibres = array();
        $localesLibres = $consultaLocal->listaLocalDisponible();
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuAdministrador.php"><i class="fas fa-arrow-circle-left"></i> Vuelva al menú de administrador</a>
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
                    <div class="card">
                        <card class="card-body">
                        <h2>Añada nuevo usuario Empresa </h2>                        
                        <form action="altaUsuarioEmpresa.php" method="POST">
                            <div class="form-group">
                                <label for="InputName">Nombre Empresa</label>
                                <input type="text" class="form-control" id="InputName" placeholder="Introduzca nombre" name="nombre">
                            </div>
                            <div class="form-group" >
                                <label for="inputEmail3" class="col-form-label">Email</label>               
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="mail">
                            </div>    
                            <div class="form-group">
                                <label for="inputPassword3" class="col-form-label">Password</label>                
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="contra" required>
                            </div> 
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Elija local</label>       
                                <select class='form-control' id='exampleFormControlSelect1' name="local">                            
                                    <?php
                                    foreach ($localesLibres as $listaLocal):
                                        print ("<option value=" . $listaLocal[0] . ">" . $listaLocal[1] . "</option>");
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Dar alta</button>
                                <input class="btn btn-secondary mb-2" type="reset" value="Reset">
                            </div>
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
                                            ¿Seguro que quiere dar alta a la empresa?
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
        </div>
        </div>
    </body>
</html>
