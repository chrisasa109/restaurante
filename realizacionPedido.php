<?php
require_once('./gestionSesion.php');
require_once('./conexionBBDD.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="icon" type="image/x-icon" href="./resources/logo.png">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php require "./cabecera.php"; ?>
    <h1>Pedido</h1>
    <?php
    //Acceder al código del restaurante
    $restaurante = $_SESSION["usuario"]->cod_restaurante;
    $resultado = (new Conexion())->procesarPedido($restaurante, $_SESSION["carrito"]);
    if($restaurante==true){
        $_SESSION["carrito"]=[];//vaciar el carrito en session
        echo "<h2>Pedido relizado correctamente.</h2>";
    }else{
        echo "<h2>El pedido no se ha podido realizar.</h2>";
    }

    ?>
</body>

</html>