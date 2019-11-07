<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('includes/include.php'); ?>
        <title>Bienvenido</title>
    </head>
    <body>
        <div class="container mt-5" >
            <div class="card">
                <div class="row mt-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Introduzca sus datos</legend>
                            <form action="altaUser.php" method="POST">
                                <div class="form-group" >
                                    <i class="fa fa-address-card" aria-hidden="true"></i>   
                                    <label for="inputNombre" class="col-form-label"> Nombre </label>           
                                    <input type="text" class="form-control" id="inputNombre" placeholder="Introduzca su nombre" name="nombre">
                                </div>        
                                <div class="form-group" >
                                    <label for="inputEmail3" class="col-form-label">Email</label>     
                                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control is-valid" id="inputEmail3" placeholder="Email" name="mail">
                                </div>             
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-form-label">Password</label>      
                                    <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="contra" required>
                                </div> 
                                <div class="form-group">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary mb-2">Registrarse</button>
                                        <input class="btn btn-primary mb-2" type="reset" value="Reset"></div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
