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
        <?php
        include './consultasEmpresas.php';
        $consulta = new consultasEmpresas();
        
        $codigo = $_REQUEST['codigo'];
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $contra = $_REQUEST['contra'];
        $local = $_REQUEST['idlocal'];
        
           var_dump($codigo);
              var_dump($nombre);
                 var_dump($correo);
                    var_dump($contra);
        var_dump($local);
        if ($consulta->actualizarEmpresa($codigo, $nombre, $correo, $contra, $local)){
         echo "ha ido bien"   ;
        }        else {
            echo "ha ido como el culito";
        }
        
        ?>
    </body>
</html>
