<?php
/*El objetivo de este archivo es que no se pueda acceder a ninguna sección de la página
sin haber iniciado sesión primero*/
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?redirigido=true");
}