<!DOCTYPE html>
<!--
Esta página es la que permite al administrador,incluir locales e incluir
los uusuarios de tipo empresa. 
Además permite ver algún listado de los locales. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php'); ?>        
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
                            <a class="dropdown-item" href="formularioAltaLocal.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Alta Local</a>
                            <a class="dropdown-item" href="editarLocal.php"><i class="fa fa-pencil fa-fw"></i> Modificar / Eliminar Local</a>
                        </div>               
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestión empresas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="formularioAltaEmpresa.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Alta Empresa</a>
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
