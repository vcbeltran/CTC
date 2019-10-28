<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--        <script>
              $(document).ready(function(){
                  
                  
              });
              
                swal({
          text: "Hello world!",
        });
            </script>-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://use.fontawesome.com/9572130963.js"></script>

        <title></title>
    </head>
    <body>
        <?php
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
        $codigo = $_REQUEST['codigo'];
        $boton = $_REQUEST['boton'];
        var_dump($boton);
        var_dump($codigo);
        $consultaEliminar = new consultasLocalFechaPrecio();       
      
         
        if ($consultaEliminar->borrarFechaPrecio($codigo)){ ?>
                <div class="container mt-5">
                    <div class="alert alert-success mb-2" role="alert">
                        <i class="fa fa-check" aria-hidden="true"></i> Has eliminado el registro <a href="editarFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver a la lista</strong></a>
                    </div>
                </div>                          
       <?php  } ?>
    </body>
</html>
