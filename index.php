<?php

/* 
 * Clase que guía según el usuario muestra una página u otra
 * Es el controlador frontal y va cargando un página u otra
 */

session_start();

/* LOGIN */
if (!isset($SESSION['tipo'])){
    
      include_once 'index.php';     
      
}

