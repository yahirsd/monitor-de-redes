<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="../styles/planes.css">
  <title>Planes</title>
</head>

<body>

  <?php
  include("../db/conection.php")
  ?>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Estas seguro que deseas borrar el archivo</p>
      <button>OK</button>
    </div>
  </div>

  <header>
    <nav>
      <ul>
        <li><a href="#network">Localizar Dispositivos</a></li>
        <li><a href="../Redes-inventarios/inventarioG.html">Inventario</a></li>
        <li><a href="#Prevención">Planes de Prevención</a></li>
        <li><a href="../seguimiento_Fallas/Fallas_main.html">Seguimiento de Fallas</a></li>
        <li><a href="#Configuraciones">Configuraciones</a></li>
      </ul>
    </nav>
    <h1>Planes de prevencion</h1>
  </header>

  <main class="container">

    <aside class="aside">
      <form enctype="multipart/form-data" method="post" class="form">
        <legend class=form__legend>Agregar un nuevo registro</legend>
        <div class="field">
          <label for="input-name" class="ha-screen-reader">Nombre</label>
          <input id="input-name" class="field__input" name="name" placeholder="Archivo Falla">
          <span class="field__label-wrap" aria-hidden="true">
            <span class="field__label">Nombre</span>
          </span>
        </div>

        <div class="field">
          <label for="input-description" class="ha-screen-reader">Descripcion</label>
          <input id="input-description" class="field__input" name="description" placeholder="Falla ejemplo">
          <span class="field__label-wrap" aria-hidden="true">
            <span class="field__label">Descripcion</span>
          </span>
        </div>

        <div>
          <label for="input-file">Archivo</label>
          <input type="file" id="input-file" name="file" />
        </div>
        <button type="submit" id="button-add-file">Agregar</button>
      </form>

    </aside>

    <section class="table-container">

      <div class="field">
        <label for="input-search" class="ha-screen-reader">Buscar</label>
        <input id="input-search" class="field__input" placeholder="Busqueda por: id, nombre o fecha" onkeyup="search()">
        <span class="field__label-wrap" aria-hidden="true">
          <span class="field__label">Buscar</span>
        </span>
      </div>


      <table class="table">
        <thead class="table__head">
          <tr class=table__row>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Accion</th>
          </tr>
        </thead>

        <tbody id="table-body" class="table__body">
          <tr class=table__row>
            <th>1</th>
            <td>Archivo</td>
            <td>Este es un ejemplo de una escripcion</td>
            <td>20/20/20</td>
            <td><button id="openModalBtn">Eliminar</button>
            </td>
          </tr>

          <tr class=table__row>
            <th>1</th>
            <td>Archivo</td>
            <td>
              Este es un ejemplo de una escripcion, texto aleatorio para ver que la table si
              colapse cuando tiene que colapsar y que no desborda el texto
            </td>
            <td>20/20/20</td>
            <td><a href="#">Eliminar</a></td>
          </tr>

          <tr class=table__row>
            <th>1</th>
            <td>Archivo</td>
            <td>Este es un ejemplo de una escripcion</td>
            <td>20/20/20</td>
            <td><a href="#">Eliminar</a></td>
          </tr>
        </tbody>
      </table>

    </section>
  </main>

</body>

<script src="busqueda.js"></script>

</html>
<?php
if (isset($_POST["name"]) and isset($_POST["description"])) {
  $nombre = $_POST["name"];
  $descripcion = $_POST["description"];
  $ruta = "file";

  // Consulta de inserción
  $sql = "INSERT INTO planes (nombre, descripcion, ruta) VALUES (?, ?, ?)";

  if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("sss", $nombre, $descripcion, $ruta);
    if ($stmt->execute()) {
      upLoadFile();
      echo "Inserción exitosa en la tabla 'planes'.";
    } else {
      echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Error al preparar la consulta: " . $conexion->error;
  }

  // Cierra la conexión al finalizar
  $conexion->close();
}



function upLoadFile()
{
  $dir_subida = 'files/';
  $fichero_subido = $dir_subida . basename($_FILES['file']['name']);

  echo '<pre>';
  if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
  } else {
    echo "¡Posible ataque de subida de ficheros!\n";
  }

  echo 'Más información de depuración:';
  print_r($_FILES);

  print "</pre>";
}
?>
