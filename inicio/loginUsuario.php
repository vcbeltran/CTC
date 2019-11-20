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
        <title>Bienvenido</title>
    </head>
    <body id="user">
        <div class="container" >
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="adminLogin.php" method="POST">
                        <div class="form-group" >
                           <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                            <label for="inputNombre" class="col-form-label"> Nombre </label>               
                            <input type="text" class="form-control" id="inputNombre" placeholder="Introduzca su nombre" name="nombre">
                        </div>        
                        <div class="form-group" >
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
                            <label for="inputEmail3" class="col-form-label">Email</label>                            
                            <input type="email" class="form-control is-valid" id="inputEmail3" placeholder="Email" name="mail">
                        </div>             
                        <div class="form-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <label for="inputPassword3" class="col-form-label">Password</label>                              
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="contra" required>
                        </div> 
                        <div class="form-group">
                           <div class="col-auto">
                               <button type="submit" class="btn btn-secondary mb-2">Acceder</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
