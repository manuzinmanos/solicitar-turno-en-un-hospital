<?php
$host = 'localhost';
$usuario = 'id20691374_manuchomoren0';
$contrasena = 'Garfield2.0';
$base_de_datos = 'id20691374_hospital';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>