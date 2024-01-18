<?php
require_once('./gestionSesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="icon" type="image/x-icon" href="./resources/logo.png">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php require "./cabecera.php"; ?>
    <h1>Listado de categorías</h1>
    <?php
    $flecha = '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>';
    require "./conexionBBDD.php";
    $resultado = (new Conexion())->mostrarCategorias();
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Descripción</th></tr>";
    foreach ($resultado as $categoria) {
        echo "<tr><td>" . $categoria['nombre'] . "</td><td>" . $categoria['descripcion'] . "</td>";
        echo "<td><a href='./productos.php?categoria=$categoria[cod_categoria]'>Ver productos</a></td></tr>";
    }
    echo "</table>";
    ?>
</body>

</html>