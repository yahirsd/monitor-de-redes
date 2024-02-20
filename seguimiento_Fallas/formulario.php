<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    
    $conexion = new mysqli("localhost", "angel", "root", "fallas");

 
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Inserta los datos en la tabla "fallas"
    $sql = "INSERT INTO fallas (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    if ($conexion->query($sql) === TRUE) {
        echo "Registrado correctamente";
    } else {
        echo "Error al registrar " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>
