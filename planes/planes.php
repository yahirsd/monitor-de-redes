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
  </header>

  <main class="container">

    <aside class="aside">
      <form class="form">
        <legend class=form__legend>Agregar un nuevo registro</legend>
        <div class="field">
          <label for="input-name" class="ha-screen-reader">Nombre</label>
          <input id="input-name" class="field__input" placeholder="Archivo Falla">
          <span class="field__label-wrap" aria-hidden="true">
            <span class="field__label">Nombre</span>
          </span>
        </div>

        <div class="field">
          <label for="input-description" class="ha-screen-reader">Descripcion</label>
          <input id="input-description" class="field__input" placeholder="Falla ejemplo">
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
            <td><a href="#">Eliminar</a></td>
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
