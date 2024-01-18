<?php
session_start();
$error = '';

if (isset($_POST['usuario'], $_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    require './conexionBBDD.php';
    if ($datosUsuario = (new Conexion())->inicioSesion($usuario, $password)) {
        $_SESSION['usuario'] = $datosUsuario;
        header("Location: ./categorias.php");
    } else {
        $error = 'Usuario y/o contraseña incorrecta.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="./resources/logo.png">
</head>

<body>
    <h1>Inicio de sesión</h1>
    <p>Nota: restaurante@gmail.com || 123abc</p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" placeholder="Usuario" id="usuario" required>
        <br>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <br>
        <input type="submit" value="Iniciar sesión" name="iniciarSesion" id="iniciarSesion">
    </form>
    <?php if ($error != '') : ?>
            <p style='color:red'>
                <?= $error ?>
            </p>
        <?php endif ?>
</body>

</html>