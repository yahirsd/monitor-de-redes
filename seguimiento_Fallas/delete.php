<?php
include("../db/conection.php");

// Obtener el ID del usuario a eliminar
$id_a_eliminar = $_GET['id']; // Suponiendo que el ID se pasa como parámetro GET

// Consulta SQL para eliminar el usuario
$sql = "DELETE FROM tabla_fallas WHERE id = $id_a_eliminar";

if ($conexion->query($sql) === TRUE) {
  echo "El usuario con ID $id_a_eliminar ha sido eliminado correctamente.";
} else {
  echo "Error al eliminar usuario: " . $conn->error;
}

header("Location: ./Fallas_main.php");
// Cerrar conexión
$conexion->close();
