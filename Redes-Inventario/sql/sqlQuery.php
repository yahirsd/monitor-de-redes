<?php
    class SQLModel{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "monitor_de_redes";
        private $conn;

        public function __construct(){
            $this->conn=new mysqli($this->host,$this->username,$this->password,$this->dbname);
        }
        public function addItem($POST){
            $nombre=$POST['name'];
            $desc=$POST['desc'];
            $canti=$POST['cant'];
            $query="INSERT INTO inventario(nombre,descripcion,cantidad) values('$nombre','$desc','$canti');";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                return 1;
            }
            return 0;
        }
        public function modify($POST){
            $nombre=$POST['name'];
            $desc=$POST['desc'];
            $canti=$POST['cant'];
            $id=$POST['id'];
            $query="UPDATE inventario SET nombre='$nombre',descripcion='$desc',cantidad='$canti' WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            if($result){
                return 1;
            }
            return 0;
        }
        public function delete($id){
            $query="DELETE FROM inventario WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            if($result){
                return 1;
            }
            return 0;
        }

        public function getList(){
            $query="SELECT * FROM inventario";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<form action='crud/menu.php' method='post'>";
                    echo "<tr>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['descripcion']."</td>";
                        echo "<td>".$row['cantidad']."</td>";
                        echo "<td colspan='2' class='lowSpace'>";
                            echo "<input type='submit' class='input-submiter1' name='deletor'></input> ";
                            echo "<input type='submit' class='input-submiter2' name='editor'></input> ";
                            echo "<input type='hidden' name='id' value='".$row['id_inventario']."'></input>";
                        echo "</td>";
                    echo "</tr>";
                echo "</form>";
                }
            }
        }
        public function getViewerList(){
            $query="SELECT * FROM inventario";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $nombre=$row['nombre'];
                    $desc=$row['descripcion'];
                    $cant=$row['cantidad'];
                    $id=$row['id_inventario'];
                    echo "
                    <tr>
                    <td>
                      <div class='container'>
                      <form action='crud/menu.php' method='post'>
                          <ol>
                              <li><a href='inventarioD.php'>$nombre</a></li>
                              <li>$desc</li> 
                              <li>Cantidad Disponible: $cant</li>
                            <input type='hidden' name='id' value='$id'></input>
                            <ol class='list-look'>
                                <li>
                                    <label >Nombre del prestador: </label>
                                    <input type='text' name='name' required></input>
                                </li>
                                <li>
                                    <label>Inserte la cantidad: </label>
                                    <input type='number' name='cant' required></input>
                                </li>
                            </ol>
                            <input type='submit' class='styled-submit' name='borrow' value='Tomar Prestado'></input>
                          </ol>
                        </form>
                      </div>
                  </td>
                  </tr>";
                }
            }
        }
        public function getEdit($cond){
            $query="SELECT * FROM inventario WHERE id_inventario='$cond'";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $name=$row['nombre'];
                    $desc=$row['descripcion'];
                    $cant=$row['cantidad'];
                    $id=$row['id_inventario'];
                    echo "<form action='menu.php' method='post'>";
                        echo"<label for='name'>Nombre del producto:</label>
                        <input type='text' id='name' name='name' value='$name' required>";
                        echo"<label for='desc'>Nombre del producto:</label>
                        <input type='text' id='desc' name='desc' value='$desc' required>";
                        echo"<label for='cant'>Nombre del producto:</label>
                        <input type='number' id='cant' name='cant' value='$cant' required>";
                        echo "<input type='hidden' name='id' id='id' value='$id'>";
                        echo "<input type='submit' name='edit' value='Guardar Cambios?''>";
                    echo "</form>";
                }
            }
        }
    }