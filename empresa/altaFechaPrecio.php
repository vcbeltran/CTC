    <?php
        
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
        $altaFecha = new consultasLocalFechaPrecio();     
        $actualizaFecha = new consultasLocalFechaPrecio();
        //los datos del formulario y un dato que necesito de la sesión que, es el local asignado a empresa
        $fecha = date("Y-m-d",strtotime($_REQUEST['fecha']));
        $precio = $_REQUEST['precio'];
        $horaIni = $_REQUEST['horaInicio'];
        $horaFin = $_REQUEST['horaFin'];
        $idlocal = $_SESSION['local'];
        $accion = $_SESSION['accion'];
      
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
        <?php include ('../includes/include.php'); ?>      
        <title>Alta fecha precio </title>
    </head>
    <body>
     
        <?php  
        if  (!empty($fecha) && !empty($precio) && !empty($horaIni) && !empty($horaFin)  && !($fecha < date("Y-m-d")) ) {
            if ($accion == "alta") {
                if ($altaFecha->insertaPrecio($fecha, $precio, $horaIni, $horaFin, $idlocal)) {
                    ?>        
                    <div class="container mt-5">
                        <div class="alert alert-success mb-2" role="alert">
                            <i class="fa fa-check" aria-hidden="true"></i> Ha dado de alta correctamente el registro nuevo! <a href="formularioFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver al fomulario</strong></a>
                        </div>
                    </div>            
                    <?php
                    } else {
                    ?>  
                    <div class="container mt-5">
                        <div class="alert alert-danger mb-2" role="alert">
                           <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Algo ha ido mal! <a href="formularioFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver al fomulario</strong></a>
                        </div>
                    </div>   
            <?php }
                }                 
          }  else { ?>   
        <div class="container mt-5">
                <div class="alert alert-danger mb-2" role="alert">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡Hay algún dato que es nulo o la fecha es menor a hoy! <a href="menuEmpresa.php" class="alert-link"><strong>Pulse aquí para volver al menú principal</strong></a>
                </div>
        </div>  
        <?php } ?>        
    </body>
</html>
