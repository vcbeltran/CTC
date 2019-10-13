<?php
    include ('consultasLocales.php');
    
    $id = $_REQUEST[];
    $nombre = strtoupper($_REQUEST['nombre']);
    $direccion = strtoupper($_REQUEST['direccion']);
    $aforo = $_REQUEST['aforo'];
    $consultas = new ConsultasLocales();

    $caratula;
    if (is_uploaded_file($_FILES['caratula']['tmp_name'])) {
        if (!is_dir("imagenes/"))
            mkdir("imagenes/");
        $destino = "imagenes/";
        $caratula = $destino . $_FILES['caratula']['name'];
        if (!is_file($caratula)) {
            move_uploaded_file($_FILES['caratula']['tmp_name'], $caratula);
            $consultas->actualizarLocalConFoto( $nombre, $direccion, $aforo, $caratula);
        }
        $consultas->actualizarLocalSinFoto($id, $nombre, $direccion, $aforo);
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
        <?php
        // put your code here
        ?>
    </body>
</html>
