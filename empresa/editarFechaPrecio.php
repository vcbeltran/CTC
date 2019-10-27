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
        <script src="https://use.fontawesome.com/9572130963.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Edite los datos de su Empresa</title>
    </head>
    <body>
       <script>
        $(document).ready(function(){
            $(document).on('click', 'button[data-id]', function(e){ 
                e.preventDefault();
                var requested_to = $(this).attr('data-id');
                
                swal({
                  title: "Está seguro?",
                  text: "El elemento será borrado!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                }) 
                .then((willDelete) => {
                if (willDelete) {
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
                } else {
                  swal("Your imaginary file is safe!");
                }
                });                
            });
        });
        </script>
        <?php
        include ('../consultas/consultasLocalFechaPrecio.php');
        session_start();
        //$idLocal = $_SESSION['local'];
        //var_dump($idLocal);
        //Consulto la lista de fechas precio disponibles para mi local
        $datosFechaPrecio = new consultasLocalFechaPrecio();
        $recuperaDatos = array();
        $recuperaDatos = $datosFechaPrecio->recuperaDatosLocalFechaPrecio($idLocal);
        //var_dump($recuperaDatos);        
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#A9F5A9;">
                    <a class="navbar-brand" href="menuEmpresa.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Vuelva al menú Empresa</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($recuperaDatos as $datos): ?>                         
                            <td scope="row"><?php echo date("d/m/Y", strtotime($datos[1])) ?></td>
                            <td><?php echo $datos[2] ?></td>
                            <td><?php echo $datos[3] ?></td>
                            <td><?php echo $datos[4] ?></td>                 
                            <td>                          
                                <a class="btn btn-primary" href='fomularioModificarFechaPrecio.php?codigo=<?php echo $datos[0] ?>'><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-danger" data-id="<?php $datos[0] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
