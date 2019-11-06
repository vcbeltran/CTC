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

        <script type="text/javascript">
            function mostrarPassword() {
                var cambio = document.getElementById("txtPassword");
                if (cambio.type == "password") {
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                } else {
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }

            $(document).ready(function () {
                //CheckBox mostrar contraseña
                $('#ShowPassword').click(function () {
                    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
                });
            });
        </script>
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
                                <input type="text"  class="form-control" id="staticName" value="<?php echo $datos[4] ?>" name="nombre" required="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="staticEmail" value="<?php echo $datos[0] ?>" name="mail" required="true">
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
                                <div class="col md-2">
                                    <a class="btn btn-warning" href="../inicio.php" > <i class="fa fa-home" aria-hidden="true"></i> Vuelva al inicio </a>
                                </div>
                                <div class="col md-2">
                                    <button class="btn btn-warning" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
