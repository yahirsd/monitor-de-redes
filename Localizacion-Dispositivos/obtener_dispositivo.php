<?php
if(isset($_POST['id']) && !empty($_POST['id'])) {
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

    // Obtener el ID del dispositivo
    $id = $_POST['id'];

    // Consulta SQL para obtener los datos del dispositivo
    $sql = "SELECT dispositivo, ip, ubicacion FROM dispositivos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del dispositivo
        $row = $result->fetch_assoc();
        // Devolver los datos como respuesta JSON
        echo json_encode($row);
    } else {
        echo "Dispositivo no encontrado";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de dispositivo no válido";
}
?>
