<?php
require 'includes/conf.php';
include 'clases/conexion.php';
include 'clases/usuario.php';
include 'clases/empresas.php';
include 'clases/productos.php';
include 'clases/pedidos.php';
//Si existe la sesion redirigir a la pagina de miembros
session_start();
if(!isset($_SESSION["memberID"]) ) {
    header("Location: ../index.html");
} 
$usu_ario = $_SESSION["user_name"];
$userId = $_SESSION["memberID"];
$permiso = $_SESSION["permiso"];
$descripcion = $_SESSION["descripcion"];

// Charge the clases & nav variables
include('tops_include.php');

// Include the header pages
include('header.php');

include('navigation.php');

// body for each page
if(!empty($_GET["page"])){ 
    $pages = $_GET["page"]; 
} else {
    $pages = 'index';
}
//if(!empty($_GET["id"])){
//    include($descripcion.'/'.$pages.'.php&id='.$usId);
//}
include($descripcion.'/'.$pages.'.php');



include('footer.php'); 
 
 ?>