<!DOCTYPE html>
<!--
Esta página es la que permite al administrador,incluir locales e incluir
los uusuarios de tipo empresa. 
Además permite ver algún listado de los locales. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/9572130963.js"></script>
        <title>Bienvenido al menu de Administrador</title>
    </head>
    <body>
        <?php
        session_start();
        include '../consultas/conexiones.php';
        $conexion = new Conexiones;
        if (!isset($_SESSION['id'])) {
            header("location:inicio.php");
        }
        $tipo = $_SESSION['tipo'];
        //var_dump($tipo);
        /* CERRAR SESION */
        ?>
   
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary">Usuario conectado: <?php echo $tipo; ?></button>
                </div>
                <!-- MENU NAVEGACION -->
                <nav class="navbar navbar-light" style="background-color:#b3d9ff;">  
<!--                  <!-- Navbar content -->
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestion Local
                        </a>                           
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="formularioAltaLocal.php">Alta Local</a>
                            <a class="dropdown-item" href="editarLocal.php"><i class="fa fa-pencil fa-fw"></i> Modificar / Eliminar Local</a>
                        </div>               
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestión empresas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="formularioAltaEmpresa.php">Alta Empresa</a>
                            <a class="dropdown-item" href="editarEmpresa.php"> <i class="fa fa-pencil fa-fw"></i> Modificar / Eliminar Empresa</a>
                        </div>  
                    </div>
                    <a class="navbar-brand" href="#">Ver Informes</a>
                    <a class="navbar-brand" href="logout.php"> Cierra sesión </a> 
                </nav>                
            </div>
        </div>      
    </body>
</html>
