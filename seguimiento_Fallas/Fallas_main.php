<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../styles/fallasEstilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localización de Dispositivos</title>
</head>

<body>
    <?php
    include('../db/conection.php');
    ?>
    <!--cd-->
    <header class="encabezado">

        <nav>
            <ul>

                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../Localizacion-Dispositivos/Dispositivos.html">Localizar Dispositivos</a></li>
                <li><a href="../Redes-Inventario/">Inventario</a></li>
                <li><a href="../planes/">Planes de Prevención</a></li>
                <li><a href="../seguimiento_Fallas/">Seguimiento de Fallas </a></li>
                <li><a href="#report">Configuraciones</a></li>
            </ul>
        </nav>

        <h1> Seguimiento de fallas </h1>
    </header>

    <div class="contenedor">
        <div class="divFormulario">
            <h2> Formulario </h2>

            <form action="" method="get" id="formulario">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre de la falla" required>
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripción de la falla" required>
                <button type="submit" id="btnAgregar">Agregar</button>
            </form>
        </div>

        <div class="divListado">
            <h2> Lista de Fallas </h2>
            <div class="div-fallas">
                <?php
                // Verificar si la conexión fue exitosa
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consulta SELECT
                $sql = "SELECT id, nombre, descripcion, estado FROM tabla_fallas";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Imprimir los resultados
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<p>ID: " . $fila["id"] . " - Nombre: " . $fila["nombre"] . " - Descripción: " . $fila["descripcion"] . " - Estado: " . ($fila["estado"] ? "Activo" : "Inactivo");
                        echo "<button class='btn-eliminar btn eliminar' eliminar='./delete.php?id={$fila["id"]}'>Eliminar</button>";
                        echo "<button editar='' class='btn-editar btn'>editar</button>";
                        echo "</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "No se encontraron resultados en la tabla 'tabla_falllas'.";
                }

               
                
                ?>
            </div>
        </div>
    </div>
    <!-- <script src="../seguimiento_Fallas/app.js"></script>-->

    <?php
    if (isset($_GET["nombre"])) {

        // Datos para la inserción
        $nombre = $_GET["nombre"];
        $descripcion = $_GET["descripcion"];

        $estado = 0; // true para activo, false para inactivo

        // Consulta de inserción
        $sql = "INSERT INTO tabla_fallas (nombre, descripcion, estado) VALUES (?, ?, ?)";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("sss", $nombre, $descripcion, $estado);
            if ($stmt->execute()) {
                echo "Inserción exitosa en la tabla 'fallas'.";
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conexion->error;
        }

        header("Location: ./Fallas_main.php");
        // Cierra la conexión al finalizar
        $conexion->close();
    }

    ?>

<script>
  const linkDelete = document.querySelectorAll(".eliminar");
  linkDelete.forEach(element =>{ 
    element.addEventListener("click",event => {
      event.defaultPrevented;
      if(confirm("Estas Seguro de que deseas eliminar este archivo?")){
       window.location.href = element.getAttribute("eliminar");
      }else{

      }
    });
  });
</script>
</body>

</html>