<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/inventory.css">
    
    <title>Inventario Detallado</title>
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
          text-align: center; /* Centra los elementos */
        }
    
        nav ul li {
          display: inline-block; /* Muestra los elementos en línea horizontal */
        }
    
        nav ul li a {
          display: block;
          color: white;
          text-decoration: none;
          padding: 15px 20px;
        }
    
        nav ul li a:hover {
          background-color:#555;
        }
    
        .content {
          padding: 20px;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
          <li><a href="#network">Localizar Dispositivos</a></li>
          <li><a href="#Inventario">Inventario</a></li>
          <li><a href="#Prevención">Planes de Prevención</a></li>
          <li><a href="#Fallas">Seguimiento de Fallas</a></li>
          <li><a href="#Configuraciones">Configuraciones</a></li>
        </ul>
    </nav>
    <div class="title">

    </div>
    <div class="table-container2">
        <table>
            <thead>
                <th class="borders-table-align">Nombre</th>
                <th class="borders-table-align">Descripcion</th>
                <th class="borders-table-align">Cantidad Disp.</th>
                <th colspan="2" class="borders-table-align">
                  <form action="crud/agregar.html" method="post">
                  <input type='submit' name='add' value='Agregar' class='styled-submit'></input>
                  </form>
                </th>
            </thead>
            <tbody>
              <?php
                include_once("sql/sqlQuery.php");
                $op=new SQLModel();
                $op->getList();
              ?>
              <!--
              <form action="crud/menu.php" method="post">
                <tr>
                    <td> Nombre Prueba </td>
                    <td> Lorem y quien sabe que cosa </td>
                    <td> 5 </td>
                    <td colspan="2" class="lowSpace">
                      <input type="submit" class="input-submiter1" name="deletor"></input> 
                      <input type="submit" class="input-submiter2" name="editor"></input> 
                    </td>
                </tr>
              </form>
      --> 
            </tbody>
        </table>
    </div>
    <script src="crud/JS/confirm.js"></script>
</body>
</html>