<?php
include("../db/conection.php");

// Obtener el ID del usuario a eliminar
$id_a_eliminar = $_GET['id']; // Suponiendo que el ID se pasa como parámetro GET
$ruta = $_GET["ruta"];

// Consulta SQL para eliminar el usuario
$sql = "DELETE FROM planes WHERE id = $id_a_eliminar";

if ($conexion->query($sql) === TRUE) {
  echo "El usuario con ID $id_a_eliminar ha sido eliminado correctamente.";
} else {
  echo "Error al eliminar usuario: " . $conn->error;
}

unlink("C:/xampp/htdocs/files/".$ruta);

header("Location: ./planes.php");
// Cerrar conexión
$conexion->close();
