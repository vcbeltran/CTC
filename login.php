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
        <title>Bienvenido</title>
    </head>
    <body>
        <div class="container pd-5" >
            <form action="index.php" method="POST">
                <div class="form-group row mt-5" >
                    <label for="inputEmail3" class="col-sm-2 col-form-label pd-5 ">Email</label>               
                    <input type="email" class="form-control is-valid mt-5" id="inputEmail3" placeholder="Email" name="mail">
                </div>             
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>                
                    <input type="password" class="form-control mt-5" id="inputPassword3" placeholder="Password" name="contra">
                </div> 
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-primary">Acceder</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
