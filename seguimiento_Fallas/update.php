<?php
include("../db/conection.php");
//id del usuario a eliminar
$id = $_GET["id"];
//datos del usuario a editar
$nombre = $_GET["nombre"];
$descripcion = $_GET["descripcion"];

$sql = "UPDATE tabla_fallas SET nombre='{$nombre}', descripcion='{$descripcion}' WHERE id={$id}";

if ($conexion->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}
header("Location: ./Fallas_main.php");
// Cerrar conexión
$conexion->close();
?>
