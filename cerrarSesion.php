<?php
session_name('NOMBRE_SESION');
session_start();
require_once('./gestionSesion.php');
session_destroy();
header('Location:index.php');