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
  <nav>
    <ul>
      <li><a href="#network">Localizar Dispositivos</a></li>
      <li><a href="../Redes-inventarios/inventarioG.html">Inventario</a></li>
      <li><a href="#Prevención">Planes de Prevención</a></li>
      <li><a href="../seguimiento_Fallas/Fallas_main.html">Seguimiento de Fallas</a></li>
      <li><a href="#Configuraciones">Configuraciones</a></li>gd
    </ul>
  </nav>

  <div class="content">
    <h1>planes de prevencion</h1>
    <h1>Buscar en el contenido de una tabla</h1>
    <form>
      Texto a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
    <table id="datos">
      <tr>
        <th>id</th>
        <th>Nombre</th>
      </tr>
       <tr>
        <td>1</td>
        <td>Juan</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Jose</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Luis</td>
      </tr>
      <tr>
        <td>4</td>
        <td>Luisa</td>
      </tr>
      <tr class='noSearch hide'>
        <td colspan="5"></td>
      </tr>
    </table>

    <!-- Contenido de la página -->
    <div class="cajita">
      <?php
      for ($num1 = 1; $num1 <= 200; $num1++) {
        echo '
        <div id="item1" class="items">
         <h2>' . $num1 . 'item</h2>
       </div>';
      }
      ?>

    </div>
  </div>
</body>

<script src="busqueda.js"></script>

</html>
