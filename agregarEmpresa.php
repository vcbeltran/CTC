<?php 
    include ('consultasEmpresas.php');
    
    $nombre = $_REQUEST['nombre'];
    $mail = $_REQUEST['mail'];
    $contra = $_REQUEST['contra'];
    $local = $_REQUEST['local'];
    
    $altaEmpresa = new consultasEmpresas();
    
    if($altaEmpresa->altaRolEmpresa($nombre, $mail, $contra, $local)){
        echo "ha ido bien";
    } else {
        echo "algo ha fallado";
    }
?>


<!DOCTYPE html>
<!--
Pagina que da de alta los datos introducidos en el formularioAltaEmpresa, asignándole un local y 
dando un usuario nuevo de empresa para que pueda acceder a su local
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
