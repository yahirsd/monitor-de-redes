<?php
session_start();
if (isset($_SESSION['error'])) {
  if ($_SESSION['error'] == "repeat") {
    echo '<script>alert("Error la persona ingresada ya tiene algo prestado!");</script>';
  }
  if ($_SESSION['error'] == "missing") {
    echo '<script>alert("Error casilla vacia detectada!");</script>';
  }
  if ($_SESSION['error'] == "number") {
    echo '<script>alert("Error cantidad invalida!");</script>';
  }
  unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
  if ($_SESSION['success'] == "borrow") {
    echo '<script>alert("Dispositivo prestado!");</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/inventory.css">
  <title>Vista General del Inventario</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    nav {
      background-color: #333;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      text-align: center;
      /* Centra los elementos */
    }

    nav ul li {
      display: inline-block;
      /* Muestra los elementos en línea horizontal */
    }

    nav ul li a {
      display: block;
      color: white;
      text-decoration: none;
      padding: 15px 20px;
    }

    nav ul li a:hover {
      background-color: #555;
    }

    .content {
      padding: 20px;
    }
  </style>
</head>

<body>

  <nav>
    <ul>
    <li><a href="../index.html">Inicio</a></li>
        <li><a href="../Localizacion-Dispositivos/Dispositivos.php">Localizar Dispositivos</a></li>
        <li><a href="../Redes-Inventario/inventarioG.php">Inventario</a></li>
        <li><a href="../planes/planes.php">Planes de Prevención</a></li>
        <li><a href="../seguimiento_Fallas/Fallas_main.php">Seguimiento de fallas</a></li>
    </ul>
  </nav>
  <div class="title">
    <h3 class='title-separator'>Inventario General</h3>
  </div>
  <div class="table-container">
    <table>
      <?php
      include_once("sql/sqlQuery.php");
      $op = new SQLModel();
      $op->getViewerList();
      ?>
    </table>
  </div>
  <script src="crud/JS/noLess.js"></script>
</body>

</html>