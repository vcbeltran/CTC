<?php
    include ('conexiones.php');
    include ('consultasLocales.php');
    $conect = new Conexiones();
    $usuario = "vero";
    $contraseña = "verobel";
    $prueba = $conect->compruebaTipoUsuario($usuario, $contraseña);
    //var_dump($prueba);
    //Conecto con la clase locales para extraer un array con la información que hay en
    //la bbdd referente a los locales
    $conexionLocales = new ConsultasLocales();
    $locales = array();
    $locales = $conexionLocales->listarLocales();
?>

<!--
Muestra la pagina principal de la pagina donde aparecen todos los locales
y donde da la opción de logearse (si ya estas registrado) o darse de alta. 
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/imagenes.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Bienvenido a tu web de reservas</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-secondary btn-lg"><a href='login.php' class="botones">Login</a></button>
                    <button type="button" class="btn btn-secondary btn-lg"><a href='registroUsuario.php' class="botones">Alta</a></button>
                </div>
            </div>
        </div>       
       <div class="container">
                 <div class="table-responsive">
            <table class="table table-borderless" >
                <caption>Listado de Locales</caption>
                <tbody>                                   
                    <?php
                    $contador = 1;
                    foreach ($locales as $local) {
                        if ($contador == 1) {
                            print("<tr>");
                        }
                        //var_dump ($local[4] . " ");
                        print("<td> <img class='img-responsive' src=\" " . $local[4] . " \" />");
                        print("NOMBRE: " . $local[1] . "</br>");
                        print("DIRECCIÓN: " . $local[2] . "</br>");
                        print("AFORO: " . $local[3] . "</td>");

                        if ($contador == 4) {
                            print("</tr>");
                            $contador = 0;
                            print("</br>");
                        }
                        $contador++;
                    }
                    ?>
                </tbody>
            </table>
      </div>
    </body>
</html>
