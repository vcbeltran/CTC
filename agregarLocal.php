<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ('consultasLocales.php');
//start_session();
// if (!isset($_SESSION['tipo'])) {
//    header("location:inicio.php");
//}
$nombre = strtoupper($_REQUEST['nombre']);
$direccion = strtoupper($_REQUEST['direccion']);
$aforo = $_REQUEST['aforo'];
$consultas = new ConsultasLocales();

    $caratula;
    if (is_uploaded_file($_FILES['caratula']['tmp_name'])) {
        if (!is_dir("imagenes/"))
            mkdir("imagenes/");
        $destino = "imagenes/";
        $caratula = $destino.$_FILES['caratula']['name'];
        if (!is_file($caratula)) {
            move_uploaded_file($_FILES['caratula']['tmp_name'], $caratula);
            echo "fichero movido";
        } else {
            echo "no se ha podido mover el fichero ya existe";
        }
    }
    
    if ($consultas->annadirLocal($nombre, $direccion, $aforo, $caratula)){
        echo "Añadido correctamente";
    } else {
        echo "Ha fallado";
    }

