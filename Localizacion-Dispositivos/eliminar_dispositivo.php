<?php
// Verificar si se ha recibido un ID válido para eliminar
if(isset($_POST['id']) && !empty($_POST['id'])) {
    $servername = "localhost";
    $username = "root";
<<<<<<< HEAD
    $password = "root";
    $dbname = "admonbd";
=======
    $password = "Moisescr7";
    $dbname = "redes";
>>>>>>> 0c6ac6ae9e32da4d9ca01a568a11c7cddf3b652b

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del dispositivo a eliminar
    $id = $_POST['id'];

    // Preparar y ejecutar la consulta SQL para eliminar el dispositivo
    $sql = "DELETE FROM dispositivos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Dispositivo eliminado correctamente";
    } else {
        echo "Error al eliminar dispositivo: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se recibe un ID válido, mostrar un mensaje de error
    echo "ID de dispositivo no válido";
}
?>
