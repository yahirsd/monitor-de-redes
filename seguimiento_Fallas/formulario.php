<?php
$nombre = $_POST['nombre']; // Obtén el valor del campo 'nombre' del formulario
$apellido = $_POST['apellido']; // Obtén el valor del campo 'apellido' del formulario
$estado = '0'; // Obtén el valor del campo 'email' del formulario

// Consulta SQL para insertar datos
$sql = "INSERT INTO Students (name, lastname, email) VALUES ('$nombre', '$apellido', '$estado')";

if (mysqli_query($conn, $sql)) {
    echo "Registro insertado correctamente";
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
}

// Cierra la conexión
mysqli_close($conn);
?>
