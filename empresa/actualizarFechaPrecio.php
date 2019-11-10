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
        $idLocalFechaPrecio = $_SESSION['idLocalFechaPrecio'];
        //var_dump(date("Y-m-d"));
        //var_dump($codigoFechaPrecio);     
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
        <title>Fecha actualizada</title>
    </head>
    <body id="empresa">
        <?php
         if  (!empty($fecha) && !empty($precio) && !empty($horaIni) && !empty($horaFin)  && !($fecha < date("Y-m-d")) ) {
          if ($accion == "actualizar"){
                print("<br>");
               // var_dump($fecha);
                if ($actualizaFecha->actualizarFechaPrecio($fecha, $precio, $horaIni, $horaFin, $idLocalFechaPrecio)){ ?>
                    <div class="container mt-5">
                        <div class="alert alert-success mb-2" role="alert">
                            <i class="fa fa-check" aria-hidden="true"></i> Has actualizado el registro <a href="detalleEditarFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver a la lista</strong></a>
                        </div>
                    </div>  
             <?php   } else {?>
                     <div class="container mt-5">
                        <div class="alert alert-danger mb-2" role="alert">
                            Algo ha ido mal!  <a href="fomularioModificarFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver al fomulario</strong></a>
                        </div>
                    </div>   
              <?php  }               
              }
        } else { ?>   
        <div class="container mt-5">
                <div class="alert alert-danger mb-2" role="alert">
                    Hay algún dato que es nulo o la fecha es menor que la fecha actual <a href="fomularioModificarFechaPrecio.php" class="alert-link"><strong>Pulse aquí para volver al menú principal</strong></a>
                </div>
        </div>  
        <?php } ?>   
    </body>
</html>
