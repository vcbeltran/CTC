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
        <title> Formulario Acceso</title>
    </head>
    <body>
        <div class="container mt-5" >
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Acceso usuarios registrados</legend>
                        <form action="adminLogin.php" method="POST">
<!--                            <div class="form-group">
                                <label for="inputNombre" class="col-form-label"> Nombre </label>               
                                <input type="text" class="form-control" id="inputNombre" placeholder="Introduzca su nombre" name="nombre">
                            </div>        -->
                            <div class="form-group">
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
