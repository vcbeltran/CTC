<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ('consultasLocales.php');

$id = $_REQUEST['codigo'];

$consultaLocal = new ConsultasLocales();

if($consultaLocal->borrarLocal($id)){
    header("location:editarLocal.php");
}
