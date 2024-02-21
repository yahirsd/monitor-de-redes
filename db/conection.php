<?php
// Datos de conexión
$host = "localhost"; // Puede ser "127.0.0.1" también
$usuario = "root";
$contraseña = "root";
$basedatos = "admonbd"; // Cambia esto al nombre de tu base de datos

// Crear una conexión
$conexion = new mysqli($host, $usuario, $contraseña, $basedatos);

// Verificar si la conexión fue exitosa
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
} else {
    echo "Conexión exitosa a la base de datos: " . $basedatos;
}


?>
