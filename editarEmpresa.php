<?php
    include ('consultasEmpresas.php');
    
    session_start();
    if (!isset($_SESSION)) {
        header("location:inicio.php");
    }
    $consultaEmpresa = new consultasEmpresas();
    $listaEmpresa = array();
    
    $listaEmpresa = $consultaEmpresa->consultaUsuarioEmpresa();    
    //var_dump($_SESSION['tipo']);
    //var_dump($listaEmpresa[1]);
    //var_dump($listaEmpresa);
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
        <title>Lista de empresas</title>
    </head>
    <body>
        <div class="container mt-5">
             <h2>Lista de Empresas</h2>
            <div class="table-responsive-md">            
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Local Asignado</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaEmpresa as $empresa):
                            print("<tr>");
                            print("<td scope='row'>" . $empresa[0]);
                            print("</td>");
                            print("<td scope='row'>" . $empresa[1]);
                            print("</td>");
                            print("<td scope='row'>" . $empresa[2]);
                            print("</td>");
                            print("<td scope='row'><a class='btn btn-primary' href='formularioEditarEmpresa.php?codigo=" . $empresa[3] . " '> Modificar </a>" . " "
                                . "<a href='eliminaLocalEmpresa.php?accion=eliminaEmpresa&codigo=". $empresa[3] ." ' class='btn btn-danger' >Eliminar</a></td>");
                            print("</tr>");
                        endforeach;
                        ?> 
                    </tbody>
                </table>          
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="menuAdministrador.php">Vuelva al menú de administrador</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </body>
</html>
