<?php
$host = "localhost";
$usuario = "root";
$contrasena = "123456";
$base_de_datos = "crud2024";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
