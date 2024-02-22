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

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar</h2>
            <form action="./update.php" method="get"></form>
            <label for="editar-nombre">Nombre</label>
            <input type="text" id="editar-nombre" name="editar-nombre" />

            <label for="editar-descripcion">Descripcion</label>
            <input type="text" id="editar-descripcion" name="editar-descripcion" />

            <button id="button_Editar" type="submit">editar</button>
        </div>
    </div>

    <header class="encabezado">

        <nav>
            <ul>

                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../Localizacion-Dispositivos/Dispositivos.html">Localizar Dispositivos</a></li>
                <li><a href="../Redes-Inventario/inventarioG.html">Inventario</a></li>
                <li><a href="../planes/planes.php">Planes de Prevención</a></li>
                <li><a href="../seguimiento_Fallas/Fallas_main.php">Seguimiento de fallas</a></li>

            </ul>
        </nav>

        <h1> Seguimiento de fallas </h1>
    </header>

    <div class="contenedor">
        <div class="divFormulario">
            <h2> Formulario </h2>

            <form action="" method="get" id="formulario" accept-charset="UTF-8">
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
                        echo "<button id='{$fila["id"]}' nombre='{$fila["nombre"]}' descripcion='{$fila["descripcion"]}' class='btn-editar btn'>editar</button>";
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
        var id;
        var nombre;
        var descripcion;

        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModalBtn");
        var span = document.getElementsByClassName("close")[0];

        const input_editar_nombre = document.getElementById("editar-nombre");
        const input_editar_descripcion = document.getElementById("editar-descripcion");

        const linkDelete = document.querySelectorAll(".eliminar");
        linkDelete.forEach(element => {
            element.addEventListener("click", event => {
                event.defaultPrevented;
                if (confirm("¿Estas seguro que deseas eliminar este registro?")) {
                    window.location.href = element.getAttribute("eliminar");
                } else {

                }
            });
        });


        const buttonEdit = document.querySelectorAll(".btn-editar");

        buttonEdit.forEach(element => {
            element.addEventListener("click", event => {
                modal.style.display = "block";
                input_editar_nombre.value = element.getAttribute("nombre");
                input_editar_descripcion.value = element.getAttribute("descripcion");

                id = element.getAttribute("id");
                nombre = element.getAttribute("nombre");
                descripcion = element.getAttribute("descripcion");

            });
        });

        const buttonUpdate = document.getElementById('button_Editar');
        buttonUpdate.addEventListener("click", event => {
            nombre = input_editar_nombre.value;
            descripcion = input_editar_descripcion.value;
            window.location.href = "./update.php?id=" + id + "&nombre=" + nombre + "&descripcion=" + descripcion;
        });


        // Cuando se haga clic en (x), cerrar el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cuando se haga clic fuera del modal, cerrarlo
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>