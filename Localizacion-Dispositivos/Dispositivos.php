<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../styles/DispositivosEstilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localización de Dispositivos</title>
    <style>
        .eliminar-btn {
            background-color: #ff6666;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <script>
        // Recargar la página después de que se envíe el formulario
        document.getElementById('formulario').addEventListener('submit', function() {
            location.reload();
        });
    </script>
    <!--cd-->
    <header class="encabezado">

        <nav>
            <ul>

                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../Localizacion-Dispositivos/Dispositivos.html">Localizar Dispositivos</a></li>
                <li><a href="../Redes-Inventario/">Inventario</a></li>
                <li><a href="../planes/">Planes de Prevención</a></li>
                <li><a href="../seguimiento_Fallas/">Seguimiento de Fallas </a></li>
            </ul>
        </nav>

        <h1> Dispositivos </h1>
    </header>

    <div class="contenedor">


    <div class="contenedor">
        <div class="divListado">
            <h2> Localizacion de Dispositivos </h2>
            <div class="div-fallas">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
<<<<<<< HEAD
                $dbname = "admonBD";
=======
                $dbname = "redes";
>>>>>>> 0c6ac6ae9e32da4d9ca01a568a11c7cddf3b652b

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Comprobar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta SQL para obtener los datos de la tabla dispositivos
                $sql = "SELECT id, dispositivo, ip, ubicacion FROM dispositivos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en forma horizontal
                    echo "<div class='datos'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . $row["dispositivo"] . " - " . $row["ip"] . " - " . $row["ubicacion"] . " <button class='eliminar-btn' onclick='eliminarDispositivo(" . $row["id"] . ")'>Eliminar</button></p>";
                    }
                    echo "</div>";
                } else {
                    echo "No hay datos";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </div>
        </div>

        <div class="divFormulario">
            <h2 style="color: aliceblue; margin:5%"> Formulario </h2>

            <form action="#" method="post" id="formulario" accept-charset="UTF-8">
                <input type="text" id="dispositivo" name="dispositivo" placeholder="Dispositivo">
                <input type="text" id="ip" name="ip" placeholder="Dirección IP">
                <input type="text" id="ubicacion" name="ubicacion" placeholder="Ubicación">
                <button class="btnAgregar" type="submit" id="btnAgregar">Agregar</button>
            </form>
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
<<<<<<< HEAD
    $password = "root";
    $dbname = "admonBD";
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

    // Obtener datos del formulario
    $dispositivo = $_POST['dispositivo'];
    $ip = $_POST['ip'];
    $ubicacion = $_POST['ubicacion'];

    // Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO dispositivos (dispositivo, ip, ubicacion) VALUES ('$dispositivo', '$ip', '$ubicacion')";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la misma página para evitar la duplicación de datos
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error al enviar datos a la base de datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
        </div>
    </div>

    <script>
        // Recargar la página después de que se envíe el formulario
        document.getElementById('formulario').addEventListener('submit', function() {
            location.reload();
        });
    </script>

<script>
        function eliminarDispositivo(id) {
            if (confirm("¿Estás seguro que deseas eliminar este dispositivo?")) {
                // Realizar una petición AJAX para eliminar el dispositivo de la base de datos
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../Localizacion-Dispositivos/eliminar_dispositivo.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Recargar la página después de eliminar el dispositivo
                        location.reload();
                    }
                };
                xhr.send("id=" + id);
            }
        }
    </script>

</body>

</html>