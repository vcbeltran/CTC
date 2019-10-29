<?php
    include ('consultas/conexiones.php');
    include ('consultas/consultasLocales.php');
    $conect = new Conexiones();
    $totalFilasLocal = new consultasLocales();
    //var_dump($prueba);
    //Conecto con la clase locales para extraer un array con la información que hay en
    //la bbdd referente a los locales 
?>
<!--
Muestra la pagina principal de la pagina donde aparecen todos los locales
y donde da la opción de logearse (si ya estas registrado) o darse de alta. 
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<!--    <link rel="stylesheet" type="text/css" href="CSS/imagenes.css">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/9572130963.js"></script>
        <!-- Latest compiled and minified CSS -->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">-->
        <title>Bienvenido a tu web de reservas</title>
    </head>
    <body>
        <?php             
         session_start(); 
        ?>
        <div class="container mt-5">
            <div class="row">               
               
                <!-- MENU NAVEGACION -->
          <?php if (!isset($_SESSION['id'])) { ?>
                <!-- Muestra los botones de LOGIN Y ACCESO SI EL USUARIO NO ESTÁ CONECTADO -->
                 <div class="col-md-8"></div>
                <nav class="navbar navbar-dark bg-warning" style="background-color:#b3d9ff;">  
                    <a class="navbar-brand" href="formularioRegistro.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Alta Nuevo Usuario</a>
                    <a class="navbar-brand" href="formularioLogin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Acceso Usuarios</a>
                     </nav>      
          <?php } else {                   
                    $tipoUsuario = $_SESSION['id'];
                    $nombreUsuario = $_SESSION['nombre'];
                    //var_dump($nombreUsuario);  ?>
                 <div class="row">                          
                        <div class="col md-3">
                            <button type="button" class="btn btn-warning"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Bienvenido: <?php echo  $_SESSION['nombreUsuario']; ?></button>
                        </div>
                      <div class="col md-6"></div>
                        <div class="col md-3">
                          <nav class="navbar navbar-dark bg-warning" > 
                                <a class="navbar-brand" href="logoutUser.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Cierra sesión </a> 
                            </nav>  
                        </div>
                </div>
         <?php }?>
                         
            </div>
        </div>       
       <div class="container mt-3"> 
<!--           <div class='row'>-->
             <?php
            if (!$_GET) {
                 header("location:inicio.php?pagina=1");
            }           
            $conexionLocales = new ConsultasLocales();
            $localesPorPagina = 8;            
            //El segmento por página de los locales a mostrar
            $iniciar = ($_GET['pagina']-1)*$localesPorPagina;
            //el total de registros que hay en la bbdd de los locales
            $filas = $totalFilasLocal->totalFilas();
            //todos los locales de la base de datos con LIMIT Y OFFSET 
            $locales = array();
            $locales = $conexionLocales->listarLocalesPaginacion($iniciar,$localesPorPagina);
            //var_dump($locales);
            $contador = 1;
            foreach ($locales as $local):
               if ($contador == 1) {
                    //empieza el row
                    print("<div class='row'>");
                }                       
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
                //if ($_SESSION[''])
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
           
            ?> 
       </div>
        <div class="container mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--Boton anterior-->
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="inicio.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
                    </li>
                    <?php
                    //botones de paginación             
                    $totalPaginas = ceil($filas / $localesPorPagina);
                    for ($i = 0; $i < $totalPaginas; $i++):
                        ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="inicio.php?pagina=<?php echo $i + 1 ?>"> <?php echo $i + 1 ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $_GET['pagina'] >= $totalPaginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="inicio.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--<?php echo "Número total registros de la consulta:" . $filas ."<br>";
         echo "Mostramos: " . $localesPorPagina  ."<br>";
         echo "Mostramos la pagina: " . $_GET['pagina'] . " de " . $totalPaginas ."<br>"; 
         echo "El segmento por página de los locales a mostrar: " . $iniciar ."<br>"; ?>-->
        <footer class="navbar-fixed-bottom">
            <div class="footer-copyright text-center py-3"> &copy 2019 Desarrollado por: Verónica Beltrán González       
        </footer>
    </body>
</html>
