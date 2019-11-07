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
    </head>
    <body>
        <div class="container mt-5" >
            <div class="card"> 
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="administrador/imagenes/avatar.png" class="img-thumbnail"  style="text-align: center" alt="...">
                    </div>                  
                    <div class="row mt-5">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Acceso usuarios registrados</legend>
                                <form action="adminLogin.php" method="POST">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-form-label">Email</label>               
                                        <input type="email" class="form-control is-valid" id="inputEmail3" placeholder="Email" name="mail">
                                    </div>             
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-form-label">Password</label>                
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="contra">
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
            </div>
        </div>
    </body>
</html>
