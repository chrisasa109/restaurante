<?php
require_once("./gestionSesion.php");
require_once("./conexionBBDD.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="icon" type="image/x-icon" href="./resources/logo.png">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php require "./cabecera.php"; ?>
    <h1>Carrito de la compra</h1>
    <?php
    if(empty($_SESSION["carrito"])){
        echo "<p>No hay ningún producto agregado al carrito</p>";
        exit(); //si no hay productos que no se ejecute el resto del código
    }
    //Para comprobar que el codigo y las unidades se están pasando bien mediante session:
    //print_r($_SESSION["carrito"]);
    //Pasar un array con los IDs de los productos que están en los carritos
    $productos = (new Conexion())->obtenerProductosCarrito(array_keys($_SESSION["carrito"]));
    if ($productos == false) {
        echo "<p style='color: red'>Error en la consulta de la base de datos.</p>";
    }else{
        echo"<table><tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th></tr>";
        foreach($productos as $producto){
            $unidades = $_SESSION["carrito"][$producto["cod_producto"]];
            echo"<tr><td>$producto[nombre]</td><td>$producto[descripcion]</td><td>$producto[peso]</td><td>$unidades</td>
            <td><form action='modificarProducto.php' method='POST'>
            <input type='number' name='numEliminar' min='1' value='1'>
            <input type='hidden' name='cod_producto' value='$producto[cod_producto]'>
            <input type='submit' value='Eliminar'>
            </form></td></tr>";
        }
        echo"</table>";
        echo "<form action='realizacionPedido.php'><input type='submit' name='relizarPedido' value='Realizar pedido'></form>";
    }
    ?>
</body>

</html>