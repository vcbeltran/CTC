        <?php

        include 'consultasEmpresas.php';
        
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['mail'];
        $password = md5($_REQUEST['contra']);
        
        $consultaEmpresa = new ConsultasEmpresas();
        
        if ($consultaEmpresa->altaEmpresa($nombre, $correo, $password)){
            echo "Alta dada";
        } else {
            echo "error";
        }
        
        
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
        <title></title>
    </head>
    <body>

    </body>
</html>
