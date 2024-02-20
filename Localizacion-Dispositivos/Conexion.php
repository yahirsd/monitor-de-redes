<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Moisescr7";
$dbname = "redes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$device = $_POST['device'];
$ip = $_POST['ip'];
$location = $_POST['location'];

// Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO dispositivos (idDispositivos, Dispositivo, IP, Ubicacion) VALUES ('1','$device', '$ip', '$location')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>