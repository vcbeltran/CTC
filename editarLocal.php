<?php
    include ('consultasLocales.php');
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Menú de edición local</title>
    </head>
    <body>
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
            echo $_SESSION['tipo'];
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
                print("<img class='card-img-top' src=\" " . $local[4] . " \" />");
                //empieza cuerpo
                print("<div class='card-body'>");
                //empieza primer parrafo
                print("<p class='card-text'> NOMBRE: " . $local[1] . "</p>");
                print("<p class='card-text'> DIRECCION: " . $local[2] . "</p>");
                print("<p class='card-text'> AFORO: " . $local[3] . "</p>");
                print("<a class='btn btn-primary' href='formularioActualLocal.php?codigo=" . $local[0] . " '> Modificar </a>" . " "
                        . "<a href='eliminaLocal.php?codigo=". $local[0] ." ' id='botonEliminar' class='btn btn-primary' >Eliminar</a>");
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
        <script>
            $('#botonEliminar').click(function(){
                    swal({
                       title: "Are you sure?",
                       text: "You will not be able to recover this imaginary file!",
                       type: "warning",
                       showCancelButton: true,
                       confirmButtonClass: "btn-danger",
                       confirmButtonText: "Yes, delete it!",
                       cancelButtonText: "No, cancel plx!",
                       closeOnConfirm: false,
                       closeOnCancel: false
                     },
                     function(isConfirm) {
                       if (isConfirm) {
                         swal("Deleted!", "Your imaginary file has been deleted.", "success");
                       } else {
                         swal("Cancelled", "Your imaginary file is safe :)", "error");
                       }
                     });
            });
        </script> 
            </div>
    </body>
</html>
