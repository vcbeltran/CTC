<?php
    include ('../consultas/consultasLocales.php');
    //Conecto con la clase locales para extraer un array con la información que hay en
    //la bbdd referente a los locales
    $conexionLocales = new ConsultasLocales();
    $locales = array();
    $locales = $conexionLocales->listarLocales();
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
        <title>Menú de edición local</title>
    </head>
    <body id="admin">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuAdministrador.php">Vuelva al menú de administrador</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="container mt-3">
            <h2>Lista de locales</h2>
           <?php          
            session_start();
            //echo $_SESSION['tipo'];
            $contador = 1;
            $contador2 = 1;   
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
                print("<img class='card-img-top' src=\" " . $local[4] . " \" />");
                //empieza cuerpo
                print("<div class='card-body'>");
                //empieza primer parrafo
                print("<p class='card-text'> NOMBRE: " . $local[1] . "</p>");
                print("<p class='card-text'> DIRECCION: " . $local[2] . "</p>");
                print("<p class='card-text'> AFORO: " . $local[3] . "</p>");?>
                <a class='btn btn-primary' href='formularioActualLocal.php?codigo=<?php echo $local[0]  ?>'><i class="fa fa-pencil fa-fw"></i> Modificar </a>
                <a  class='btn btn-danger' href='' onclick="javascript:if (!funcion_confirmar('eliminaLocalEmpresa.php?accion=eliminaLocal&codigo=<?php echo $local[0] ?>'))return false "> <i class="far fa-trash-alt"></i> Eliminar</a>                       
                <?php
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
                $contador2++;
            endforeach;
            print("</div>");
            ?>     
        </div>
    </body>
</html>
