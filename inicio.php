<?php
    include ('consultas/conexiones.php');
    include ('consultas/consultasLocales.php');
    $conect = new Conexiones();
    $totalFilasLocal = new consultasLocales();
    //var_dump($prueba);
    //Conecto con la clase locales para extraer un array con la información que hay en
    //la bbdd referente a los locales
    $conexionLocales = new ConsultasLocales();
    $locales = array();
    $locales = $conexionLocales->listarLocales();
    
    $filas = $totalFilasLocal->totalFilas();
    //var_dump($filas);
    
?>

<!--
Muestra la pagina principal de la pagina donde aparecen todos los locales
y donde da la opción de logearse (si ya estas registrado) o darse de alta. 
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<!--        <link rel="stylesheet" type="text/css" href="CSS/imagenes.css">-->
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">-->
        
        
        <title>Bienvenido a tu web de reservas</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                 <div class="col-md-8"></div>
                <!-- MENU NAVEGACION -->
                <nav class="navbar navbar-dark bg-primary" style="background-color:#b3d9ff;">  
                    <a class="navbar-brand" href="formularioRegistro.php">Alta Nuevo Usuario</a>
                    <a class="navbar-brand" href="formularioLogin.php">Acceso Usuarios</a>
                </nav>                
            </div>
        </div>       
       <div class="container mt-3">
             <?php
             
            $localesPorPagina = 8;
            $totalArticulosPorPagina = $filas/$localesPorPagina;    
            
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
                print("<img class='card-img-top' src=\"administrador/" . $local[4] . " \" />");
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
        <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
<!--           <footer class="page-footer font-small blue">
           <div class="footer-copyright text-center py-3"> © 2019 Desarrolado por: Verónica Beltrán González
                 <?php //echo date("Y-m-d H:i:s") ?>
           </div>
                   </footer>-->
    </body>
</html>
