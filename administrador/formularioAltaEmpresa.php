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
            header("location:inicio.php");
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
                    <div class="card">
                        <h2>Añada nuevo usuario Empresa </h2>
                          <card class="card-body">
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
                                <button type="submit" class="btn btn-primary mb-2">Dar alta</button>
                                <input class="btn btn-primary mb-2" type="reset" value="Reset">
                            </div>   
                   
                    </form>
                              </div>
                         </div>
                </div>
            </div>
        </div>
    </body>
</html>
