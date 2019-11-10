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
        <title>- MENU ADMINISTRADOR - Alta Local </title>
    </head>
    <body id="admin">
        <?php
        session_start();
        include '../consultas/conexiones.php';
        $conexion = new Conexiones();
        //var_dump($_SESSION['tipo']);
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
                    <h2>Añada nuevo Local</h2>
                    <div class="card-body">
                    <form action="agregarLocal.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="InputName">Nombre Local</label>
                            <input type="text" class="form-control" id="InputName" placeholder="Introduzca nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="InputDireccion">Dirección Local</label>
                            <input type="text" class="form-control" id="InputDireccion" placeholder="Introduzca dirección" name="direccion">
                        </div>
                        <div class="form-group">
                            <label for="InputAforo">Aforo Local</label>
                            <input type="number" class="form-control" id="InputAforo" placeholder="Introduzca número" name="aforo">
                        </div>

                        <!-- Boton para subir archivo de foto-->
                        <label for="InputFoto">Foto Local</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <label for="caratula">Añada imagen:  </label>
                                <input type="file" name="caratula" required/>    
                            </div>
                        </div>
                        <div class="form-group  mt-5">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-secondary mb-2">Alta Local</button>
                                <input class="btn btn-primary mb-2" type="reset" value="Reset"></div>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
