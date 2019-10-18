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
        <title>- MENU ADMINISTRADOR - Alta Local </title>
    </head>
    <body>
        <?php
        session_start();
        include 'conexiones.php';
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
                    <h2>Añada nuevo Local</h2>
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
                            <input type="text" class="form-control" id="InputAforo" placeholder="Introduzca número" name="aforo">
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
                                <input class="btn btn-primary mb-2" type="reset" value="Reset">                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
