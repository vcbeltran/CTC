<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Formulario de login user</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container" >
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Acceso usuarios registrados</legend>
                        <form action="adminLogin.php" method="POST">
                            <div class="form-group" >
                                <label for="inputNombre" class="col-form-label"> Nombre </label>               
                                <input type="text" class="form-control" id="inputNombre" placeholder="Introduzca su nombre" name="nombre">
                            </div>        
                            <div class="form-group" >
                                <label for="inputEmail3" class="col-form-label">Email</label>               
                                <input type="email" class="form-control is-valid" id="inputEmail3" placeholder="Email" name="mail">
                            </div>             
                            <div class="form-group">
                                <label for="inputPassword3" class="col-form-label">Password</label>                
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="contra" required>
                            </div> 
                            <div class="form-group">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-secondary mb-2">Acceder</button>
                                </div>
                            </div>
                        </form>                        
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
