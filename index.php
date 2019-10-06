<!--
Muestra la pagina principal de la pagina donde aparecen todos los loclaes
y donde da la opción de logearse (si ya estas registrado) o darse de alta. 
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include ('conexiones.php');
            include ('consultasLocales.php');
            $conect = new Conexiones();
            $usuario = "vero";
            $contraseña = "verobel";
            $prueba = $conect->compruebaTipoUsuario($usuario, $contraseña);
            var_dump($prueba);
            //Conecto con la clase locales para extraer un array con la información que hay en
            //la bbdd referente a los locales
            $conexionLocales = new ConsultasLocales();
            $locales = array();
            $locales = $conexionLocales->listarLocales();                           
                         
        ?>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <table class="table table-borderless" class="row justify-content-center">
                    <caption>Listado de Locales</caption>
                    <thead>
                        <tr>
                            <th scope="col">Prueba</th>
                            <th scope="col">Imprimir</th>
                            <th scope="col">Locales</th>
                            <th scope="col">Cago en to</th>
                        </tr>
                    </thead>
                    <tbody>                                   
                        <?php
                        $contador = 1;
                        foreach ($locales as $local) {
                            if ($contador == 1) {
                                print("<tr>");
                            }
                            print("<td> <img src=\"" . $local[4] . " \" />"."</br>");
                            print("NOMBRE: " . $local[1] . "</br>");
                            print("DIRECCIÓN: " . $local[2] . "</br>");
                            print("AFORO: " . $local[3] . "</td>");

                            if ($contador == 4) {
                                print("</tr>");
                                $contador = 0;
                            }
                            $contador++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </body>
</html>
