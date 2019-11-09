<?php
    include ('consultas/conexiones.php');
    include ('consultas/consultasLocales.php');
    $conect = new Conexiones();
    $totalFilasLocal = new consultasLocales();

  
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
        <?php include ('includes/include.php'); ?>   
<!--        <link rel="stylesheet" type="text/css" href="CSS/imagenes.css">-->

        <meta charset="UTF-8">                       
        <title>Bienvenido a tu web de reservas</title>
    </head>
    <body>
        <?php include ('includes/includeCabecera.php'); ?>
        <?php             
         session_start(); 
         include './consultas/consultasReservas.php';
         
         $consultaPuntuacion = new consultasReservas();      
       
        if (!$_GET) {
            header("location:inicio.php?pagina=1");
        } 
        ?>
        <div class="container mt-5">
            <div class="row">             
                <!-- MENU NAVEGACION -->
                <?php if (!isset($_SESSION['id'])) { ?>
                    <!-- Muestra los botones de LOGIN Y ACCESO SI EL USUARIO NO ESTÁ CONECTADO -->
                    <div class="col-md-8"></div>
                    <nav class="navbar navbar-dark bg-info" style="background-color: #009CCA">  
                        <a class="navbar-brand" href="formularioRegistro.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Alta Nuevo Usuario</a>
                        <a class="navbar-brand" href="formularioLogin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Acceso Usuarios</a>
                    </nav>      
                <?php
                } else {
                    $tipoUsuario = $_SESSION['id'];
                    $nombreUsuario = $_SESSION['nombre'];
                    //var_dump($_SESSION);  
                    ?>
                    <div class="container-fluid">
                        <div class="row">                          
                                <div class="col md-3">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Bienvenido: <?php echo $_SESSION['nombreUsuario']; ?></button>
                                </div>                      
                                <div class="col md-3">
                                    <button type="button" class="btn btn-warning"><i class="far fa-address-book"></i><a style="text-decoration:none;color:black" class="stretched-linkhref" href="usuarioOnline/listadoReservas.php"> Consulte sus reservas</a> </button>
                                </div>                               
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning"><i class="fas fa-user-tag"></i><a style="text-decoration:none;color:black" class="stretched-linkhref" href="usuarioOnline/formularioDatosUser.php"> Datos personales </a></button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-sign-out" aria-hidden="true"></i><a style="text-decoration:none;color:black" class="stretched-linkhref" href="logoutUser.php">Cierra sesión</a></button>
                                </div>
                        </div>
                <?php } ?></div>
                         
            </div>
        </div>       
       <div class="container mt-3"> 
<!--           <div class='row'>-->
             <?php
 
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
                $media = $consultaPuntuacion ->consultaMedia($local[0]); 
                $mediaTotal;
                $mediaTotal=(ceil($media[0])); ?>               
                <p> PUNTOS: <img class='img-resposive' src="administrador/imagenes/puntuacion_<?php echo $mediaTotal; ?>.png" /></p>
                <?php
                //cierra card body
                print("</div>");
                //cierra card
                if (isset($_SESSION['id'])){
                     print("<a class='btn btn-info' href='usuarioOnline/listaLocalFechaPrecioDisponible.php?pagina=1&codigo=" . $local[0] . " '><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Consultar disponibilidad </a> ");
                }
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
                        <a class="page-link " href="inicio.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
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
<!--         <div class="container-fluid mb-3">
              <div class="col list-group-item-info bg-info rounded">
                 <div class="footer-copyright text-center text-white py-3"> &copy 2019 Desarrollado por: Verónica Beltrán González </div>                   
              </div>
         </div>-->
  <?php include ('includes/includeFooter.php'); ?>
    </body>
</html>
