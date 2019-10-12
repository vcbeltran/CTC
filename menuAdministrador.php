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
        <title>Bienvenido al menu de Administrador</title>
    </head>
    <body>
        <?php
        session_start();

        if (!isset($_SESSION['id'])) {
            header("location:inicio.php");
        }
        $tipo = $_SESSION['tipo'];
        //var_dump($tipo);
        /* CERRAR SESION 
        FALTA METER BOTON POR SI QUIERE CERRAR SESION
         * Y MANDAR AL INDEX  */
        ?>
        <div class="container"></div>
            <div class="container mt-5">
            <div class="row">
                <div class="col-md-6"><button type="button" class="btn btn-info">Usuario conectado: <?php echo $tipo; ?></button></div>
                <div class="col-md-6">
                    <nav class="navbar navbar-light" style="background-color:#e3f2fd;">  
                        <a class="navbar-brand"></a>
                        <!-- Navbar content -->
                            <button type="button" class="navbar-brand btn btn-primary" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true">
                                Gestion Local
                            </button>                           
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="formularioAltaLocal.php">Alta Local</a>
                                <a class="dropdown-item" href="#">Modificar</a>
                                <a class="dropdown-item" href="#">Eliminar</a> 
                            </div>                 
                        <a class="navbar-brand" href="#">Gestión Empresas</a>
                        <a class="navbar-brand" href="#">Ver Listados</a>
                    </nav>
                </div>
            </div>
        </div>       
    </body>
</html>
