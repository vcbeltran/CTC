    <?php
        
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
        $altaFecha = new consultasLocalFechaPrecio();              
      //los datos del formulario y lo que necesito de la sesión que es el local asignado a empresa
        $fecha = $_REQUEST['fecha'];
        $precio = $_REQUEST['precio'];
        $horaIni = $_REQUEST['horaInicio'];
        $horaFin = $_REQUEST['horaFin'];
        $idlocal = $_SESSION['local'];
      
    ?>
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
        <title></title>
    </head>
    <body>
     
        <?php  if (!empty($fecha) && !empty($precio) && !empty($horaIni) && !empty($horaFin)){?> 
             <?php   if ($altaFecha->insertaPrecio($fecha, $precio, $horaIni, $horaFin, $idlocal)) { ?>        
                        <div class="container mt-5">
                            <div class="alert alert-success" role="alert">
                                Ha dado de alta correctamente el registro nuevo! <a href="formularioFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver al fomulario</strong></a>
                            </div>
                        </div>            
             <?php }                  
            } else { ?>  
                       <div class="container mt-5">
                            <div class="alert alert-danger mb-2" role="alert">
                               Hay algún dato que es nulo! <a href="formularioFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver al fomulario</strong></a>
                            </div>
                        </div>   
             <?php } ?>
                
    </body>
</html>
