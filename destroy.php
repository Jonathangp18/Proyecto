<?php
include ('conexion_bd.php');
session_start();
session_destroy();
header('location: ingresar.php');
?>