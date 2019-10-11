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
            <?php
            $contador = 1;
            foreach ($locales as $local):
                if ($contador == 1) {
                    //empieza el row
                    print("<div class='row'>");
                }
                ?>
                <?php
                //empieza una col con su card dentro
                print("<div class='col-md-3'>");
                //empieza una card
                print("<div class='card'>");
                //empieza foto
                print("<img class='image-responsive' src=\" " . $local[4] . " \" />");
                //empieza cuerpo
                print("<div class='card-body'>");
                //empieza primer parrafo
                print("<p class='card-text'> NOMBRE: " . $local[1] . "</p>");
                print("<p class='card-text'> DIRECCION: " . $local[2] . "</p>");
                print("<p class='card-text'> AFORO: " . $local[3] . "</p>");
                //cierra card body
                print("</div>");
                //cierra card
                print("</div>");
                //cierra col
                print("</div>");

                if ($contador == 4) {
                    //cuando haya 4 card acaba el row
                    print("</div>");
                    $contador = 0;
                } 
                $contador++;
            endforeach;
              print("</div>");
            ?>                
      </div>
    </body>
</html>

