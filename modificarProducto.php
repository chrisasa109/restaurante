<?php
require_once("./gestionSesion.php");
$numProductosEliminar =(int) $_POST["numEliminar"];
$codProductoModificar = $_POST["cod_producto"];
$_SESSION["carrito"][$codProductoModificar]-=$numProductosEliminar;
if($_SESSION["carrito"][$codProductoModificar]<=0){
    unset($_SESSION["carrito"][$codProductoModificar]);
}
header("Location:carrito.php");