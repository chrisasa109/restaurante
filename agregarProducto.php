<?php
require_once "./gestionSesion.php";
$cod_producto = $_POST["cod_producto"];
$unidades = (integer)$_POST["numProductos"];
if(isset($_SESSION["carrito"][$cod_producto])){
    $_SESSION["carrito"][$cod_producto] += $unidades;
}else{
    $_SESSION["carrito"][$cod_producto] = $unidades;
}
header("Location: carrito.php");