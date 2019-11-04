<?php
    include ('../consultas/consultasEmpresas.php');
    
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
        <?php include ('../includes/include.php'); ?>       
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
                            print("<td scope='row'>"
                                    . "<a class='btn btn-primary' href='formularioEditarEmpresa.php?codigo=" . $empresa[3] . " '><i class=\"fa fa-pencil fa-fw\"></i>  Modificar </a>" . " "
                                    . "<a href='eliminaLocalEmpresa.php?accion=eliminaEmpresa&codigo=". $empresa[3] ." ' class='btn btn-danger' ><i class=\"far fa-trash-alt\"></i> Eliminar</a>"
                                    . "</td>");
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
