<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="../styles/planes.css">
  <title>Planes</title>
</head>

<body>
  <nav>
    <ul>
      <li><a href="#network">Localizar Dispositivos</a></li>
      <li><a href="#Inventario">Inventario</a></li>
      <li><a href="#Prevención">Planes de Prevención</a></li>
      <li><a href="../seguimiento_Fallas/Fallas_main.html">Seguimiento de Fallas</a></li>
      <li><a href="#Configuraciones">Configuraciones</a></li>
    </ul>
  </nav>

  <div class="content">
    <h1>planes de prevencion</h1>
    <!-- Contenido de la página -->
    <div class="cajita">
      <?php
      for ($num1 = 1; $num1 <= 200; $num1++) {
        echo '
        <div id="item1" class="items">
         <h2>'.$num1.'item</h2>
       </div>';
      }
      ?>

    </div>
  </div>
</body>

</html>