<?php
require_once('./gestionSesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link rel="icon" type="image/x-icon" href="./resources/logo.png">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php require "./cabecera.php"; ?>
    <h1>Listado de productos</h1>
    <?php
    if (isset($_GET['categoria'])) {
        $id_categoria = $_GET['categoria'];
        require_once "./conexionBBDD.php";
        $resultado = (new Conexion())->mostrarProductos($id_categoria);
        if ($resultado == false) {
            echo "<p style='color: red'>Error en la consulta de la base de datos.</p>";
        } else {
            echo "<table>";
            echo "<tr><th>Producto</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Unidades</th></tr>";
            foreach ($resultado as $producto) {
                echo "<tr><td>$producto[nombre]</td><td>$producto[descripcion]</td><td>$producto[peso]</td><td>$producto[stock]</td>";
                echo "<td><form action='agregarProducto.php' method='post'><input type='number' name='numProductos' min='1' required></td>";
                echo "<td><input type='hidden' name='cod_producto' value='$producto[cod_producto]'><input type='submit' value='Agregar al carrito'></td>";
                echo "</form></tr>";
            }
            echo "</table>";
        }
    } else {
        echo "<p style='color: red'>Error para seleccionar los productos en base a la categoría.</p>";
    }
    ?>
</body>

</html>